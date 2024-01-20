
<body>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Chi tiết</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
    <?php
        $id_sp = $_GET['id_sp'];
        // Kết nối cơ sở dữ liệu bằng MySQLi
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM sanpham INNER JOIN dmsanpham ON sanpham.id_dm = dmsanpham.id_dm INNER JOIN tacgia ON sanpham.id_tg = tacgia.id_tg WHERE id_sp = $id_sp";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
        ?>
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="quantri/anh/<?php echo $row['anh_sp'] ?>" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="quantri/anh/<?php echo $row['anh_sp_min_1'] ?>" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="quantri/anh/<?php echo $row['anh_sp_min_2'] ?>" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3><?php echo $row['ten_sp'] ?></h3>
                   
                    <h3 style="color:red;" class="font-weight-semi-bold mb-4"><?php echo $row['gia_sp'] ?> đ</h3>
                    <p class="mb-4"><?php echo $row['chi_tiet_sp'] ?></p>
                    <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">Tác giả:</strong>
                        <form>
                            <div class="custom-control custom-radio custom-control-inline">
                                <label class="custom-control-label" for="size-1"><?php echo $row['nha_xuat_ban'] ?></label>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex mb-4">
                        <strong class="text-dark mr-3">Giá thị trường:</strong>
                        <form>
                            <div class="custom-control custom-radio custom-control-inline">
                                <label class="custom-control-label" for="color-1"><?php echo $row['khuyen_mai'] ?> đ</label>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex mb-4">
                        <strong class="text-dark mr-3">Tình trạng:</strong>
                        <form>
                            <div class="custom-control custom-radio custom-control-inline">
                                <label style="color: #111; font-weight: 600;" class="custom-control-label" for="color-1"><?php echo $row['tinh_trang'] ?></label>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex mb-4">
                        <strong class="text-dark mr-3">Tags:</strong>
                        <form>
                            <div class="custom-control custom-radio custom-control-inline">
                                <label class="custom-control-label" for="color-1"><?php echo $row['ten_dm'] ?></label>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <a href="chucnang/giohang/themhang.php?id_sp=<?php echo $row['id_sp'] ?>"><button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>Thêm vào giỏ</button></a>
                    </div>
                    <div class="d-flex mb-4">
                        <strong class="text-dark mr-3">Gọi đặt hàng:</strong>
                        <form>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="color-1" name="color">
                                <label class="custom-control-label" for="color-1">(028) 3820 7153 hoặc 0933 109 009</label>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Chia sẻ:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Thông tin</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Đánh giá (0)</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3"><?php echo $row['ten_sp'] ?></h4>
                            <p><?php echo $row['chi_tiet_sp'] ?></p>
                            <p>Mua sách online tại <b>SachHay.vn</b> và nhận nhiều ưu đãi.</p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Thông tin chi tiết</h4>
                            <p><?php echo $row['chi_tiet_sp'] ?></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Nhà xuất bản: <?php echo $row['ten_tg'] ?>
                                        </li>
                                        <li class="list-group-item px-0">
                                            Ngày xuất bản: <?php echo $row['ngay_xuat_ban'] ?>
                                        </li>
                                        <li class="list-group-item px-0">
                                            Nhà phát hành: <?php echo $row['cty_phat_hanh'] ?>
                                        </li>
                                        <li class="list-group-item px-0">
                                            Số trang: <?php echo $row['so_trang'] ?>
                                        </li>
                                      </ul> 
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Được mở hộp kiểm tra khi nhận hàng.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Được hoàn tiền 111% nếu là hàng giả.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Đổi trả miễn phí tại nhà trong 30 ngày nếu sản phẩm lỗi.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Cam kết hàng chính hãng
                                        </li>
                                      </ul> 
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="comment-list">
                                    <?php
                                        $sql = "SELECT * FROM blsanpham WHERE id_sp = $id_sp";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()){
                                    ?>
                                    <h4 class="mb-4">1 review for "Product Name"</h4>
                                    <div class="media mb-4">
                                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6><?php echo $row['ten'] ?><small> - <i><?php $oriDate = $row['ngay_gio'];$newDate = date('d-m-Y H:i:s',strtotime($oriDate));echo $newDate;?></i></small></h6>
                                            <div class="text-primary mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <p><?php echo $row['binh_luan']; ?></p>
                                        </div>
                                    </div>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4">Để lại đánh giá</h4>
                                    <small>Địa chỉ email của bạn sẽ không được công bố. Các trường bắt buộc được đánh dấu *</small>
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Đánh giá của bạn * :</p>
                                        <div class="text-primary">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label for="message">Đánh giá *</label>
                                            <textarea required name="binh_luan" id="message" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Họ và tên *</label>
                                            <input required name="ten" type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label required for="name">Số điện thoại *</label>
                                            <input name="dien_thoai" type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Gửi" name="submit" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                    <?php
                                        if(isset($_POST['submit'])){
                                            $ten = $_POST['ten'];
                                            $dien_thoai = $_POST['dien_thoai'];
                                            $binh_luan = $_POST['binh_luan'];
                                            date_default_timezone_set('Asia/SaiGon');
                                            $ngay_gio = date('Y-m-d H:i:s');
                                            $sql = "INSERT INTO blsanpham (id_sp,ten,dien_thoai,binh_luan,ngay_gio) VALUES ($id_sp,'$ten','$dien_thoai','$binh_luan','$ngay_gio')";
                                            $result = $conn->query($sql);
                                            if ($result) {
                                                echo "Bình luận đã được thêm thành công.";
                                            } else {
                                                echo "Lỗi: " . $sql . "<br>" . $conn->error;
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <?php
        include_once('chucnang/sanpham/sanphamlq.php');
    ?>
    <!-- Products End -->
</body>

</html>