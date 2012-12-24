<?php require_once('inc/q/homepage_data.php'); ?>
<?php require_once('inc/homepage_stats.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>UReviewDU - Ratings of Professors at Drexel University Philadelphia, PA</title>
	<link rel="stylesheet" href="global.css"  media="screen" />
	<link rel="stylesheet" href="design.css"  media="screen" />
	<style type="text/css">
	.hidden {
    display: none;
	}
	</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="inc/modal.js"></script>
<script type="text/javascript"> 
$(document).ready(function(){
    $("input[type=radio]").click(function(){
       $("#it").val(this.value);
    }); 
});
</script>

<script type="text/css">
$(function() {
    $('.keywords').keyup(function() {
        this.value = this.value.toUpperCase();
    });
});
</script>
<?php require_once('inc/livesearch-home.php'); ?>	
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
	<div id="search">
	    <input type="radio" name="table" class="table" value="professor" tabindex="1" /> Professor
	    <input type="radio" name="table" class="table" value="department" tabindex="2" /> Department
	    <input type="radio" name="table" class="table" value="course" tabindex="3" /> Course
	    <input type="text" name="search" class="keywords" value="Select an option..." onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?':this.value;" tabindex="4"  />
	    <div id="content"> </div>
	    
	    <div id="site_stats">
			    <h1 title="Latest UReviewDU Statistics">Latest Stats</h1>
			   <div class="stat"><img src="img/profStatIcon.png" width="48" height="48" alt="UReviewDU Professors" /><div class="XL">
			    		<?php if ($sth3->rowCount()) {while($row3 = $sth3->fetch(PDO::FETCH_ASSOC)) {echo "<span class='XXL'>{$row3['count(pID)']}</span>";}}else {echo "blah";} ?> Professors</div>
			    </div><!--/Professors Stat-->
			    <div class="stat"><img src="img/courseStatIcon.png" width="48" height="48" alt="UReviewDU Drexel Courses" /><div class="XL">
			    		<?php if ($sth2->rowCount()) {while($row2 = $sth2->fetch(PDO::FETCH_ASSOC)) {echo "<span class='XXL'>{$row2['count(cID)']}</span>";}}else {echo "blah";} ?> Courses</div>
			    </div><!--/Courses Stat-->
				<div class="stat"><img src="img/ratingStatIcon.png" width="48" height="48" alt="UReviewDU Drexel Course Ratings" /><div class="XL">
			    		<?php if ($sth4->rowCount()) {while($row4 = $sth4->fetch(PDO::FETCH_ASSOC)) {echo "<span class='XXL'>{$row4['count(commID)']}</span>";}}else {echo "blah";} ?>    Comments</div>
			    </div><!--/Courses Stat-->
		</div><!--/site_stats-->
	    <div class="clearL"> </div>
	    
	</div>
	<div id="right" style="margin-top:10px;">
		<div id="rightUpload"><a href="#"><span>Upload Your<br>Picture!</span></a></div>
		<div id="rightLogin">
			<div class="functions_signup" style="float:left; background-color:none; border:0; border-radius:0; -moz-border-radius:0;">
			<a href="#?w=380" rel="popup_name4" class="poplight" title="UReviewDU Signup to Rate Professors Drexel">Signup</a>&nbsp;|&nbsp;</div><!--function4--> <!-- SIGNUP -->
			<div class="functions_signup" style="float:left;background-color:none; border:0; border-radius:0; -moz-border-radius:0;">
			<a href="#?w=380" rel="popup_name5" class="poplight" title="UReviewDU Login to Rate Professors Drexel">Login</a></div><!--function4--> <!-- SIGNUP -->
		<div class="clearL"> </div>
		</div><!--rightLogin-->
		
		
		<!--<div id="rightSubscribe">subscribe</div>-->
		<div><h4 style="text-align:center;">New Professors</h4></div>
		<div id="rightInfo">
				<?php
			 	if ($sth1->rowCount()) {
  				while($row1 = $sth1->fetch(PDO::FETCH_ASSOC)) {
    				echo "<a href='prof.php?pID={$row1['pID']}'>{$row1['fname']}  {$row1['lname']}</a>";
  					}
				}
				?>
		</div><!--/rightInfo-->			
	</div><!--/right-->	
<div id="clear"> </div>
		<br><br><br><br><br><br>
	<?php require_once('inc/copy.php'); ?>
	</div><!-- /wrapper_bottom -->
</div><!-- /bot_wrapper_bg -->
<?php require_once('inc/addProfWdw.php'); ?>
<?php $fbkpage = $_SERVER["REQUEST_URI"]; require_once('inc/fbk.php'); ?>
</body>
</html>