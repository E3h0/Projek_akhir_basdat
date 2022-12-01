<?php
//connect DB
$db = mysqli_connect("localhost", "root", "", "ke-temu");

function query($query){
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function submitform($data){
    global $db;
    $Item = htmlspecialchars($data["Item"]);
    $Date_Lost = htmlspecialchars($data["Date_Lost"]);
    $Location = htmlspecialchars($data["Location"]);
    $Time = htmlspecialchars($data["Time"]);
    $Detail = htmlspecialchars($data["Detail"]);
    $Photo = htmlspecialchars($data["Photo"]);
    $Username = htmlspecialchars($data["Username"]);
    $Phone = htmlspecialchars($data["Phone"]);

    $query = "INSERT INTO item VALUES('', '', '$Item', '$Detail', '$Photo'),
    INSERT INTO lost VALUES('', '', '$Date_Lost', '$Detail', '$Location', '$Time')";

    mysqli_query($db, $query);
}

function delete($id){
    global $db;
    mysqli_query($db, "DELETE * FROM item WHERE id = $id");
}
?>