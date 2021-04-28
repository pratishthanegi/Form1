<?php
$con = mysqli_connect('localhost', 'root', '','form1');

if(!$con){
    die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
}
?>