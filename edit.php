<?php
    // include database connection file
    include "config.php";

    // Check if form is submitted for user update, then redirect to homepage after update
    if(isset($_POST['update']))
    {   
        $id = $_POST['id'];
        $nama_barang = $_POST['item_name'];
        $lokasi = $_POST['lokasi_hilang'];
        $waktu = $_POST['waktu_hilang'];
        $nama_pemilik = $_POST['username'];
        $kontak1 = $_POST['email'];
        $kontak2 = $_POST['phone'];

        // update user data
        $result = mysqli_query($conn, "UPDATE items, pengguna SET items.item_name='$nama_barang',
        items.lokasi_hilang='$lokasi', items.waktu_hilang = '$waktu',
        pengguna.username = '$nama_pemilik', pengguna.phone = '$kontak2', pengguna.email = '$kontak1'
        WHERE pengguna.id=$id AND pengguna.id=items.pengguna_id");
    


        // Redirect to homepage to display updated user in list
        header("Location: index.php");
    }
?>
<?php
    // Display selected user data based on id
    // Getting id from url
    $id = $_GET['id'];

    // Fetech user data based on id
    $result = mysqli_query($conn, "SELECT pengguna.id as pid, pengguna.username, pengguna.email,
    pengguna.phone, items.item_name, items.lokasi_hilang, 
    items.waktu_hilang, items.item_id 
    FROM pengguna INNER JOIN items ON pengguna.id=$id");

    while($r = mysqli_fetch_array($result))
    {
        $id = $r['pid'];
        $nama_barang = $r['item_name'];
        $lokasi = $r['lokasi_hilang'];
        $waktu = $r['waktu_hilang'];
        $nama_pemilik = $r['username'];
        $kontak1 = $r['email'];
        $kontak2 = $r['phone'];
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
                <td><input type="text" size="50" name="item_name" value="<?php
                        $get_item = mysqli_query($conn, "SELECT * FROM items");
                        if($geti = mysqli_fetch_array($get_item)) {
                            echo $geti['item_name'];
                        }
                    ?>">
                </td>
            </tr>
            <tr> 
                <td>Lokasi Hilang</td>
                <td><input type="text" name="lokasi_hilang" size="50" value="<?php
                        $get_item = mysqli_query($conn, "SELECT * FROM items");
                        if($geti = mysqli_fetch_array($get_item)) {
                            echo $geti['lokasi_hilang'];
                        }
                    ?>">
                </td>
            </tr>
            <tr> 
                <td>Waktu Hilang</td>
                <td><input type="datetime-local" name="waktu_hilang" size="50" value="<?php echo $waktu ?>">
                </td>
            </tr>
            <tr>
            
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>