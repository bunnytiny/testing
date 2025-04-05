<?php
include 'db_connect.php';

$sql = "SELECT title, date, message, image FROM posts ORDER BY id DESC";
$result = $conn->query($sql);

$posts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
}

echo json_encode($posts);
?>
