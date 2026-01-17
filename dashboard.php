<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Trang quản trị</title>
</head>
<body>
    <h1>Chào mừng, <?= htmlspecialchars($_SESSION['fullname']); ?>!</h1>
    <p>Email của bạn: <?= $_SESSION['user']; ?></p>
    
    <p>Đây là nội dung mật chỉ dành cho thành viên.</p>
    
    <a href="logout.php">Đăng xuất</a>
</body>
</html>