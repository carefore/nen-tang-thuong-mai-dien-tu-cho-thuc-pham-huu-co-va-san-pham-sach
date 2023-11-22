<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "organic_store";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy thông tin từ form
$productName = $_POST['productName'];
$productDescription = $_POST['productDescription'];
$productPrice = $_POST['productPrice'];

// Thực hiện truy vấn để thêm sản phẩm vào cơ sở dữ liệu
$sql = "INSERT INTO products (name, description, price) VALUES ('$productName', '$productDescription', $productPrice)";

if ($conn->query($sql) === TRUE) {
    echo "Thêm sản phẩm thành công!";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
