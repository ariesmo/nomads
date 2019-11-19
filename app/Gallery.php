<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'travel_packages_id', 'image'
    ];

    protected $hidden = [

    ];

    // untuk merelasikan dengan TravelPackage yang foreign key travel_packages_id dengan local key id
    public function travel_package(){
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }

    // public function gallery(){
    //     return $this->hasMany(Gallery::class, 'travel_packages_id', 'id');
    // }
}
