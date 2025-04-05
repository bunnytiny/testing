<?php
// Database credentials
$servername = "localhost"; // XAMPP default
$username = "root";      // XAMPP default
$password = "";          // XAMPP default (empty password)
$dbname = "post_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitizeInput($data) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($data));
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $updateTitle = sanitizeInput($_POST["updateTitle"]);
    $updateDate = sanitizeInput($_POST["updateDate"]);

    // SQL query to insert data into the database (Prepared Statements)
    $sql = "INSERT INTO updates (title, date) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $updateTitle, $updateDate);

    if ($stmt->execute() === TRUE) {
        echo "<script>alert('New record created successfully'); window.location.href = window.location.href;</script>"; // Success message with page refresh
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>"; // Error message
    }
    $stmt->close();
}

// Close the database connection
$conn->close();
?>