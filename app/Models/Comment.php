<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cause_by_id',
        'cause_by_type',
        'commentable_id',
        'commentable_type',
        'content',
        'rating'
    ];

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
