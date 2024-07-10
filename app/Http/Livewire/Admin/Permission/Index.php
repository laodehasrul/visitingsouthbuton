<?php

namespace App\Http\Livewire\Admin\Permission;

use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    public $name, $data_permission;
    public $isModalOpen = false;
    public $isEditMode = false;

    protected $listeners  = ['delete'];
    public function create()
    {
        if(!Gate::allows('tambah permission')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->reset();
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->resetValidation();
        $this->reset();
        $this->isModalOpen = false;
    }

    public function submit()
    {
        if(!Gate::allows('tambah permission')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate([
            'name' => 'required|string|unique:permissions,name',
        ],
        [
            'name.required' => 'Permission tidak boleh kosong!',
            'name.unique' => 'Permission sudah terdaftar!',
        ]);
        Permission::create([
            'name' => $this->name
        ]);
  
        $this->closeModalPopover();
        $this->dispatchBrowserEvent('swalpopup', [
            "type" => 'success',
            "title" => 'Permission Berhasil di Tambahkan!',
            'timer'=>1500,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right'
        ]);
        $this->reset();
    }
    public function showEditModal($id)
    {
        if(!Gate::allows('edit permission')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->data_permission = Permission::findOrFail($id);
        $this->name = $this->data_permission->name;
        $this->isEditMode = true;
        $this->isModalOpen = true;
    }

    public function updateData()
    {
        if(!Gate::allows('edit permission')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate([
            'name' => 'required|string|unique:permissions,name,'.$this->data_permission->id,
        ],
        [
            'name.required' => 'Permission tidak boleh kosong!',
            'name.unique' => 'Permission sudah terdaftar!',
        ]);
        $this->data_permission->update([
            'name' => $this->name,
        ]);
        $this->dispatchBrowserEvent('swalpopup', [
            "type" => 'success',
            "title" => 'Permission Berhasil di Update!',
            'timer'=>1500,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right'
        ]);
        $this->reset();
        return '';
    }
    public function deleteConfirm($id)
    {
        if(!Gate::allows('hapus permission')){
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
        if(!Gate::allows('hapus permission')){
            return $this->dispatchBrowserEvent('access');
        }
        $data_permission = Permission::findOrFail($id);
        $data_permission->delete();
        $this->reset();
        return '';
    }
    public function render()
    {
        if(!Gate::allows('view permission')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        $permission = Permission::get();
        return view('livewire.admin.permission.index',[
            'permission' => $permission
        ])->layout('layouts.admin');
    }
}
