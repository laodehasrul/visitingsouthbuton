<?php

namespace App\Http\Livewire\User;

use App\Models\Berita;
use App\Models\BeritaComment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;
    public $show = false;
    public $oldimage, $user;
    public $tab = null;
    public $default_tab = 'profile_settings';
    protected $listeners  = ['delete'];
    protected $queryString = ['tab'];
    public $current_password = '';
    public $new_password = '';
    public $new_password_confirmation = '';
    public $name, $email, $newavatar, $telp;

    public function selectTab($tab)
    {
        $this->tab = $tab;
    }

    public function mount()
    {
        $this->tab = request()->tab ? request()->tab : $this->default_tab;
        $this->user = User::findOrFail(auth()->user()->id);
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->telp = auth()->user()->no_telp;
    }
    public function updateavatar()
    {
        $this->show = true;
    }
    public function closeModal()
    {
        $this->show = false;
    }
    public function changeAvatar()
    {

        $image = auth()->user()->profile_photo_path;
        if ($this->newavatar != null) {
            $this->validate([
                'newavatar' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            ]);
            $image = $this->newavatar->store('profile/avatar', 'public');
        }
        User::whereId(auth()->user()->id)->update([
            'profile_photo_path' => $image,
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            "type" => 'success',
            "title" => 'Profil Berhasil di Ubah!',
            "text" => '',
        ]);
        $this->closeModal();
        return $this->reset();
    }
    public function showToastr($type, $title)
    {
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
    public function changeProfile()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . auth()->user()->id,
            'telp' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:13|unique:users,no_telp,' . auth()->user()->id,
        ]);

        $image = auth()->user()->profile_photo_path;
        if ($this->newavatar) {
            $this->validate([
                'newavatar' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            ]);
            if (auth()->user()->profile_photo_path != null) {
                Storage::disk('public')->delete('/profile/avatar/' . auth()->user()->profile_photo_path);
            }
            $image = $this->name . '-' . Carbon::now()->timestamp . '.' . $this->newavatar->getClientOriginalExtension();
            $this->newavatar->storeAs('profile/avatar', $image, 'public');
        }

        User::whereId(auth()->user()->id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'no_telp' => $this->telp,
            'profile_photo_path' => $image,
        ]);
        $this->dispatchBrowserEvent('postReset');

        $this->showToastr('success', 'Profile berhasil di Update!');
    }

    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed|different:current_password',
            'new_password_confirmation' => 'required|same:new_password'
        ]);

        if (!Hash::check($this->current_password, auth()->user()->password)) {
            return '';
        } else {
            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($this->new_password)
            ]);
        }
        $this->reset('current_password', 'new_password', 'new_password_confirmation');
        $this->showToastr('success', 'Profile berhasil di Update!');
    }
    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            "type" => 'warning',
            "title" => 'Hapus Akun?',
            "text" => 'Seluruh data anda akan dihapus permanen',
            "id" => $id,
        ]);
    }
    public function delete($id)
    {
        $data_user = User::findOrFail($id);
        if ($data_user->profile_photo_path != null) {
            Storage::disk('public')->delete('/profile/avatar/' . $data_user->profile_photo_path);
        }
        DB::table('model_has_roles')->where('model_id', $data_user->id)->delete();
        $data_user->delete();

        if ($data_user->delete()) {
            $this->showToastr('success', 'Akun Berhasil dihapus!');
            return Redirect::route('/')->with('global', 'Your account has been deleted!');
            
        }
    }
    public function render()
    {
        return view('livewire.user.profile')->layout('layouts.guest');
    }
}
