<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tìm kiếm (GET)</title>
</head>
<body>
    <h2>Tìm kiếm sản phẩm</h2>
    <form action="" method="GET">
        <input type="text" name="keyword" placeholder="Nhập từ khóa...">
        <button type="submit">Tìm kiếm</button>
    </form>

    <?php
    if (isset($_GET['keyword'])) {
        $kw = htmlspecialchars($_GET['keyword']);
        echo "<h3>Bạn đang tìm kiếm từ khóa: " . $kw . "</h3>";
    }
    ?>
</body>
</html>