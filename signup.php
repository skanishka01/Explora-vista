<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "webtproject";

// Create database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO signup (name, phone, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $phone, $email, $password);

    if ($stmt->execute()) {
        // Authenticate user after successful signup
        $auth_stmt = $conn->prepare("SELECT * FROM signup WHERE name = ? AND phone = ? AND email = ? AND password = ?");
        $auth_stmt->bind_param("ssss", $name, $phone, $email, $password);
        $auth_stmt->execute();
        $result = $auth_stmt->get_result();

        if ($result->num_rows > 0) {
            // User authenticated successfully
            $conn->close(); // Close the connection
            header("Location: index.html"); // Redirect to home page
            exit();
        } else {
            // Authentication failed
            echo "Invalid credentials.";
        }
    } else {
        // Handle insertion failure
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>




