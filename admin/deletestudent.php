<?php
session_start();

include "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['deletebutton'])) 
    { 
            $qstate = true;

            $id = mysqli_real_escape_string($link, trim($_POST['deletebutton']));
            // $uid = "uid_".substr(bin2hex(random_bytes(10)),0, 10);

                $query = "delete from events_2022_students where id = '$id'";
                  
                    if(!mysqli_query($link,$query))
                    {
                        $qstate = false;
                    }
            
    
            if ($qstate) 
            {
                $_SESSION["dsave"] = 'success';
                echo "<script> location.replace('viewstudents.php') </script>";
            }
            else
            {
                $_SESSION["dfail"] = 'success';
                echo "<script> location.replace('viewstudents.php') </script>";
            }  
        
    } 
    else 
    {
        echo "<script> location.replace('viewstudents.php') </script>";
    }
}

mysqli_close($link);
