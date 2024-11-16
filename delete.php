<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = $_POST["project_id"];

    $stmt = $conn->prepare("DELETE FROM projects WHERE project_id=?");
    $stmt->bind_param("i", $project_id);

    if ($stmt->execute()) {
        echo "Project deleted successfully";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>