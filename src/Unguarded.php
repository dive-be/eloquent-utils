<?php declare(strict_types=1);

namespace Dive\Eloquent;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait Unguarded
{
    public function initializeUnguarded()
    {
        $this->guarded = false;
    }
}
