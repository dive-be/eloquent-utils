<?php declare(strict_types=1);

namespace Dive\Eloquent;

use BadMethodCallException;
use Illuminate\Database\Eloquent\Model;

/** @mixin Model */
trait Unwritable
{
    public static function create(array $attributes = []): never
    {
        (new static())->halt(__FUNCTION__);
    }

    public function delete(): never
    {
        $this->halt(__FUNCTION__);
    }

    public function save(array $options = []): never
    {
        $this->halt(__FUNCTION__);
    }

    public function update(array $attributes = [], array $options = []): never
    {
        $this->halt(__FUNCTION__);
    }

    private function halt(string $method): never
    {
        throw new BadMethodCallException(sprintf("Disallowed '%s' operation. %s is a read-only model.", $method, static::class));
    }
}
