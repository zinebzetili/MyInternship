<?php
session_start();
if(isset($_SESSION['is_establishement']) && $_SESSION['is_establishement']==true){
	$establish=$_SESSION['establishement'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My intership || establishement Account</title>
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
						
						$profilePic = isset($_SESSION['establishement']['profilepic']) ? $_SESSION['establishement']['profilepic'] : '';

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
							if(isset($_SESSION['is_establishement'])  && $_SESSION['is_establishement']==true){
								echo $_SESSION['establishement']['user'];
							}
							else{
								echo "null";
							}
							?>
							</h4>
						<h4 class="text-center">
						<?php
                  if(isset($_SESSION['is_establishement']) && $_SESSION['is_establishement']==true){
                    echo "establishement manager";
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
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Password
						</a>
						<a class="nav-link" id="post-tab" data-toggle="pill" href="#post" role="tab" aria-controls="post" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Your Posts
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
									if(isset($_SESSION['is_establishement']) && $_SESSION['is_establishement']==true){
									echo $_SESSION['establishement']['user'];
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
									if(isset($_SESSION['is_establishement']) && $_SESSION['is_establishement']==true){
									echo $_SESSION['establishement']['email'];
									}
									else{
									echo "null";
									}
								?></p>
								</div>
							</div>
							</div>
							<!--end email!-->
							<!--establishement_name !-->
							<div class="col-md-6">
							<div class="card">
								<div class="card-body">
								<h5 class="card-title">Establishement name</h5>
								<p class="card-text text-muted mb-0"><?php
									if(isset($_SESSION['is_establishement']) && $_SESSION['is_establishement']==true){
									echo $establish['establishement'];
									}
									else{
									echo "null";
									}
								?></p>
								</div>
							</div>
							</div>
							<!--end establishement_name!-->
							<!--position !-->
							<div class="col-md-6">
							<div class="card">
								<div class="card-body">
								<h5 class="card-title">Position</h5>
								<p class="card-text text-muted mb-0"><?php
									if(isset($_SESSION['is_establishement']) && $_SESSION['is_establishement']==true){
									echo $_SESSION['establishement']['pos'];
									}
									else{
									echo "null";
									}
								?></p>
								</div>
							</div>
							</div>
							<!--end position!-->
							<!--phone_number !-->
							<div class="col-md-6">
							<div class="card">
								<div class="card-body">
								<h5 class="card-title">Phone Number</h5>
								<p class="card-text text-muted mb-0"><?php
									if(isset($_SESSION['is_establishement']) && $_SESSION['is_establishement']==true){
									echo $_SESSION['establishement']['phone num'];
									}
									else{
									echo "null";
									}
								?></p>
								</div>
							</div>
							</div>
							<!--end phone_number!-->
					</div>
				</div>
					<div class="tab-pane fade show " id="account" role="tabpanel" aria-labelledby="account-tab">
						<form action="../update_profile.php" method="post" enctype="multipart/form-data">
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
								  	<label>user name</label>
								  	<input name="name_up" type="text" class="form-control" value="<?php echo $establish['user'];?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>position</label>
								  	<input name="pos_up" type="text" class="form-control" value="<?php echo $establish['pos'];?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>professional email </label>
								  	<input name="email_update" type="email" class="form-control" value="<?php echo $establish['email'];?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Phone number</label>
								  	<input name="phonenum" type="text" class="form-control" value="<?php echo $establish['phone num'];?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>establishement name</label>
								  	<input name="estabname" type="text" class="form-control" value="<?php echo $establish['establishement'];?>">
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
									<textarea name="Bio" class="form-control" rows="4"><?php echo $establish['bio'];?></textarea>
								</div>
							</div>
						</div>
						<div>
							<button name="update_btn" class="btn btn-primary" type="submit">Update</button>
			
						</div>
						</form>
					</div>
					<div class="tab-pane fade" id="post" role="tabpanel" aria-labelledby="post-tab">
						<h3 class="mb-4">Check your posts</h3>
						<h3 class="mb-4">to be added</h3>
						<!--his accounts !-->
					</div>
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<form action="../update_profile.php" method="post" >
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
						<!--his accounts !-->
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