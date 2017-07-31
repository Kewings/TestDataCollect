<?php

	define('DB_HOST', 'localhost');
	define('DB_USER', 'testcoe');
	define('DB_PASS', 'testcoe');
	define('DB_NAME', 'testcoe');
	
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME);

	if (mysqli_connect_errno())
	{
    	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	mysqli_query($dbc,"set names utf8");

//	$SQL_Error = printf ("Error Message:%s\n",mysqli_error($dbc));
?>
