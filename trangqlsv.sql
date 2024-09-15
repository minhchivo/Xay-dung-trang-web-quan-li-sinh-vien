-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 20, 2024 lúc 09:42 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `trangqlsv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangbieumau`
--

CREATE TABLE `bangbieumau` (
  `id` int(11) NOT NULL,
  `ten_bieu_mau` varchar(255) DEFAULT NULL,
  `mo_ta` varchar(255) DEFAULT NULL,
  `link_bieu_mau` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bangbieumau`
--

INSERT INTO `bangbieumau` (`id`, `ten_bieu_mau`, `mo_ta`, `link_bieu_mau`) VALUES
(1, 'Đề xuất hoãn quân sự', 'Biểu mẫu để đề xuất hoãn nghĩa vụ quân sự.', 'link_to_your_form1'),
(2, 'Chứng nhận là sinh viên của trường', 'Biểu mẫu để chứng nhận là sinh viên của trường.', 'link_to_your_form2'),
(3, 'Giấy vay vốn sinh viên tại địa phương.', 'Giấy vay vốn sinh viên tại địa phương.', NULL),
(4, 'Đơn xin chưa xét tốt nghiệp', 'Đơn xin chưa xét tốt nghiệp', NULL),
(5, 'Giấy giới thiệu thực tập tại doanh nghiệp', 'Giấy giới thiệu thực tập tại doanh nghiệp', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangkihocphan`
--

CREATE TABLE `dangkihocphan` (
  `STT` int(11) NOT NULL,
  `MSSV` int(11) NOT NULL,
  `MaHocPhan` int(11) NOT NULL,
  `HocKy` int(11) DEFAULT NULL,
  `SoTinChi` int(11) DEFAULT NULL,
  `MaNganh` int(11) DEFAULT NULL,
  `MaMonHoc` int(11) DEFAULT NULL,
  `MaGiangVien` int(11) DEFAULT NULL,
  `LopHocPhan` varchar(20) DEFAULT NULL,
  `NgayBatDau` date DEFAULT NULL,
  `NgayKetThuc` date DEFAULT NULL,
  `SoTienPhaiDong` float DEFAULT NULL,
  `TrangThaiLopHocPhan` varchar(20) DEFAULT NULL,
  `PhongHoc` varchar(50) DEFAULT NULL,
  `TenGiangVien` varchar(255) DEFAULT NULL,
  `TrangThaiDangKi` varchar(20) DEFAULT NULL,
  `NgayDangKi` date DEFAULT NULL,
  `ThuHoc` varchar(20) DEFAULT NULL,
  `Tiethoc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dangkihocphan`
--

INSERT INTO `dangkihocphan` (`STT`, `MSSV`, `MaHocPhan`, `HocKy`, `SoTinChi`, `MaNganh`, `MaMonHoc`, `MaGiangVien`, `LopHocPhan`, `NgayBatDau`, `NgayKetThuc`, `SoTienPhaiDong`, `TrangThaiLopHocPhan`, `PhongHoc`, `TenGiangVien`, `TrangThaiDangKi`, `NgayDangKi`, `ThuHoc`, `Tiethoc`) VALUES
(11, 101010, 100, 1, 3, 1, NULL, 1, 'Lập Trình Cơ Bản', '2024-03-21', '2024-05-03', 1500000, 'Đã Mở', '204', 'Nguyễn Văn Khải', 'Thành công (Đã xác n', '2024-03-20', '2', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `de_xuat_bieu_mau`
--

CREATE TABLE `de_xuat_bieu_mau` (
  `MSSV` int(11) NOT NULL,
  `LoaiDon` varchar(50) NOT NULL,
  `NgayNopDon` date DEFAULT NULL,
  `TrangThai` varchar(20) DEFAULT NULL,
  `madexuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `MaGiangVien` int(11) NOT NULL,
  `HoTen` varchar(255) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `SDT` varchar(20) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `NgayVaoTruong` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`MaGiangVien`, `HoTen`, `Email`, `SDT`, `NgaySinh`, `NgayVaoTruong`) VALUES
(1, 'Nguyễn Văn Khải', 'khainguyen@gmail.com', '0387542146', '1980-05-04', '2020-03-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocphan`
--

CREATE TABLE `hocphan` (
  `MaHocPhan` int(11) NOT NULL,
  `HocKy` int(11) DEFAULT NULL,
  `SoTinChi` int(11) DEFAULT NULL,
  `MaNganh` int(11) DEFAULT NULL,
  `MaMonHoc` int(11) DEFAULT NULL,
  `MaGiangVien` int(11) DEFAULT NULL,
  `LopHocPhan` varchar(20) DEFAULT NULL,
  `NgayBatDau` date DEFAULT NULL,
  `NgayKetThuc` date DEFAULT NULL,
  `SoTienPhaiDong` float DEFAULT NULL,
  `TrangThaiLopHocPhan` varchar(20) DEFAULT NULL,
  `PhongHoc` varchar(50) DEFAULT NULL,
  `TenGiangVien` varchar(255) DEFAULT NULL,
  `ThuHoc` varchar(20) DEFAULT NULL,
  `Tiethoc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hocphan`
--

INSERT INTO `hocphan` (`MaHocPhan`, `HocKy`, `SoTinChi`, `MaNganh`, `MaMonHoc`, `MaGiangVien`, `LopHocPhan`, `NgayBatDau`, `NgayKetThuc`, `SoTienPhaiDong`, `TrangThaiLopHocPhan`, `PhongHoc`, `TenGiangVien`, `ThuHoc`, `Tiethoc`) VALUES
(100, 1, 3, 1, NULL, 1, 'Lập Trình Cơ Bản', '2024-03-21', '2024-05-03', 1500000, 'Đã Mở', '204', 'Nguyễn Văn Khải', '2', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocphi`
--

CREATE TABLE `hocphi` (
  `MSSV` int(11) NOT NULL,
  `NamHoc` int(11) NOT NULL,
  `HocKy` int(11) NOT NULL,
  `NgayDangKi` date DEFAULT NULL,
  `TrangThaiDangKi` varchar(20) DEFAULT NULL,
  `SoTienPhaiDong` float DEFAULT NULL,
  `SoTienDaDong` float DEFAULT NULL,
  `CongNo` float DEFAULT NULL,
  `TrangThaiHocPhi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hocphi`
--

INSERT INTO `hocphi` (`MSSV`, `NamHoc`, `HocKy`, `NgayDangKi`, `TrangThaiDangKi`, `SoTienPhaiDong`, `SoTienDaDong`, `CongNo`, `TrangThaiHocPhi`) VALUES
(101010, 0, 1, '2024-03-20', 'Thành công (Đã xác n', 1500000, 0, 1500000, 'Chưa Đóng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketquahoctap`
--

CREATE TABLE `ketquahoctap` (
  `MSSV` int(11) NOT NULL,
  `MaLopHocPhan` varchar(20) NOT NULL,
  `LopHocPhan` varchar(255) DEFAULT NULL,
  `SoTinChi` int(11) DEFAULT NULL,
  `DiemQuaTrinh` float DEFAULT NULL,
  `DiemGiuaKi` int(11) NOT NULL,
  `DiemCuoiKy` float DEFAULT NULL,
  `XepLoai` varchar(20) DEFAULT NULL,
  `DiemTongKet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ketquahoctap`
--

INSERT INTO `ketquahoctap` (`MSSV`, `MaLopHocPhan`, `LopHocPhan`, `SoTinChi`, `DiemQuaTrinh`, `DiemGiuaKi`, `DiemCuoiKy`, `XepLoai`, `DiemTongKet`) VALUES
(101010, '11', 'Lập Trình Cơ Bản', 3, NULL, 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichhoc`
--

CREATE TABLE `lichhoc` (
  `MaLichHoc` int(11) NOT NULL,
  `MaHocPhan` int(11) DEFAULT NULL,
  `LopHocPhan` varchar(100) DEFAULT NULL,
  `ThuHoc` int(11) DEFAULT NULL,
  `TietHoc` int(11) DEFAULT NULL,
  `PhongHoc` varchar(20) DEFAULT NULL,
  `MaGiangVien` int(11) DEFAULT NULL,
  `MSSV` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichhoc`
--

INSERT INTO `lichhoc` (`MaLichHoc`, `MaHocPhan`, `LopHocPhan`, `ThuHoc`, `TietHoc`, `PhongHoc`, `MaGiangVien`, `MSSV`) VALUES
(1032, 100, 'Lập Trình Cơ Bản', 2, 1, '204', 1, 101010);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichthi`
--

CREATE TABLE `lichthi` (
  `MaLichThi` int(11) NOT NULL,
  `MaHocPhan` int(11) DEFAULT NULL,
  `NgayThi` date DEFAULT NULL,
  `GioThi` time DEFAULT NULL,
  `PhongThi` varchar(20) DEFAULT NULL,
  `MaGiangVien` int(11) DEFAULT NULL,
  `MSSV` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `MaMonHoc` int(11) NOT NULL,
  `TenMonHoc` varchar(255) DEFAULT NULL,
  `MaNganh` int(11) DEFAULT NULL,
  `MaHocPhan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganh`
--

CREATE TABLE `nganh` (
  `MaNganh` int(11) NOT NULL,
  `TenNganh` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nganh`
--

INSERT INTO `nganh` (`MaNganh`, `TenNganh`) VALUES
(1, 'Công Nghệ Thông Tin'),
(2, 'Kinh tế vận tải'),
(3, 'Quản Trị KInh Doanh'),
(4, 'Marketing');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanhoi`
--

CREATE TABLE `phanhoi` (
  `MaPhanHoi` int(11) NOT NULL,
  `MSSV` int(11) NOT NULL,
  `HoTen` varchar(255) DEFAULT NULL,
  `NoiDung` text DEFAULT NULL,
  `TrangThai` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phanhoi`
--

INSERT INTO `phanhoi` (`MaPhanHoi`, `MSSV`, `HoTen`, `NoiDung`, `TrangThai`) VALUES
(84, 101010, 'Nguyễn Minh Tâm', 'Xin Chào', 'Đã xử lí');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MSSV` int(11) NOT NULL,
  `HoTen` varchar(255) DEFAULT NULL,
  `GioiTinh` varchar(10) DEFAULT NULL,
  `NgayVaoTruong` date DEFAULT NULL,
  `LoaiHinhDaoTao` varchar(50) DEFAULT NULL,
  `Khoa` varchar(50) DEFAULT NULL,
  `TenNganh` varchar(50) DEFAULT NULL,
  `ChuyenNganh` varchar(50) DEFAULT NULL,
  `LopHoc` varchar(20) DEFAULT NULL,
  `TrangThai` varchar(20) DEFAULT NULL,
  `BacDaoTao` varchar(20) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `SoCCCD` varchar(20) DEFAULT NULL,
  `DienThoai` varchar(20) DEFAULT NULL,
  `DiaChiLienHe` varchar(255) DEFAULT NULL,
  `NoiSinh` varchar(50) DEFAULT NULL,
  `DanToc` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `TonGiao` varchar(20) DEFAULT NULL,
  `HinhAnh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`MSSV`, `HoTen`, `GioiTinh`, `NgayVaoTruong`, `LoaiHinhDaoTao`, `Khoa`, `TenNganh`, `ChuyenNganh`, `LopHoc`, `TrangThai`, `BacDaoTao`, `NgaySinh`, `SoCCCD`, `DienThoai`, `DiaChiLienHe`, `NoiSinh`, `DanToc`, `Email`, `TonGiao`, `HinhAnh`) VALUES
(101010, 'Nguyễn Minh Tâm', 'Nam', '2023-11-14', 'Chính Quy', 'Công Nghệ Thông Tin', 'Công Nghệ Thông Tin', 'Công nghệ Thông Tin', '22ĐHTT01', '', 'Đại Học', '2004-01-02', '0707020212738', '0945635132', 'TPHCM', 'Bình Thuận', 'Kinh', '101010@dh.com', 'Không', 'avatar-facebook-mac-dinh-19.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stt_sequence`
--

CREATE TABLE `stt_sequence` (
  `next_not_cached_value` bigint(21) NOT NULL,
  `minimum_value` bigint(21) NOT NULL,
  `maximum_value` bigint(21) NOT NULL,
  `start_value` bigint(21) NOT NULL COMMENT 'start value when sequences is created or value if RESTART is used',
  `increment` bigint(21) NOT NULL COMMENT 'increment value',
  `cache_size` bigint(21) UNSIGNED NOT NULL,
  `cycle_option` tinyint(1) UNSIGNED NOT NULL COMMENT '0 if no cycles are allowed, 1 if the sequence should begin a new cycle when maximum_value is passed',
  `cycle_count` bigint(21) NOT NULL COMMENT 'How many cycles have been done'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `stt_sequence`
--

INSERT INTO `stt_sequence` (`next_not_cached_value`, `minimum_value`, `maximum_value`, `start_value`, `increment`, `cache_size`, `cycle_option`, `cycle_count`) VALUES
(1, 1, 9223372036854775806, 1, 1, 1000, 0, 0),
(1, 1, 9223372036854775806, 1, 1, 1000, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoanhocphi`
--

CREATE TABLE `thanhtoanhocphi` (
  `ID` int(11) NOT NULL,
  `MSSV` varchar(20) DEFAULT NULL,
  `SoTienDaNop` decimal(18,2) DEFAULT NULL,
  `NgayNop` date DEFAULT NULL,
  `TrangThai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtindangnhap`
--

CREATE TABLE `thongtindangnhap` (
  `MSSV` int(11) NOT NULL,
  `HoTen` varchar(255) DEFAULT NULL,
  `MatKhau` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtindangnhap`
--

INSERT INTO `thongtindangnhap` (`MSSV`, `HoTen`, `MatKhau`) VALUES
(101010, 'Nguyễn Minh Tâm', '111111');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `MaTinTuc` int(11) NOT NULL,
  `NoiDung` text DEFAULT NULL,
  `NgayDang` date DEFAULT NULL,
  `TieuDe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`MaTinTuc`, `NoiDung`, `NgayDang`, `TieuDe`) VALUES
(8, 'Nội Dung Tin Tức !', '2024-03-20', 'Tin Tức 1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `bangbieumau`
--
ALTER TABLE `bangbieumau`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dangkihocphan`
--
ALTER TABLE `dangkihocphan`
  ADD PRIMARY KEY (`STT`),
  ADD KEY `MSSV` (`MSSV`);

--
-- Chỉ mục cho bảng `de_xuat_bieu_mau`
--
ALTER TABLE `de_xuat_bieu_mau`
  ADD PRIMARY KEY (`madexuat`),
  ADD KEY `fk_sinhvien_mssv` (`MSSV`);

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`MaGiangVien`);

--
-- Chỉ mục cho bảng `hocphan`
--
ALTER TABLE `hocphan`
  ADD PRIMARY KEY (`MaHocPhan`),
  ADD KEY `MaNganh` (`MaNganh`),
  ADD KEY `MaMonHoc` (`MaMonHoc`),
  ADD KEY `fk_giangvien` (`MaGiangVien`);

--
-- Chỉ mục cho bảng `hocphi`
--
ALTER TABLE `hocphi`
  ADD PRIMARY KEY (`MSSV`,`NamHoc`,`HocKy`);

--
-- Chỉ mục cho bảng `ketquahoctap`
--
ALTER TABLE `ketquahoctap`
  ADD PRIMARY KEY (`MSSV`,`MaLopHocPhan`);

--
-- Chỉ mục cho bảng `lichhoc`
--
ALTER TABLE `lichhoc`
  ADD PRIMARY KEY (`MaLichHoc`),
  ADD KEY `MaHocPhan` (`MaHocPhan`),
  ADD KEY `MaGiangVien` (`MaGiangVien`),
  ADD KEY `MSSV` (`MSSV`);

--
-- Chỉ mục cho bảng `lichthi`
--
ALTER TABLE `lichthi`
  ADD PRIMARY KEY (`MaLichThi`),
  ADD KEY `MaHocPhan` (`MaHocPhan`),
  ADD KEY `MaGiangVien` (`MaGiangVien`),
  ADD KEY `MSSV` (`MSSV`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MaMonHoc`),
  ADD KEY `MaNganh` (`MaNganh`),
  ADD KEY `monhoc_ibfk_2` (`MaHocPhan`);

--
-- Chỉ mục cho bảng `nganh`
--
ALTER TABLE `nganh`
  ADD PRIMARY KEY (`MaNganh`);

--
-- Chỉ mục cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD PRIMARY KEY (`MaPhanHoi`),
  ADD KEY `FK_sinhvien` (`MSSV`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MSSV`);

--
-- Chỉ mục cho bảng `thanhtoanhocphi`
--
ALTER TABLE `thanhtoanhocphi`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `thongtindangnhap`
--
ALTER TABLE `thongtindangnhap`
  ADD PRIMARY KEY (`MSSV`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`MaTinTuc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bangbieumau`
--
ALTER TABLE `bangbieumau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `dangkihocphan`
--
ALTER TABLE `dangkihocphan`
  MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `de_xuat_bieu_mau`
--
ALTER TABLE `de_xuat_bieu_mau`
  MODIFY `madexuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `lichhoc`
--
ALTER TABLE `lichhoc`
  MODIFY `MaLichHoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1033;

--
-- AUTO_INCREMENT cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  MODIFY `MaPhanHoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `thanhtoanhocphi`
--
ALTER TABLE `thanhtoanhocphi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `MaTinTuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dangkihocphan`
--
ALTER TABLE `dangkihocphan`
  ADD CONSTRAINT `dangkihocphan_ibfk_1` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`);

--
-- Các ràng buộc cho bảng `de_xuat_bieu_mau`
--
ALTER TABLE `de_xuat_bieu_mau`
  ADD CONSTRAINT `fk_sinhvien_mssv` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`);

--
-- Các ràng buộc cho bảng `hocphan`
--
ALTER TABLE `hocphan`
  ADD CONSTRAINT `fk_giangvien` FOREIGN KEY (`MaGiangVien`) REFERENCES `giangvien` (`MaGiangVien`),
  ADD CONSTRAINT `hocphan_ibfk_1` FOREIGN KEY (`MaNganh`) REFERENCES `nganh` (`MaNganh`),
  ADD CONSTRAINT `hocphan_ibfk_2` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`);

--
-- Các ràng buộc cho bảng `hocphi`
--
ALTER TABLE `hocphi`
  ADD CONSTRAINT `hocphi_ibfk_1` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`);

--
-- Các ràng buộc cho bảng `ketquahoctap`
--
ALTER TABLE `ketquahoctap`
  ADD CONSTRAINT `ketquahoctap_ibfk_1` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`);

--
-- Các ràng buộc cho bảng `lichhoc`
--
ALTER TABLE `lichhoc`
  ADD CONSTRAINT `lichhoc_ibfk_1` FOREIGN KEY (`MaHocPhan`) REFERENCES `hocphan` (`MaHocPhan`),
  ADD CONSTRAINT `lichhoc_ibfk_2` FOREIGN KEY (`MaGiangVien`) REFERENCES `giangvien` (`MaGiangVien`),
  ADD CONSTRAINT `lichhoc_ibfk_3` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`);

--
-- Các ràng buộc cho bảng `lichthi`
--
ALTER TABLE `lichthi`
  ADD CONSTRAINT `lichthi_ibfk_1` FOREIGN KEY (`MaHocPhan`) REFERENCES `hocphan` (`MaHocPhan`),
  ADD CONSTRAINT `lichthi_ibfk_2` FOREIGN KEY (`MaGiangVien`) REFERENCES `giangvien` (`MaGiangVien`),
  ADD CONSTRAINT `lichthi_ibfk_3` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`);

--
-- Các ràng buộc cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD CONSTRAINT `monhoc_ibfk_1` FOREIGN KEY (`MaNganh`) REFERENCES `nganh` (`MaNganh`),
  ADD CONSTRAINT `monhoc_ibfk_2` FOREIGN KEY (`MaHocPhan`) REFERENCES `hocphan` (`MaHocPhan`);

--
-- Các ràng buộc cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD CONSTRAINT `FK_sinhvien` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`) ON DELETE CASCADE,
  ADD CONSTRAINT `phanhoi_ibfk_1` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`);

--
-- Các ràng buộc cho bảng `thongtindangnhap`
--
ALTER TABLE `thongtindangnhap`
  ADD CONSTRAINT `thongtindangnhap_ibfk_1` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
