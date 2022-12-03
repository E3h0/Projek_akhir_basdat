<?php
require 'functions.php';
//connect DB
$db = mysqli_connect("localhost", "root", "", "ke-temu");
// cek tombol submit bisa ditekan/belum
if(isset($_POST["sumbit"])){
    // ambil data dari form
    $Item = $_POST["Item"];
    $Date_Lost = $_POST["Date_Lost"];
    $Location = $_POST["Location"];
    $Time = $_POST["Time"];
    $Detail = $_POST["Detail"];
    $Photo = $_POST["Photo"];
    $Username = $_POST["Username"];
    $Phone = $_POST["Phone"];
    // query insert data
    $query = "INSERT INTO item VALUES('', '', '$Item', '$Detail', '$Photo'),
    INSERT INTO lost VALUES('', '', '$Date_Lost', '$Detail', '$Location', '$Time')";

    mysqli_query($db, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost Form</title>
</head>
<body>
    <h1>Lost Item Report Form</h1>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="Item">Item</label>
                <input type="text" name="Item" id="Item" required>
            </li>
            <li>
                <label for="Date_Lost">Date Lost</label>
                <input type="text" name="Date_Lost" id="Date_Lost" required>
            </li>
            <li>
                <label for="Location">Location</label>
                <input type="text" name="Location" id="Location" required>
            </li>
            <li>
                <label for="Time">Time</label>
                <input type="text" name="Time" id="Time" required>
            </li>
            <li>
                <label for="Detail">Detail</label>
                <input type="text" name="Detail" id="Detail" required>
            </li>
            <li>
                <label for="Photo">Photo</label>
                <input type="text" name="Photo" id="Photo" required>
            </li>
            <li>
                <button type="submit" name ="submit">Submit New Report</button>
            </li>
        </ul>
    </form>
</body>
</html>