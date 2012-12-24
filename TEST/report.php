   <script type="text/javascript" src="inc/val.js" /></script>
<!DOCTYPE html>
<html>
<head>
	<title>UReviewDU :: Rate Professors at Drexel - Report Bad Comment</title>
	<link rel="stylesheet" href="global.css"  media="screen" />
	<link rel="stylesheet" href="design.css"  media="screen" />
	<style type="text/css">
	.hidden {
    display: none;
	}
	</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
<script type="text/javascript" src="inc/modal.js"></script>
</head>
<body>
<div id="top_wrapper_bg">
	<div id="wrapper_top">
	<?php require_once('inc/header.php'); ?>
	<?php require_once('inc/topFunctions.php'); ?>		
	</div><!-- /wrapper_top -->
</div><!-- /top_wrapper_bg -->
															
<div id="header_search_break"> </div>

<div id="bot_wrapper_bg">		
	<div id="wrapper_bottom">
	<?php
require_once('inc/dbc.php');
	?>
<div id="leftSm">
	<img src="img/reportErrorIcon.png" width="32" height="32" alt="Report Comment UREVIEWDU" align="left" /><h1 style="padding:5px 15px 15px 5px;">&nbsp;Report this Comment: </h1>
	<div id="reportComment">
		<?php if(!empty($_GET['commID'])) $theCOMMID = mysql_real_escape_string($_GET['commID']); $thedt = date("Y-m-d"); $b = $_SERVER['HTTP_USER_AGENT'];?>	
		<form action="inc/report.php" method="post" id="reporting"> 
			Name: <input type="text" class="verifyText" name="fullname" /><br /><br />
			Email: <input type="text" class="verifyMail" name="email" /><br /><br />
			Type: 
			<select name="ReportType">
				<option disabled="disabled">Please Choose</option>
				<option value="Spam">Spam</option>
				<option value="Derogatory">Derogatory</option>
				<option value="Phishing">Phishing</option>
				<option value="Too Short">Too Short</option>
				<option value="Other">Other (Please, specify)</option>
			 </select><br /><br />
			&nbsp;&nbsp;Specify<input type="text" name="AComment" /><br /><br />
			<input type="hidden" name="brwsr" value="<?php echo "$b"; ?>" />
			<input type="hidden" name="commentid" value="<?php echo "$theCOMMID"; ?>" />
			<input type="hidden" name="submittedDt" value="<?php echo "$thedt"; ?>" />		
			
			<input type="submit" name="submit" />
		</form>
	</div><!--reportComment-->
</div><!--leftSm-->
	<img src="img/whyReport.png" width="32" height="32" alt="Why Report a Comment UReviewDU" align="left" />
	<h1 style="padding:5px 15px 15px 5px;">&nbsp;3 Reasons Why Reporting Helps </h1>
<div id="rightMd">
<div id="reasonsReportComment">
	<ul id="reasonsReportComment">
		<li><strong>Our Time is Precious</strong> - no one wants to read spam, advertising, or non-useful comments when deciding on the next professor to take.</li>
		<li><strong>More Accurate Results</strong> - when viewing a professor, whether they've received primarily positive,negative, or neutral posts is a big deal! Each counts.</li>
		<li><strong>The Feeling of Gratification</strong> - knowing you are post-by-post helping to create a more accurate view of professors for everyone!</li>
	</ul><!-- UL: reasonsReportComment-->
</div><!--reasonsReportComment-->
</div><!--rightMd-->
		<div id="clear"> </div>
		<br />
	<?php require_once('inc/copy.php'); ?>
	</div><!-- /wrapper_bottom -->
</div><!-- /bot_wrapper_bg -->
<?php require_once('inc/addProfWdw.php'); ?>
<?php $fbkpage = $_SERVER["REQUEST_URI"]; require_once('inc/fbk.php'); ?>
</body>
</html>