<?php
include "../connect.php";

if (isset($_GET['keyword'])) {
    $key = $_GET['keyword'];

    $sql = "SELECT * FROM PetOwner
            WHERE isDeleted = 0
            AND (
                    petOwnerID LIKE '%$key%' OR
                    petOwnerFName LIKE '%$key%' OR
                    petOwnerLName LIKE '%$key%'
                )";
                
$result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Pet Owner Records</title>
</head>
<body>
    <h2>Search Pet Owner Records</h2>

    <form method ="GET">
        <input type = "text" name = "keyword" placeholder = "Search pet owner...">
        <button type = "submit">Search</button><br><br>
    </form>

    <?php if (isset($result)) : ?>
        <table border = "8" cellpadding="5" cellspacing = "0">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birth Date</th>
                <th>Telephone No.</th>
    </tr>
    <?php while($row = mysqli_fetch_array($result)) : ?>
        <tr>
            <td><?= $row['petOwnerID'] ?></td>
            <td><?= $row['petOwnerFName'] ?></td>
            <td><?= $row['petOwnerLName'] ?></td>
            <td><?= $row['petOwnerBDate'] ?></td>
            <td><?= $row['petOwnerTelNo'] ?></td>
    </tr>
    <?php endwhile; ?>
    </table>
    <?php endif; ?>
    
</body>
</html>