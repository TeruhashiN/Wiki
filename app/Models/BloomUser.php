<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Maps to the existing `bloom_user` table in the `bloomwiki` MySQL database.
 *
 * Column mapping:
 *   bloom_username -> username
 *   bloom_password -> password
 *   bloom_role     -> role
 */
class BloomUser extends Authenticatable
{
    /**
     * Use the dedicated MySQL connection (defined in config/database.php).
     */
    protected $connection = 'bloom';

    /**
     * The table associated with the model.
     */
    protected $table = 'bloom_user';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     */
    public $incrementing = true;

    /**
     * The data type of the auto-incrementing ID.
     */
    protected $keyType = 'int';

    /**
     * There are no created_at / updated_at columns on this table.
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'bloom_username',
        'bloom_password',
        'bloom_role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'bloom_password',
    ];

    /**
     * Auth: Laravel looks for this column to identify the user.
     */
    public function getAuthPassword(): string
    {
        return (string) $this->bloom_password;
    }

    /**
     * Accessor so `$user->username` maps to `bloom_username`.
     */
    public function getUsernameAttribute(): string
    {
        return (string) $this->attributes['bloom_username'];
    }

    /**
     * Accessor so `$user->role` maps to `bloom_role`.
     */
    public function getRoleAttribute(): string
    {
        return (string) ($this->attributes['bloom_role'] ?? 'user');
    }

    /**
     * Remember tokens are not used on this table.
     */
    public function getRememberToken(): string
    {
        return '';
    }

    public function setRememberToken($value): void
    {
        // no-op
    }

    public function getRememberTokenName(): ?string
    {
        return null;
    }
}
