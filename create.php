<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = $_POST["project_id"];
    $title = $_POST["title"];
    $lead_researcher = $_POST["lead_researcher"];
    $funding_amount = $_POST["funding_amount"];
    $status = $_POST["status"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"] ?: NULL;

    $stmt = $conn->prepare("INSERT INTO projects (project_id, title, lead_researcher, funding_amount, status, start_date, end_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issdsss", $project_id, $title, $lead_researcher, $funding_amount, $status, $start_date, $end_date);

    if ($stmt->execute()) {
        echo "New project created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>