<?php

include "../connect.php";

$sql = "SELECT * FROM consultation WHERE isDeleted = 0";

$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Consultation Records</title>
</head>
<body>
    <h2>Consultation Records</h2>

    <table border = "8" cellpadding = "5" cellspacing = "0">
        <tr>
            <th>Consultation ID</th>
            <th>Pet</th>
            <th>Veterinarian</th>
            <th>Consultation Date</th>
            <th>Diagnoses</th>
            <th>Prescription</th>
            <th>ACTIONS</th>
        </tr>
        <?php while ($row = mysqli_fetch_array($result)) : ?>
            <tr>
            <td><?=$row['consultID']?></td>
            <td><?=$row['petID']?></td>
            <td><?=$row['vetID']?></td>
            <td><?=$row['consultDate']?></td>
            <td><?=$row['diagnoses']?></td>
            <td><?=$row['prescription']?></td>
            <td>
                <a href="update_consultation.php?consultID=<?=$row['consultID']?>">Update</a>
                <a href="delete_consultation.php?consultID=<?=$row['consultID']?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
        </table>
</body>
</html>