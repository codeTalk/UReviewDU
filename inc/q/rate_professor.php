<?php
$pID = filter_input(INPUT_GET, 'pID', FILTER_SANITIZE_NUMBER_INT);
if(!$pID) {
    echo "No pID specified.";
    exit;
}
require_once('inc/dbc2.php');

// connect to database
$dbh=mysql_connect ("$host", "$username", "$password") or die ('Cannot connect to the database');
mysql_select_db ("$db",$dbh);

if($_GET['do']=='rate'){
	// do rate
	rate();
}else if($_GET['do']=='get rate'){
	// get rating
	getRating();
}

// function to retrieve
function getRating(){
	$sql= "SELECT * FROM vote WHERE pID = ?";
	$result=@mysql_query($sql);
	$rs=@mysql_fetch_array($result);
	// set width of star
	$rating = (@round($rs[value] / $rs[counter],1)) * 20; 
	echo $rating;
}

// function to insert rating
function rate(){
	$text = strip_tags($_GET['rating']);
	$update = "UPDATE VOTE SET counter = counter + 1, value = value + ".$_GET['rating']." + ".$pID['pID']."";

	$result = @mysql_query($update); 
	if(@mysql_affected_rows() == 0){
		$insert = "INSERT INTO vote (counter,value, pID) values ('1','".$_GET['rating']."','".$pID['pID']."')";
		$result = @mysql_query($insert); 
	}
}
?>