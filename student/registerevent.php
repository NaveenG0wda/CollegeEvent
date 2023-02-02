<?php
session_start();
require "../config/database.php";

if (!isset($_SESSION["student"])) {
    echo "<script> location.replace('login.php') </script>";
}

if (!isset($_GET["uid"])) {
    echo "<script> location.replace('applyevents.php') </script>";
}

$uid = mysqli_real_escape_string($link, $_GET["uid"]);
$name = mysqli_real_escape_string($link, $_GET["name"]);
$start = mysqli_real_escape_string($link, $_GET["start"]);
$end = mysqli_real_escape_string($link, $_GET["end"]);
$category = mysqli_real_escape_string($link, $_GET["category"]);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register Event</title>

    <!-- Core theme CSS (includes Bootstrap)-->
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <link href="../css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end border-info bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-wrap text-center bg-light py-4">EVENTS</div>
            <div class="list-group text-break text-center list-group-flush">
                <!-- <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard.php">Dashboard</a> -->
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="applyevents.php">Back</a>
                <a class="list-group-item border-bottom list-group-item-action list-group-item-light p-3" href="logout.php">Logout</a>
            </div>
        </div>

        <!-- Page content wrapper-->
        <div id="page-content-wrapper" class="d-flex flex-column">

            <!-- Top navigation-->

            <nav class="navbar navbar-expand-lg py-3 navbar-dark bg-info border-bottom border-info">
                <div class="container-fluid">
                    <button class="btn shadow-none btn-sm text-light" id="sidebarToggle"><i class="bi bi-list fs-4"></i></button>
                    <!-- <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="bi bi-list fs-4"></i></button> -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <!-- <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#!">Link</a>
                                </li> -->
                        </ul>
                    </div>
                </div>
            </nav>




            <?php
            if (isset($_SESSION["save"])) {
            ?>

                <div class="position-fixed  top-0 end-0 p-3" style="z-index: 11">
                    <div id="liveToast" class="toast bg-success  hide" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body ms-auto text-white">
                            Registration Successfull !
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
                    <div id="liveToast" class="toast bg-danger  hide" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body ms-auto text-white">
                                Registration Failed !
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
                                Event Already Exists !
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
                <h4 class="my-5 text-center text-decoration-underline tug-1">Register Event</h4>
                <div class="container mb-3">
                    <form action="saveregister.php" id="saveregisterform" method="post">
                        <div class="row justify-content-evenly mb-4 gap-md-0 gap-2">
                            <div class="col-md-4 position-relative">
                                <label for="name" class="form-label">Event Name :</label>
                                <input type="text" class="form-control shadow-none" name="name" id="name" placeholder="Event Name" value="<?= $name ?>">
                                <div class="invalid-tooltip rounded-3 alertname">
                                    * Enter Event Name
                                </div>
                            </div>
                            <div class="col-md-4 position-relative">
                                <label for="start" class="form-label">Start Date :</label>
                                <input type="date" class="form-control shadow-none" name="start" id="start" value="<?= $start ?>">
                                <div class="invalid-tooltip rounded-3 alertstart">
                                    * Enter Start Date
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-evenly mb-4 gap-md-0 gap-2">
                            <div class="col-md-4 position-relative">
                                <label for="category" class="form-label">Category :</label>
                                <select name="category" id="category" class="form-select shadow-none">
                                    <option value="">Select Category</option>
                                    <option value="cultural" <?= $category == "cultural" ? "selected" : "" ?>>Cultural</option>
                                    <option value="sports" <?= $category == "sports" ? "selected" : "" ?>>Sports</option>
                                </select>
                                <div class="invalid-tooltip rounded-3 ">
                                    * Select Category
                                </div>
                            </div>
                            <div class="col-md-4 position-relative">
                                <label for="end" class="form-label">End Date :</label>
                                <input type="date" class="form-control shadow-none" name="end" id="end" value="<?= $end ?>">
                                <div class="invalid-tooltip rounded-3 alertend">
                                    * Enter End Date
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-5 gap-md-0 gap-2">
                            <div class="col-md-10 px-4-5 position-relative">
                                <label for="students" class="form-label">Add Students :</label>
                                <textarea rows="5" class="form-control shadow-none" name="students" id="students" placeholder="Add Students"></textarea>
                                <div class="invalid-tooltip rounded-3 ">
                                    * Enter Students
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-evenly gap-md-0 gap-2">
                            <div class="col-md-4 order-2 order-md-1">
                                <button type="reset" class="btn fs-5 w-100 btn-sm btn-danger shadow-none">Reset</button>
                            </div>
                            <div class="col-md-4 order-1 order-md-2">
                            <input type="hidden" name="eveid" id="eveid" value="<?= $uid ?>">
                                <button type="submit" name="addregister" class="btn fs-5 w-100 btn-sm btn-info shadow-none">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../js/scripts.js"></script>
    <script>
        // The DOM element you wish to replace with Tagify
        var input = document.querySelector('textarea[name=students]');

        // initialize Tagify on the above input node reference
        new Tagify(input)


        $(function() {

            $('.toast').toast('show');

            $("#saveregisterform").on("submit", function(e) {
                debugger;

                var name = $("#name").val()
                var start = $("#start").val()
                var end = $("#end").val()
                var category = $("#category").val()
                var students = $("#students").val()

                var state = true;


                if (category != "") {
                    $("#category").removeClass("is-invalid");
                } else {
                    $("#category").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }

                if (end != "") {
                    $("#end").removeClass("is-invalid");
                } else {
                    $("#end").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }

                if (start != "") {
                    $("#start").removeClass("is-invalid");
                } else {
                    $("#start").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }

                if (name != "") {
                    $("#name").removeClass("is-invalid");
                } else {
                    $("#name").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }

                if (students != "") {
                    $("#students").removeClass("is-invalid");
                } else {
                    $("#students").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }

            })

        })
    </script>
</body>

</html>