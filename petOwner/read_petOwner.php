<?php
include "../connect.php";

$sql = "SELECT * FROM petOwner
        WHERE isDeleted = 0";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Pet Owner</title>
</head>
<body>
    <h2>View Pet Owner</h2>

    <table border = "8" cellpadding = "5" cellspacing = "0">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birth Date</th>
            <th>Telephone No.</th>
            <th>ACTIONS</th>
        </tr>
        <?php while ($row = mysqli_fetch_array($result)) : ?>
            <tr>
                <td><?= $row['petOwnerID'] ?></td>
                <td><?= $row['petOwnerFName'] ?></td>
                <td><?= $row['petOwnerLName'] ?></td>
                <td><?= $row['petOwnerBDate'] ?></td>
                <td><?= $row['petOwnerTelNo'] ?></td>

                <td>
                    <a href="update_petOwner.php?petOwnerID=<?= $row['petOwnerID'] ?>">Update</a>
                    <a href="delete_petOwner.php?petOwnerID=<?= $row['petOwnerID'] ?>">Delete</a>
        </td>

        </tr>
        <?php endwhile; ?>
        </table><br>
        <a href="add_petOwner.php">Add Pet Owner Here</a>
</body>
</html>