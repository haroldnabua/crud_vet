<?php
include "../connect.php";

$cID = $_GET['consultID'];

$sql = "UPDATE consultation
        SET isDeleted = 1
        WHERE consultID = '$cID'";

mysqli_query($conn, $sql);
header("Location: read_consultation.php");
exit();

?>