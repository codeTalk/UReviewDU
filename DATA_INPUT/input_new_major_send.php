<?php
$con = mysql_connect("localhost","root","Jacked.1988");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("uReviewDU", $con);

$sql="INSERT INTO department (name)
VALUES
('$_POST[major]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "Successfully added major" . "'$_POST[major]'";


mysql_close($con)
?>