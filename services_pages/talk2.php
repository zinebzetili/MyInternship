<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship</title>
    <link rel="stylesheet" type="text/css" href="internship.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="content">
   <div class="nav-bar">
     <div class="nav-bar-content">
       <div class="right-side">
          <ul>
          <li><a href="../landingpage-html_new.php"><span>home</span> </a></li>
            <li><a href="#"><span>My Talks</span> </a></li>
            <li><a href="landingpage.html"><span>News</span></a></li>
            <li><a href="#"><span>Help</span></a></li>
      
            <?php 
              //to post only when an istablishement 
               if($_SESSION['is_establishement']===true){
               echo '<li><a href="post/create-post-talk.php"><span>POST</span></a></li>';
               }?>
          </ul>
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
       <div class="left-side">
          <div class="search-bar">
                <input  type="text" placeholder="Search">
                <a href="#">
                <i class="fas fa-search"></i>
                </a>
            </div>
       </div>
     </div>
     </div>
    <div class="image">
      <img id ="A" src="beam-woman-sitting-at-desk-and-programming.gif">
      <div class="txt">
          <div class="border-start border-5 border-dark ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-dark text-uppercase"> stay informed</h6>
                <h1 class="display-5 text-uppercase mb-0"> of the latest topics in your field !</h1>
          </div>
      </div>
    </div>
     
     <div class="class">
      <div class ="input1">
           <label for="field">Enter Topic : </label><br>
           <input id ="field" type="text" placeholder="Ex: Marketing, Design..">
           
      </div>
      <div class="input4">
        <form action="">
          <label for="level">Select level:</label>
          <select name="level" id="level">
            <option value="">
              Begenner 
            </option>
            <option value="">
              Intermediate 
            </option>
            <option value="">
              Advanced 
            </option>
          </select>
        </form>
       </div>
       <div class="input5">
        <form action="">
          <label for="type-of-attendace">attend as: </label>
          <select id="type-of-attendance" name="type-of-attendance">
            <option selected>
              speaker
            </option>
            <option>
              attendee
            </option>
          </select>
        </form>
       </div>
      <div class="input3"> 
        <form>
        <label for="type-of-scholarship">Enter type :</label><br>
        <select name="type-of-scholarship" id="type-of-scholarship">
         <option>
           Paid
         </option>
         <option>
           Non-paid
         </option>
         <option selected>
          Does not matter
         </option>
        </select>
        </form>
       </div>
      <div class="input2">
         <label for="place">Enter Establishment : </label><br>
         <input id="place"  type="text" placeholder="Ex: ENSIA...">
         </div>
      </div>
      <div class="row">
               <div class="col-xl-6 mx-auto text-center">
                  <div class="section-title mb-100">
                  <h4>latest blog</h4>
                  </div>
               </div>
            </div>

    <!--BLOG CONTAINER-->
    <div class="blog-container">
    <?php
         if(file_exists("../signup_login/login_register_php/config.php")){
            include("../signup_login/login_register_php/config.php");
            }
            else{
               echo "file does not exists";
               die();
            }
         //select all the info from internship table
         $select_query="SELECT * FROM talks limit 10";
         //run the query 
        $select_query_run=mysqli_query($con,$select_query);
        if(mysqli_num_rows($select_query_run)>0){
          // Loop through each row of data
         while ($row = mysqli_fetch_array($select_query_run)) {
         // Display data in table rows
         ?>
         <!-- Blog Start -->
         <section class="blog-me pt-100 pb-100" id="blog">
         <div class="container">
            
            <div class="row">
               <div class="col-lg-4 col-md-6">
                  <!-- Single Blog -->
                  <div class="single-blog">
                     <div class="blog-img">
                        <img src="http://infinityflamesoft.com/html/abal-preview/assets/img/blog/blog1.jpg" alt="">
                        <div class="post-category">
                           <a href="#">Creative</a>
                        </div>
                     </div>
                     <div class="blog-content">
                        <div class="blog-title">
                           <h4><a href="#"><?php echo $row["name"] ;?></a></h4>
                           <div class="meta">
                              <ul>
                                 <li><?php echo $row["create_datetime"]?></li>
                              </ul>
                           </div>
                        </div>
                        <p><?php echo $row["description"] ; ?></p>
                        <a href="#" class="box_btn">read more</a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <!-- Single Blog -->
                  <div class="single-blog">
                     <div class="blog-img">
                        <img src="http://infinityflamesoft.com/html/abal-preview/assets/img/blog/blog2.jpg" alt="">
                        <div class="post-category">
                           <a href="#">Creative</a>
                        </div>
                     </div>
                     <div class="blog-content">
                        <div class="blog-title">
                           <h4><a href="#"><?php echo $row["name"] ;?></a></h4>
                           <div class="meta">
                              <ul>
                                 <li><?php echo $row["create_datetime"]?></li>
                              </ul>
                           </div>
                        </div>
                        <p><?php echo $row["description"] ; ?></p>
                        <a href="#" class="box_btn">read more</a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <!-- Single Blog -->
                  <div class="single-blog">
                     <div class="blog-img">
                        <img src="http://infinityflamesoft.com/html/abal-preview/assets/img/blog/blog3.jpg" alt="">
                        <div class="post-category">
                           <a href="#">field</a>
                        </div>
                     </div>
                     <div class="blog-content">
                        <div class="blog-title">
                           <h4><a href="#"><?php echo $row["name"] ;?></a></h4>
                           <div class="meta">
                              <ul>
                                 <li><?php echo $row["create_datetime"] ?></li>
                              </ul>
                           </div>
                        </div>
                        <p> <?php echo $row["description"] ; ?></p>
                        <a href="#" class="box_btn">read more</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
    <br>
    <!-- Blog End -->
    
         </div>
         <?php
  }
        }
    // Close database connection
    
    ?>
      
</div>
    
 
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
        <li>Privacy And Policy :</li>
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
  
</body>
</html>
