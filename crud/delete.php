
<?php

include('dbcon.php');

$id = $_GET['id'];

$qry = "DELETE FROM `login` WHERE `login`.`id` = $id";
$run = mysqli_query($con,$qry);
header('location:home.php');


?>