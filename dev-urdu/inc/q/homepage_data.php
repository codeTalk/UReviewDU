<?php
$username = "root";
$password = "";
$pdo1 = new PDO('mysql:host=;dbname=ureviewdu', $username, $password);
$pdo1->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sth1 = $pdo1->prepare('SELECT pID, lname, fname FROM Professor ORDER BY pID DESC LIMIT 10;');
$sth1->execute(array());
?>