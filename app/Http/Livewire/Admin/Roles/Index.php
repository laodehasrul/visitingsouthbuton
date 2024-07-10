<?php

namespace App\Http\Livewire\Admin\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class Index extends Component
{

    public $name, $data_role, $permission = [];
    public $rolePermission = [];
    public $data_permission;
    public $isModalOpen = false;
    public $isEditMode = false;

    protected $listeners  = ['delete'];
    public function create()
    {
        if(!Gate::allows('tambah role')){
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
        if(!Gate::allows('tambah role')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate(
            [
                'name' => 'required|string|unique:roles,name',
            ],
            [
                'name.required' => 'Role tidak boleh kosong!',
                'name.unique' => 'Role sudah terdaftar!',
            ]
        );
        $role = Role::create([
            'name' => $this->name
        ]);
        $role->syncPermissions($this->permission);

        $this->closeModalPopover();
        $this->dispatchBrowserEvent('swalpopup', [
            "type" => 'success',
            "title" => 'Role Berhasil di Tambahkan!',
            'timer' => 1500,
            'icon' => 'success',
            'toast' => true,
            'position' => 'top-right'
        ]);
        $this->reset();
    }
    public function showEditModal($id)
    {
        if(!Gate::allows('edit role')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->permission = [];

        $this->data_role = Role::findOrFail($id);
        $this->permission = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $this->data_role->id)
           ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')->all();
        $this->name = $this->data_role->name;
        $this->isEditMode = true;
        $this->isModalOpen = true;
    }

    public function updateData()
    {
        if(!Gate::allows('edit role')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate(
            [
                'name' => 'required|string|unique:roles,name,' . $this->data_role->id,
                'permission.*' => 'required'
            ],
            [
                'name.required' => 'Permission tidak boleh kosong!',
                'name.unique' => 'Permission sudah terdaftar!',
            ]
        );
        $this->data_role->update([
            'name' => $this->name,
        ]);
        $role = Role::findOrFail($this->data_role->id);
        $role->syncPermissions($this->permission);
        $this->dispatchBrowserEvent('swalpopup', [
            "type" => 'success',
            "title" => 'Role Berhasil di Update!',
            'timer' => 1500,
            'icon' => 'success',
            'toast' => true,
            'position' => 'top-right'
        ]);
        $this->reset();
        return '';
    }
    public function deleteConfirm($id)
    {
        if(!Gate::allows('hapus role')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->dispatchBrowserEvent('swal:confirm', [
            "type" => 'warning',
            "title" => 'Yakin di Hapus?',
            "text" => '',
            "id" => $id,
        ]);
    }
    public function delete($id)
    {
        if(!Gate::allows('hapus role')){
            return $this->dispatchBrowserEvent('access');
        }
        $data_role = Role::findOrFail($id);
        $data_role->delete();
        $this->reset();
        return '';
    }

    public function render()
    {
        if(!Gate::allows('view role')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        $this->data_permission = Permission::all();

        $role = Role::get();
        return view('livewire.admin.roles.index', [
            'role' => $role,
            'permissions' => $this->data_permission
        ])->layout('layouts.admin');
    }
}
