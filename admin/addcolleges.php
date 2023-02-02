<?php
session_start();
require "../config/database.php";

if (!isset($_SESSION["admin"])) {
  echo "<script> location.replace('login.php') </script>";
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Add Colleges</title>
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    </head>
    <body>
       
            
            <!-- Page content wrapper-->
            <div class="d-flex flex-column min-vh-100">

                <!-- Top navigation-->

                <nav class="navbar navbar-expand-lg py-3 navbar-dark bg-info border-bottom border-info">
                    <div class="container-fluid">
                        <button class="btn shadow-none btn-sm text-light"    data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="bi bi-list fs-4"></i></button>
                        <!-- <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="bi bi-list fs-4"></i></button> -->
                    </div>
                </nav>

                                
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header bg-info py-4">
                <h5 class="offcanvas-title w-100 text-center text-light" id="offcanvasWithBothOptionsLabel">MENU</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="list-group text-break list-group-flush fs-4 text-center">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="viewstudents.php">View Students</a>
                    <a class="list-group-item text-info list-group-item-action list-group-item-light p-3" href="addcolleges.php">Add Colleges</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="viewcolleges.php">View Colleges</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="viewevents.php">View Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="logout.php">Logout</a>
                </div>
            </div>
        </div>


        <?php
        if (isset($_SESSION["save"])) {
        ?>

            <div class="position-fixed  top-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-success bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            College Added Successfully !
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["save"]);
        ?>


        <?php
        if (isset($_SESSION["fail"])) {
        ?>

            <div class="position-fixed  top-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-danger bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                        College Adding Failed !
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["fail"]);
        ?>


        <?php
        if (isset($_SESSION["exists"])) {
        ?>

            <div class="position-fixed top-0 end-0 toastae p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-warning hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            College Already Exists !
                        </div>
                        <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["exists"]);
        ?>


                <!-- Page content-->
                <div class="container flex-fill">
                    <h4 class="my-5 text-center text-decoration-underline tug-1">Add Colleges</h4>  
                    <div class="container">
                    <form action="savecollege.php" id="savecollegeform" method="post">
                            <div class="row justify-content-evenly mb-4 gap-md-0 gap-2">
                                <div class="col-md-4 position-relative">
                                    <label for="name" class="form-label">Name :</label>
                                    <input type="text" class="form-control shadow-none" name="name" id="name" placeholder="Name">
                                            <div class="invalid-tooltip rounded-3 alertname">
                                                * Enter Name
                                            </div>
                                </div>
                                <div class="col-md-4 position-relative">
                                <label for="email" class="form-label">Email :</label>
                                    <input type="text" class="form-control shadow-none" name="email" id="email" placeholder="Email">
                                            <div class="invalid-tooltip rounded-3 alertemail">
                                                * Enter Valid Email
                                            </div>
                                </div>
                            </div>
                            <div class="row justify-content-evenly mb-5 gap-md-0 gap-2">
                                <div class="col-md-4 position-relative">
                                    <label for="password" class="form-label">Password :</label>
                                    <input type="text" class="form-control shadow-none" name="password" id="password" placeholder="Password">
                                            <div class="invalid-tooltip rounded-3 ">
                                                * Enter Password
                                            </div>
                                </div>
                                <div class="col-md-4 position-relative">
                                <label for="phone" class="form-label">Phone :</label>
                                    <input type="text" class="form-control shadow-none" name="phone" id="phone" placeholder="Phone">
                                            <div class="invalid-tooltip rounded-3 alertphone">
                                                * Enter Valid Phone
                                            </div>
                                </div>
                            </div>
                            <div class="row justify-content-evenly gap-md-0 gap-2">
                                <div class="col-md-4 order-2 order-md-1">
                                    <button type="reset" class="btn fs-5 w-100 btn-sm btn-danger shadow-none">Reset</button>
                                </div>
                                <div class="col-md-4 order-1 order-md-2">
                                <button type="submit" name="addcollege" class="btn fs-5 w-100 btn-sm btn-info shadow-none">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>                 
                </div>

            </div>


        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
        <script>
        $(function() {

            $('.toast').toast('show');

            $("#savecollegeform").on("submit", function(e) {
                debugger;

                var email = $("#email").val()
                var password = $("#password").val()
                var name = $("#name").val()
                var phone = $("#phone").val()
                var testemail = new RegExp("[a-z0-9]+@[a-z]+\.[a-z]{2,3}");
                var testphone = new RegExp("^[6-9][0-9]{9}$");

                if (email != "") {
                    if (!testemail.test(email)) {
                        $(".alertemail").text("* Enter Valid Email");
                        $("#email").addClass("is-invalid");
                        e.preventDefault();
                    } else {
                        $("#email").removeClass("is-invalid");
                    }
                } else {
                    $(".alertemail").text("* Enter Email");
                    $("#email").addClass("is-invalid");
                    e.preventDefault();
                }

                if (phone != "") {
                    if (!testphone.test(phone)) {
                        $(".alertphone").text("* Enter Valid Phone");
                        $("#phone").addClass("is-invalid");
                        e.preventDefault();
                    } else {
                        $("#phone").removeClass("is-invalid");
                    }
                } else {
                    $(".alertphone").text("* Enter Phone");
                    $("#phone").addClass("is-invalid");
                    e.preventDefault();
                }

                if (password != "") {
                    $("#password").removeClass("is-invalid");
                } else {
                    $("#password").addClass("is-invalid");
                    e.preventDefault();
                }

                if (name != "") {
                    $("#name").removeClass("is-invalid");
                } else {
                    $("#name").addClass("is-invalid");
                    e.preventDefault();
                }

            })

        })
    </script>
    </body>
</html>
