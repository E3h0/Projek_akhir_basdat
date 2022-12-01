<?php
//connect DB
$db = mysqli_connect("localhost", "root", "", "ke-temu");
//ambil data
$result = mysqli_query($db, "SELECT `item`.`Name` AS `Item`, `lost`.`Date_lost`, `lost`.`Location`, `lost`.`Time`, `item`.`Detail`, `item`.`Photo`, `users`.`Username`, `users`.`Phone`
FROM `item` 
	LEFT JOIN `lost` ON `lost`.`Item_ID` = `item`.`ID` 
	LEFT JOIN `users` ON `item`.`User_ID` = `users`.`ID`;");

//while ($db = mysqli_fetch_assoc($result)) {
    //var_dump($db);
//}

if(!$result){echo_mysqli_error($db);}
?>

<head>
<title>Ke-Temu</title>
<body>
    <h1>Lost</h1>
    <table border="1" cellpadding="10" cellspacing="0">
    <tr>    
        <th>Item</th>
        <th>Date Lost</th>
        <th>Location</th>
        <th>Time Lost</th>
        <th>Detail</th>
        <th>Photo</th>
        <th>Username</th>
        <th>Phone</th>
        <th>Edit/Delete</th>
    </tr>
    
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    
    <tr>    
        <td><?= $row["Item"]; ?></td>
        <td><?= $row["Date_lost"]; ?></td>
        <td><?= $row["Location"]; ?></td>
        <td><?= $row["Time"]; ?></td>
        <td><?= $row["Detail"]; ?></td>
        <td><img src= "img/<?= $row["Photo"]; ?>" height="50"></td>
        <td><?= $row["Username"]; ?></td>
        <td><?= $row["Phone"]; ?></td>
        <td><a href="edit.php">Edit</a></td>
    </tr>
    </table>
    <?php endwhile; ?>

    <h1>Found</h1>

</body>
</head>