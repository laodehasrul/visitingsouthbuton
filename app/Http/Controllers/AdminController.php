<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Pipeline;
use App\Actions\Fortify\AttemptToAuthenticate;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable;
use App\Http\Responses\LoginResponse;
use App\Models\Category;
use App\Models\Destination;
use App\Models\DestinationGalery;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;

class AdminController extends Controller
{
    public function petawisata()
    {
        if (!Gate::allows('view destinasi')) {
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        $categories = Category::all();
        $datadestinasi = Destination::with('category')->get();
        $destinations = Destination::with('category')
            ->searchResults()
            ->orderBy('created_at', 'desc')->paginate(5);
        $latitude = $datadestinasi->count() && (request()->filled('category') || request()->filled('search')) ? $datadestinasi->average('latitude') : -5.607680249449395;
        $longitude = $datadestinasi->count() && (request()->filled('category') || request()->filled('search')) ? $datadestinasi->average('longitude') : 122.60072845543857;

        return view('livewire.admin.destinasi.destinasi.index', compact('categories', 'datadestinasi', 'destinations', 'latitude', 'longitude'));
    }
    public function delete($id)
    {
        if (!Gate::allows('hapus destinasi')) {
            return redirect()->back();
        }
        $data_post = Destination::findOrFail($id);
        Storage::disk('public')->delete('/destinasi/' . $data_post->image_featured);
        $images = DestinationGalery::where('destination_id', $data_post->id)->get();
        foreach ($images as $image) {
            Storage::disk('public')->delete('/destinasi/galery/' . $image->image_galery);
            $image->delete();
        }
        $data_post->delete();
        return redirect()->back()->with(['success' => 'Data Berhasil Di Hapus!']);
    }
}
