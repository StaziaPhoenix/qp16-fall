<style>
	img {
		display: block;
		height: 190px;
		margin-right: auto;
		margin-left: auto;
		margin-bottom: 0;
	}
</style>

<?php
	date_default_timezone_set('America/Los_Angeles');
	/*
		This page is intended for keeping GLOBAL variable and functions at the highest (most general) level.  
		Every page will (likely) include this.
	*/

	function connectMongo() {
		$connection = new MongoClient("mongodb://admin:admin@ds019926.mlab.com:19926/qpdemo");
		$database = $connection->qpdemo;
		$collection = $database->qp;
		return $collection;
	}
?>
		
<img src="playtime.png">
<br><hr><br>
