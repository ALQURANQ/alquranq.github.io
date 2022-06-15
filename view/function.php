<?php

$conn = mysqli_connect("localhost", "root", "", "dbquran");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function cari($keyword){
    $query = "SELECT * FROM daftarsurah WHERE surah_indonesia LIKE '%$keyword%' ";

    return query($query);
}




?>