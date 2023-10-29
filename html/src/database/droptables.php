<?php
$env = parse_ini_file(__DIR__ . '/../../.env');

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

if ($conn->query("DROP TABLE Prerequisites")) {
    echo ("Table Prerequisites Dropped successfully");
}

if ($conn->errno) {
    echo ("Could not drop table: " . $conn->error);
}
if ($conn->query("DROP TABLE Courses")) {
    echo ("Table Courses Dropped successfully");
}
if ($conn->query("DROP TABLE Courses_Taken")) {
    echo ("Table Courses Dropped successfully");
}

if ($conn->errno) {
    echo ("Could not drop table: " . $conn->error);
}
$conn->close();
?>