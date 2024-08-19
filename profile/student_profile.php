<?php
session_start();
if(isset($_SESSION['is_user']) && $_SESSION['is_user']==true){
	$user=$_SESSION['student'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My intership || student Account</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<section class="py-5 my-5">
		<div class="container">
			<h1 class="mb-5">Welcome to your account</h1>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
					<div class="img-circle text-center mb-3">
						<?php
						$profilePic = isset($_SESSION['student']['profilepic']) ? $_SESSION['student']['profilepic'] : '';

						if (!empty($profilePic)) {
							// Display the profile picture if it exists
							echo '<img src="../'. $profilePic . '" alt="avatar" class="profile-image shadow" id="profile-image">';
						} else {
							// Display a default image if the profile picture doesn't exist
							echo '<img src="../../img/unnamed.jpg" alt="avatar" class="profile-image shadow" id="profile-image">';
						}
						?>
					</div>
							<h4 class="my-3">
							<?php
							if(isset($_SESSION['is_user'])  && $_SESSION['is_user']==true){
								echo $user['name'];
							}
							else{
								echo "null";
							}
							?>
							</h4>
						<h4 class="text-center">
						<?php
                  if(isset($_SESSION['is_user']) && $_SESSION['is_user']==true){
                    echo "Student";
                  }
                  else{
                    echo "null";
                  }?>
						</h4>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="general-tab" data-toggle="pill" href="#account_general" role="tab" aria-controls="general" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i> 
							Account || general
						</a>
						<a class="nav-link " id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="false">
							<i class="fa fa-home text-center mr-1"></i> 
							Account settings
						</a>
                        <a class="nav-link " id="experiance-tab" data-toggle="pill" href="#experiance" role="tab" aria-controls="experiance" aria-selected="false">
							<i class="fa fa-home text-center mr-1"></i> 
							experiance
						</a>
                        <a class="nav-link " id="CV-tab" data-toggle="pill" href="#CV" role="tab" aria-controls="CV" aria-selected="false">
							<i class="fa fa-home text-center mr-1"></i> 
							Get Your CV
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Password
						</a>
						<a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="false">
							<i class="fa fa-tv text-center mr-1"></i> 
							your network
						</a>
						<a class="nav-link" id="notification-tab"  href="../../landingpage-html_new.php" role="tab" aria-controls="notification" aria-selected="false">
							<i class="fa fa-bell text-center mr-1"></i> 
							Back to Home
						</a>
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
				<div class="tab-pane fade show active" id="account_general" role="tabpanel" aria-labelledby="general-tab">
						<h3 class="mb-4">Account general</h3>
						<div class="row">
						<!--name !-->
						<div class="col-md-6">
							<div class="card">
								<div class="card-body">
								<h5 class="card-title">name</h5>
								<p class="card-text text-muted mb-0"><?php
									if(isset($_SESSION['is_user']) && $_SESSION['is_user']==true){
									echo $user['name'];
									}
									else{
									echo "null";
									}
								?></p>
								</div>
							</div>
							</div>
							<!--end name!-->
							<!--email!-->
							<div class="col-md-6">
							<div class="card">
								<div class="card-body">
								<h5 class="card-title">Email</h5>
								<p class="card-text text-muted mb-0"><?php
									if(isset($_SESSION['is_user']) && $_SESSION['is_user']==true){
									echo $user['email'];
									}
									else{
									echo "null";
									}
								?></p>
								</div>
							</div>
							</div>
							<!--end email!-->
                            
					</div>
				</div>
					<div class="tab-pane fade show " id="account" role="tabpanel" aria-labelledby="account-tab">
						<form action="../student_update.php" method="post" enctype="multipart/form-data">
						<div class="alert">
                           <script>
                            <?php 
                                if(isset($_SESSION['update'])) 
                                {
                                    echo "alert('".$_SESSION['update']."')";
                                    unset($_SESSION['update']);
                                }
                            ?>
                            </script>
                        </div>
						<h3 class="mb-4">Account Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>name</label>
								  	<input name="name_up" type="text" class="form-control" value="<?php echo $user['name'];?>">
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">
								  	<label> email </label>
								  	<input name="email_update" type="email" class="form-control" value="<?php echo $user['email'];?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>field</label>
								  	<input name="field_up" type="text" class="form-control" value="<?php echo $user['field'];?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>university</label>
								  	<input name="univ" type="text" class="form-control" value="<?php echo $user['univ'];?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>field description</label>
								  	<input name="desc" type="text" class="form-control" value="<?php echo $user['desc'];?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>degree</label>
								  	<input name="degree" type="text" class="form-control" value="<?php echo $user['level'];?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>year of study</label>
								  	<input name="year" type="text" class="form-control" value="<?php echo $user['year'];?>">
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">
								  	<label>job</label>
								  	<input name="job" type="text" class="form-control" value="<?php echo $user['job'];?>">
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">
								  	<label>company</label>
								  	<input name="company" type="text" class="form-control" value="<?php echo $user['company'];?>">
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">
								  	<label>skills</label>
								  	<input name="skills" type="text" class="form-control" value="<?php echo $user['skills'];?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>upload profile picture</label>
								  	<input name="profile_img" type="file" accept="image/*" class="form-control" >
								</div>
							</div>
                            
							<div class="col-md-12">
								<div class="form-group">
								  	<label>Bio</label>
									<textarea name="Bio" class="form-control" rows="4"><?php echo $user['bio'];?></textarea>
								</div>
							</div>
						</div>
						<div>
							<button name="update_btn" class="btn btn-primary" type="submit">Update</button>
						</div>
						</form>
					</div>
                    <!--experiance!-->
                    <div class="tab-pane fade show " id="experiance" role="tabpanel" aria-labelledby="experiance-tab">
						<h3 class="mb-4">Your Information</h3>
						<div class="row">
						<!--name !-->
						<div class="col-md-6">
							<div class="card">
								<div class="card-body">
								<h5 class="card-title">name</h5>
								<p class="card-text text-muted mb-0"><?php
									if(isset($_SESSION['is_user']) && $_SESSION['is_user']==true){
									echo $user['name'];
									}
									else{
									echo "null";
									}
								?></p>
								</div>
							</div>
							</div>
							<!--end name!-->
							<!--email!-->
							<div class="col-md-6">
							<div class="card">
								<div class="card-body">
								<h5 class="card-title">Email</h5>
								<p class="card-text text-muted mb-0"><?php
									if(isset($_SESSION['is_user']) && $_SESSION['is_user']==true){
									echo $user['email'];
									}
									else{
									echo "null";
									}
								?></p>
								</div>
							</div>
							</div>
							<!--end email!-->
                            <!--Edu level!-->
							<div class="col-md-6">
							<div class="card">
								<div class="card-body">
								<h5 class="card-title">Degree</h5>
								<p class="card-text text-muted mb-0"><?php
									if(isset($_SESSION['is_user']) && $_SESSION['is_user']==true){
									echo $_SESSION['student']['level'];
									}
									else{
									echo "null";
									}
								?></p>
								</div>
							</div>
							</div>
							<!--end level!-->
                            <!--study year!-->
							<div class="col-md-6">
							<div class="card">
								<div class="card-body">
								<h5 class="card-title">Study year</h5>
								<p class="card-text text-muted mb-0"><?php
									if(isset($_SESSION['is_user']) && $_SESSION['is_user']==true){
									echo $user['year'];
									}
									else{
									echo "null";
									}
								?></p>
								</div>
							</div>
							</div>
							<!--end study year!-->
                            <!--field!-->
							<div class="col-md-6">
							<div class="card">
								<div class="card-body">
								<h5 class="card-title">Field</h5>
								<p class="card-text text-muted mb-0"><?php
									if(isset($_SESSION['is_user']) && $_SESSION['is_user']==true){
									echo $user['field'];
									}
									else{
									echo "null";
									}
								?></p>
								</div>
							</div>
							</div>
							<!--end field!-->
                            <!--field desc!-->
							<div class="col-md-6">
							<div class="card">
								<div class="card-body">
								<h5 class="card-title">Field Description</h5>
								<p class="card-text text-muted mb-0"><?php
									if(isset($_SESSION['is_user']) && $_SESSION['is_user']==true){
									echo $user['desc'];
									}
									else{
									echo "null";
									}
								?></p>
								</div>
							</div>
							</div>
							<!--end field desc!-->
                            <!--univ!-->
							<div class="col-md-6">
							<div class="card">
								<div class="card-body">
								<h5 class="card-title">University</h5>
								<p class="card-text text-muted mb-0"><?php
									if(isset($_SESSION['is_user']) && $_SESSION['is_user']==true){
									echo $user['univ'];
									}
									else{
									echo "null";
									}
								?></p>
								</div>
							</div>
							</div>
							<!--end univ!-->

                            <!--job!-->
							<div class="col-md-6 ">
							<div class="card">
								<div class="card-body">
								<h5 class="card-title">job</h5>
								<p class="card-text text-muted mb-0"><?php
									if(isset($_SESSION['is_user']) && $_SESSION['is_user']==true){
									echo $user['job'];
									}
									else{
									echo "null";
									}
								?></p>
								</div>
							</div>
							</div>
							<!--end job!-->
                            <!--company name!-->
							<div class="col-md-6">
							<div class="card">
								<div class="card-body">
								<h5 class="card-title">Company name</h5>
								<p class="card-text text-muted mb-0"><?php
									if(isset($_SESSION['is_user']) && $_SESSION['is_user']==true){
									echo $user['company'];
									}
									else{
									echo "null";
									}
								?></p>
								</div>
							</div>
							</div>
							<!--end company name!-->
                            <!--skils!-->
							<div class="col-md-6">
							<div class="card">
								<div class="card-body">
								<h5 class="card-title">Skills</h5>
								<p class="card-text text-muted mb-0"><?php
									if(isset($_SESSION['is_user']) && $_SESSION['is_user']==true){
									echo $user['skills'];
									}
									else{
									echo "null";
									}
								?></p>
								</div>
							</div>
							</div>
							<!--end skills!-->
                            
					</div>
				</div>
                    <!--end experiance!-->
                    <!--CV!-->
					<div class="tab-pane fade" id="CV" role="tabpanel" aria-labelledby="CV-tab">
						<form action="" method="post" >
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
						<h3 class="mb-4">Explore your chances</h3>
						
						
						<div>
							<button type="submit" name="CV_btn" class="btn btn-primary"><a href="../CV/CV_generator.php" class="btn btn-primary">Get CV</a></button>
						</div>
						</form>
					</div>
                    <!--end of CV!-->
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<form action="../student_update.php" method="post" >
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
						<h3 class="mb-4">Password Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Old password</label>
								  	<input type="password" name="old_pass" class="form-control" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>New password</label>
								  	<input type="password" name="new_pass" class="form-control" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Confirm new password</label>
								  	<input type="password" name="confirm_new" class="form-control" required>
								</div>
							</div>
						</div>
						<div>
							<button type="submit" name="update_pw" class="btn btn-primary">Update</button>
						</div>
						</form>
					</div>
					<div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
						<h3 class="mb-4">Check your network</h3>
						
						<div>
							<button class="btn btn-primary">link</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="../profile.js"></script>
</body>
</html>