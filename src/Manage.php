<?php

namespace Pkg6\DocBundle;

use ReflectionClass;

class Manage
{
    /**
     * @var array
     */
    protected $objectOrClasss = [];

    /**
     * @param $objectOrClasss
     */
    public function __construct($objectOrClasss)
    {
        $this->objectOrClasss = $objectOrClasss;
    }

    /**
     * @return \Generator
     * @throws \ReflectionException
     */
    public function generatorReflectionClass()
    {
        foreach ($this->objectOrClasss as $class) {
            yield new ReflectionClass($class);
        }
    }

    /**
     * @return \Generator
     * @throws \ReflectionException
     */
    public function generatorClassAnalyser()
    {
        $refs = $this->generatorReflectionClass();
        foreach ($refs as $ref) {
            yield new ClassAnalyser($ref);
        }
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function docCommentArray()
    {
        $refs = $this->generatorClassAnalyser();
        $ret  = [];
        /**
         * @var ClassAnalyser $ref
         */
        foreach ($refs as $ref) {
            $classMethod = $ref->docCommentAnalyser();
            $class = $classMethod['class']->getAnnotations();
            $methods = [];
            /**
             * @
             */
            foreach ($classMethod['methods'] as $method) {

                $annotations = $method->docCommentAnalyser()->getAnnotations();
                foreach ($annotations as $i => $annotation) {
                    $methods[$method->getName()][$i] = $annotation->toArray();
                }
            }
            $ret[$ref->getReflection()->getName()] = compact('class', 'methods');
        }
        return $ret;
    }
}
