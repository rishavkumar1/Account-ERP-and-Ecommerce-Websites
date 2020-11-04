-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2020 at 12:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` tinytext NOT NULL,
  `Purpose_name` varchar(255) NOT NULL,
  `Company_type` varchar(255) NOT NULL,
  `Purpose` text NOT NULL,
  `Paid_capital` varchar(255) NOT NULL,
  `Authorized_capital` varchar(255) NOT NULL,
  `Address` text NOT NULL,
  `Address_file_name` varchar(255) NOT NULL,
  `Company_other_file` varchar(255) NOT NULL,
  `Company_noc` varchar(255) NOT NULL,
  `Company_purpose_name` varchar(255) NOT NULL,
  `Company_email` varchar(255) NOT NULL,
  `Company_purpose` varchar(255) NOT NULL,
  `Company_objective` varchar(255) NOT NULL,
  `Company_mobile` varchar(255) NOT NULL,
  `Company_address` varchar(255) NOT NULL,
  `Company_dir_name` varchar(255) NOT NULL,
  `Company_dir_din` varchar(255) NOT NULL,
  `Company_dir_email` varchar(255) NOT NULL,
  `Company_dir_mobile` varchar(255) NOT NULL,
  `Company_particular` varchar(255) NOT NULL,
  `Company_nshares` varchar(255) NOT NULL,
  `Company_share_amount` varchar(255) NOT NULL,
  `Company_total` varchar(255) NOT NULL,
  `Quotation_company_name` varchar(255) NOT NULL,
  `Quotation_email` varchar(255) NOT NULL,
  `Quotation_purpose` text NOT NULL,
  `Quotation_mobile` varchar(255) NOT NULL,
  `Quotation_address` text NOT NULL,
  `Quotation_number` varchar(255) NOT NULL,
  `Date_expiry` date NOT NULL,
  `Quotation_description` varchar(255) NOT NULL,
  `print` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Quotation_total` varchar(255) NOT NULL,
  `Director_name` varchar(255) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Director_mobile` varchar(255) NOT NULL,
  `Share_pattern` varchar(255) NOT NULL,
  `Education` varchar(255) NOT NULL,
  `DIN_number` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Director_email` varchar(255) NOT NULL,
  `PAN_number` varchar(255) NOT NULL,
  `Occupation` varchar(255) NOT NULL,
  `PAN` varchar(255) NOT NULL,
  `Director_address_file` varchar(255) NOT NULL,
  `Passport` varchar(255) NOT NULL,
  `Driving_license` varchar(255) NOT NULL,
  `Voting_card` varchar(255) NOT NULL,
  `Bank_statement` varchar(255) NOT NULL,
  `Light_bill` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Director_sign` varchar(255) NOT NULL,
  `Director_other_file` varchar(255) NOT NULL,
  `Director_noc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `Purpose_name`, `Company_type`, `Purpose`, `Paid_capital`, `Authorized_capital`, `Address`, `Address_file_name`, `Company_other_file`, `Company_noc`, `Company_purpose_name`, `Company_email`, `Company_purpose`, `Company_objective`, `Company_mobile`, `Company_address`, `Company_dir_name`, `Company_dir_din`, `Company_dir_email`, `Company_dir_mobile`, `Company_particular`, `Company_nshares`, `Company_share_amount`, `Company_total`, `Quotation_company_name`, `Quotation_email`, `Quotation_purpose`, `Quotation_mobile`, `Quotation_address`, `Quotation_number`, `Date_expiry`, `Quotation_description`, `print`, `Quantity`, `Quotation_total`, `Director_name`, `Date_of_Birth`, `Director_mobile`, `Share_pattern`, `Education`, `DIN_number`, `Gender`, `Director_email`, `PAN_number`, `Occupation`, `PAN`, `Director_address_file`, `Passport`, `Driving_license`, `Voting_card`, `Bank_statement`, `Light_bill`, `Photo`, `Director_sign`, `Director_other_file`, `Director_noc`) VALUES
(3, 'rishavkumar407@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'rishav407@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'krishika@gmail.com', '900150983cd24fb0d6963f7d28e17f72', 'fv', 'fv', 'Enter your purpose here.', 'fsv', 'fv', 'Enter your address here.', '1st.PNG', '1st.PNG', '1st.PNG', 'dccc', 'rishavkumar407@gmail.com', 'Enter your purpose here.', 'Enter objective of company here.', '5646146135', 'Enter your address here.', 'dcds', 'da', 'rishavk@iitk.ac.in', '345678912', 'dadsad', 'adasd', 'asdad', 'lkml', 'wd', 'rishavkumar407@gmail.com', 'Enter your purpose here.', '5646146135', 'Enter your address here.', 'erw', '0000-00-00', 'hhbk', 'lkmk', 'k', 'lkml', 'vv', '0000-00-00', '5646146135', 'fdd', 'fdg', 'dfg', 'fdg', 'rishavkumar407@mail.com', 'eede', 'llmlkmf', '4th.png', 'Screenshot (6).png', 'Screenshot (15).png', 'Screenshot (16).png', 'Screenshot (17).png', 'Screenshot (18).png', 'Screenshot (10).png', '5th.png', 'Screenshot (17).png', 'Screenshot (5).png', 'Screenshot (6).png'),
(12, 'arsh@gmail.com', 'd16fb36f0911f878998c136191af705e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
