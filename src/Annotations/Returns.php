<?php

namespace Pkg6\DocBundle\Annotations;

use Pkg6\DocBundle\Objects\DataType;

/**
 * Class Returns
 * @author zhiqiang
 * @package Pkg6\DocBundle\Annotations
 *
 * @example: @return json|xml
 */
class Returns extends Annotation
{
    const NAME = 'return';
    /**
     * @return DataType
     */
    public function comments()
    {
        return new DataType(parent::comments(), $this);
    }
}
