<?php
include 'db_connect.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    
    // Handle image upload
    $target_dir = "uploads/";
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . time() . "_" . $image_name; // Rename to avoid conflicts
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = array("jpg", "jpeg", "png", "gif");

    if (!in_array($imageFileType, $allowed_types)) {
        echo "Invalid file type. Only JPG, JPEG, PNG & GIF files are allowed.";
        exit;
    }

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Insert into database
        $sql = "INSERT INTO posts (title, date, message, image) VALUES ('$title', '$date', '$message', '$target_file')";
        
        if ($conn->query($sql) === TRUE) {
            echo "success";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error uploading file.";
    }
}
?>
