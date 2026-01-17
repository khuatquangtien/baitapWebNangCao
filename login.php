<?php 
session_start();
include 'db_connect.php'; 
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập hệ thống</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM students WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($pass, $user['password'])) {

            $_SESSION['user'] = $user['email'];
            $_SESSION['fullname'] = $user['fullname'];
      
            header('Location: dashboard.php');
            exit;
        } else {
            echo "<p style='color:red'>Sai email hoặc mật khẩu!</p>";
        }
    }
    ?>

    <form method="POST" action="">
        <input type="email" name="email" placeholder="Nhập Email" required><br><br>
        <input type="password" name="password" placeholder="Nhập Mật khẩu" required><br><br>
        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>