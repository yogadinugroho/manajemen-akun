<?php 

session_start();

$conn = mysqli_connect("localhost", "root", "", "2197101034");

    if(isset($_POST["login"])) {

        // ambil data dari form
        $username = $_POST["username"];
        $password = $_POST["password"];

        if( $username == "admin" AND $password == "admin" ){
            $_SESSION["login"] = true;
            header("Location: admin/index.php");

        } else {
            // ambil data dari form
            $username = $_POST["username"];
            $password = $_POST["password"];

            // mengecek apakah username yang diinputkan sama dengan yang ada pada database
            $result = mysqli_query($conn, " SELECT * FROM tabel_login
                    WHERE username = '$username' ");
                    
                if(mysqli_num_rows($result) == 1 ) {

                    $row = mysqli_fetch_assoc($result);
                    
                    // balikin hashnya jadi karakter biasa
                    // memastikan bahwa password yang diinputkan dan di dalam tabel login sudah match

                    if(password_verify($password, $row["password"])){

                        // set session
                        $_SESSION["login"] = $row;

                        if($row["status"] == 1){

                        header("Location: mahasiswa/index.php");
                        exit;

                        } elseif ($row["status"] == 2) {
                        header("Location: dosen/index.php");
                        exit;

                        } else {
                        header("Location: index.php");
                        exit;
                        }
                
                    }
                $error = true;
            }

        }
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
        <title>Halaman Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style>
                button {
                    border-radius: 10px;
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
        </style>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST" >
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="username" id="username" type="text" placeholder="Username" autocomplete="off" />
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="password" type="password" placeholder="Password" />
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">                                                
                                                <button type="submit" name="login" >login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
