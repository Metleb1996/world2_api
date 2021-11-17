<?php
include "db.php";
include "function.php";
$jsonArray = array(); 
$jsonArray["error"] = FALSE; 
$_code = 200; 
$_method = $_SERVER["REQUEST_METHOD"]; 
switch($_method){
    case "GET":
        print("GET");
        break;
    case "POST":
        print("POST");
        break;
    case "PUT":
        print("PUT");
        break;
    case "DELETE":
        print("DELETE");
        break;
}
?>