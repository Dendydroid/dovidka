

<!DOCTYPE html>
<html>
<head>
	<title>Довідка</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="info">
	<p class="title-bg">
		Info
	</p>
	<table id="info-table">
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
		<tbody>
			<?php

			require_once("../Path.php");

			require_once("../tools/JsonDatabase.php");

			if(isset($_GET['id'])){

				$jsonDatabase = new JsonDatabase(Path::class);
				
				$data = $jsonDatabase->getAll();
				foreach ($data as $number => $el) {
					if((string)$number === (string)$_GET['id']){
						foreach ($el as $rowNumber => $arr) {
							foreach ($arr as $key => $value) {
								echo "<tr>";
									echo "<td>" . $key . "</td>";
									echo "<td>" . $value . "</td>";
								echo "</tr>";
							}
						}
					}
				}

			}

			?>
			
		</tbody>
	</table>
	<script
	src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>

