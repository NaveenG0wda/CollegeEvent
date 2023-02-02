<?php

session_start();
require "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['studentlogin'])) 
    {
        $email = mysqli_real_escape_string($link, trim($_POST['email']));
        $password = mysqli_real_escape_string($link, trim($_POST['password']));

        $query = "select * from events_2022_students where email = '$email' and password = '$password'";

        $result = mysqli_query($link, $query);

        $row = mysqli_fetch_array($result);

        if (!empty($row["email"]) && !empty($row["password"])) 
        {
            $_SESSION["student"] = $row["email"];
            $_SESSION["studentname"] = $row["name"];
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
