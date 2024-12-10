<?php
// Database connection configuration
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = "";     // Default XAMPP password
$dbname = "web";
// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);
// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Retrieve data from the HTML form
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$location = $_POST['location'];
$interests = $_POST['interests'];
// Insert data into the 'userprofiles' table
$sql = "INSERT INTO userprofiles(username, email, password, location, interests) VALUES ('$username', '$email', '$password', '$location', '$interests')";

if ($conn->query($sql) === TRUE) {
    echo "Booking successful ! <br>";

    // Selecting data to display in a table
    $sql = "SELECT  username, email, location, interests FROM userprofiles WHERE email = '$email'";
    $result = $conn->query($sql);

    // Display data in table format
    echo"$result->num_rows";
    if ($result->num_rows > 0) {
        echo "<style>
        body{
            background-color: #3EECAC;
background-image: linear-gradient(19deg, #3EECAC 0%, #EE74E1 100%);

        }
        button {

            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 10px;
            cursor: pointer;
          }

        div{
            display:flex;
            justify-content:center;
            align-items:center;

        }
        p{
            display: flex;
                      justify-content: center;
        }
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>";

        echo "<div>
        <table>
            <tr>
                // <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Location</th>
                <th>Interests</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            // echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["location"] . "</td>";
            echo "<td>" . $row["interests"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";

            echo "</tr>";
        }
        echo "</table> </div>";
        // Adding a button to return to the home page
        echo '<br><p><button onclick="window.location.href=\'index.html\'">Return to Home Page</button></p>';
    } else {
        echo "0 results";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Closing the connection
$conn->close();
?>
