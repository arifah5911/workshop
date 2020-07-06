<?php
$connection = mysqli_connect('localhost', 'root', '', 'leavedb');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
echo "";
?>