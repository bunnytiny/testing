<?php
// Database connection details
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

// Fetch updates from the database
$sql = "SELECT title, date FROM updates";
$result = $conn->query($sql);

$updates = array();

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $formattedDate = date('d/m/Y', strtotime($row["date"]));
            $updates[] = "<span style='color:red;'>$formattedDate</span> <span style='color:green;'>{$row['title']}</span> || &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp";
        }
    }
    $result->close();
} else {
    echo "Error fetching updates: " . $conn->error;
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASE Konaseema</title>

    <link rel="icon" type="image/png" href="https://bunnytiny.github.io/testing/img/aselogo.png">
    <link href="https://fonts.googleapis.com/css2?family=Ramabhadra&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arial+MT&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/jorgey" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/vintage-comic" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/edo-sz" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/anke" rel="stylesheet">

    <style>
        /* Your CSS styles here */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            text-align: center;
            background: white;
            background-repeat: no-repeat;
            background-size: 100% 100px;
        }

        .header h1 {
            font-family: 'Arial MT Black', sans-serif;
            font-size: 50px;
            color: #f50000ff;
            margin-bottom: 0.2em;
            line-height: 0.5; /* Added line-height */
        }

        .header h2 {
            font-family: 'Anke', sans-serif;
            font-size: 20px;
            color: #2c8440ff;
            margin-bottom: 0.2em;
            line-height: 0.5; /* Added line-height */
        }

        .header h3 {
            font-family: 'Arial MT', sans-serif;
            font-size: 26px;
            color: #262caaff;
            margin-bottom: 0.2em;
            line-height: 0.5; /* Added line-height */
        }

        .header h4 {
            font-family: 'Arial MT', sans-serif;
            font-size: 16px;
            color: #000000;
            margin-bottom: 0.2em;
            line-height: 1.2; /* Adjusted line-height */
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .logo {
            width: 10%;
            height: auto;
        }

        .navbar {
            display: flex;
            justify-content: space-around;
            background: #ff0000ff;
            padding: 10px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 20px;
            padding: 10px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .navbar a:hover {
            transform: scale(1.8);
            border-radius: 50px;
        }

        .main-container {
            display: flex;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
            justify-content: space-between;
        }

        .updates {
            width: 35%;
            background: #fcfcfcff;
            padding: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .gallery {
            width: 60%;
            background: #ffffff;
            padding: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .image-container img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            transition: opacity 0.5s ease-in-out;
        }

        .image-title {
            font-size: 30px;
            margin: 10px 0;
            color: #ff0000ff;
            font-family: 'Ramabhadra', sans-serif;
            line-height: 1.2;
        }

        .image-date {
            font-size: 18px;
            margin: 5px 0;
            color: #008800ff;
        }

        .nav-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 20px;
            border-radius: 50%;
        }

        .nav-button:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        .updates-bar {
            display: flex;
            align-items: center;
            background: white;
            color: Black;
            padding: 15px;
            font-size: 10px;
            font-weight: bold;
            width: 100%;
            overflow: hidden;
        }

        .updates-title {
            background: #3c8725ff;
            color: White;
            padding: 5px;
            font-size: 20px;
            font-weight: bold;
            width: 35%;
            /* 35% width for updates title */
        }

        .updates-content {
            flex-grow: 0;
            /* Remaining space */
            padding-left: 10px;
            font-size: 20px;
            white-space: nowrap;
            animation: marquee 30s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .footer {
            background: #ff0000ff;
            color: white;
            padding: 30px 15px;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            text-align: left;
        }

        .footer-column {
            width: 23%;
            min-width: 200px;
            padding: 10px;
        }

        .footer h3 {
            font-size: 22px;
            margin-bottom: 10px;
            border-bottom: 2px solid #ffaa00;
            padding-bottom: 5px;
        }

        .footer a {
            color: white;
            text-decoration: none;
            display: block;
            margin: 5px 0;
            font-size: 14px;
        }

        .social-icons a {
            display: inline-block;
            margin-right: 10px;
        }

        .social-icons img {
            width: 30px;
            height: 30px;
        }
    </style>
</head>

<body>
    <header class="header">
        <img src="https://bunnytiny.github.io/testing/img/aselogo.png" alt="ASE Logo" class="logo">
        <div>
            <h1>ASSOCIATION OF SECRETARIAT ENGINEERS</h1>
            <h2>Registered No: 231/2023</h2>
            <h3>Dr. B.R. Ambedkar Konaseema District</h3>
            <h4>"We Engineering Assistants strive hard with our skills and workmanship to facilitate rural villages,
                <br>with necessary infrastructure cum connectivity and thus being part of Nation Building."
            </h4>
        </div>
        <img src="https://bunnytiny.github.io/testing/img/englogo.png" alt="Engineering Logo" class="logo">
    </header>

    <nav class="navbar">
        <a href="#">Home</a>
        <a href="#">Estimates</a>
        <a href="#">G.O's</a>
        <a href="#">Circulars</a>
        <a href="#">Mobile Apps</a>
        <a href="#">Materials</a>
        <a href="#">Formats</a>
        <a href="#">News Articles</a>
        <a href="#">Employee Corner</a>
        <a href="#">About</a>
    </nav>

    <div class="updates-bar">

        <div class="updates-content" id="updatesMarquee">
            <?php
            if (count($updates) > 0) {
                echo implode(' &nbsp; &nbsp; &nbsp; &nbsp;', $updates);
            } else {
                echo "No updates available.";
            }
            ?>
        </div>
    </div>

    <main class="main-container">
        <section class="updates">
            <h2>Updates</h2>
            <p>Latest news and announcements will be displayed here.</p>
        </section>
        <section class="gallery">
            <div class="image-container">
                <div class="image-title" id="postTitle">Loading...</div>
                <div class="image-date" id="postDate"></div>
                <img id="postImage" src="" alt="Post Image">
            </div>

        </section>
    </main>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-column">
                <h3>Connect With Us</h3>
                <div class="social-icons">
                    <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook"></a>
                    <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/2111/2111728.png" alt="WhatsApp"></a>
                    <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/2111/2111646.png" alt="Telegram"></a>
                    <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram"></a>
                    <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/732/732200.png" alt="Gmail"></a>
                    <p>Design & Developed By</p>
                    <p>G.L.Bhagath, Engineering Assistant</p>
                </div>
            </div>
            <div class="footer-column">
                <h3>Quick Links</h3>
                <a href="#">AP Seva</a>
                <a href="#">MGNREGS</a>
                <a href="#">CFMS Bill Status</a>
                <a href="#">GSWS HRMS</a>
                <a href="#">Mana Badi-Mana Bhavishyathu</a>
                <a href="#"></a>
                
            </div>
            <div class="footer-column">
                <h3>ASE Unit</h3>
                <a href="#">ASE State Team</a>
                <a href="#">ASE District Team</a>
                <a href="#">ASE Mandal Team</a>
            </div>
            <div class="footer-column">
                <h3>Address</h3>
                <p>Amalapuram</p>
                <p>Dr.B.R.Ambedkar Konaseema, Andhra Pradesh</p>
                <p>India - 533201</p>
            </div>
        </div>
        <p>© ASE Konaseema. All rights reserved.</p>
    </footer>

    <script>
        let posts = [];
        let index = 0;

        function fetchPosts() {
            fetch("fetch_posts.php")
                .then(response => response.json())
                .then(data => {
                    posts = data;
                    if (posts.length > 0) {
                        showPost();
                        setInterval(nextPost, 10000);
                    }
                })
                .catch(error => console.error("Error:", error));
        }

        function formatDate(dateString) {
            let date = new Date(dateString);
            return `${date.getDate().toString().padStart(2, '0')}/${(date.getMonth() + 1).toString().padStart(2, '0')}/${date.getFullYear()}`;
        }

        function showPost() {
            if (posts.length > 0) {
                document.getElementById("postTitle").innerText = posts[index].title;
                document.getElementById("postDate").innerText = formatDate(posts[index].date);
                document.getElementById("postImage").src = posts[index].image;
            }
        }

        function nextPost() {
            index = (index + 1) % posts.length;
            showPost();
        }

        function prevPost() {
            index = (index - 1 + posts.length) % posts.length;
            showPost();
        }

        fetchPosts();
    </script>
</body>

</html>