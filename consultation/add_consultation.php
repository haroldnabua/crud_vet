<?php

include "../connect.php";

$pets = mysqli_query($conn, "SELECT * FROM pet WHERE isDeleted = 0");
$owners = mysqli_query($conn, "SELECT * FROM PetOwner WHERE isDeleted = 0");
$vets = mysqli_query($conn, "SELECT * FROM veterinarian WHERE isDeleted = 0");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cID = $_POST['consultID'];
    $pID = $_POST['petID'];
    $vID = $_POST['vetID'];
    $cDate = $_POST['consultDate'];
    $diag = $_POST['diagnoses'];
    $pres = $_POST['prescription'];


$sql = "INSERT INTO consultation (consultID, petID, vetID, consultDate, diagnoses, prescription)
        VALUES ('$cID', '$pID', '$vID', '$cDate', '$diag', '$pres')";

        if(mysqli_query($conn, $sql)){
            header("Location: read_consultation.php");
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
    <title>Add Consultation Record</title>
</head>
<body>
    <h2>Add Consultation Record</h2>

    <form method ="POST">
        <label>Consultation ID:</label><br><br>
        <input type="text" name="consultID" required><br><br>

        <label>Pet ID:</label>
        <select name= "petID" required>
            <?php while ($p = mysqli_fetch_array($pets)) : ?>
                <option value="<?=$p['petID']?>">
                    <?=$p['petID']?> - <?=$p['petName']?>
            </option>
            <?php endwhile; ?>
            </select><br><br>
        
        <label>Veterinarian:</label>
        <select name="vetID" required><br><br>
            <?php while ($v = mysqli_fetch_array($vets)) : ?>
                <option value="<?=$v['vetID']?>">
                    <?=$v['vetID']?> - <?=$v['vetFName']?>
            </option>
            <?php endwhile; ?>
            </select><br><br>

        <label>Consult Date:</label>
        <input type = "datetime-local" name = "consultDate" required><br><br>

        <label>Diagnosis:</label>
        <input type ="text" name = "diagnoses" required><br><br>

        <label>Prescription:</label>
        <input type = "text" name = "prescription" required><br><br>

        <button type = "submit">Save</button>

    </form>
</body>
</html>