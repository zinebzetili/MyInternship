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
    $name = $_POST['name'];
    $description = $_POST['description'];
    $link = $_POST['link'];
    $talk_date = date('Y-m-d', strtotime($_POST['talk-date']));
    $location = $_POST['location'];
    $today = new DateTime();
    if ($talk_date < $today) {
        $_SESSION['status'] = "talk date should be in the upcoming days,expired date";
            header('Location: ../newtalks.php');
            die();
    }
    else {
    try {
        // Prepare and execute the query
        if (empty($field) || empty($name) || empty($description) || empty($link) || empty($location)) {
            throw new Exception("All fields are required.");
        }
        $insert_to_talk = "INSERT INTO talks(name, description, field, website_link, location, create_datetime, id_establishement, talk_date)
        VALUES (?, ?, ?, ?, ?, NOW(), ?, ?)";

        $stmt = mysqli_prepare($con, $insert_to_talk);
        mysqli_stmt_bind_param($stmt, 'sssssis', $name, $description, $field, $link, $location, $user_id, $talk_date);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $_SESSION['status'] = "Post added.";
            header('Location: ../newtalks.php');
            exit();
        } else {
            $_SESSION['status'] = "Post couldn't be added.";
            header('Location: ../newtalks.php');
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        // Handle any SQL exceptions
        $_SESSION['status'] = "An error occurred: " . $e->getMessage();
        header('Location: ../newtalks.php');
        exit();
    } catch (Exception $e) {
        // Handle other exceptions
        $_SESSION['status'] = "An error occurred: " . $e->getMessage();
        header('Location: ../newtalks.php');
        exit();
    } finally {
        mysqli_stmt_close($stmt);
    }
}
}
?>
