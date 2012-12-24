 <?php
    if(isset($_POST['submit'])) {
    $to = "jpd750@gmail.com";
/*Course*/ $subject = "Suggestion for New Course / Professor"; $addType_field = $_POST['addType']; $coursePrefix = $_POST['cPrefix']; $courseCode = $_POST['cCode']; $deptName = $_POST['deptName'];
/*Professor*/  $profFName = $_POST['fName']; $profLName = $_POST['lName'];  $dptID = $_POST['dID'];
	
	
	#Course_Output
    $body = "////////////////////////////////////////// - $subject - //////////////////////////////////////////\n\n
    Add New ?? $addType_field\n------------------------------------------------------\nCourse Prefix: $coursePrefix\n------------------------------------------------------\nCourse Number: $courseCode\n------------------------------------------------------\nDepartment: $deptName\n

    Professor First Name: $profFName\n------------------------------------------------------\nProfessor Last Name:$profLName\n------------------------------------------------------\nDepartment Name: $deptName\n
    SQL: INSERT INTO Course (prefix, code, dID) VALUES ('$coursePrefix', $courseCode, $dptID);
    \n\n
    ";
    echo "Thanks for your suggestion, once verified it will be added."; mail($to, $subject, $body); } else {echo "Cannot Send email, please contact us at {j}{p}{d}750@gmail.com\n Please remove {}.!";}?>