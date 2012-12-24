				<div id="header_image">
				<?php
					$fcontents = join ('', file ('inc/head_banners.php'));
					$s_con = explode("~",$fcontents);
					
					$banner_no = rand(0,(count($s_con)-1));
					echo $s_con[$banner_no];
				?>
				</div><! -- /header_image -->
