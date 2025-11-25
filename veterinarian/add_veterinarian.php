<?php
include "../connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vID = $_POST['vetID'];
    $vfname = $_POST['vetFName'];
    $vlname = $_POST['vetLName'];
    $address = $_POST['vetAddress'];
    $special = $_POST['vetSpecial'];

    $sql = "INSERT INTO veterinarian (vetID, vetFName, vetLName, vetAddress, vetSpecial)
            VALUES ('$vID', '$vfname', '$vlname', '$address', '$special')";

    if(mysqli_query($conn, $sql)){
        header("Location: read_veterinarian.php");
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
    <title>Add Veterinarian</title>
</head>
<body>
    <h2>Add Veterinarian</h2>

    
    <form method="POST">
        <label>ID:</label><br><br>
        <input type = "text" name = "vetID" required><br><br>

        <label>First Name:</label><br><br>
        <input type = "text" name = "vetFName" required><br><br>

        <label>Last Name:</label><br><br>
        <input type = "text" name = "vetLName" required><br><br>

        <label>Address:</label><br><br>
        <input type = "text" name = "vetAddress" required><br><br>

        <label>Specialization: </label><br><br>
        <input type = "text" name = "vetSpecial" required><br><br>

        <button type="submit">Save</button>

</form>
</body>
</html>