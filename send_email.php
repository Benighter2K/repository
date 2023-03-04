<?php
if(isset($_POST['email'])) {

    // EDIT THE FOLLOWING LINES TO MATCH YOUR EMAIL SETTINGS
    $email_to = "bennet.nkolele1998@gmail.com";
    $email_subject = "New Message from My Portfolio";

    function died($error) {
        echo "Sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

    // validation expected data exists
    if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['message'])) {
        died('Sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $email_message = "Form details below.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";

    // create email headers
    $headers = 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);

    echo "Thank you for contacting us. We will be in touch with you very soon.";
}
?>
