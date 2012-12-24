<?php
require_once('inc/dbc1.php');
$dsn = 'mysql:dbname=thedbnamehere;host=thehostnamehere';
$user = 'theusernamehere';
$password = 'thepasshere';

$pdo1 = new PDO($dsn, $user, $password);
$pdo1->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sth1 = $pdo1->prepare('SELECT pID, lname, fname FROM Professor ORDER BY pID DESC LIMIT 5;');
$sth1->execute(array());
?>