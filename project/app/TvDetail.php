<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TvDetail extends Model
{
    protected $table = "tv_details";
    protected $fillable = ['title','category', 'featured_image', 'embed', 'live', 'description', 'featured', 'views', 'status'];
    public $timestamps = false;
}
