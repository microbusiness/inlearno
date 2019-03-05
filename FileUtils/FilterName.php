<?php

namespace FileUtils;

class FilterName
{
    private $regex;

    public function __construct($regex)
    {
        $this->regex=$regex;
    }

    public function filter($str)
    {
        if (preg_match($this->regex,$str,$matches)){
            return true;
        } else {
            return false;
        }
    }
}