<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'imageable_id',
        'imageable_type',
        'original_name'
    ];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
