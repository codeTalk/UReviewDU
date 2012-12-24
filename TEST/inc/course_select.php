<?php
$pID = filter_input(INPUT_GET, 'pID', FILTER_SANITIZE_NUMBER_INT);
if(!$pID) {
    echo "No pID specified.";
    exit;
}
$username = "root";
$password = "Jacked.1988";
$pdo = new PDO('mysql:host=localhost;dbname=UREVIEWDU', $username, $password);
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sth = $pdo->prepare('
    SELECT name
    FROM Department, Professor
    WHERE pID = ?
    AND Department.dID = Professor.dID;
    ;');
$sth->execute(array(
    $pID
));


?>