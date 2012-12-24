	<?php
	ECHO "<b>Original Pass</b>: $_POST[apass] <br />";
	$hash = hash('sha512', '$_POST[apass]');
	ECHO "<b>Hashed Version:</b>";
	var_dump($hash);
	?>