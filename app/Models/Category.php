<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'description', 
        'slug',
        'parent_id',
        'image_featured',
    ];
    protected $guarded = [
        'id'
    ];
    public function parent()
    {
        return $this->belongsTo(self::class);
    }
    public function childrens()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
    public function getChildrenIds(&$arr){
        $childrens = $this->childrens;
        foreach ($childrens as $child) {
            if (count($child->childrens) > 0)
                $child->getChildrenIds($arr);
            else
                array_push($arr, $child->id);
        }
    }
    public function descendants()
    {
        return $this->childrens()->with('descendants');
    }
    public function destination()
    {
        return $this->hasMany(Destination::class);
    }
}
