<?php

namespace Pkg6\DocBundle\Objects;

use Pkg6\DocBundle\helper\Str;

class DocNameComment
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $comment;


    public function __construct($name, $comment)
    {
        $this->setName($name)->setComment($comment);
    }

    /**
     * @param string $name
     * @return DocNameComment
     */
    public function setName($name)
    {
        $this->name = Str::lower($name);
        return $this;
    }

    /**
     * @param string $comment
     * @return DocNameComment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

}
