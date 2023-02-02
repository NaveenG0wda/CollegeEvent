<?php
session_start();
require "../config/database.php";

if (isset($_SESSION["student"])) {
  echo "<script> location.replace('dashboard.php') </script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    <style>
        .bg-image {
            background: url("../images/bg.jpg");
            /* background-blend-mode: screen; */
            background-size: cover;
            /* background-color: darkgray; */
        }
    </style>

</head>

<body>
    <div class="d-flex flex-column min-vh-100 bg-image">

        <nav class="navbar shadow-sm navbar-expand-lg navbar-dark py-3 bg-info mb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">STUDENT</a>
                <button class="btn btn-outline-info text-light py-1 shadow-none btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                            <i class="bi bi-list fs-4"></i>
                        </button>
            </div>
        </nav>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header bg-info py-4">
                <h5 class="offcanvas-title w-100 text-center text-light" id="offcanvasWithBothOptionsLabel">MENU</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="list-group text-break list-group-flush fs-4 text-center">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../index.php">Home</a>
                    <a class="list-group-item text-info list-group-item-action list-group-item-light p-3" href="login.php">Login</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="register.php">Register</a>
                </div>
            </div>
        </div>

        <?php
        if (isset($_SESSION["fail"])) {
        ?>

            <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-danger hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            Login Failed !
                        </div>
                        <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["fail"]);
        ?>


        <div class="container m-auto">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-info"></div>
                        <div class="card-body">
                            <h3 class="fw-normal text-center mb-4 mt-3">LOGIN !</h3>
                            <form action="auth.php" method="post" id="loginform">
                            <div class="row justify-content-center gap-4">
                                <div class="col-md-10">
                                    <div class="input-group position-relative">
                                        <span class="input-group-text">
                                            <i class="bi bi-at"></i>
                                        </span>
                                        <input type="text" name="email" id="email" class="form-control shadow-none" placeholder="Email">
                                        <div class="invalid-tooltip rounded-3 alertemail">
                                            * Enter Valid Email
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="input-group position-relative">
                                        <span class="input-group-text">
                                            <i class="bi bi-lock"></i>
                                        </span>
                                        <input type="password" name="password" id="password" class="form-control shadow-none" placeholder="Password">
                                        <div class="invalid-tooltip rounded-3 ">
                                            * Enter Password
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-4">
                                <div class="col-md-10 my-2">
                                    <button type="submit" name="studentlogin" class="btn btn-sm fs-5 btn-outline-info shadow-none w-100">
                                        SUBMIT
                                    </button>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="card-footer bg-info"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3"></div>


    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(function() {

            $('.toast').toast('show');

            $("#loginform").on("submit", function(e) {
                debugger;

                var email = $("#email").val()
                var password = $("#password").val()
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

                if (password != "") {
                    $("#password").removeClass("is-invalid");
                } else {
                    $("#password").addClass("is-invalid");
                    e.preventDefault();
                }

            })

        })
    </script>
</body>

</html>