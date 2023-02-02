<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'events_2022');

 
//$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

 $link=mysqli_connect('182.50.133.84:3306','salesroot','salesroot@123','salesdb'); 
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>