<?php

namespace App\Http\Livewire\Admin\Destinasi\Destinasi;

use App\Models\Category;
use App\Models\Destination;
use App\Models\DestinationGalery;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Edit extends Component
{
    use WithFileUploads;
    public $address, $latitude, $longitude;
    public $destinasi_id, $name, $slug, $description, $content, $category;
    public $newimage;
    public $newgalery = [];
    public $data_post;
    use WithFileUploads;
    public $oldimage;
    public function mount($id)
    {
        if(!Gate::allows('edit destinasi')){
            return $this->dispatchBrowserEvent('access');
        }
        $data_post = Destination::findOrFail($id);
        $this->destinasi_id =  $data_post->id;
        $this->name    = $data_post->name;
        $this->address    = $data_post->address;
        $this->latitude    = $data_post->latitude;
        $this->longitude    = $data_post->longitude;
        $this->slug  = $data_post->slug;
        $this->description  = $data_post->description;
        $this->content  = $data_post->content;
        $this->category  = $data_post->category_id;
        $this->oldimage  = $data_post->image_featured;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function deleteImage($id)
    {
        if(!Gate::allows('edit destinasi')){
            return $this->dispatchBrowserEvent('access');
        }
        $image = DestinationGalery::where('id', $id)->first();
        Storage::disk('public')->delete('/destinasi/galery/' . $image->image_galery);
        $image->delete();
    }
    public function submit()
    {
        if(!Gate::allows('edit destinasi')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:destinations,slug,' . $this->destinasi_id,
            'description' => 'required|min:6',
            'content' => 'required|min:10',
            'address' => 'required',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
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
            'content.required' => 'Konten Tidak Boleh Kosong!',
            'content.min' => 'Konten Minimal 10 Karakter!',
            'category.required' => 'Kategori Tidak Boleh Kosong!'
        ]);

        $destination = Destination::where('id', $this->destinasi_id)->first();
        $destination->user_id = Auth::user()->id;
        $destination->category_id = $this->category;
        $destination->name = $this->name;
        $destination->slug = $this->slug;
        $destination->description = $this->description;
        $destination->content = $this->content;
        $destination->address = $this->address;
        $destination->latitude = $this->latitude;
        $destination->longitude = $this->longitude;
        $imageName = $destination->image_featured;
        if ($this->newimage) {
            $this->validate([
                'newimage' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ],[
                'newimage.required' => 'Gambar Tidak Boleh Kosong!',
                'newimage.max' => 'Max file 2Mb',
                'newimage.mimes' => 'Format File (jpg, jpeg, png)!',
            ]);
            Storage::disk('public')->delete('/destinasi/' . $imageName);
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->getClientOriginalExtension();
            $this->newimage->storeAs('destinasi', $imageName, 'public');
        }
        $destination->image_featured = $imageName;
        $destination->save();
        if ($this->newgalery != null) {
            $this->validate([
                'newgalery.*' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
            ],[
                'newgalery.required' => 'Gambar Tidak Boleh Kosong!',
                'newgalery.max' => 'Max file 2Mb',
                'newgalery.mimes' => 'Format File (jpg, jpeg, png)!',

            ]);
            foreach ($this->newgalery as $key => $image) {
                $gimage = new DestinationGalery();
                $gimage->destination_id = $destination->id;
                $imageName = Carbon::now()->timestamp . $key . '.' .$this->newgalery[$key]->getClientOriginalExtension();
                $this->newgalery[$key]->storeAs('destinasi/galery', $imageName, 'public');
                $gimage->image_galery = $imageName;
                $gimage->save();
            }
        };
        
        $this->reset();

        return redirect()->to('/admin/destinasi')->with(
            'success',
            [
                "type" => 'success',
                "title" => 'Destinasi Berhasil di Updated!',
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
        if(!Gate::allows('edit destinasi')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        $destinationgalery = DestinationGalery::where('destination_id', $this->destinasi_id)->get();

        $categories = Category::where('parent_id', null)->orderby('title', 'asc')->get();
        return view('livewire.admin.destinasi.destinasi.edit', [
            'categories' => $categories,
            'destinationgalery' => $destinationgalery,
        ])->layout('layouts.admin');
    }
}
