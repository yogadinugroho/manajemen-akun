
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ubah Data Dosen</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Ubah Data Dosen</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="nip" value="<?= $dosen["nip"]; ?>">
                                        <input type="hidden" name="gambarLama" value="<?= $dosen["gambar_profil"]; ?>">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="nama" name="nama" value="<?= $dosen["nama"] ?>" type="text" placeholder="Nama" />
                                                        <label for="Nama">Nama</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="nip" name="nip" value="<?= $dosen["nip"] ?>" type="text" placeholder="Nim" />
                                                        <label for="nip">Nip</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" type="email" name="email" value="<?= $dosen["email"] ?>" placeholder="Email" />
                                                <label for="email">Alamat Email</label>
                                            </div>
                                            <div class="row mb-3">                                        
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">                                                
                                                        <input class="form-control" id="gambar" name="gambar" type="file"/>
                                                        <img src="img/<?= $dosen['gambar_profil']; ?>" width=100px"><br>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <button name="submit" type="submit">Ubah Data!</button>
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
