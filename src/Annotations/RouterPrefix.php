<?php

namespace Pkg6\DocBundle\Annotations;

/**
 * Class RouterPrefix
 * @author zhiqiang
 * @package Pkg6\DocBundle\Annotations
 *
 * @example : @prefix /api/prefix
 */
class RouterPrefix extends Annotation
{
    const NAME = 'prefix';
    /**
     * @return string
     */
    public function comments()
    {
        return $this->nameComment->getComment();
    }
}
