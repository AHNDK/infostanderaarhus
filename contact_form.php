<?php

$name = $_POST["name"];
$email = $_POST["email"];

$recipient = "rfrey@aarhus.dk"; //Hvem skal have mailen?

if (isset($name) && isset($email)) {
  $subject = "Jeg vil gerne kontaktes vedr. Infostander Aarhus"; //Emnefeltet til emailen.

  $message = "<h1>
                Dette er en html-mail
              </h1>";

  $header  = "MIME-Version: 1.0" . "\r\n";
  $header .= "Content-type: text/html; charset=utf-8" . "\r\n";
  $header .= "from:".$email;

  if (mail($recipient, $subject, $message, $header)) {
    print "<h1>Vi takker for din henvendelse</h1>";
    print "<p>Du hører fra os hurtigst muligt</p>";
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