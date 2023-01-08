<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'letter_category_id',
        'name',
        'description',
        'effective_date',
        'end_date',
        'status'
    ];

    public function letterCategory()
    {
        return $this->belongsTo(LetterCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
