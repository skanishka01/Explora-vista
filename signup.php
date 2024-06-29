<!-- <?php
// Database connection using XAMPP (Assuming MySQL, change details accordingly)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webtproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch form data for signup
// $name = $_POST['name'];
// $email = $_POST['email'];<?php
$servername = "localhost"; // Change this to your server name (often 'localhost')
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "webtproject"; // Change this to your database name

// // Create connection
// $conn = new mysqli($servername, $username, $password, $database);

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
   

    // Insert data into UserProfiles table
    $sql = "INSERT INTO signup (name, phone, email, password) VALUES ('$name','$phone','$email','$password')";

    if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";

           // SQL injection prevention using prepared statements

           $stmt = $conn->prepare("SELECT * FROM signup WHERE name = ? AND phone =? AND email = ? AND password = ? ");
           $stmt->bind_param("ssss",$name,$phone, $email, $password);
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





    // Fetch email and password from the form
    // $email = $_POST['email'];
    // $password = $_POST['password'];

    // // SQL injection prevention using prepared statements
    // $stmt = $conn->prepare("SELECT * FROM login WHERE email = ? AND password = ?");
    // $stmt->bind_param("ss", $email, $password);
    // $stmt->execute();

    // $result = $stmt->get_result();

    // if ($result->num_rows > 0) {
    //     // User authenticated successfully
    //     $conn->close(); // Close connection

    //     // Redirect to home page after successful login
    //     header("Location: index.html");
    //     exit();
    // } else {
    //     // Invalid credentials, handle as needed
    //     echo "Invalid email or password";
    // }
// else {
//     // If the form is not submitted, handle the situation accordingly
//     echo "Form not submitted.";}

?>




// $password = $_POST['password'];

// // You should use prepared statements to prevent SQL injection

// // Example SQL query to insert user (change table and column names as per your database)
// $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

// if ($conn->query($sql) === TRUE) {
//     // User registered successfully
//     // Redirect to a login page or perform other actions
//     header("Location: login.html");
// } else {
//     // Error handling for signup failure
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();


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

?> -->








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
   $name = $_POST['name'];
   $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   

    // Insert data into UserProfiles table
    $sql = "INSERT INTO login (name,phone,email, password) VALUES ( '$name','$phone','$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";

           // SQL injection prevention using prepared statements

           $stmt = $conn->prepare("SELECT * FROM signup WHERE name =? AND phone =? AND email = ? AND password = ?");
           $stmt->bind_param("ssss",$name,$phone, $email, $password);
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





    // Fetch email and password from the form
    // $email = $_POST['email'];
    // $password = $_POST['password'];

    // // SQL injection prevention using prepared statements
    // $stmt = $conn->prepare("SELECT * FROM login WHERE email = ? AND password = ?");
    // $stmt->bind_param("ss", $email, $password);
    // $stmt->execute();

    // $result = $stmt->get_result();

    // if ($result->num_rows > 0) {
    //     // User authenticated successfully
    //     $conn->close(); // Close connection

    //     // Redirect to home page after successful login
    //     header("Location: index.html");
    //     exit();
    // } else {
    //     // Invalid credentials, handle as needed
    //     echo "Invalid email or password";
    // }
// else {
//     // If the form is not submitted, handle the situation accordingly
//     echo "Form not submitted.";}

?>