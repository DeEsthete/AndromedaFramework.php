<?php
use classes\Vars;
$news = Vars::get("news");
foreach ($news as $item){
    $id = $item["id"];
    $title = $item["title"];
    $content = $item["content"];
    echo "<div><span>$id</span></br><span>$title</span></br><span>$content</span></br></div></br>";
}