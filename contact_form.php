<?php

header('Content-type: application/json');

$name = strip_tags($_POST["name"]);
$email = strip_tags($_POST["email"]);
$spam_check = $_POST["message"];

$recipient = "infostander@aarhus.dk";

if ( (!empty($name) && !empty($email)) && empty($spam_check) )  {
  $subject = "Jeg vil gerne kontaktes vedr. Infostander Aarhus";

  $message = "<h1>Jeg vil gerne kontaktes</h1>";
  $message.= "<p>Der er kommet en henvendelse på infostanderaarhus.dk, du bedes kontakte:</p>";
  $message.= "<ul>";
  $message.= "<li><strong>Navn:</strong> ". $name ."</li>";
  $message.= "<li><strong>Email:</strong> ". $email ."</li>";
  $message.= "</ul>";

  $header  = "MIME-Version: 1.0" . "\r\n";
  $header .= "Content-type: text/html; charset=utf-8" . "\r\n";
  $header .= "from: Infostander kontaktformular <www@aakb.dk>";
  $header .= "reply-to:".$email;

  if (mail($recipient, $subject, $message, $header)) {
    print json_encode(array("status" => TRUE, "data" => "Tak for din henvendelse, du h&oslash;rer fra os snarest."));

  } else {
    $response .= "Der skete en fejl og det lykkedes desværre ikke at sende din henvendelse.";
    $response .= "<br /><br />";
    $response .= "<a href=\"#kontakt\">Klik her for at prøve igen</a>. husk at alle felter skal udfyldes.";
    $response .= "<br /><br />";
    $response .= "Hvis du stadig oplever fejl, så kontakt os på p&aring; " . $recipient . ".";

    print json_encode(array("status" => FALSE,"data" => $response));
  }

} else {
  print json_encode(array("status" => FALSE, "data" => "Du skal udfylde alle felter i formularen, prøv venligst igen."));
}