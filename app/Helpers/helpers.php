<?php

use App\Models\Category;
use App\Models\Contact;
use App\Models\Destination;
use App\Models\GeneralSetting;
use App\Models\Kanban;
use App\Models\SocialNetwork;
use App\Models\Story;
use Carbon\Carbon;

/** GET GENERAL SETTINGS */
if (!function_exists('get_settings')) {
    function get_settings()
    {
        $results = null;
        $settings = new GeneralSetting();
        $settings_data = $settings->first();

        if ($settings_data) {
            $results = $settings_data;
        } else {
            $settings->insert([
                'site_name' => 'Visiting South Buton',
                'site_email' => 'achilaode@gmail.com',
            ]);
            $new_settings_data = $settings->first();
            $results = $new_settings_data;
        }
        return $results;
    }
}

/** GET SOCIAL NETWORKS SETTINGS */
if (!function_exists('get_social_network')) {
    function get_social_network()
    {
        $results = null;
        $social_network = new SocialNetwork();
        $social_network_data = $social_network->first();

        if ($social_network_data) {
            $results = $social_network_data;
        } else {
            $social_network->insert([
                'facebook_url' => null,
                'twitter_url' => null,
                'instagram_url' => null,
                'youtube_url' => null,
                'tiktok_url' => null,
            ]);
            $new_social_network_data = $social_network->first();
            $results = $new_social_network_data;
        }
        return $results;
    }
}
/** GET SOCIAL NETWORKS SETTINGS */
if (!function_exists('get_message')) {
    function get_message()
    {
        $inboxunread = Contact::where('status', 'unread')->count();
        return $inboxunread;
    }
}
/** GET Category */
if (!function_exists('get_category')) {
    function get_category()
    {
        $category = Category::where('parent_id', '=', null)
            ->with('childrens')
            ->get();
        return $category;
    }
}
/** GET Destinasi Wisata */
if (!function_exists('get_wisata')) {
    function get_wisata()
    {
        $categoryId = 1;
        $wisata = Destination::withCount('totalComments')->whereHas('category', function ($q) use ($categoryId) {
            $q->where('id', $categoryId)
                ->orWhere('parent_id', $categoryId);
        })->withCount('destinationvote')->orderBy('user_id', 'asc')
            ->with('category')->latest()->limit(5)->get();
        return $wisata;
    }
}
/** GET Destinasi Wisata */
if (!function_exists('get_kanban')) {
    function get_kanban()
    {
        $kanbans = Kanban::latest()->take(6)->get();
        return $kanbans;
    }
}
/** GET Feed Pengunjung */
if (!function_exists('get_feed')) {
    function get_feed()
    {

        $feeds = Story::where('created_at', '>=', Carbon::now()->subDay(7))->with('user')->latest()->take(9)->get();
        return $feeds;
    }
}
/** Count Feed Pengunjung last 24h */
if (!function_exists('count_feed')) {
    function count_feed()
    {
        $count = Story::where('created_at', '>=', Carbon::now()->subDay())->count();
        return $count;
    }
}
