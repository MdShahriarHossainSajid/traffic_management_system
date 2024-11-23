<?php
session_start();
include 'includes/config.php'; // Include database connection

// Check if the ID is set and is a valid number
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the report from the database
    $query = "DELETE FROM reports WHERE id = $id";
    if ($conn->query($query) === TRUE) {
        // Set success message in session
        $_SESSION['message'] = "Report deleted successfully.";
    } else {
        // Set error message in session
        $_SESSION['message'] = "Error deleting report: " . $conn->error;
    }
} else {
    // Invalid ID
    $_SESSION['message'] = "Invalid report ID.";
}

// Redirect to the dashboard
header('Location: dashboard.php');
exit();
?>
