<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'title',
        'year',
        'price',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    //public function genre()
    //{
     //   return $this->belongsToMany(Genre::class);
    //}
}
