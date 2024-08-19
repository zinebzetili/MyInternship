<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landing_page.css" type="text/css">
    <title>Main page</title>
</head>
<body>
  <div class="land">
  <div class="nav_bar">
      <div><input type="text" placeholder="Search"></div>
        <div><a href=""><span>Help</span></a></div>
        <div><a href="services_pages/newinternship.php"><span>Internship</span></a></div>
        <div><a href="services_pages/newscholorship.php"><span>Scholarship</span></a></div>
        <div><a href="services_pages/newjob.php"><span>Job</span></a></div>
        <div><a href="services_pages/newtalks.php"><span>Talks</span></a></div>
        <div><a href="getstarted.php"><span>login</span></a></div>
        <div><a href="php_backend/logout.php"><span>Log-Out</span></a></div>
        <div>
        <?php 
              //to post only when an istablishement 
               if($_SESSION['is_establishement']===true){
               echo '<a href="profile_user/profile/estab_profile.php"><span>Profile</span></a>';
               }
               elseif($_SESSION['is_user']===true){
               echo '<a href="profile_user/profile/student_profile.php"><span>Profile</span></a>';
               }
         ?>
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
    <div class="left_side_bar">
        <div class="img_back">
        <div class="img">
         <?php 
         if(isset($_SESSION['is_establishement']) && $_SESSION['is_establishement']===true){
          $profilePic = isset($_SESSION['establishement']['profilepic']) ? $_SESSION['establishement']['profilepic'] : '';

          if (!empty($profilePic)) {
            // Display the profile picture if it exists
            echo '<a href="profile_user/profile/estab_profile.php"><img src="profile_user/'. $profilePic . '" alt="avatar" class="profile-image shadow" id="profile-image"></a>';
          } else {
            // Display a default image if the profile picture doesn't exist
            echo '<a href="profile_user/profile/estab_profile.php"><img src="img/user.jpg" alt="avatar" class="profile-image shadow" id="profile-image"></a>';
          }
         }
         elseif( isset($_SESSION['is_user']) && $_SESSION['is_user']===true){
          $profilePic = isset($_SESSION['student']['profilepic']) ? $_SESSION['student']['profilepic'] : '';

          if (!empty($profilePic)) {
            // Display the profile picture if it exists
            echo '<a href="profile_user/profile/student_profile.php"><img src="profile_user/'. $profilePic . '" alt="avatar" class="profile-image shadow" id="profile-image"></a>';
          } else {
            // Display a default image if the profile picture doesn't exist
            echo '<a href="profile_user/profile/student_profile.php"><img src="img/user.jpg" alt="avatar" class="profile-image shadow" id="profile-image"></a>';
          }
         }
         else{
          echo '<img src="img/user.jpg" alt="profile picture" >';
         }
         ?>
          </div>
          <div class="info">
             <p><strong>
             <?php 
               if($_SESSION['is_establishement']===true){
               echo $_SESSION['establishement']['user'] ;
               }
               elseif($_SESSION['is_user']===true){
               echo $_SESSION['student']['name'];
               }
               else{
                echo "default";
                }
               ?>
             </strong></p>
          </div>
        </div>
      <div class="activities">
          <a href="" id="one"><span>Current Internship</span></a>
          <a href="" id="two"><span> Scholarship</span></a>
          <a href="" id="three"><span>Current Talks</span></a>
          <a href="" id="four"><span>Current Job</span></a>
      </div>
    </div>

  <div class="content">
     <?php 
    require_once "signup_login/login_register_php/config.php"; 
    $query= "SELECT establishement_name,title, description, field , likes FROM internship A JOIN establishement B ON FIND_IN_SET(B.id_establishement, A.id_establishement)"; 
    $result= mysqli_query($con,$query); 
    while($row= mysqli_fetch_array($result))
          {
    ?>
      <div class="post">
        <div class="head">
           <div class="image">
             <img src="logo.png" alt="establishment picture">
           </div>
           <div class="cls">
             <div class="name">
               <?php 
                 echo $row["establishement_name"]; ?>
              </div>
              <div class="title">
                <?php echo $row["title"] ;?> | <?php echo $row["field"]; ?> 
              </div>
           </div>
         </div>
       <div class="body">
           <div class="text">
              <?php echo $row["description"]; ?>
           </div>
       </div>
        <div class="interaction">
           <div class="post">
              <div class="like">
                <img src="img/love.png" onclick="toggleLike(this)" class="likeIcon" data-likes="<?php echo $row['likes']; ?>" data-liked="false">
                <span class="likeCount" id="likeCount_<?php echo $row['likes']; ?>"> <?php echo $row['likes']?></span>
              </div>
            </div>
           <div class="read_more">
             <a href="">More</a>
           </div>
         </div>
      </div>
         <?php } ?>
   </div>
 </div>
 <script src="profile_user/profile.js"></script>
<script>
 $(document).ready(function() {
  $('.likeIcon').click(function() {
    var likeButton = $(this);
    var postId = likeButton.attr('data-likes');
    var isLiked = likeButton.attr('data-liked') === 'true';
    var likeCount = $('#likeCount_' + postId);
    var count = parseInt(likeCount.text());

    if (isLiked) {
      likeButton.attr('data-liked', 'false');
      likeButton.src=img/love.png;
      count--;
    } else {
      likeButton.attr('data-liked', 'true');
      likeButton.src=img/lovee.png; 
      count++;
    }

    likeCount.text(count);

    updateLikesInDatabase(postId, count); 
  });

  function updateLikesInDatabase(postId, count) {
    $.ajax({
          url: '<?php echo $_SERVER["PHP_SELF"]; ?>',
          method: 'POST',
          data: { action: 'update_likes', post_id: postId, likes: count },
          success: function(data) {
          },
          error: function(xhr, status, error) {
          }
        });
    $.post('update_likes.php', { post_id: postId, likes: count }, function(data) {
    });
  }
});
</script>
</body>
</html>


<?php
// Your database connection code here

if (isset($_POST['action']) && $_POST['action'] === 'update_likes') {
  $postId = $_POST['post_id'];
  $likes = $_POST['likes'];

  // Prepare the update query
  $query = "UPDATE internships SET likes = $likes WHERE post_id = $postId";

  // Prepare the statement
  $stmt = mysqli_prepare($con, $query);
  mysqli_stmt_bind_param($stmt, "ii", $likes, $postId);

  // Execute the statement
  mysqli_stmt_execute($stmt);

  // Check if the update was successful
  if (mysqli_stmt_affected_rows($stmt) > 0) {
    // Update successful
    echo json_encode(['success' => true]);
  } else {
    // Update failed
    echo json_encode(['success' => false, 'error' => 'Failed to update likes']);
  }

  // Close the statement
  mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($con);
?>
