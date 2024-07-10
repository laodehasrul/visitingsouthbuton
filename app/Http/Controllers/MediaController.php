<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class MediaController extends Controller
{
    public function image_save(Request $request)
    {
        dd($request);
        if($request->hasFile('upload')) {
            $filenamewithextension= $request->file('upload')->getClientOriginalName();
      
            
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            
            $extension = $request->file('upload')->getClientOriginalExtension();
      
            
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            
            $request->file('upload')->storeAs('public/uploads', $filenametostore);
            $request->file('upload')->storeAs('public/uploads/thumbnail', $filenametostore);
     
            
            $thumbnailpath = public_path('storage/uploads/thumbnail/'.$filenametostore);
            $img = Image::make($thumbnailpath)->resize(500, 150, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
     
            echo json_encode([
                'default' => asset('storage/uploads/'.$filenametostore),
                '500' => asset('storage/uploads/thumbnail/'.$filenametostore)
            ]);
        }
    }
}
