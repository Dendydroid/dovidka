<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../Path.php");

require_once("../tools/JsonDatabase.php");

if(isset($_POST['data']) && !empty($_POST['data'])){

	$jsonDatabase = new JsonDatabase(Path::class);
	$jsonDatabase->addOne($_POST['data']);

}else{
	die("Data is empty!");
}