<?php
require_once('inc/dbc1.php');
// Get course information cID, prefix, code and dept info : name
$cID = filter_input(INPUT_GET, 'cID', FILTER_SANITIZE_NUMBER_INT);
if(!$cID) {
    echo "No cID specified.";
    exit;
}
$pdo = new PDO($h1, $u, $p);
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sth = $pdo->prepare('
    SELECT D.name, C.prefix, C.code 
    FROM Department D, Course C
    WHERE cID = ?
    AND D.dID = C.dID;
    ;');
$sth->execute(array(
    $cID
));
?>

<?php
// Get course information cID, prefix, code and dept info : name
$cID = filter_input(INPUT_GET, 'cID', FILTER_SANITIZE_NUMBER_INT);
if(!$cID) {
    echo "No cID specified.";
    exit;
}

$pdo2 = new PDO($h1, $u, $p);
$pdo2->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sth2 = $pdo2->prepare('
SELECT info, CommID
    FROM Course C, Comment Co
    WHERE C.cID = ?
    AND C.cID = Co.CName
    ;');
$sth2->execute(array(
    $cID
));
?>

<?php
// Get course information cID, prefix, code and dept info : name
$cID = filter_input(INPUT_GET, 'cID', FILTER_SANITIZE_NUMBER_INT);
if(!$cID) {
    echo "No cID specified.";
    exit;
}

$pdo3 = new PDO($h1, $u, $p);
$pdo3->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sth3 = $pdo3->prepare('
	SELECT Co.info, Co.date
    FROM Course C, Comment Co
    WHERE C.cID = Co.cID
    AND C.cID = ?;
    ;');
$sth3->execute(array(
    $cID
));
?>

<?php
// Get course information cID, prefix, code and dept info : name
$cID = filter_input(INPUT_GET, 'cID', FILTER_SANITIZE_NUMBER_INT);
if(!$cID) {
    echo "No cID specified.";
    exit;
}

$pdo4 = new PDO($h1, $u, $p);
$pdo4->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sth4 = $pdo4->prepare('
SELECT DISTINCT fname, lname, P.pID, P.spicpath
FROM Professor P, Comment Comm, Course Cou
WHERE Cou.cID = ?
AND Cou.cID = Comm.CName
AND P.pID = Comm.pID;
    ');
$sth4->execute(array(
    $cID
));
?>
