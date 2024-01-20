<div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Có thể bạn sẽ thích</span></h2>
        <div class="row px-xl-5">
            <div class="col">
            <?php
                // Lấy id_dm của sản phẩm đang xem từ URL hoặc một nguồn dữ liệu khác
                if (isset($_GET['id_dm'])) {
                    $id_dm = $_GET['id_dm'];

                    // Kết nối cơ sở dữ liệu bằng MySQLi
                    $mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

                    // Kiểm tra kết nối
                    if ($mysqli->connect_error) {
                        die("Kết nối thất bại: " . $mysqli->connect_error);
                    }

                    // Lấy thông tin sản phẩm đang xem
                    $id_sp_dang_xem = isset($_GET['id_sp']) ? $_GET['id_sp'] : 0; // ID của sản phẩm đang xem

                    // Lấy id_dm của sản phẩm đang xem
                    $sqlGetIdDm = "SELECT id_dm FROM sanpham WHERE id_sp = $id_sp_dang_xem";
                    $resultIdDm = $mysqli->query($sqlGetIdDm);

                    if ($resultIdDm->num_rows > 0) {
                        $rowIdDm = $resultIdDm->fetch_assoc();
                        $id_dm_dang_xem = $rowIdDm['id_dm'];

                        // Truy vấn SQL để lấy các sản phẩm có cùng id_dm (ngoại trừ sản phẩm đang xem)
                        $sqlSimilarProducts = "SELECT * FROM sanpham WHERE id_dm = $id_dm AND id_sp != $id_sp_dang_xem ORDER BY id_sp DESC";
                        $resultSimilarProducts = $mysqli->query($sqlSimilarProducts);

                        // Hiển thị sản phẩm tương tự
                        while ($rowSimilar = $resultSimilarProducts->fetch_assoc()) {
                            // Hiển thị sản phẩm tương tự
                ?>
                <div class="owl-carousel related-carousel">
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="quantri/anh/<?php echo $rowSimilar['anh_sp'] ?>" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href="chucnang/giohang/themhang.php?id_sp=<?php echo $rowSimilar['id_sp'] ?>"><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href=""><?php echo $rowSimilar['ten_sp'] ?></a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5><?php echo $rowSimilar['gia_sp'] ?></h5><h6 class="text-muted ml-2"><del><?php echo $rowSimilar['khuyen_mai'] ?></del></h6>
                            </div>
                            
                        </div>
                    </div>
            </div>
            <?php
                            }
                        } else {
                            echo "Không tìm thấy id_dm cho sản phẩm đang xem.";
                        }

                        // Đóng kết nối MySQLi
                        $mysqli->close();
                    }
                    ?>
        </div>
    </div>