<?php
if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
    $email_to = "neema.mahdavi@gmail.com";
     
    $email_subject = "nee.ma contact form submissions";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- place your own success html below -->
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Neema Mahdavi's Page</title>
    <meta name="description" content="something good should be on this page, is it?">
    <meta name="author" content="Neema Mahdavi">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Base Stylsheets http://twitter.github.com/bootstrap/ -->
    <link rel="stylesheet" href="stylesheets/lib/bootstrap.css" >
    <link rel="stylesheet" href="stylesheets/lib/jquery.fancybox.css" >


    <!-- Your Stylesheets -->
    <link rel="stylesheet" href="stylesheets/main.css" >

    <!-- Base Javascripts -->
    <script src="javascripts/lib/base.js"></script>

    <!-- Fancybox Lightbox http://fancyapps.com/fancybox/#examples -->
    <script src="javascripts/lib/jquery.fancybox.js"></script>


    <!-- Your Javascripts -->
    <script src="javascripts/main.js"></script>
     <script src="javascripts/lib/bootstrap-buttons.js"></script>

  </head>

  <section id="navigation">
  <div class="topbar-wrapper" style="z-index: 5;">
    <div class="topbar" data-dropdown="dropdown" >
      <div class="topbar-inner">
        <div class="container">
          <h3><a href="#">Neema Mahdavi</a></h3>
          <ul class="nav">
            <li class="active"><a href="#">Home</a></li>
               <li class="dropdown">
                <a href="#" class="dropdown-toggle">Projects</a>
                <ul class="dropdown-menu">
                <li><a href="#">One link</a></li>
                <li><a href="#">Another  here</a></li>
                <li class="divider"></li>
                <li><a href="#">Projects Page</a></li>
              </ul>
              </li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>

          </ul>
            </li>
          </ul>
        </div>
      </div><!-- /topbar-inner -->
    </div><!-- /topbar -->
  </div><!-- /topbar-wrapper -->
</section>
  <body>

    <div class="container">
      
      <div class="row">


<h2 class="center">Thank you for contacting us.</h2>
      </div> <!-- end row -->

    </div> <!-- end container -->

  </body>
</html>

 
<?php
}
die();
?>