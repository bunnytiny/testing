<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASE Konaseema - Updates</title>
    <link rel="icon" type="image/png" href="https://bunnytiny.github.io/testing/img/aselogo.png">
    <link href="https://fonts.googleapis.com/css2?family=Ramabhadra&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arial+MT&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/anke" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            background: #f8f9fa;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background: linear-gradient(to bottom, rgba(128, 128, 128, 0.2), transparent) top;
            background-repeat: no-repeat;
            background-size: 100% 100px;
        }

        .logo {
            width: 10%;
            height: auto;
        }

        .header h1 {
            font-family: 'Arial MT Black', sans-serif;
            font-size: 50px;
            color: #f50000ff;
            line-height: 0.8;
        }

        .header h2 {
            font-family: 'Anke', sans-serif;
            font-size: 20px;
            color: #2c8440ff;
            line-height: 0.2;
        }

        .header h3 {
            font-family: 'Arial MT', sans-serif;
            font-size: 26px;
            color: #262caaff;
            line-height: 0.5;
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
            transition: transform 0.3s ease-in-out;
        }

        .navbar a:hover {
            transform: scale(1.1);
        }

        .updates {
            width: 40%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        .updates h2 {
            font-size: 24px;
            color: #ff0000;
            margin-bottom: 15px;
        }

        .updates form {
            display: flex;
            flex-direction: column;
        }

        .updates label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
            text-align: left;
        }

        .updates input {
            padding: 12px;
            margin-bottom: 15px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 95%;
            transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            font-family: 'Poppins', sans-serif;
        }

        .updates input:focus {
            border-color: #ff0000;
            box-shadow: 0 0 8px rgba(255, 0, 0, 0.3);
            outline: none;
        }

        .updates input[type="date"] {
            position: relative;
            background: #fff;
            padding: 10px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }

        .updates button {
            background: #ff0000;
            color: white;
            width: 50%;
            padding: 12px 15px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            margin: 10px auto;
        }

        .updates button:hover {
            background-color: #cc0000;
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(255, 0, 0, 0.3);
        }

        .modal {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 30px;
            width: 350px;
            text-align: center;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .modal button {
            padding: 12px 20px;
            margin: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
        }

        .green {
            background-color: green;
            color: white;
        }

        .red {
            background-color: red;
            color: white;
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

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-buttons {
            display: flex;
            justify-content: space-around;
        }

        .action-buttons button {
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="https://bunnytiny.github.io/testing/img/aselogo.png" alt="ASE Konaseema Logo" class="logo">
        <div>
            <h1>ASSOCIATION OF SECRETARIAT ENGINEERS</h1>
            <h2>Registered No: 231/2023</h2>
            <h3>Dr. B.R. Ambedkar Konaseema District</h3>
        </div>
        <img src="https://bunnytiny.github.io/testing/img/englogo.png" alt="Engineering Department Logo" class="logo">
    </div>

    <div class="navbar">
        <a href="#">Dashboard</a>
    </div>

    <div class="updates">
        <h2>Post an Update</h2>
        <form id="myForm" action="submit_update.php" method="POST">
            <label for="updateTitle">Title of the Update:</label>
            <input type="text" id="updateTitle" name="updateTitle" required>

            <label for="updateDate">Date:</label>
            <input type="date" id="updateDate" name="updateDate" required>

            <button type="submit">Submit</button>
        </form>
        <div id="confirmationModal" class="modal">
            <div class="modal-content">
                <p>Are You Sure to Post?</p>
                <button id="confirmPost" class="green">Post</button>
                <button id="cancelPost" class="red">Cancel</button>
            </div>
        </div>
    </div>

   <script>
        function editUpdate(id) {
            fetch(`get_update.php?id=${id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('editId').value = data.id;
                    document.getElementById('editTitle').value = data.title;
                    document.getElementById('editDate').value = data.date;
                    document.getElementById('editPopup').style.display = 'block';
                    document.getElementById('overlay').style.display = 'block';
                })
                .catch(error => {
                    console.error('There has been a problem with your fetch operation:', error);
                    alert('Failed to fetch update data.');
                });
        }

        function closePopup() {
            document.getElementById('editPopup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        function saveEdit() {
            const id = document.getElementById('editId').value;
            const title = document.getElementById('editTitle').value;
            const date = document.getElementById('editDate').value;

            fetch('update_update.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id=${id}&title=${encodeURIComponent(title)}&date=${encodeURIComponent(date)}`
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response;
                })
                .then(response => {
                    location.reload();
                })
                .catch(error => {
                    console.error('There has been a problem with your fetch operation:', error);
                    alert('Failed to update. Please try again.');
                });
        }

        function deleteUpdate(id) {
            if (confirm("Are you sure you want to delete this update?")) {
                window.location.href = "delete_update.php?id=" + id;
            }
        }
        
         function fetchUpdates() {
            fetch('get_updates.php')
                .then(response => response.json())
                .then(updates => {
                    const tableBody = document.querySelector('#updatesTable tbody');
                    tableBody.innerHTML = ''; // Clear existing rows

                    updates.forEach(update => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${update.title}</td>
                            <td>${update.date}</td>
                            <td class="action-buttons">
                                <button class="edit" onclick="editUpdate(${update.id})">Edit</button>
                                <button class="delete" onclick="deleteUpdate(${update.id})">Delete</button>
                            </td>
                        `;
                        tableBody.appendChild(row);
                    });
                })
                .catch(error => console.error('Error fetching updates:', error));
        }

        // Fetch updates on page load
        fetchUpdates();

        // Optionally, fetch updates at regular intervals
        setInterval(fetchUpdates, 5000); // Update every 5 seconds
    </script>
</body>
</html>