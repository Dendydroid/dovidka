<?php


require_once("../Path.php");

require_once("../tools/JsonDatabase.php");

if(isset($_POST['query']) && !empty($_POST['query'])){

	$jsonDatabase = new JsonDatabase(Path::class);
	$data = $jsonDatabase->getAll();
	$query = $_POST['query'];
	$result = [];
	foreach ($data as $number => $el) {
		foreach ($el as $rowNumber => $arr) {
			foreach ($arr as $key => $value) {
				if(is_int(mb_strpos($key, $query)) || is_int(mb_strpos($value, $query))){
					$result[$number] = $el;
					break;
				}
			}
		}
	}

	die(json_encode($result));

}else{
	die("Data is empty!");
}