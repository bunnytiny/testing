
<?php
// delete_update.php
// Deletes an update from the database.

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "post_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM updates WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: test.php"); // Replace with your actual page name
    exit;
} else {
    echo "Error deleting record: " . $conn->error;
}

$stmt->close();
$conn->close();
?>

