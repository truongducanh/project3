<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','status'];
    protected $table = "form";
}
