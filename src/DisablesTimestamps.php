<?php declare(strict_types=1);

namespace Dive\Eloquent;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait DisablesTimestamps
{
    public function initializeDisablesTimestamps()
    {
        $this->timestamps = false;
    }

    public function usesTimestamps(): bool
    {
        return false;
    }
}
