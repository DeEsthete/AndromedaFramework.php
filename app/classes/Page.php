<?php

namespace classes;

class Page{

    private $page;

    public function __construct($page)
    {
        $this->page = $page;
    }

    public function show(){
        $dir = __DIR__ . "/../" . "views/";
        $dir .= $this->page;

        $dir = realpath($dir);

        if(is_file($dir)){
            include($dir);
        }
    }
}