<?php
include 'dotenv/dotenv.php';
$dotenv = new DotEnv();
$dotenv->load();
include "db.php";
include "function.php";
include "core/UserModel.php";
$jsonArray = array(); 
$jsonArray["error"] = FALSE; 
$_code = 200; 
$data = json_decode(file_get_contents("php://input"));  
$resources = array();
function get($in_data){
    return;
}
function post($in_data){
    return;
}
function patch($in_data){
    return;
}
function delete($in_data){
    return;
}

switch($_SERVER["REQUEST_METHOD"]){
    case "GET":
        
        break;
    case "POST":
        
        break;
    case "PATCH":
        
        break;
    case "DELETE":
        
        break;
}
print("<pre>");
print_r($GLOBALS);
print("</pre>");
?>
