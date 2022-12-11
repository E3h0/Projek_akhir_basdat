<html>
<head>
    <link rel="stylesheet" type="text/css" href="tambah_pengguna.css">
    <title>Tambah Data Pelapor</title>
</head>

<body style="font-family:arial">

    <div class="semua">
    <form action="tambah_pengguna.php" method="post" name="form1">
        <div class="container">
            <p class="judul" style="font-size: 2rem;">Tambah Data Pelapor</p>
            <div class="form">
                <div class="inputfield">
                    <label>Nama Pelapor</label>
                    <input type="text" name="username" size="50" class="input" required>
                </div> 

                <div class="inputfield">
                    <label>Email</label>
                    <input type="email" name="email" size="50" class="input" required>
                </div>   

                <div class="inputfield">
                    <label>Phone</label>
                    <input type="text" name="phone" size="50" class="input" required>
                </div>  
            </div>

            <div class="bawah">
                <button type="button" name="Submit" class="pill"><a href="dashboard.php" style="text-decoration: none;" >Cancel</a></button>
                <input type="submit" name="Submit" class="pill" style="background-color:#a29bfe; color:white">
            </div>
        </div>
    </form>

    <div class="bawah">
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
    </div>
    </div>

</body>
</html>