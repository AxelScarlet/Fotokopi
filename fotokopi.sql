-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 06:12 AM
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
-- Database: `fotokopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(10) UNSIGNED NOT NULL,
  `orderID` int(10) UNSIGNED NOT NULL,
  `foodID` int(10) UNSIGNED NOT NULL,
  `foodName` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `orderID`, `foodID`, `foodName`, `quantity`, `totalPrice`) VALUES
(1, 1, 2, 'Original Crispy Chicken', 1, 6.00),
(2, 1, 3, 'Original Crispy Chicken', 1, 6.00),
(3, 2, 4, 'Spicy Crispy Chicken', 1, 4.00),
(4, 3, 1, 'Original Crispy Chicken', 1, 5.00),
(5, 3, 1, 'Original Crispy Chicken', 1, 5.00),
(6, 3, 2, 'Spicy Crispy Chicken', 1, 6.00),
(7, 4, 2, 'Spicy Crispy Chicken', 1, 6.00),
(8, 4, 3, 'Cheesy Crispy Chicken', 1, 6.00),
(9, 4, 10, 'Cheese Sauce', 1, 2.00),
(10, 5, 1, 'Original Crispy Chicken', 1, 5.00),
(11, 5, 5, 'Spicy Crispy Chicken Popcorn', 1, 4.00),
(12, 6, 1, 'Original Crispy Chicken', 1, 5.00),
(13, 6, 2, 'Spicy Crispy Chicken', 1, 6.00),
(14, 6, 3, 'Cheesy Crispy Chicken', 1, 6.00),
(15, 6, 4, 'Original Crispy Chicken Popcorn', 1, 4.00),
(16, 6, 5, 'Spicy Crispy Chicken Popcorn', 1, 4.00),
(17, 6, 6, 'Cheesy Crispy Chicken Popcorn', 1, 4.00),
(18, 6, 7, 'Original Crispy Chicken Satay', 1, 3.00),
(19, 6, 8, 'Spicy Crispy Chicken Satay', 1, 3.00),
(20, 6, 9, 'Cheesy Crispy Chicken Satay', 1, 4.00),
(21, 6, 10, 'Cheese Sauce', 1, 2.00),
(22, 6, 11, 'Spicy Sauce', 1, 2.00),
(23, 6, 12, 'BBQ Sauce', 1, 3.00),
(24, 7, 2, 'Spicy Crispy Chicken', 1, 6.00),
(25, 7, 5, 'Spicy Crispy Chicken Popcorn', 1, 4.00),
(26, 8, 4, 'Original Crispy Chicken Popcorn', 1, 4.00),
(27, 8, 8, 'Spicy Crispy Chicken Satay', 1, 3.00),
(28, 9, 1, 'Mocha', 2, 10.00),
(29, 10, 3, 'Burger Crispy', 1, 6.00),
(30, 11, 16, 'Caramel Macchiato', 1, 9.90),
(31, 11, 5, 'Lemon cakes (Per Pieces) + Any Coffee', 1, 12.00);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custID` int(10) UNSIGNED NOT NULL,
  `custName` varchar(100) NOT NULL,
  `custPhoneNumber` varchar(20) NOT NULL,
  `custEmail` varchar(255) NOT NULL,
  `custPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custID`, `custName`, `custPhoneNumber`, `custEmail`, `custPassword`) VALUES
(1, 'Admin', '0164105210', 'fotokopi@gmail.com', '3e0cd7dbf477f6da9831acd7c1d617bc'),
(7, 'Admin2', '0164105210', 'Abc@gmail.com', '3e0cd7dbf477f6da9831acd7c1d617bc'),
(8, 'Azim', '0199355497', 'Azhar@gmail.com', '70c4be5b30c86d5d508cbeb224036660'),
(9, 'Almas', '0164105211', 'almas@gmail.com', '3e0cd7dbf477f6da9831acd7c1d617bc');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `foodID` int(11) NOT NULL,
  `foodName` varchar(255) NOT NULL,
  `foodDetails` varchar(255) NOT NULL,
  `foodPrice` decimal(10,2) NOT NULL,
  `menuPic` text DEFAULT NULL,
  `updateDate` date DEFAULT NULL,
  `typeName` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`foodID`, `foodName`, `foodDetails`, `foodPrice`, `menuPic`, `updateDate`, `typeName`) VALUES
(1, 'Chocolate cake (Per Pieces) + Any Coffee', '\"Enjoy our rich chocolate cakes paired perfectly with a variety of premium coffees. Each decadent slice, from classic to spiced, complements the bold flavors of our expertly brewed coffee, creating a delightful and indulgent treat.\"', 11.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUrVqJw9YT0_rIEL4Mu8HK-FSyzIgZwAjO9A&s', '2024-07-13', 'Promotion'),
(2, 'Strawberry cake (Per Pieces) + Any Coffee', '\"A light and fluffy vanilla sponge cake layered with fresh, juicy strawberries and velvety whipped cream. Perfectly balanced sweetness with a burst of natural strawberry flavor in every bite.\"', 12.00, 'https://aclassictwist.com/wp-content/uploads/2020/08/Fresh-Strawberry-Cake-with-Strawberry-Frosting-3.jpg', '2024-07-12', 'Promotion'),
(3, 'Carrot Cake (Limited Season Only)', '\"A beautifully spiced carrot cake layered with a tangy cream cheese frosting, garnished with a sprinkle of cinnamon and chopped pecans. Perfectly balanced and utterly irresistible.\"', 6.90, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYwBFetJYpXujL5CPZ8KPVKzTCG3dAyy4LTg&s', '2024-07-12', 'Promotion'),
(4, 'Vanilla cake (Per Pieces) + Any Coffee', '\"A moist and tender vanilla cake with a rich, buttery flavor, topped with a smooth and creamy vanilla buttercream frosting. A timeless favorite that’s perfect for any occasion.\"', 12.00, 'https://sallysbakingaddiction.com/wp-content/uploads/2019/01/vanilla-cake-5.jpg', '2024-07-12', 'Promotion'),
(5, 'Lemon cakes (Per Pieces) + Any Coffee', '\"A light and moist lemon cake bursting with fresh lemon flavor, topped with a tangy lemon glaze. Perfectly balanced sweetness with a refreshing citrus twist.\"', 12.00, 'https://preppykitchen.com/wp-content/uploads/2022/06/Lemon-Cake-Recipe.jpg', '2024-07-12', 'Promotion'),
(6, 'Tiramisu Cake (Per Pieces) + Any Pastry', '\"A luxurious Italian dessert featuring layers of espresso-soaked ladyfingers, creamy mascarpone cheese, and a dusting of rich cocoa powder. A perfect blend of coffee and cream for an indulgent treat.\"', 13.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCFvDLlt3ElPjrLrWkCQrGyCvUXeyforNwOg&s', '2024-07-12', 'Promotion'),
(7, 'Apple Pie + Any Coffee', '\"A timeless favorite with a buttery, flaky crust filled with tender, cinnamon-spiced apples. Baked to golden perfection, this pie is a slice of comfort and nostalgia.\"', 12.00, 'https://joyfoodsunshine.com/wp-content/uploads/2019/08/best-apple-pie-recipe-from-scratch-8.jpg', '2024-07-12', 'Promotion'),
(8, 'Cappucino', '\"A perfect blend of rich, bold espresso and velvety steamed milk, topped with a thick layer of creamy foam. Enjoy the classic balance of smooth and robust flavors in every sip.\"', 9.90, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvthhy8frIY2WeY4dgkTfGd9zzChCeVpv5zw&s', '2024-07-12', 'Coffee'),
(9, 'Americano', '\"A smooth and robust coffee made with rich espresso and hot water. Perfectly balanced, offering a bold yet mellow flavor that’s ideal for any time of day.\"', 6.90, 'https://emilylaurae.com/wp-content/uploads/2022/09/iced-americano-6.jpg', '2024-07-12', 'Coffee'),
(10, 'Croissant', '\"A perfectly baked, golden-brown croissant with a flaky, buttery texture that melts in your mouth. Made with layers of rich, buttery dough for a deliciously light and airy treat.\"', 7.50, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTLxKBn4gtSp-S0vHZlJClT0y_dBXOJGZPnkw&s', '2024-07-12', 'Pastry'),
(11, 'Cromboloni', 'Indulge in the perfect balance of savory and sweet with our Cromboloni. This delectable creation features a warm, buttery pastry shell filled with a rich blend of creamy cheese and a hint of zesty herbs. Each bite offers a delightful contrast of textures ', 8.00, 'https://cdn.idntimes.com/content-images/post/20231128/ilustrasi-cromboloni-86068a8e5719fd03db2d24fa06896905_600x400.jpg', '2024-07-12', 'Pastry'),
(12, 'Donut', '\"A perfectly light and fluffy donut, covered in a shiny, sweet glaze. Each bite is a delicious balance of crisp exterior and soft, airy interior.\"', 3.00, 'https://hips.hearstapps.com/hmg-prod/images/glazed-donut-recipe-1-65008ab2b45fb.jpg?crop=1xw:1xh;center,top&resize=1200:*', '2024-07-12', 'Pastry'),
(13, 'Latte', '\"A velvety blend of rich espresso and creamy steamed milk, topped with a light layer of froth. A timeless favorite that delivers a smooth and balanced coffee experience.\"', 8.90, 'https://www.nescafe.com/mt/sites/default/files/2023-04/RecipeHero_CaramelLatte_1066x1066.jpg', '2024-07-12', 'Coffee'),
(14, 'Mocha', '\"A luscious blend of rich espresso and velvety steamed milk with a generous swirl of smooth chocolate syrup, topped with a layer of whipped cream and a drizzle of chocolate. The perfect harmony of coffee and chocolate.\"', 9.90, 'https://athome.starbucks.com/sites/default/files/2021-06/1_CAH_CaffeMocha_Hdr_2880x16602.jpg', '2024-07-12', 'Coffee'),
(15, 'Hazelnut Latte', '\"A smooth and creamy latte featuring rich espresso combined with velvety steamed milk and a touch of nutty hazelnut syrup. Topped with a light layer of froth, it’s a delightful balance of coffee and nutty sweetness.\"', 9.90, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkpGfcEPGvcDcY-EQ5AduChW4Bbuu6kef4QQ&s', '2024-07-12', 'Coffee'),
(16, 'Caramel Macchiato', '\"Enjoy a delightful combination of bold espresso and creamy steamed milk, drizzled with rich caramel sauce. Topped with a touch of vanilla syrup and a caramel drizzle, it’s a sweet and satisfying coffee treat.\"', 9.90, 'https://images.ctfassets.net/v601h1fyjgba/7ndAMJpSr0vGnWyUGHlygd/40c1dd45124f636097b2775a09c290c6/Caramel_Macchiato.jpg', '2024-07-12', 'Coffee'),
(17, 'Vanilla Latte', '\"A velvety blend of rich espresso and creamy steamed milk, infused with a hint of sweet vanilla syrup. Topped with a light layer of froth, it’s a timeless coffee treat with a comforting vanilla twist.\"', 8.90, 'https://anerdcooks.com/wp-content/uploads/2022/10/iced_vanilla_latte6.jpg', '2024-07-12', 'Coffee'),
(18, 'Spanish Latte', '\"A rich and creamy espresso-based latte with a touch of condensed milk, delivering a smooth and sweet flavor profile. Topped with velvety steamed milk for a comforting and indulgent coffee experience.\"', 7.90, 'https://popmenucloud.com/cdn-cgi/image/width=1200,height=630,format=auto,fit=cover/lzaqjwcu/37a59a8d-0837-4445-b37d-ee3e72b5f6c7.jpg', '2024-07-12', 'Coffee'),
(19, 'Chocolate cake (Per Pieces)', '\"A rich and decadent chocolate cake made with layers of moist, velvety chocolate sponge and frosted with a creamy chocolate ganache. Each bite offers an indulgent chocolate experience that’s pure bliss.\"', 4.90, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_5QMXWFIXRt3_ux5h4lSRXmF5lfSBMeIYHQ&s', '2024-07-12', 'Cakes'),
(20, 'Strawberry cake (Per Pieces)', '\"A light and fluffy vanilla sponge cake layered with fresh, juicy strawberries and velvety whipped cream. Perfectly balanced sweetness with a burst of natural strawberry flavor in every bite.\"', 4.90, 'https://cakesbymk.com/wp-content/uploads/2023/08/Template-Size-for-Blog-Photos-46.jpg', '2024-07-12', 'Cakes'),
(21, 'Vanilla cake (Per Pieces)', '\"A moist and tender vanilla cake with a rich, buttery flavor, topped with a smooth and creamy vanilla buttercream frosting. A timeless favorite that’s perfect for any occasion.\"', 4.90, 'https://www.noracooks.com/wp-content/uploads/2024/01/vegan-vanilla-cake-1-2.jpg', '2024-07-12', 'Cakes'),
(22, 'Lemon cakes (Per Pieces)', '\"A light and moist lemon cake bursting with fresh lemon flavor, topped with a tangy lemon glaze. Perfectly balanced sweetness with a refreshing citrus twist.\"', 4.90, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEfVnPmi3Sjb2kl4aTq9XrKyKpxZQd7GYXRw&s', '2024-07-12', 'Cakes'),
(23, 'Tiramisu (Per Pieces)', '\"A luxurious Italian dessert featuring layers of espresso-soaked ladyfingers, creamy mascarpone cheese, and a dusting of rich cocoa powder. A perfect blend of coffee and cream for an indulgent treat.\"', 6.90, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSH-Y8eDWyZSKaZBblQMq3QLnKlRePqyhWD5Q&s', '2024-07-12', 'Cakes'),
(24, 'Cheesecake (Per Pieces)', '\"A rich and creamy New York-style cheesecake with a velvety smooth texture and a buttery graham cracker crust. Baked to perfection and finished with a light sour cream topping for a timeless, indulgent treat.\"', 6.90, 'https://www.marthastewart.com/thmb/m6R1D2iuHvVxM8u7RJz7c-Us8Rg=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/MSL-865202-new-york-cheesecake-hero-horiz-0723-84e3c796119d408581d1ef4d02d801cd.jpg', '2024-07-12', 'Cakes'),
(25, 'Red Velvet (Per Pieces)', '\"A stunning red velvet cake with a rich, moist crumb and a subtle cocoa flavor, layered and frosted with creamy cream cheese frosting. Finished with a dusting of red velvet cake crumbs for a classic and elegant dessert.\"', 6.90, 'https://handletheheat.com/wp-content/uploads/2013/04/red-velvet-cake-recipe-SQUARE.jpg', '2024-07-12', 'Cakes'),
(26, 'Puff Pastry', '\"Light, flaky, and golden-brown, our classic puff pastry is made with layers of buttery dough, baked to perfection. Each bite offers a delightful crunch and airy texture that\'s simply irresistible.\"', 3.50, 'https://www.allrecipes.com/thmb/Q_AQmmF7A_zqqygEJIpfEGbFdB0=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/rough-puff-ddmfs-3x4-131-54dfcc666b39480fb9cc27bdd1e45a6a.jpg', '2024-07-12', 'Pastry'),
(27, 'Danish Tart', '\"A flaky, buttery tart filled with a smooth, creamy custard and topped with a light glaze. Perfectly baked to golden perfection, it’s a delightful treat with a rich and satisfying flavor.\"', 3.50, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRh8Q-qVIZ1ktcFhVdLxO8prUGaeceGcl2PqA&s', '2024-07-12', 'Pastry'),
(28, 'Baklava', '\"Experience the rich, sweet layers of our classic baklava, featuring flaky phyllo dough filled with a blend of chopped nuts and honey. Each piece is baked to golden perfection and drizzled with a touch of syrup for an indulgent treat.\"', 4.00, 'https://img.sndimg.com/food/image/upload/q_92,fl_progressive,w_1200,c_scale/v1/img/recipes/59/86/3/Ye35HYGSEGgc0oGCIUag_Baklava-2.jpg', '2024-07-12', 'Pastry'),
(29, 'Apple Pie', '\"Enjoy a slice of our classic apple pie, featuring tender, spiced apples encased in a flaky, buttery crust. Baked to golden perfection and finished with a hint of cinnamon, it\'s a comforting and timeless favorite.\"', 4.50, 'https://joyfoodsunshine.com/wp-content/uploads/2019/08/best-apple-pie-recipe-from-scratch-8.jpg', '2024-07-12', 'Pastry'),
(30, 'Strudel', '\"Enjoy the vibrant flavors of our cherry strudel, with a luscious filling of sweet, juicy cherries encased in crisp, flaky dough. Lightly dusted with powdered sugar and served warm, it’s a delightful treat for any occasion.\"', 4.50, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0NYw3LlkU-xHGupK_UuRGEWX6LJ0qsTm5Ng&s', '2024-07-12', 'Pastry'),
(31, 'Curry Puff', 'Crispy and soft Curry Chicken Puff', 3.00, '$', '2024-07-13', 'Pastry');

-- --------------------------------------------------------

--
-- Table structure for table `ordermenu`
--

CREATE TABLE `ordermenu` (
  `orderID` int(10) UNSIGNED NOT NULL,
  `custID` int(10) UNSIGNED NOT NULL,
  `orderAddress` varchar(255) DEFAULT NULL,
  `orderDate` varchar(20) NOT NULL,
  `eatOption` varchar(30) NOT NULL,
  `paymentMethod` varchar(30) NOT NULL,
  `orderStatus` varchar(40) NOT NULL,
  `grandTotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordermenu`
--

INSERT INTO `ordermenu` (`orderID`, `custID`, `orderAddress`, `orderDate`, `eatOption`, `paymentMethod`, `orderStatus`, `grandTotal`) VALUES
(1, 1, 'Kolej Kerawang UiTM Kuala Terengganu', '23-07-2023', 'Delivery', 'Cash', 'Order Received', 20.70),
(2, 1, 'LCK Restaurant', '23-07-2023', 'Dine in', 'Cash', 'Order Cancelled', 4.20),
(3, 1, 'LCK Restaurant', '23-07-2023', 'Dine in', 'Cash', 'Order Received', 17.00),
(4, 2, 'Kolej Kerawang UiTM Kuala Terengganu', '23-07-2023', 'Delivery', 'Cash', 'Order Received', 22.80),
(5, 2, 'LCK Restaurant', '23-07-2023', 'Takeaway', 'Cash', 'Order Received', 9.50),
(6, 3, 'LCK Restaurant', '24-07-2023', 'Takeaway', 'Online Transaction (FPX)', 'Order Received', 48.80),
(7, 3, 'Kolej Kerawang UiTM Kuala Terengganu ', '24-07-2023', 'Delivery', 'Cash', 'Order Received', 18.60),
(8, 1, 'LCK Restaurant', '24-07-2023', 'Takeaway', 'Debit/Credit Card', 'Order Received', 7.40),
(9, 7, 'LCK Restaurant', '09-07-2024', 'Takeaway', 'Online Transaction (FPX)', 'Order Received', 10.60),
(10, 7, 'LCK Restaurant', '11-07-2024', 'Takeaway', 'Online Transaction (FPX)', 'Order Received', 6.40),
(11, 9, 'LCK Restaurant', '13-07-2024', 'Dine in', 'Cash', 'Order Received', 23.20);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(10) UNSIGNED NOT NULL,
  `staffName` varchar(100) NOT NULL,
  `staffGender` varchar(8) NOT NULL,
  `staffPhoneNum` varchar(20) NOT NULL,
  `staffEmail` varchar(255) NOT NULL,
  `staffPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `staffName`, `staffGender`, `staffPhoneNum`, `staffEmail`, `staffPassword`) VALUES
(5, 'hu tao', 'female', '0113905010', 'Abcd@gmail.com', '3e0cd7dbf477f6da9831acd7c1d617bc'),
(6, 'admin', 'male', '0113905010', 'fotokopi@gmail.com', '3e0cd7dbf477f6da9831acd7c1d617bc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`foodID`);

--
-- Indexes for table `ordermenu`
--
ALTER TABLE `ordermenu`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ordermenu`
--
ALTER TABLE `ordermenu`
  MODIFY `orderID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
