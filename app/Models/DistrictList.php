<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictList extends Model
{
    use HasFactory;

    protected $fillable = ['country_list_id', 'name', 'status'];

    public function country()
    {
        return $this->belongsTo(CountryList::class, 'country_list_id', 'id');
    }

    public function thana()
    {
        return $this->hasMany(ThanaList::class,'district_list_id','id');
    }

    public function postOffice()
    {
        return $this->hasMany(PostOfficeList::class,'district_list_id','id');
    }
}
