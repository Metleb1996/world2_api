<?php

include 'dotenv/dotenv.php';
$dotenv = new DotEnv();
$dotenv->load();

include "db.php";
include "function.php";
include "core/UserModel.php";
include "core/ParagraphModel.php";
include "core/RequestHandler.php";

$userModel = new UserModel($db, "/user/");
$paragraphModel = new ParagraphModel($db, "/paragraph/");

$handler = new RequestHandler();
$handler->addResource($userModel);
$handler->addResource($paragraphModel);
$response = $handler->run();

print($response);

print("<pre>");
print_r($GLOBALS);
print("</pre>");

?>
