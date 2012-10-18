<?php
// Empfänger
$empfaenger = 's@hemmerle-net.de';

// Betreff
$betreff = '!A-c-h-t-u-n-g! O2 oder Wassertemperatur unterschreiten den Schwellenwert!';

// Nachricht
$nachricht = '
<html>
<head>
  <title>Schwellenwertunterschreitung</title>
</head>
<body>
  <p><h1><i style="font-weight:bold; background-color:#dc143c">Schwellenwertunterschreitung:</i></h1></p>
<br>
Einer der von Ihnen eingestellte Schwellenwerte wurde unterschritten!
<br>
<br>

<br>
<br>
<br>
<br>
<small>
Ein Service von: He-Ma Foschungssysteme!<br>
Dies ist eine automatisch generierte E-Mail.<br>
Kontakt: <a href="mailto:info@he-ma.eu">He-Ma Foschungssysteme</a><br>
<br>
Version: V.02
</small>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</body>
</html>
';

// für HTML-E-Mails muss der 'Content-type'-Header gesetzt werden
$header  = 'MIME-Version: 1.0' . "\r\n";
$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// zusätzliche Header
$header .= 'From: He-Ma Forschungssysteme <info@he-ma.eu>' . "\r\n";

// verschicke die E-Mail
mail($empfaenger, $betreff, $nachricht, $header);
?>
