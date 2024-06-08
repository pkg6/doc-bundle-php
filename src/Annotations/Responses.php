<?php

namespace Pkg6\DocBundle\Annotations;

use Pkg6\DocBundle\Objects\DataType;

/**
 * Class Responses
 * 执行此操作返回的可能响应的列表。
 * @author zhiqiang
 * @package Pkg6\DocBundle\Annotations
 *
 * @example: @responses json|xml
 */
class Responses extends Returns
{
    const NAME = 'responses';
}
