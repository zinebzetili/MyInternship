<?php
session_start();
if(file_exists("config.php")){
    include("config.php");
    }
else{
        echo "file does not exists";
        die();
    }
$estab_id=$_SESSION['establishement']['id'];
//update password 
if(isset($_POST['update_pw'])){
    //if establishement 
    if(!empty(trim($_POST['old_pass'])) && !empty(trim($_POST['new_pass'])) && !empty(trim($_POST['confirm_new']))){
    $old_pass=$_POST['old_pass'];
    $new_pass=$_POST['new_pass'];
    $confirm_new=$_POST['confirm_new'];
    $estab_info = "SELECT * FROM establishement WHERE id_establishement='$estab_id' limit 1";
    $estab_info_query_run=mysqli_query($con,$estab_info);
    if($estab_info_query_run){
        $row = mysqli_fetch_array($estab_info_query_run);
        if($row['pass']==$old_pass){
           //check between the 2 :
           if($new_pass==$confirm_new){
            $update_pass = "UPDATE establishement SET pass='$new_pass' where id_establishement='$estab_id'";
            $update_pass_run = mysqli_query($con, $update_pass);
                if($update_pass_run){
                    $_SESSION['status'] = "password updated ";
                    header('Location: profile/estab_profile.php');
                    die();
                }
                else{
                    $_SESSION['status'] = "update failed  ";
                    header('Location: profile/estab_profile.php');
                    die();
                }
           }
           else{
                $_SESSION['status'] = "not matching ,you should confirm your password";
                header('Location: profile/estab_profile.php');
                die();
           }


        }
        else{
            $_SESSION['status'] = "wrong password";
            header('Location: profile/estab_profile.php');
            die();
        }
    }
    else{
        $_SESSION['status'] = "problem";
            header('Location: profile/estab_profile.php');
            die();
    }
}
//if empty
else{
    $_SESSION['status']="You must fill all the fields.";
        header('Location: profile/estab_profile.php');
        die();
}    

}
//add the image update part 
elseif(isset($_POST['update_btn'])){
    $name_up=$_POST['name_up'];
    $up_pos=$_POST['pos_up'];
    $up_email=$_POST['email_update'];
    $up_num=$_POST['phonenum'];
    $update_estab=$_POST['estabname'];
    $image=$_FILES['profile_img']['name'];//image 
    $bio=$_POST['Bio'];
    if(!empty($name_up)&&!empty($up_pos) && !empty($up_email) && !empty($update_estab) && is_numeric($up_num)){
        //store the profile pi
        //if image empty
        if(empty($image)){
            $insert_query = "UPDATE establishement SET username='$name_up',profissional_email='$up_email', position='$up_pos',phone_number='$up_num',establishement_name='$update_estab',bio='$bio' WHERE id_establishement='$estab_id'";
            $insert_query_run=mysqli_query($con,$insert_query);
            if($insert_query_run){
                //upload to folder to profile
                $_SESSION['establishement']=[
                    'id'=>$estab_id,
                    'user'=>$name_up,
                    'email'=>$up_email,
                    'establishement'=>$update_estab,
                    'pos'=>$up_pos,
                    'phone num'=>$up_num,
                    'bio'=>$bio,
                ];
                $_SESSION['update'] = "profile updated ";
                header('Location: profile/estab_profile.php');
                die();

            }
            else{
                $_SESSION['update'] = "profile update failed  ";
                header('Location: profile/estab_profile.php');
                die();
            }
        }
            //if image not empty 
        else{
            //change directory of the image 
            $file_name =$_FILES['profile_img']['name'];
            $file_type = $_FILES['profile_img']['type'];
            $file_size = $_FILES['profile_img']['size'];
            $file_temp = $_FILES['profile_img']['tmp_name'];
            //create folder and put inside it the files uploaded 
            $file_path = "images/".$file_name; 
            if(move_uploaded_file($file_temp, $file_path)){
            $insert_query = "UPDATE establishement SET username='$name_up',profissional_email='$up_email', position='$up_pos',phone_number='$up_num',establishement_name='$update_estab',bio='$bio',profile_pic='$file_path' WHERE id_establishement='$estab_id'";
            $insert_query_run=mysqli_query($con,$insert_query);
            if($insert_query_run){
                //upload to folder to profile
                $_SESSION['establishement']=[
                    'id'=>$estab_id,
                    'user'=>$name_up,
                    'email'=>$up_email,
                    'establishement'=>$update_estab,
                    'pos'=>$up_pos,
                    'phone num'=>$up_num,
                    'profilepic'=>$file_path,
                    'bio'=>$bio,
                ];
                $_SESSION['update'] = "profile updated with image ";
                header('Location: profile/estab_profile.php');
                die();

            }
            else{
                $_SESSION['update'] = "profile update failed  ";
                header('Location: profile/estab_profile.php');
                die();
            }
        }
        else{
            $_SESSION['update'] = "Error: Failed to upload file.";
                header('Location: profile/estab_profile.php'); // Redirect to getstarted page or other page
                die();
        }
        }

        }
    else{
        if(empty($name_up)){
        $_SESSION['update'] = "name cannot be empty if you want to update it";
            header('Location: profile/estab_profile.php');
            die();
        }
        if(empty($up_pos)){
            $_SESSION['update'] = "position cannot be empty if you want to update it";
            header('Location: profile/estab_profile.php');
            die();
        }
        if(empty($up_email)){
            $_SESSION['update'] = "email cannot be empty if you want to update it";
            header('Location: profile/estab_profile.php');
            die();
        }
        if(empty($update_estab)){
            $_SESSION['update'] = "establishement cannot be empty if you want to update it";
            header('Location: profile/estab_profile.php');
            die();
        }
        if(!is_numeric($up_num)){
            $_SESSION['update'] = "phone should be numbers";
            header('Location: profile/estab_profile.php');
            die();
        }
        
        
    }
}
//handle both sides 
?>