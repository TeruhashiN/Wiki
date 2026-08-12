<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seed extends Model
{
    protected $connection = 'bloom';

    protected $table = 'seeds';

    protected $fillable = [
        'grow_time',
        'issue_count',
        'issue_duration',
        'quality',
        'merit_event',
    ];

    protected $casts = [
        'issue_count' => 'integer',
    ];

    public function upload()
    {
        return $this->belongsTo(Upload::class, 'upload_id');
    }
}
