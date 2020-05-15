<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeoTools extends Model
{
    protected $table = "code_scripts";
    protected $fillable = ['google_analytics','meta_keys','facebook_comments'];
    public $timestamps = false;
}
