<?php
$username='root';
$username='localhost';
$pass='';
$db='web_project'
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize the form data
    $name = htmlspecialchars($_POST['uname']);
    $email = htmlspecialchars($_POST['passw']);

    // Process the data (e.g., save to database, send email, etc.)
    // For this example, we'll just display the data
    echo "<h2>Form Data Received</h2>";
    echo "<p>Name: " . $name . "</p>";
    echo "<p>Email: " . $email . "</p>";
}
?>
