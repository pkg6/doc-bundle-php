<?php

namespace Pkg6\DocBundle\Annotations;

use Pkg6\DocBundle\Objects\DocNameComment;

abstract class Annotation implements \JsonSerializable
{
    const ANNOTATIONS = [
        Method::NAME       => Method::class,
        Router::NAME       => Router::class,
        RouterPrefix::NAME => RouterPrefix::class,

        Param::NAME => Param::class,

        Title::NAME       => Title::class,
        Tags::NAME        => Tags::class,
        Description::NAME => Description::class,
        Summary::NAME     => Summary::class,

        Returns::NAME   => Returns::class,
        Responses::NAME => Responses::class,
    ];
    /**
     * @var DocNameComment
     */
    protected $nameComment;

    /**
     * @var bool
     */
    protected $isClass = false;

    /**
     * @var string
     */
    protected $commentSeparator = ' ';

    /**
     * @param DocNameComment $nameComment
     * @return $this
     */
    public function setNameComment(DocNameComment $nameComment)
    {
        $this->nameComment = $nameComment;
        return $this;
    }

    /**
     * @param bool $isClass
     * @return $this
     */
    public function setIsClass($isClass)
    {
        $this->isClass = $isClass;
        return $this;
    }


    /**
     * @return mixed
     */
    public function comments()
    {
        $comment      = $this->nameComment->getComment();
        $commentArray = [];
        if ($comment != "") {
            $commentArray = explode($this->commentSeparator, $comment);
        }
        return array_filter($commentArray);
    }

    public function toArray()
    {
        return [
            'name'     => $this->nameComment->getName(),
            "comments" => $this->comments(),
        ];
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
