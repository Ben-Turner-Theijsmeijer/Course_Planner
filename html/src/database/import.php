<?php
// Reference: https://www.php.net/manual/en/function.fgetcsv.php

// This file connects to the DB and inserts records upon landing on the page /import.php
$csvFile = __DIR__ . '/../../excel/CourseList.csv';

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

$tableName = "Courses";

// Open the CSV file for reading
if (($handle = fopen($csvFile, 'r')) !== false) {

    $firstRow = true;

    // Iterate through the CSV data
    while (($data = fgetcsv($handle)) !== false) {

        // Skips the first row because it outputs the headers
        if ($firstRow) {
            $firstRow = false;
            continue;
        }
        // CSV Columns must match SQL Columns
        $CourseCode = $conn->real_escape_string($data[0]);
        $CourseName = $conn->real_escape_string($data[1]);
        $CourseOffering = $conn->real_escape_string($data[2]);
        $CourseWeight = floatval($data[3]); 
        $CourseDescription = $conn->real_escape_string($data[4]);
        $CourseFormat = $conn->real_escape_string($data[5]);
        $Prerequisites = $conn->real_escape_string($data[6]);
        $PrerequisiteCredits = floatval($data[7]); 
        $Corequisites = $conn->real_escape_string($data[8]);
        $Restrictions = $conn->real_escape_string($data[9]);
        $Equates = $conn->real_escape_string($data[10]);
        $Department = $conn->real_escape_string($data[11]);
        $Location = $conn->real_escape_string($data[12]);

        // Inserts records into the table
        $query = "INSERT INTO $tableName (CourseCode, CourseName, CourseOffering, CourseWeight, CourseDescription, CourseFormat, Prerequisites, PrerequisiteCredits, Corequisites, Restrictions, Equates, Department, Location) VALUES ('$CourseCode', '$CourseName', '$CourseOffering', $CourseWeight, '$CourseDescription', '$CourseFormat', '$Prerequisites', '$PrerequisiteCredits', '$Corequisites', '$Restrictions', '$Equates', '$Department', '$Location')";

        if ($conn->query($query) === true) {
            $numRecords++;
        }
    }
    // Finish reading
    fclose($handle);
} else {
    echo "Error opening Course List";
}

// if ($numRecords > 0) {
//     echo "Inserted $numRecords course records successfully.<br>";
// } else {
//     echo "No course records were inserted.";
// }

if ($numRecords <= 0) {
    echo "No course records were inserted.<br>";
} 

$conn->close();
