<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sholorship</title>
    <link href="scholorship.css" rel="stylesheet">
     <style>
      .body{
        background-image: url("../img/cool-background (3).png");
      }
     </style>
</head>
<body>
<div class="nav_bar">
       <div class="right-side">
        <div class="menu-icon">
          <ul>
            <li><a href="../landingpage-html_new.php"><span>HOME</span> </a></li>
            <li><a href="#"><span>NEWS</span></a></li>
            <li><a href="#"><span>MY SCHOLORSHIP</span></a></li>
            <?php 
              //to post only when an istablishement 
               if($_SESSION['is_establishement']===true){
               echo '<li><a href="post/create-post-schr.php"><span>POST</span></a></li>';
               }?>
            <!--<li><a href="profile.php"><span>PROFILE</span></a></li>!-->
          </ul>
        </div>
        </div>
   </div>
   <div class="alert">
                           <script>
                            <?php 
                                if(isset($_SESSION['status']))
                                {
                                    echo "alert('".$_SESSION['status']."')";
                                    unset($_SESSION['status']);
                                }
                            ?>
                            </script>
   </div>
   <div class="txt">
          <div class="border-start border-5 border-dark ps-5 mb-5" style="max-width: 600px;">
                <h3 class="text-dark text-uppercase">find </h3>
                <h2 class="display-5 text-uppercase mb-0">your dream</h2>
                <h1 class="display-5 text-uppercase mb-0">scholorship!</h1>
          </div>
      </div>
   
         <form action="" method="post" class="search-bar">
         <br><br>
        <div class="input-group">
            <label for="speciality">speciality</label>
            <input type="text" name="speciality" placeholder="ex: marketing..">
        </div>
        <br><br>
        <div class="input-group">
            <label for="type">type</label>
            <select name="type" id="type">
            <option>fully funded</option>
            <option>partially funded</option>
            <option selected>paid</option>
            </select>
       </div>
       <br><br>
       <div class="input-group">
            <label for="place">place</label>
            <input type="text" name="place" placeholder="ex: algiers..">
       </div>
       <br><br>
       <div class="input-group">
            <label for="level">level</label>
            <select name="level" id="level">
            <option selected >Undergraduate</option>
            <option>graduate</option>
            <option >masters</option>
            <option >ph.D</option>
            </select>
       </div>
       <br><br>
        <input  type="submit" value="search">
         </form>

         <div class="result">
        <?php
        require_once "../signup_login/login_register_php/config.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $speciality = $_POST["speciality"];
            $type = $_POST["type"];
            $place = $_POST["place"];
            $level = $_POST["level"];
          
            $query = "SELECT title,field , description, website_link ,location, start_date FROM scholarships WHERE field = '$speciality'  AND location = '$place' ";
            $result = mysqli_query($con, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='post'>";
                echo "<h2>" . $row["title"] . "</h2>";
                echo "<p>" . $row["description"] . "</p>";
                echo "<p>" . $row["location"] . "</p>";
                echo "<p>" . $row["start_date "] . "</p>";
                echo "<a href='" . $row["website_link"] . "'>Read More</a>";
                echo "</div>";
            }
        }
        ?>
    </div>

         <footer>
      <div class="contact">
        <ul>
          <li>Contact :</li>
          <li><a href="" class="">Linked-in</a></li>
          <li><a href=""class="fa fa-facebook">Facebook</a></li>
          <li><a href="">E-mail</a></li>
        </ul>
      </div>
      <div class="popriv">
       <ul>
        <li><a href="">Our Terms</a></li>
        <li><a href="">Our Policy</a></li>
        <li><a href="">Help</a></li>
       </ul>
      </div>
      <div class="learnmore">
        <ul>
          <li>See More :</li>
           <li><a href="#">Internships</a></li>
           <li><a href="schship.html">Scolarships</a></li>
           <li><a href="">Talks</a></li>
           <li><a href="job.html">Part-time jobs</a></li>
        </ul>
      </div>
      <div class="copyright">
        <p>Copyrights &copy; 2023 My internship. All rights reserved</p>
      </div>
    </footer>
  <script src="post/postmodal.js"></script>
            
 
</body>
</html>