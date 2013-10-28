<?php

$name = strip_tags($_POST["name"]);
$email = strip_tags($_POST["email"]);

$recipient = "mail@magnify.dk";

if (!empty($name) && !empty($email)) {
  $subject = "Jeg vil gerne kontaktes vedr. Infostander Aarhus"; //Emnefeltet til emailen.

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
    print "Tak for din henvendelse, du h&oslash;rer fra os snarest.";
  } else {
    print "Der skete en fejl og det lykkedes desværre ikke at sende din henvendelse.";
    print "<br /><br />";
    print "<a href=\"#kontakt\">Klik her for at prøve igen</a>. husk at alle felter skal udfyldes.";
    print "<br /><br />";
    print "Hvis du stadig oplever fejl, så kontakt os på p&aring; ". $recipient . ".";

    http_response_code(406);
  }

} else {
  print "Du skal udfylde alle felter i formularen, prøv venligst igen.";
}