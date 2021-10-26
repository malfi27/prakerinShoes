<?php
    require('function.php');
    session_start();
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);   
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        
        $query    = "SELECT * FROM art WHERE username='$username'
                     AND password='" . md5($password) . "'";
        if (empty(query($query))){
            $eror = true;
        } else {
            $result = query($query);
        }
        
        if (mysqli_num_rows(mysqli_query($conn,$query)) == 1) {
            $_SESSION['user'] = $result;
            
             echo "<script>location.href='index.php';</script>";
            die();
        }
    } 
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./custom/bootstrap.css">
    <link rel="stylesheet" href="./custom/app.css">
    <link rel="stylesheet" href="./custom/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="./custom/auth.css">
</head>
<body>
<style>

.card {
  background: #fff;
  border-radius: 2px;
  display: inline-block;
 padding:20px;
 border-radius:10px;
  margin: 1rem;
  position: relative;
  
}
.card-1 {
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
}

.card-1:hover {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}
.notice {
    background: red;
    padding: 1rem 3rem;
    border: 2px dashed blue;
}


</style>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        
                    <?php if (isset($eror)) { ?>
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                Data yang anda masukan salah
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>

                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                    <form class="form" method="post" name="login">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl login-input" name="username" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl login-input" name="password" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                        <button  type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5 login-button">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Belum punya akun ? <a href="registration.php" class="font-bold">Sign up</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/main.js"></script>


</body>
</html>