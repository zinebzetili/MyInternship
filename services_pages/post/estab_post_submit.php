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
    $salary = $_POST['salary'];
    $today = new DateTime();
    if($start_date>$end_date && $start_date<$today||$start_date>$end_date ){
        $_SESSION['status'] = "invalid  dates";
            header('Location: ../newinternship.php');
            die();
    }
    else{
    try {
        // Check if required fields are not empty
        if (empty($field) || empty($title) || empty($description) || empty($link) || empty($location) || empty($salary)) {
            throw new Exception("All fields are required.");
        }

        // Prepare and execute the query
        $insert_to_internship = "INSERT INTO internship(title, description, field, website_link, location, start_date, end_date, salary, create_datetime, id_establishement) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)";

        $stmt = mysqli_prepare($con, $insert_to_internship);
        mysqli_stmt_bind_param($stmt, 'ssssssssi', $title, $description, $field, $link, $location, $start_date, $end_date, $salary, $user_id);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $_SESSION['status'] = "Post added successfully.";
            header("Location:../newinternship.php");
            exit();
        } else {
            $_SESSION['status'] = "Post couldn't be added.";
            header('Location: ../newinternship.php');
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        // Handle any SQL exceptions
        $_SESSION['status'] = "An error occurred: " . $e->getMessage();
        header('Location: ../newinternship.php');
        exit();
    } catch (Exception $e) {
        // Handle other exceptions
        $_SESSION['status'] = "An error occurred: " . $e->getMessage();
        header('Location: ../newinternship.php');
        exit();
    } finally {
        mysqli_stmt_close($stmt);
    }
}
}
?>
