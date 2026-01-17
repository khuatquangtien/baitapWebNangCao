<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Đăng ký thành viên</title>
</head>
<body>
    <h2>Đăng ký tài khoản</h2>
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $code = $_POST['student_code'];

        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO students (fullname, student_code, email, password) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$fullname, $code, $email, $pass_hash]);
            echo "<p style='color:green'>Đăng ký thành công! <a href='login.php'>Đăng nhập ngay</a></p>";
        } catch (PDOException $e) {
            echo "<p style='color:red'>Lỗi: " . $e->getMessage() . "</p>";
        }
    }
    ?>

    <form method="POST" action="">
        <input type="text" name="fullname" placeholder="Họ tên" required><br><br>
        <input type="text" name="student_code" placeholder="Mã SV" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Mật khẩu" required><br><br>
        <button type="submit">Đăng ký</button>
    </form>
</body>
</html>