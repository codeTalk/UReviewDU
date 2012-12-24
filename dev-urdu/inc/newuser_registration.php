 <?php
require_once "dbcred.php";
$dbh = testdb_connect ();
   
/* Obliterate bad input */


$newStudent = $dbh->exec ("INSERT INTO Student (uname, pass, fname, lname, email, currGrade)                VALUES('$_POST[reguser]','$_POST[regpass]','$_POST[regfirst]','$_POST[reglast]','$_POST[regemail]','$_POST[regclassrank]')");

echo "Thanks for signing up!";

?>