<?php declare(strict_types=1);

namespace Dive\Eloquent;

use Illuminate\Database\Eloquent\Model;

/** @mixin Model */
trait DisablesTimestamps
{
    public function initializeDisablesTimestamps(): void
    {
        $this->timestamps = false;
    }

    public function usesTimestamps(): bool
    {
        return false;
    }
}
