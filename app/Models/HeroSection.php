<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = ['section_key', 'title', 'content', 'image_path', 'caption', 'emoji', 'sort_order'];
}
