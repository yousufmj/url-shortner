<?php

function connect_db() {
		$servername = "localhost";
		$username = "root";
		$password = "";

		try {
		    $pdo = new PDO(
				"mysql:host=$servername;dbname=url", 
		    	$username, 
		    	$password
		    );

		    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    
		 }
		catch(PDOException $e){
		    die ("Connection failed: " . $e->getMessage());
	    }

	    return $pdo;
}	
