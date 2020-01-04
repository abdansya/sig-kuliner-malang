-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2016 at 04:36 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gis_warung`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `user`, `pass`, `nama`) VALUES
(1, 'admin', 'password', 'abdan');

-- --------------------------------------------------------

--
-- Table structure for table `w_bakso`
--

CREATE TABLE `w_bakso` (
  `id` int(4) NOT NULL,
  `nama_warung` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `w_bakso`
--

INSERT INTO `w_bakso` (`id`, `nama_warung`, `alamat`, `latitude`, `longitude`, `gambar`, `harga`, `jam_buka`, `jam_tutup`, `deskripsi`) VALUES
(5, 'Bakso Boom', 'Jl. Gajayana', '-7.9479255', '112.608672', '24463-bakso boom.jpg', '12000', '08:00:00', '17:00:00', ''),
(6, 'Bakso Edy', 'Jl. Sunan Kalijaga No.45', '-7.9534296', '112.606816', '61978-bakso edy.jpg', '8000', '09:00:00', '22:00:00', ''),
(7, 'Bakso Emha', 'Jl. Mertojoyo No.12', '-7.9432713', '112.603973', '53413-bakso emha.jpg', '5000', '13:00:00', '24:00:00', ''),
(8, 'Bakso Granat', 'Jl. Sumber Sari No.76', '-7.9524733', '112.609562', '52570-bakso granat.jpg', '15000', '09:00:00', '20:00:00', ''),
(9, 'Bakso Iga Sapi', 'Jl. MT Haryono No.15', '-7.9419537', '112.609326', '58144-bakso iga sapi.JPG', '25000', '07:00:00', '21:00:00', ''),
(10, 'Bakso Jawi', 'Jl. Sumber Sari No. 274', '-7.9562560', '112.612202', '2120-bakso jawi.jpg', '15000', '10:00:00', '20:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `w_bakso`
--
ALTER TABLE `w_bakso`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `w_bakso`
--
ALTER TABLE `w_bakso`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
