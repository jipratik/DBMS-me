<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " .$conn->connect_error);
}


/*$sql = "CREATE TABLE userinfo(name VARCHAR(30) NOT NULL,regno VARCHAR(30) NOT NULL,email VARCHAR(50),cgpa int(5),mobile int(10), gender VARCHAR(10));";

if ($conn->query($sql) == TRUE){
  echo "Table userinfo created successfully";
}
else{
  echo "Error creating table: " ;
}*/


//get the data from html file
$name=$_POST["name"];
$regno=$_POST["regno"];
$email=$_POST["email"];
$cgpa=$_POST["cgpa"];
$mobile=$_POST["mobile"];
$gender=$_POST["gender"];


//insert data into database
$sql = "INSERT INTO userinfo (name, regno, email,cgpa,mobile,gender)
VALUES ('$name', '$regno', '$email','$cgpa','$mobile','$gender');";
echo "inserted";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " .$sql ."<br>" .$conn->error;
}

$conn->close();
?>
