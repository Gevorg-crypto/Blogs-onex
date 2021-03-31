<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'picture_url',
    ];

    /**
     *  TODO :: Relationship Start
     */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(BlogLike::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(BlogComment::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'blog_category',
        'blog_id','category_id','id','id');
    }

    /**
     *  TODO :: Relationship End
     */

    /**
     * @param $image
     * @return string
     */

    public static function getImgUrl($image): string
    {
        return URL::to('/') . Storage::url($image);
    }

    /**
     * @param $file
     * @return false|string
     */
    public static function uploadFile($file)
    {
        $filename = time() . str_replace([' ', ')', '(', ',', '-', '_', '{', '}', '[', ']'], '', $file->getClientOriginalName());// filter file name
        return Storage::disk('public')->putFileAs('blog', $file, $filename);
    }

    /**
     * @param $file
     * @param $picture_path
     * @return false|string
     */
    public static function changeImagePath($file, $picture_path)
    {
        Storage::disk('public')->delete($picture_path);
        $filename = time() . str_replace([' ', ')', '(', ',', '-', '_', '{', '}', '[', ']'], '', $file->getClientOriginalName());// filter file name
        return Storage::disk('public')->putFileAs('blog', $file, $filename);
    }
}
