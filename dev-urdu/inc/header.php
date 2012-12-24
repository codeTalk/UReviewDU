		<div id="header">
				<div id="logo">
				<a href="index.php"><img src="img/logo-02-01-11.png" alt="logo-02-01-11" width="300" height="100" border="0" /></a>
				</div><!-- /logo -->
				<div id="header_image">
				<?php
					$fcontents = join ('', file ('inc/head_banners.php'));
					$s_con = explode("~",$fcontents);
					
					$banner_no = rand(0,(count($s_con)-1));
					echo $s_con[$banner_no];
				?>
				</div><! -- /header_image -->
				<div id="clear"> </div><! -- /clear -->
		</div><!-- /header-->
