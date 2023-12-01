<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exam";
try {
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (Exception $e) {
    die('Error: Could not connect: ' . $e->getMessage());
}
if ($conn->connect_error) {
    die('Error: Connection failed: ' . $conn->connect_error);
}
echo 'Connected successfully<br/>';

$stmt = $conn->prepare("INSERT INTO candidate (firstName, lastName, userName, password, email, number, gender, city) VALUES(?,?,?,?,?,?,?,?)");
if ($stmt === false) {
    die('Error: Could not prepare statement: ' . $conn->error);
}
$stmt->bind_param("sssisiss", $f, $l, $u, $p, $e, $phoneno, $g, $c);
$f = $_POST["firstName"];
$l = $_POST["lastName"];
$u = $_POST["userName"];
$p = $_POST["password"];
$e = $_POST["email"];
$number = $_POST["number"]; 
$g = $_POST["gender"];
$c = $_POST["city"];
if ($stmt->execute() === false) {
    die('Error: Could not execute statement: ' . $stmt->error);
}
echo "Record inserted successfully";
$stmt->close();
$conn->close();
header("refresh: 20; url=homepage.html");
?>
