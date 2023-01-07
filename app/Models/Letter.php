<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    public function letterCategory()
    {
        return $this->belongsTo(LetterCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
