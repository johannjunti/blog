<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body'];
    protected $with = ['images', 'user'];
    protected $appends = ['snippet'];
    protected function snippet(): Attribute
    {
        return Attribute::make(
            get: fn () => substr($this->body, 0, 500),
        );
    }

    protected function authHasLiked(): Attribute
    {
        return Attribute::make(
            get: function () {
                if(auth()->check()) {
                    return $this->likes()->where('user_id', auth()->user()->id)->exists();
                }
                return false;
            }
        );
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
