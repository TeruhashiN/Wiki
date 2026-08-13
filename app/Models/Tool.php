<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $connection = 'bloom';

    protected $table = 'tools';

    protected $fillable = [
        'upload_id',
        'broken_chance',
        'problem',
    ];

    public function upload()
    {
        return $this->belongsTo(Upload::class, 'upload_id');
    }
}
