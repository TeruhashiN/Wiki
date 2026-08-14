<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $connection = 'bloom';

    protected $table = 'news';

    protected $fillable = [
        'title',
        'image',
        'description',
        'news_by',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
