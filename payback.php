<!DOCTYPE HTML>

<html>
<head>
<meta charset="utf-8" />
<title>Payback</title>
</head>

<body>
<?php 
$link = mysql_connect('pyridoxuscom.ipagemysql.com', 'pay', 'back'); 
if (!$link) { 
    die('Could not connect: ' . mysql_error()); 
} 
echo 'Connected successfully'; 
mysql_select_db(payback); 
?>  
<?php
mysql_close($link);
?>
</body>
</html>
