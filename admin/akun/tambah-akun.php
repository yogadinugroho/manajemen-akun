<?php 

session_start();

require 'functions.php';

if(!isset($_SESSION["login"])){
    header("Location: ../../index.php");
    exit;
}

$result1 = mysqli_query( $conn, "SELECT * FROM tabel_biodata_mahasiswa");
$result2 = mysqli_query( $conn, "SELECT * FROM tabel_biodata_dosen");


if(isset($_POST["submit"])) {

    $nim_nip = $_POST["nim_nip"];
    $passwordbelumdienkripsi = $_POST["password"];
    
    //  enkripsi passwordnya
    $password = password_hash($passwordbelumdienkripsi, PASSWORD_DEFAULT);

    // pecah untuk mendapatkan kata mahasiswa
    $pecah = explode('.', $nim_nip);

    // mendapatkan data nimnya
    $username = $pecah[0];

    // mendapatkan statusnya
    $statusnya = $pecah[1]; 


    if ($statusnya == "mahasiswa"){
        $status = 1;
    } elseif ($statusnya == "dosen"){
        $status = 2;
    } else {
        $status = 0;
    }


    mysqli_query($conn, "INSERT INTO tabel_login (username, password, status) VALUES ('$username', '$password', '$status')");

    header("Location: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tambah Data Akun</title>
        <link href="../../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            }

            button:hover {
            opacity: 0.8;
            }
            img {
                margin-top: 20px;              
            }
            p {
                font-size: 12px;
            }
    </style>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Tambah Data Akun</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                        <input type="hidden" name="username" value="<?= $dosen["username"]; ?>">                                        
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        
                                                        <select style="width:600px" name="nim_nip">
                                                            <option  option value="">-- Pilih --</option>
                                                            <?php 
                                                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                                                    echo "<option value='$row1[nim].mahasiswa'> ".$row1[nim]." || ".$row1[nama]." || Mahasiswa</option>";
                                
                                                                }
                                                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                                                    echo "<option value=$row2[nip].dosen> $row2[nip] || $row2[nama] || Dosen</option>"; 
                                                    
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>                                            
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" type="password" name="password" placeholder="password" />
                                                <label for="status">Password</label>
                                            </div>                                                                                         
                                            <div class="mt-4 mb-0">
                                            <button name="submit" type="submit">Tambah Data!</button>

                                            </div>
                                        </form>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Yoga Adi Nugroho // 2197101034</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../js/scripts.js"></script>
    </body>
</html>
