-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 02:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ban_sach`
--

-- --------------------------------------------------------

--
-- Table structure for table `blsanpham`
--

CREATE TABLE `blsanpham` (
  `id_bl` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `dien_thoai` varchar(255) NOT NULL,
  `binh_luan` text NOT NULL,
  `ngay_gio` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dmsanpham`
--

CREATE TABLE `dmsanpham` (
  `id_dm` int(10) NOT NULL,
  `ten_dm` varchar(255) NOT NULL,
  `anh_dm` varchar(255) NOT NULL,
  `tinh_trang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dmsanpham`
--

INSERT INTO `dmsanpham` (`id_dm`, `ten_dm`, `anh_dm`, `tinh_trang`) VALUES
(1, 'Truyện tranh', '6551b1a3c4999_bo-truyen-tranh-doremon.jpg', 'Còn hàng'),
(2, 'Văn học', '6551b16087fa8_01.jpg.webp', 'Còn hàng'),
(3, 'Kinh tế', '6551b1afc798f_image-2022071510044993.jpg', 'Còn hàng'),
(4, ' Sách - Truyện thiếu nhi', '6551b717a8e23_sách thiếu nhi.jpg.webp', 'Còn hàng'),
(5, 'Sách cho cha mẹ', '6551b737ef5dc_sách cho cha mẹ1.jpg.webp', 'Còn hàng'),
(6, 'Kỹ năng sống', '6551b746a13f2_sách kỹ năng sống.jpg.webp', 'Còn hàng'),
(7, 'Thường thức - Đời sống', '6551b750d2470_sách đời sống 1.jpg.webp', 'Còn hàng'),
(8, 'Y học – Sức khỏe', '6551b7b78ac82_sách y học sức khỏe.jpg.webp', 'Còn hàng'),
(9, 'Khoa học – Công nghệ', '6551b7c77221b_sách khoa học công nghệ1.jpg.webp', 'Còn hàng'),
(10, 'Bách khoa tri thức', '6551b7fadee4d_sách chi thức.jpg.webp', 'Còn hàng'),
(11, 'Kiến trúc - Mỹ thuật', '6551b80cc1b93_sách kiến trúc.jpg.webp', 'Còn hàng'),
(12, 'Danh nhân - Văn hóa - Du lịch', '6551b84973da0_sách danh nhân.jpg.webp', 'Còn hàng'),
(13, 'Nghệ thuật - Điện ảnh - Âm nhạc - Nhiếp ảnh', '', ''),
(14, 'Chính trị - Triết học - Tôn giáo - Thiền', '', ''),
(15, 'Tử vi - Chiêm tinh', '', ''),
(16, 'Phong thủy', '', ''),
(17, 'Sách Chuyên ngành - Học thuật - Khảo cứu', '', 'Còn hàng'),
(18, 'Ngoại ngữ', '', ''),
(19, 'Tin học', '', ''),
(20, 'Thể dục - Thể thao', '', ''),
(21, ' Từ điển', '', 'Còn hàng'),
(22, 'Sách giáo khoa - Sách tham khảo', '', ''),
(23, ' Sách Ngoại Văn', '', 'Còn hàng'),
(24, 'Sách Teen', '', 'Còn hàng'),
(25, 'Artbook & Sách tranh', '', 'Còn hàng');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id_dh` int(10) NOT NULL,
  `ngay_dat` date NOT NULL,
  `id_trangthai` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `sdt` int(50) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `tong_tien` varchar(255) NOT NULL,
  `ghichu` varchar(255) NOT NULL,
  `ten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(10) NOT NULL,
  `id_dm` int(10) NOT NULL,
  `id_tg` int(10) NOT NULL,
  `gia_sp` varchar(255) NOT NULL,
  `ten_sp` varchar(255) NOT NULL,
  `dac_biet` int(1) NOT NULL,
  `anh_sp` varchar(255) NOT NULL,
  `chi_tiet_sp` varchar(255) NOT NULL,
  `anh_sp_min_1` varchar(255) NOT NULL,
  `anh_sp_min_2` varchar(255) NOT NULL,
  `khuyen_mai` varchar(255) NOT NULL,
  `tinh_trang` varchar(255) NOT NULL,
  `so_trang` varchar(255) NOT NULL,
  `nha_xuat_ban` varchar(255) NOT NULL,
  `ngay_xuat_ban` date NOT NULL,
  `dich_gia` varchar(255) NOT NULL,
  `cty_phat_hanh` varchar(255) NOT NULL,
  `danh_gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `id_dm`, `id_tg`, `gia_sp`, `ten_sp`, `dac_biet`, `anh_sp`, `chi_tiet_sp`, `anh_sp_min_1`, `anh_sp_min_2`, `khuyen_mai`, `tinh_trang`, `so_trang`, `nha_xuat_ban`, `ngay_xuat_ban`, `dich_gia`, `cty_phat_hanh`, `danh_gia`) VALUES
(19, 2, 3, '115000', 'Chuyện Kỳ Lạ Ở Tiệm Sách Cũ Tanabe', 0, '1699809169_01.jpg.webp', 'Cuốn sách là một tuyển tập những câu truyện “trinh thám” ngắn liên quan đến hành trình phá án hay đi tìm câu trả lời cho những bí ẩn hay “vụ án” xuất phát hoặc liên quan đến tiệm sách Tanabe nơi lão Iwa làm chủ. Trong suốt những hành trình nhỏ ấy, cả lão ', '65511642ec3af_02.webp', '65518289b910d_03.webp', '120.000', 'Còn hàng', '360', ' Miyabe Miyuki', '0000-00-00', ' Lê Hồng', ' 1980 Books', 0),
(20, 2, 11, '151500', 'Sông Ngầm (Tái Bản)', 1, '1699811951_4.jpg.webp', 'Tình bạn của Phương Mộc và Tiêu Vọng bắt đầu khi Phương Mộc được cử về địa phương của Tiêu Vọng để giải quyết vụ mất tích của diễn viên điện ảnh Bùi Lam. Sự nhanh nhạy, tài phán đoán và phân tích của Phương Mộc khiến Tiêu Vọng rất mến phục. Phương Mộc cũn', '6551167847a97_2.jpg.webp', '1699811951_4.jpg.webp', '160,000', 'Còn hàng', '360', 'Lôi Mễ', '2019-06-01', ' Lê Hồng', ' Cổ Nguyệt Books', 0),
(21, 7, 10, '74000', 'Không Diệt Không Sinh Đừng Sợ Hãi (TB5)', 1, '1699895870_5.webp', 'hiều người trong chúng ta tin rằng cuộc đời của ta bắt đầu từ lúc chào đời và kết thúc khi ta chết. Chúng ta tin rằng chúng ta tới từ cái Không, nên khi chết chúng ta cũng không còn lại gì hết. Và chúng ta lo lắng vì sẽ trở thành hư vô.', '65525bd17d153_6.webp', '65525bd17f6d2_7.webp', '85000', 'Còn hàng', ' 224', 'Thích Nhất Hạnh', '2022-01-06', 'không', 'Saigon Books', 0),
(22, 2, 2, '97000', 'Mùa hè không tên (Nguyễn Nhật Ánh)', 0, '1699896195_8.webp', '“Mùa hè không tên” là truyện dài mới nhất của nhà văn Nguyễn Nhật Ánh, với những câu chuyện tuổi thơ với vô số trò tinh nghịch, những thoáng thinh thích hồi hộp cùng vô vàn kỷ niệm. Để rồi khi những tháng ngày trong sáng của tình bạn dần qua, bọn nhỏ tron', '65525c0d6901b_9.webp', '65525c0d69c0e_10.webp', '11000', 'Còn hàng', ' 292', 'Nguyễn Nhật Ánh', '2022-09-22', 'không', ' NXB Trẻ', 0),
(23, 3, 7, '169000', 'Kế Toán Vỉa Hè - Thực Hành Báo Cáo Tài Chính Căn Bản Từ Quầy Bán Nước Chanh', 1, '65525f1136db8_11.webp', 'Kế toán và tài chính là nỗi đau chung của rất nhiều doanh nghiệp nhỏ. Ngôn ngữ tài chính dường như là điều bí ẩn nhất của thế giới. Vô số tính toán và ý đồ được cài cắm sau các con số, mà thậm chí người kinh doanh nhiều năm cũng không thể nào bóc tách nổi', '65525f1139bd6_12.webp', '65525f113af60_13.webp', '180.000', 'Còn hàng', '268', '...', '2020-03-06', ' Trần Thanh Phong', 'Công ty TNHH Truyền Thông Giver', 0),
(24, 3, 11, '250000', 'Sách Luật Kế Toán Và Chế Độ Kế Toán Dành Cho Doanh Nghiệp Mới Nhất', 1, '655261a213cf8_14.webp', 'Trong những năm gần đây cùng với sự phát triển không ngừng của nền kinh tế thì công tác kế toán của doanh nghiệp cũng từng bước đi vào phát triển ổn định, vững chắc góp phần không nhỏ vào công cuộc đổi mới kinh tế - xã hội của đất nước. ', '655261a2157b6_15.webp', '655261a216dd2_16.webp', '270000', 'Còn hàng', '432', ' Kim Phượng', '2018-02-13', 'không', ' TT Giới Thiệu Sách TP. HCM', 0),
(25, 6, 10, '121720', 'Lý Thuyết Trò Chơi', 0, '1699898114_17.webp', 'Đời người giống như trò chơi, mỗi bước đều phải cân nhắc xem đi như thế nào, đi về đâu, phải kết hợp nhiều yếu tố lại chúng ta mới có thể đưa ra được lựa chọn. Mà trong quá trình chọn lựa này các yếu tố khiến ta phải cân nhắc và những đường đi khác nhau s', '65526312bc0ec_18.webp', '1699898114_17.webp', '130000', 'Còn hàng', '360', '...', '2019-01-05', 'không', ' 1980 Books', 0),
(26, 6, 9, '105000', 'Bạn Là Những Gì Bạn Đọc - You Are What You Read', 0, '1699898442_19.webp', 'Chúng ta đọc sách vì nhiều mục đích: để lấy thông tin, để thưởng thức, để phát triển bản thân; để được dẫn dắt, giải tỏa, rung động, truyền cảm hứng. Chúng ta còn đọc sách để hiểu biết và nâng cao năng lực nhận định, để trưởng thành và phát triển.', '65526454ee61c_20.webp', '1699898442_19.webp', '110.000', 'Còn hàng', '360', 'Robert DiYanni', '2022-08-08', 'Đào Quốc Minh', ' Wavebooks', 0),
(27, 6, 2, '172800', 'Không Phủi Cũng Rơi', 0, '1699898827_21.webp', 'Trong mỗi chúng ta ai đều đang có sẵn một sự tĩnh lặng và quân bình rất tự nhiên. Một tuệ giác trong sáng và sự an nhiên rộng mở vốn sẵn có, mà ta không cần phải nỗ lực để tìm cầu hay đạt đến.', '1699898827_21.webp', '1699898827_21.webp', '180.000', 'Còn hàng', '360', 'NGUYỄN DUY NHIÊN', '2022-02-11', 'không', 'PHANBOOK', 0),
(28, 14, 1, '169000', 'Sách Trò Chuyện Với Nhà Thần Bí - Sadhguru - Hướng Dẫn Nhỏ Đi Đến Tự Do Và Phúc Lạc', 0, '1699899195_22.webp', 'Sadhguru  là một yogi, một nhà thần bí và là người sáng lập Quỹ Isha, một tổ chức toàn tình nguyện viên tham gia vào các dự án môi trường và nhân đạo quy mô lớn. Ông là người sáng lập Trung tâm Yoga Isha ở Coimbatore, Ấn Độ và Viện Khoa học Nội tâm Isha t', '1699899195_22.webp', '1699899195_22.webp', '172.000', 'Còn hàng', '360', 'Sadhguru', '2020-03-03', 'không', ' Công ty cổ phần đầu tư và phát triển giáo dục quốc tế Á Châu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tacgia`
--

CREATE TABLE `tacgia` (
  `id_tg` int(10) NOT NULL,
  `ten_tg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tacgia`
--

INSERT INTO `tacgia` (`id_tg`, `ten_tg`) VALUES
(1, 'NXB Kim Đồng'),
(2, 'NXB Trẻ'),
(3, 'Nhã Nam'),
(4, 'Đinh Tị'),
(5, 'Alphabooks'),
(6, 'Thái Hà'),
(7, 'AZ Việt Nam'),
(8, 'Phương Nam'),
(9, '1980 Books'),
(10, 'First News - Trí Việt'),
(11, 'Văn Lang');

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id_thanh_vien` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `quyen_truy_cap` tinyint(1) NOT NULL DEFAULT 0,
  `ten_tv` varchar(255) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`id_thanh_vien`, `email`, `mat_khau`, `quyen_truy_cap`, `ten_tv`, `dia_chi`) VALUES
(1, 'Minhtit2004vkc@gmail.com', 'Minhtit2004', 1, NULL, NULL),
(2, 'Minh123@gmail.com', '123456789', 0, 'abc', 'cde'),
(3, 'Minh56', '123', 0, NULL, NULL),
(4, 'minh', '1', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trangthaidh`
--

CREATE TABLE `trangthaidh` (
  `id_tt` int(10) NOT NULL,
  `trangthai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blsanpham`
--
ALTER TABLE `blsanpham`
  ADD PRIMARY KEY (`id_bl`),
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `dmsanpham`
--
ALTER TABLE `dmsanpham`
  ADD PRIMARY KEY (`id_dm`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_dh`),
  ADD KEY `id_trangthai` (`id_trangthai`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_tg` (`id_tg`),
  ADD KEY `id_dm` (`id_dm`);

--
-- Indexes for table `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`id_tg`);

--
-- Indexes for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id_thanh_vien`);

--
-- Indexes for table `trangthaidh`
--
ALTER TABLE `trangthaidh`
  ADD PRIMARY KEY (`id_tt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blsanpham`
--
ALTER TABLE `blsanpham`
  MODIFY `id_bl` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dmsanpham`
--
ALTER TABLE `dmsanpham`
  MODIFY `id_dm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_dh` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tacgia`
--
ALTER TABLE `tacgia`
  MODIFY `id_tg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id_thanh_vien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trangthaidh`
--
ALTER TABLE `trangthaidh`
  MODIFY `id_tt` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blsanpham`
--
ALTER TABLE `blsanpham`
  ADD CONSTRAINT `blsanpham_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`),
  ADD CONSTRAINT `blsanpham_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `thanhvien` (`id_thanh_vien`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`id_trangthai`) REFERENCES `trangthaidh` (`id_tt`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `thanhvien` (`id_thanh_vien`),
  ADD CONSTRAINT `donhang_ibfk_3` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_tg`) REFERENCES `tacgia` (`id_tg`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`id_dm`) REFERENCES `dmsanpham` (`id_dm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
