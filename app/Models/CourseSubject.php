<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSubject extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['course_id','subject_id'];
    protected $table = "course_subject";
}
