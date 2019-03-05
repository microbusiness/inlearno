<?php

namespace FileUtils;

class ExtensionFilter implements IFilter
{
    private $template;

    public function __construct($template)
    {
        $this->template=$template;
    }

    public function filter($str)
    {
        $result=false;
        $fileArr=pathinfo($str);
        if (array_key_exists('extension',$fileArr)) {
            if (in_array('.'.strtolower($fileArr['extension']), $this->template, true) > 0) {
                $result = true;
            }
        }
        return $result;
    }
}