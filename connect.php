<?php
$conn = pg_connect("host=192.168.136.137 port=5432  user=caux password=caux dbname=caux");
	if (!$conn) {
		die("database connection failed" . pg_last_error($conn));
	}


?>
