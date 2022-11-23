<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$sql = "CREATE TABLE payroll (
name VARCHAR(30) NOT NULL,
eid VARCHAR(30) NOT NULL,
mobile INT(10),
acno INT(10),
gender VARCHAR(10),
bs float(8,2),
gs float(8,2)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table payroll created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}




//get the data from html file
$name=$_POST["name"];
$eid=$_POST["eid"];
$mobile=$_POST["mobile"];
$accno=$_POST["ano"];
$gender=$_POST["gender"];
$bs=$_POST["bs"];

$hra=$bs*10/100;
$da=$bs*40/100;
$gs=$bs+$hra+$da;



//insert data into database
$sql = "INSERT INTO payroll(name, eid, mobile,acno,gender,bs,gs)
VALUES ('$name', '$eid', '$mobile','$accno','$gender','$bs','$gs')";
echo "'<br>'Data inserted sucessfully '<br>'";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
