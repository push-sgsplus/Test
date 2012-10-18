<?PHP
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="refresh" content="300"/>
    <meta http-equiv="cache-control" content="no-cache">
    <title>IQS WebServer</title>
</head>
<body>
<?PHP

$url = "http://zerspanung.dyndns.info/";

$curl_handle = curl_init();
curl_setopt($curl_handle, CURLOPT_URL,$url);
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
$query = curl_exec($curl_handle);
curl_close($curl_handle);

$werte = explode("\n",$query);
$werte = array_pad($werte,80,"");

for($i = 51; $i <=60; $i++)
{
   $ergebnis[] = strip_tags(trim($werte[$i]));
}

$_SESSION['o2gehalt'] = $ergebnis[5];
$_SESSION['temperatur'] = $ergebnis[8];

?>
<table>
<tr>
   <td><?PHP echo $ergebnis[1]; ?></td>
   <td><?PHP echo $ergebnis[4]; ?></td>
   <td><?PHP echo $ergebnis[8]; ?></td>
   <td><?PHP echo $ergebnis[9]; ?></td>
</tr>
</table>
<center>
<form action="action.php" method="post">
    <input type="submit" name="submit" value="eigene Werte eingeben" />
</form>
</center>
</body>
</html>