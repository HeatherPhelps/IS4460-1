<!DOCTYPE html>
<html>
  <head>
    <title>View Violation - Parking Permit Website</title>

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
        margin: 50px auto;
        max-width: 800px;
      }
      h2 {
        text-align: center;
      }
      table {
        border-collapse: collapse;
        margin: 20px auto;
        width: 100%;
        max-width: 800px;
      }
      th, td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
      }
      th {
        background-color: #f2f2f2;
      }
      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
      tr:hover {
        background-color: #ddd;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>Parking Permit Website</h1>
    </header>
    <nav>
      <ul>
        <li><a href="HP.php"> Home Page </a></li>
		<li><a href="addviolation.php">Add violation</a></li>
        <li><a href="updateviolation.php">Update violation</a></li>
        <li><a href="deleteviolation.php">Delete violation</a></li>
      </ul>
    </nav>
    <main>
      <h2>View violation</h2>
      <table>
	  
        <thead>
<tr>

	<th>Violation ID</th>
	<th>Violation Type</th>
	<th>Date</th>
</tr>
			<?php

require_once 'db.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

echo <<<_END
	<pre>
	
		
_END;

$query="SELECT * FROM VIOLATION";
$result=$conn->query($query);
if(!$result) die ($conn->error);

$rows=$result->num_rows;
for($j=0; $j<$rows; $j++) {
	$result->data_seek($j);
	$row=$result->fetch_array(MYSQLI_BOTH);
	
	echo <<<_END
	<pre>
		<tr>
		
		
		<td>$row[VIOLATION_ID]
		<td>$row[Violation_Type]
		<td>$row[Date]
	</pre>
	
_END;
}

$result->close();
$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}



?>
        </thead>  
      </table>
    </main>
  </body>
</html>