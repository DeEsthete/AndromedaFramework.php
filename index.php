<?php
//use Doctrine\Common\Collections\ArrayCollection;
//use Doctrine\Inflector\Inflector;
//use Moontoast\Math\BigNumber;

use Medoo\Medoo;

include "vendor/autoload.php";

//$collection = new ArrayCollection([1,2,3]);
//$res = $collection->filter(function ($item){
//    return $item == 2;
//});
//var_dump($res->toArray());

//$numbers = [];
////echo $number->pow("9999");
//
//function fib(BigNumber $index)
//{
//    if ($index->isLessThan(2)) {
//        return $index;
//    }
//    $first = (new BigNumber($index))->subtract(2);
//    $second = (new BigNumber($index))->subtract(1);
//    $res = fib($first)->add(fib($second));
//    return $res;
//}
//echo fib(new BigNumber('8'));

$cfg = include "database.php";
$db = new Medoo($cfg);
//$db->insert("users", [
//    "username" => "leha",
//    "name" => "Alexey",
//    "password" => "123"
//]);

//$db->update("users", [
//    "username" => "NELEHA"
//], [
//    "id" => "2"
//]);

$db->delete("users", [
    "id" => "2"
]);

$users = $db->select("users", "*");
foreach ($users as $key => $user){
    foreach ($user as $k => $item){
        echo "$k => $item</br>";
    }
}
var_dump($users);