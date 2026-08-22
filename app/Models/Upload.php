<?php

namespace App\Models;

use App\Models\BloomUser;
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
        'added_by',
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

    public function addedBy()
    {
        return $this->belongsTo(BloomUser::class, 'added_by');
    }
}
