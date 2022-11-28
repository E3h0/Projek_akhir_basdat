<html>
<head>
    <link rel="stylesheet" type="text/css" href="dash.css">
    <title>Data Kasus</title>
</head>
<body style="font-family:arial">
    <div class="input-group">
        <a href="logout.php" class="btn">Logout</a>
    </div>
    <?php
    session_start(); 

    if (!isset($_SESSION['username'])) {
        header("Location: dashboard.php");
    }

    echo "<h3>Selamat Datang, " . $_SESSION['username'] ."!". "</h3 >";
    ?>
    <h2><b>Data Kasus</b></h2>
    <table style="width:100%" class="table1">
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama Pemilik</th>
        <th>No. Hp</th>
        <th>Nama Barang</th>
        <th>Lokasi Hilang</th>
        <th>waktu hilang</th>
        <th colspan=2><center>Opsi</center></th>
    </tr>
    
    <?php
        include "config.php";
        $no = 1;
        $data = mysqli_query($conn,"SELECT pengguna.username, pengguna.phone, items.item_name, items.lokasi_hilang, items.waktu_hilang, items.item_id 
        FROM pengguna INNER JOIN items ON pengguna.id=items.pengguna_id");
        while($r = mysqli_fetch_array($data)){
            $id = $r['item_id'];
            $nama_pemilik = $r['username'];
            $no_hp = $r['phone'];
            $nama_barang = $r['item_name'];
            $lokasi_hilang = $r['lokasi_hilang'];
            $waktu_hilang = $r['waktu_hilang'];
    ?>
            <tr><td><?php echo $no++; ?></td>
            <td><?php echo $id; ?></td>
            <td><?php echo $nama_pemilik; ?></td>
            <td><?php echo $no_hp; ?></td>
            <td><?php echo $nama_barang; ?></td>
            <td><?php echo $lokasi_hilang; ?></td>
            <td><?php echo $waktu_hilang; ?></td>
            <td align=right width=70px><a href="edit.php?id=<?php echo $id_barang;?>">Edit</a></td>
            <td align=right width=70px><a href="hapus.php?id=<?php echo $id_barang;?>">Hapus</a></td>
            </tr>
            <?php 
    }
    ?>
    </table></br> 
    <a href="tambah_pengguna.php">+ Tambah Pemilik Baru</a><br>
    <a href="tambah_item.php">+ Tambah Data Baru</a>
</body>
</html>