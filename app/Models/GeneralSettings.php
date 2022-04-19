<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    use HasFactory;

    protected $fillable = ['site_name', 'meta_keyword', 'meta_description', 'location_map', 'logo', 'favicon', 'site_tag_image', 'info_section_show'];
}
