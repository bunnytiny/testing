<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
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
        // Success Message with JavaScript popup
        echo "<script>
            alert('Update posted successfully!');
            window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
          </script>";
        exit;
    } else {
        // Error Message with JavaScript popup and redirect
        echo "<script>
            alert('Error: " . $stmt->error . "');
            window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
          </script>";
    }
    $stmt->close();
}

// Close the database connection
$conn->close();
?>