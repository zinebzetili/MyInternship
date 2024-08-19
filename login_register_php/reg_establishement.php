<?php
if (file_exists("config.php")) {
    include("config.php");
} else {
    echo "File does not exist";
    die();
}

session_start();

$errors = array();

// Function to check if a string starts with a specific prefix
function startsWith($string, $prefix) {
    return substr($string, 0, strlen($prefix)) === $prefix;
}

// Function to check if a string contains only numbers
function isNumeric($string) {
    return ctype_digit($string);
}

// Function to check if a string contains only letters
function isAlpha($string) {
    return ctype_alpha($string);
}

// Function to validate email format
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $email);
}

// Function to validate password format
function validatePassword($password) {
    return strlen($password) >= 8 && !preg_match('/\s/', $password);
}

if (isset($_POST['signin_establish'])) {
    $your_name = $_POST['your_name'];
    $pro_email = $_POST['pro_email'];
    $establish_name = $_POST['establish_name'];
    $position = $_POST['position'];
    $phone_num = $_POST['phone_num'];
    $your_pass = $_POST['your_pass'];
    $confirm_pass = $_POST['confirm_pass'];

    // Validate required fields
    if (empty($your_name) || empty($pro_email) || empty($establish_name) || empty($position) || empty($phone_num) || empty($your_pass) || empty($confirm_pass)) {
        $errors[] = "All fields are required.";
    }

    // Validate name
    if (!isAlpha($your_name) || preg_match('/[^a-zA-Z\s]/', $your_name) || startsWith($your_name, ' ')) {
        $errors[] = "Invalid name format. Only characters are allowed";
    }

    // Validate email
    if (!validateEmail($pro_email)) {
        $errors[] = "Invalid email format.";
    }

    // Check if email exists
    $check_email_query = "SELECT profissional_email FROM establishement WHERE profissional_email='$pro_email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    if (mysqli_num_rows($check_email_query_run) > 0) {
        //$errors[] = "Email already exists.";
        $errors[] = "invalid credits.";
    }

    // Validate phone number
    if (!startsWith($phone_num, '05') && !startsWith($phone_num, '06') && !startsWith($phone_num, '07') && !isNumeric($phone_num) && strlen($phone_num) != 10) {
        $errors[] = "Invalid phone number format. Phone number should start with 05, 06, or 07, and contain exactly 10 digits.";
    }

    // Validate password
    if (!validatePassword($your_pass)) {
        $errors[] = "Invalid password format. Password should be at least 8 characters long and should not contain spaces.";
    }

    // Validate password confirmation
    if ($your_pass !== $confirm_pass) {
        $errors[] = "Password and confirm password do not match.";
    }

    if (empty($errors)) {
        $hashedpass = password_hash($your_pass, PASSWORD_DEFAULT);

        // Insert the data into the database
        $query = "INSERT INTO establishement(username,profissional_email,establishement_name,position,phone_number,pass,create_datetime) VALUES('$your_name','$pro_email','$establish_name','$position','$phone_num','$your_pass',NOW())";
        $query_run = mysqli_query($con, $query);
        if ($query_run) {
            $_SESSION['authetification'] = true;
            $_SESSION['is_establishement'] = true;
            $get_id="SELECT * FROM establishement WHERE profissional_email='$pro_email' LIMIT 1";
            $get_id_run=mysqli_query($con,$get_id);
            $row=mysqli_fetch_array($get_id_run);
            $_SESSION['establishement'] = [
                'id' => $row['id_establishement'],
                'user' => $your_name,
                'email' => $pro_email,
                'establishement' => $establish_name,
                'pos' => $position,
                'phone num' => $phone_num,
                'password' => $your_pass,
                'profilepic'=>null,
                'bio' => null,
            ];
            $_SESSION['status'] = "Registration successful.";
            header("Location: ../../landingpage-html_new.php");
            die();
        } else {
            $errors[] = "Registration failed.";
        }
    }

    $_SESSION['status'] = implode("<br>", $errors);
    header("Location: ../establishement.php");
    die();
}
?>