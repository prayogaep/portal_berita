<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTags extends Model
{
    use HasFactory;
    protected $fillable = ['post_id', 'tags_id'];
    protected $table = 'post_tags';

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
    public function tag()
    {
        return $this->belongsTo(Tags::class, 'tags_id');
    }

}
