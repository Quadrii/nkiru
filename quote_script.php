<?php 
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['Email'];
	$telephone = $_POST['Telephone'];
	$description = $_POST['description'];
	$formcontent = "From: $firstname $lastname \n Description: $description \n Email: $email \n Phone: $telephone";
	$recipient = "adisa.ahmed881@gmail.com";
	$subject = "NK & N Store";
	$mailheader = "From: $email \r\n";

	mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
	header("Location: thankyou.html");
?>