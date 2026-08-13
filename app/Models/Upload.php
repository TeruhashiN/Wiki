<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $connection = 'bloom';

    protected $table = 'uploads';

    protected $fillable = [
        'image',
        'category_id',
        'name',
        'description',
        'price',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function category()
    {
        return $this->belongsTo(WikiCategory::class, 'category_id');
    }

    public function seed()
    {
        return $this->hasOne(Seed::class, 'upload_id');
    }

    public function tool()
    {
        return $this->hasOne(Tool::class, 'upload_id');
    }
}
