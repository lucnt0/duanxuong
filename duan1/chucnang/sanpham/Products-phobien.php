<div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sản phẩm nổi bật</span></h2>
        <div class="row px-xl-5">

        <?php
        // Kết nối đến cơ sở dữ liệu bằng MySQLi
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM sanpham WHERE dac_biet = 1 ORDER BY id_sp DESC limit 8";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div  class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="quantri/anh/<?php echo $row['anh_sp'] ?>" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-squarechucnang/giohang/themhang.php?id_sp=<?php echo $row['id_sp'] ?>" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div style="overflow: hidden; margin: 0 20px; text-overflow: ellipsis;" class="text-center py-4">
                        <a  class="h6 text-decoration-none text-truncate" href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>" ><?php echo $row['ten_sp'] ?></a></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?php echo $row['gia_sp'] ?> đ</h5><h6 class="text-muted ml-2"><del><?php echo $row['khuyen_mai']; ?> đ</del></h6>
                        </div>
                       
                    </div>
                </div>
            </div>
            <?php
            }
        } else {
            echo "Không tìm thấy sản phẩm đặc biệt.";
        }

        // Đóng kết nối
        $conn->close();
    ?>
        <div class="clear"></div>
    </div>
        </div>
    </div>