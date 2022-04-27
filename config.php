<?php

$user = "root";
$pass = "root";
$host = "localhost";
$dbdb = "argonautes_db";

$conn = new mysqli($host, $user, $pass, $dbdb);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
