<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "da6";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS projects (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_id INT(6) NOT NULL UNIQUE,
    title VARCHAR(100) NOT NULL,
    lead_researcher VARCHAR(50) NOT NULL,
    funding_amount DECIMAL(10,2) NOT NULL,
    status VARCHAR(20) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE
)";

if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}
?>