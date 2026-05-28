<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    protected $fillable = ['title', 'emoji', 'description', 'color', 'sort_order'];
}
