<?php

namespace Pkg6\DocBundle\Annotations;

/**
 * Class Tags
 * @author zhiqiang
 * @package Pkg6\DocBundle\Annotations\Methods
 * @example @tags tag1|tag2
 */
class Tags extends Annotation
{
    const  NAME = 'tags';

    /**
     * @var string
     */
    protected $commentSeparator = '|';
}
