<?php

namespace App\Models;

use Laratrust\Models\LaratrustPermission;

/**
 * @mixin IdeHelperPermission
 */
class Permission extends LaratrustPermission
{
    public $guarded = [];
}
