<?php require_once('inc/q/course.php'); ?>
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
<script type="text/javascript"> 
$(document).ready(function(){
    $("input[type=radio]").click(function(){
       $("#it").val(this.value);
    }); 
});
</script>
<script type="text/javascript" src="inc/modal.js"></script>	
</head>

<body>
<div id="top_wrapper_bg">
	<div id="wrapper_top">
	<?php require_once('inc/header.php'); ?>
	</div><!-- /wrapper_top -->
</div><!-- /top_wrapper_bg -->
															
<div id="header_search_break"> </div>


<div id="bot_wrapper_bg">		
	<div id="wrapper_bottom">
<?php require_once('inc/topFunctions.php'); ?>		
		<div id="left_course">
			<div id="left_course_overview"><!-- display course detail -->
			<div id="course_name">
				<?php
					// Get the course prefix and code ex : INFO 420, set as title
					if($sth->rowCount() > 0) {
				    	$row = $sth->fetch(PDO::FETCH_ASSOC);
				    	echo "<div> <h2>{$row['prefix']} {$row['code']}</h2></div>";
						} else {
				    	echo "No results.";
					}
				unset($sth);
				?>
			</div><!-- /course_name -->
			<div id="course_detail">
			 	<?php
			 	if ($sth2->rowCount()) {
  				while($row2 = $sth2->fetch(PDO::FETCH_ASSOC)) {
    				echo "<p>{$row2['date']} <img src='img/ProfessorTag.png' alt='Drexel Course Rating about {$row2['fname']} {$row2['lname']}'/> {$row2['fname']} {$row2['lname']}<br />
    				<img class='left' style='margin:5px;' src='img/courseComment.png'/> {$row2['info']}</p>";
  					}
				}
				else {
  				echo "<h3 style='color:red;'> No comments found, please <a href='index.php'>find a professor</a> .</h3></div>";
				}
				unset($sth2);
			echo "</div>";
				?>
			
			<div id="course_teachers_taught">
				<?php
				echo "<h3 class='orange'>Taught in the past by:</h3>"; 
			 	if ($sth4->rowCount()) {
  				while($row = $sth4->fetch(PDO::FETCH_ASSOC)) {
    				echo "<a href='prof.php?pID={$row['pID']}'><img class='left' style='padding:2px;' src='{$row['spicpath']}' border='0' title='{$row['fname']} {$row['lname']} Drexel' /></a>";
  					}
				}
				else {
  				echo "<h4 style='color:red;'>No Teachers have taught this course yet. Please <a href='#?w=500' rel='popup_name' class='poplight'>add some</a> .</h4></div>";
				}
				unset($sth4);
				?>

			</div> <!--/course_teachers_taught-->
			<div class="clear"> </div>
			</div><!-- /left_course_overview-->
		</div><!-- /left_course -->
			<div id="clear"> </div>
		<br><br><br><br><br><br><br><br><br><br><br><br><br>
	<?php require_once('inc/copy.php'); ?>
	</div><!-- /wrapper_bottom -->
</div><!-- /bot_wrapper_bg -->
<?php require_once('inc/addProfWdw.php'); ?>
<?php $fbkpage = $_SERVER["REQUEST_URI"]; require_once('inc/fbk.php'); ?>
</body>
</html>