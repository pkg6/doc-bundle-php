<?php

namespace Pkg6\DocBundle\Objects;

use Pkg6\DocBundle\Annotations\Annotation;
use Pkg6\DocBundle\Annotations\Param;
use Pkg6\DocBundle\Annotations\Responses;
use Pkg6\DocBundle\Annotations\Returns;
use Pkg6\DocBundle\helper\Str;

class DataType implements \JsonSerializable
{
    use DataTrait;

    /**
     * @var false|string[]
     */
    protected $dataType;

    /**
     * @var array
     */
    protected $comments;

    /**
     * @param $comments
     * @param Annotation $annotation
     */
    public function __construct($comments, Annotation $annotation)
    {
        switch (get_class($annotation)) {
            case Param::class:
                $this->dataType = explode('|', $comments[0]);
                unset($comments[0]);
                break;
            case Responses::class:
            case Returns::class:
                $this->dataType = $comments;
                unset($comments);
                break;
        }
        $this->comments = $comments ?? [];
    }

    /**
     * @return false|string[]
     */
    public function getDataType()
    {
        return $this->dataType;
    }

    /**
     * @return array
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @return bool
     */
    public function hasXML()
    {
        return $this->hasDataType('xml');
    }

    /**
     * @return bool
     */
    public function hasJSON()
    {
        return $this->hasDataType('json');
    }

    /**
     * @return bool
     */
    public function hasVoid()
    {
        return $this->hasDataType('void');
    }

    /**
     * @param $mayDataType
     * @return bool
     */
    public function hasDataType($mayDataType)
    {
        return $this->endHas($this->dataType, function ($dataType) use (&$mayDataType) {
            return Str::endsWith($dataType, $mayDataType);
        });
    }


    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'data_type' => $this->dataType,
            'comments'  => $this->comments
        ];
    }
}
