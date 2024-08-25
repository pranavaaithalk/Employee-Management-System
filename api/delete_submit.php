<?php
session_start();
require("../includes/database_connect.php");

$emp_id = $_POST['emp_id'];

$sql = "DELETE FROM employees WHERE emp_id='$emp_id'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    $response = array("success" => false, "message" => "Something went wrong!");
    echo json_encode($response);
    return;
}

$response = array("success" => true, "message" => "Employee Details Deleted!");
echo json_encode($response);
mysqli_close($conn);
