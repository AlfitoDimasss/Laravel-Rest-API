<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterCategory extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'letter_category'
    ];

    public function letters()
    {
        $this->hasMany(Letter::class);
    }
}
