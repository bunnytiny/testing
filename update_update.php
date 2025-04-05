<?php
// update_update.php
// Updates an existing update in the database.

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "post_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$title = $_POST['title'];
$date = $_POST['date'];

$sql = "UPDATE updates SET title = ?, date = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $title, $date, $id);

if ($stmt->execute()) {
    echo "Update successful";
} else {
    echo "Error updating record: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
