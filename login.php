<?php
$servername = "localhost";
$userName = "root";
$password = "";
$dbname = "LIBRARY";

$conn = new mysqli($servername, $userName, $password, $dbname);

if ($conn->connect_error) {
 die('Could not connect: ' . $conn->connect_error);
}

echo 'Connected successfully<br/>';

$u = $_POST["userName"];
$p = $_POST["password"];

$sql = "SELECT userName,password FROM Customer WHERE userName = '$u'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 while ($row = $result->fetch_assoc()) {
  if ($row["userName"] == $u && $row["password"] == $p) {
   echo "You have been successfully validated";
  } else {
   echo "Credentials Wrong, Try again";
  }
 }
} else {
 echo "User name given was not exist";
}

$conn->close();

header("refresh:15; url=home.html;");