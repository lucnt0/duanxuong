<div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <?php
        // include_once('ketnoi.php');
        include_once('cauhinh/ketnoi.php'); // Đảm bảo rằng bạn đã bao gồm tệp kết nối
        if(isset($_POST['stext'])){
            $stext = $_POST['stext'];
        }else{
            $stext = '';
        }
        $newStext = str_replace(' ', '%', $stext);

        // Sử dụng MySQLi thay vì MySQL
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM sanpham WHERE ten_sp LIKE '%$newStext%'";
        $query = $conn->query($sql);

        // Kiểm tra kết quả truy vấn
        if (!$query) {
            die("Lỗi truy vấn: " . $conn->error);
        }
    ?>
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">kết quả tìm được với từ khóa <span class="skeyword">" <?php echo $stext ?> " </span></span></h2>
        <?php
            $i=0;
            while($row = $query->fetch_assoc()){
        ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="quantri/anh/<?php echo $row['anh_sp'] ?>" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="chucnang/giohang/themhang.php?id_sp=<?php echo $rowSimilar['id_sp'] ?>"><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    </a>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><?php echo $row['ten_sp'] ?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?php echo $row['gia_sp'] ?> đ</h5><h6 cla
                            ss="text-muted ml-2"><del><?php echo $row['khuyen_mai'] ?> đ</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
            </div>
                <?php
            }
        ?>
    </div>