<?php
include "../connect.php";

$owners = mysqli_query($conn, "SELECT * FROM PetOwner    WHERE isDeleted = 0");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pID = $_POST['petID'];
    $pName = $_POST['petName'];
    $pType = $_POST['petType'];
    $pBreed = $_POST['petBreed'];
    $pBDate = $_POST['petBDate'];
    $owners = $_POST['petOwnerID'];

$sql = "INSERT INTO pet (petID, petName, petType, petBreed, petBDate, petOwnerID)
        VALUES ('$pID', '$pName', '$pType', '$pBreed', '$pBDate', '$owners')";

        if(mysqli_query($conn, $sql)){
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
    <title>Add Pet</title>
</head>
<body>
    <h2>Add Pet</h2>

    <form method = "POST">
        <label>Pet ID:</label><br><br>
        <input type = "text" name = "petID" required><br><br>

        <label>Pet Name:</label><br><br>
        <input type = "text" name = "petName" required><br><br>

        <label>Pet Type (Cat/Dog):</label><br><br>
        <input type = "text" name = "petType" required><br><br>

        <label>Pet Breed:</label><br><br>
        <input type = "text" name = "petBreed" required><br><br>

        <label>Pet Birth Date:</label><br><br>
        <input type = "date" name = "petBDate" required><br><br>

        <label>Pet Owner: </label>
        <select name = "petOwnerID" required>
            <?php while ($o = mysqli_fetch_array($owners)) : ?>
                <option value="<?= $o['petOwnerID'] ?>">
                    <?=$o['petOwnerID']?> - <?=$o['petOwnerFName']?> <?=$o['petOwnerLName']?>
            </option>
            <?php endwhile; ?>
            </select><br><br>

        <button type = "submit">Save</button>
    </form>
    
</body>
</html>