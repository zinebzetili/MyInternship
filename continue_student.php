<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My internship || continue</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">improve your matches || you can skip this step </h2>
                        <form method="POST" class="register-form" id="register-form" action="login_register_php/continue_code.php" enctype="multipart/form-data">
                        <div class="alert">
                            <?php 
                                if(isset($_SESSION['status']))
                                {
                                    echo "<h4>".$_SESSION['status']."</h4>";
                                    echo "<h4>".$_SESSION['USER']['user']."</h4>";
                                    unset($_SESSION['status']);
                                }
                            ?>
                        </div>
                            <div class="form-group">
                                <!--adding menu to choose-->
                                <details>
                                    <summary>Add your work experience information</summary>
                                <ul class="menu">
                                        <li>
                                            <label for="jobs"></label>
                                            <input list="jobs" name="job" id="job" placeholder="  job position"/>
                                            <datalist id="jobs">
                                                <option value="frontend">
                                                <option value="backend">
                                                <option value="software engineer">
                                                <option value="assistant">
                                            </datalist>
                                        </li>
                                    <br>
                                        <li>
                                            <input type="text" name="company" id="company" placeholder="   company"/>
                                        </li>
                                </ul>
                                    
                                </details>
                                    
                                <!--<input type="text" name="name" id="name" placeholder="Your Name"/>-->
                            </div>
                            <div class="form-group">
                                <details>
                                    <summary>Add Education</summary>
                                    <ul class="menu">
                                        <li><p style="color: black;">level of education</p>
                                            <label for="level_of_edu"></label>
                                            <input list="level_of_edu" name="level" id="level" placeholder="  which level you are at" required/>
                                            <datalist id="level_of_edu">
                                                <option value="Phd student">
                                                <option value="master degree">
                                                <option value="bachlor degree">
                                            </datalist>
                                        </li>
                                        <br>
                                        <li> <p style="color: black;">year of study</p>
                                            <input type="text" name="year_study" id="year_study" placeholder=" 1st year student" required/>
                                        </li>
                                        <br>
                                        <li> <p style="color: black;">Field of study</p>
                                            <input type="text" name="field" id="field" placeholder=" what is your field of study" required/>
                                        </li>
                                        <br>
                                        <li> <p style="color: black;">description</p>
                                            <textarea style="resize: none; border-color: rgb(197, 194, 194);font-family:'Times New Roman', Times, serif;font-size: medium;" name="study_descreption" placeholder="      Tell us about your field" cols="50" rows="8" ></textarea>
                                        </li>
                                        <br>
                                        <li><p style="color: black;">institut or university name</p>
                                            <label for="universities"></label>
                                            <input list="universities" name="univ" id="univ" placeholder="  university or institut" required/>
                                            <datalist id="universities">
                                                <option value="National school of artificial intelligence">
                                                <option value="Esi">
                                                <option value="university of batna">
                                            </datalist>
                                        </li>
                                      </ul>
                                </details>
                            </div>
                            <div class="form-group">
                                <details>
                                    <summary>Add skills</summary>
                                    <ul class="menu">
                                        <li>
                                            <p style="color: black;">add your skills here</p>
                                            <textarea name="skills" style="resize: none; border-color: rgb(197, 194, 194);font-family:'Times New Roman', Times, serif;font-size: medium;" name="study_descreption" placeholder="      your skills" cols="50" rows="8" ></textarea>
                                        </li>

                                      </ul>
                                </details>
                            </div>
                            <div class="form-group">
                                <details>
                                    <summary>Add your diploma</summary>
                                    <ul class="menu">

                                        <li>
                                            <label for="images" class="drop-container">
                                                <span class="drop-title">Drop files here</span>
                                                or
                                                <input type="file" name="diploma" id="images" \>
                                            </label>
                                        </li>
                                      </ul>
                                </details>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                            <input type="submit" name="qualifications" id="qualifications" class="form-submit" value="register"/>
                            </div>
                        </form>
                        <!--new form to skip!-->
                        <form method="post" action="login_register_php/continue_code.php">
                            <div class="form-group form-button">
                            <input type="submit" name="skip" id="skip" class="form-submit" value="skip"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image" style="background-color: rgb(255, 255, 255);">
                        <figure><img style="margin-top: 100px;" src="../img/Certification.svg" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>