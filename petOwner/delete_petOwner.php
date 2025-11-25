<?php
include "../connect.php";

$id = $_GET['petOwnerID'];

$sql = "UPDATE petOwner 
        SET isDeleted = 1
        WHERE petOwnerID = '$id'";

mysqli_query($conn, $sql);

header("Location: read_petOwner.php");
exit();
?>

