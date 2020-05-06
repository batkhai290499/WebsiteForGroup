<?php
$sever = 'localhost';
$server_user = 'root';
$database = 'web';
$server_pass = '';
$connect = mysqli_connect($sever, $server_user, $server_pass, $database);
require("../database.php");
session_start();

if (isset($_POST["addCmt"])) {

    if (isset($_GET["id"])) {
        $idfile = $_GET["id"];
        echo $idfile;
        $cmt = $_POST["cmt"];
        //$sql = "DELETE FROM `file` WHERE fileId=" . $id;
        $sql = "UPDATE `file` SET `comment`= '$cmt' WHERE fileId=" . $idfile;
        echo $sql;
        //fucking awesome !!! I can do it :v
        mysqli_query($connect, $sql);
       header('Location: edit.php?id=' .$idfile);
    }
}
?>