<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Dokumen extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getFileSize($id) 
    {
        $file_path = Dokumen::find($id);
        $dokumen = $file_path->file;
        $size = Storage::disk('local')->size('public/document/'. $dokumen);
        // Ensure $this->file_path begins with '/public/';
        $this->mb_size = number_format($size / 1048576,2);
        return $this->mb_size;
    }
}
