 	<?php
	require_once('inc/dbc1.php');
	?>
 <?php
 
    if(isset($_POST['submit'])) {
    $to = "jpd750@gmail.com";
$subject = "UREVIEWDU: Reported Comment"; 
$submitterName = mysql_real_escape_string($_POST['fullname']); 
$submitterEmail = mysql_real_escape_string($_POST['email']); 
$reportType = mysql_real_escape_string($_POST['ReportType']); 
$addedReportInfo = mysql_real_escape_string($_POST['AComment']);
$CommentInQuestion = $_POST['commentid']; 
$usrBrowser = $_POST['brwsr'];
$DateOfSubmission = $_POST['submittedDt']; 	
	
	#Course_Output
    $body = "****************************** - $subject - ******************************\n\n
    ///////////////////////////////////////////////////////////////////////////////////////
    ->Submitter: $submitterName\n\n
    ->Email: $submitterEmail\n\n
    ----------------------------------------------------------------------------------------
    ->Comment Type: $reportType\n\n\
    &nbsp;&nbsp->Added Comment:$addedReportInfo\n\n\
    ->Comment ID: $CommentInQuestion\n\n
    ----------------------------------------------------------------------------------------
    ->Browser:$usrBrowser\n\n 
    ->Date: $DateOfSubmission\n\n
    ///////////////////////////////////////////////////////////////////////////////////////
    ";
    echo "Thanks for your suggestion, we will remove this comment if necessary."; mail($to, $subject, $body); } else {echo "Cannot Send email, please contact us at jpd750@gmail.com\n\n Thank you!!";}?>