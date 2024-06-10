-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 22, 2024 lúc 09:34 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `product`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donmua`
--

CREATE TABLE `donmua` (
  `id_don` int(33) NOT NULL,
  `name_nm` varchar(255) NOT NULL,
  `name_sp` varchar(255) NOT NULL,
  `soluong` int(255) NOT NULL,
  `tongtien` int(33) NOT NULL,
  `anh` varchar(255) NOT NULL,
  `duyet` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donmua`
--

INSERT INTO `donmua` (`id_don`, `name_nm`, `name_sp`, `soluong`, `tongtien`, `anh`, `duyet`) VALUES
(17, 'Mẫn', 'Xoài', 6, 60000, 'f-5.jpg', ''),
(18, 'Mẫn', 'Xoài', 6, 60000, 'f-5.jpg', 'ok'),
(20, 'Lan', 'Đàn ông', 4, 1200000, 'client-img.png', 'ok'),
(22, 'Lan', 'Kiều nữ', 5, 1000000, 'P1170088.JPG', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(33) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sdt` int(33) NOT NULL,
  `pict` varchar(33) NOT NULL,
  `cate` varchar(33) NOT NULL,
  `date` date NOT NULL,
  `pric` int(33) NOT NULL,
  `des` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `name`, `sdt`, `pict`, `cate`, `date`, `pric`, `des`) VALUES
(1, 'Xoài', 34, 'f-5.jpg', 'Thực phẩm', '2024-04-27', 10000, 'chín đẹp mắt'),
(9, 'Cam thái', 6, 'f-1.jpg', 'Thực phẩm', '2024-05-29', 30000, 'ngon tuyệt vời nhưng chua'),
(10, 'Dâu', 1, 'f-6.jpg', 'Thực phẩm', '2024-06-01', 40000, 'thơm thơm như mùi sữa'),
(11, 'Táo tàu', 2, 'f-4.jpg', 'Thực phẩm', '2024-05-16', 5000, 'ngon bổ rẻ'),
(12, 'Đàn ông', 90, 'client-img.png', 'sản phẩm 2', '2003-07-17', 300000, 'tuỳ ý sử dụng'),
(13, 'Trai đẹp', 1, 'P1170090.JPG', 'Thời trang', '2024-05-10', 5000000, 'Chỉ có duy nhất 1 sản phẩm'),
(14, 'Kiều nữ', 50, 'P1170088.JPG', 'Thời trang', '2024-05-14', 200000, 'hàng sale xập sàn'),
(15, 'Đào', 43, 'shop-img.jpg', 'Thực phẩm', '2024-05-10', 73000, 'đào to và tươi'),
(16, 'Trai hư', 22, 'P1170097.JPG', 'Thời trang', '2024-05-20', 455000, 'Hư nhưng vui');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `name`, `pass`, `email`, `avat`) VALUES
(25, 'Mẫn', '123', 'nguyenhuuman2003@gmail.com', 'f-5.jpg'),
(26, 'Lan', '123', 'lanxjng@gmail.com', 'f-5.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `donmua`
--
ALTER TABLE `donmua`
  ADD PRIMARY KEY (`id_don`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donmua`
--
ALTER TABLE `donmua`
  MODIFY `id_don` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
