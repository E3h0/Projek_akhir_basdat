<html>
<head>
    <link rel="stylesheet" type="text/css" href="dash.css">
    <title>Data Kasus</title>
</head>
<body style="font-family:arial">
    <h2><b>Data Kasus</b></h2>
    <table style="width:100%" class="table1">
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th><center>Nama Pemilik</center></th>
        <th><center>No. Hp</center></th>
        <th><center>Nama Barang</center></th>
        <th><center>Kategori</center></th>
        <th><center>Lokasi Hilang</center></th>
        <th><center>Waktu Hilang</center></th>
        <th><center>Status</center></th>
        <th><center>Opsi</center></th>
    </tr>
    
    <?php
        include "config.php";
        $no = 1;
        $data = mysqli_query($conn, "SELECT * FROM pengguna INNER JOIN items on pengguna.id = items.pengguna_id 
        INNER JOIN category ON items.kategori_id = category.c_id INNER JOIN status ON items.st_id = status.s_id");
        // $dat = mysqli_query($conn, "SELECT * FROM pengguna INNER JOIN items on pengguna.id = items.pengguna_id 
        // INNER JOIN category ON items.item_id = category.items_id");
        while($r = mysqli_fetch_array($data)){
            $p_id = $r['pengguna_id'];
            $nama_pemilik = $r['username'];
            $no_hp = $r['phone'];
            $nama_barang = $r['item_name'];
            $lokasi_hilang = $r['lokasi_hilang'];
            $waktu_hilang = $r['waktu_hilang'];
            $cat = $r['category_name'];
            $stat = $r['s_name'];
    ?>
            <tr><td><?php echo $no++; ?></td>
            <td><?php echo $p_id; ?></td>
            <td><center><?php echo $nama_pemilik; ?></center></td>
            <td><center><?php echo $no_hp; ?></center></td>
            <td><center><?php echo $nama_barang; ?></center></td>
            <td><center><?php echo $cat; ?></center></td>
            <td><center><?php echo $lokasi_hilang; ?></center></td>
            <td><center><?php echo $waktu_hilang; ?></center></td>
            <td><center><?php echo $stat; ?></center></td>   
            <td width=70px><center><a href="detail_dash.php?id=<?php echo $p_id;?>">Detail</a></center></td>         
            </tr>
            <?php 
    }
    ?>
    </table></br> 
    <a href="index.php"><-- Kembali ke Login Page</a><br>
    <!-- <a href="tambah_item.php">+ Tambah Data Baru</a> -->
</body>
</html>