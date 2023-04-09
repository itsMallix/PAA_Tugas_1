<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST');
include '../config/koneksi.php';
include '../vendor/autoload.php';

use \Firebase\JWT\JWT;

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($db, $_POST['email']);
    $pass = mysqli_real_escape_string($db, md5($_POST['password']));
 
    $select_users = mysqli_query($db, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
 
    if(mysqli_num_rows($select_users) > 0){
 
        $row = mysqli_fetch_assoc($select_users);
    
        if($row['password'] != ''){
            $payload = [
                'iss' => "localhost",
                'aud' => 'localhost',
                'exp' => time() + 1000, //10 mint
                'data' => [
                    //'id' => $id,
                    'email' => $email,
                    'password' => $pass,
                ],
            ];
            $SECRET_KEY = "g1523AzABUYzhihdwuiiufujw901NHIU";
            $jwt = \Firebase\JWT\JWT::encode($payload, $SECRET_KEY, 'HS256');
            setcookie("COOKIES_LOGIN", $jwt);
            echo json_encode([
                'status' => 1,
                'jwt' => $jwt,
                'message' => 'Login Successfully',
            ]);
            header('location:admin_dashboard.php');
        }else{
            echo json_encode([
                'status' => 0,
                'message' => 'Invalid Carditional',
            ]);
        }
    }else {
        echo json_encode([
            'status' => 0,
            'message' => 'Access Denied',
        ]);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- CSS-->
    <link rel="stylesheet" href="admin_style.css">
    <!-- REMIX ICON -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
<div class="login__container container">
    <div class="login__left">
        <h1 class="text-1">H-Phone.Tzy</h1>
        <p class="text-2">The best smartphone quality in Indonesia</p>       
    </div>
    <div class="login__right">
        <img src="../asset/phone.png" alt="home image" class="home__img">
            <div class="title__header">
                <h2>Login</h2>
                <p>Explore more phone technology!</p>
            </div>
            <button class="sign__up button" type="button">
                <div class="sign__text">
                    <i class="ri-google-fill"></i> Sign Up With Google
                </div>
            </button>
        
        <form action="" method="POST">
        <div class="log__input">
            <div class="input__box">
                <i class="ri-mail-line"></i>
                <input type="email" name="email" placeholder="enter your email" required class="box">
            </div>
            <div class="input__box">
                <i class="ri-lock-2-line"></i>
                <input type="password" name="password" placeholder="enter your password" required class="box">
            </div>
            <a href="#" class="forgot">Forgot Password? </a>
            <button  class="log__in button" type="submit" name="submit" >
               Login Now
            </button>
            <div class="text__sign-up">Don't have an account? <a href="admin_sign.php" class="reg__now">register now</a></div>
        </div>
        </form>
    </div>
</div> 
</body>
</html>

