<?PHP echo $the_cID; ?>
<?php
$h = "ureviewdu.db.6511651.hostedresource.com";
$db = "ureviewdu";
$u = "ureviewdu";
$p = "Jacked.1988";
$h1 = "mysql:host=ureviewdu.db.6511651.hostedresource.com;dbname=ureviewdu";

// Get professor information (e.g. Name, Email, Dept, Pic
$pID = filter_input(INPUT_GET, 'pID', FILTER_SANITIZE_NUMBER_INT);
if(!$pID) {
    echo "No pID specified.";
    exit;
}

$pdo0 = new PDO($h1, $u, $p);
$pdo0->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sth0 = $pdo0->prepare('
    SELECT lname, fname
    FROM Department, Professor
    WHERE pID = ?
    AND Department.dID = Professor.dID;
    ;');
$sth0->execute(array(
    $pID
));

$pdo = new PDO($h1, $u, $p);
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sth = $pdo->prepare('
    SELECT name, lname, fname, picpath, email
    FROM Department, Professor
    WHERE pID = ?
    AND Department.dID = Professor.dID;
    ;');
$sth->execute(array(
    $pID
));
?>
<?php
// Get any professor comments currently present ON LOAD
$pID2 = filter_input(INPUT_GET, 'pID', FILTER_SANITIZE_NUMBER_INT);
		$pdo2 = new PDO($h1, $u, $p);
		$pdo2->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$sth2 = $pdo2->prepare('
SELECT C.cID, Co.CommID, prefix, code, info, date, Qtr, Yr
FROM Course C, Comment Co, Professor P
WHERE P.pID = ?
AND C.cID = Co.CName AND P.pID = Co.pID 
ORDER BY Yr DESC;
             ');
		$sth2->execute(array(
		    $pID2
		));

?>
<?php
// Get the user of the comment
$pID22 = filter_input(INPUT_GET, 'pID', FILTER_SANITIZE_NUMBER_INT);
		$pdo22 = new PDO($h1, $u, $p);
		$pdo22->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$GetUserName = $pdo22->prepare("
		SELECT uname FROM Student S, Comment C WHERE S.usrID = C.usrID and commID='$theCommentID';
             ");
		$GetUserName->execute(array(
		    $pID22
		));

?>


<?php // Get select box options 
$pID3 = filter_input(INPUT_GET, 'pID', FILTER_SANITIZE_NUMBER_INT);
		$pdo3 = new PDO($h1, $u, $p);
		$pdo3->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sth3 = $pdo3->prepare('
    SELECT pID, C.cID, C.prefix, C.code
    FROM Department D, Course C, Professor P
    WHERE pID = ?
    AND D.dID = C.dID
    AND D.dID = P.dID; 
');
		$sth3->execute(array(
		    $pID3
		));
?>


<?php // Get number positive 
$pID4 = filter_input(INPUT_GET, 'pID', FILTER_SANITIZE_NUMBER_INT);
		$pdo4 = new PDO($h1, $u, $p);
		$pdo4->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sth4 = $pdo4->prepare('
SELECT count(Exp)
FROM Comment
WHERE Exp = 1
AND pID = ?
');
		$sth4->execute(array(
		    $pID4
		));
?>
<?php // Get number neutral 
$pID5 = filter_input(INPUT_GET, 'pID', FILTER_SANITIZE_NUMBER_INT);
		$pdo5 = new PDO($h1, $u, $p);
		$pdo5->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sth5 = $pdo5->prepare('
SELECT count(Exp)
FROM Comment
WHERE Exp = 2
AND pID = ?
');
		$sth5->execute(array(
		    $pID5
		));
?>

<?php // Get number negative 
$pID6 = filter_input(INPUT_GET, 'pID', FILTER_SANITIZE_NUMBER_INT);
		$pdo6 = new PDO($h1, $u, $p);
		$pdo6->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sth6 = $pdo6->prepare('
SELECT count(Exp)
FROM Comment
WHERE Exp = 3
AND pID = ?
');
		$sth6->execute(array(
		    $pID6
		));
?>

<?php // Get username associated with comment 
$pID7 = filter_input(INPUT_GET, 'pID', FILTER_SANITIZE_NUMBER_INT);
		$pdo7 = new PDO($h1, $u, $p);
		$pdo7->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sth7 = $pdo7->prepare('
SELECT uname
FROM Student S, Comment Co, Professor P
WHERE S.usrID = Co.usrID
AND P.pID = ? AND commID = 148
');
		$sth7->execute(array(
		    $pID7
		));
?>

<?php

$connect = mysql_connect("ureviewdu.db.6511651.hostedresource.com", $u, $p) or die ("Error , check your server connection.");
mysql_select_db("ureviewdu");
 
//Get data in local variable
if(!empty($_POST['addComment']))
    $INFOO=mysql_real_escape_string($_POST['addComment']);
if(!empty($_POST['dt']))
    $DATE=mysql_real_escape_string($_POST['dt']);
if(!empty($_POST['commQuarter']))
    $QTRR=mysql_real_escape_string($_POST['commQuarter']);
if(!empty($_POST['commYr']))
    $YRR=mysql_real_escape_string($_POST['commYr']);
if(!empty($_POST['commExp']))
    $EXPP=mysql_real_escape_string($_POST['commExp']);
if(!empty($_POST['pID']))
    $PIDD=mysql_real_escape_string($_POST['pID']);
if(!empty($_POST['cID']))
    $CIDD=mysql_real_escape_string($_POST['cID']);
if(!empty($_POST['courseInfoDD']))
    $COURSEE=mysql_real_escape_string($_POST['courseInfoDD']);
     
echo $the_pID;
echo $thedt;
echo $the_cID;

 
// check for null values
if (isset($_POST['submit'])) {
$query="INSERT INTO Comment (info, date, Qtr, Yr, Exp, pID, cID, CName) values('$INFOO', '$DATE', '$QTRR', '$YRR', '$EXPP', '$PIDD', '$CIDD','$COURSEE')";
mysql_query($query)  or die(mysql_error());
echo "Your message has been received";
}
#else if(!isset($_POST['submit'])){echo "No blank entries";}
#else{echo "Error!";}
?>

