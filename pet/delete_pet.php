<?php
include "../connect.php";

$pID = $_GET['petID'];

$sql = "UPDATE pet
        SET isDeleted = 1
        WHERE petID = '$pID'";

mysqli_query($conn, $sql);
header("Location: read_pet.php");
exit();
?>