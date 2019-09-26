<?php

use classes\Page;
use classes\Vars;
use Klein\Klein;
use Medoo\Medoo;

include "vendor/autoload.php";

$router = new Klein();
$router->respond("GET", "/news/?", function (){
    $cfg = include "database.php";
    $db = new Medoo($cfg);
    $id = $_GET["id"];
    if ($id === null){
        $news = $db->select("news", "*");
        Vars::set("news", $news);
    }
    else{
        $news = $db->select("news", "*", [
            "id" => $id
        ]);
        Vars::set("news", $news);
    }
    $page = new Page("news.php");
    Vars::set("title", "News");
    Vars::set("content", $page->show());
    include "app/views/_layout.php";
});
$router->respond("GET", "/news/create/?", function (){
    $cfg = include "database.php";
    $db = new Medoo($cfg);
    $title = $_GET["title"];
    $content = $_GET["content"];
    if ($title === null || $content === null){
        $page = new Page("newsCreate.html");
        Vars::set("title", "Create news");
        Vars::set("content", $page->show());
        include "app/views/_layout.php";
    }
    else{
        $db->insert("news", [
            "title" => $title,
            "content" => $content
        ]);
        header("Location: /news/");
    }
});

$router->respond("GET", "/news/update/?", function (){
    $cfg = include "database.php";
    $db = new Medoo($cfg);
    $id = $_GET["id"];
    $title = $_GET["title"];
    $content = $_GET["content"];
    if ($id != null && $title != null || $content != null){
        $db->update("news", [
            "id" => $id,
            "title" => $title,
            "content" => $content
        ]);
    }
    else if($id != null){
        $page = new Page("newsUpdate.html");
        $news = $db->select("news", "*", [
            "id" => $id
        ]);
        var_dump($news);
        $newsTitle = $news[0]["title"];
        $newsContent = $news[0]["content"];
        Vars::set("newsTitle", $newsTitle);
        var_dump(Vars::get("newsContent"));
        Vars::set("newsContent", $newsContent);
        Vars::set("title", "Update news");
        Vars::set("content", $page->show());
        include "app/views/_layout.php";
    }
});

$router->dispatch();