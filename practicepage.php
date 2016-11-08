<!DOCTYPE html>
<html lang="en-US">

<head>
  <link rel="stylesheet" type="text/css" href="practice.css">
</head>

<body>
<?php

				include "GLOBAL.php";

				$collection = connectMongo();
?>

				<h1>Input</h1>
				<p>Mission: Put data into mlab</p>
				<!-- PROCESSING FROM INPUT -->
				<?php
					if (isset($_POST['enter_name'])) {
						$newdata = array( "first" => $_POST['name_first'],
															"last" => $_POST['name_last'],
															"username" => $_POST['username']
											);
						$collection -> insert($newdata);

						echo "Entry successful <br><br>";
				}

?>

<!-- HTML FORM FOR INPUT -->
  <form method='post'>
    
		First Name: <input type="text" name="name_first"><br>
		Last Name: <input type="text" name="name_last"><br>
		Username: <input type="text" name="username"><br>
		<input type="submit" name="enter_name"><br><br>
  </form>

<hr>

<h1>Output</h1>
<p>Mission: Display the data in a...</p>

<h3>table.</h3>
	<?php
	?>
	
	<div class="tbl">
	<table>
		
		<tr>
			<td class="header">First</td>
			<td class="header">Last</td>
			<td class="header">Username</td>
		</tr>
	<?php
		$cursor = $collection->find();
		foreach ($cursor as $doc) {
	?>
		<tr>
			<td><?php echo $doc['first']; ?></td>
			<td><?php echo $doc['last']; ?></td>
			<td><?php echo $doc['username']; ?></td>
		</tr>
	<?php
		}
	?>
	</table>
	</div>

<br><br><br>
</body>
