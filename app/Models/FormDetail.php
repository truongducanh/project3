<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormDetail extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['form_id','book_id'];
    protected $table = "form_detail";
}
