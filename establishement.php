<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyInternship | login | establishement </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="css/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content" >
                    <div class="signin-image">
                        <figure><img src="../img/concept-of-finding-creative-employees-for-company-startup.svg" alt="sing up image" ></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign-Up  </h2>
                        <form method="post" class="register-form" id="login-form" action="login_register_php/reg_establishement.php">
                        <div class="alert">
                            <?php 
                                if(isset($_SESSION['status']))
                                {
                                    echo "<h4>".$_SESSION['status']."</h4>";
                                    unset($_SESSION['status']);
                                }
                            ?>
                            </div>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Your Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="pro_email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="pro_email" id="pro_email" placeholder="profissional email" required/>
                            </div>
                            <div class="form-group">
                                <label for="establish_name"><i class="zmdi zmdi-city-alt"></i></label>
                                <input type="text" name="establish_name" id="establish_name" placeholder="name of the establishement " required/>
                            </div>
                            <div class="form-group">
                                <label for="position"><i class="zmdi zmdi-assignment-o"></i></label>
                                <input type="text" name="position" id="position" placeholder="position " required/>
                            </div>
                            <div class="form-group">
                                <label for="phone_num"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" name="phone_num" id="phone_num" placeholder="phone number " required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="password" required/>
                            </div>
                            <div class="form-group">
                                <label for="confirm_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="confirm_pass" id="confirm_pass" placeholder="confirm_pass" required/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin_establish" id="signin" class="form-submit" value="Sign-Up "/>
                            </div>
                        </form>                       
                    </div>
                </div>
            </div>
        </section>

    </div>
</body>