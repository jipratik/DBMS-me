<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$sql = "CREATE TABLE inventory (
pid VARCHAR(30) NOT NULL,
pname VARCHAR(30) NOT NULL,
pstock INT(10),
preq INT(10),
porder VARCHAR(10)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table inventory created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}




//get the data from html file
$pid=$_POST["pid"];
$pname=$_POST["pname"];
$pstock=$_POST["pstock"];
$preq=$_POST["preq"];
$porder=$_POST["porder"];




//insert data into database
$sql = "INSERT INTO inventory(pid, pname, pstock,preq,porder)
VALUES ('$pid', '$pname', '$pstock','$preq','$porder')";
echo "'<br>'Data inserted sucessfully '<br>'";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
