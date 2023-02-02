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

                $query = "delete from events_2022_events where id = '$id'";
                  
                    if(!mysqli_query($link,$query))
                    {
                        $qstate = false;
                    }
            
    
            if ($qstate) 
            {
                $_SESSION["save"] = 'success';
                echo "<script> location.replace('viewevents.php') </script>";
            }
            else
            {
                $_SESSION["fail"] = 'success';
                echo "<script> location.replace('viewevents.php') </script>";
            }  
        
    } 
    else 
    {
        echo "<script> location.replace('viewevents.php') </script>";
    }
}

mysqli_close($link);
