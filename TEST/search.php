<?php
require_once('inc/dbc.php'); 
$arr = array();
$keywords = mysql_real_escape_string( $_POST["keywords"] );
switch ($_POST["table"])
{
    case 'professor';
        $arr = getProfessor($keywords);
        break;
    case 'department';
        $arr = getDepartment($keywords);
        break;
    case 'course';
        $arr = getCourse($keywords);
        break;
}

echo json_encode( $arr );

function getProfessor($keywords){
    $arr = array();

    $query = mysql_query("SELECT pID, lname, fname, picpath, email 
                            FROM Professor 
                            WHERE CONCAT(lname,fname) LIKE '%". $keywords . "%'");

    while( $row = mysql_fetch_array ( $query ) )
    {
        $arr[] = array( "id" => $row["pID"], "name" => $row["fname"] . ' ' . $row["lname"], "picture" => $row["picpath"], "emailaddr" => $row["email"]);
    }

    return $arr;
}

function getDepartment($keywords){
    $arr = array();

    $query = mysql_query("SELECT dID, name 
                            FROM Department 
                            WHERE name LIKE '%". $keywords . "%'");

    while( $row = mysql_fetch_array ( $query ) )
    {
        $arr[] = array( "id" => $row["dID"], "name" =>  $row["name"]);
    }

    return $arr;
}

function getCourse($keywords){
    $arr = array();

    $query = mysql_query("SELECT cID, prefix, code 
                            FROM Course 
                            WHERE CONCAT(prefix,code) LIKE '%".  $keywords . "%'");

    while( $row = mysql_fetch_array ( $query ) )
    {
		$arr[] = array( "id" => $row["cID"], "name" => $row["prefix"] . ' ' . $row["code"]);    }
	return $arr;
}
?>