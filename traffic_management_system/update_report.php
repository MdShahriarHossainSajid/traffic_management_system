<?php
// Start session to check user authentication
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

include 'includes/config.php'; // Include database connection

// Fetch report data to populate the form
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM reports WHERE id = '$id'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<p class='error'>Report not found.</p>";
        exit;
    }
}

// Handle form submission for update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vehicle_number = $_POST['vehicle_number'];
    $vehicle_name = $_POST['vehicle_name'];
    $address = $_POST['address'];
    $violations = isset($_POST['violations']) ? implode(', ', $_POST['violations']) : ''; // Store selected violations as a comma-separated string
    $fine = $_POST['fine'];

    // SQL query to update the report
    $update_query = "UPDATE reports SET vehicle_number='$vehicle_number', vehicle_name='$vehicle_name', 
                     address='$address', violation_details='$violations', fine='$fine' 
                     WHERE id='$id'";

    if ($conn->query($update_query)) {
        echo "<p class='success'>Report updated successfully.</p>";
    } else {
        echo "<p class='error'>Error updating report: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Report</title>
    <link rel="stylesheet" href="css/update_report.css">
</head>
<body>
    <div class="container">
        <h2>Update Report</h2>

        <!-- Form for updating report -->
        <form action="" method="POST">
            <label for="vehicle_number">Vehicle Number</label>
            <input type="text" id="vehicle_number" name="vehicle_number" value="<?php echo $row['vehicle_number']; ?>" required>

            <label for="vehicle_name">Vehicle Name</label>
            <input type="text" id="vehicle_name" name="vehicle_name" value="<?php echo $row['vehicle_name']; ?>" required>

            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>" required>

            <!-- Violation Details Section with Checkboxes -->
            <label for="violations">Violation Details</label>
            <div id="violations">
                <label>
                    <input type="checkbox" name="violations[]" value="Speeding" <?php echo (strpos($row['violation_details'], 'Speeding') !== false) ? 'checked' : ''; ?>>
                    Speeding
                </label><br>

                <label>
                    <input type="checkbox" name="violations[]" value="Illegal Parking" <?php echo (strpos($row['violation_details'], 'Illegal Parking') !== false) ? 'checked' : ''; ?>>
                    Illegal Parking
                </label><br>

                <label>
                    <input type="checkbox" name="violations[]" value="Drunk Driving" <?php echo (strpos($row['violation_details'], 'Drunk Driving') !== false) ? 'checked' : ''; ?>>
                    Drunk Driving
                </label><br>

                <label>
                    <input type="checkbox" name="violations[]" value="Red Light Violation" <?php echo (strpos($row['violation_details'], 'Red Light Violation') !== false) ? 'checked' : ''; ?>>
                    Red Light Violation
                </label><br>

                <label>
                    <input type="checkbox" name="violations[]" value="Reckless Driving" <?php echo (strpos($row['violation_details'], 'Reckless Driving') !== false) ? 'checked' : ''; ?>>
                    Reckless Driving
                </label><br>

                <label>
                    <input type="checkbox" name="violations[]" value="Other" <?php echo (strpos($row['violation_details'], 'Other') !== false) ? 'checked' : ''; ?>>
                    Other
                </label><br>
            </div>

            <label for="fine">Fine</label>
            <input type="number" id="fine" name="fine" value="<?php echo $row['fine']; ?>" required>

            <button type="submit">Update Report</button>
        </form>

        <!-- Dashboard Button -->
        <div class="dashboard-btn">
            <a href="dashboard.php">
                <button>Back to Dashboard</button>
            </a>
        </div>
    </div>
</body>
</html>
