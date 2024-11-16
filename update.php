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

    $stmt = $conn->prepare("UPDATE projects SET title=?, lead_researcher=?, funding_amount=?, status=?, start_date=?, end_date=? WHERE project_id=?");
    $stmt->bind_param("ssdsssi", $title, $lead_researcher, $funding_amount, $status, $start_date, $end_date, $project_id);

    if ($stmt->execute()) {
        echo "Project updated successfully";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>