<?php
include 'db.php';

$sql = "SELECT * FROM projects";
$result = $conn->query($sql);

echo '<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-family: Arial, sans-serif;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px 12px;
        text-align: left;
    }
    th {
        background-color: blue;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #ddd;
    }
    .table-container {
        overflow-x: auto;
        margin: 20px;
    }
</style>';

if ($result->num_rows > 0) {
    echo "<div class='table-container'><table><tr><th>ID</th><th>Title</th><th>Lead Researcher</th><th>Funding</th><th>Status</th><th>Start Date</th><th>End Date</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["project_id"]."</td><td>".$row["title"]."</td><td>".$row["lead_researcher"]."</td><td>".$row["funding_amount"]."</td><td>".$row["status"]."</td><td>".$row["start_date"]."</td><td>".$row["end_date"]."</td></tr>";
    }
    echo "</table></div>";
} else {
    echo "0 results";
}
$conn->close();
?>