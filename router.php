<?php
header ("Access-Control-Allow-Origin: *");
session_start();
$url = explode('/', $_SERVER['REQUEST_URI']);
require_once("php/bd.php");
require_once("php/classes/Event.php");

if ($url[1] == "/") {
    require_once("index.html");
} else if ($url[1] == "addEvent") {
    echo Event::addEvent($_POST["date"], $_POST["place"], $_POST["type"], $_POST["name"],   $_POST["price"], $_POST["file"]);

} else if ($url[1] == "lk") {
    $content = file_get_contents("pages/lk.php");
} else if ($url[1] == "getEvents") {
   echo Event::getEvents($_POST["month"], $_POST["year"]) ;
} else if ($url[1] == "getAllEvents") {
   
   echo Event::getAllEvents() ;
} 

if (!empty($content))

require_once("index.html");