<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
  use SoftDeletes;
    use HasFactory;
    protected $fillable = [
      'title', 'description', 'content', 'image', 'published_at', 'category_id'
    ];

    public function deleteImage()
    {
      Post::delete($this->image);
    }

    public function category()
    {
      return $this->belongsTo(Categories::class);
    }

    public function tags()
    {
      return $this->belongsToMany(Tag::class);
    }

    /**
    *
    *check if post has a tag
    *@return bool
    */

    public function hasTag($tagId)
    {
      return in_array ($tagId, $this->tags->pluck('id')->toArray());
    }
}
