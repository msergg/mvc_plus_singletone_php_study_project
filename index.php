<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
  
</head>

<?php

header("Content-Type: text/html; charset=utf-8");
include "classes/sqlConnectionSingletone.class";
include "classes/cController.class";
include "classes/cModel.class";
include "classes/cView.class";

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "log_base_db";	
 
$SqlConnection = sqlConnectionSingletone::getInstance();  
$SqlConnection->connectToDb($servername, $username, $password, $dbname);

$model = new cModel();
$view = new cView($model);
$controller = new cController($model, $view);
  
$model->setConnection(sqlConnectionSingletone::getInstance()->getConnection());
 

if (isset($_GET['action']) && !empty($_GET['action'])) {
	
	$controller->action($_GET['action']);
}
else
{
	$controller->action("");
}
 


?>