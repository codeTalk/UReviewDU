 <?php
require_once('inc/dbc1.php');
$tbl_name="Student"; // Table name

// Connect to server and select databse.
mysql_connect("$h", "$u", "$p")or die("cannot connect"); 
mysql_select_db("$db")or die("cannot select DB");
   
/* Obliterate bad input */
$secUser = mysql_real_escape_string($_POST['reguser']);
$badpasses = $_POST['regpass'];
$salt = '~Z`!@#$%I^&*()_-+Q=}]{[\|"><';
$secPass = hash('sha512', $badpasses.$salt);

$sql= "INSERT INTO Student (uname, upass, fname, lname, email, currGrade)                VALUES('$secUser','$secPass','$_POST[regfirst]','$_POST[reglast]','$_POST[regemail]','$_POST[regclassrank]')";

$result = mysql_query($sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
else if($result == 1){
echo "Registered";
}
else{
echo "Retry";
}

?>