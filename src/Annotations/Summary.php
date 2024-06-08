<?php

namespace Pkg6\DocBundle\Annotations;

/**
 * Class Summary
 * 操作内容的简短总结。该字段应少于120个字符。
 * @author zhiqiang
 * @package Pkg6\DocBundle\Annotations
 *
 * @example: @summary this is summary
 */
class Summary extends Annotation
{
    const NAME = 'summary';

    /**
     * @return string
     */
    public function comments()
    {
        return $this->nameComment->getComment();
    }

}
