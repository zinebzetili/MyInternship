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
    $type = $_POST['type'];
    $today = new DateTime();
    if($start_date>$end_date && $start_date<$today||$start_date>$end_date ){
        $_SESSION['status'] = "the start date cannot be before end date";
            header('Location: ../newscholorship.php');
            die();
    }
    else{
    try {
        // Prepare and execute the query
        if (empty($field) || empty($title) || empty($description) || empty($link) || empty($location) || empty($type)) {
            throw new Exception("All fields are required.");
        }
        $insert_to_scholarship = "INSERT INTO scholarships(title, description, field, website_link, location, start_date, end_date, type, create_datetime, id_establishement)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)";

        $stmt = mysqli_prepare($con, $insert_to_scholarship);
        mysqli_stmt_bind_param($stmt, 'ssssssssi', $title, $description, $field, $link, $location, $start_date, $end_date, $type, $user_id);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $_SESSION['status'] = "Post added.";
            header('Location: ../newscholorship.php');
            exit();
        } else {
            $_SESSION['status'] = "Post couldn't be added.";
            header('Location: ../newscholorship.php');
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        // Handle any SQL exceptions
        $_SESSION['status'] = "An error occurred: " . $e->getMessage();
        header('Location: ../newscholorship.php');
        exit();
    } catch (Exception $e) {
        // Handle other exceptions
        $_SESSION['status'] = "An error occurred: " . $e->getMessage();
        header('Location: ../newscholorship.php');
        exit();
    } finally {
        mysqli_stmt_close($stmt);
    }
}
}
?>
