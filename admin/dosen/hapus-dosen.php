<?php 

session_start();

require 'functions.php';

if(!isset($_SESSION["login"])){
    header("Location: ../../index.php");
    exit;
}

$nip = $_GET["nip"];

if( hapus($nip) > 0 ) {
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
