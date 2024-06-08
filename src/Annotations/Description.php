<?php

namespace Pkg6\DocBundle\Annotations;

/**
 * Class Description
 * @author zhiqiang
 * @package Pkg6\DocBundle\Annotations
 * 操作行为的详细说明。GFM语法可用于富文本表示。
 *
 * @example: @description this is description
 *
 */
class Description extends Annotation
{
    const NAME = 'description';

    /**
     * @return string
     */
    public function comments()
    {
        return $this->nameComment->getComment();
    }
}
