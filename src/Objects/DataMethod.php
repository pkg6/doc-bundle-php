<?php

namespace Pkg6\DocBundle\Objects;


use Pkg6\DocBundle\helper\Str;

class DataMethod implements \JsonSerializable
{
    use DataTrait;

    /**
     * @var mixed
     */
    protected $methods;

    /**
     * @param $comments
     */
    public function __construct($comments)
    {
        $this->methods = $comments[0] ?? [];
    }

    /**
     * @return bool
     */
    public function hasGET()
    {
        return $this->hasMethod('get');
    }

    /**
     * @return bool
     */
    public function hasPOST()
    {
        return $this->hasMethod('post');
    }

    /**
     * @return bool
     */
    public function hasPUT()
    {
        return $this->hasMethod('put');
    }

    /**
     * @return bool
     */
    public function hasOPTIONS()
    {
        return $this->hasMethod('options');
    }

    /**
     * @return bool
     */
    public function hasHEAD()
    {
        return $this->hasMethod('head');
    }

    /**
     * @return bool
     */
    public function hasPATCH()
    {
        return $this->hasMethod('patch');
    }

    /**
     * @param $method
     * @return bool
     */
    public function hasMethod($mayMethod)
    {
        return $this->endHas($this->methods, function ($method) use (&$mayMethod) {
            return Str::endsWith($method, $mayMethod);
        });
    }

    public function jsonSerialize()
    {
        return $this->methods;
    }
}
