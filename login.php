<?php
$servername = "localhost"; // Change this to your server name (often 'localhost')
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "webtproject"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
   
    $email = $_POST['email'];
    $password = $_POST['password'];
   

    // Insert data into UserProfiles table
    $sql = "INSERT INTO login (email, password) VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";

           // SQL injection prevention using prepared statements

           $stmt = $conn->prepare("SELECT * FROM login WHERE email = ? AND password = ?");
           $stmt->bind_param("ss", $email, $password);
           $stmt->execute();
       
           $result = $stmt->get_result();
       
           if ($result->num_rows > 0) {
               // User authenticated successfully
               $conn->close(); // Close connection
       
               // Redirect to home page after successful login
               header("Location: index.html");
               exit();
           } else {
               // Invalid credentials, handle as needed
               echo "Invalid email or password";
               $conn->close();
           }


    }


     
}




?>