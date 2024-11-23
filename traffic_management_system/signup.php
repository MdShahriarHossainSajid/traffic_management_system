<?php
include 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user input
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $rank = $_POST['rank'];

    // Check if the user already exists (based on email)
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // User with this email already exists
        echo "<script>alert('User with this email already exists. Please login or use a different email.');</script>";
    } else {
        // Insert new user if no existing user is found
        $sql = "INSERT INTO users (name, phone, email, password, rank) VALUES ('$name', '$phone', '$email', '$password', '$rank')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Signup successful! Please login.'); window.location.href='login.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <div class="container">
        <div class="form-card">
            <h2>Sign Up</h2>
            <form method="POST" action="signup.php">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" required>

                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="phone" required>

                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>

                <label for="rank">Police Rank</label>
                <select name="rank" id="rank" required>
                    <option value="Constable">Constable</option>
                    <option value="Sergeant">Sergeant</option>
                    <option value="Inspector">Inspector</option>
                    <option value="Sub-Inspector">Sub-Inspector</option>
                </select>

                <button type="submit">Sign Up</button>
            </form>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>
</html>
