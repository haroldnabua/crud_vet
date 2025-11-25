<?php
include "../connect.php";

$cID = $_GET['consultID'];

$pets = mysqli_query($conn, "SELECT * FROM pet WHERE isDeleted = 0");
$vets = mysqli_query($conn, "SELECT * FROM veterinarian WHERE isDeleted = 0");

$sql = "SELECT * FROM consultation
        WHERE consultID = '$cID'";


$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pID = $_POST['petID'];
    $vID = $_POST['vetID'];
    $cDate = $_POST['consultDate'];
    $diag = $_POST['diagnoses'];
    $pres = $_POST['prescription'];

$update = "UPDATE consultation
            SET petID = '$pID',
                vetID = '$vID',
                consultDate = '$cDate',
                diagnoses = '$diag',
                prescription = '$pres'
            WHERE consultID = '$cID'";

            if(mysqli_query($conn, $update)){
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
    <title>Update Consultation Record</title>
</head>
<body>
    <h2>Update Consultation Record</h2>

    <form method="POST">
        <label>Consultation ID:</label>
        <input type = "text" name ="consultID" value="<?=$row['consultID']?>"readonly><br><br>


        <label>Pet:</label>
        <select name="petID" required><br><br>
            <?php while($p = mysqli_fetch_array($pets)) : ?>
                <option value="<?=$p['petID']?>">
                    <?=$p['petID']?> - <?=$p['petName']?>
            </option>
            <?php endwhile; ?>
            </select><br><br>

        <label>Veterinarian:</label>
        <select name ="vetID" required>
            <?php while($v = mysqli_fetch_array($vets)) : ?>
                <option value="<?=$v['vetID']?>">
                    <?=$v['vetID']?> - <?=$v['vetFName']?>
            </option>
            <?php endwhile;?>
            </select><br><br>

        <label>Consultation Date:</label>
        <input type = "datetime-local" name = "consultDate" value="<?=$row['consultDate']?>"><br><br>

        <label>Diagnoses:</label>
        <input type = "text" name ="diagnoses" value="<?= $row['diagnoses']?>"><br><br>

        <label>Prescription: </label>
        <input type = "text" name = "prescription" value="<?= $row['prescription']?>"><br><br>

        <button type = "submit">Update</button>
    </form>
</body>
</html>