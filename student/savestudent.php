<?php

session_start();
require "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['savestudent'])) 
    {
        $state = true;

        $name = mysqli_real_escape_string($link, trim($_POST['name']));
        $phone = mysqli_real_escape_string($link, trim($_POST['phone']));
        $email = mysqli_real_escape_string($link, trim($_POST['email']));
        $password = mysqli_real_escape_string($link, trim($_POST['password']));
        $uid = "stu_".substr(bin2hex(random_bytes(10)),0, 10);

        date_default_timezone_set("Asia/Calcutta");
        $date = date("d/m/Y h:i:s A");

        $checkRecord = mysqli_query($link, "SELECT * FROM events_2022_students WHERE email='$email'");

        $totalrows = mysqli_num_rows($checkRecord);

        if ($totalrows > 0) 
        {
            $_SESSION["exists"] = 'yes';
            echo "<script> location.replace('register.php') </script>";
        } 
        else 
        {
            $query = "insert into events_2022_students (uid,name,email,password,phone) values ('$uid','$name','$email','$password','$phone')";

            if (!mysqli_query($link, $query)) 
            {
                $state = false;
            }

            if ($state) 
            {
                $_SESSION["save"] = "yes";
                echo "<script> location.replace('register.php') </script>";
            } 
            else 
            {
                $_SESSION["fail"] = "yes";
                echo "<script> location.replace('register.php') </script>";
            }
        }
    } 
    else 
    {
        echo "<script> location.replace('register.php') </script>";
    }

    mysqli_close($link);
}
