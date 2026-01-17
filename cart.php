<?php
session_start();

$products = [
    1 => ["name" => "iPhone 15", "price" => 2000],
    2 => ["name" => "Samsung S24", "price" => 1800],
    3 => ["name" => "Laptop Dell", "price" => 1500]
];

if (isset($_POST['add_to_cart'])) {
    $id = $_POST['product_id'];
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    $_SESSION['cart'][] = $id;
}

if (isset($_GET['action']) && $_GET['action'] == 'clear') {
    unset($_SESSION['cart']);
    header('Location: cart.php');
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Giỏ hàng Session</title>
    <style>
        .product { border: 1px solid #ddd; padding: 10px; margin: 5px; display: inline-block; }
    </style>
</head>
<body>
    <h2>Danh sách sản phẩm</h2>
    <?php foreach ($products as $id => $pro): ?>
        <div class="product">
            <h3><?= $pro['name'] ?></h3>
            <p>Giá: $<?= $pro['price'] ?></p>
            <form method="POST">
                <input type="hidden" name="product_id" value="<?= $id ?>">
                <button type="submit" name="add_to_cart">Thêm vào giỏ</button>
            </form>
        </div>
    <?php endforeach; ?>

    <hr>

    <h2>Giỏ hàng của bạn</h2>
    <ul>
        <?php 
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            foreach ($_SESSION['cart'] as $item_id) {
                // Hiển thị tên sản phẩm dựa trên ID đã lưu
                echo "<li>" . $products[$item_id]['name'] . "</li>";
            }
        } else {
            echo "<p>Giỏ hàng đang trống</p>";
        }
        ?>
    </ul>
    
    <a href="cart.php?action=clear" style="color:red">Xóa sạch giỏ hàng</a>
</body>
</html>