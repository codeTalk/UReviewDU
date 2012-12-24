<?php
ob_start();
require_once('../dbc1.php');
$tbl_name="Student"; // Table name

// Connect to server and select databse.
mysql_connect("$h", "$u", "$p")or die("cannot connect"); 
mysql_select_db("$db")or die("cannot select DB");

// Define $myusername and $mypassword 
$salt = '~Z`!@#$%I^&*()_-+Q=}]{[\|"><';
$myusername = mysql_real_escape_string($_POST['regduser']); 
$mypassword = $_POST['regdpass']; //weak version
$mypassword = hash('sha512', $mypassword.$salt); //strong version w/ salt

$sql = "SELECT * FROM $tbl_name WHERE regduser = '$myusername' AND regdpass = '$mypassword')";
$userID = mysql_real_escape_string($_POST['usrID']);
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count=1){
// Register $myusername, $mypassword and redirect
session_register("regduser");
session_register("regdpass"); 
header("location:/index.php?stuID='$userID'");
}
else {
echo "$mypassword<br />";
echo "$badpasses<br>";
echo "Wrong Username or Password";
}

ob_end_flush();
?>

