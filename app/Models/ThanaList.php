<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThanaList extends Model
{
    use HasFactory;

    protected $fillable = ['district_list_id', 'name', 'status'];

    public function district()
    {
        return $this->belongsTo(DistrictList::class,'district_list_id','id');
    }
}
