<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body'];

    protected function snippet(): Attribute
    {
        return Attribute::make(
            get: fn () => substr($this->body, 0, 500),
        );
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
