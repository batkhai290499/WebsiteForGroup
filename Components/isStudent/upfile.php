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
    $stu = $_SESSION['accountID'];
    $tutorGroup = $_POST['tutorGroup'];

    #file name with a random number so that similar dont get replaced
    $pname = rand(1000, 10000) . "-" . $_FILES["file"]["name"];

    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];

    #upload directory path
    $uploads_dir = 'file';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir . '/' . $pname);

    #sql query to insert into database
    //$sql = "INSERT into file(title,image) VALUES('$title','$pname')";
    foreach ($tutorGroup as $tu) {
        $sql = "INSERT INTO `file`(`fileName`, `location`, `tutor`, `student`) VALUES ( '$fileName', '$pname', $tu,  $stu)";
        // echo $fileName . "-";
        //echo $tutorGroup . "-";
        // echo $pname . "-";
        // echo $stu . "-";
        // echo $comment . "-";
        //echo $sql;
        mysqli_query($conn, $sql);
        header('Location: view.php');
    }
}
