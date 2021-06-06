<?php 


ob_start();
session_start();

$user = "eswqoeguxxelqz";
$pass = "7d8b5f151b50ac767d9a486b2c26a0df841ce06ccd2cfd66ee2c3625ac02700d";
$pdo = 'pgsql:host=ec2-54-73-68-39.eu-west-1.compute.amazonaws.com;dbname=d4fo6gasp6dmcs';

try 
{

    $con = new PDO($pdo, $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOException $e) {

    echo 'Connection failed : ' . $e->getMessage();

}



// sql to create table

$sql = "CREATE TABLE orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(30), 
phone VARCHAR(15) NOT NULL,
res_date VARCHAR(50) NOT NULL,
res_time VARCHAR(50) NOT NULL,
people VARCHAR(10) NOT NULL,
message VARCHAR(1200) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$res = $con->prepare($sql);

if ($res-> execute()) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

///////////////////////////////
/////////////////////////////
//////////////////////////////

$sql2 = "CREATE TABLE contact (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
subject VARCHAR(50) NOT NULL,
message VARCHAR(1200) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$res = $con->prepare($sql2);


if ($res-> execute()) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

/////////////////////////////////
//////////////////////////////////
/////////////////////////////////

$sql3 = "CREATE TABLE subscribers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$res = $con->prepare($sql3);


if ($res-> execute()) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

/////////////////////////////////////////
////////////////////////////////////////
///////////////////////////////////////

$sql4 = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(500) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$res = $con->prepare($sql4);


if ($res-> execute()) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}


$conn->close();








?>
