<?php
session_start();
require("../includes/database_connect.php");

$email = $_POST['email'];
$full_name = $_POST['full_name'];
$emp_id = $_POST['emp_id'];
$dept = $_POST['dept'];

$sql = "SELECT * FROM employees WHERE emp_id='$emp_id'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    $response = array("success" => false, "message" => "Something went wrong!");
    echo json_encode($response);
    return;
}

$row_count = mysqli_num_rows($result);
if ($row_count > 0) {
    $response = array("success" => false, "message" => "Record Creation failed! Employee Details Already Exists.");
    echo json_encode($response);
    return;
}
$sq2 = "INSERT INTO employees (full_name, email, emp_id, dept) VALUES('$full_name','$email','$emp_id','$dept')";

$result = mysqli_query($conn, $sq2);

if (!$result) {
    $response = array("success" => false, "message" => "Something went wrong!");
    echo json_encode($response);
    return;
}

$response = array("success" => true, "message" => "Record Creation Successful!");
echo json_encode($response);
mysqli_close($conn);

