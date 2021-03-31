<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogLike extends Model
{
    use HasFactory;
    protected $fillable = [
      'blog_id',
      'user_id',
      'like_type',
    ];

    /**
     *  TODO :: Relationship Start
     */

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    /**
     *  TODO :: Relationship End
     */
}
