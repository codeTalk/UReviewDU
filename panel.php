<script>function clearText(field){if (field.defaultValue == field.value) field.value = ''; else if (field.value == '') field.value = field.defaultValue;}</script> 
<!-- Panel -->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
			<!--info-->

			</div>
            
            
            <?php
			
			if(!$_SESSION['id']):
			
			?>
            
			<div class="left">
				<!-- Login Form -->
				<form class="clearfix" action="" method="post">
					<h2>Login</h2>
                    
                    <?php
						
						if($_SESSION['msg']['login-err'])
						{
							echo '<div class="err">'.$_SESSION['msg']['login-err'].'</div>';
							unset($_SESSION['msg']['login-err']);
						}
					?>
					
					<input class="field" type="text" name="username" id="username" value="User" size="23" onFocus="clearText(this)" />
					<input class="field" type="password" name="password" id="password" value="Pass" size="23" onFocus="clearText(this)" />
	            	<label><input name="rememberMe" id="rememberMe" type="checkbox" checked="checked" value="1" /> &nbsp;Remember me</label>
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Login" class="bt_login" />
				</form>
			</div>
			<div class="left right">			
				<!-- Register Form -->
				
				<form action="" method="post">
					<h2>Sign Up!</h2>		
                    <?php echo $id; ?>
                    <?php
						
						if($_SESSION['msg']['reg-err'])
						{
							echo '<div class="err">'.$_SESSION['msg']['reg-err'].'</div>';
							unset($_SESSION['msg']['reg-err']);
						}
						
						if($_SESSION['msg']['reg-success'])
						{
							echo '<div class="success">'.$_SESSION['msg']['reg-success'].'</div>';
							echo "HI THERE" . $_SESSION['id'];
							unset($_SESSION['msg']['reg-success']);
						}
					?>
                    		
					<input class="field" type="text" name="username" id="username" value="User" value="" size="23" onFocus="clearText(this)" />
					<input class="field" type="text" name="email" id="email" value="Email" size="23" onFocus="clearText(this)" />
					<label>A password will be e-mailed to you.</label>
					<input type="submit" name="submit" value="Register" class="bt_register" />
				</form>
			</div>
            
            <?php
			
			else:
			
			?>
            
            <!--<div class="left">-->
            <div style="width:500px;">
            <span style="float:right; margin-right:10px;">(<a href="?logoff">Log off</a>)</span> 
            <h1 style="margin:2px; padding:0;"> <img src="img/memProtLock.png" width="23" height="26" align="left" /> Members panel</h1>
            <?php echo $id; ?>
            <!--<a href="registered.php">View a special member page</a>-->
            <p style="font-size:1.6em;">We're in the midst of adding more user functionality.</p>
            <p>For the time being you can build you credibility by rating professors below. Please <a style="font-size:1.6em;" href="#?w=380" style="font-size:1.7em;" rel="popup_name5" class="poplight" title="Subscribe UReviewDU Website Updates">Subscribe</a> to get future, feature updates as soon as released.<br /></p>
            <p>- UReviewDU Staff</p>

            </div><!--width:500px;-->
            <!--
            <div class="left right"> </div>
            -->
            
            <?php
			endif;
			?>
		</div>
	</div> <!-- /login -->	

    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	        <li>Hello <?php echo $_SESSION['usr']  ? $_SESSION['usr'] : 'Dragon';?>!</li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#"><?php echo $_SESSION['id']?'Open Panel':'Log In | Register';?></a>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
			</li>
	    	<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div> <!--panel -->

<div class="pageContent">
    <div id="main">
      <div class="container">
	<!--content was initially here-->
    </div>
</div>
