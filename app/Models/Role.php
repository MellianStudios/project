<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

/**
 * @mixin IdeHelperRole
 */
class Role extends LaratrustRole
{
    public $guarded = [];
}
