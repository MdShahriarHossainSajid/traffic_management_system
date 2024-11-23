<?php
// Assuming user is logged in and there is a session for authentication.
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

include 'includes/config.php'; // Include database configuration
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/delete_report.css">


</head>
<body>
    <div class="container">
        <!-- Navbar -->
        <div class="navbar">
            <h2>Traffic Police Management System</h2>
            <a href="view_reports.php">View Reports</a>
            <!-- Logout Button -->
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>

        <h2>Welcome to the Dashboard</h2>

        <!-- Stats Cards -->
        <div class="stats-container">
            <div class="stat-card">
                <h3>Total Reports</h3>
                <?php
                // Query to count total reports
                $result = $conn->query("SELECT COUNT(*) AS total_reports FROM reports");
                $row = $result->fetch_assoc();
                echo "<p class='count'>" . $row['total_reports'] . "</p>";
                ?>
            </div>
            <div class="stat-card">
                <h3>Total Fines</h3>
                <?php
                // Query to calculate total fine amount
                $result = $conn->query("SELECT SUM(fine) AS total_fine FROM reports");
                $row = $result->fetch_assoc();
                echo "<p class='count'> Taka = " . number_format($row['total_fine'], 2) . "</p>";
                ?>
            </div>
        </div>

        <!-- Dashboard Buttons -->
        <div class="dashboard-btn">
            <a href="add_report.php">
                <button class="btn"><i class="fas fa-file-alt"></i> Add Report</button>
            </a>
        </div>
    </div>
</body>
</html>
