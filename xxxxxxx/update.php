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
    $name = $_SESSION['user_name'];
    if(isset($_POST['Submit'])){
        $selected_mess = $_POST['selectedmess'];
        $sql2 = "UPDATE `student` SET MESS_DETAILS='$selected_mess' WHERE USERNAME='$name'";
        $result1 = mysqli_query($conn,$sql2);
            echo "<script type='text/javascript'>"; 
            echo "document.write('updated');";
            echo "window.location.assign('services.php');";
            echo "</script>";
        

    }
?>