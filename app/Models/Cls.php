<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cls extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'class_id';
    protected $fillable = ['name','code','course_id'];
    protected $table = "class";
}
