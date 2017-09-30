<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "Connected successfully";
} 

// Create database
$sql = "CREATE DATABASE c0705314";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

//Use Db
$sql = "USE c0705314";
if ($conn->query($sql) === TRUE) {
    echo "Database changed successfully";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// sql to create table
$sql = "CREATE TABLE MyGuests (
employeeId INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30) NOT NULL,
gender ENUM ('M','F','other'),
email VARCHAR(50),
birth DATE,
address VARCHAR(100),
city VARCHAR(50),
province VARCHAR(50),
postalCode VARCHAR(50),
website VARCHAR(50),
reg_date TIMESTAMP,
annualPay INT(20)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$stmt = $conn->prepare("INSERT INTO MyGuests (employeeId,name,gender,email,birth,address,city,province,postalCode,website,reg_date,annualPay) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("issssssssssi", $employeeId,$name,$gender,$email,$birth,$address,$city,$province,$postalCode,$website,$reg_date,$annualPay);

// set parameters and execute
$employeeId = "John";
$name = "Doe";
$gender="";
$email = "john@example.com";
$birth=20151206;
$address="abc";
$city="efd";
$province="ddd";
$postalCode="2w2w";
$website="wwwww";
$reg_date="";
$annualPay="500000";

$stmt->execute();

echo "record inserted";



?>