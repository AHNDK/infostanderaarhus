<?php

$name = strip_tags($_POST["name"]);
$email = strip_tags($_POST["email"]);

$recipient = "rfrey@aarhus.dk"; //Hvem skal have mailen?

if (!empty($name) && !empty($email)) {
  $subject = "Jeg vil gerne kontaktes vedr. Infostander Aarhus"; //Emnefeltet til emailen.

  $message = "<h1>" . $name . " vil gerne kontaktes</h1>";
  $message.= "<p>Der er kommet en henvendelse fra " . $name . " på infostanderaarhus.dk, du bedes tage kontakte:</p>";
  $message.= "<ul>";
  $message.= "<li><strong>Navn:</strong> ". $name ."</li>";
  $message.= "<li><strong>Email:</strong> ". $email ."</li>";
  $message.= "</ul>";
  $message.= "<p>Med venlig hilsen</p>";
  $message.= "<p>Infostander hjemmesiden.</p>";

  $header  = "MIME-Version: 1.0" . "\r\n";
  $header .= "Content-type: text/html; charset=utf-8" . "\r\n";
  $header .= "from: Infostander kontaktformular <www@aakb.dk>";
  $header .= "reply-to:".$email;

  if (mail($recipient, $subject, $message, $header)) {
    print "<h1>Vi takker for din henvendelse</h1>";
    print "<p>Du h&oslash;rer fra os hurtigst muligt</p>";
    print "<p>Venlig hilsen</p>";
    print "<p>Infostander Aarhus</p>";
  } else {
    print "<h1>&Oslash;v! vores server meldte fejl.</h1>";
    print "<p>Det lykkedes ikke for vores server at sende os en notifikation om din henvendelse.</p>";
    print "<p>Det er vi rigtig kede af,</p>";
    print "<p>kontakt os venligst direkte p&aring; email: ". $recipient . " s&aring; kan vi b&aring;de kigge p&aring; fejlen og hj&aelig;lpe dig.</p>";
  }

} else {
  print "Vi kunne ikke behandle din henvendelse da formularen ikke blev udfyldt.";
}