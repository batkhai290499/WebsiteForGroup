<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: ./isLogin/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>eTutor</title>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

  <!--Select Plugins-->
  <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
  <!--inputtags-->
  <link href="assets/plugins/inputtags/css/bootstrap-tagsinput.css" rel="stylesheet" />
  <!--multi select-->
  <link href="assets/plugins/jquery-multi-select/multi-select.css" rel="stylesheet" type="text/css">
  <!--Bootstrap Datepicker-->
  <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
  <!--Touchspin-->
  <link href="assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css">

  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet" />
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet" />

</head>


<body class="bg-theme bg-theme2">

  <!-- start loader -->
  <!-- <div id="pageloader-overlay" class="visible incoming">
    <div class="loader-wrapper-outer">
      <div class="loader-wrapper-inner">
        <div class="loader"></div>
      </div>
    </div>
  </div> -->
  <!-- end loader -->

  <!-- Start wrapper-->
  <div id="wrapper">

    <!--Start sidebar-wrapper-->
    <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
      <div class="brand-logo">
        <a href="index.php">
          <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
          <h5 class="logo-text">eTutor</h5>
        </a>
      </div>
      <ul class="sidebar-menu">
        <li class="sidebar-header">MAIN NAVIGATION</li>
        <li>
          <a href="teacher.php" class="waves-effect">
            <i class="zmdi zmdi-view-dashboard"></i> <span>View Tutor</span><i class="fa fa-angle-left pull-right"></i>
          </a>
        </li>
        <li>
          <a href="student.php" class="waves-effect">
            <i class="zmdi zmdi-layers"></i>
            <span>View Student</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
        </li>
        <li>
          <a href="meeting.php" class="waves-effect">
            <i class="zmdi zmdi-widgets"></i> <span>List Meeting</span>
            <i class="fa fa-angle-left float-right"></i>
          </a>
        </li>
        <!-- <li>
          <a href="javaScript:void();" class="waves-effect">
            <i class="zmdi zmdi-widgets"></i> <span>Widgets</span>
            <i class="fa fa-angle-left float-right"></i>
          </a>
          <ul class="sidebar-submenu">
            <li><a href="widgets-static.html"><i class="zmdi zmdi-dot-circle-alt"></i> Static Widgets</a></li>
            <li><a href="widgets-data.html"><i class="zmdi zmdi-dot-circle-alt"></i> Data Widgets</a></li>
          </ul>
        </li> -->
      </ul>

    </div>
    <!--End sidebar-wrapper-->

    <!--Start topbar header-->
    <header class="topbar-nav">
      <nav class="navbar navbar-expand fixed-top">
        <ul class="navbar-nav mr-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link toggle-menu" href="javascript:void();">
              <i class="icon-menu menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <form class="search-bar">
              <input type="text" class="form-control" placeholder="Enter keywords">
              <a href="javascript:void();"><i class="icon-magnifier"></i></a>
            </form>
          </li>
        </ul>

        <ul class="navbar-nav align-items-center right-nav-link">
          <li class="nav-item">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
              <span class="user-profile"><img src="https://via.placeholder.com/150" class="img-circle" alt="user avatar"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-item user-details">
                <a href="javaScript:void();">
                  <div class="media">
                    <div class="avatar"><img class="align-self-start mr-3" src="" alt="user avatar"></div>
                    <div class="media-body">
                      <h6 class="mt-2 user-title"><?php echo $_SESSION['username'];  ?></h6>
                      <p class="user-subtitle"></p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="dropdown-divider"></li>
              <button type="button" class="btn btn-light waves-effect waves-light m-1" onclick="openForm()"> <i class="fa fa-star"></i> <span>Edit Account</span> </button>
              <li class="dropdown-divider"></li>
              <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
              <li class="dropdown-divider"></li>
              <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
              <li class="dropdown-divider"></li>
              <li class="dropdown-item"><i class="icon-power mr-2"></i> <a href="./isLogin/logout.php">Logout</a> </li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
    <!--End topbar header-->

    <div class="clearfix"></div>

    <div class="content-wrapper">
      <div class="container-fluid">

        <!-- form edit popup -->
        <div class="form-popup" id="myForm">
          <div class="card">
            <div class="card-header">Change Information</div>
            <div class="card-body">
              <form method="post">
                <thead>
                  <h6 class="mt-2 user-title"><?php echo $_SESSION['userName'];  ?></h6>
                  <p class="user-subtitle"><?php echo $_SESSION['userEmail'];  ?></p>
                  <div class="form-group">
                    <label for="input-6">Adress</label>
                    <input type="text" name=userAddress class="form-control form-control-rounded" id="input-6" placeholder="<?php echo $_SESSION['userAddress'];  ?>">
                  </div>
                  <div class="form-group">
                    <label for="input-7">Phone</label>
                    <input type="text" name=userPhone class="form-control form-control-rounded" id="input-7" placeholder="<?php echo $_SESSION['userPhone'];  ?>">
                  </div>
                  <div class="form-group">
                    <label for="input-8">Age</label>
                    <input type="number" name=userAge class="form-control form-control-rounded" id="input-8" placeholder="<?php echo $_SESSION['userAge'];  ?>">
                  </div>
                  <div class="form-group">
                    <label for="input-9">Avatar</label>
                    <input type="link" name=userAvatar class="form-control form-control-rounded" id="input-9" placeholder="Input Link Image">
                  </div>
                  <div class="form-group">
                    <label for="input-10">Password</label>
                    <input type="password" name=userPassword class="form-control form-control-rounded" id="input-10">
                  </div>

                  <button type="submit" name="submit" class="btn btn-light btn-round px-5"><i class="icon-circle"></i> Change</button>
                  <button class="btn btn-light btn-round px-5" onclick="closeForm()"><i class="icon-lock"></i> Close</button>

                </thead>
                <?php
                $sever = 'localhost';
                $server_user = 'root';
                $database = 'web';
                $server_pass = '';
                $connect = mysqli_connect($sever, $server_user, $server_pass, $database);
                require("database.php");
                if (isset($_POST["submit"])) {

                  $userAddress = $_POST["userAddress"];
                  $userPhone = $_POST["userPhone"];
                  $userAge = $_POST["userAge"];
                  $userAvatar = $_POST["userAvatar"];
                  $userPassword = $_POST["userPassword"];

                  $sql = "UPDATE user SET userAddress='$userAddress',userPhone='$userPhone',userAge='$userAge',userAvatar='$userAvatar', userPassword='$userPassword' WHERE userId=" . $_SESSION['userId'];

                  mysqli_query($connect, $sql);
                  echo "ok";
                }
                ?>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">List Tutor</h5>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Age</th>
                      </tr>
                    </thead>
                    <?php
                    require_once './database.php';
                    $sql = "Select * from tutor";
                    $rows = query($sql);
                    for ($i = 0; $i < count($rows); $i++) {
                    ?>
                      <div>
                        <tr>
                          <td class="column1"><?= $rows[$i][0] ?></td>
                          <td class="column2"><?= $rows[$i][1] ?></td>
                          <td class="column3"><?= $rows[$i][2] ?></td>
                          <td class="column4"><?= $rows[$i][3] ?></td>
                          <td class="column4"><?= $rows[$i][4] ?></td>
                          <td class="column4"><?= $rows[$i][5] ?></td>
                        </tr>
                      </div>
                    <?php
                    }
                    ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- test -->
        <!--End Row-->
        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->
      </div>
      <!-- End container-fluid-->

    </div>
    <!--End content-wrapper-->
    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    <!--Start footer-->
    <footer class="footer">
      <div class="container">
        <div class="text-center">
          You are <?php echo $_SESSION['username'];  ?> have been loggin success !
        </div>
      </div>
    </footer>
    <!--End footer-->

    <!--start color switcher-->
    <!--end color switcher-->

  </div>
  <!--End wrapper-->


  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

  <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>

  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>

  <!--Bootstrap Touchspin Js-->
  <script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
  <script src="assets/plugins/bootstrap-touchspin/js/bootstrap-touchspin-script.js"></script>

  <!--Select Plugins Js-->
  <script src="assets/plugins/select2/js/select2.min.js"></script>
  <!--Inputtags Js-->
  <script src="assets/plugins/inputtags/js/bootstrap-tagsinput.js"></script>

  <!--Bootstrap Datepicker Js-->
  <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('#default-datepicker').datepicker({
      todayHighlight: true
    });
    $('#autoclose-datepicker').datepicker({
      autoclose: true,
      todayHighlight: true
    });

    $('#inline-datepicker').datepicker({
      todayHighlight: true
    });

    $('#dateragne-picker .input-daterange').datepicker({});
  </script>

  <!--Multi Select Js-->
  <script src="assets/plugins/jquery-multi-select/jquery.multi-select.js"></script>
  <script src="assets/plugins/jquery-multi-select/jquery.quicksearch.js"></script>

  <script>
    $(document).ready(function() {
      $('.single-select').select2();

      $('.multiple-select').select2();

      //multiselect start

      $('#my_multi_select1').multiSelect({
        selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
        selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
        afterInit: function(ms) {
          var that = this,
            $selectableSearch = that.$selectableUl.prev(),
            $selectionSearch = that.$selectionUl.prev(),
            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

          that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
            .on('keydown', function(e) {
              if (e.which === 40) {
                that.$selectableUl.focus();
                return false;
              }
            });

          that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
            .on('keydown', function(e) {
              if (e.which == 40) {
                that.$selectionUl.focus();
                return false;
              }
            });
        },
        afterSelect: function() {
          this.qs1.cache();
          this.qs2.cache();
        },
        afterDeselect: function() {
          this.qs1.cache();
          this.qs2.cache();
        }
      });
      $('#my_multi_select2').multiSelect({
        selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
        selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
        afterInit: function(ms) {
          var that = this,
            $selectableSearch = that.$selectableUl.prev(),
            $selectionSearch = that.$selectionUl.prev(),
            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

          that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
            .on('keydown', function(e) {
              if (e.which === 40) {
                that.$selectableUl.focus();
                return false;
              }
            });

          that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
            .on('keydown', function(e) {
              if (e.which == 40) {
                that.$selectionUl.focus();
                return false;
              }
            });
        },
        afterSelect: function() {
          this.qs1.cache();
          this.qs2.cache();
        },
        afterDeselect: function() {
          this.qs1.cache();
          this.qs2.cache();
        }
      });

      $('#my_multi_select3').multiSelect({
        selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
        selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
        afterInit: function(ms) {
          var that = this,
            $selectableSearch = that.$selectableUl.prev(),
            $selectionSearch = that.$selectionUl.prev(),
            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

          that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
            .on('keydown', function(e) {
              if (e.which === 40) {
                that.$selectableUl.focus();
                return false;
              }
            });

          that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
            .on('keydown', function(e) {
              if (e.which == 40) {
                that.$selectionUl.focus();
                return false;
              }
            });
        },
        afterSelect: function() {
          this.qs1.cache();
          this.qs2.cache();
        },
        afterDeselect: function() {
          this.qs1.cache();
          this.qs2.cache();
        }
      });

      $('.custom-header').multiSelect({
        selectableHeader: "<div class='custom-header'>Selectable items</div>",
        selectionHeader: "<div class='custom-header'>Selection items</div>",
        selectableFooter: "<div class='custom-header'>Selectable footer</div>",
        selectionFooter: "<div class='custom-header'>Selection footer</div>"
      });


    });
  </script>

  <script>
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
  </script>
</body>

</html>