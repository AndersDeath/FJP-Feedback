<?php
require_once('config.php');
require_once('lib/phpmailer/class.phpmailer.php');

function is_email($email) {
  return preg_match("/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*\.([a-zA-Z]{2,6})$/", $email);
}


$name = htmlspecialchars($_POST['name']);
$email = $_POST['email'];
$text = htmlspecialchars($_POST['text']);
$captcha = $_POST['g-recaptcha-response'];

if($captcha==''){
  echo "nocaptcha";
  exit;
}

if(is_email($email)==true && $captcha!=''){
  $html = "Name: $name <br>";
  $html .= "Email: $email <br>";
  $html .= "Message: $text <br>";

  $mailer = new PHPMailer;
  $mailer->setFrom(FJPMAILTO, FJPTITLE);
  $mailer->addAddress(FJPMAILTO,FJPMAILTONAME);
  $mailer->CharSet = 'utf-8';
  $mailer->isHTML(true);
  $mailer->Subject = FJPSUBJECT;
  $mailer->Body = $html;
  $mailer->Send();

  echo 'true';
} else {
  echo "false";
}
