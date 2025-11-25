<?php
include "../connect.php";

$vID = $_GET['vetID'];

$sql = "UPDATE veterinarian
        SET isDeleted = 1
        WHERE vetID = '$vID'";

mysqli_query($conn, $sql);
header("Location: read_veterinarian.php");
exit();
?>