<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job</title>
    <link href="job.css" rel="stylesheet">
     <style>
          /* Global Styles */
  html {
    height: 100%;
  }
  
   body {
    background-image: url("../img/cool-background (3).png");
    background-repeat: no-repeat;
    background-size: 100% ; 
    background-position: center;
    font-family: Arial, sans-serif;
    position: relative;
    min-height: 100%;
    margin: 0;
    padding: 0;
  }
  
  /* Navigation Bar Styles */
  .nav_bar {
    background-color: #4777f5;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
  }
  
  .right-side ul {
    list-style-type: none;
    margin: 0px;
    margin-left: 470px ;
    padding: 0;
    display: flex;
    align-items: center;
  }
  
  .right-side ul li {
    margin-right: 10px;
  }
  
  .right-side ul li a {
    color: #fff;
    text-decoration: none;
    padding: 5px 10px;
    border-radius: 5px;
  }
  
  .right-side ul li a:hover {
    background-color: #fff;
    color: #222;
  }
  
  .search-bar {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 120px;
    margin-right: 250px;
  }
  
  .input-group {
    display: flex;
    align-items: center;
  }
  
  .input-group label {
    margin-right: 5px;
    margin-left: 85px;
  }
  
  .input-group input,
  .input-group select {
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
    outline: none;
  }
  
  .search-bar label {
    margin-right: 0px;
    margin-left:-10px;
    margin-top : -70px ;
  }
  
  .search-bar input[type="text"],
  .search-bar select {
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
    outline: none;
    background-color : linear-gradient(to right, #87CEEB, #FFFFFF);
  }
  
  .search-bar input[type="text"] {
    width: 200px;
  }
  
  .search-bar select {
    width: 150px;
  }
  
  .search-bar input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 10px;
    transition: background-color 0.3s ease;
  }
  
  .search-bar input[type="submit"]:hover {
    background-color: #0056b3;
  }
  
  footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 280px;
    background-color: #4777f5;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .contact
  {
    width:33%;
    height: 80%; 
    float: left ; 
    padding-left: 40px; 
    text-decoration: none;
  }
  .contact ul li
  {
  list-style-type:none;
  line-height: 1.8;
  font-size: large;
  letter-spacing: 4px;
  font-weight: thin;
  padding-top: 10px;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  color:white; 
  }
  .contact ul li a
  {
    color: white; 
    letter-spacing: normal;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height:normal;
  }
  .popriv
  {
  width:33%;
  height: 80%; 
  float:right; 
  font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  }
  .popriv ul li
  {
  list-style-type:none;
  line-height: 1.8;
  font-size: large;
  letter-spacing: 4px;
  font-weight: thin;
  padding-top:10px;
  color:white; 
  }
  .popriv ul li a 
  {
    color: white; 
    letter-spacing: normal;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: normal;
  }
  
  .learnmore
  {
  width:33%; 
  height: 80%; 
  float:right; 
  }
  .learnmore ul li
  {
    list-style-type:none;
    line-height: 1.8;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: large;
    letter-spacing: 4px;
    font-weight:400;
    padding-top:10px;
    color:rgb(255, 255, 255); 
  }
  
  .learnmore ul li a
  {
   color: white; 
   letter-spacing: normal;
   font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
   line-height: normal;
  }
  
  .copyright
  {
  width:100%; 
  height:10%;
  color:white;
  border-top: 1px solid white;
  }
  .copyright p
  {
  padding-left: 500px; 
  border-top:1px solid white ;
  font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  text-decoration: overline;
  opacity:0.8;
  }
  .pb-100 {
      padding-bottom: 100px;
  }
  .pt-100 {
      padding-top: 100px;
  }
  .mb-100 {
      margin-bottom: 100px;
  }
  a {
      text-decoration: none;
      color: #333;
      -webkit-transition: .4s;
      transition: .4s;
  }
  
  .txt {
    width: 40%;
    height: 100px;
    float: left;
    margin-top: 60px;
    padding-top: 45px;
    padding-left: 70px;
  }
  .class
  {
  
  width:100%;
  height: 200px; 
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
            <li><a href="#"><span>MY JOB</span></a></li>
            <?php 
              //to post only when an istablishement 
               if($_SESSION['is_establishement']===true){
               echo '<li><a href="post/create-post-job.php"><span>POST</span></a></li>';
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
                <h3 class="text-dark text-uppercase">look for </h3>
                <h2 class="display-5 text-uppercase mb-0"> your suitable </h2>
                <h1 class="display-5 text-uppercase mb-0">part time job!</h1>
          </div>
      </div>
   
         <form action="" method="post" class="search-bar">
         <br><br>
        <div class="input-group">
            <label for="place">place</label>
            <input type="text" name="place" placeholder="ex: algiers..">
        </div>
       <br><br>
       <div class="input-group">
            <label for="establishement">field</label>
            <input type="text" name="establishement" placeholder="ex: library..">
       </div>
       <br><br>
        <input  type="submit" value="search">
         </form>
          
         <div class="result">
        <?php
        require_once "../signup_login/login_register_php/config.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $field = $_POST["field"];
            $place = $_POST["place"];
            
          
            $query = "SELECT title,company_name, description, website_link ,location, start_date FROM jobs_part WHERE field = '$field'  AND location = '$place' ";
            $result = mysqli_query($con, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='post'>";
                echo "<h2>" . $row["title"] . "</h2>";
                echo "<p>" . $row["company_name"] . "</p>";
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