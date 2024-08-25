<?php
// Database connection details
$servername = "localhost";
$username = "root"; // replace with your MySQL username
$password = ""; // replace with your MySQL password
$dbname = "erp_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user inputs
    $name = $conn->real_escape_string($_POST['name']);
    $register_number = $conn->real_escape_string($_POST['reg_no']);
    $year = $conn->real_escape_string($_POST['year']);
    $section = $conn->real_escape_string($_POST['section']);
    $phone_number = $conn->real_escape_string($_POST['phone_no']);
    $email = $conn->real_escape_string($_POST['Email']);
    $address = $conn->real_escape_string($_POST['Address']);

    // Insert data into the database
    $sql = "INSERT INTO signup (name, register_number, year, section, phone_number, email, address)
            VALUES ('$name', '$register_number', '$year', '$section', '$phone_number', '$email', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>