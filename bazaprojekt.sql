-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 10:59 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bazaprojekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `clanci`
--

CREATE TABLE `clanci` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) COLLATE cp1250_croatian_ci NOT NULL,
  `naslov` varchar(64) COLLATE cp1250_croatian_ci NOT NULL,
  `sazetak` text COLLATE cp1250_croatian_ci NOT NULL,
  `tekst` text COLLATE cp1250_croatian_ci NOT NULL,
  `slika` varchar(64) COLLATE cp1250_croatian_ci NOT NULL,
  `kategorija` varchar(64) COLLATE cp1250_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `clanci`
--

INSERT INTO `clanci` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(3, '19.06.2019.', 'Test', 'Test test test test test.', 'Eto nešto da testiram čisto reda radi npr hrvatske znakove itd.', '2009-Maserati.jpg', 'sport', 0),
(6, '19.06.2019.', 'Novo kulturno događanje', 'Eto neko novo kulturno događanje', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum porta. Nullam volutpat, elit a suscipit auctor, orci sapien feugiat nisi, sed aliquam mi lectus at magna. Nunc placerat eros justo, nec tempor nunc condimentum et. Integer eros nisi, pulvinar at urna at, imperdiet ullamcorper metus. In dignissim consectetur est eu pellentesque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin in nunc eget leo malesuada viverra. Fusce sodales turpis commodo velit imperdiet, vel congue dui rutrum. Aliquam vehicula vitae justo fringilla venenatis. Ut sollicitudin nisi ut felis placerat, at mollis ligula mollis.\r\n\r\nMorbi imperdiet turpis eget mi elementum, nec placerat sem rhoncus. Maecenas rhoncus tristique nisl. Vestibulum leo eros, fermentum a varius vitae, blandit id purus. Nullam eu justo scelerisque, ullamcorper eros sit amet, auctor orci. Nunc tempor purus ac tortor blandit iaculis. Suspendisse vehicula massa ac lacus bibendum, et consequat velit euismod. Quisque non porttitor libero. Phasellus facilisis lorem eu congue eleifend. Sed malesuada tempus suscipit. Ut at turpis sed dui finibus finibus.\r\n\r\nDuis dictum sem vitae purus commodo maximus. Vivamus tempus turpis metus, at aliquam orci sodales vitae. Morbi in metus cursus, placerat mauris quis, pharetra nibh. Sed vitae aliquet lorem. Fusce dapibus porta urna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc eu justo sed sapien pellentesque luctus vitae tempor arcu. Ut euismod venenatis sapien, sed posuere sapien ullamcorper nec. Aliquam suscipit justo ligula, non pretium massa suscipit sodales. Sed mattis convallis imperdiet. Aenean interdum, nulla egestas tempor mattis, urna neque mattis neque, vitae convallis dui neque malesuada tellus. Nam ultrices ex id arcu luctus, eget consectetur turpis feugiat. ', '2009-Maserati.jpg', 'kultura', 0),
(7, '19.06.2019.', 'Novo kulturno događanje', 'Eto neko novo kulturno događanje', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum porta. Nullam volutpat, elit a suscipit auctor, orci sapien feugiat nisi, sed aliquam mi lectus at magna. Nunc placerat eros justo, nec tempor nunc condimentum et. Integer eros nisi, pulvinar at urna at, imperdiet ullamcorper metus. In dignissim consectetur est eu pellentesque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin in nunc eget leo malesuada viverra. Fusce sodales turpis commodo velit imperdiet, vel congue dui rutrum. Aliquam vehicula vitae justo fringilla venenatis. Ut sollicitudin nisi ut felis placerat, at mollis ligula mollis.\r\n\r\nMorbi imperdiet turpis eget mi elementum, nec placerat sem rhoncus. Maecenas rhoncus tristique nisl. Vestibulum leo eros, fermentum a varius vitae, blandit id purus. Nullam eu justo scelerisque, ullamcorper eros sit amet, auctor orci. Nunc tempor purus ac tortor blandit iaculis. Suspendisse vehicula massa ac lacus bibendum, et consequat velit euismod. Quisque non porttitor libero. Phasellus facilisis lorem eu congue eleifend. Sed malesuada tempus suscipit. Ut at turpis sed dui finibus finibus.\r\n\r\nDuis dictum sem vitae purus commodo maximus. Vivamus tempus turpis metus, at aliquam orci sodales vitae. Morbi in metus cursus, placerat mauris quis, pharetra nibh. Sed vitae aliquet lorem. Fusce dapibus porta urna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc eu justo sed sapien pellentesque luctus vitae tempor arcu. Ut euismod venenatis sapien, sed posuere sapien ullamcorper nec. Aliquam suscipit justo ligula, non pretium massa suscipit sodales. Sed mattis convallis imperdiet. Aenean interdum, nulla egestas tempor mattis, urna neque mattis neque, vitae convallis dui neque malesuada tellus. Nam ultrices ex id arcu luctus, eget consectetur turpis feugiat. ', '2009-Maserati.jpg', 'kultura', 0),
(17, '19.06.2019.', 'Novi zanimljiv naslov', 'Eto neki mali tekstić', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum porta. Nullam volutpat, elit a suscipit auctor, orci sapien feugiat nisi, sed aliquam mi lectus at magna. Nunc placerat eros justo, nec tempor nunc condimentum et. Integer eros nisi, pulvinar at urna at, imperdiet ullamcorper metus. In dignissim consectetur est eu pellentesque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin in nunc eget leo malesuada viverra. Fusce sodales turpis commodo velit imperdiet, vel congue dui rutrum. Aliquam vehicula vitae justo fringilla venenatis. Ut sollicitudin nisi ut felis placerat, at mollis ligula mollis.\r\n\r\nMorbi imperdiet turpis eget mi elementum, nec placerat sem rhoncus. Maecenas rhoncus tristique nisl. Vestibulum leo eros, fermentum a varius vitae, blandit id purus. Nullam eu justo scelerisque, ullamcorper eros sit amet, auctor orci. Nunc tempor purus ac tortor blandit iaculis. Suspendisse vehicula massa ac lacus bibendum, et consequat velit euismod. Quisque non porttitor libero. Phasellus facilisis lorem eu congue eleifend. Sed malesuada tempus suscipit. Ut at turpis sed dui finibus finibus. ', '2009-Maserati.jpg', 'kultura', 1),
(18, '19.06.2019.', 'Novi zanimljiv naslov', 'Eto neki mali tekstić', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum porta. Nullam volutpat, elit a suscipit auctor, orci sapien feugiat nisi, sed aliquam mi lectus at magna. Nunc placerat eros justo, nec tempor nunc condimentum et. Integer eros nisi, pulvinar at urna at, imperdiet ullamcorper metus. In dignissim consectetur est eu pellentesque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin in nunc eget leo malesuada viverra. Fusce sodales turpis commodo velit imperdiet, vel congue dui rutrum. Aliquam vehicula vitae justo fringilla venenatis. Ut sollicitudin nisi ut felis placerat, at mollis ligula mollis.\r\n\r\nMorbi imperdiet turpis eget mi elementum, nec placerat sem rhoncus. Maecenas rhoncus tristique nisl. Vestibulum leo eros, fermentum a varius vitae, blandit id purus. Nullam eu justo scelerisque, ullamcorper eros sit amet, auctor orci. Nunc tempor purus ac tortor blandit iaculis. Suspendisse vehicula massa ac lacus bibendum, et consequat velit euismod. Quisque non porttitor libero. Phasellus facilisis lorem eu congue eleifend. Sed malesuada tempus suscipit. Ut at turpis sed dui finibus finibus. ', '2009-Maserati.jpg', 'zanimljivo', 0),
(19, '19.06.2019.', 'Novi zanimljiv naslov', 'Eto neki mali tekstić', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum porta. Nullam volutpat, elit a suscipit auctor, orci sapien feugiat nisi, sed aliquam mi lectus at magna. Nunc placerat eros justo, nec tempor nunc condimentum et. Integer eros nisi, pulvinar at urna at, imperdiet ullamcorper metus. In dignissim consectetur est eu pellentesque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin in nunc eget leo malesuada viverra. Fusce sodales turpis commodo velit imperdiet, vel congue dui rutrum. Aliquam vehicula vitae justo fringilla venenatis. Ut sollicitudin nisi ut felis placerat, at mollis ligula mollis.\r\n\r\nMorbi imperdiet turpis eget mi elementum, nec placerat sem rhoncus. Maecenas rhoncus tristique nisl. Vestibulum leo eros, fermentum a varius vitae, blandit id purus. Nullam eu justo scelerisque, ullamcorper eros sit amet, auctor orci. Nunc tempor purus ac tortor blandit iaculis. Suspendisse vehicula massa ac lacus bibendum, et consequat velit euismod. Quisque non porttitor libero. Phasellus facilisis lorem eu congue eleifend. Sed malesuada tempus suscipit. Ut at turpis sed dui finibus finibus. ', '2009-Maserati.jpg', 'zanimljivo', 0),
(20, '15.05.2018.', 'Neka stara vijest', 'vijest je za arhivu', 'arhiva', '2009-Maserati.jpg', 'sport', 1),
(21, '19.06.2019.', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum porta. Nullam volutpat, elit a suscipit auctor, orci sapien feugiat nisi, sed aliquam mi lectus at magna. Nunc placerat eros justo, nec tempor nunc condimentum et. Integer eros nisi, pulvinar at urna at, imperdiet ullamcorper metus. In dignissim consectetur est eu pellentesque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin in nunc eget leo malesuada viverra. Fusce sodales turpis commodo velit imperdiet, vel congue dui rutrum. Aliquam vehicula vitae justo fringilla venenatis. Ut sollicitudin nisi ut felis placerat, at mollis ligula mollis.\r\n\r\nMorbi imperdiet turpis eget mi elementum, nec placerat sem rhoncus. Maecenas rhoncus tristique nisl. Vestibulum leo eros, fermentum a varius vitae, blandit id purus. Nullam eu justo scelerisque, ullamcorper eros sit amet, auctor orci. Nunc tempor purus ac tortor blandit iaculis. Suspendisse vehicula massa ac lacus bibendum, et consequat velit euismod. Quisque non porttitor libero. Phasellus facilisis lorem eu congue eleifend. Sed malesuada tempus suscipit. Ut at turpis sed dui finibus finibus. ', '2009-Maserati.jpg', 'sport', 0),
(33, '20.06.2019.', 'Naslov', 'Eto neki naslov', '1', '2009-Maserati.jpg', 'zanimljivo', 0),
(34, '20.06.2019.', 'Nesto novoga', 'Stiže osvježenje u subotu!', 'Kreće ciklona prema hrvatskoj. Biti će pretežno oblačno u petak ali se očekuje pogoršanje vremena u subotu. Kiša i grmljavinsko nevrijeme će biti tokom subote i nedjelje!', '2009-Maserati.jpg', 'novosti', 1),
(36, '21.06.2019.', 'Neka nova vijest iz sporta', 'Reprezentacija osvojila srebro!', 'Po prvi puta u povijesti Hrvatska reprezentacija je osvojila srebro!\r\nZadnji puta kada su osvojili broncu bila je 1998. godina.', '2009-Maserati.jpg', 'sport', 0),
(37, '21.06.2019.', 'Neka nova sporta vijest', 'Neka novost u sportskom svijetu.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu hendrerit mi. Aliquam pretium purus eu nibh fringilla pellentesque. Pellentesque in ex consequat est rhoncus rutrum ut sed nunc. Cras elementum ante ut dui euismod convallis eget in velit. Vestibulum et odio molestie, eleifend neque ut, ultricies lectus. Cras a maximus libero. Donec quis euismod nisi. Etiam vestibulum, lacus non lacinia scelerisque, sapien sem euismod libero, et facilisis lorem massa eu odio. Nulla varius neque nibh, non pellentesque dolor pretium nec. In ornare viverra arcu, non egestas nisl interdum non. ', '2009-Maserati.jpg', 'sport', 0),
(38, '21.06.2019.', 'Proba na chromeu', 'eto neki kratki sadržaj', 'Neki sadržaj', '2009-Maserati.jpg', 'sport', 1),
(39, '21.06.2019.', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tristique et egestas quis ipsum suspendisse. Sociis natoque penatibus et magnis dis parturient. Tellus orci ac auctor augue mauris augue neque gravida. Amet risus nullam eget felis eget nunc lobortis. Amet cursus sit amet dictum sit amet justo. Justo laoreet sit amet cursus sit. Ante in nibh mauris cursus mattis molestie a iaculis. Augue mauris augue neque gravida. Massa placerat duis ultricies lacus.', '2009-Maserati.jpg', 'kultura', 0),
(40, '21.06.2019.', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tristique et egestas quis ipsum suspendisse. Sociis natoque penatibus et magnis dis parturient. Tellus orci ac auctor augue mauris augue neque gravida. Amet risus nullam eget felis eget nunc lobortis. Amet cursus sit amet dictum sit amet justo. Justo laoreet sit amet cursus sit. Ante in nibh mauris cursus mattis molestie a iaculis. Augue mauris augue neque gravida. Massa placerat duis ultricies lacus.', '2009-Maserati.jpg', 'kultura', 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) COLLATE cp1250_croatian_ci NOT NULL,
  `prezime` varchar(50) COLLATE cp1250_croatian_ci NOT NULL,
  `username` varchar(50) COLLATE cp1250_croatian_ci NOT NULL,
  `lozinka` varchar(255) COLLATE cp1250_croatian_ci NOT NULL,
  `razina` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `username`, `lozinka`, `razina`) VALUES
(1, 'Matija', 'Topolovec', 'mtopolov', '$2y$10$pmOf6W0lYySR5LIbr4SyKuJDMRJcp2p2wxj7Eug84GsF/eVNQ/xo2', 0),
(2, 'Ivo', 'Ivić', 'Admin', '$2y$10$zcMg5vBySYQk8LsnLpNIZOjIdFxVLiIbuiKM8N5MeXM8XdrvB1aC2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clanci`
--
ALTER TABLE `clanci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanci`
--
ALTER TABLE `clanci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
