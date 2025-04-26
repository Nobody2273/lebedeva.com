<?php
$conn = pg_connect("host=localhost dbname=lebedeva user=postgres password=123")
   or die("Connection error: " . pg_last_error());
?>
