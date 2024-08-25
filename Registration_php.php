<?php

$servername = "localhost";
$username = "root";
$password ="";
$dbname="web_project";


$conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) 
// {
//     die("Connection failed: " . $conn->connect_error);
// }


$sql = "INSERT INTO registration VALUES ('$_POST[sid]','$_POST[s_name]','$_POST[email]',
'$_POST[username]','$_POST[password]','$_POST[dob]','$_POST[gender]',
'$_POST[language]','$_POST[country]','$_POST[address]')";


if($conn->query($sql) === true)
{
    echo "inserted";
    echo "Submit Successful";
}

else
{
    echo "Try again".$conn->error;;
}
?>
