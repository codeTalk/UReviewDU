<?php
require_once('inc/dbc1.php');
$users_ip = $_SERVER['REMOTE_ADDR'];
if($_REQUEST['value'])
{
	$id = $_REQUEST['value'];
	$result = mysql_query("select users_ip from ratings where users_ip='$users_ip'");
	$num = mysql_num_rows($result);
 
	if($num==0)
	{
		$query = "insert into ratings (rating,users_ip) values ('$id','$users_ip')";
		mysql_query( $query);
 
		$result=mysql_query("select sum(rating) as rating from ratings");
		$row=mysql_fetch_array($result);
 
		$rating=$row['rating'];
 
		$quer = mysql_query("select rating from ratings");
		$all_result = mysql_fetch_assoc($quer);
		$rows_num = mysql_num_rows($quer);
		if($rows_num > 0){
		$get_rating = floor($rating/$rows_num);
		$rem =  5 - $get_rating;
		}
      }
}
?>