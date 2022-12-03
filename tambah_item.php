<html>
<head>
 <title>Tambah data</title>
</head>
<?php
    include "config.php";
    $get_pemilik = mysqli_query($conn, "SELECT * FROM pengguna");
    $get_cat = mysqli_query($conn, "SELECT * FROM category");
    $get_stat = mysqli_query($conn, "SELECT * FROM status");
?>
<body style="font-family:arial">
 <center><h2>Tambah Data Baru</center>
 <hr />
 <b>Tambah Data Baru</b>
    <br/><br/>

    <form action="tambah_item.php" method="post" name="form1">
        <table width="100%" border="0">
            <tr> 
                <td>Nama Pemilik</td>
                <!-- <td><input type="text" name="nama_pemilik" size="50" required></td> -->
                <td>
                <label for="nama_pemilik"></label>
                <select name="nama_pemilik" id="nama_pemilik">
                    <?php
                        while($pemilik = mysqli_fetch_array($get_pemilik)) {
                            echo "<option value=".$pemilik['username'].">".$pemilik['username']."</option>";
                        }
                    ?>
                </select>
                </td>
            </tr>
            <tr> 
                <td>Nama Barang</td>
                <td><input type="text" name="item_name" size="50" required></td>
            </tr>
            <tr> 
                <td>Kategori</td>
                <!-- <td><input type="text" name="nama_pemilik" size="50" required></td> -->
                <td>
                <label for="kategori"></label>
                <select name="kategori" id="kategori">
                    <?php
                        while($cat = mysqli_fetch_array($get_cat)) {
                            echo "<option value=".$cat['category_name'].">".$cat['category_name']."</option>";
                        }
                    ?>
                </select>
                </td>
            </tr>
            <tr> 
                <td>Detail</td>
                <td><textarea rows="5" name="detail" required></textarea></td>
            </tr>
            <tr> 
                <td>lokasi</td>
                <td><input type="text" name="lokasi_hilang" size="50" required></td>
            </tr>
            <tr> 
                <td>waktu</td>
                <td><input type="datetime-local" name="waktu_hilang" size="50" required></td>
            </tr>
            <tr> 
                <td>Status</td>
                <!-- <td><input type="text" name="nama_pemilik" size="50" required></td> -->
                <td>
                <label for="st"></label>
                <select name="st" id="st">
                    <?php
                        while($cat = mysqli_fetch_array($get_stat)) {
                            echo "<option value=".$cat['s_name'].">".$cat['s_name']."</option>";
                        }
                    ?>
                </select>
                </td>
            </tr>
            <tr>    
                <td></td>
                <td><input type="submit" name="Submit" value="+ Tambahkan"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted,
    if(isset($_POST['Submit'])) {
        $nama_barang = $_POST['item_name'];
        $nama_pemilik = $_POST['nama_pemilik'];
        $lokasi = $_POST['lokasi_hilang'];
        $waktu = $_POST['waktu_hilang'];
        $cat = $_POST['kategori'];
        $st = $_POST['st'];
        $det = $_POST['detail'];


        // include database connection file
        include "config.php";

        // Insert user data into table
        $tambah_item = "insert into items(`pengguna_id`, `item_name`, `kategori_id`, `lokasi_hilang`, `waktu_hilang`, `st_id`, `detail`) 
        values
        (
        (select id from pengguna where pengguna.username =  '$nama_pemilik'), '$nama_barang', 
        (select c_id from category where category.category_name ='$cat'),'$lokasi', '$waktu',
        (select s_id from status where status.s_name = '$st'), '$det'
        )";
        
        $tambah_kasus = "insert into cases(`pemilik_id`, `itm_id`, `category_id`, `status_id`)values
        (
        (select id from pengguna where pengguna.username =  '$nama_pemilik'),
        (select item_id from items where items.item_name =  '$nama_barang'),
        (select c_id from category where category.category_name ='$cat'),
        (select s_id from status where status.s_name = '$st')
        )";

        $kerjakan=mysqli_query($conn, $tambah_item);
        $kerjakan1=mysqli_query($conn, $tambah_kasus);
        if($kerjakan AND $kerjakan1)
        {
            // Show message when user added
            echo "Barang berhasil ditambahkan. <a href='index.php'>Lihat Data Barang</a>";
        }
        else
        {
            echo "Gagal bro";
        }
    }
    ?>
    <a href="dashboard.php"><--Batalkan Tambah Data</a><br>
</body>
</html>