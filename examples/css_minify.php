<?php

require_once __DIR__.'/../vendor/autoload.php';

$css = <<<CSS
a {
    background-color: #ccc;
    background-image: url('files/test1.png');
}
CSS;

$jivaro = new Jivaro\Compressor\Css();

echo $jivaro
    ->addFile(__DIR__ . '/files/test1.css')
    ->addFile(__DIR__ . '/files/test2.css')
    ->addString($css)
    ->embed(__DIR__)
    ->minify()
    ->getContents() . PHP_EOL;