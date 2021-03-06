<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['comment', 'posts_id', 'user_id'];

    public function comment() {
        return $this->belongsTo(Post::class);
    }
    public function replays() {
        return $this->hasMany(Replay::class);
    }
}
