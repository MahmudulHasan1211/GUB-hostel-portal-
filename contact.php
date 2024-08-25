<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO `contact`(`Name`, `Email`, `message`) VALUES ('$_POST[Name]','$_POST[Email]','$_POST[mass]')";

if($conn->query($sql) === true)
{
    echo "Message sended";
    
}   

else
{
    echo "Try again".$conn->error;;
}


?>
