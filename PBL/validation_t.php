<?php
session_start();
error_reporting(E_ALL);

$con = mysqli_connect('localhost', 'root', '', 'spt');
if (!$con) {
    die('Database connection failed: ' . mysqli_connect_error());
}

$t_email = $_POST['t_email'] ?? '';
$t_password = $_POST['t_password'] ?? '';

$stmt = mysqli_prepare($con, 'SELECT t_password FROM teacher_login WHERE t_email = ? LIMIT 1');
mysqli_stmt_bind_param($stmt, 's', $t_email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $storedPassword = $row['t_password'];
    if (password_verify($t_password, $storedPassword) || hash_equals($storedPassword, $t_password)) {
        $_SESSION['t_email'] = $t_email;
        header('location:teach_portal.php');
        exit;
    }
}

header('location:teach_login.php');
exit;
?>