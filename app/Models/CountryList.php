<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryList extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'status'];

    public function state()
    {
        return $this->hasMany(DistrictList::class, 'country_list_id', 'id');
    }
}
