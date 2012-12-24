<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'Jacked.1988';
$dbname = "UREVIEWDU";
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);
?>

