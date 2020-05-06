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



$sever = 'localhost';
$server_user = 'root';
$database = 'web';
$server_pass = '';
$connect = mysqli_connect($sever, $server_user, $server_pass, $database);
if (isset($_POST["crete"])) {

	$groupName = $_POST["groupName"];
	$tutorGroup = $_POST["tutorGroup"];
	$studentGroup = $_POST["studentGroup"];

	if ($groupName == "" || $tutorGroup == "" || $studentGroup == "") {
		echo "Please fill the blank!";
	} else {

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
		$mail->Subject = "Hi ! You have been assigned a class. Visit the website to find out details";
		//Set sender email
		$mail->setFrom('noreply@gmail.com');
		//Enable HTML
		$mail->isHTML(true);
		//Attachment
		$mail->addAttachment('img/attachment.png');
		//Email body
		$mail->Body = "<h1>Bạn đã được phân vào lớp học</h1></br><p>Thầy giáo của bạn có tên là '$tutorGroup'. Đây là mail tự động, vui lòng không trả </p>";
		//Add recipient
		foreach ($studentGroup as $stu) {
			$sql1 = "SELECT username FROM `account` WHERE `accountID` =" . $stu;
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
		foreach ($studentGroup as $stu) {
			//echo $stu;
			$sql = "INSERT INTO `group1`(`groupName`, `studentId`, `tutorId`) VALUES ('$groupName', '$stu', '$tutorGroup')";
			echo $sql;
			mysqli_query($connect, $sql);
			//header('Location: index.php');
		}
	}
}
