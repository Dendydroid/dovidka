<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../Path.php");

require_once("../tools/JsonDatabase.php");

// $jsonDatabase = new JsonDatabase(Path::class);

// $jsonDatabase->removeOne("name", "Taras");

// var_dump($jsonDatabase->getAll());

?>

<!DOCTYPE html>
<html>
<head>
	<title>Довідка</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="cards">
		<div class="card bg-darker">
			
			<p class="title">
				Add record
			</p>

			<div class="row">
				<input type="text" class="input-md" placeholder="Key" id="add_key">
				:
				<input type="text" class="input-md" placeholder="Value" id="add_value">
			</div>
			<div class="row mt-1">
				<button class="btn-md" onclick="addRow($('#add_key').val(), $('#add_value').val())">Add</button>
			</div>

			<div class="wrapper mt-1">
				<table>
					<thead>
						<tr>
							<th style="background-color:rgba(0,0,0,0.2)">
								key
							</th>
							<th style="background-color:rgba(0,0,0,0.2)">
								value
							</th>
						</tr>
					</thead>
					<tbody id="add_data">
						
					</tbody>
				</table>
			</div>

			<div class="row">
				<button class="btn-md-submit mt-1" onclick="sendAdd()">Submit</button>
			</div>

		</div>

		<div class="card bg-darker">

			<p class="title">
				Search Records
			</p>

			<div class="row">
				<input type="text" class="input-md" placeholder="Search" id="search_query">
			</div>

			<div class="wrapper mt-1">
				<div id="search_data">
					
				</div>
			</div>

			<div class="row">
				<button class="btn-md-submit mt-1" onclick="search($('#search_query').val())">Search</button>
			</div>
		</div>
	</div>

	<script
	src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>