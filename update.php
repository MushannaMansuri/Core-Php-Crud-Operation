<?php
require "config.php";

$id = $_POST["id"];
$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$location = $_POST['location'];
$check = isset($_POST['checkbox']) ? implode('|', $_POST['checkbox']) : '';


if (!empty($check && $name && $gender && $location && $email)) {

    $updt = mysqli_query($conn, "UPDATE `users` SET `name`= '$name', `gender`= '$gender', `email`= '$email', `location`= '$location', `checkbox`= '$check'  WHERE `users`.`id` = $id") or die(mysqli_error($conn));
    if ($updt) {
        echo json_encode(['success' => true, 'message' => "Update Successfully"]);

    } else {
        echo json_encode(['success' => false, 'message' => "Sorry, Data could not be Update"]);

    }
} else {
    echo json_encode(['success' => false, 'message' => "Please Fill all Fields"]);
}

?>