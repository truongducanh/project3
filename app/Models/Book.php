<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'book_id';
    protected $fillable = ['name','qty','category_id','qty_received'];
    protected $table = "book";
}
