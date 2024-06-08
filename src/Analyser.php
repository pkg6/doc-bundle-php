<?php

namespace Pkg6\DocBundle;

use ReflectionClass;
use ReflectionMethod;

abstract class Analyser
{
    /**
     * @var ReflectionClass|ReflectionMethod
     */
    protected $reflection;

    /**
     * @param ReflectionClass|ReflectionMethod $reflection
     */
    public function __construct($reflection)
    {
        $this->reflection = $reflection;
    }

    /**
     * @return string|false
     */
    abstract public function getDocComment();

    /**
     * @return DocCommentAnalyser
     */
    public function docCommentAnalyser()
    {
        return new DocCommentAnalyser($this->getDocComment(),$this);
    }

    /**
     * @return ReflectionClass|ReflectionMethod
     */
    public function getReflection()
    {
        return $this->reflection;
    }

}
