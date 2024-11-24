<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Ulid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @mixin Model
 */
trait HasUlidColumn
{
    protected static function bootHasUlid(): void
    {
        static::creating(function (Model $model): void {
            if (!$model->ulid) {
                $model->ulid = Str::ulid();
            }
        });
    }
}
