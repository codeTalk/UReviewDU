 <?php
    if(isset($_POST['submit'])) {
    $to = "joe@ureviewdu.com";
/*Contact Submission Fields*/ $subject = "Contact Submission From UReviewDU.com"; $first_name = $_POST['fName']; $last_name = $_POST['lName']; $the_email = $_POST['email']; $contact_type = $_POST['contactType']; $aff_Other = $_POST['affOther']; $the_comments = $_POST['comments'];

	#Contact Email Output
    $body = "////////////////////////////////////////// - $subject - //////////////////////////////////////////\n\n
    First Name: $first_name\n------------------------------------------------------\nCourse Prefix: $coursePrefix\n------------------------------------------------------\nCourse Last Name: $last_name\n------------------------------------------------------\nEmail: $the_email\n------------------------------------------------------\Contact Type: $contact_type\nAffiliation Other: $aff_Other\nComments: $the_comments
    ";
    echo "Thank you for contact us, we will reply soon."; mail($to, $subject, $body); } else {echo "Cannot Send email, please contact us at {j}{p}{d}750@gmail.com\n Please remove {}.!";}?>