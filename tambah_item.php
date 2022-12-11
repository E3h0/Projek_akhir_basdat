<html>
<head>
    <link rel="stylesheet" type="text/css" href="tambah_item.css">
    <title>Tambah data</title>
</head>
<?php
    include "config.php";
    $get_pemilik = mysqli_query($conn, "SELECT * FROM pengguna");
    $get_cat = mysqli_query($conn, "SELECT * FROM category");
    $get_stat = mysqli_query($conn, "SELECT * FROM status");
?>
<body style="font-family:arial">
<div class="semua">
    <form action="tambah_item.php" method="post" name="form1">
    <div class="container">
        <p class="judul" style="font-size: 2rem;">Tambah Data Baru</p>    
        <div class="form">
            <div class="inputfield"> 
                <label class="label1">Nama Pemilik</label>
                <label for="nama_pemilik"></label>
                <select class="input" name="nama_pemilik" id="nama_pemilik">
                    <?php
                        while($pemilik = mysqli_fetch_array($get_pemilik)) {
                            echo "<option value=".$pemilik['username'].">".$pemilik['username']."</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="inputfield"> 
                <label class="label1">Nama Barang</label>
                <input class="input" type="text" name="item_name" size="50" required>
            </div>

            <div class="inputfield"> 
                <label class="label1">Kategori</label>
                <!-- <label><input type="text" name="nama_pemilik" size="50" required></label> -->
                <label for="kategori"></label>
                <select class="input" name="kategori" id="kategori">
                    <?php
                        while($cat = mysqli_fetch_array($get_cat)) {
                            echo "<option value=".$cat['category_name'].">".$cat['category_name']."</option>";
                        }
                    ?>
                </select>
                </label>
            </div>

            <div class="inputfield"> 
                <label class="label1">Detail</label>
                <textarea class="input" rows="5" name="detail" required></textarea>
            </div>

            <div class="inputfield"> 
                <label class="label1">Lokasi</label>
                <input class="input" type="text" name="lokasi_hilang" size="50" required>
            </div>

            <div class="inputfield"> 
                <label class="label1">Waktu</label>
                <input class="input" type="datetime-local" name="waktu_hilang" size="50" required>
            </div>

            <div class="inputfield"> 
                <label class="label1">Status</label>
                <label for="st"></label>
                <select class="input" name="st" id="st">
                    <?php
                        while($cat = mysqli_fetch_array($get_stat)) {
                            echo "<option value=".$cat['s_name'].">".$cat['s_name']."</option>";
                        }
                    ?>
                </select>
                </label>
            </div>
        </div>

        <div class="bawah">
            <button type="button" class="pill"><a href="dashboard.php" style="text-decoration: none;" >Cancel</a></button>
            <input type="submit" name="Submit" class="pill" style="background-color:#a29bfe; color:white">
        </div>
        </div>
    </form>

    <div class="bawah">
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
    </div>
</div>
</body>
</html>