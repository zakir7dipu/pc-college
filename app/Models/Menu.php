<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['text', 'icon', 'href', 'target', 'title', 'parent_id', 'position'];

    public function childs() {
        return $this->hasMany(Menu::class,'parent_id','id') ;
    }

    public function parent(){
        return $this->belongsTo(Menu::class, 'parent_id','id');
    }


}
