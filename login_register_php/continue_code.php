<?php
if(file_exists("config.php")){
    include("config.php");
    }
else{
        echo "file does not exists";
        die();
    }
session_start();

if(isset($_POST['qualifications'])){
    if(!empty(trim($_POST['level'])) && !empty(trim($_POST['year_study'])) && !empty(trim($_POST['field']))){
        $edu_level=$_POST['level'];
        $edu_year=$_POST['year_study'];
        $edu_field=$_POST['field'];
        $edu_univ=$_POST['univ'];
        $edu_diploma=$_POST['diploma'];
        $study_desc=$_POST['study_descreption'];
        $job=$_POST['job'];
        $company=$_POST['company'];
        $skills=$_POST['skills'];
        
        // Check if user is registered
        $user_email = $_SESSION['USER']['email']; // take teh email of the user 
        $check_user_query = "SELECT * FROM users WHERE email='$user_email' limit 1";
        $check_user_query_run = mysqli_query($con, $check_user_query);
        //use move_uploaded_file("tmp_name","new name")
        if(mysqli_num_rows($check_user_query_run) > 0){
            // User is registered, insert education data into education table
            
            // Insert file data into files table
            $file_name =$_FILES['diploma']['name'];
            $file_type = $_FILES['diploma']['type'];
            $file_size = $_FILES['diploma']['size'];
            $file_temp = $_FILES['diploma']['tmp_name'];
            //create folder and put inside it the files uploaded 
            //mkdir(name of dir)
            $file_path = "uploads/".$file_name; // Update this to the appropriate file path
            //take the information from table user 
            $row_user =mysqli_fetch_array($check_user_query_run);
            $id_user=$row_user['id'];
            if(move_uploaded_file($file_temp, $file_path)){
                $insert_file_query = "INSERT INTO files (file_name, file_path, file_type, file_size,id,uploaded_at) VALUES ('$file_name', '$file_path', '$file_type','$file_size',$id_user, NOW())";
                $insert_file_query_run = mysqli_query($con, $insert_file_query);
                
                if($insert_file_query_run){
                    // Insert education data into education table
                    $insert_query = "UPDATE users SET edu_level='$edu_level', study_year='$edu_year', field='$edu_field', description='$study_desc', university='$edu_univ',skills='$skills',job='$job',company_name='$company',created_at=NOW(), updated_at=NOW() WHERE email='$user_email'";
                    $insert_query_run = mysqli_query($con, $insert_query);
                    
                    if($insert_query_run){
                        $_SESSION['authetification']=true;
                        $_SESSION['is_user']=true;//user
                        $_SESSION['student']=[
                            'id'=>$id_user,
                            'name'=>$_SESSION['USER']['user'],
                            'email'=>$user_email,
                            'level'=>$edu_level,
                            'year'=>$edu_year,
                            'field'=>$edu_field,
                            'desc'=>$study_desc,
                            'univ'=>$university,
                            'skills'=>$skills,
                            'job'=>$job,
                            'company'=>$company,
                            'profilepic'=>null,
                            'bio'=>null,
                        ];
                        $_SESSION['status'] = "Education data inserted successfully.";
                        header('Location: ../../landingpage-html_new.php'); // Redirect to landing page or other page mecosid
                        die();
                    } else {
                        $_SESSION['status'] = "Error: Failed to insert education data.";
                        header('Location: ../continue_student.php'); // Redirect to getstarted page or other page
                        die();
                    }
                } else {
                    $_SESSION['status'] = "Error: Failed to insert file data.";
                    header('Location: ../continue_student.php'); // Redirect to getstarted page or other page
                    die();
                }
            } else {
                $_SESSION['status'] = "Error: Failed to upload file.";
                header('Location: ../continue_student.php'); // Redirect to getstarted page or other page
                die();
            }
            
        } else {
            $_SESSION['status'] = "Error: User not registered.";
            header('Location: ../continue_student.php'); // Redirect to getstarted page or other page
            die();
        }
        
    } else {
        $_SESSION['status'] = "You must fill all the required fields.";
        header('Location:../continue_student.php');
    }
}
elseif(isset($_POST['skip'])){
    $_SESSION['authetification']=true;
    $_SESSION['is_user']=true;//user    
        // Check if user is registered
    $user_email = $_SESSION['USER']['email']; // take teh email of the user 
    $check_user_query = "SELECT * FROM users WHERE email='$user_email' limit 1";
    $check_user_query_run = mysqli_query($con, $check_user_query);
    if($check_user_query_run){
        $row_user =mysqli_fetch_array($check_user_query_run);
        $id_user=$row_user['id'];
        $_SESSION['student']=[
            'id'=>$id_user,
            'name'=>$row_user['name'],
            'email'=>$row_user['email'],
            'level'=>$row_user['edu_level'],
            'year'=>$row_user['study_year'],
            'field'=>$row_user['field'],
            'desc'=>$row_user['description'],
            'univ'=>$row_user['university'],
            'skills'=>$row_user['skills'],
            'job'=>$row_user['job'],
            'company'=>$row_user['company'],
            'profilepic'=>$row_user['profile_pic'],
            'bio'=>null,
        ];
        $_SESSION['status'] = " successfully registered welcome";
        header('Location: ../../landingpage-html_new.php'); // Redirect to landing page or other page mecosid
        die();
    } else {
        $_SESSION['status'] = "Error: Failed ";
        header('Location: ../continue_student.php'); // Redirect to getstarted page or other page
        die();
    }
}
?>
