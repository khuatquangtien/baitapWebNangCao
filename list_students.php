<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <style>
        table { width: 80%; border-collapse: collapse; margin: 20px auto; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
        .center { text-align: center; }
    </style>
</head>
<body>
    <h2>Danh Sách Sinh Viên</h2>
    
    <?php
    $sql = "SELECT * FROM students";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ và Tên</th>
                <th>Mã SV</th>
                <th>Email</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $student): ?>
            <tr>
                <td><?= htmlspecialchars($student['id']); ?></td>
                <td><?= htmlspecialchars($student['fullname']); ?></td>
                <td><?= htmlspecialchars($student['student_code']); ?></td>
                <td><?= htmlspecialchars($student['email']); ?></td>
                <td>
                    <a href="#">Sửa</a> | 
                    <a href="#" onclick="return confirm('Bạn có chắc muốn xóa?');">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="center">
        <a href="add_student.php">Thêm sinh viên mới</a>
    </div>
</body>
</html>