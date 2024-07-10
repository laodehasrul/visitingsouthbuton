<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $data_user;
    public $name, $email, $no_telp, $profile_photo_path, $password, $new_role, $role, $newavatar, $roles_id;
    public $new_password = '';
    public $new_password_confirmation = '';
    protected $listeners  = ['delete'];
    public $isModalOpen = false;
    public $isEditMode = false;

    public $selectedRows = [];
    public $selectPageRows = false;

    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->data->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset(['selectedRows', 'selectPageRows']);
        }
    }
    public function deleteSelectedRows()
    {
        if(!Gate::allows('hapus user')){
            return $this->dispatchBrowserEvent('access');
        }
        User::whereIn('id', $this->selectedRows)->delete();
        $this->showToastr('success', 'User berhasil dihapus');
        $this->reset(['selectPageRows', 'selectedRows']);
    }
    public function updating($key): void
    {
        if ($key === 'search') {
            $this->resetPage();
        }
    }
    public function showToastr($type, $title){
        return $this->dispatchBrowserEvent('swalpopup', [
            "type" => $type,
            "title" => $title,
            "text" => '',
            "icon" => 'success',
            "timer" => 1500,
            "toast" => true,
            "position" => 'top-right'
        ]);
    }

    public function closeModalPopover()
    {
        $this->resetValidation();
        $this->reset();
        $this->isModalOpen = false;
    }
    public function showEditModal($id)
    {
        if(!Gate::allows('edit user')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->data_user = User::findOrFail($id);
        $this->role  = $this->data_user->roles->first()->id;
        $this->name = $this->data_user->name;
        $this->email = $this->data_user->email;
        $this->no_telp = $this->data_user->no_telp;
        $this->profile_photo_path = $this->data_user->profile_photo_path;
        $this->isEditMode = true;
        $this->isModalOpen = true;
    }
    public function changeProfile()
    {
        if(!Gate::allows('edit user')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $this->data_user->id,
            'no_telp' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:13|unique:users,no_telp,' . $this->data_user->id,
            'role' => 'required'
        ]);
        
        $image = $this->data_user->profile_photo_path;
        if ($this->newavatar) {
            $this->validate([
                'newavatar' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            ]);
            if($this->data_user->profile_photo_path != null){
                Storage::disk('public')->delete('/profile/avatar/' . $this->data_user->profile_photo_path);
            }
            $image = $this->name. '-' .Carbon::now()->timestamp. '.' .$this->newavatar->getClientOriginalExtension();
            $this->newavatar->storeAs('profile/avatar', $image, 'public');
        }
        if($this->new_password){
            $this->validate([
                'new_password' => 'required|min:6|confirmed',
                'new_password_confirmation' => 'required|same:new_password'
            ]);
            
            if (Hash::check($this->new_password, $this->data_user->password)) {
                return '';
            } else {
                #Update the new Password
                User::whereId($this->data_user->id)->update([
                    'password' => Hash::make($this->new_password)
                ]);
            }
        }
        
        User::whereId($this->data_user->id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'no_telp' => $this->no_telp,
            'profile_photo_path' => $image,
        ]);
        DB::table('model_has_roles')->where('model_id',$this->data_user->id)->delete();
        $this->data_user->assignRole($this->role);

        $this->closeModalPopover();
        $this->dispatchBrowserEvent('postReset');

        $this->showToastr('success', 'User berhasil di Update!');

    }

    public function updateData()
    {
        if(!Gate::allows('edit user')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate([
            'name' => 'required|min:6',
            'email' => 'required|email',
        ],[
            'title.required' => 'Judul tidak boleh kosong!',
            'title.min' => 'Judul minimal 6 karakter!',
        ]);
        $imageName = $this->data_post->image;
        if ($this->newProfile) {
            $this->validate([
                'newimage' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ],
            [
                'newimage.mimes' => 'Format file (jpg, jpeg, png)',
                'newimage.max' => 'Max file 2Mb',
            ]);
            Storage::disk('public')->delete('/kanban/' . $imageName);
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->getClientOriginalExtension();
            $this->newimage->storeAs('kanban', $imageName, 'public');
        }
        $this->data_post->update([
            'title' => $this->title,
            'url' => $this->url,
            'image' =>$imageName,
        ]);
        $this->dispatchBrowserEvent('swalpopup', [
            "type" => 'success',
            "title" => 'Kanban Berhasil di Update!',
            'timer'=>1500,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right'
        ]);
        $this->reset();
        return '';
    }

    public function render()
    {
        if(!Gate::allows('view user')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        sleep(1);
        //$data = Event::where('title', 'like', '%'. $this->search .'%')->orWhere('description', 'like', '%'. $this->search .'%')->latest()->paginate(5);
        $roles = Role::all();
        $data = $this->data;
        return view('livewire.admin.users.index',[
            'roles' => $roles,
            'data' => $data
        ])->layout('layouts.admin');
    }
    public function getDataProperty()
    {
        return User::where('id', '!=', auth()->id())->with('roles')->when($this->search, function ($builder) {
            $builder->where(function ($builder) {
                $builder->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        })->latest()->paginate(5);
    }
    public function deleteConfirm($id)
    {
        if(!Gate::allows('hapus user')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->dispatchBrowserEvent('swal:confirm',[
            "type" => 'warning',
            "title" => 'Yakin di Hapus?',
            "text" => '',
            "id" => $id,
        ]);
    }
    public function delete($id)
    {
        if(!Gate::allows('hapus user')){
            return $this->dispatchBrowserEvent('access');
        }
        $data_user = User::findOrFail($id);
        if($data_user->profile_photo_path != null){
            Storage::disk('public')->delete('/profile/avatar/' . $data_user->profile_photo_path);
        }
        DB::table('model_has_roles')->where('model_id',$data_user->id)->delete();
        $data_user->delete();
        $this->reset();
        return '';
    }
}
