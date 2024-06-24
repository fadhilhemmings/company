<?php
include_once("../config.php");
 
$no_karcis = $_GET['no_karcis'];
 
$result = mysqli_query($mysqli, "DELETE FROM rcv_ranap WHERE no_karcis='$no_karcis'");
 
header("Location:index.php");
?>