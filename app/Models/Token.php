<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperActivation
 */
class Token extends Model
{
    public const TYPE_ACTIVATION = 'activation';
    public const TYPE_PASSWORD_RESET = 'password_reset';

    protected $fillable = [
        'user_id',
        'type',
        'token',
        'expiration',
    ];
}
