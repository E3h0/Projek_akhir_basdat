<html>
<head>
 <title>Tambah data</title>
</head>
<body style="font-family:arial">
 <center><h2>Tambah Data Baru</center>
 <hr />
 <b>Tambah Data Baru</b>
    <br/><br/>

    <form action="tambah_item.php" method="post" name="form1">
        <table width="100%" border="0">
            <tr> 
                <td>Nama Barang</td>
                <td><input type="text" name="item_name" size="50" required></td>
            </tr>
            <tr> 
                <td>Nama Pemilik</td>
                <td><input type="text" name="nama_pemilik" size="50" required></td>
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


        // include database connection file
        include "config.php";

        // Insert user data into table
        $tambah_item = "insert into items(`pengguna_id`, `nama_pemilik`, `item_name`, `lokasi_hilang`, `waktu_hilang`) values((select id from pengguna where pengguna.username =  '$nama_pemilik'), '$nama_pemilik', '$nama_barang', '$lokasi', '$waktu')";
        $kerjakan=mysqli_query($conn, $tambah_item);
        if($kerjakan)
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
</body>
</html>