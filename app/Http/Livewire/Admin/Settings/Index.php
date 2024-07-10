<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\GeneralSetting;
use App\Models\SocialNetwork;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $tab = null;
    public $default_tab = 'general_settings';
    protected $queryString = ['tab'];
    public $site_name, $site_email, $site_phone, $site_meta_keywords, $site_meta_description,
        $site_logo, $new_site_logo, $site_favicon, $new_site_favicon, $site_address;
    public $facebook_url, $twitter_url, $instagram_url, $youtube_url, $tiktok_url;


    public function selectTab($tab)
    {
        $this->tab = $tab;
    }

    public function mount()
    {
        $this->tab = request()->tab ? request()->tab : $this->default_tab;

        //Populate
        $this->site_name = get_settings()->site_name;
        $this->site_email = get_settings()->site_email;
        $this->site_phone = get_settings()->site_phone;
        $this->site_meta_keywords = get_settings()->site_meta_keywords;
        $this->site_meta_description = get_settings()->site_meta_description;
        $this->site_logo = get_settings()->site_logo;
        $this->site_favicon = get_settings()->site_favicon;
        $this->site_address = get_settings()->site_address;

        // Populate Social Network
        $this->facebook_url = get_social_network()->facebook_url;
        $this->twitter_url = get_social_network()->twitter_url;
        $this->instagram_url = get_social_network()->instagram_url;
        $this->youtube_url = get_social_network()->youtube_url;
        $this->tiktok_url = get_social_network()->tiktok_url;
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
    public function updateGeneralSettings()
    {
        $this->validate([
            'site_name' => 'required',
            'site_email' => 'required|email',
        ]);
        $settings = new GeneralSetting();
        $settings = $settings->first();
        $settings->site_name = $this->site_name;
        $settings->site_email = $this->site_email;
        $settings->site_phone = $this->site_phone;
        $settings->site_meta_keywords = $this->site_meta_keywords;
        $settings->site_meta_description = $this->site_meta_description;
        $settings->site_address = $this->site_address;
        $update = $settings->save();

        if ($update) {
            $this->showToastr('success', 'Web Settings berhasil di Update!');
        } else {
            $this->showToastr('error', 'Web Settings Gagal di Update!');
        }
    }
    public function updateLogoSettings()
    {
        $settings = new GeneralSetting();
        $settings = $settings->first();

        $site_logo_name = $settings->site_logo;
        $site_favicon_name = $settings->site_favicon;
        if ($this->new_site_logo) {
            $this->validate(
                [
                    'new_site_logo' => 'required|image|mimes:png|max:2048',
                ],
                [
                    'new_site_logo.mimes' => 'Format file (png)',
                    'new_site_logo.max' => 'Max file 2Mb',
                ]
            );
            Storage::disk('public')->delete('/site/' . $site_logo_name);
            $site_logo_name = Carbon::now()->timestamp . '.' . $this->new_site_logo->getClientOriginalExtension();
            $this->new_site_logo->storeAs('site', $site_logo_name, 'public');
        }
        if ($this->new_site_favicon) {
            $this->validate(
                [
                    'new_site_favicon' => 'required|image|mimes:png|max:2048',
                ],
                [
                    'new_site_favicon.mimes' => 'Format file (png)',
                    'new_site_favicon.max' => 'Max file 2Mb',
                ]
            );
            Storage::disk('public')->delete('/site/' . $site_favicon_name);
            $site_favicon_name = Carbon::now()->timestamp . '.' . $this->new_site_favicon->getClientOriginalExtension();
            $this->new_site_favicon->storeAs('site', $site_favicon_name, 'public');
        }
        $settings->site_logo = $site_logo_name;
        $settings->site_favicon = $site_favicon_name;
        $update = $settings->save();
        $this->dispatchBrowserEvent('postReset');
        if ($update) {
            $this->showToastr('success', 'Web Settings berhasil di Update!');
        } else {
            $this->showToastr('error', 'Web Settings Gagal di Update!');
        }
    }
    public function updateSocialNetwork()
    {
        $social_network = new SocialNetwork();
        $social_network = $social_network->first();
        $social_network->facebook_url = $this->facebook_url;
        $social_network->twitter_url = $this->twitter_url;
        $social_network->instagram_url = $this->instagram_url;
        $social_network->youtube_url = $this->youtube_url;
        $social_network->tiktok_url = $this->tiktok_url;
        $update = $social_network->save();

        if ($update) {
            $this->showToastr('success', 'Web Settings berhasil di Update!');
        } else {
            $this->showToastr('error', 'Web Settings Gagal di Update!');
        }
    }
    public function render()
    {
        if(!Gate::allows('setting web')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        return view('livewire.admin.settings.index');
    }
}
