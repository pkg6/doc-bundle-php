<?php

namespace Pkg6\DocBundle\Objects;

use Pkg6\DocBundle\helper\Str;

trait DataTrait
{
    /**
     * @param $array
     * @param callable $callback
     * @return bool
     */
    public function endHas($array, callable $callback)
    {
        foreach ($array as $type) {
            if ($callback(Str::lower($type))) {
                return true;
            }
        }
        return false;
    }
}
