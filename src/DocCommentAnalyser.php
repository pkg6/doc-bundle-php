<?php

namespace Pkg6\DocBundle;

use Pkg6\DocBundle\Annotations\Annotation;
use Pkg6\DocBundle\Objects\DocNameComment;

class DocCommentAnalyser
{

    /**
     * @var array
     */
    protected $annotations;

    /**
     * @var string
     */
    protected $docComment;

    /**
     * @var string
     */
    protected $docCommentPattern = '/@(\w+)\s+([^\r\n]+)/';

    /**
     * @var ClassAnalyser|MethodAnalyser
     */
    protected $analyser;
    /**
     * @var bool
     */
    protected $isClass = false;

    /**
     * @param string $docComment
     */
    public function __construct($docComment, Analyser $analyser)
    {
        $this->docComment = $docComment;
        $this->analyser   = $analyser;
        if (get_class($analyser) == ClassAnalyser::class) {
            $this->isClass = true;
        }
    }


    /**
     * @param string $name
     * @param string $annotation
     * @return $this
     */
    public function register($name, $annotation)
    {
        if (is_subclass_of($annotation, Annotation::class)) {
            $this->annotations[$name] = $annotation;
        }
        return $this;
    }


    /**
     * @return DocNameComment[]
     */
    public function docNameComments()
    {
        preg_match_all($this->docCommentPattern, $this->docComment, $ret);
        $docNameComments = [];
        if (isset($ret[1]) && isset($ret[2])) {
            foreach ($ret[1] as $index => $name) {
                $docNameComments[] = new DocNameComment($name, $ret[2][$index] ?: "");
            }
        }
        return $docNameComments;
    }

    /**
     * @return Annotation[]
     */
    public function getAnnotations()
    {
        $docNameComments = $this->docNameComments();
        $annotations     = [];
        foreach ($docNameComments as $nameComment) {
            $annotation = null;
            $name       = $nameComment->getName();
            if (isset($this->annotations[$name])) {
                $annotation = new $this->annotations[$name];
            }
            $defaultAnnotations = Annotation::ANNOTATIONS;
            if (is_null($annotation) && isset($defaultAnnotations[$name])) {
                $annotation = new $defaultAnnotations[$name];
            }
            if (!is_null($annotation)) {
                /*** @var Annotation $annotation */
                $annotation->setNameComment($nameComment);
                $annotation->setIsClass($this->isClass);
                $annotations[] = $annotation;
            }
        }
        return $annotations;
    }

}
