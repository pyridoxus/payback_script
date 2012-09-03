<!DOCTYPE HTML>

<html>
<head>
<meta charset="utf-8" />
<title>Payback</title>
</head>

<body>
<h1>Payback Page</h1>
<?php 
$link = mysql_connect('pyridoxuscom.ipagemysql.com', 'pay', 'back'); 
if (!$link) { 
    die('Could not connect: ' . mysql_error()); 
}
else
{ 
  echo 'Connected successfully'; 
  mysql_select_db(payback); 
  if(!$_POST["view"] and !$_POST["payment"])
  {
    echo '<form action="payback.php" method="post">';
    echo '<input type="button" name="view" />View History<br />';
    echo '<input type="button" name="payment" />Make Payment<br />';
    echo '</form>';
  }
  if($_POST["view"])
  {
    echo 'Clicked view.';
    echo '<form action="payback.php" method="post">';
    echo '<input type="button" name="continue" />Continue<br />';
    echo '</form>';
  }
  if($_POST["payment"])
  {
    echo 'Clicked payment.';
    echo '<form action="payback.php" method="post">';
    echo '<input type="button" name="continue" />Continue<br />';
    echo '</form>';
  }
  mysql_close($link);
}
?>  
<!--form action="payback.php" method="post">
<input type="radio" name="name" value="Craig" /> Craig<br />
<input type="radio" name="name" value="Melissa" /> Melissa<br />
Amount: <input type="text" name="amount" />
</form>
-->
</body>
</html>