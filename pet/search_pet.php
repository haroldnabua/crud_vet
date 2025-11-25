<?php

include "../connect.php";

if (isset($_GET['keyword'])) {
    $key = $_GET['keyword'];

$sql = "SELECT * FROM pet
        WHERE isDeleted = 0
        AND (
                petID LIKE '%$key%' OR
                petName LIKE '%$key%' OR
                petOwnerID LIKE '%$key%' 
        )";


$result = mysqli_query($conn, $sql);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search for Pet Records</title>
</head>
<body>
    <h2>Search for Pet Records</h2>

    <form method = "GET">
        <input type = "text" name = "keyword" placeholder = "Search for a pet...">
        <button type = "submit">Search</button><br><br>
    </form>

    <?php if(isset($result)) : ?>
        <table border = "8" cellpadding = "5" cellspacing = "0">
        <tr>
            <th>Pet ID</th>
            <th>Pet Owner ID</th>
            <th>Pet Name</th>
            <th>Pet Type</th>
            <th>Pet Breed</th>
            <th>Pet Birth Date</th>
    </tr>
    <?php while ($row = mysqli_fetch_array($result)) : ?>
        <tr>
            <td><?= $row['petID'] ?></td>
            <td><?= $row['petOwnerID'] ?></td>
            <td><?= $row['petName'] ?></td>
            <td><?= $row['petType'] ?></td>
            <td><?= $row['petBreed'] ?></td>
            <td><?= $row['petBDate'] ?></td>
    </tr>
    <?php endwhile; ?>
    </table>
    <?php endif; ?>
</body>
</html>