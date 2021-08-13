<?php
session_start();
?>
<?php

$servername = "sql303.epizy.com";
$username = "epiz_24645821";
$password = "F2WkQXhNqW";
$dbname = "epiz_24645821_mess";
$conn = new mysqli($servername, $username, $password,$dbname);
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $name = $_POST['user_id'];
    $pass = $_POST['pass_id'];
    $_SESSION['user_name']=$name; 
    $pass = sha1($pass);
    $name = stripslashes($name);
    $pass = stripslashes($pass);
    $name = mysqli_real_escape_string($conn,$name);
    $pass = mysqli_real_escape_string($conn,$pass);
    $sql  = "SELECT * FROM student WHERE USERNAME = '$name' AND PASS_WORD = '$pass'";
    $result = mysqli_query($conn,$sql);
    $check = mysqli_fetch_array($result);
    if(isset($check)){
        echo "<script type='text/javascript'>window.location.assign('first.html')</script>";
    }
    else{
            echo "<script type='text/javascript'>"; 
            echo "window.alert('INVALID CREDENTIALS');";
            echo "window.location.assign('index.html');";
            echo "</script>";
    }


    mysqli_close($conn);
    exit;
?>