<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký (POST)</title>
</head>
<body>
    <h2>Form Đăng Ký</h2>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Tên đăng nhập" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <button type="submit">Đăng ký</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = htmlspecialchars($_POST['username']);
        echo "<h3>Đã nhận thông tin của tài khoản: " . $user . "</h3>";
    }
    ?>
</body>
</html>