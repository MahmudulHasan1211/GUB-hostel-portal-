
<?php


$servername = "localhost";
$username = "root";
$password  = "";
$dbname = "web_project";

$conn = new mysqli($servername,$username,$password,$dbname);

if(isset($_POST["login"]))
{
    $sql="SELECT from student where Username ='$_POST[user]' and Password = '$_POST[pass]'";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if($count == 1)
    {
        header("location:hello.html");
    }
    else
    echo "Invalid login";   
}



?>