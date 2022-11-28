<html>
<head>
 <title>Tambah Data Pemilik</title>
</head>
<body style="font-family:arial">
 <center><h2>Tambah Data Pemilik</center>
 <hr />
 <b>Tambah Data Baru</b>
    <br/><br/>

    <form action="tambah_pengguna.php" method="post" name="form1">
        <table width="100%" border="0">
            <tr> 
                <td>Nama Pemilik</td>
                <td><input type="text" name="username" size="50" required></td>
            </tr>
            <tr> 
                <td>email</td>
                <td><input type="email" name="email" size="50" required></td>
            </tr>
            <tr> 
                <td>phone</td>
                <td><input type="text" name="phone" size="50" required></td>
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
        $nama_pemilik = $_POST['username'];
        $kontak1 = $_POST['email'];
        $kontak2 = $_POST['phone'];


        // include database connection file
        include "config.php";

        // Insert user data into table
        $tambah_item = "insert into pengguna(`username`, `email`, `phone`) values('$nama_pemilik', '$kontak1','$kontak2')";
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