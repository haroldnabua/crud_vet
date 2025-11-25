<?php
include "../connect.php";

$vID = $_GET['vetID'];

$sql = "SELECT * FROM Veterinarian
        WHERE vetID = '$vID'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vfname = $_POST['vetFName'];
    $vlname = $_POST['vetLName'];
    $address = $_POST['vetAddress'];
    $special = $_POST['vetSpecial'];

    $update = "UPDATE veterinarian
                SET vetFName = '$vfname',
                    vetLName = '$vlname',
                    vetAddress = '$address',
                    vetSpecial = '$special'
                WHERE vetID = '$vID'";
    
    if(mysqli_query($conn, $update)){
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
    <title>Update Veterinarian</title>
</head>
<body>
    <h2>Update Veterinarian</h2>

    <form method = "POST">
        <label>ID:</label>
        <input type = "text" name = "vetID" value="<?=$row['vetID']?>" readonly><br><br>

        <label>First Name:</label>
        <input type = "text" name = "vetFName" value="<?=$row['vetFName']?>" required><br><br>

        <label>Last Name:</label>
        <input type = "text" name = "vetLName" value="<?=$row['vetLName']?>" required><br><br>

        <label>Address:</label>
        <input type = "text" name = "vetAddress" value="<?=$row['vetAddress']?>"required><br><br>

        <label>Specialization:</label>
        <input type = "text" name = "vetSpecial" value="<?=$row['vetSpecial']?>" required><br><br>

        <button type="Submit">Update</button>
</form>
    
</body>
</html>


