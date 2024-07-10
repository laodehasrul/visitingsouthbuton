<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Destination;
use Livewire\Component;

class Maptest extends Component
{
    public $lat, $lng;

    public $address;
    public $geoJson, $getCat;
    public $latitude, $longitude, $mapDestinations;
    public $filcategory = '';
    public $search = '';
    public $locationId;

    public function loadData()
    {
        $categories = Category::all();
        $this->getCat = $categories;
        $destinations = Destination::with('category')->when($this->search, function ($query) {
            $query->where(function ($query) {
                $search = $this->search;
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('description', 'LIKE', "%$search%")
                    ->orWhere('address', 'LIKE', "%$search%");
            });
        })
            ->when($this->filcategory, function ($query) {
                $query->whereHas('category', function ($query) {
                    $filcategory = $this->filcategory;
                    $query->where('id', $filcategory);
                });
            })->orderBy('created_at', 'desc')->get();
        $this->latitude = $destinations->count() && ($this->filcategory !== null || $this->search !== null) ? $destinations->average('latitude') : -5.607680249449395;
        $this->longitude = $destinations->count() && ($this->filcategory != null || $this->search != null) ? $destinations->average('longitude') : 122.60072845543857;

        $customLocation = [];
        foreach ($destinations as $destination) {
            $customLocation[] = [
                'type' => 'Feature',
                'geometry' => [
                    'coordinates' => [
                        $destination->latitude, $destination->longitude
                    ],
                    'type' => 'Point'
                ],
                'properties' => [
                    'message' => $destination->description,
                    'iconSize' => [50, 50],
                    'locationId' => $destination->id,
                    'category' => $this->getTopParent($destination->category),
                    'name' => $destination->name,
                    'address' => $destination->address,
                    'image' => $destination->image_featured,
                    'description' => $destination->description
                ]
            ];
        };

        $geoLocations = [
            'type' => 'FeatureCollection',
            'features' => $customLocation
        ];
        $geoJson = collect($geoLocations)->toJson();
        $this->geoJson = $geoJson;
    }
    function getTopParent($category)
    {
        if ($category->parent_id == null) {
            return $category->id;
        }

        $parent = Category::find($category->parent_id);
        $category = $parent->id;

        return $this->getTopParent($parent);
    }

    public function submitfilter()
    {
        $this->loadData();
        $this->dispatch('filterLocation', $this->geoJson);
    }
    public function render()
    {
        $this->loadData();
        return view('livewire.maptest')->layout('layouts.guest');
    }
}
