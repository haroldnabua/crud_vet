<?php
include "../connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['petOwnerID'];
    $fname = $_POST['petOwnerFName'];
    $lname = $_POST['petOwnerLName'];
    $bdate = $_POST['petOwnerBDate'];
    $telno = $_POST['petOwnerTelNo'];

$sql = "INSERT INTO petOwner (petOwnerID, petOwnerFName, petOwnerLName, petOwnerBDate, petOwnerTelNo)
        VALUES ('$id', '$fname', '$lname', '$bdate', '$telno')";

if(mysqli_query($conn, $sql)){
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
    <title>Add Pet Owner</title>
</head>
<body>
    <h2>Add Pet Owner</h2>

    <form method="POST">
        <label>ID: </label><br><br>
        <input type="text" name="petOwnerID" required><br><br>

        <label>First Name: </label><br><br>
        <input type="text" name="petOwnerFName" required><br><br>

        <label>Last Name: </label><br><br>
        <input type="text" name="petOwnerLName" required><br><br>

        <label>Birth Date: </label><br><br>
        <input type="date" name="petOwnerBDate" required><br><br>

        <label>Telephone No.: </label><br><br>
        <input type="text" name="petOwnerTelNo" required><br><br>

        <button type="submit">Save</button><br><br>
    </form>
    <a href = "read_petOwner.php">Back to View</a>
</body>
</html>