<?php
    $id = $_GET['id'];
    include "config.php";
    $query   = mysqli_query($conn, "SELECT * FROM pengguna INNER JOIN items on pengguna.id = items.pengguna_id 
    INNER JOIN category ON items.kategori_id = category.c_id INNER JOIN status ON items.st_id = status.s_id 
    WHERE pengguna.id='$id'");
    $result   = mysqli_fetch_array($query);
?>
<html>
<head>
    <title>Detail</title>
</head>
<body>
    <h2>Detail Data </h2>
    <table border="0" cellpadding="4">
        <tr>
            <td size="90">Nama Pemilik</td>
            <td>: <?php echo $result['username']?></td>
        </tr>
        <tr>
            <td>No. Hp</td>
            <td>: <?php echo $result['phone']?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: <?php echo $result['email']?></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td>: <?php echo $result['item_name']?></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>: <?php echo $result['category_name']?></td>
        </tr>
        <tr>
            <td>Detail</td>
            <td>: <?php echo $result['detail']?></td>
        </tr>
        <tr>
            <td>Lokasi Hilang</td>
            <td>: <?php echo $result['lokasi_hilang']?></td>
        </tr>
        <tr>
            <td>Waktu Hilang</td>
            <td>: <?php echo $result['waktu_hilang']?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>: <?php echo $result['s_name']?></td>
        </tr>
    </table>
    <a href="dashboard.php"><-- Kembali ke Dashboard Page</a><br>
</body>
</html>