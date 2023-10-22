<?php
$env = parse_ini_file(__DIR__.'/../../.env');

// DB Credentials
// maybe move these to a .ENV file later?
// change these to your local credentials when working locally
$server = $env['server'];
$username = $env['username'];
$password = $env['password'];
$database = $env['database'];

$numRecords = 0;

// establish db connection
$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<h1>Connected successfully to $database database!</h1>";


if($conn->query("DROP TABLE Courses")){
    printf("Table Courses Dropped successfully");
}
if($conn->query("DROP TABLE Prerequisites")){
    printf("Table Prerequisites Dropped successfully");
}
?>