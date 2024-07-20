<?php

namespace Modules\Blog\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Modules\Blog\Database\factories\BlogFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'body'];

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    
    protected static function newFactory()
    {
        //return BlogFactory::new();
    }
}
