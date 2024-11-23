<?php
include 'includes/config.php';

// Fetch reports from the database
$sql = "SELECT * FROM reports";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reports</title>
    <link rel="stylesheet" href="css/view_reports.css">
</head>
<body>
    <div class="container">
        <h2>View Reports</h2>

        <table>
            <tr>
                <th>Vehicle Number</th>
                <th>Vehicle Name</th>
                <th>Owner's Address</th>
                <th>Violation Details</th>
                <th>Fine</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['vehicle_number']."</td>
                            <td>".$row['vehicle_name']."</td>
                            <td>".$row['address']."</td>
                            <td>".$row['violation_details']."</td>
                            <td>".$row['fine']."</td>
                            <td>
                                <a href='update_report.php?id=".$row['id']."' class='btn-update'>Update</a>
                                <a href='delete_report.php?id=".$row['id']."' class='btn-delete'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No reports found</td></tr>";
            }
            ?>
        </table>

        <!-- Dashboard Button -->
        <a href="dashboard.php">
            <button class="btn-dashboard">Go to Dashboard</button>
        </a>
    </div>
</body>
</html>
