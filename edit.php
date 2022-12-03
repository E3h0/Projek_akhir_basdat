<?php
    // include database connection file
    include "config.php";

    // Check if form is submitted for user update, then redirect to homepage after update
    if(isset($_POST['update']))
    {   
        $id = $_POST['id'];
        $nama_barang = $_POST['item_name'];
        $cat = $_POST['kategori'];
        $lokasi = $_POST['lokasi_hilang'];
        $waktu = $_POST['waktu_hilang'];
        $nama_pemilik = $_POST['username'];
        $kontak1 = $_POST['email'];
        $kontak2 = $_POST['phone'];
        $stat = $_POST['status'];
        $det = $_POST['detail'];

        // $case = "select c_id from category where category.category_name ='$cat'";
        // $case1 = "select s_id from status where status.s_name = '$stat'";
        // $ccid = mysqli_query($conn, $case);
        // $csid = mysqli_query($conn, $case1);
        // update user data
        $result = mysqli_query($conn, "UPDATE items, pengguna, cases SET items.item_name='$nama_barang',
        items.lokasi_hilang='$lokasi', items.waktu_hilang = '$waktu', items.kategori_id = '$cat', items.st_id = '$stat', items.detail = '$det',
        pengguna.username = '$nama_pemilik', pengguna.phone = '$kontak2', pengguna.email = '$kontak1', 
        cases.category_id = '$cat', cases.status_id = '$stat' 
        WHERE (cases.case_id=$id AND cases.itm_id = items.item_id AND cases.pemilik_id = pengguna.id)");
    


        // Redirect to homepage to display updated user in list
        header("Location: index.php");
    }
?>
<?php
    // Display selected user data based on id
    // Getting id from url
    $id = $_GET['id'];
    $get_cat = mysqli_query($conn, "SELECT * FROM category");
    $get_stat = mysqli_query($conn, "SELECT * FROM status");

    // Fetech user data based on id
    // $result = mysqli_query($conn, "SELECT pengguna.id as pid, pengguna.username, pengguna.email,
    // pengguna.phone, items.item_name, items.lokasi_hilang, 
    // items.waktu_hilang, items.item_id, items.detail
    // FROM pengguna INNER JOIN items ON pengguna.id=items.pengguna_id");

    $result = mysqli_query($conn, "SELECT * FROM cases INNER JOIN pengguna ON cases.pemilik_id = pengguna.id
    INNER JOIN items ON cases.itm_id = items.item_id INNER JOIN category ON cases.category_id = category.c_id
    INNER JOIN status ON cases.status_id = status.s_id 
    WHERE (cases.case_id = $id AND cases.itm_id = items.item_id)");

    // $get_c = mysqli_query($conn, "SELECT * FROM category");
    // $get_s = mysqli_query($conn, "SELECT * FROM status");

    // $r = mysqli_fetch_array($result);
    // $s = mysqli_fetch_array($get_c);
    // $t = mysqli_fetch_array($get_s);
    while($r = mysqli_fetch_array($result))
    {
        $id = $r['case_id'];
        $nama_barang = $r['item_name'];
        $cat = $r['category_name'];
        $lokasi = $r['lokasi_hilang'];
        $waktu = $r['waktu_hilang'];
        $nama_pemilik = $r['username'];
        $kontak1 = $r['email'];
        $kontak2 = $r['phone'];
        $stat = $r['s_name'];
        $det = $r['detail'];
    }
?>


<html>
<head>
 <title>Edit Data</title>
</head>
<body style="font-family:arial">
 <center><h2>Edit Data</h2></center>
 <hr>

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nama Pemilik</td>
                <td><input type="text" size="50" name="username" value="<?php echo $nama_pemilik;?>"></td>
                </td>
            </tr>
            <tr> 
                <td>No Hp</td>
                <td><input type="text" size="50" name="phone" value="<?php echo $kontak2;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="email" size="50" name="email" value="<?php echo $kontak1;?>"></td>
            </tr>  
            <tr> 
                <td>Nama Barang</td>
                <td><input type="text" name="item_name" size="50" value="<?php
                        $get_item = mysqli_query($conn, "
                        SELECT items.item_name FROM items, cases  
                        WHERE cases.itm_id = items.item_id AND case_id = '$id'");
                        while($geti = mysqli_fetch_array($get_item)) {
                            echo $geti['item_name'];
                        }
                    ?>">
                </td>
            </tr>
            <tr> 
                <td>Kategori</td>
                <td>
                <label for="kategori"></label>
                <select name="kategori" id="kategori">
                    <?php
                        while($cat = mysqli_fetch_array($get_cat)) {
                            echo "<option value=".$cat['c_id'].">".$cat['category_name']."</option>";
                        }
                    ?>
                </select>
                </td>
            </tr>
            <tr> 
                <td>Detail</td>
                <td><input type="text" name="detail" size="50" value="<?php
                        $get_item = mysqli_query($conn, 
                        "SELECT items.detail FROM items, cases  
                        WHERE cases.itm_id = items.item_id AND case_id = '$id'");
                        if($geti = mysqli_fetch_array($get_item)) {
                            echo $geti['detail'];
                        }
                    ?>">
                </td>
            </tr>
            <tr> 
                <td>Status</td>
                <td>
                <label for="status"></label>
                <select name="status" id="status">
                    <?php
                        while($cat = mysqli_fetch_array($get_stat)) {
                            echo "<option value=".$cat['s_id'].">".$cat['s_name']."</option>";
                        }
                    ?>
                </select>
                </td>
            </tr>
            <tr> 
                <td>Lokasi Hilang</td>
                <td><input type="text" name="lokasi_hilang" size="50" value="<?php
                        $get_item = mysqli_query($conn, "
                        SELECT items.lokasi_hilang FROM items, cases  
                        WHERE cases.itm_id = items.item_id AND case_id = '$id'");
                        if($geti = mysqli_fetch_array($get_item)) {
                            echo $geti['lokasi_hilang'];
                        }
                    ?>">
                </td>
            </tr>
            <tr> 
                <td>Waktu Hilang</td>
                <td><input type="datetime-local" name="waktu_hilang" size="50" value="<?php
                        $get_date = mysqli_query($conn, "
                        SELECT items.waktu_hilang FROM items, cases  
                        WHERE cases.itm_id = items.item_id AND case_id = '$id'");
                        if($geti = mysqli_fetch_array($get_date)) {
                            echo $geti['waktu_hilang'];
                        }
                    ?>">
                </td>
            </tr>
            <tr>
            
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    <a href="dashboard.php"><--Batalkan Edit Data</a><br>
</body>
</html>