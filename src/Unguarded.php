<?php declare(strict_types=1);

namespace Dive\Eloquent;

use Illuminate\Database\Eloquent\Model;

/** @mixin Model */
trait Unguarded
{
    public function initializeUnguarded(): void
    {
        $this->guarded = false;
    }
}
