<?php
session_start();
error_reporting(E_ALL);

$con = mysqli_connect('localhost', 'root', '', 'spt');
if (!$con) {
    die('Database connection failed: ' . mysqli_connect_error());
}

$t_name = $_POST['t_name'] ?? '';
$sub_id = $_POST['sub_id'] ?? '';
$sub_name = $_POST['sub_name'] ?? '';
$t_phno = $_POST['t_phno'] ?? '';
$t_email = $_POST['t_email'] ?? '';
$t_password = $_POST['t_password'] ?? '';

$check = mysqli_prepare($con, 'SELECT t_email FROM teacher_login WHERE t_email = ? LIMIT 1');
mysqli_stmt_bind_param($check, 's', $t_email);
mysqli_stmt_execute($check);
mysqli_stmt_store_result($check);

if (mysqli_stmt_num_rows($check) > 0) {
    header('location:teach_login.php');
    exit;
}

$hashedPassword = password_hash($t_password, PASSWORD_DEFAULT);
$insert = mysqli_prepare($con, 'INSERT INTO teacher_login (t_name, sub_id, sub_name, t_phno, t_email, t_password) VALUES (?, ?, ?, ?, ?, ?)');
mysqli_stmt_bind_param($insert, 'sssiss', $t_name, $sub_id, $sub_name, $t_phno, $t_email, $hashedPassword);
mysqli_stmt_execute($insert);

header('location:teach_login.php');
exit;
?>