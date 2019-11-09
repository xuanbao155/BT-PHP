-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 09, 2019 lúc 02:35 PM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `contact`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhba`
--

CREATE TABLE `danhba` (
  `maDB` int(11) NOT NULL,
  `maNhan` int(11) NOT NULL,
  `maUser` int(11) NOT NULL,
  `tenDB` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Sdt` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhba`
--

INSERT INTO `danhba` (`maDB`, `maNhan`, `maUser`, `tenDB`, `email`, `Sdt`) VALUES
(1, 1, 1, 'darling', 'baoxuan155@gmail.com', '0765482902'),
(2, 3, 1, 'Kiếm', 'nhadaf@gmail.com', '010231230123'),
(4, 2, 1, 'thanh tran', 'hoangasd@gmail.com', '01231201233'),
(5, 5, 1, 'Nguyễn Thị Ngọc ', 'athkedf@gmail.com', '101292109392'),
(7, 1, 1, 'Nguyễn minh ah', 'hoasedf@gmail.com', '1309123013'),
(8, 1, 1, 'kiem hung', 'hugnpham@gmail.com', '129302391'),
(9, 3, 1, 'neanams', 'adajsdja@gmail.com', '130192309123'),
(10, 3, 1, 'xuan tai', 'taihuda@gmail.com', '19201923012'),
(11, 3, 1, 'keam ead', 'thnhasđa@gmail.com', '01920123193'),
(12, 4, 1, 'Thị Hà ', 'hasdfsjdf@gmail.com', '5453452'),
(13, 4, 1, 'tran trinh', 'asdbadks@gmail.com', '102991301123'),
(14, 1, 1, 'thanh kimm', 'sdjhajhdajs@gmail.com', '0412312231'),
(15, 1, 1, 'Nguyễn Thị ', 'thoasfjskf@gmail.com', '4325235322'),
(16, 2, 1, 'Dương Viết Thuận', 'thuanduongqư@gmail.com', '131252534');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhandan`
--

CREATE TABLE `nhandan` (
  `maNhan` int(11) NOT NULL,
  `maUser` int(11) NOT NULL,
  `tenNhan` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhandan`
--

INSERT INTO `nhandan` (`maNhan`, `maUser`, `tenNhan`) VALUES
(1, 1, 'thể thao'),
(2, 1, 'công việc'),
(3, 1, 'học tập'),
(4, 1, 'Vui chơi'),
(5, 2, 'lội'),
(30, 1, 'bơi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `maUser` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`maUser`, `username`, `password`, `Ten`) VALUES
(1, 'xuanbao', '123', 'Nguyễn Xuân Bảo'),
(2, 'dinhvinh', '123', 'Trần Đình Vĩnh');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhba`
--
ALTER TABLE `danhba`
  ADD PRIMARY KEY (`maDB`),
  ADD KEY `maNhan` (`maNhan`),
  ADD KEY `maUser` (`maUser`);

--
-- Chỉ mục cho bảng `nhandan`
--
ALTER TABLE `nhandan`
  ADD PRIMARY KEY (`maNhan`),
  ADD KEY `maUser` (`maUser`),
  ADD KEY `maUser_2` (`maUser`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`maUser`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhba`
--
ALTER TABLE `danhba`
  MODIFY `maDB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `nhandan`
--
ALTER TABLE `nhandan`
  MODIFY `maNhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `maUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `danhba`
--
ALTER TABLE `danhba`
  ADD CONSTRAINT `danhba_ibfk_1` FOREIGN KEY (`maUser`) REFERENCES `nhandan` (`maUser`);

--
-- Các ràng buộc cho bảng `nhandan`
--
ALTER TABLE `nhandan`
  ADD CONSTRAINT `nhandan_ibfk_1` FOREIGN KEY (`maUser`) REFERENCES `user` (`maUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
