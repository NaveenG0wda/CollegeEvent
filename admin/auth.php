<?php

session_start();
require "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['adminlogin'])) 
    {
        $email = mysqli_real_escape_string($link, trim($_POST['email']));
        $password = mysqli_real_escape_string($link, trim($_POST['password']));

        if($email == "admin@admin.com" && $password == "admin") 
        {
            $_SESSION["admin"] = "admin@admin.com";
            echo "<script> location.replace('dashboard.php') </script>";
        }
        else
        {
           $_SESSION["fail"] = "yes";
           echo "<script> location.replace('login.php') </script>";
        }
    } 
    else 
    {
        echo "<script> location.replace('login.php') </script>";
    }

    mysqli_close($link);
}
