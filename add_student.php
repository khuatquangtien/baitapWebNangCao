<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên</title>
</head>
<body>
    <h2>Thêm mới Sinh Viên</h2>
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fullname = $_POST['fullname'];
        $code = $_POST['student_code'];
        $email = $_POST['email'];

        $sql = "INSERT INTO students (fullname, student_code, email) VALUES (?, ?, ?)";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([$fullname, $code, $email]);
            echo "<p style='color:green'>Thêm sinh viên <strong>$fullname</strong> thành công!</p>";
        } catch (PDOException $e) {
            echo "<p style='color:red'>Lỗi thêm mới (Có thể trùng mã SV): " . $e->getMessage() . "</p>";
        }
    }
    ?>

    <form method="POST" action="">
        <p>Họ và tên: <input type="text" name="fullname" required></p>
        <p>Mã SV: <input type="text" name="student_code" required></p>
        <p>Email: <input type="email" name="email" required></p>
        <button type="submit">Thêm mới</button>
    </form>
    
    <br>
    <a href="list_students.php">Xem danh sách</a>
</body>
</html>