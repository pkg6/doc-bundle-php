<?php

namespace Pkg6\DocBundle\Annotations;

use Pkg6\DocBundle\Objects\DataMethod;
use Pkg6\DocBundle\Objects\DataType;

/**
 * Class Method
 * 定义的请求方式
 * Allowed values: 'get', 'post', put', 'delete', 'options', 'head' and 'patch'
 * @author zhiqiang
 * @package Pkg6\DocBundle\Annotations
 *
 * @example: @method json|xml
 */
class Method extends Annotation
{
    const NAME = 'method';
    /**
     * @var string
     */
    protected $commentSeparator = '|';

    /**
     * @return DataMethod
     */
    public function comments()
    {
        return new DataMethod(parent::comments());
    }
}
