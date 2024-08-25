<?php
session_start();
require "includes/database_connect.php";

if (!isset($_SESSION["user_id"])) {
    header("location: index.php");
    die();
}
$user_id = $_SESSION['user_id'];

$sql_1 = "SELECT * FROM users WHERE id = $user_id";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    echo "Something went wrong!";
    return;
}
$user = mysqli_fetch_assoc($result_1);
if (!$user) {
    echo "Something went wrong!";
    return;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Details | EMPLOYEE MANAGEMENT SYSTEM</title>

    <?php
    include "includes/head_links.php";
    ?>
    <link href="css/dashboard.css" rel="stylesheet" />
    <style>
        #tb {
            font-size: 20px;
            width: 100%;
            border-collapse: collapse;
        }
        #tb th, #tb td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        #tb th {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <?php
    include "includes/header.php";
    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb py-2">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="Dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Details
            </li>
        </ol>
    </nav>

    

    <div><h2>Employee Details:</h2></div>
    <div class="row no-gutters justify-content-center">
        <?php 
        $sql = "SELECT * FROM employees";
        $result = mysqli_query($conn,$sql);

        if (!$result) {
            echo "Something went wrong!";
            return;
        }
        ?>
        <table id="tb" border='3'>
        <?php
        echo "<tr>";
        while ($field = mysqli_fetch_field($result)) {
            echo "<th>" . $field->name . "</th>";
        }
        echo "</tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        ?>
        </table>
    </div>
    <?php
    include "includes/footer.php";
    ?>
</body>
</html>
