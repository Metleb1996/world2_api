<?php
include "db.php";
include "function.php";
$jsonArray = array(); 
$jsonArray["error"] = FALSE; 
$_code = 200; 
$_method = $_SERVER["REQUEST_METHOD"]; 
function ser(){
	print("Vareable: SERVER\n");
	print_r($_SERVER);
	print("Vareable: GET\n");
	print_r($_GET);
	print("Vareable: POST\n");
	print_r($_POST);
	print("Vareable: PUT\n");
	print_r($_PUT);
	print("Vareable: DELETE\n");
	print_r($_DELETE);
}
switch($_method){
    case "GET":
        print("Method: GET\n");
	ser();
        break;
    case "POST":
        print("Method: POST\n");
	ser();
        break;
    case "PUT":
        print("Method: PUT\n");
	ser();
        break;
    case "DELETE":
        print("Method: DELETE\n");
	ser();
        break;
}
?>
