<div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Thể loại</span></h2>
        <div class="row px-xl-5 pb-3">
        <?php
        // Kết nối cơ sở dữ liệu bằng MySQLi
        $mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        // Kiểm tra kết nối
        if ($mysqli->connect_error) {
            die("Kết nối thất bại: " . $mysqli->connect_error);
        }
        $sql = "SELECT * FROM dmsanpham ORDER BY id_dm limit 12";
        $result = $mysqli->query($sql);
        // $sql = "SELECT * FROM sanpham ORDER BY id_sp DESC LIMIT 6";
        // $result = $mysqli->query($sql);

        while ($row = $result->fetch_assoc()) {
        ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="index.php?page_layout=danhsachsp&id_dm=<?php echo $row['id_dm'] ?>&ten_dm=<?php echo $row['ten_dm'] ?>">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="quantri/anh/<?php echo $row['anh_dm'] ?>" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6><?php echo $row['ten_dm'] ?></h6>
                            <small class="text-body"><?php echo $row['tinh_trang'] ?></small>
                        </div>
                    </div>
                </a>
            </div>
            <?php
                }
                // Đóng kết nối MySQLi
                $mysqli->close();
            ?>
        </div>
    </div>