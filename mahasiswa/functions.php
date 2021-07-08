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


function upload() {
    
    // ambil dahulu isi dari $_FILES  

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


    // cek apakah tidak ada gambar yang diupload
    if( $error === 4  ) {
        echo "
        <script>
            alert('Silahkan Pilih Gambar Terlebih Dahulu');
        </script>";

        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
        echo "
        <script>
            alert('Yang diupload bukan gambar!');
        </script>";

        return false;
    }


    // cek jika gambar ukurannya besar
    if( $ukuranFile > 1000000 ) {
        echo "
        <script>
            alert('Ukuran file terlalu besar');
        </script>";

        return false;
    }

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    // lokasi relatif terhadap file ini
    move_uploaded_file($tmpName, '../admin/mahasiswa/img/' . $namaFileBaru);

    return $namaFileBaru;
}

function ubah($data){
    global $conn;
    $nim = $data["nim"];
    
    // ambil data dari tiap elemen dalam form
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // mengecek apakah user memilih gambar baru atau tidak
    if( $_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    // query untuk memasukkan data ke database
    $query = "UPDATE tabel_biodata_mahasiswa SET 
                nim ='$nim',
                nama = '$nama',    
                email = '$email',
                gambar_profil = '$gambar'
                WHERE nim = $nim
            ";

    // jalankan querynya
    mysqli_query($conn, $query);    

    // kembalikan data ketika ada yang berhasil diupdate
    return mysqli_affected_rows($conn);
}

?>
