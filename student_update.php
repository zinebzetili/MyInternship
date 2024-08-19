<?php
session_start();
if(file_exists("config.php")){
    include("config.php");
    }
else{
        echo "file does not exists";
        die();
    }
$student=$_SESSION['student']['id'];
//password 
if(isset($_POST['update_pw'])){
    //if student
    if(!empty(trim($_POST['old_pass'])) && !empty(trim($_POST['new_pass'])) && !empty(trim($_POST['confirm_new']))){
    $old_pass=$_POST['old_pass'];
    $new_pass=$_POST['new_pass'];
    $confirm_new=$_POST['confirm_new'];
    $student_info = "SELECT password FROM users WHERE id='$student' limit 1";
    $student_info_query_run=mysqli_query($con,$student_info);
    if(mysqli_num_rows($student_info_query_run) > 0){
        $row = mysqli_fetch_assoc($student_info_query_run);
        if($row['password']==$old_pass){
           //check between the 2 :
           if($new_pass==$confirm_new){
            $update_pass = "UPDATE users SET password='$new_pass' where id='$student'";
            $update_pass_run = mysqli_query($con, $update_pass);
                if($update_pass_run){
                    $_SESSION['status'] = "password updated ";
                    header('Location: profile/student_profile.php');
                    die();
                }
                else{
                    $_SESSION['status'] = "update failed  ";
                    header('Location: profile/student_profile.php');
                    die();
                }
           }
           else{
                $_SESSION['status'] = "not matching ,you should confirm your password";
                header('Location: profile/student_profile.php');
                die();
           }


        }
        else{
            $_SESSION['status'] = "wrong password";
            header('Location: profile/student_profile.php');
            die();
        }
    }
    else{

    }
}
//if empty
else{
    $_SESSION['status']="You must fill all the fields.";
        header('Location: profile/student_profile.php');
        die();
}    

}
//the user info update 
elseif(isset($_POST['update_btn'])){
    $name_up = $_POST['name_up'];
    $field = $_POST['field_up'];
    $up_email = $_POST['email_update'];
    $desc = $_POST['desc'];
    $degree = $_POST['degree'];
    $year = $_POST['year'];
    $job = $_POST['job'];
    $univ = $_POST['univ'];
    $company = $_POST['company'];
    $skills = $_POST['skills'];
    $image = $_FILES['profile_img']; // Updated to use $_FILES array for uploaded image
    $bio = $_POST['Bio'];
    
    if (!empty($name_up) && !empty($up_email)) {
        // If image is not empty
        if (!empty($image['name'])) {
            $file_name = $image['name'];
            $file_type = $image['type'];
            $file_size = $image['size'];
            $file_temp = $image['tmp_name'];

            // Check if the file is an image
            $allowed_types = array('image/jpeg', 'image/png','image/jpg');
            if (!in_array($file_type, $allowed_types)) {
                $_SESSION['update'] = "Error: Invalid file type. Please upload a JPEG or PNG image.";
                header('Location: profile/student_profile.php');
                die();
            }

            // Create a unique file name to prevent overwriting
            $file_path = "images/" . uniqid() . "_" . $file_name;

            // Move the uploaded file to the desired location
            if (move_uploaded_file($file_temp, $file_path)) {
                // Update the database with the new file path
                $user_update = "UPDATE users SET name='$name_up', email='$up_email', edu_level='$degree', study_year='$year', field='$field', description='$desc', university='$univ', skills='$skills', job='$job', company_name='$company', bio_student='$bio', profile_pic='$file_path' WHERE id='$student'";
                $user_update_query_run = mysqli_query($con, $user_update);
                if ($user_update_query_run) {
                    $_SESSION['student'] = [
                        'id' => $student,
                        'name' => $name_up,
                        'email' => $up_email,
                        'level' => $degree,
                        'year' => $year,
                        'field' => $field,
                        'desc' => $desc,
                        'univ' => $univ,
                        'skills' => $skills,
                        'job' => $job,
                        'company' => $company,
                        'profilepic'=>$file_path,
                        'bio' => $bio,
                    ];
                    $_SESSION['update'] = "Profile updated.";
                    header('Location: profile/student_profile.php');
                    die();
                } else {
                    $_SESSION['update'] = "Profile update failed.";
                    header('Location: profile/student_profile.php');
                    die();
                }
            } else {
                $_SESSION['update'] = "Error: Failed to upload image.";
                header('Location: profile/student_profile.php');
                die();
            }
        } else {
            // If image is empty, update the database without changing the image
            $user_update = "UPDATE users SET name='$name_up', email='$up_email', edu_level='$degree', study_year='$year', field='$field', description='$desc', university='$univ', skills='$skills', job='$job', company_name='$company', bio_student='$bio' WHERE id='$student'";
            $user_update_query_run = mysqli_query($con, $user_update);
            if ($user_update_query_run) {
                $_SESSION['student'] = [
                    'id' => $student,
                    'name' => $name_up,
                    'email' => $up_email,
                    'level' => $degree,
                    'year' => $year,
                    'field' => $field,
                    'desc' => $desc,
                    'univ' => $univ,
                    'skills' => $skills,
                    'job' => $job,
                    'company' => $company,
                    'bio' => $bio,
                ];
                $_SESSION['update'] = "Profile updated.";
                header('Location: profile/student_profile.php');
                die();
            } else {
                $_SESSION['update'] = "Profile update failed.";
                header('Location: profile/student_profile.php');
                die();
            }
        }
    }
}
//picture 
//add cv 
?>