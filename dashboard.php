<html>
<head>
    <link rel="stylesheet" type="text/css" href="dash.css">
    <title>Data Kasus</title>
</head>
<body style="font-family:arial">
    <div class="atas">
        <?php
        session_start(); 

        if (!isset($_SESSION['username'])) {
            header("Location: dashboard.php");
        }

        echo "<h3>Selamat Datang, " . $_SESSION['username'] ."!". "</h3 >";
        ?>
        <a href="logout.php" class="log-button">Logout</a>
    </div>
    
    <h1 style="text-align: center;"><b>Data Kasus</b></h1>
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
        <th colspan=3><center>Opsi</center></th>
    </tr>
    
    <?php
        include "config.php";
        $no = 1;
        // $data = mysqli_query($conn,"SELECT pengguna.id as p_id, pengguna.username, pengguna.phone, items.item_name, items.lokasi_hilang, items.waktu_hilang, items.item_id 
        // FROM pengguna INNER JOIN items ON pengguna.id=items.pengguna_id");
        // $dat = mysqli_query($conn, "SELECT * FROM pengguna INNER JOIN items on pengguna.id = items.pengguna_id 
        // INNER JOIN category ON items.kategori_id = category.c_id INNER JOIN status ON items.st_id = status.s_id");

        $dat = mysqli_query($conn, "SELECT * FROM cases INNER JOIN pengguna ON cases.pemilik_id = pengguna.id
        INNER JOIN items ON cases.itm_id = items.item_id INNER JOIN category ON cases.category_id = category.c_id
        INNER JOIN status ON cases.status_id = status.s_id ORDER BY case_id DESC");
        // $dat1 = mysqli_query($conn, "SELECT * FROM cases");

        // $r = mysqli_fetch_array($dat);
        // $s= mysqli_fetch_array($dat1);
        while($r = mysqli_fetch_array($dat)){
            $p_id = $r['case_id'];
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
            <td width=70px><center><a href="edit.php?id=<?php echo $p_id;?>">Edit</a></center></td>
            <td width=70px><center><a href="hapus.php?id=<?php echo $p_id;?>">Hapus</a></center></td>
            <td width=70px><center><a href="detail.php?id=<?php echo $p_id;?>">Detail</a></center></td>
            </tr>
            <?php 
    }
    ?>
    </table></br> 
    <div class="bawah">
        <a href="tambah_pengguna.php" class="pill">Add New User</a>
        <a href="tambah_item.php" class="pill">Add New Report</a>
    </div>
</body>
</html>