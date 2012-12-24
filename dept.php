<?php session_start(); ?>
<?php require_once('inc/q/dept.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>UReviewDU - Ratings of Professors at Drexel University Philadelphia, PA</title>
	<link rel="stylesheet" href="global.css"  media="screen" />
	<link rel="stylesheet" href="design.css"  media="screen" />
	<link rel="stylesheet" href="slide.css"  media="screen" />
	
	<style type="text/css">
	.hidden {
    display: none;
	}
	</style>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Departments at Drexel University with ratings and reviews of professors. Rate, compare, and match." />
	<meta name="keywords" content="Drexel University, Departments, Reviews Professors, DU, Joseph Dickinson" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="inc/slide.js"></script>
<script type="text/javascript"> 
$(document).ready(function(){
    $("input[type=radio]").click(function(){
       $("#it").val(this.value);
    }); 
});
</script>
<script type="text/javascript" src="inc/modal.js"></script>
<?php require_once('inc/analytics.php'); ?>
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
	<div id="output_results" style="width:665px;">
				<?php
				//echo "{$row['Department.name']}";
				echo "<div id='left_dept_overview' style='width:780px;'>";
					if($sth->rowCount() > 0) {
					$row = $sth->fetch(PDO::FETCH_ASSOC);
				 	echo "<div style='width:660px;'><img class='left' src='img/deptArrow.png' width='22' height='22' style='margin:5px 0 0 5px;' alt='{$row['name']} Department Ratings Drexel' /><h2 style='width:665px;'>&nbsp;{$row['name']} Department at Drexel</h2></div>";
				 	} 
				 	else {
				 		echo "This department has no professors yet. Please <a href='#?w=500' rel='popup_name' class='poplight'><strong>Add some</strong></a>.";
				 		}		 
					echo "<div class='dept_res' style='width:660px;'>";
					while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
					echo "<div><div class='dept_prof'><a href='prof.php?pID={$row['pID']}' title='{$row['fname']} {$row['lname']} Reviews at Drexel'><img src='{$row['picpath']}' width='118' height='118' /></a></div></div>";
					}
				unset($sth);
				
				echo "<div class='clear'> </div></div>";
				echo "</div>";
				?>
	
	</div><!--/output_results-->
	<div id="course_teachers_taught" style="width:240px; margin:30px 10px 0 0;">
	<h1 class="cen" style="-moz-border-radius:5px;">Department Stats</h1>
		<div>
		<span class="CTT_break" style="height:4px"> </span>
	   <?php /*echo displays amount of professors in dept*/ if($sth3->rowCount() > 0) {$row3 = $sth3->fetch(PDO::FETCH_ASSOC);echo "<div class='XL'><span class='XXL'>{$row3['pID_count']}</span><div class='nosp' style='font-size: .9em;'>Professors</div></div>";}else {echo "Nunca."; } ?>
	   <span class="CTT_break" style="height:2px"> </span>
		<?php /*echo displays amount of professors in dept with a comment*/ if($sth2->rowCount() > 0) {$row2 = $sth2->fetch(PDO::FETCH_ASSOC);echo "<div class='XL'><span class='XXL'>{$row2['count(p.pID)']}</span><div class='nosp' style='font-size: .9em;'>Comments</div></div>";}else {echo "Nunca."; } ?>
		
		</div><!-- course_teachers_taught div -->
	</div><!-- course_teachers_taught -->

<?php require_once('inc/topFunctions.php'); ?>		
  <div id="clear"> </div>

		<br><br><br><br><br><br><br><br><br><br><br><br><br>
	</div><!-- /wrapper_bottom -->
</div><!-- /bot_wrapper_bg -->
<?php require_once('inc/addProfWdw.php'); ?>
<?php $fbkpage = $_SERVER["REQUEST_URI"]; require_once('inc/fbk.php'); ?>
</body>
</html>