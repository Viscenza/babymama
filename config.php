<?php

    try {
    	$bd = new PDO('mysql:host=localhost;dbname=mom_advice_db;charset=utf8', 'root', '');
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }