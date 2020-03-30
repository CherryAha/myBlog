<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','pid','is_show'];
    protected $table = 'categories';
}
