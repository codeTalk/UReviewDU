<head>
<meta HTTP-EQUIV="REFRESH" content="2; url=/index.php">
</head> 
<?php if(isset($_POST['submit'])) {
$to = "joe@ureviewdu.com";
/*Course*/ 
$subject = "Suggestion for New Course / Professor"; 
$addType_field = $_POST['addType']; 
$coursePrefix = $_POST['cPrefix']; 
$courseCode = $_POST['cCode']; 
$deptName = $_POST['deptName'];

/*Professor*/ 
$profFName = $_POST['fName']; 
$profLName = $_POST['lName'];  
$dptID = $_POST['dID'];	


#Course_Output
$body = "////////////////////////////////////////// - $subject - //////////////////////////////////////////\n
***************************************************************************\n
***************************************************************************\n
\nAdd Type: $addType_field\n
***************************************************************************\n
***************************************************************************\n
Course Prefix: $coursePrefix\n
\nCourse Number: $courseCode\n
\nDepartment: $deptName\n
SQL: INSERT INTO Course (prefix, code, dID) VALUES ('$coursePrefix', $courseCode, $dptID);
***************************************************************************\n
Professor First Name: $profFName\n
Professor Last Name:$profLName\n
Department Name: $deptName\n
SQL: INSERT INTO Course (prefix, code, dID) VALUES ('$profFName', $profLName, $dptID);
\n\n
";
echo "Thanks for your suggestion, once verified it will be added.";

mail($to, $subject, $body); 
} else {
echo "Cannot Send email, please contact us at joe@ureviewdu.com";
}
?>