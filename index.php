<?php

use FileUtils\ExtensionFilter;
use FileUtils\ListFiles;
use FileUtils\FilterName;
use FileUtils\ImageTransformer;

require __DIR__.'/vendor/autoload.php';
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

// Ответ на 1 вопрос
$x = true;
if ($x == 1 && $x==2 && $x==3){
    echo("ok");
}


// Далее все про 3 вопрос
$filtres=[
  new ExtensionFilter(['.jpg','.jpeg']),
  new FilterName("/^IMG_6697/")
];

$listHandler=new ListFiles(new ImageTransformer(),$filtres);
$dir=realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR);
$listHandler->loadList( 'D:\imagetemp')->transform();
print_r($listHandler->getList());

