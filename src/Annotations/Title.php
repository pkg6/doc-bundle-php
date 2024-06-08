<?php

namespace Pkg6\DocBundle\Annotations;

/**
 * Class Title
 * @author zhiqiang
 * @package Pkg6\DocBundle\Annotations
 *
 * @example :@title this is title
 *
 */
class Title extends Annotation
{
    const NAME = 'title';

    /**
     * @return string
     */
    public function comments()
    {
        return $this->nameComment->getComment();
    }
}
