<?php

namespace Modules\Blog\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Blog\Database\factories\ImageFactory;

class Image extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
    
    protected static function newFactory()
    {
        //return ImageFactory::new();
    }
}
