<?php 


ob_start();
session_start();

$user = "saleyma_usr";
$pass = ";LKmW7S5HRX0";
$pdo = 'mysql:host=localhost;dbname=saleyma_v2';

try 
{

    $con = new PDO($pdo, $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOException $e) {

    echo 'Connection failed : ' . $e->getMessage();

}
  /*


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








*/
?>