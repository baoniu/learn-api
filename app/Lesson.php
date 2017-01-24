<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $hidden = ['updated_at'];
    protected $fillable = ['title', 'body'];
}