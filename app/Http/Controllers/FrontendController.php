<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Event;
use App\Models\Kanban;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function beranda()
    {
        $categoryId = 1;
        $wisata = Destination::whereHas('category', function($q) use($categoryId) {
            $q->where('id', $categoryId)
              ->orWhere('parent_id', $categoryId);
        })
        ->with('category')->latest()->limit(9)->get();
        $newberita = Berita::withCount('totalComments')->with('user')->latest()->limit(4)->get();
        $kanbans = Kanban::latest()->limit(4)->get();
        $videos = Video::latest()->limit(6)->get();
        $kuliner = Category::where('title', "Kuliner")->with('destination')->latest()->limit(4)->get();
        $akomodasi = Category::where('title', "akomodasi")->with('destination')->latest()->limit(4)->get();
        $event = Event::orderBy('date_time', 'asc')->whereDate('date_time','>=', Carbon::now())->limit(5)->get();
        return view(
            'beranda',
            [
                'event' => $event,
                'newberita' => $newberita,
                'kanbans' => $kanbans,
                'videos' => $videos,
                'wisata' => $wisata,
                'kuliner' => $kuliner,
                'akomodasi' => $akomodasi,
            ]
        );
    }
    public function category($slug)
    {
        $category = Category::where('slug',$slug)->firstOrfail();
        $categoryId = $category->id;
        $wisata = Destination::whereHas('category', function($q) use($categoryId) {
            $q->where('id', $categoryId)
              ->orWhere('parent_id', $categoryId);
        })->with('category')->latest()->paginate(6);
        
        $newberita = Berita::withCount('totalComments')->with('user')->latest()->limit(5)->get();
        return view(
            'category',
            [
                'newberita' => $newberita,
                'wisata' => $wisata,
                'category' => $category,
            ]
        );
    }
    public function getberita($slug)
    {
        $getberita = Berita::withCount('totalComments')->with('user')->where('slug', $slug)->first();
        return view(
            'berita.show',
            [
                'getberita' => $getberita,
            ]
        );
    }
    public function petawisata()
    {
        $categories = Category::all();
        $destinations = Destination::with('category')
            ->searchResults()
            ->orderBy('created_at', 'desc')->get();
        $latitude = $destinations->count() && (request()->filled('category') || request()->filled('search')) ? $destinations->average('latitude') : -5.607680249449395;
        $longitude = $destinations->count() && (request()->filled('category') || request()->filled('search')) ? $destinations->average('longitude') : 122.60072845543857;

        return view('peta-wisata', compact('categories', 'destinations', 'latitude', 'longitude'));
    }
}
