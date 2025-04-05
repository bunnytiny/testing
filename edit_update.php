<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "post_database";

$conn = new mysqli($servername, $username, $password, $dbname);
it = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
     f ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM updates WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resul   // Display the edit form (HTML and PHP mixed)
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Edit Update</title>
        </head>
        <body>
            <h2>Edit Update</h2>
            <form action="update_update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                Title: <input type="text" name="title" value="<?php echo $row['title']; ?>"><br>
                Date: <input type="date" name="date" value="<?php echo $row['date']; ?>"><br>
                <input type="submit" value="Update">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Update not found.";
    }
    $stmt->close();
}
$conn->close();
?>