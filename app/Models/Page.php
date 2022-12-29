<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'image', 'description','status','slug'];

    public static function boot(){
        parent::boot();
        static::creating(function($query){
            $bytes = random_bytes(6);
            $query->slug = bin2hex($bytes);
        });
//        static::updating(function($query){
//            if(\Auth::check()){
//                $query->updated_by = @\Auth::user()->id;
//            }
//        });
    }
}
