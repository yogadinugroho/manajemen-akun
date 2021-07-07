<?php 

session_start();

require 'functions.php';

if(!isset($_SESSION["login"])){
    header("Location: ../../index.php");
    exit;
}

$username = $_GET["username"];

if( hapus($username) > 0 ) {
    echo "
        <script>
        alert('data berhasil dihapus!');
        document.location.href = 'index.php';
        </script>
    ";
} else {
    echo "
        <script>
        alert('data gagal dihapus!');
        document.location.href = 'index.php';
        </script>
    ";
}

?>
