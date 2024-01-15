<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectBook extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['subject_id','book_id'];
    protected $table = "subject_book";
}
