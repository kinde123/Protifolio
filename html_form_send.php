<?php
if(isset($_POST['email'])) {

	// CHANGE THE TWO LINES BELOW
	$email_to = "kindetgg@gmail.com";

	$email_subject = "Request";


	function died($error) {
		// your error code can go here
		echo "We're sorry, but there's errors found with the form you submitted.<br /><br />";
		echo $error."<br /><br />";
		echo "Please go back and fix these errors.<br /><br />";
		die();
	}

	// validation expected data exists
	if(!isset($_POST['first_name']) ||
		// !isset($_POST['last_name']) ||
		!isset($_POST['email']) ||
		// !isset($_POST['telephone']) ||
		!isset($_POST['comments'])) {
		died('We are sorry, but there appears to be a problem with the form you submitted.');
	}

	$first_name = $_POST['first_name']; // required
	// $last_name = $_POST['last_name']; // required
	$email_from = $_POST['email']; // required
	// $telephone = $_POST['telephone']; // not required
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
  // if(!preg_match($string_exp,$last_name)) {
  // 	$error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  // }
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
	// $email_message .= "Last Name: ".clean_string($last_name)."\n";
	$email_message .= "Email: ".clean_string($email_from)."\n";
	// $email_message .= "Telephone: ".clean_string($telephone)."\n";
	$email_message .= "Comments: ".clean_string($comments)."\n";


// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>


<!-- place your own success html below -->

<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="HandheldFriendly" content="true">
  <meta charset="utf-8">
  <meta name="description" content="My personal protifolio website">
  <title>Kinde Tadesse Tesfaye</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap">
<link rel="stylesheet" href="css/style8.css">

  </head>
  <body >
    <video autoplay muted loop id="myVideo">
  <source src="video/Black - 13495.mp4" type="video/mp4">
</video>
    <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
                <div class="container px-4">
                    <a class="navbar-brand" href="home.html">Kinde Tesfaye</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ms-auto">
                          <li class="nav-item"><a class="nav-link" href="home.html">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Skills</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
<div class="message">
	<h1>Thank You</h1>
	<p>Thank you for your message. I will contact you soon!</p>
</div>

<footer class="py-5 bg-light">
						<div class="container px-4"><p class="m-0 text-center text-dark">Copyright &copy; Kinde Tesfaye 2021</p></div>
				</footer>
</body>
</html>




<?php
}
die();
?>
