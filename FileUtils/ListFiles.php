<?php

namespace FileUtils;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class ListFiles
{
    private $filtres;

    private $transformer;

    private $path;

    private $list;

    public function __construct(ImageTransformer $imageTransformer,$filtres = [])
    {
        $this->filtres=$filtres;
        $this->transformer=$imageTransformer;
    }

    public function loadList($path): ListFiles
    {
        if ($this->path!=$path){
            $this->path=$path;
            $this->list=[];
            $iterator = new RecursiveDirectoryIterator($path);
            foreach (new RecursiveIteratorIterator($iterator) as $file){
                // реализована схема "и", для "или" соответственно проверяем до первого совпадения
                $isFiltered=true;
                foreach ($this->filtres as $filter){
                    if (false===$filter->filter($file->getFilename())){
                        $isFiltered=false;
                    }
                }
                if ($isFiltered){
                    $this->list[]=$file->getPathname();
                }
            }
        }
        return $this;
    }

    public function transform()
    {
        $completeList=[];
        foreach ($this->list as $file){
            $completeList[]=$this->transformer->transform($file);
        }
        $this->list=$completeList;
    }

    public function getList()
    {
        return $this->list;
    }
}