<?php

namespace Pkg6\DocBundle;

use ReflectionMethod;

class MethodAnalyser extends Analyser
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $class;

    /**
     * @var ReflectionMethod
     */
    protected $reflection;
    /**
     * @var false|string
     */
    protected $docComment;

    /**
     * @param ReflectionMethod $reflection
     */
    public function __construct($reflection)
    {
        parent::__construct($reflection);
        $this->name       = $this->reflection->getName();
        $this->class      = $this->reflection->getDeclaringClass()->getName();
        $this->docComment = $this->reflection->getDocComment();
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
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @return ReflectionMethod
     */
    public function getReflection()
    {
        return $this->reflection;
    }

    /**
     * @return false|string
     */
    public function getDocComment()
    {
        return $this->docComment;
    }
}
