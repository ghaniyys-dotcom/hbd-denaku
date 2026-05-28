<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $fillable = ['milestone_date', 'title', 'emoji', 'description', 'sort_order'];
}
