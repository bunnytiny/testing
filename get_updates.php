<?php
// get_updates.php
// Fetches all updates from the database.

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "post_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['error' => "Connection failed: " . $conn->connect_error]));
}

$sql = "SELECT id, title, date FROM updates ORDER BY date DESC";
$result = $conn->query($sql);

$updates = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $updates[] = $row;
    }
}

echo json_encode($updates);

$conn->close();
?>