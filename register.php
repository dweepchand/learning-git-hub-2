<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include_once("db-connect.php");
    extract($_POST);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $check_duplicate = $conn->query("SELECT id FROM `users` where `email` = '{$email}'")->num_rows;
    if($check_duplicate < 1){
        $sql = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('{$name}', '{$email}', '{$password}')";
        $insert = $conn->query($sql);
        if($insert){
            echo "<script> alert('Account has been created successfully.'); location.replace('login.php');</script>";
            exit;
        }else{
            echo "<script> alert('Registration Failed!.');</script>";
        }
    }else{
        echo "<script> alert('Registration Failed! Email already exists.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Leave Approval System</title>
    <link rel="stylesheet" href="css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="js/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>

</head>
<body>
    <script>
        start_loader()
    </script>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-gradient">
            <div class="container">
                <a class="navbar-brand" href="">Online Hostel Leave Approval System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="register.php">Registration</a>
                        </li>
                    </ul>
                </div>
                <a href="" class="text-light fw-bolder h6 text-decoration-none" target="_blank">College of Veterinary Science</a>
            </div>
        </nav>
        <div id="main-wrapper">
            <div class="container-md px-5 my-3">
                <div class="col-lg-7 col-md-8 col-sm-10 col-xs-12 mx-auto">
                    <div class="card rounded-0 shadow">
                        <div class="card-header rounded-0">
                            <div class="card-title"><b>Registration</b></div>
                        </div>
                        <div class="card-body rounded-0">
                            <div class="container-fluid">
                                <form action="" id="register" method="POST">
                                    <div class="mb-3">
                                        <label for="name" class="form-label fw-light">Name</label>
                                        <input type="text" class="form-control rounded-0" name="name" id="name" value="<?= $_POST['name'] ?? "" ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label fw-light">Email</label>
                                        <input type="text" class="form-control rounded-0" name="email" id="email" value="<?= $_POST['email'] ?? "" ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label fw-light">Password</label>
                                        <input type="password" class="form-control rounded-0" name="password" id="password" value="" required>
                                    </div>
                                    <div class="mb-3 text-center">
                                        <div class="col-lg-4 col-md-6 col-sm-10 col-sm-12 mx-auto">
                                            <button class="btn btn-primary rounded-pill">Register</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="shadow-top py-4 col-auto">
            <div class="">
                <div class="text-center">
                    All Rights Reserved &copy; <span id="dt-year"></span> | <span class="text-muted">College of Veterinary Science</span>
                </div>
                <div class="text-center">
                    <a href="" class="text-decoration-none text-body-secondary">akmit@vetbifg.ac.in</a>
                </div>
            </div>
        </footer>
    </main>
</body>
</html>
