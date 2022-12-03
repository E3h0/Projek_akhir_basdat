<?php
// include database connection file
include "config.php";

// Get id from URL to delete that user
$id = $_GET['id'];

// Delete user row from table based on given id
// $result = mysqli_query($conn, "DELETE items.*
// FROM pengguna INNER JOIN items ON pengguna.id=items.pengguna_id
// WHERE (pengguna.id = $id AND pengguna.id=items.pengguna_id)");

$res = mysqli_query($conn, "DELETE pengguna.*, items.*
FROM pengguna, items WHERE (pengguna.id = $id AND pengguna.id=items.pengguna_id)");



// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php");
?>