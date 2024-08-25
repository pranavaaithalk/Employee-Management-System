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
    <title>Dashboard | EMPLOYEE MANAGEMENT SYSTEM</title>

    <?php
    include "includes/head_links.php";
    ?>
    <link href="css/dashboard.css" rel="stylesheet" />
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
            <li class="breadcrumb-item active" aria-current="page">
                Dashboard
            </li>
        </ol>
    </nav>

    <div class="my-profile page-container">
        <h1>My Profile</h1>
        <div class="row">
            <div class="col-md-3 profile-img-container">
                    <img class="profile-img" src="img/pimg.png">
            </div>
            <div class="col-md-9">
                <div class="row no-gutters justify-content-between align-items-end">
                    <div class="profile">
                        <div class="name"><?= $user['full_name'] ?></div>
                        <div class="email">Email: <?= $user['email'] ?></div>
                        <div class="phone">Phone: <?= $user['phone'] ?></div>
                        <div class="company">Company: <?= $user['company_name'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <span class="row no-gutters justify-content-center">
                        <a id="ban_btn2" href="#" data-toggle="modal" data-target="#create-modal">
                            <i class="fas fa-sign-in-alt"></i>Create Record
                        </a>
                        <a id="ban_btn2" href="read_page.php">
                            <i class="fas fa-sign-in-alt"></i>Read Record
                        </a>
                        <a id="ban_btn2" href="#" data-toggle="modal" data-target="#update-modal">
                            <i class="fas fa-sign-in-alt"></i>Update Record
                        </a>
                        <a id="ban_btn2" href="#" data-toggle="modal" data-target="#delete-modal">
                            <i class="fas fa-sign-in-alt"></i>Delete Record
                        </a>
                </span>

    </div>
    <?php
    include "includes/create_modal.php";
    include "includes/update_modal.php";
    include "includes/delete_modal.php";
    include "includes/footer.php";
    ?>

    <script type="text/javascript" src="js/dashboard.js"></script>
</body>

</html>
