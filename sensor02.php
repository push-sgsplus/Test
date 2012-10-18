<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="refresh" content="1800"/> <!-- Refresh in Sekunden -->
	<meta http-equiv="cache-control" content="no-cache">
    <title>IQS WebServer</title>
<?PHP
$url = "http://zerspanung.dyndns.info/"; // Ziel Url 
$curl_handle = curl_init();
curl_setopt($curl_handle, CURLOPT_URL,$url);
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
$query = curl_exec($curl_handle);
curl_close($curl_handle);
// durchsuchen, auflösen
$werte = explode("\n",$query);
$werte = array_pad($werte,80,"");

for($i = 51; $i <=60; $i++)
{
   $ergebnis[] = strip_tags(trim($werte[$i]));
}
?>
</head>
<body>
<center>
<b><u>Sensor Becken 2</u></b>
<br>
<br>
<img src="becken.svg" width="100" alt="Becken Logo">
<br>
aktuell angezeigter Messwert vom:<br>
<br>
<?php
$timestamp = time();
$datum = date("d.m.Y",$timestamp);
$uhrzeit = date("H:i",$timestamp);
echo $datum," - ",$uhrzeit," Uhr";
?>
<br>
<br>
<table border="1" cellspacing="1%" cellpadding="1%">
	<thead>
<tr class="CaptionRow">
		<td>Status</td>
		<td>Sensorname</td>
		<td>O&sup2;&nbsp;Wert</td>
		<td>Temp.</td>
	</tr>
	</thead>
	<tr class="EvenRow">
		<td><?PHP echo $ergebnis[1]; ?></td>
		<td><?PHP echo $ergebnis[4]; ?></td>
		<td><?PHP echo $ergebnis[5]; ?>&nbsp;mg/l</td>
		<td><?PHP echo $ergebnis[8]; ?>&nbsp;&deg;C</td>
	</tr>
</table>
</center>
</body>
</html>