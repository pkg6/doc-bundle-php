<?php

namespace Pkg6\DocBundle;

use ReflectionClass;
use ReflectionMethod;

class ClassAnalyser extends Analyser
{
    const ignoreMethod = [
        '__construct',
        '__clone',
        '__debugInfo',
        '__destruct',
        '__get',
        '__set',
        '__invoke',
        '__isset',
        '__serialize',
        '__sleep',
        '__toString',
        '__unserialize',
        '__unset',
        '__wakeup',
        '__callStatic',
        '__set_state',

    ];
    /**
     * @var ReflectionClass
     */
    protected $reflection;


    /**
     * @param ReflectionClass $reflection
     */
    public function __construct($reflection)
    {
        parent::__construct($reflection);
    }


    /**
     * @param string $name
     * @return ReflectionMethod
     * @throws \ReflectionException
     */
    public function getMethodReflection($name)
    {
        return $this->getReflection()->getMethod($name);
    }

    /**
     * @return MethodAnalyser[]
     */
    public function methodsAnalyser($filter = ReflectionMethod::IS_PUBLIC, $ignoreMethod = ClassAnalyser::ignoreMethod)
    {
        $methods = [];
        foreach ($this->getReflection()->getMethods($filter) as $method) {
            if (in_array($method->getName(), $ignoreMethod)) {
                continue;
            }
            $methods[] = new MethodAnalyser($method);
        }
        return $methods;
    }

    /**
     * @return array|DocCommentAnalyser
     */
    public function docCommentAnalyser()
    {
        $class   = parent::docCommentAnalyser();
        $methods = $this->methodsAnalyser();
        return compact('class', 'methods');
    }

    /**
     * @return false|string
     */
    public function getDocComment()
    {
        return $this->reflection->getDocComment();
    }
}
