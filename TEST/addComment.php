<?php
$link = mysql_connect('localhost',"root","Jacked.1988");
mysql_select_db("UREVIEWDU", $link);

$arr = array();
$cID = mysql_real_escape_string( $_POST["courseID"] );
$cCode= mysql_real_escape_string( $_POST["courseCode"] );
$cComm = mysql_real_escape_string( $_POST["comment"] );
switch ($_POST["table"])
{
    case 'courseID';
        $arr = getCourseID($cID);
        break;
    case 'courseCode';
        $arr = getCourseCode($cCode);
        break;
}

echo json_encode( $arr );

function getCourseID($cID){
    $arr = array();

    $query = mysql_query("SELECT cID 
                            FROM Course 
                            WHERE cID LIKE '%". $cID . "%'");

    while( $row = mysql_fetch_array ( $query ) )
    {
        $arr[] = array( "id" => $row["cID"]);
    }

    return $arr;
}

function getCourseCode($cCode){
    $arr = array();

    $query = mysql_query("SELECT code
                            FROM Course 
                            WHERE code LIKE '%". $cCode . "%'"
                            );

    while( $row = mysql_fetch_array ( $query ) )
    {
        $arr[] = array( "cCode" => $row["code"]);
    }

    return $arr;
}
?>