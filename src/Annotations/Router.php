<?php

namespace Pkg6\DocBundle\Annotations;

/**
 * Class Path
 * 定义的请求路径
 * @author zhiqiang
 * @package Pkg6\DocBundle\Annotations
 *
 * @example: @router /api/demo
 */
class Router  extends Annotation
{
    const NAME = 'router';

    /**
     * @return string
     */
    public function comments()
    {
        return $this->nameComment->getComment();
    }
}
