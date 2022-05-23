<?php declare(strict_types=1);

namespace Dive\Eloquent;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait InteractsWithStaticData
{
    use DisablesTimestamps;
    use Unwritable;

    public static array $source;

    public static function all($columns = ['*']): Collection
    {
        $model = new static();

        return $model
            ->newCollection(static::$source)
            ->map(static fn (array $attributes) => $model->hydrate($attributes, $columns))
            ->values();
    }

    public static function find(int|string $id, $columns = ['*']): ?static
    {
        $model = new static();

        return transform(Arr::get(static::$source, $model->uniqueBy($id)),
            static fn (array $attributes) => $model->hydrate($attributes, $columns)
        );
    }

    public static function findMany(array|Arrayable $ids, array $columns = ['*']): Collection
    {
        $model = new static();

        if ($ids instanceof Arrayable) {
            $ids = $ids->toArray();
        }

        $ids = array_flip(array_map($model->uniqueBy(...), $ids));

        return $model
            ->newCollection(array_intersect_key(static::$source, $ids))
            ->map(static fn (array $attributes) => $model->hydrate($attributes, $columns))
            ->values();
    }

    protected function hydrate(array $attributes, array $columns): static
    {
        return $this->newInstance($columns === ['*'] ? $attributes : Arr::only($attributes, $columns), true);
    }

    protected function uniqueBy(int|string $value): int|string
    {
        return $value;
    }
}
