<?php

$conn = mysqli_connect("localhost", "root", "", "2197101034");

function query($query) {
    global $conn;
    // setelah terkoneksi dengan database, maka ambil isinya, disini masih berupa tabel
    $result = mysqli_query($conn, $query);
    // mempersiapkan wadah barang dari lemari yang diambil, bukan lagi tabelnya
    $rows = [];

    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function hapus($username) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tabel_login WHERE username = $username");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    $username = $data["username"];
    
    // ambil data dari tiap elemen dalam form
    $username = htmlspecialchars($data["username"]);
    $passwordmentahan = htmlspecialchars($data["password"]);
    $status = htmlspecialchars($data["status"]);

    //  enkripsi passwordnya
    $password = password_hash($passwordmentahan, PASSWORD_DEFAULT);

    // query untuk memasukkan data ke database
    $query = "UPDATE tabel_login SET 
                username ='$username',
                password = '$password',    
                status = '$status'
                WHERE username = $username
            ";

    // jalankan querynya
    mysqli_query($conn, $query);    

    // kembalikan data ketika ada yang berhasil diupdate
    return mysqli_affected_rows($conn);
}

?>
