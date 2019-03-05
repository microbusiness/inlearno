<?php

namespace FileUtils;

class ImageTransformer
{
    public function transform($path)
    {
        $fileArr=pathinfo($path);
        $newName=$fileArr['dirname'].DIRECTORY_SEPARATOR.$fileArr['filename'].'.png';
        imagepng(imagecreatefromjpeg($path), $newName);
        return $newName;
    }
}