<?php 
 require 'config.php';

// ... (your database connection code)

// Assuming you have a query to fetch data from the database
$query = "SELECT * FROM users";
$result = $conn->query($query);

if ($result) {
    $data = array();

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    $response = array('success' => true, 'data' => $data);
    echo json_encode($response);
} else {
    $response = array('success' => false, 'message' => 'Error in query');
    echo json_encode($response);
}

// ... (close your database connection)

?>