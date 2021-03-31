<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
      'title'
    ];

    /**
     *  TODO :: Relationship Start
     */

    public function parent(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'category_subcategory',
            'subcategory_id','category_id','id','id');
    }
    public function child(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'category_subcategory',
            'category_id','subcategory_id','id','id');
    }

    /**
     *  TODO :: Relationship End
     */

}
