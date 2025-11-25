<?php
include "../connect.php";

$id = $_GET['petOwnerID'];

$sql = "SELECT * FROM PetOwner
        WHERE petOwnerID = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname = $_POST['petOwnerFName'];
    $lname = $_POST['petOwnerLName'];
    $bdate = $_POST['petOwnerBDate'];
    $telno = $_POST['petOwnerTelNo'];

$update = "UPDATE PetOwner
        SET petOwnerFName = '$fname',
            petOwnerLName = '$lname',
            petOwnerBDate = '$bdate',
            petOwnerTelNo = '$telno'";

            if (mysqli_query($conn, $update)){
                header("Location: read_petOwner.php");
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
    <title>Update Pet Owner</title>
</head>
<body>
    <h2>Update Pet Owner</h2>

    <form method="POST">
        <label>ID</label><br><br>
        <input type = "text" name = "petOwnerID" value="<?= $row['petOwnerID'] ?>" readonly>

        <label>First Name: </label><br><br>
        <input type = "text" name = "petOwnerFName" value="<?= $row['petOwnerFName'] ?>" required>

        <label>Last Name: </label><br><br>
        <input type = "text" name = "petOwnerLName" value="<?= $row['petOwnerID'] ?>" required>

        <label>Birth Date: </label><br><br>
        <input type = "text" name = "petOwnerBDate" value="<?= $row['petOwnerBDate'] ?>" required>

        <label>Telephone No.: </label><br><br>
        <input type = "text" name = "petOwnerTelNo" value="<?= $row['petOwnerTelNo'] ?>" required>

        <button type ="submit">Update</button>
        
</form>
<a href="read_petOwner.php">Back to View</a>

</body>
</html>