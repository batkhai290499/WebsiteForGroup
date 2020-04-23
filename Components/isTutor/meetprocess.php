<?php
$sever = 'localhost';
$server_user = 'root';
$database = 'web';
$server_pass = '';
$connect = mysqli_connect($sever, $server_user, $server_pass, $database);
session_start();

if (isset($_POST["meetnow"])) {

    $title = $_POST["title"];
    $time = $_POST["time"];
    $studentGroup = $_POST["studentGroup"];
    $tutor = $_SESSION["accountID"];

    if ($title == "" || $studentGroup == "" || $time == "") {
        echo "Please fill the blank!";
    } else {
        foreach ($studentGroup as $stu) {
            //echo $stu;
            $sql = "INSERT INTO `meeting`(`meetingDate`, `tutor`, `student`, `meetingTitle`) VALUES ('$time', $tutor, $stu, '$title')";
            echo $sql;
            mysqli_query($connect, $sql);
            header('Location: meet.php?id=' .$tutor);

        }
    }
}
