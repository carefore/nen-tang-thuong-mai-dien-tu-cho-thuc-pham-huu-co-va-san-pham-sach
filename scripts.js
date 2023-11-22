function addProduct() {
    var productName = $("#productName").val();
    var productDescription = $("#productDescription").val();
    var productPrice = $("#productPrice").val();

    $.ajax({
        type: "POST",
        url: "save_product.php",
        data: {
            productName: productName,
            productDescription: productDescription,
            productPrice: productPrice
        },
        success: function(response) {
            // Hiển thị thông báo hoặc làm gì đó khi sản phẩm được thêm thành công
            alert("Sản phẩm đã được thêm thành công!");
            // Cập nhật danh sách sản phẩm
            loadProducts();
        }
    });
}

function loadProducts() {
    // Gọi ajax để lấy danh sách sản phẩm từ cơ sở dữ liệu và hiển thị ở #productList
    $.ajax({
        type: "GET",
        url: "get_products.php",
        success: function(response) {
            $("#productList").html(response);
        }
    });
}

// Tải danh sách sản phẩm khi trang web được tải
$(document).ready(function() {
    loadProducts();
});
