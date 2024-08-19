<?php
session_start();

if (file_exists("config.php")) {
    include("config.php");
} else {
    echo "File does not exist.";
    die();
}

$user_id = $_SESSION['establishement']['id'];

if (isset($_POST['submit_field'])) {
    $field = $_POST['field'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $link = $_POST['link'];
    $start_date = date('Y-m-d', strtotime($_POST['start-date']));
    $end_date = date('Y-m-d', strtotime($_POST['end-date']));
    $location = $_POST['location'];
    $position = $_POST['position'];
    $company_name = $_POST['company-name'];
    $today = new DateTime();
    if($start_date>$end_date && $start_date<$today||$start_date>$end_date ){
        $_SESSION['status'] = "invalid  dates";
            header('Location: ../newjob.php');
            die();
    }
    else{
    try {

        // Check if required fields are not empty
        if (empty($field) || empty($title) || empty($description) || empty($link) || empty($location) || empty($position) || empty($company_name)) {
            throw new Exception("All fields are required.");
        }

        // Prepare and execute the query
        $insert_to_job = "INSERT INTO jobs_part(title, description, field, website_link, location, start_date, end_date, position, company_name, create_datetime, id_establishement) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)";

        $stmt = mysqli_prepare($con, $insert_to_job);
        mysqli_stmt_bind_param($stmt, 'sssssssssi', $title, $description, $field, $link, $location, $start_date, $end_date, $position, $company_name, $user_id);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $_SESSION['status'] = "Post added successfully.";
            header('Location: ../newjob.php');
            exit();
        } else {
            $_SESSION['status'] = "Post couldn't be added.";
            header('Location: ../newjob.php');
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        // Handle any SQL exceptions
        $_SESSION['status'] = "An error occurred: " . $e->getMessage();
        header('Location: ../newjob.php');
        exit();
    } catch (Exception $e) {
        // Handle other exceptions
        $_SESSION['status'] = "An error occurred: " . $e->getMessage();
        header('Location: ../newjob.php');
        exit();
    } finally {
        mysqli_stmt_close($stmt);
    }
}
}
?>
