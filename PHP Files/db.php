<?php
$host = "localhost";
$user = "root"; // Change if you have a different MySQL username
$password = ""; // Change if you have a password
$database = "timetable";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>