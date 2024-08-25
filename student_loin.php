<?php 
// session_start();
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_project"; 
$conn = new mysqli($servername, $username, $password, $dbname); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $sql="SELECT * FROM registration WHERE username ='".$_POST['username']."' AND password = '".$_POST['password']."' ";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $sql = "SELECT student_id, student_name, email, username, password, date_of_birth, gender, language, country FROM registration WHERE username ='".$_POST['username']."' AND password = '".$_POST['password']."'";
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
            echo "Done";
        } else {
            echo "Invalid login";  
        }
    }

    if (isset($_POST['new_sid']) && isset($_POST['new_username']) && isset($_POST['new_pass'])) {
        $sql = "UPDATE registration SET username = '".$_POST['new_username']."', password = '".$_POST['new_pass']."' WHERE student_id = '".$_POST['new_sid']."'";
        if ($conn->query($sql) === TRUE) {
            echo "Updated";
        } else {
            echo "Did not update";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Student Information</title>
    <style>
        .refresh-button {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
    <script>
        function refreshPage() {
            location.reload();
        }
    </script>
</head>
<body>
    <button class="refresh-button" onclick="refreshPage()">Refresh</button>
    
    <!-- <form action="" method='post'>
        <h3>Login</h3>
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login"><br><br>
        <hr>
        <br><br>
    </form> -->

    <form action="" method='post'>
        <h3>Update Student Information</h3>
        Student ID: <input type="text" name="new_sid" required><br>
        Username: <input type="text" name="new_username" required><br>
        Password: <input type="password" name="new_pass" required><br>
        <input type="submit" name="update" value="Update"><br><br>
        <hr>
        <br><br>
    </form>
</body>
</html>
