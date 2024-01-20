<style>
      #bg-light {
        max-height: 500px;   /* Giới hạn chiều rộng tối đa là 400px */
        overflow-x: auto;
        /* white-space: nowrap;   */
      }
</style>
<body>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Lọc theo giá</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="">
                            <div class="bl-input">
                                <input type="text" placeholder="0" disabled>
                                <input type="text" id="price-value" readonly>
                            </div>
                            <input type="range" id="price-range" min="0" max="1000000">
                        </div>
                    </form>
                </div>
                <!-- Price End -->
                
                <!-- Color Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thể loại</span></h5>
                <div id="bg-light" class="bg-light p-4 mb-30">
                    <form>
                        <?php
                            // Kết nối cơ sở dữ liệu bằng MySQLi
                            $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

                            // Kiểm tra kết nối
                            if ($conn->connect_error) {
                                die("Kết nối thất bại: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM dmsanpham";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <a style="color: black;" href="index.php?page_layout=danhsachsp&id_dm=<?php echo $row['id_dm'] ?>&ten_dm=<?php echo $row['ten_dm'] ?>" class="nav-item nav-link"> <?php echo $row['ten_dm'] ?></a>
                        <?php
                            }

                            // Đóng kết nối
                            $conn->close();
                        ?>
                    </form>
                </div>
                <!-- Color End -->

                <!-- Size Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Nhà xuất bản</span></h5>
                <div id="bg-light" class="bg-light p-4 mb-30">
                    <form>
                    <?php
                            // Kết nối cơ sở dữ liệu bằng MySQLi
                            $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

                            // Kiểm tra kết nối
                            if ($conn->connect_error) {
                                die("Kết nối thất bại: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM tacgia";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <a style="color: black;" href="index.php?page_layout=danhsachsp&id_tg=<?php echo $row['id_tg'] ?>&ten_tg=<?php echo $row['ten_tg'] ?>" class="nav-item nav-link"> <?php echo $row['ten_tg'] ?></a>
                        <?php
                            }

                            // Đóng kết nối
                            $conn->close();
                        ?>
                    </form>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Popularity</a>
                                        <a class="dropdown-item" href="#">Best Rating</a>
                                    </div>
                                </div>
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">10</a>
                                        <a class="dropdown-item" href="#">20</a>
                                        <a class="dropdown-item" href="#">30</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    // Kết nối cơ sở dữ liệu bằng MySQLi
                    $mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

                    // Kiểm tra kết nối
                    if ($mysqli->connect_error) {
                        die("Kết nối thất bại: " . $mysqli->connect_error);
                    }
                    $sql = "SELECT * FROM sanpham ORDER BY id_sp DESC";
                    $result = $mysqli->query($sql);
                    // $sql = "SELECT * FROM sanpham ORDER BY id_sp DESC LIMIT 6";
                    // $result = $mysqli->query($sql);

                    while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1 product" data-price="<?php echo $row['gia_sp'] ?>">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="quantri/anh/<?php echo $row['anh_sp'] ?>" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href=""><?php echo $row['ten_sp'] ?></a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5><?php echo $row['gia_sp'] ?> đ</h5><h6 class="text-muted ml-2"><del><?php echo $row['khuyen_mai'] ?> đ</del></h6>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                            // Đóng kết nối MySQLi
                            $mysqli->close();
                        ?>
                    <div class="col-12">
                        <nav>
                            <ul class="pagination justify-content-center">
                                <?php
                                // Số sản phẩm hiển thị trên mỗi trang
                                $soSanPhamTrenTrang = 9;

                                // Trang hiện tại, mặc định là trang 1
                                $trangHienTai = isset($_GET['trang']) ? $_GET['trang'] : 1;

                                // Kết nối CSDL và thực hiện truy vấn để tính tổng số sản phẩm
                                $mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

                                if ($mysqli->connect_error) {
                                    die("Kết nối thất bại: " . $mysqli->connect_error);
                                }

                                $sql = "SELECT COUNT(id_sp) as total FROM sanpham";
                                $result = $mysqli->query($sql);
                                $row = $result->fetch_assoc();
                                $tongSoSanPham = $row['total'];
                                $tongSoTrang = ceil($tongSoSanPham / $soSanPhamTrenTrang);

                                // Hiển thị nút Previous
                                if ($trangHienTai > 1) {
                                    echo '<li class="page-item"><a class="page-link" href="?trang=' . ($trangHienTai - 1) . '"><</a></li>';
                                } else {
                                    echo '<li class="page-item disabled"><span class="page-link"><</span></li>';
                                }

                                // Hiển thị các nút trang
                                for ($i = 1; $i <= $tongSoTrang; $i++) {
                                    if ($i == $trangHienTai) {
                                        echo '<li class="page-item active"><a class="page-link" href="?trang=' . $i . '">' . $i . '</a></li>';
                                    } else {
                                        echo '<li class="page-item"><a class="page-link" href="?trang=' . $i . '">' . $i . '</a></li>';
                                    }
                                }

                                // Hiển thị nút Next
                                if ($trangHienTai < $tongSoTrang) {
                                    echo '<li class="page-item"><a class="page-link" href="?trang=' . ($trangHienTai + 1) . '">></a></li>';
                                } else {
                                    echo '<li class="page-item disabled"><span class="page-link">></span></li>';
                                }

                                $mysqli->close();
                                ?>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
    <!-- Thêm vào phần cuối trang hoặc trước thẻ đóng </body> -->
    <script>
        const priceRangeInput = document.getElementById("price-range");
        const priceValueInput = document.getElementById("price-value");
        const productList2 = document.querySelectorAll(".product");

        priceRangeInput.addEventListener("input", function () {
            const price = parseFloat(priceRangeInput.value);

            priceValueInput.value = price.toLocaleString() + " VNĐ";

            productList2.forEach(function (product) {
                const productPrice = parseFloat(product.dataset.price);

                if (productPrice > price) {
                    product.style.display = "none";
                } else {
                    product.style.display = "block";
                }
            });
        });
    </script>

</body>