<?php
require_once('inc/dbc1.php');
// Filter our input.
$dID = filter_input(INPUT_GET, 'dID', FILTER_SANITIZE_NUMBER_INT);
if(!$dID) {
    echo "<h2 style='color:red;'>Invalid Department</h2>";
    exit;
}
require_once('inc/dbc1.php');
$pdo = new PDO('mysql:host=;dbname=ureviewdu', $u, $p);
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sth = $pdo->prepare('
SELECT d.name, p.pID, p.fname, p.lname, p.picpath, p.email 
FROM Department d
INNER JOIN Professor p on d.dID = p.dID
WHERE d.dID = ?
');
$sth->execute(array(
    $dID
));

?>

<?php
$dID2 = filter_input(INPUT_GET, 'dID', FILTER_SANITIZE_NUMBER_INT);
if(!$dID2) {
    echo "<h2 style='color:red;'>Invalid Department</h2>";
    exit;
}
require_once('inc/dbc1.php');
$pdo2 = new PDO('mysql:host=;dbname=ureviewdu', $u, $p);
$pdo2->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sth2 = $pdo2->prepare('
SELECT count(p.pID), count(c.pID)
FROM Department d, Professor p, Comment c
WHERE d.dID = p.dID AND p.pID = c.pID
AND d.dID = ?
');
$sth2->execute(array(
    $dID2
));
?>

<?php
$dID3 = filter_input(INPUT_GET, 'dID', FILTER_SANITIZE_NUMBER_INT);
if(!$dID3) {
    echo "<h2 style='color:red;'>Invalid Department</h2>";
    exit;
}
require_once('inc/dbc1.php');
$pdo3 = new PDO('mysql:host=;dbname=ureviewdu', $u, $p);
$pdo3->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sth3 = $pdo3->prepare('
SELECT count(P.pID) - 1 as pID_count 
FROM Department D, Professor P
WHERE D.dID = ? AND P.dID = D.dID;
');
$sth3->execute(array(
    $dID3
));
?>