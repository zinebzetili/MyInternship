<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>internship</title>
    <link href="internship.css" rel="stylesheet">
    

</head>
<body>
<div class="nav_bar">
       <div class="right-side">
        <div class="menu-icon">
          <ul>
            <li><a href="../landingpage-html_new.php"><span>HOME</span> </a></li>
            <li><a href="#"><span>NEWS</span></a></li><!--check!-->
            <li><a href="#"><span>MY INTERNSHIPS</span></a></li>
            <?php 
  //to post only when an istablishement 
  if($_SESSION['is_establishement'] === true) {
    echo '<li><span><button onclick="toggleModal(\'open\')" class="open-modal-btn">Post</button></span></li>';
  }
?>
<!-- Modal for posts -->
<div id="modal" class="modal">
  <div class="modal-content">
    <i onclick="toggleModal('close')" class="fa-regular fa-circle-xmark close-icon"></i>
    <?php include('post/create-post-intrn.php');?>
    <link rel="stylesheet" href="post/create-post.css">

  </div>
</div>

<!-- CSS for the modal -->
<link rel="stylesheet" href="model_Css.css">
<!-- JavaScript for the modal -->
<script src="model.js"></script>
<!--end of model!-->
          </ul>
        </div>
        </div>
   </div>

   <div class="txt">
          <div class="border-start border-5 border-dark ps-5 mb-5" style="max-width: 600px;">
                <h3 class="text-dark text-uppercase">get yourself</h3>
                <h2 class="display-5 text-uppercase mb-0">an internship</h2>
                <h1 class="display-5 text-uppercase mb-0">just through few clicks!</h1>
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
         <form action="" method="post" class="search-bar">
         <br><br>
         <div class="input-group">
           <label for="field">field</label>
           <input type="text" name="field" placeholder="ex: marketing..">
         </div>
         <br><br>
         <div class="input-group">
           <label for="type">type</label>
           <select name="type" id="type">
           <option>Paid</option>
           <option>Non-paid</option>
           <option selected>Does not matter</option>
           </select>
         </div>
         <br><br>
         <div class="input-group">
          <label for="place">place</label>
          <input type="text" name="place" placeholder="ex: algiers..">
         </div>
         <br><br>
            <input  type="submit" value="search">
         </form>
         <div class="result">
        <?php
        require_once "../signup_login/login_register_php/config.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $field = $_POST["field"];
            $type = $_POST["type"];
            $place = $_POST["place"];
          
            $query = "SELECT title, description, website_link ,location, start_date FROM internship WHERE field = '$field'  AND location = '$place' ";
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
  <script src="post/postmodal.js"></script>
  
  <!--<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h3>Post</h3>
    <form action="" method ="post" >
      <label for="name">name</label>
      <input type="text" name="name">
      <label for="name">lavel</label>
      <input type="text" name="name">
    </form>
  </div>
</div>
<script>
// Get the modal element
var modal = document.getElementById("myModal");

// Get the link element for "Post" in the navbar
var postLink = document.getElementById("postLink");

// Get the close button element
var closeBtn = modal.querySelector(".close");

// Function to show the modal
function showModal() {
  modal.style.display = "block";
}

// Function to close the modal
function closeModal() {
  modal.style.display = "none";
}

// Add event listener to the post link to show the modal
postLink.addEventListener("click", showModal);

// Add event listener to the close button to close the modal
closeBtn.addEventListener("click", closeModal);
</script>-->
 
</body>
</html>
