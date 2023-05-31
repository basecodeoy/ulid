<?php

declare(strict_types=1);

namespace BombenProdukt\Ulid;

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
