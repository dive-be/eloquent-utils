<?php declare(strict_types=1);

namespace Dive\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use RuntimeException;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait InteractsWithStaticData
{
    use DisablesTimestamps;

    public static array $source;

    public static function all($columns = ['*']): Collection
    {
        return Collection::make(static::$source)
            ->map(static fn (array $attributes) => static::hydrate($attributes, $columns))
            ->values();
    }

    public static function find($id, $columns = ['*']): ?static
    {
        return transform(Arr::get(static::$source, static::uniqueBy($id)),
            static fn (array $attributes) => static::hydrate($attributes, $columns)
        );
    }

    protected static function hydrate(array $attributes, array $columns): static
    {
        static $model = new self();

        return $model->newInstance($columns === ['*'] ? $attributes : Arr::only($attributes, $columns), true);
    }

    protected static function uniqueBy($value): int|string
    {
        return $value;
    }

    public function delete(): never
    {
        throw new RuntimeException('Invalid operation: static data must stay static.');
    }

    public function save(array $options = []): never
    {
        $this->delete();
    }

    public function update(array $attributes = [], array $options = []): never
    {
        $this->save();
    }
}
