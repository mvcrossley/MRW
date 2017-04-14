-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2017 at 02:10 AM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mrw`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `comment_id` int(10) UNSIGNED NOT NULL,
  `comment_user` varchar(75) NOT NULL,
  `comment_time` varchar(75) NOT NULL,
  `comment_text` varchar(300) NOT NULL,
  `comment_rating` varchar(75) NOT NULL,
  `comment_movie` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`comment_id`, `comment_user`, `comment_time`, `comment_text`, `comment_rating`, `comment_movie`) VALUES
(1, 'Dingdong', 'April 10 2017 8:22pm', 'First!', '&#9733;&#9733;&#9733;&#9733;&#9733;', 1),
(2, 'Stupit', 'April 10 2017 11:27:46 PM', 'Too sad', 'â˜…â˜†â˜†â˜†â˜†', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_movie`
--

CREATE TABLE `tbl_movie` (
  `movie_id` smallint(5) UNSIGNED NOT NULL,
  `movie_title` varchar(150) NOT NULL,
  `movie_year` varchar(25) NOT NULL,
  `movie_desc` varchar(500) NOT NULL,
  `movie_genre` varchar(150) NOT NULL,
  `movie_thumb` varchar(150) NOT NULL,
  `movie_trailer` varchar(150) NOT NULL,
  `movie_role` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_movie`
--

INSERT INTO `tbl_movie` (`movie_id`, `movie_title`, `movie_year`, `movie_desc`, `movie_genre`, `movie_thumb`, `movie_trailer`, `movie_role`) VALUES
(1, 'Disco Pigs', '2001', 'A twisted rite of passage.', 'Crime, Drama, Romance', 'discopigs_th.jpg', 'wlpXEwl_pKQ', 'Darren "Pig" - Lead'),
(2, 'Red Eye', '2005', 'A woman is kidnapped by a stranger on a routine flight. Threatened by the potential murder of her father, she is pulled into a plot to assist her captor in offing a politician.', 'Mystery, Thriller', 'redeye_th.jpg', 'GMMGg_idxqE', 'Jackson Rippner - Lead Antagonist'),
(3, 'Sunshine', '2007', 'A team of international astronauts are sent on a dangerous mission to reignite the dying Sun with a nuclear fission bomb in 2057.', 'Adventure, Sci-Fi, Thriller', 'sunshine_th.jpg', 'CGFvnfb_sQE', 'Robert Capa - Lead'),
(4, 'Peacock', '2010', ' A train accident in rural Nebraska gradually unveils a mystery involving the town\'s bank clerk.', 'Drama, Thriller', 'peacock_th.jpg', 'NPEzcAG4E5s', 'John/Emma Killpa - Lead'),
(5, 'Inception', '2010', 'A thief, who steals corporate secrets through use of dream-sharing technology, is given the inverse task of planting an idea into the mind of a CEO.', 'Action, Adventure, Sci-Fi', 'inception_th.jpg', 'YoHD9XEInc0', 'Robert Fischer - Supporting'),
(6, 'Retreat', '2011', 'Kate and Martin escape from personal tragedy to an Island Retreat. Cut off from the outside world, their attempts to recover are shattered when a Man is washed ashore, with news of airborne killer disease that is sweeping through Europe.', 'Thriller', 'retreat_th.jpg', 'E7zNPE57IHw', 'Martin - Lead'),
(7, 'In Time', '2011', 'In a future where people stop aging at 25, but are engineered to live only one more year, having the means to buy your way out of the situation is a shot at immortal youth. Here, Will Salas finds himself accused of murder and on the run with a hostage - a connection that becomes an important part of the way against the system.', 'Action, Sci-Fi, Thriller', 'intime_th.jpg', 'fdadZ_KrZVw', 'Raymond Leon - Supporting'),
(8, 'Broken', '2012', 'The story of a young girl in North London whose life changes after witnessing a violent attack.', 'Drama, Romance', 'broken_th.jpg', 'cfQlRks4fuo', 'Mike Kiernan - Supporting'),
(9, 'Dunkirk', '2017', 'Allied soldiers from Belgium, the British Empire, Canada, and France are surrounded by the German army and evacuated during a fierce battle in World War II.', 'Action, Drama, Thriller, Historical', 'dunkirk_th.jpg', 'F-eMt3SrfFU', '(To Be Announced)'),
(10, 'Red Lights', '2012', 'Psychologist Margaret Matheson and her assistant study paranormal activity, which leads them to investigate a world-renowned psychic who has resurfaced years after his toughest critic mysteriously passed away.', 'Drama, Horror, Mystery', 'redlights_th.jpg', 'IzDOkA6O6rE', 'Tom Buckley - Lead');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_movie`
--
ALTER TABLE `tbl_movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_movie`
--
ALTER TABLE `tbl_movie`
  MODIFY `movie_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
