<?php

include "../connect.php";

if (isset($_GET['keyword'])){
    $key = $_GET['keyword'];

$sql = "SELECT * FROM veterinarian
        WHERE isDeleted = 0
        AND (
                vetID LIKE '%$key%' OR
                vetFName LIKE '%$key%' OR
                vetLName LIKE '%$key%' OR
                vetSpecial LIKE '%$key%'
            )";

$result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Veterinarian Records</title>
</head>
<body>
    <h2>Search Veterinarian Records</h2>

    <form method = "GET">
        <input type = "text" name = "keyword" placeholder = "Search for vet...">
        <button type = "submit">Search</button><br><br>
    </form>

    <?php if(isset($result)) :  ?>
    <table border = "8" cellpadding = "5" cellspacing = "0">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Specialization</th>
</tr>
        <?php while ($row = mysqli_fetch_array($result)) : ?>
        <tr>
            <td><?= $row['vetID'] ?></td>
            <td><?= $row['vetFName'] ?></td>
            <td><?= $row['vetLName'] ?></td>
            <td><?= $row['vetAddress'] ?></td>
            <td><?= $row['vetSpecial'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <?php endif; ?>
    
</body>
</html>