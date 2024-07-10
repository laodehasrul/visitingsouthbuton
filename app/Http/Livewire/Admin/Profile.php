<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;
    public $userId;
    public $current_password = '';
    public $new_password = '';
    public $new_password_confirmation = '';
    public $name, $email, $newavatar, $telp;
    public function mount()
    {
       $this->name = auth()->user()->name;
       $this->email = auth()->user()->email;
       $this->telp = auth()->user()->no_telp;
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
        $this->reset('current_password','new_password','new_password_confirmation');
        $this->showToastr('success', 'Profile berhasil di Update!');

    }
    public function changeProfile()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . auth()->user()->id,
            'telp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:13|unique:users,no_telp,' . auth()->user()->id,
        ]);
        
        $image = auth()->user()->profile_photo_path;
        if ($this->newavatar) {
            $this->validate([
                'newavatar' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            ]);
            if(auth()->user()->profile_photo_path != null){
                Storage::disk('public')->delete('/profile/avatar/' . auth()->user()->profile_photo_path);
            }
            $image = $this->name. '-' .Carbon::now()->timestamp. '.' .$this->newavatar->getClientOriginalExtension();
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
    public function render()
    {
        return view('livewire.admin.profile')->layout('layouts.admin');
    }
}
