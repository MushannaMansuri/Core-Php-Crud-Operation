<?php
require "config.php";
header('Content-type: application/json');

$id = $_GET["id"];

$dlt = mysqli_query($conn, "DELETE FROM users WHERE `id`= '$id'") or die(mysqli_error($conn));
if ($dlt) {

    echo json_encode(['success' => true, 'message' => "Record Deleted Successfully"]);
} else {
    echo "Error";
}

?>