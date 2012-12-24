   <script type="text/javascript" src="inc/val.js" /></script>
   <script type="text/javascript">
    $(document).ready(function() {
        $("#ProfFields,#courseFields").hide();
        $("input:radio[name='addType']").click(function(){
          var profFields = ($(this).val()=="Professor");
          $("#ProfFields").toggle(profFields); 
          $("#courseFields").toggle(!profFields);
     });
    });
    </script>
    <?php
    require_once('inc/dbc1.php');
    $pdo = new PDO('mysql:host=ureviewdu.db.6511651.hostedresource.com;dbname=ureviewdu', $u, $p);
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sth = $pdo->prepare('SELECT name FROM Department;');
    $sth->execute(array());
    /*----------------------------*/
    $pdo3 = new PDO('mysql:host=ureviewdu.db.6511651.hostedresource.com;dbname=ureviewdu', $u, $p);
    $pdo3->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sth3 = $pdo3->prepare('SELECT name FROM Department;');
    $sth3->execute(array());

    $pdo2 = new PDO('mysql:host=ureviewdu.db.6511651.hostedresource.com;dbname=ureviewdu', $u, $p);
    $pdo2->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sth2 = $pdo2->prepare('SELECT prefix, code FROM Course GROUP BY prefix;');
    $sth2->execute(array());
    ?>
    <div id="popup_name" class="popup_block">
        <h2 style="padding:0; margin:0;">Add a:</h2><br />
        <form action="inc/add_p_c_validate.php" method="post" id="addition"> 
            Professor<input type="radio" name="addType" value="Professor" />
            &nbsp;&nbsp;Course<input type="radio" name="addType" value="Course" /> 
     	 <div id="courseFields"><!--COURSE ///////// -->
		      <span class="sf" style="color:#29a4eb;">Course</span><br />
		     &nbsp;&nbsp;&nbsp;&nbsp;Prefix: <select name="cPrefix" id="cPrefix" style="width:105px;" /><option disabled="disabled">Select..</option>
		      	<?php while($row2 = $sth2->fetch(PDO::FETCH_ASSOC)) {echo "<option>".$row2['prefix']." "."</option><br />";} ?> </select>
		     &nbsp;&nbsp;&nbsp;&nbsp;Code: <input type="text" name="cCode" id="cCode" style="width:105px;" />	        
		       <br /><span class="sf" style="color:#f8af32;">Department</span><br />          
		     &nbsp;&nbsp;&nbsp;&nbsp;Department: <select name="deptName" id="deptName" style="width:350px;"><option disabled="disabled">Select..</option>
		       <?php while($row = $sth->fetch(PDO::FETCH_ASSOC)) {echo "<option>".$row['name']." "."</option>";} ?></select>   
     		 <input type="submit" name="submit" /> 
    	 </div><!--/courseFields-->
             <div id="ProfFields"><!--PROFESSOR ///////// -->
             <span class="sf" style="color:#29a4eb;">Professor Information</span><br />
	             <div class="field required">
	             	&nbsp;&nbsp;&nbsp;&nbsp;First Name: <input type="text" class="verifyText" name="fName" style="width:355px;" />
	             </div>
	             <div class="field required">
	             	&nbsp;&nbsp;&nbsp;&nbsp;Last Name: <input type="text" class="verifyText" name="lName" style="width:355px;" />
	             </div>
	             <div class="field required">
	              	&nbsp;&nbsp;&nbsp;&nbsp;Department: <select name="deptName" id="deptName" style="width:350px;"><option disabled="disabled">Select..</option>
	             	 <?php while($row3 = $sth3->fetch(PDO::FETCH_ASSOC)) {echo "<option>".$row3['name']." "."</option>";} ?></select>
	              </div>
	               <input type="submit" name="submit" />       
             </div><!--/ProfFields-->
        </form> 
    </div><!--popup_name-->
    <div id="popup_name1" class="popup_block">
    <img align="left" style="float:left;" src="img/about_blurb.png" width="35" height="35" alt="About UReviewDU" />
    <h2 style="float:left;">UReviewDU In A Nutshell</h2><br />
    <p class="sm"><br /><br /><a href="http://www.josephdickinson.com/joseph-dickinson-projects/">I established the idea</a>
     after transferring to Drexel in the Fall of 2009 and not having a clue about the level of difficulty of one professor
     compared to one another. At the time (and still) the websites reviewing Drexel University were lacking a lot of functionality, or had hardly any reviews of professors here at Drexel. The ultimate goal, forever, for UReviewDU is to help students make more informed choices when choosing courses at Drexel.</p>
    <br />
    <img style="float:left;" src="img/hope_to_address.png" width="35" height="35" alt="UReviewDU Goals for Student Success" />
    <h2>&nbsp;What UReviewDU Hopes to Address</h2>
    <p class="sm">
    <ul>
    	<li class="tick">The need for an anonymous Drexel rating system.</li>
    	<li class="tick">Provide, you, as the student a more in-depth view into future professors.</li>
    	<li class="tick">Develop a greater understanding of professor teaching styles.</li>
    	<li class="tick">Allow you to dictate what to share on social networking sites, not us.</li>
    	<li class="tick">To eventually be your one stop website before the start of any quarter.</li>
    </ul>
    </p>
    </div><!--ABOUT-->
    <!--DISCLAIMER ///////// -->
    <div id="popup_name2" class="popup_block"><img class="left" src="img/legal.png" title="UReviewDU Legal Use of Website" width="30" height="30" /><h3>Site Disclaimer</h3><p class="sm">The content on this website is developed on a real time basis in which users can express their opinions. The opinions expressed on this site do not reflect the those of the site and/or owner.</p><br /><p class="sm">The best effort is made to ensure that this content is not: malicious, derogatory, or not useful to students. However, given the number of submissions some content may slip through the cracks, for this reason there are links on every comment submitted that state "report to moderator". These links provide everyone a way of reporting comments that they feel are malicious.</p><br /><p class="sm">If you have any questions regarding the site or content contained within please use the contact form to the upper right and I will reply as soon as possible.</p></div><!--/popup_name2-->
   
   <div id="popup_name3" class="popup_block"><!--CONTACT ///////// -->
   <img class="left" src="img/contact.png" title="UReviewDU Legal Use of Website" width="30" height="30" /><h3 title="Email UReviewDU">Contact UReviewDU</h3>
           <form action="inc/contact_validate.php" method="post" id="addition"> 
			<div class="field required">
				First Name: <input type="text" class="verifyText" name="fName" id="fName" style="width:350px;" /><br />
			</div>
			<div class="field required">
			Last Name: <input type="text" class="verifyText" name="lName" id="lName" style="width:350px;" /><br />
			</div>
			<div class="field required">
			Email: <input type="text" class="verifyMail" name="email" id="email" /><br />
			</div>
			Who Are You? <select name="contactType" id="contactType" style="width:350px;">
			<option disabled="disabled">Select...</option><option>I have no affiliation</option><option>Student</option><option>Faculty</option><option>Other (Please Specify Below)</option></select>
			<br />Other: <input type="text" name="affOther" id="affOther" style="width:350px;" />
			<div class="field required">
			<br />Comments: <textarea name="comments" class="verifyText" id="comments" style="width:350px; height:100px;"> </textarea>
			</div>
           
           <input type="submit" name="submit" />       
             </div><!--/ProfFields-->
        </form> 
   </p></div><!--/popup_name3-->
    <div id="popup_name4" class="popup_block"><!--SIGNUP ///////// -->
    <img align="left" class="left" src="img/usrRegister.png" title="UReviewDU Registration" width="30" height="30" />
    <h3 title="UReviewDU User Student Registration"> User Registration</h3>
    <form action="inc/register/register.php" method="post" id="userRegistration">
	    <div class="cen"><h5>User Credentials</h5></div>
	    <div class="field required">
	    Username: <input type="text" name="reguser" tabindex="1" /><br />
	    </div>
	    <div class="field required">
	    Password: <input type="password" name="regpass" tabindex="2" /><br />
	    </div>
	    
	    <div class="cen"><h5>User Details</h5></div>
	    <div class="field required">
	    First Name:<input type="text" name="regfirst"  tabindex="3" /><br />
	    </div>
	    <div class="field required">
	    Last Name:<input type="text" name="reglast"  tabindex="4" /><br />
	    </div>
	    <div class="field required">
	    Email:<input type="text" name="regemail" tabindex="5" /><br />
	    </div>
	    <div class="field required">
	    Current Class:<select name="regclassrank"  tabindex="6">
	    <option disabled="disabled">Select Class</option>
		    <option value="1">Freshman</option>
		    <option value="2">Sophomore</option>
		    <option value="3">Pre-Junior</option>
		    <option value="4">Junior</option>
		    <option value="5">Senior</option>
	    <option></option>
	    </select>
	    </div>
	    <br />
	    <div class="cen"><input type="submit" name="submitUser" /></div>
    </form>
    
    
    </div><!--/popup_name4-->
    <div id="popup_name5" class="popup_block"><!--LOGIN ///////// -->
    <img align="left" class="left" src="img/userLogin.png" title="UReviewDU Login" width="30" height="30" /> <h3 title="UReviewDU User Login"> User Login</h3>
    <form action="inc/login/login.php" method="post" id="userLogon">
    	<div class="field required">
	    Username: <input type="text" name="regduser" tabindex="1" /><br />
	    </div>
	    <div class="field required">
	    Password: <input type="password" name="regdpass" tabindex="2" /><br />
	    </div>
	    <input type="submit" name="submitUser" />
    </form>
    </div><!--/popup_name5-->