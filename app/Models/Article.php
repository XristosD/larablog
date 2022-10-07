<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'published',
        'user_id',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
