<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Permit</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
      }
      header {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
      }
      h1 {
        margin: 0;
      }
      nav {
        background-color: #f44336;
        color: #fff;
        padding: 10px;
      }
      nav ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
        display: flex;
        justify-content: space-around;
        align-items: center;
      }
      nav li {
        margin: 0;
        padding: 0;
        display: inline-block;
      }
      nav a {
        color: #fff;
        text-decoration: none;
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.2s ease-in-out;
      }
      nav a:hover {
        background-color: #b71c1c;
      }
      main {
        margin: 80px auto;
        max-width: 600px;
      }
      h2 {
        text-align: center;
      }
      form {
        border: 1px solid #ccc;
        padding: 40px;
        margin-top: 20px;
        box-sizing: border-box;
      }
      label {
        display: block;
        margin-bottom: 10px;
      }
      input[type="text"], input[type="password"], input[type="submit"] {
        padding: 10px;
        margin-bottom: 20px;
        width: 70%;
        border: 3px solid #ccc;
        border-radius: 19px;
        box-sizing: border-box;
      }
      input[type="submit"] {
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      form pre {
        text-align: center;
      }
    </style>	
	
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <header>
      <h1>Parking Permit Website</h1>
    </header>
    <nav>
      <ul>
        <li><a href="HP.php">Home</a></li>
        <li><a href="viewpermit.php">View Permit</a></li>
        <li><a href="addpermit.php">Add Permit</a></li>
        <li><a href="deletepermit.php">Delete Permit</a></li>
      </ul>
    </nav>
    <main>
<?php

require_once 'db.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

echo <<<_END
<form action="addpermit.php" method="post">
	<pre>
	PERMIT_ID <input type="text" name="PERMIT_ID"></br></br>
	Permit_Type <input type="text" name="Permit_Type"></br></br>
	Expire_Date <input type="text" name="Expire_Date"></br></br>
		
	<input type="submit" name="ADD RECORD">
	</br></br>
	</pre>
</form>
_END;

if (isset($_POST['PERMIT_ID']) &&
	isset($_POST['Permit_Type']) &&
	isset($_POST['Expire_Date'])) {
	
	$PERMIT_ID=get_post($conn, 'PERMIT_ID');
	$Permit_Type=get_post($conn, 'Permit_Type');
	$Expire_Date=get_post($conn, 'Expire_Date');
		
	$query="INSERT INTO PERMIT (PERMIT_ID, Permit_Type, Expire_Date) VALUES ".
		"('$PERMIT_ID','$Permit_Type','$Expire_Date')";
	$result=$conn->query($query);
	if(!$result) echo "INSERT failed: $query <br>" .
		$conn->error . "<br><br>";
}

$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}

?>
    </main>
  </body>
</html>
