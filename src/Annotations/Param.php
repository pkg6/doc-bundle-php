<?php

namespace Pkg6\DocBundle\Annotations;

use Pkg6\DocBundle\Objects\DataType;

/**
 * Class Params
 * 请求参数
 * @author zhiqiang
 * @package Pkg6\DocBundle\Annotations
 *
 * @example: @param int|string $id id
 */
class Param extends Annotation
{
    const NAME = 'param';

    /**
     * @return DataType
     */
    public function comments()
    {
        return new DataType(parent::comments(), $this);
    }
}
