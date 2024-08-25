<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        table {
            height: 400px;
            width: 960px;
            border-collapse: collapse;
            box-shadow: 2px 2px 15px;
        }

        td:nth-child(odd) {
            background-color: #9DB1EA;
        }

        th {
            background-color: yellow;
        }

        td:nth-child(even) {
            background-color: #CADCFC;
        }

        table, th, td, tr {
            border: 2px solid black;
            text-align: center;
            padding: 2px;
            color: black;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 44px;
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
        }

        h2, form, h1 {
            text-align: center;
        }

        .print-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .refresh-button {
            position: absolute;
            top: 20px;
            left: 20px;
        }
    </style>
    <script type="text/javascript">
        function printRecords() {
            var originalContents = document.body.innerHTML;
            var printContents = document.getElementById('records').innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }

        function refreshPage() {
            window.location.reload();
        }
    </script>
</head>
<body>

<div class="refresh-button">
    <button onclick="refreshPage()">Refresh</button>
</div>

<h1>Green University Hostel Portal</h1>

<hr>

<h2>Update Student Information</h2>

<form action="" method='post'>
   Student ID: <input type="text" name="new_sid">
   Username: <input type="text" name="new_username">
   Password: <input type="text" name="new_pass">
   
   <input type="submit" name="update" value="Update"><br><br>
   <hr>
   <br><br>
</form>

<hr>

<h2>Delete Student Information</h2>

<form action="" method="post">
    Student ID: <input type="text" name="del_sid">
    <input type="submit" name="delete" value="Delete">
    <br><br>
</form>

<hr>

<div id="records">
    <?php

    $servername = "localhost";
    $username = "root";
    $password  = "";
    $dbname = "web_project";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT student_id, student_name, email, username, password, date_of_birth, gender, language, country FROM registration";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>All Students Records</h2>";
        echo "<table border='1'>";
        echo "<tr>
            <th>Student id</th>
            <th>Student Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Language</th>
            <th>Country</th>            
        </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["student_id"] . "</td><td>" . $row["student_name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["username"] . "</td><td>" . $row["password"] . "</td><td>" . $row["date_of_birth"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["language"] . "</td><td>" . $row["country"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    if (isset($_POST["update"])) {
        $sql = "UPDATE registration SET password = '$_POST[new_pass]', username = '$_POST[new_username]' WHERE student_id = '$_POST[new_sid]'";
        if ($conn->query($sql) === TRUE) {
            echo "Updated";
        } else {
            echo "Did not update";
        }
    }

    if (isset($_POST["delete"])) {
        $sql = "DELETE FROM registration WHERE student_id = '$_POST[del_sid]'";
        if ($conn->query($sql) === TRUE) {
            echo "Deleted";
        } else {
            echo "Did not delete";
        }
    }

    ?>

    <?php
    // New PHP section for displaying random user questions
    $sql = "SELECT Name, Email, message FROM contact";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Random User Questions</h2>";
        echo "<table border='1'>";
        echo "<tr>
            <th>Name</th>            
            <th>Email</th>
            <th>Message</th>
                    
        </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["message"] ."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
</div>

<div class="print-button">
    <button onclick="printRecords()">Print Records</button>
</div>

</body>
</html>
