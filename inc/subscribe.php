 <?php
require_once('dbc1.php');
$tbl_name="subscribe"; // Table name

// Connect to server and select databse.
mysql_connect("$h", "$u", "$p")or die("cannot connect"); 
mysql_select_db("$db")or die("cannot select DB");
   
/* Obliterate bad input */
$goodEmail = mysql_real_escape_string($_POST['emAdd']);
$goodBrowser = mysql_real_escape_string($_POST['brwsr']);
$goodDate = mysql_real_escape_string($_POST['dt']);


$sql= "INSERT INTO subscribe (Email, Browser, DateSubscribed) VALUES('$goodEmail','$goodBrowser','$goodDate')";

$result = mysql_query($sql);
if (!$result) {
    die('Invalid Email, please retry.');
}
else {
    echo "<meta HTTP-EQUIV='REFRESH' content='2; url=../index.php'>";

}

?>