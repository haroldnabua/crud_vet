<?php

include "../connect.php";

$pID = $_GET['petID'];
$owners = mysqli_query($conn, "SELECT * FROM petOwner WHERE isDeleted = 0");

$sql = "SELECT * FROM pet
        WHERE petID = '$pID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $pName = $_POST['petName'];
    $pType = $_POST['petType'];
    $pBreed = $_POST['petBreed'];
    $pBDate = $_POST['petBDate'];
    $owners = $_POST['petOwnerID'];

    $update = "UPDATE pet
                SET petName = '$pName',
                    petType = '$pType',
                    petBreed = '$pBreed',
                    petBDate = '$pBDate',
                    petOwnerID = '$owners'
                WHERE petID = '$pID'";
    
    if(mysqli_query($conn, $update)){
        header("Location: read_pet.php");
        exit();
    }else{
        echo "Error: " . mysqli_error($conn);
    }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pet Record</title>
</head>
<body>
    <h2>Update Pet Record</h2>

    <form method = "POST">
        <label>Pet ID:</label><br><br>
        <input type = "text" name = "petID" value="<?=$row['petID']?>"readonly><br><br>

        <label>Pet Name:</label><br><br>
        <input type = "text" name = "petName" value="<?=$row['petName']?>"required><br><br>

        <label>Pet Type:</label><br><br>
        <input type = "text" name = "petType" value="<?=$row['petType']?>"required><br><br>

        <label>Pet Breed:</label><br><br>
        <input type = "text" name = "petBreed" value="<?=$row['petBreed']?>"required><br><br>

        <label>Pet Birth Date:</label><br><br>
        <input type = "date" name = "petBDate" value="<?=$row['petBDate']?>"required><br><br>

        <label>Pet Owner:</label><br><br>
        <select name="petOwnerID" required><br><br>
            <?php while ($o = mysqli_fetch_array($owners)) : ?>
                <option value="<?= $o['petOwnerID']?>">
                    <?=($o['petOwnerID'] == $row['petOwnerID']) ? 'Selected - ' : '' ?>
                    <?=$o['petOwnerID']?> - <?=$o['petOwnerFName']?> <?=$o['petOwnerLName']?>
            </option>
            <?php endwhile; ?>
            </select><br><br>

            <button type = "submit">Update</button>
            </form>
            
    
</body>
</html>