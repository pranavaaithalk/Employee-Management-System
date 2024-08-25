<?php
session_start();
require("../includes/database_connect.php");

$email = $_POST['email'];
$emp_id = $_POST['emp_id'];
$dept = $_POST['dept'];

$sql = "UPDATE employees SET email='$email',dept='$dept' WHERE emp_id='$emp_id'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    $response = array("success" => false, "message" => "Something went wrong!");
    echo json_encode($response);
    return;
}

$response = array("success" => true, "message" => "Record Creation Successful!");
echo json_encode($response);
mysqli_close($conn);
