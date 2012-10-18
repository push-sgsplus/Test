<?PHP
session_start();

if($_POST['schwelleo2'] == "" or ($_POST['schwelletemp'] == "") or ($_POST['yourmail'] == ""))
{

   ?>

   <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
          "http://www.w3.org/TR/html4/loose.dtd">
   <html>
   <head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
   <title>Setup Seite</title>
   </head>
   <body bgcolor="#ffffff" text="#000000" link="#804080" vlink="#603060" alink="#804080">
   <center>
   <br>
   <br>
   Hier können Sie die Schwellenwerte für O² und Wassertemperatur definieren.<br>
   Desweiteren können Sie die E-Mail Adresse angeben, an welche der Alarm bei Unterschreitung des Schwellenwertes gesendet werden soll.<br>
   <br>
   <br>
   <form action="action.php" method="post">
       O² Schwellenwert  <input type="text" name="schwelleo2" /><br />
       Temp. Schwellenwert  <input type="text" name="schwelletemp" /><br />
       Email: <input type="text" name="yourmail" /><br />
       <input type="submit" name="submit" value="Speichern" />
   </form>
   </center>


   <?php
}


else
{

   $send_mail = 0;

   // $schwelle1 soll durch Formular eingegeben und verändert werden können --> O2 Gehalt
   // $schwelle2 soll durch Formular eingegeben und verändert werden können --> Wassertemperatur
   // $ergebnis[5] --> O2 Gehalt
   // $ergebnis[8] --> Wassertemperatur

   if($_SESSION['o2gehalt'] < $_POST['schwelleo2'])
   {
      $send_mail = 1;
   }

   else
   {
   // wird nur ausgeführt wenn das vorangegangenen
   // "else" als false
   // ausgewertet wurden.
      echo "der O2 Gehalt ist höher als die Messung ...";
   }


   if($_SESSION['temperatur'] < $_POST['schwelletemp'])
   {
      $send_mail = 1;
   }

   else
   {
      echo "die Temperatur ist höher als die Messung ...";
   }




   // Empfänger
   $empfaenger = $_POST['yourmail'];

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
Kontakt: <a href="mailto:info@he-ma.eu">He-Ma Foschungssysteme E-Mail</a><br>
Internet: <a href="http://www.he-ma.eu">He-Ma Foschungssysteme Homepage</a><br>
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
   $header .= 'From: He-Ma Foschungssysteme <info@he-ma.eu>' . "\r\n";

   // verschicke die E-Mail
   if($send_mail == 1)
   {
      mail($empfaenger, $betreff, $nachricht, $header);
   }
}
   ?>


</body>
</html>