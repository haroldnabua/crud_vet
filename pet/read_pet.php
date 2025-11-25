<?php

include "../connect.php";

$sql = "SELECT * FROM pet WHERE isDeleted = 0";

$result = mysqli_query($conn, $sql);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Pet Records</title>
</head>
<body>
    <h2>View Pet Records</h2>

    <table border = "8" cellpadding = "5" cellspacing = "0">
        <tr>
            <th>Pet ID</th>
            <th>Pet Name</th>
            <th>Pet Type</th>
            <th>Pet Breed</th>
            <th>Pet Birth Date</th>
            <th>Pet Owner</th>
            <th>ACTIONS</th>
</tr>

<?php while ($row = mysqli_fetch_array($result)) : ?>
    <tr>
        <td><?= $row['petID'] ?></td>
        <td><?= $row['petName'] ?></td>
        <td><?= $row['petType'] ?></td>
        <td><?= $row['petBreed'] ?></td>
        <td><?= $row['petBDate'] ?></td>
        <td><?= $row['petOwnerID']?></td>

        </td>
        <td>
            <a href ="update_pet.php?petID=<?=$row['petID']?>">Update</a>
            <a href ="delete_pet.php?petID=<?=$row['petID']?>">Delete</a>
</tr>
<?php endwhile; ?>
</table><br>

<a href="add_pet.php">Add Pet Record here</a>
    
</body>
</html>