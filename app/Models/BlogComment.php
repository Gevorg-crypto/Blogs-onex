<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogComment extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_id',
      'blog_id',
      'description',
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
