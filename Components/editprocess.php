<?php
//Include required PHPMailer files
require '../includes/PHPMailer.php';
require '../includes/SMTP.php';
require '../includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create instance of PHPMailer

//connect
$sever = 'localhost';
$server_user = 'root';
$database = 'web';
$server_pass = '';
$connect = mysqli_connect($sever, $server_user, $server_pass, $database);
session_start();

if (isset($_POST["edit"])) {
    if (isset($_GET["id"])) {

        //send infor in form
        $id = $_GET["id"];
        $groupName = $_POST["groupName"];
        //echo $groupName;
        $tutorGroup = $_POST["tutorGroup"];
        //echo $tutorGroup;

        //send email
        $mail = new PHPMailer();
        //Set mailer to use smtp
        $mail->isSMTP();
        //Define smtp host
        $mail->Host = "smtp.gmail.com";
        //Enable smtp authentication
        $mail->SMTPAuth = true;
        //Set smtp encryption type (ssl/tls)
        $mail->SMTPSecure = "tls";
        //Port to connect smtp
        $mail->Port = "587";
        //Set gmail username
        $mail->Username = "nguyenbatkhai99@gmail.com";
        //Set gmail password
        $mail->Password = "01698169087";
        //Email subject
        $mail->Subject = "Hi ! You have just been transferred to another class. Visit the website to find out details";
        //Set sender email
        $mail->setFrom('noreply@gmail.com');
        //Enable HTML
        $mail->isHTML(true);
        //Attachment
        $mail->addAttachment('img/attachment.png');
        //Email body
        $mail->Body = "<h1>Bạn vừa được sửa vào lớp học khác</h1></br><p>Thầy giáo của bạn có tên là '$tutorGroup' và lớp học của bạn có tên là '$groupName'. Đây là mail tự động, vui lòng không trả lời</p>";
        //Add recipient
        $sql1 = "SELECT username FROM `account` WHERE `accountID` =" . $id;
        echo $sql1;
        $result = mysqli_query($connect, $sql1);
        if ($result) {
            // Hàm `mysql_fetch_row()` sẽ chỉ fetch dữ liệu một record mỗi lần được gọi
            // do đó cần sử dụng vòng lặp While để lặp qua toàn bộ dữ liệu trên bảng posts
            while ($row = mysqli_fetch_row($result)) {
                printf($row[0]);
                $mail->addAddress(($row[0]));
            }
        }

        //Finally send email
        if ($mail->send()) {
            echo "Email Sent..!";
        } else {
            echo "Message could not be sent. Mailer Error: "{
                $mail->ErrorInfo};
        }
        //Closing smtp connection
        $mail->smtpClose();

        //send sql to server
        $sql = "UPDATE `group1` SET `groupName`='$groupName',`tutorId`='$tutorGroup' WHERE studentId = " . $id;
        echo $sql;
        mysqli_query($connect, $sql);
        header('Location: editgroup.php?id=' . $id);
    }
}
