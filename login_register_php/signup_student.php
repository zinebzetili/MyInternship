<?php
// Here to register as a student
if (file_exists("config.php")) {
    include("config.php");
} else {
    echo "file does not exist";
    die();
}
session_start();
// This is to deal with the establishment register
if (isset($_POST['signup_student'])) {
    try {
        $name = $_POST['name']; // The student name
        $email = $_POST['email']; // Pro_email
        $pass = $_POST['pass']; // Remember to hash the password and check the password and the confirm password, add if statement before running the query
        $confirm_pass = $_POST['re_pass'];
        
        $errors = []; // Array to store errors
        
        // Check if all fields are filled
        if (empty($name) || empty($email) || empty($pass) || empty($confirm_pass)) {
            $errors[] = "All fields are required.";
        }

        // Check if the email already exists
        $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
        $check_email_query_run = mysqli_query($con, $check_email_query);
        if (mysqli_num_rows($check_email_query_run) > 0) {
            $errors[] = "invalid,Check the email";
        }

        // Validate name format
        if (!preg_match('/^[a-zA-Z][a-zA-Z\s]*$/', $name)) {
            $errors[] = "Name should start with a letter and cannot contain numbers or special characters.";
        }

        // Check if password and confirm password match
        if ($pass !== $confirm_pass) {
            $errors[] = "Password and confirm password do not match.";
        }

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/@.+$/', $email)) {
            $errors[] = "Email should be in the format example@gmail.com.";
        }

        // Check password length
        if (strlen($pass) < 8 || trim($pass) === '') {
            $errors[] = "Password should be at least 8 characters long.";
        }

        // If there are errors, throw an exception with the errors array
        if (!empty($errors)) {
            throw new Exception(implode("<br>", $errors));
        }

        // Insert the user into the database
        $hashedpass = password_hash($pass, PASSWORD_DEFAULT); // Hashed value
        $query = "INSERT INTO users(name,email,password,created_at,updated_at) VALUES('$name','$email','$pass', NOW(), NOW())";
        $query_run = mysqli_query($con, $query);
        if ($query_run) {
            $_SESSION['authetification'] = true;
            $_SESSION['is_user'] = true;
            $_SESSION['USER'] = [
                'user' => $name,
                'email' => $email,
            ];
            $_SESSION['status'] = "Registration success, continue.";
            header("Location:../continue_student.php");
            die();
        } else {
            throw new Exception("Registration failed.");
        }
    } catch (Exception $e) {
        $_SESSION['status'] = $e->getMessage();
        header("Location:../signup.php");
        die();
    }
}
?>
