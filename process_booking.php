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
   
    $destination = $_POST['destination'];
    $people = $_POST['people'];
    $arrivalDate = $_POST['arrivalDate'];
    $leavingDate = $_POST['leavingDate'];
    $phone = $_POST['phn_no'];
    
    // Insert data into UserProfiles table
    $sql = "INSERT INTO booking (destination, people,arrivalDate,leavingDate,phone) VALUES ('$destination', '$people','$arrivalDate','$leavingDate','$phone')";

    if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";

           // SQL injection prevention using prepared statements

           $stmt = $conn->prepare("SELECT * FROM booking WHERE destination = ? AND people = ? AND arrivalDate=? AND leavingDate=? AND phone=?");
           $stmt->bind_param("sssss", $destination,$people,$arrivalDate,$leavingDate, $phone);
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