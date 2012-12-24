<?php require_once('inc/q/user.php'); //meat and potatoes of all queried information for this page ?>
<!DOCTYPE html>
<html>
<head>
	<title>UReviewDU | Reviews of Drexel University Professors - User :<?php if($sth0->rowCount() > 0) {$row0 = $sth0->fetch(PDO::FETCH_ASSOC);echo "&nbsp;{$row0['uname']}";} else {echo "Unknown User Profile";}unset($sth0);?>
	</title>
	<link rel="stylesheet" href="global.css"  media="screen" />
	<link rel="stylesheet" href="design.css"  media="screen" />
	<script type="text/javascript" src="inc/val.js" /></script>
	<script src="inc/load_header_banners.js" type="text/javascript"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="inc/modal.js"></script>
<!--<script src="rating/jquery.min.js" type="text/javascript"></script>-->
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
		<div id="usrLeft">
<?php if ($row = $sth->fetch(PDO::FETCH_ASSOC)) : ?>
<h2>User Profile: <?php echo htmlspecialchars($row['uname']) ?></h2>
<span>Registered: <?php echo htmlspecialchars($row['regDate']) ?><br></span>
<span>Year: <?php echo htmlspecialchars($row['currGrade']) ?></span>
<?php $sth->closeCursor(); else : ?>
<h2>User Profile: No data.</h2>
<span>Registered Date: No Data.<br /></span>
<span>Current Grade: No Data.<br /></span>
<?php endif ?>			
			<span><br> Reviews: <?php if($sth1->rowCount() > 0) {$row1 = $sth1->fetch(PDO::FETCH_ASSOC);echo "&nbsp;{$row1['uname']}";} else {echo "Unknown Post Count";}unset($sth1);?></span>
		</div><!--usrLeft-->
		<div id="usrMid">
		mid
		
		</div><!--usrMid-->
		<div id="usrRight">
		righ
		</div><!--usrRight-->
		<div id="clear"> </div>
	</div><!--wrapper_bottom-->
	<?php require_once('inc/copy.php'); ?>
	</div><!-- /wrapper_bottom -->
</div><!-- /bot_wrapper_bg -->
<?php require_once('inc/addProfWdw.php'); ?>
<?php $fbkpage = $_SERVER["REQUEST_URI"]; require_once('inc/fbk.php'); ?>
</body>
</html>