<?php
    $id = $_GET['id'];
    include "config.php";
    $query   = mysqli_query($conn, "SELECT * FROM cases INNER JOIN pengguna ON cases.pemilik_id = pengguna.id
    INNER JOIN items ON cases.itm_id = items.item_id INNER JOIN category ON cases.category_id = category.c_id
    INNER JOIN status ON cases.status_id = status.s_id WHERE case_id = '$id'");
    $result   = mysqli_fetch_array($query);
?>
<html>
<head>
    <title>Detail</title>
    <link rel="stylesheet" type="text/css" href="detail.css">
</head>
<body>
    <div class="container">
    <center><p class="judul" style="font-size: 2rem;">Detail Data</p><center>
        <div class="form">
        <table border="0" cellpadding="4">
        <tr>
            <td>Nama Pemilik</td>
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
        </div> 
        
        <div class="bawah">
        <button type="button" name="Submit" class="pill"><a href="dashboard.php" style="text-decoration: none;">Kembali ke dashboard</a></button>
        </div>
    </div>
</body>
</html>