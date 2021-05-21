-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2020 at 03:28 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_Id` int(50) NOT NULL,
  `Admin_Username` varchar(250) NOT NULL,
  `Admin_Password` varchar(250) NOT NULL,
  `Admin_Role` int(11) NOT NULL,
  `Admin_Email` varchar(50) NOT NULL,
  `Admin_Contact` varchar(50) NOT NULL,
  `Admin_Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_Id`, `Admin_Username`, `Admin_Password`, `Admin_Role`, `Admin_Email`, `Admin_Contact`, `Admin_Status`) VALUES
(1, 'Admin', 'Admin', 0, 'Admin@gmail.com', '1254639870', 1),
(2, 'Avie', 'Avirup', 1, 'titomondal2018@gmail.com', '1234567890', 1),
(3, 'Avirup', 'Avie', 1, 'Avirup@gmail.com', '1542369803', 1),
(7, 'Avirup Mondal', 'Avirup', 1, 'mondalavirup2015@gmail.com', '917980122439', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_Id` int(50) NOT NULL,
  `Category` varchar(250) NOT NULL,
  `Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_Id`, `Category`, `Status`) VALUES
(3, 'Men', 1),
(4, 'Women', 1),
(5, 'Kids', 1),
(7, 'Others', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `Contact_Id` int(11) NOT NULL,
  `User_Name` varchar(2000) NOT NULL,
  `User_Email` varchar(250) NOT NULL,
  `User_Mobile` int(11) NOT NULL,
  `User_Message` text NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`Contact_Id`, `User_Name`, `User_Email`, `User_Mobile`, `User_Message`, `Date`) VALUES
(1, 'User1', 'user@gmail.com', 1234567890, 'This is testing 1', '2020-06-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `Coupon_Id` int(11) NOT NULL,
  `Coupon_Name` varchar(50) NOT NULL,
  `Coupon_Value` int(11) NOT NULL,
  `Coupon_Type` varchar(80) NOT NULL,
  `Cart_Min_Value` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`Coupon_Id`, `Coupon_Name`, `Coupon_Value`, `Coupon_Type`, `Cart_Min_Value`, `Status`) VALUES
(1, 'First50', 120, 'Rupee', 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `User_Contact` int(11) NOT NULL,
  `User_Address` varchar(1000) NOT NULL,
  `User_Pincode` int(11) NOT NULL,
  `User_City` varchar(1000) NOT NULL,
  `User_State` varchar(1000) NOT NULL,
  `Payment_Type` varchar(1000) NOT NULL,
  `Total_Price` float NOT NULL,
  `Payment_Status` varchar(100) NOT NULL,
  `Order_Status` int(11) NOT NULL,
  `Transaction_Id` varchar(50) NOT NULL,
  `mihpayid` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `coupon_name` varchar(50) NOT NULL,
  `coupon_value` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_Id`, `User_Id`, `User_Contact`, `User_Address`, `User_Pincode`, `User_City`, `User_State`, `Payment_Type`, `Total_Price`, `Payment_Status`, `Order_Status`, `Transaction_Id`, `mihpayid`, `Date`, `coupon_id`, `coupon_name`, `coupon_value`) VALUES
(33, 13, 2147483647, '6/1C, RADHANATH CHOWDHURY ROAD', 700015, 'KOLKATA', 'West Bengal', 'COD', 800, 'success', 1, '8d6e84fff833b62a80e7', '', '2020-11-06', 0, '', 0),
(34, 13, 2147483647, '6/1C, RADHANATH CHOWDHURY ROAD', 700015, 'KOLKATA', 'West Bengal', 'COD', 730, 'success', 1, '0fd51e8dba667bf32280', '', '2020-11-08', 1, 'First50', 120),
(35, 13, 2147483647, '6/1C, RADHANATH CHOWDHURY ROAD', 700015, 'KOLKATA', 'West Bengal', 'COD', 580, 'success', 1, '67babbac6f3ebfb8ebcf', '', '2020-11-08', 1, 'First50', 120);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `Detail_Id` int(11) NOT NULL,
  `Order_Id` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Price_Per_Piece` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`Detail_Id`, `Order_Id`, `Product_Id`, `Qty`, `Price_Per_Piece`) VALUES
(3, 8, 12, 3, 6),
(4, 8, 14, 3, 522),
(7, 8, 12, 3, 6),
(8, 19, 12, 8, 6),
(9, 20, 12, 10, 6),
(10, 20, 14, 4, 522),
(11, 21, 12, 1, 6),
(12, 22, 12, 9, 6),
(13, 23, 12, 2, 6),
(14, 24, 14, 8, 522),
(15, 25, 12, 6, 6),
(16, 26, 16, 4, 150),
(17, 27, 16, 4, 150),
(18, 28, 24, 5, 200),
(19, 29, 24, 4, 200),
(20, 29, 23, 1, 800),
(21, 29, 21, 2, 850),
(22, 30, 19, 2, 25000),
(23, 30, 18, 1, 230000),
(24, 31, 25, 2, 7),
(25, 32, 24, 0, 200),
(26, 32, 23, 9, 800),
(27, 33, 12, 4, 200),
(28, 34, 32, 1, 850),
(29, 35, 47, 1, 700);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `Status_Id` int(11) NOT NULL,
  `Status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`Status_Id`, `Status`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Completed'),
(5, 'Canceled');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_Id` int(11) NOT NULL,
  `Id_Category` varchar(2000) NOT NULL,
  `Id_Subcategory` varchar(2000) NOT NULL,
  `Product_Name` varchar(2000) NOT NULL,
  `Product_Image` varchar(2000) NOT NULL,
  `Product_Quantity` int(11) NOT NULL,
  `Product_Mrp` float NOT NULL,
  `Product_Sp` float NOT NULL,
  `Short_Description` varchar(2000) NOT NULL,
  `Long_Description` varchar(2000) NOT NULL,
  `Best_Seller` int(11) NOT NULL,
  `Meta_Title` varchar(2000) NOT NULL,
  `Meta_Description` varchar(2000) NOT NULL,
  `Meta_keywords` varchar(2000) NOT NULL,
  `Status` int(20) NOT NULL,
  `Vendor_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_Id`, `Id_Category`, `Id_Subcategory`, `Product_Name`, `Product_Image`, `Product_Quantity`, `Product_Mrp`, `Product_Sp`, `Short_Description`, `Long_Description`, `Best_Seller`, `Meta_Title`, `Meta_Description`, `Meta_keywords`, `Status`, `Vendor_Id`) VALUES
(12, '5', '3', 'Red Frock', '240764468_kids2.jpg', 4, 250, 200, 'Red Frock Short Descrition', 'Red Frock Long Description', 0, 'Red Frock', 'Girls Red Frock', 'Red Frock Girls', 1, 0),
(15, '4', '1', 'Orange Saree', '990644595_saree4.jpg', 5, 300, 250, 'This is a orange saree Short Description', 'This is the orange saree Long Description', 0, 'Orange', 'orange saree Short Description', 'orange saree', 1, 0),
(16, '3', '2', 'Black Tshirts', '734231062_tshirt1.jpg', 10, 250, 150, 'Men Black Tshirts Short Description', 'Men Black Tshirts Long Description', 0, 'Black Tshirt', 'Black Short Long Description', 'Black Men Tshirt', 1, 0),
(17, '7', '4', 'Mobile', '948537155_other1.jpg', 2, 20000, 18990, 'White Mobile Short Description', 'White Mobile Long Description', 0, 'White Mobile', 'White Mobile', 'White Mobile', 1, 0),
(18, '7', '6', 'Washing Machine', '435598337_other4.jpg', 5, 250000, 230000, 'Washing Machine Short Description', 'Washing Machine Long Description', 0, 'Washing Machine', 'Washing Machine', 'Washing Machine', 1, 0),
(19, '7', '10', 'AC', '825217826_other2.jpg', 10, 30000, 25000, 'Ac Short Description', 'Ac Long Description', 0, 'Ac Short Description', 'Ac Short Description', 'Ac Short Description', 1, 0),
(20, '7', '7', 'Television', '844609388_other3.jpg', 2, 29000, 27500, 'Mi Television Short Description', 'Mi Television Long Description', 1, 'Mi Television Short Description', 'Mi Television Short Description', 'Mi Television Short Description', 1, 0),
(21, '4', '1', 'Pink Saree', '821675983_saree2.jpg', 5, 1000, 850, 'Pink Saree Short Desc', 'Pink Saree Long Desc', 0, 'Pink Saree', 'Pink Saree', 'Pink Saree', 1, 0),
(22, '4', '1', 'Red Saree', '541455649_saree3.jpg', 2, 650, 350, 'Red Saree Short Description', 'Red Saree Long Description', 0, 'Red Saree', 'Red Saree', 'Red Saree', 1, 0),
(23, '4', '1', 'Green and Red Saree', '210075741_saree1.jpg', 10, 990, 800, 'Green and Red Saree Short Description', 'Green and Red Saree Long Description', 0, 'Green and Red Saree', 'Green and Red Saree', 'Green and Red Saree', 1, 0),
(24, '3', '2', 'White Tshirt', '679231498_tshirt3.jpg', 5, 250, 200, 'Men White Tshirt', 'Men White Tshirt', 1, 'Men White Tshirt', 'White Tshirt Men', 'White Tshirt Men', 1, 0),
(25, '4', '13', 'Green Kurti', '957020075_women1.jpg', 5, 350, 320, 'Green Kurti', 'Green Kurti', 1, 'Green Kurti', 'Green Kurti', 'Green Kurti', 1, 2),
(26, '4', '13', 'Yellow Kurti', '231102330_women2.jpg', 10, 400, 350, 'Yellow Kurti', 'Yellow Kurti', 1, 'Yellow Kurti', 'Yellow Kurti', 'Yellow Kurti', 1, 2),
(27, '4', '11', 'White Shoe', '244631538_womenshoe3.jpg', 4, 800, 500, 'White Shoe', 'White Shoe', 0, 'White Shoe', 'White Shoe', 'White Shoe', 1, 2),
(28, '4', '11', 'Brown Shoe', '217425998_womenshoe4.jpg', 2, 1000, 700, 'Brown Shoe', 'Brown Shoe', 1, 'Brown Shoe', 'Brown Shoe', 'Brown Shoe', 1, 2),
(29, '3', '12', 'Blue Watch', '232060109_menwatch3.jpg', 4, 1200, 950, 'Blue Watch', 'Blue Watch', 1, 'Blue Watch', 'Blue Watch', 'Blue Watch', 1, 2),
(30, '3', '12', 'White Watch', '455714330_menwatch4.jpg', 1, 600, 580, 'White Watch', 'White Watch', 0, 'White Watch', 'White Watch', 'White Watch', 1, 2),
(31, '5', '3', 'Blue Frock', '165244815_kid3.jpg', 3, 920, 900, 'Blue Frock', 'Blue Frock', 1, 'Blue Frock', 'Blue Frock', 'Blue  Frock', 1, 2),
(32, '5', '3', 'Pink Frock', '816136537_kid4.jpg', 4, 850, 850, 'Pink Frock', 'Pink Frock', 1, 'Pink Frock', 'Pink Frock', 'Pink Frock', 1, 2),
(33, '3', '2', 'Blue Tshirt', '313215424_menshirt1.jpg', 10, 500, 400, 'Blue Tshirt', 'Blue Tshirt', 1, 'Blue Tshirt', 'Blue Tshirt', 'Blue Tshirt', 1, 3),
(34, '3', '2', 'Grey Tshirt', '585674489_menshirt3.jpg', 2, 600, 580, 'Grey Tshirt', 'Grey Tshirt', 0, 'Grey Tshirt', 'Grey Tshirt', 'Grey Tshirt', 1, 3),
(35, '4', '16', 'Red Tshirt', '822904608_women6.jpg', 2, 960, 900, 'Red Tshirt', 'Red Tshirt', 1, 'Red Tshirt', 'Red Tshirt', 'Red Tshirt', 1, 3),
(36, '4', '16', '3 Color T shirt', '268255170_women7.jpg', 5, 1500, 1350, '3 Color T shirt', '3 Color T shirt', 1, '3 Color T shirt', '3 Color T shirt', '3 Color T shirt', 1, 3),
(37, '3', '19', 'Brown Shoe', '581893756_menshoe1.jpg', 7, 3000, 1000, 'Brown Shoe', 'Brown Shoe', 1, 'Brown Shoe', 'Brown Shoe', 'Brown Shoe', 1, 3),
(38, '3', '19', 'Blue Shoe', '543127762_menshoe3.jpg', 4, 2200, 2000, 'Blue Shoe', 'Blue Shoe', 0, 'Blue Shoe', 'Blue Shoe', 'Blue Shoe', 1, 3),
(39, '7', '15', 'Study Table', '443841861_table2.jpg', 2, 7850, 7500, 'Study Table', 'Study Table', 1, 'Study Table', 'Study Table', 'Study Table', 1, 3),
(40, '7', '4', 'Honor 8X', '112650129_mobile3.jpg', 2, 18000, 14500, 'Honor 8X', 'Honor 8X', 1, 'Honor 8X Blue', 'Honor 8X Blue', 'Honor 8X Blue', 1, 3),
(41, '7', '4', 'Real Me XT', '645518536_mobile5.jpg', 2, 19000, 17500, 'Real Me XT', 'Real Me XT', 1, 'Real Me XT', 'Real Me XT white', 'Real Me XT white', 1, 3),
(42, '5', '21', 'Black Panjabi', '522487807_kid5.jpg', 10, 980, 950, 'Black Panjabi', 'Black Panjabi', 0, 'Black Panjabi Kids', 'Black Panjabi Kids', 'Black Panjabi Kids', 1, 3),
(43, '4', '17', 'Blue Watch', '217633325_womenwatch4.jpg', 1, 1800, 1500, 'Blue Watch', 'Blue Watch', 0, 'Blue Watch Women', 'Blue Watch Women', 'Blue Watch Women', 1, 3),
(44, '7', '7', 'Mi', '941091812_tv1.jpg', 2, 25000, 25000, 'Mi Tv', 'Mi Tv', 0, 'Mi Tv', 'Mi Tv', 'Mi Tv', 1, 3),
(45, '7', '6', 'Washing Machine white', '632258715_washing6.jpg', 2, 30000, 26000, 'Washing Machine white', 'Washing Machine white', 0, 'Washing Machine white', 'Washing Machine white', 'Washing Machine white', 1, 3),
(46, '3', '18', 'Cargo Trousers Men', '934966231_mentrouser4.jpg', 10, 900, 650, 'Cargo Trousers Men', 'Cargo Trousers Men', 1, 'Cargo Trousers Men', 'Cargo Trousers Men', 'Cargo Trousers Men', 1, 1),
(47, '3', '18', 'Trouser Blue Men', '276587035_mentrouser3.jpg', 2, 780, 700, 'Trouser Blue Men', 'Trouser Blue Men', 0, 'Trouser Blue Men', 'Trouser Blue Men', 'Trouser Blue Men', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `Subcribe_Id` int(11) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `User_Email` varchar(100) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`Subcribe_Id`, `User_Name`, `User_Email`, `Status`) VALUES
(1, 'Avirup Mondal', 'mondalavirup2015@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `Sub_Category_Id` int(11) NOT NULL,
  `Category_Id` int(11) NOT NULL,
  `Sub_Category` varchar(150) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`Sub_Category_Id`, `Category_Id`, `Sub_Category`, `Status`) VALUES
(1, 4, 'Saree', 1),
(2, 3, 'T-Shirt', 1),
(3, 5, 'Frock', 1),
(4, 7, 'Mobile', 1),
(6, 7, 'Washing Machine', 1),
(7, 7, 'TV', 1),
(10, 7, 'AC', 1),
(11, 4, 'Shoes', 1),
(12, 3, 'Watches', 1),
(13, 4, 'Kurti', 1),
(15, 7, 'Furniture', 1),
(16, 4, 'T-Shirt', 1),
(17, 4, 'Watches', 1),
(18, 3, 'Trousers', 1),
(19, 3, 'Shoes', 1),
(20, 3, 'Panjabi', 1),
(21, 5, 'Panjabi', 1),
(22, 5, 'T-Shirt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `User_Id` int(11) NOT NULL,
  `User_Name` varchar(2000) NOT NULL,
  `User_Email` varchar(2000) NOT NULL,
  `User_Password` varchar(2000) NOT NULL,
  `User_Address` varchar(2000) NOT NULL,
  `User_Contact` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`User_Id`, `User_Name`, `User_Email`, `User_Password`, `User_Address`, `User_Contact`, `Status`) VALUES
(1, 'Avie', 'user@gmail.com', 'user', 'user road', 1234567890, 1),
(3, 'Avirup Mondal', 'mondalmukti2016@gmail.com', 'abc', '', 2147483647, 1),
(14, 'Avirup Mondal', 'mondalavirup2015@gmail.com', 'Avirup', '', 2147483647, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `Wishlist_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Added_On` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`Wishlist_Id`, `User_Id`, `Product_Id`, `Added_On`) VALUES
(30, 0, 24, '2020-11-06'),
(31, 0, 22, '2020-11-06'),
(32, 0, 12, '2020-11-06'),
(34, 0, 43, '2020-11-08'),
(35, 0, 43, '2020-11-08'),
(36, 0, 12, '2020-11-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_Id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`Contact_Id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`Coupon_Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_Id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`Detail_Id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`Status_Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_Id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`Subcribe_Id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`Sub_Category_Id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`User_Id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`Wishlist_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `Contact_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `Coupon_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `Detail_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `Status_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `Subcribe_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `Sub_Category_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `Wishlist_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
