<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class replay extends Model
{
    use HasFactory;
    protected $fillable = ['replay'];

    public function replay() {
        return $this->belongsTo(Comment::class);
    }
}
