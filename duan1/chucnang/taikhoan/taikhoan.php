<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Người Dùng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        section {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        #user-info {
            width: 45%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        #user-actions {
            width: 45%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        h2 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        button {
            padding: 10px;
            margin-top: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        #cart-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        #cart-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        #close-cart {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Trang Người Dùng</h1>
    </header>
    <section>
        <div id="user-info">
            <h2>Thông Tin Người Dùng</h2>
            <p><strong>Tên:</strong> John Doe</p>
            <p><strong>Email:</strong> john.doe@example.com</p>
            <p><strong>Số Điện Thoại:</strong> 0123456789</p>
            <p><strong>Ngày Sinh:</strong> 01/01/1990</p>
            <p><strong>Giới Tính:</strong> Nam</p>
        </div>
        <div id="user-actions">
            <h2>Chức Năng</h2>
            <button onclick="openCart()">Xem Giỏ Hàng</button>
            <button ><a href="confirm_purchase.php"><b>xem đơn hàng</b></a></button>
            <button onclick="editProfile()">Chỉnh Sửa Thông Tin</button>
        </div>
    </section>

    <!-- Giỏ Hàng Modal -->
    <div id="cart-modal">
        <div id="cart-content">
            <span id="close-cart" onclick="closeCart()">&times;</span>
            <h2>Giỏ Hàng</h2>
            <!-- Nội dung giỏ hàng -->
            <p>Sản phẩm 1 - $10</p>
            <p>Sản phẩm 2 - $20</p>
            <!-- Nút để đóng modal -->
            <button onclick="closeCart()">Đóng</button>
        </div>
    </div>

    <script>
        function openCart() {
            document.getElementById('cart-modal').style.display = 'flex';
        }

        function closeCart() {
            document.getElementById('cart-modal').style.display = 'none';
        }

        // function viewOrders() {
        //     // Thực hiện chức năng xem đơn hàng
        //     alert('Chức năng đang được phát triển');
        // }

        function editProfile() {
            // Thực hiện chức năng chỉnh sửa thông tin
            alert('Chức năng đang được phát triển');
        }
    </script>
</body>
</html>
