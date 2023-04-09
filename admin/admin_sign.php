<?php
require_once('../config/koneksi.php');

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $pass = mysqli_real_escape_string($db, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($db, md5($_POST['cpassword']));
    $select_users = mysqli_query($db, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
 
    if(mysqli_num_rows($select_users) > 0){
        $message[] = 'user already exist!';
     }else{
        if($pass != $cpass){
           $message[] = 'confirm password not matched!';
        }else{
           mysqli_query($db, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
           $message[] = 'registered successfully!';
           header('location: admin_login.php');
        }
     }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign</title>
    <!-- CSS -->
    <link rel="stylesheet" href="admin_style.css">
    <!-- REMIX ICON -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<div class="sign__container container">
    <div class="sign__left">
        <h1 class="text-1">H-Phone.Tzy</h1>
        <p class="text-2">The best smartphone quality in Indonesia</p>       
    </div>

  
    <div class="sign__right">
        <img src="../asset/phone.png" alt="home image" class="home__img">
            <div class="title__header">
                <h2>Sign Up</h2>
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
                <i class="ri-user-line"></i>
                <input type="name" name="name" placeholder="enter your name " required class="box">
            </div>
            <div class="input__box">
                <i class="ri-mail-line"></i>
                <input type="email" name="email" placeholder="enter your email" required class="box">
            </div>
            <div class="input__box">
                <i class="ri-lock-2-line"></i>
                <input type="password" name="password" placeholder="enter your password" required class="box">
            </div>
            <div class="input__box">
                <i class="ri-lock-2-line"></i>
                <input type="password" name="cpassword" placeholder="confirm password" required class="box">
            </div>
            <!--<div class="sign__in button">
                <input type="submit" name="submit" value="register now" class="btn">
            </div>-->
            <button class="sign__in button" type="submit" name="submit" >
               Sign Now
            </button>
            <div class="text__login">Already have an account? <a href="admin_login.php" class="log__now">login now</a></div>
        </div>
        </form>
    </div>
</body>
</html>