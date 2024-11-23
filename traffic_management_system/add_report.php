<?php
include 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $vehicle_number = $_POST['vehicle_number'];
    $vehicle_name = $_POST['vehicle_name'];
    $address = $_POST['address'];
    $violation_details = implode(", ", $_POST['violation']);  // Handle multiple violations
    $fine = $_POST['fine'];

    // Insert data into the reports table
    $sql = "INSERT INTO reports (vehicle_number, vehicle_name, address, violation_details, fine) 
            VALUES ('$vehicle_number', '$vehicle_name', '$address', '$violation_details', '$fine')";
    
    if ($conn->query($sql) === TRUE) {
        // Show success message and then redirect to the dashboard after 2 seconds
        echo "<script>
                alert('Report added successfully');
                setTimeout(function() {
                    window.location.href = 'dashboard.php';
                }, 2000); // Redirect after 2 seconds
              </script>";
    } else {
        // Show error if insertion fails
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Report</title>
    <link rel="stylesheet" href="css/add_report.css">
</head>
<body>
    <div class="container">
        <div class="form-card">
            <h2>Add Report</h2>
            <form method="POST" action="add_report.php">
                <label for="vehicle_number">Vehicle Number</label>
                <input type="text" name="vehicle_number" id="vehicle_number" required>

                <label for="vehicle_name">Vehicle Name</label>
                <input type="text" name="vehicle_name" id="vehicle_name" required>

                <label for="address">Owner's Address</label>
                <input type="text" name="address" id="address" required>

                <label for="violation">Violation Details</label><br>
                <input type="checkbox" name="violation[]" value="Speeding"> Speeding
                <input type="checkbox" name="violation[]" value="Running Red Light"> Running Red Light
                <input type="checkbox" name="violation[]" value="No Parking"> No Parking
                <input type="checkbox" name="violation[]" value="Reckless Driving"> Reckless Driving
                <input type="checkbox" name="violation[]" value="Driving Without License"> Driving Without License<br>

                <label for="fine">Total Fine</label>
                <input type="number" name="fine" id="fine" required>

                <button type="submit">Add Report</button>
            </form>

            <!-- Dashboard Button -->
            <a href="dashboard.php">
                <button class="btn-dashboard">Go to Dashboard</button>
            </a>
        </div>
    </div>
</body>
</html>
