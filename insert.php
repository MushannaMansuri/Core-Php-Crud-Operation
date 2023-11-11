<?php
require "config.php";

$name = $_POST["name"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$location = $_POST["location"];
$check = (isset($_POST['checkbox']) ? implode('|', $_POST['checkbox']) : '');

// $filename = $_FILES["file"]["name"];
// $tempname = $_FILES["file"]["tmp_name"];
// $folder = "upload/" . $filename;

if (!empty($check && $name && $gender && $location && $email)) {

    // if (move_uploaded_file($tempname, $folder)) {
    $ins = mysqli_query($conn, "INSERT INTO users(`name`, `gender`, `email`, `location`,`checkbox`) VALUES('$name', '$gender', '$email', '$location','$check')") or die(mysqli_error($conn));
    if ($ins) {
        echo json_encode(['success' => true, 'message' => "Insert Successfully"]);

    } else {
        echo json_encode(['success' => false, 'message' => "Sorry, Data could not be inserted"]);

    }
}
// } 
else {
    echo json_encode(['success' => false, 'message' => "Please Fill all Fields"]);
}

?>