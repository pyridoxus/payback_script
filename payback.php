<!DOCTYPE HTML>

<html>
<head>
<meta charset="utf-8" />
<title>Payback</title>
</head>

<body><center>
<h1>Payback Page</h1>
<?php 
$link = mysql_connect('pyridoxuscom.ipagemysql.com', 'pay', 'back'); 
if (!$link) { 
    die('Could not connect: ' . mysql_error()); 
}
else
{ 
  echo 'Connected successfully<br />'; 
  mysql_select_db('payback');
$sql = "SHOW TABLES FROM payback;";
$result = mysql_query($sql);

if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

while ($row = mysql_fetch_row($result)) {
    echo "Table: {$row[0]}<br />";
}

mysql_free_result($result);
  if(!isset($_POST['select']))
  {
    if(isset($_POST['submit']))
    {
      echo '<h2>Payment Posted</h2>';
      echo '<p><form action="';
      echo htmlentities($_SERVER['PHP_SELF']);
      echo '" method="post">';
      echo '<input type="submit" name="done" value="Continue..." /><br />';
      echo '</form></p>';
    }
    else
    {
      echo '<form action="';
      echo htmlentities($_SERVER['PHP_SELF']);
      echo '" method="post">';
      echo '<p><input type="radio" name="select" value="view" /> View History<br />';
      echo '<input type="radio" name="select" value="payment" /> Make Payment<br /></p>';
      echo '<input type="submit" name="submit" value="Go!"><br />';
      echo '</form>';
    }
  }
  else
  {
    if($_POST["select"] == "view")
    {
      echo '<p><form action="';
      echo htmlentities($_SERVER['PHP_SELF']);
      echo '" method="post">';
      echo '<input type="submit" name="done" value="Continue..." /><br />';
      echo '</form></p>';
      $sql = "SELECT * FROM money;";
      $result = mysql_query($sql);
      if (!$result)
      {
	echo "DB Error, could not get rows</br>";
	echo 'MySQL Error: ' . mysql_error();
	exit;
      }
      echo '<table border=1><tr><td>Date</td><td>Person</td><td>Amount</td><td>Running Total</td></tr>';
      while ($row = mysql_fetch_row($result))
      {
	echo "<tr>";
	for ($column = 1; $column < 5; $column++)
	{
	  echo "<td>{$row[$column]}</td>";
	}
	echo "</tr>";
      }
      echo "</table>";
      mysql_free_result($result);
      echo '<p><form action="';
      echo htmlentities($_SERVER['PHP_SELF']);
      echo '" method="post">';
      echo '<input type="submit" name="done" value="Continue..." /><br />';
      echo '</form></p>';
    }
    if($_POST["select"] == "payment")
    {
      echo 'Clicked payment.';
      echo '<p><form action="';
      echo htmlentities($_SERVER['PHP_SELF']);
      echo '" method="post">';
      echo '<p><input type="radio" name="name" value="Craig" /> Craig<br />';
      echo '<input type="radio" name="name" value="Melissa" /> Melissa<br /></p>';
      echo '<p>Amount: <input type="text" name="amount" /></p>';
      echo '<input type="submit" name="submit" value="Continue..." /><br />';
      echo '</form></p>';
    }
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
</center>
</body>
</html>