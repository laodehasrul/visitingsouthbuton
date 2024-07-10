<?php

namespace App\Http\Livewire\Admin\Destinasi\Destinasi;

use App\Models\Category;
use App\Models\Destination;
use App\Models\DestinationGalery;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Create extends Component
{
    use WithFileUploads;
    public $address, $latitude, $longitude;
    public $name, $slug, $description, $content, $category;
    public $newimage;
    public $galery = [];

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
    function getTopParent($category, $title)
    {
        if ($category->parent_id == null) {
            return $title;
        }

        $parent = Category::find($category->parent_id);
        $title = $parent->title . ' > ' . $title;

        return $this->getTopParent($parent, $title);
    }

    public function submit()
    {
        if(!Gate::allows('tambah destinasi')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:destinations,slug',
            'description' => 'required|min:6',
            'content' => 'required|min:10',
            'address' => 'required',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'newimage' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'category' => 'required',
        ],[
            'name.required' => 'Nama Destinasi Tidak Boleh Kosong!',
            'slug.required' => 'Slug Tidak Boleh Kosong!',
            'slug.unique' => 'Slug harus unik!',
            'description.required' => 'Deskripsi Tidak Boleh Kosong!',
            'description.min' => 'Deskripsi Minimal 6 Karakter!',
            'address.required' => 'Deskripsi Tidak Boleh Kosong!',
            'latitude.required' => 'Latitude Tidak Boleh Kosong!',
            'latitude.between' => 'Latitude Harus Berupa Angka Kordinat!',
            'longitude.required' => 'Longitude Tidak Boleh Kosong!',
            'longitude.between' => 'Longitude Harus Berupa Angka Kordinat!',
            'newimage.required' => 'Gambar Tidak Boleh Kosong!',
            'newimage.max' => 'Max file 2Mb',
            'newimage.mimes' => 'Format File (jpg, jpeg, png)!',
            'content.required' => 'Konten Tidak Boleh Kosong!',
            'content.min' => 'Konten Minimal 10 Karakter!',
            'category.required' => 'Kategori Tidak Boleh Kosong!'
        ]);
        if($this->newimage){
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->getClientOriginalExtension();
            $this->newimage->storeAs('destinasi', $imageName, 'public');
        }
        $destination = new Destination();
        $destination->user_id = Auth::user()->id;
        $destination->category_id = $this->category;
        $destination->name = $this->name;
        $destination->slug = $this->slug;
        $destination->description = $this->description;
        $destination->content = $this->content;
        $destination->image_featured = $imageName;
        $destination->address = $this->address;
        $destination->latitude = $this->latitude;
        $destination->longitude = $this->longitude;
        $destination->save();
        if ($this->galery != null) {
            $this->validate([
                'galery.*' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
            ],[
                'galery.mimes' => 'Format file (jpg, jpeg, png)!',
                'galery.max' => 'Max file 2Mb!',
            ]);
            foreach ($this->galery as $key => $image) {
                $gimage = new DestinationGalery();
                $gimage->destination_id = $destination->id;
                $imageName = Carbon::now()->timestamp . $key . '.' .$this->galery[$key]->getClientOriginalExtension();
                $this->galery[$key]->storeAs('destinasi/galery', $imageName, 'public');
                $gimage->image_galery = $imageName;
                $gimage->save();
            }
        };
        
        $this->reset();

        return redirect()->to('/admin/destinasi')->with(
            'success',
            [
                "type" => 'success',
                "title" => 'Destinasi Berhasil di Tambahkan!',
                "text" => '',
            ]
        );
    }
    public function back()
    {
        $this->reset();
        return redirect()->to('/admin/destinasi');
    }
    public function render()
    {
        if(!Gate::allows('tambah destinasi')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        //$cat = Category::find(6);
        //dd($this->getTopParent($cat, $cat->title));
        $categories = Category::where('parent_id', null)->orderby('title', 'asc')->get();
        return view('livewire.admin.destinasi.destinasi.create', [
            'categories' => $categories,
        ])->layout('layouts.admin');
    }
}
