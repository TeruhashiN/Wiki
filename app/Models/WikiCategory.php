<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Maps to the `wiki_categories` table in the `bloomwiki` MySQL database.
 */
class WikiCategory extends Model
{
    /**
     * Use the dedicated MySQL connection (defined in config/database.php).
     */
    protected $connection = 'bloom';

    /**
     * The table associated with the model.
     */
    protected $table = 'wiki_categories';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'sort_order',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'sort_order' => 'integer',
    ];
}
