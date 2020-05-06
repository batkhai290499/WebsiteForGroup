<?php
$sever = 'localhost';
$server_user = 'root';
$database = 'web';
$server_pass = '';
$connect = mysqli_connect($sever, $server_user, $server_pass, $database);
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");

if (isset($_POST["send"])) {
    if (isset($_GET["id"])) {
        $messStu = $_GET["id"];
        $messTutor = $_SESSION['accountID'];
        $messContent = $_POST["messContent"];
        $time = date("Y-m-d H:i:s");

        if ($messContent == "") {
            echo "<script>
            if (confirm('please fill the blank?') == true) {
               window.location='view.php';
           }else {
               window.location='view.php';
           }
           </script>";
        } else {
            $sql = "INSERT INTO `message`(`messTo`, `messFrom`, `messContent`, `time`) VALUES ($messTutor,  $messStu, '$messContent','$time')";
            echo $sql;
            mysqli_query($connect, $sql);
            header('Location: chat.php?id=' .$messStu );
        }
    }
}
?>