<?php
include "../connect.php";

$sql = "SELECT * FROM veterinarian
        WHERE isDeleted = 0";

$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Veterinarian</title>
</head>
<body>
    <h2>View Veterinarian</h2>

    <table border = "8" cellpadding = "5" cellspacing = "0">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Specialization</th>
            <th>ACTIONS</th>
</tr>
        <?php while($row = mysqli_fetch_array($result)) : ?>
            <tr>
                <td><?=$row['vetID'] ?></td>
                <td><?=$row['vetFName']?></td>
                <td><?=$row['vetLName']?></td>
                <td><?=$row['vetAddress']?></td>
                <td><?=$row['vetSpecial']?></td>
                <td>
                <a href="update_veterinarian.php?vetID=<?=$row['vetID'] ?> ">Update</a>
                <a href="delete_veterinarian.php?vetID=<?=$row['vetID'] ?> ">Delete</a>
        </td>

            </tr>
            <?php endwhile; ?>
        </table><br>
        <a href="add_veterinarian.php">Add Veterinarian Here</a>
</body>
</html>