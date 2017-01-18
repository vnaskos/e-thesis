-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 07, 2017 at 02:13 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 5.6.29-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ethesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `project_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`project_id`, `student_id`, `status`, `created_date`, `modified_date`) VALUES
(1, 2, 0, '2017-01-07 12:06:45', '2017-01-07 12:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `text`, `user_id`, `created_date`) VALUES
(1, 'Student (James Bond) applied to project (Î”Î·Î¼Î¹Î¿Ï…ÏÎ³Î¯Î± Î·Î»ÎµÎºÏ„ÏÎ¿Î½Î¹ÎºÎ¿Ï Ï†Î±ÎºÎ­Î»Î¿Ï… Î¼Î±Î¸Î®Î¼Î±Ï„Î¿Ï‚ Î³Î¹Î± Ï„Î·Î½ Î­Î½Î½Î¿Î¹Î± Â«Î£ÎµÎ¹ÏÎ­Ï‚ FourierÂ»)', 1, '2017-01-07 12:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prof_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `title`, `description`, `prof_id`, `status`, `created_date`, `modified_date`) VALUES
(1, 'Î”Î·Î¼Î¹Î¿Ï…ÏÎ³Î¯Î± Î·Î»ÎµÎºÏ„ÏÎ¿Î½Î¹ÎºÎ¿Ï Ï†Î±ÎºÎ­Î»Î¿Ï… Î¼Î±Î¸Î®Î¼Î±Ï„Î¿Ï‚ Î³Î¹Î± Ï„Î·Î½ Î­Î½Î½Î¿Î¹Î± Â«Î£ÎµÎ¹ÏÎ­Ï‚ FourierÂ»', '<h3><strong>&Alpha;&pi;&alpha;&rho;&alpha;Î¯&tau;&eta;&tau;&epsilon;&sigmaf; &gamma;&nu;ÏŽ&sigma;&epsilon;&iota;&sigmaf; &sigma;&tau;&alpha; &alpha;&kappa;ÏŒ&lambda;&omicron;&upsilon;&theta;&alpha; &alpha;&nu;&tau;&iota;&kappa;&epsilon;Î¯&mu;&epsilon;&nu;&alpha;</strong><strong>:</strong></h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p>&Delta;&iota;&delta;&alpha;&kappa;&tau;&iota;&kappa;Î® &kappa;&alpha;&iota; &tau;&epsilon;&chi;&nu;&iota;&kappa;Î­&sigmaf; &pi;&alpha;&rho;&omicron;&upsilon;&sigma;Î¯&alpha;&sigma;&eta;&sigmaf;.</p>\r\n	</li>\r\n	<li>\r\n	<p>&Lambda;&omicron;&gamma;&iota;&sigma;&mu;ÏŒ&sigmaf; &Iota;, &Lambda;&omicron;&gamma;&iota;&sigma;&mu;ÏŒ&sigmaf; &Iota;&Iota;.</p>\r\n	</li>\r\n	<li>\r\n	<p>&Lambda;&omicron;&gamma;&iota;&sigma;&mu;&iota;&kappa;ÏŒ Mathematica.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h3><strong>&Sigma;&upsilon;&nu;&omicron;&pi;&tau;&iota;&kappa;Î® &pi;&epsilon;&rho;&iota;&gamma;&rho;&alpha;&phi;Î® - &sigma;&tau;ÏŒ&chi;&omicron;&iota;:</strong></h3>\r\n\r\n<p>&Sigma;&tau;&eta;&nu; &epsilon;&rho;&gamma;&alpha;&sigma;Î¯&alpha; &alpha;&upsilon;&tau;Î® &zeta;&eta;&tau;&omicron;Ï&nu;&tau;&alpha;&iota; &tau;&alpha; &alpha;&kappa;ÏŒ&lambda;&omicron;&upsilon;&theta;&alpha;:</p>\r\n\r\n<ul>\r\n	<li>&Sigma;Ï&gamma;&chi;&rho;&omicron;&nu;&eta; &delta;&iota;&delta;&alpha;&sigma;&kappa;&alpha;&lambda;Î¯&alpha; &alpha;&nu;ÏŽ&tau;&epsilon;&rho;&omega;&nu; &mu;&alpha;&theta;&eta;&mu;&alpha;&tau;&iota;&kappa;ÏŽ&nu;</li>\r\n	<li>\r\n	<p>&Eta; &chi;&rho;Î®&sigma;&eta; &eta;&lambda;&epsilon;&kappa;&tau;&rho;&omicron;&nu;&iota;&kappa;&omicron;Ï &upsilon;&pi;&omicron;&lambda;&omicron;&gamma;&iota;&sigma;&tau;Î® &kappa;&alpha;&tau;Î¬ &tau;&eta; &delta;&iota;&delta;&alpha;&sigma;&kappa;&alpha;&lambda;Î¯&alpha; &alpha;&nu;ÏŽ&tau;&epsilon;&rho;&omega;&nu; &mu;&alpha;&theta;&eta;&mu;&alpha;&tau;&iota;&kappa;ÏŽ&nu;</p>\r\n	</li>\r\n	<li>\r\n	<p>&Delta;&omicron;&mu;Î® &kappa;&alpha;&iota; &omicron;&rho;&gamma;Î¬&nu;&omega;&sigma;&eta; &eta;&lambda;&epsilon;&kappa;&tau;&rho;&omicron;&nu;&iota;&kappa;&omicron;Ï &phi;&alpha;&kappa;Î­&lambda;&omicron;&upsilon; &mu;&alpha;&theta;Î®&mu;&alpha;&tau;&omicron;&sigmaf;</p>\r\n	</li>\r\n	<li>\r\n	<p>&Delta;&iota;&delta;&alpha;&sigma;&kappa;&alpha;&lambda;Î¯&alpha; &tau;&eta;&sigmaf; Î­&nu;&nu;&omicron;&iota;&alpha;&sigmaf; &laquo;&Sigma;&epsilon;&iota;&rho;Î­&sigmaf; Fourier&raquo;</p>\r\n	</li>\r\n	<li>\r\n	<p>&Beta;&alpha;&sigma;&iota;&kappa;Î¬ &delta;&omicron;&mu;&iota;&kappa;Î¬ &sigma;&tau;&omicron;&iota;&chi;&epsilon;Î¯&alpha; &tau;&omicron;&upsilon; &lambda;&omicron;&gamma;&iota;&sigma;&mu;&iota;&kappa;&omicron;Ï Mathematica</p>\r\n	</li>\r\n	<li>\r\n	<p>&Epsilon;&pi;Î¯&lambda;&upsilon;&sigma;&eta; &beta;&alpha;&sigma;&iota;&kappa;ÏŽ&nu; &pi;&alpha;&rho;&alpha;&delta;&epsilon;&iota;&gamma;&mu;Î¬&tau;&omega;&nu; &sigma;&epsilon;&iota;&rho;ÏŽ&nu; Fourier &mu;&epsilon; &tau;&eta; &beta;&omicron;Î®&theta;&epsilon;&iota;&alpha; &tau;&omicron;&upsilon; &lambda;&omicron;&gamma;&iota;&sigma;&mu;&iota;&kappa;&omicron;Ï Mathematica</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&Pi;&alpha;&rho;&alpha;&delta;&omicron;&tau;Î­&alpha;: &Tau;&alpha; &pi;&alpha;&rho;&alpha;&delta;&omicron;&tau;Î­&alpha; &theta;&alpha; &epsilon;Î¯&nu;&alpha;&iota;: &tau;&omicron; &beta;&iota;&beta;&lambda;Î¯&omicron; &tau;&eta;&sigmaf; &pi;&tau;&upsilon;&chi;&iota;&alpha;&kappa;Î®&sigmaf; &epsilon;&rho;&gamma;&alpha;&sigma;Î¯&alpha;&sigmaf; &kappa;&alpha;&theta;ÏŽ&sigmaf; &kappa;&alpha;&iota; &tau;&omicron; &delta;&eta;&mu;&iota;&omicron;&upsilon;&rho;&gamma;&eta;&mu;Î­&nu;&alpha; &eta;&lambda;&epsilon;&kappa;&tau;&rho;&omicron;&nu;&iota;&kappa;Î¬ &delta;&iota;&alpha;&gamma;&omega;&nu;Î¯&sigma;&mu;&alpha;&tau;&alpha;, &sigma;&upsilon;&nu;&omicron;&delta;&epsilon;&upsilon;ÏŒ&mu;&epsilon;&nu;&alpha; &alpha;&pi;ÏŒ CD-ROM.</p>\r\n\r\n<p>&Alpha;&pi;&alpha;&iota;&tau;&omicron;Ï&mu;&epsilon;&nu;&omicron;&sigmaf; &epsilon;&xi;&omicron;&pi;&lambda;&iota;&sigma;&mu;ÏŒ&sigmaf;: &Eta;/&Upsilon;, &tau;&omicron; &lambda;&omicron;&gamma;&iota;&sigma;&mu;&iota;&kappa;ÏŒ Mathematica</p>\r\n\r\n<h3><strong>&Beta;&iota;&beta;&lambda;&iota;&omicron;&gamma;&rho;&alpha;&phi;Î¯&alpha;</strong>:</h3>\r\n\r\n<ol>\r\n	<li>\r\n	<p>&Beta;&alpha;&kappa;&alpha;&lambda;&omicron;Ï&delta;&eta;&sigmaf;, &Alpha;. (2003). <em>&Delta;&iota;&delta;Î¬&sigma;&kappa;&omicron;&nu;&tau;&alpha;&sigmaf; &kappa;&alpha;&iota; &mu;&alpha;&theta;&alpha;Î¯&nu;&omicron;&nu;&tau;&alpha;&sigmaf; &mu;&epsilon; &tau;&iota;&sigmaf; &nu;Î­&epsilon;&sigmaf; &tau;&epsilon;&chi;&nu;&omicron;&lambda;&omicron;&gamma;Î¯&epsilon;&sigmaf;</em>. &Alpha;&theta;Î®&nu;&alpha;: &Pi;&alpha;&tau;Î¬&kappa;&eta;&sigmaf;.</p>\r\n	</li>\r\n	<li>\r\n	<p>&Kappa;&alpha;&mu;&pi;&omicron;&upsilon;&rho;Î¬&kappa;&eta;&sigmaf;, &Gamma;. &amp; &Kappa;&omicron;&upsilon;&kappa;Î®&sigmaf;, &Epsilon;. (2006). <em>&Eta;&lambda;&epsilon;&kappa;&tau;&rho;&omicron;&nu;&iota;&kappa;Î® &mu;Î¬&theta;&eta;&sigma;&eta;</em>. &Alpha;&theta;Î®&nu;&alpha;: &Kappa;&lambda;&epsilon;&iota;&delta;Î¬&rho;&iota;&theta;&mu;&omicron;&sigmaf;.</p>\r\n	</li>\r\n	<li>\r\n	<p>&Sigma;Î¬&lambda;&tau;&alpha;&sigmaf;, &Beta;. (2008). <em>&Sigma;Ï&gamma;&chi;&rho;&omicron;&nu;&eta; &delta;&iota;&delta;&alpha;&sigma;&kappa;&alpha;&lambda;Î¯&alpha; &tau;&omega;&nu; &mu;&alpha;&theta;&eta;&mu;&alpha;&tau;&iota;&kappa;ÏŽ&nu;</em>. &Theta;&epsilon;&sigma;&sigma;&alpha;&lambda;&omicron;&nu;Î¯&kappa;&eta;: &Epsilon;&pi;Î¯&kappa;&epsilon;&nu;&tau;&rho;&omicron;.</p>\r\n	</li>\r\n	<li>\r\n	<p>&Sigma;Î¬&lambda;&tau;&alpha;&sigmaf;, &Beta;. (2011). <em>&Mu;&alpha;&theta;&eta;&mu;&alpha;&tau;&iota;&kappa;Î¬ &Iota;&Iota;: &Theta;&epsilon;&omega;&rho;Î¯&alpha; &kappa;&alpha;&iota; &pi;&rho;Î¬&xi;&eta;</em>. &Alpha;&theta;Î®&nu;&alpha;: &Kappa;&lambda;&epsilon;&iota;&delta;Î¬&rho;&iota;&theta;&mu;&omicron;&sigmaf;.</p>\r\n	</li>\r\n	<li>\r\n	<p>&Sigma;Î¬&lambda;&tau;&alpha;&sigmaf;, &Beta;. (2012). <em>Mathematica</em><em>: &Beta;&omicron;Î®&theta;&eta;&mu;&alpha; &chi;&rho;Î®&sigma;&eta;&sigmaf; &lambda;&omicron;&gamma;&iota;&sigma;&mu;&iota;&kappa;&omicron;Ï</em>. &Alpha;&theta;Î®&nu;&alpha;: &Sigma;&upsilon;&mu;&mu;&epsilon;&tau;&rho;Î¯&alpha;</p>\r\n	</li>\r\n</ol>\r\n', 1, 1, '2017-01-07 11:38:10', '2017-01-07 11:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `uploaded_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `filepath`, `user_id`, `uploaded_date`) VALUES
(1, 'uploads/20170107140029_007-transcript.pdf', 2, '2017-01-07 12:00:29'),
(2, 'uploads/20170107140420_007-transcript.jpg', 2, '2017-01-07 12:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `aem` varchar(45) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`, `aem`, `email`, `role`) VALUES
(1, 'prof', '$2a$12$/oE2N5BeSLZtDVFwwEjlqu7mh.SynArMvFq16OyUTjxsGqVSkITIy', 'Professor', 'Xavier', '12345', 'profx@gmail.com', 3),
(2, 'student', '$2a$12$QOK7M0sUJ.7NEwafhdVWJulyUewLNlCEKFMKFxzOfyKP4Ehq8rbQe', 'James', 'Bond', '007', 'james@bond.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD UNIQUE KEY `app_ind` (`project_id`,`student_id`),
  ADD KEY `project_id` (`project_id`,`student_id`),
  ADD KEY `app_uid` (`student_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `noti_uid` (`user_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upl_uid` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `app_pid` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `app_uid` FOREIGN KEY (`student_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `noti_uid` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `upl_uid` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
