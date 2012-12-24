<?php session_start(); ?>
<?php require_once('inc/q/prof.php'); //meat and potatoes of all queried information for this page ?>
<!DOCTYPE html>
<html>
<head>
	<title>UReviewDU - Drexel University Professor Rating of <?php if($sth0->rowCount() > 0) {$row0 = $sth0->fetch(PDO::FETCH_ASSOC);echo "{$row0['fname']} {$row0['lname']}";} else {echo "Drexel University Professor";}unset($sth0);?></title>
	<link rel="stylesheet" href="global.css"  media="screen" />
	<link rel="stylesheet" href="design.css"  media="screen" />
	<link rel="stylesheet" href="slide.css"  media="screen" />
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Start rating your professors at Drexel University today! Create an account and anonymously review and compare." />
	<meta name="keywords" content="Drexel University, Professor Reviews Drexel, Drexel Ratings, Teachers at Drexel, PA, Pennsylvania, Joseph Dickinson" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="inc/val.js" /></script>
	<script type="text/javascript" src="inc/resize.js" /></script>
	<script type="text/javascript" src="inc/slide.js"></script>
	<script type="text/javascript">
	$('textarea#addComment.verifyText').autoResize({
    // On resize:
    onResize : function() {
        $(this).css({opacity:0.8});
    },
    // After resize:
    animateCallback : function() {
        $(this).css({opacity:1});
    },
    // Quite slow animation:
    animateDuration : 300,
    // More extra space:
    extraSpace : 40
});
	</script>
<script src="inc/load_header_banners.js" type="text/javascript"></script>
<script type="text/javascript" src="inc/modal.js"></script>
<?php require_once('inc/analytics.php'); ?>
<!--rating js and css-->
</head>
<body>
<div id="top_wrapper_bg">
<?php require_once('panel.php'); ?>
	<div id="wrapper_top">
	<?php require_once('inc/header.php'); ?>
	<?php require_once('inc/topFunctions.php'); ?>			
	</div><!-- /wrapper_top -->
</div><!-- /top_wrapper_bg -->
															
<div id="header_search_break"> </div>

<div id="bot_wrapper_bg">		
	<div id="wrapper_bottom">
			<div id="left_professor_overview">
							<?php
				// Did we get any *professor detail*
				if($sth->rowCount() > 0) {
				    $row = $sth->fetch(PDO::FETCH_ASSOC);
				    echo "<img style='float:left;' src='img/profViewIcon.png' alt='Professor {$row['fname']} {$row['lname']} at Drexel' />
				    <h1> <span title='{$row['fname']} {$row['lname']} at Drexel University'> {$row['fname']} {$row['lname']} </h1></span>";
				    echo "
				    <div class='professor_pic'>
						<img src='{$row['picpath']}' />
					</div><!-- /professor_pic -->
					<div class='professor_desc'>
							<div class='goLeft'>
							<span class='one'><strong>Department:</strong> {$row['name']} </span><br />
							<span class='two' style='margin:0 1px;'><strong>Email:</strong><a href='mailto:{$row['email']}'>
								<img style='margin:1px; padding:0;' src='img/profEmailIcon.png' width='24' height='24' border='0' /></a>
							</span>								
							<br /><br />
							<span class='two' style='font-size:1.50em;'>
							<img src='img/commentOnProf.png' class='left' />&nbsp;<a href='#addComment' style='font-weight:bold;'>Write A Comment</a>"; // end echo
				} else {
				    echo "No results.";
				}
				unset($sth);
				?>
							</div><!--goleft-->	
							<div class="goRight">
									<span class="one" style="padding-right:5px;">
									<img class="left" width="17" height="17" src="img/posComment.png" />
									Positive: <?php if($sth4->rowCount() > 0) {$row4= $sth4->fetch(PDO::FETCH_ASSOC); echo "{$row4["count(Exp)"]}"; } else {echo "0";}unset($sth4);?> 
									<img src="img/neuComment.png" width="17" height="17" />
									Neutral: <?php if($sth5->rowCount() > 0) {$row5= $sth5->fetch(PDO::FETCH_ASSOC); echo "{$row5["count(Exp)"]}"; } else {echo "0";}unset($sth5);?> 
									<img width="17" height="17" src="img/negComment.png" />
									Negative: <?php if($sth6->rowCount() > 0) {$row6= $sth6->fetch(PDO::FETCH_ASSOC); echo "{$row6["count(Exp)"]}"; } else {echo "0";}unset($sth6);?>
								    </span>
								
							</div><!--goRight-->
							<div id="clear"> </div>
					</div><!-- /professor_desc-->
		
				<div id="clear"> </div>				
<div class="professor_comments">
<?php																		 
				#Show Recent Comments
				$theCommentID = $row['CommID'];
				echo "<h2 style='margin:0; padding:0;'>Recent Comments</h2>";
				if ($sth2->rowCount()) {									 
  				while($row = $sth2->fetch(PDO::FETCH_ASSOC)) {				 
    				echo "<div class='comment'> By <strong>{$row['usr']}</strong> on {$row['date']} about <code><a href='course.php?cID={$row['cID']}'>{$row['prefix']} {$row['code']}</a>&nbsp;</code>  during  {$row['Qtr']},  {$row['Yr']} <span style='float:right; padding-right:5px;'><img src='img/report.png' /> <a class='report' href='report.php?commID={$row['CommID']}'>Report</a></span><br />{$row['info']} 
    				      </div><!--/COMMENT-->";
  					}														 
				}															 
				else {														 
  				echo "<div class='comment'><h2 style='color:red;'> No Comments Found, please add some below</div>";
				}
				unset($sth2);													 															 
?>		
</div><!--/professor_comments-->		
												 
				<!--Insert A Comment(s) about given course-->														 
				<img src="img/commentBelowIcon.png" style="margin-left:30px;" width="26" height="26" class="left" /><h3>Add Comment</h3>
				<?php if(!empty($_GET['pID'])) $the_pID = mysql_real_escape_string($_GET['pID']); 
				$thedt = date("Y-m-d"); $theUsrSubmitting = $_SESSION['id']; ?>								 
				<form action="inc/q/prof.php?pID=<?php echo $the_pID; ?>" method="post" id="addition">            
                    <select id="courseInfoDD"  class="verifyText" name="courseInfoDD" tabindex="1">
                    <option  disabled="disabled">Course...</option>
		                    <?php while($row3 = $sth3->fetch(PDO::FETCH_ASSOC))
				                    {echo "<option value=". $row3['cID'] . ">" .$row3['prefix']." ".$row3['code']."</option>";}
		                    ?>
		            </select>    
  
                    <select id="commQuarter" class="verifyText" name="commQuarter" tabindex="2" >
                    		<option  disabled="disabled">Quarter...</option>
				             <option value="Fall">Fall</option>
				             <option value="Winter">Winter</option>
							 <option value="Spring">Spring</option>
							 <option value="Summer">Summer</option>
		            </select> 

             <select id="commYr" name="commYr" class="verifyText" tabindex="3">
							<option  disabled="disabled">Year...</option>
							<?php $startdate = 2000;$enddate = date("Y");$years = range ($startdate,$enddate);foreach($years as $year){echo "<option value='$year'>$year</option>";}?>
		      </select>  
		    
                    <select id="commExp" class="verifyText" name="commExp" tabindex="4" >
                    	<option disabled="disabled">Overall Experience</option>
				        <option value="1">Positive</option>
				        <option value="2">Neutral</option>
						<option value="3">Negative</option>
		            </select> 		     
		     
			<div class="field required">
					<textarea type="text" id="addComment" class="verifyText" name="addComment" tabindex="5" value="Enter comment"></textarea>
		     </div> <!--/field required-->
             	<input type="hidden" name="dt" value="<?php echo $thedt; ?>" />
             	<input type="hidden" name="pID" value="<?php echo $the_pID; ?>" />
             	<input type="hidden" name="usr" value="<?php echo $theUsrSubmitting; ?>" />
             	<br />
             	<div class="field required">
				<div class="att"><a href="#?w=500" rel="popup_name6" class="poplight">Agree To Terms?</a></div><br />
             	Yes:&nbsp;<input type="radio" name="terms" value="Yes" id="accepting" tabindex="6" />
             	No:&nbsp;<input type="radio" name="terms" value="No"  id="accepting" tabindex="7" />
             	</div>
             	<p class="iferror">Please correct the above.</p>
             	
                <input type="submit" value="Submit" name="submit" id="submit" tabindex="8" />
                </form> 
             </div>   
             <!--  
             <div class="professor_panel">
             	<div>
             	<h4><img src="img/reportProfError.png" width="22" height="22" class="left" /> Report An Error</h4>
             	</div>
             </div>    
             -->
             <div class="clear"> </div>
<?php require_once('inc/topFunctions.php'); ?>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />	
	</div><!-- /wrapper_bottom -->
</div><!-- /bot_wrapper_bg-->
<?php require_once('inc/addProfWdw.php'); ?>
<?php $fbkpage = $_SERVER["REQUEST_URI"]; require_once('inc/fbk.php'); ?>
</body>
</html>