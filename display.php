<?php
include 'db_connect.php';

// Fetch all posts
$sql = "SELECT * FROM posts ORDER BY id DESC";
$result = $conn->query($sql);

$posts = [];
while ($row = $result->fetch_assoc()) {
    $posts[] = $row;
}

echo json_encode($posts);
?>
