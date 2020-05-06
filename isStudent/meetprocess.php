                                       <?php
                                        $localhost = "localhost"; #localhost
                                        $dbusername = "root"; #username of phpmyadmin
                                        $dbpassword = "";  #password of phpmyadmin
                                        $dbname = "web";  #database name
                                        session_start();

                                        #connection string
                                        $conn = mysqli_connect($localhost, $dbusername, $dbpassword, $dbname);

                                        if (isset($_POST["submit"])) {
                                            if (isset($_GET["id"])) {
                                                #retrieve file title
                                                $meet = $_GET["id"];
                                                $note = $_POST['note'];

                                                #file name with a random number so that similar dont get replaced
                                                $pname = rand(1000, 10000) . "-" . $_FILES["file"]["name"];

                                                #temporary file name to store file
                                                $tname = $_FILES["file"]["tmp_name"];

                                                #upload directory path
                                                $uploads_dir = 'filemeet';
                                                #TO move the uploaded file to specific location
                                                move_uploaded_file($tname, $uploads_dir . '/' . $pname);

                                                #sql query to insert into database
                                                //$sql = "INSERT into file(title,image) VALUES('$title','$pname')";
                                                //$sql2 = "SELECT tutorId FROM `group1` WHERE studentId =" . $_SESSION['accountID'];

                                                $sql = "UPDATE `meeting` SET `note`= '$note',`location`= '$pname' WHERE student = " . $_SESSION['accountID'];
                                                // echo $fileName . "-";
                                                //echo $tutorGroup . "-";
                                                // echo $pname . "-";
                                                // echo $stu . "-";
                                                // echo $comment . "-";
                                                echo $sql;
                                                mysqli_query($conn, $sql);
                                                header('Location: meet.php?id=' .$meet);
                                            }
                                        }
                                        ?>