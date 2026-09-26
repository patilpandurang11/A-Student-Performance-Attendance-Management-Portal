<?php
session_start();
error_reporting(E_ALL);

$con = mysqli_connect('localhost', 'root', '', 'spt');
if (!$con) {
    die('Database connection failed: ' . mysqli_connect_error());
}

$admin_email = $_POST['admin_email'] ?? '';
$admin_password = $_POST['admin_password'] ?? '';

$stmt = mysqli_prepare($con, 'SELECT admin_password FROM admin_login WHERE admin_email = ? LIMIT 1');
mysqli_stmt_bind_param($stmt, 's', $admin_email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $storedPassword = $row['admin_password'];
    if (password_verify($admin_password, $storedPassword) || hash_equals($storedPassword, $admin_password)) {
        $_SESSION['admin_email'] = $admin_email;
        header('location:admin_portal.php');
        exit;
    }
}

header('location:admin_login.php');
exit;
?>