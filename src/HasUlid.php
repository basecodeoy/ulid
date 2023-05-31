<?php

declare(strict_types=1);

namespace BombenProdukt\Ulid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @mixin Model
 */
trait HasUlid
{
    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    protected static function bootHasUlid(): void
    {
        static::creating(function (Model $model): void {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = Str::ulid();
            }
        });
    }
}
