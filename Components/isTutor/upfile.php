<?php
$localhost = "localhost"; #localhost
$dbusername = "root"; #username of phpmyadmin
$dbpassword = "";  #password of phpmyadmin
$dbname = "web";  #database name
session_start();

#connection string
$conn = mysqli_connect($localhost, $dbusername, $dbpassword, $dbname);

if (isset($_POST["submit"])) {
    #retrieve file title
    $fileName = $_POST["fileName"];
    $studentGroup = $_POST["studentGroup"];
    $tutor = $_SESSION['accountID'];
    $comment = $_POST['comment'];

    #file name with a random number so that similar dont get replaced
    $pname = $_FILES["file"]["name"];

    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];

    #upload directory path
    $uploads_dir = 'file';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir . '/' . $pname);

    // $st = "file/" .$_FILES["file"]["name"];
    // echo $st;
    // echo "<a href='$st'>download</a>"; 
    #sql query to insert into database
    //$sql = "INSERT into file(title,image) VALUES('$title','$pname')";
    if ($fileName == "" || $studentGroup == "" || $comment == "" || $tutor == "") {
        echo "Please fill the blank!";
    } else {
        foreach ($studentGroup as $stu) {
            $sql = "INSERT INTO `file`(`fileName`, `location`, `tutor`, `student`, `comment`) VALUES ( '$fileName', '$pname', $tutor,  $stu, '$comment')";
            // echo $fileName . "-";
            // echo $tutor . "-";
            // echo $pname . "-";
            // echo $stu . "-";
            // echo $comment . "-";
            //echo $sql;
            mysqli_query($conn, $sql);
            header('Location: view.php');
        }
    }
}
