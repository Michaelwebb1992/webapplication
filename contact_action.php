<?php 
//This data can be collected from a form

  $to      = 'contactus@d2wembroideryandprint.co.uk';

  $subject = $_POST["name"];

  $message = $_POST["comments"];

  $headers = $_POST["email"] . "\r\n" .

'Reply-To: '. $_POST["email"] . "\r\n" .

'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject, $message, $headers)){

  

header('Location: contact_conformation.php');

  }
?>