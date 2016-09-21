<?php
	date_default_timezone_set('America/Los_Angeles');
	/*
		This page is intended for keeping GLOBAL variable and functions at the highest (most general) level.  
		Every page will (likely) include this.
	*/

	function connectMongo() {
		$connection = new MongoClient("mongodb://admin:admin@ds019926.mlab.com:19926/qpdemo");
		$database = $connection->qpdemo;
		return $database;
	}
?>
