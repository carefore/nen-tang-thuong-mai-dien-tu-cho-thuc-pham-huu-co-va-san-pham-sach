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

// Lấy danh sách sản phẩm từ cơ sở dữ liệu
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Hiển thị danh sách sản phẩm
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>" . $row["name"]. "</strong><br>" . $row["description"]. "<br>Giá: $" . $row["price"]. "</p>";
    }
} else {
    echo "Không có sản phẩm nào.";
}

// Đóng kết nối
$conn->close();
?>
