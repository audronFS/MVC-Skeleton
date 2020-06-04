-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2020 at 08:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pets`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogger`
--

CREATE TABLE `blogger` (
  `BloggerID` int(11) NOT NULL,
  `FirstName` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `LastName` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Username` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Hashcode` char(50) COLLATE latin1_general_ci NOT NULL,
  `DateJoined` date NOT NULL,
  `ProfilePhoto` blob DEFAULT NULL,
  `AboutMe` varchar(100) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `blogger`
--

INSERT INTO `blogger` (`BloggerID`, `FirstName`, `LastName`, `Username`, `Email`, `Hashcode`, `DateJoined`, `ProfilePhoto`, `AboutMe`) VALUES
(1, 'Aleshia', 'Tomkiewicz', 'CatLover01', 'atomkiewicz@hotmail.com', 'axa', '2020-05-15', NULL, ''),
(2, 'Jane', 'Bloggs', 'JaneBo', 'JaneBo@pawsome.com', 'pawsome', '2020-05-31', NULL, 'Me encantan los gatos'),
(3, 'Jane', 'Bonanza', 'JaneBo', 'JaneBo@pawsome.com', 'pawsome', '2020-05-31', NULL, 'I have a step sister named like me, she likes cats but I like dogs.'),
(4, 'Jane Bob', 'Smith', 'JaneBo', 'JaneBo3@pawsome.com', 'pawsome*', '2020-05-31', NULL, NULL),
(26, 'Brenda', 'Beee', 'Brenda55', 'brendabeee@virgin.net', 'bb55', '2020-06-01', NULL, 'No thanks.'),
(32, 'Fatima', 'Fatima', 'Fatima', 'r@gmail.com', 'fat', '2020-06-03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogpost`
--

CREATE TABLE `blogpost` (
  `BlogPostID` int(11) NOT NULL,
  `BloggerID` int(11) NOT NULL,
  `PetTypeID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `BlogPostName` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `BlogPostSubName` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `BlogPostContent` varchar(2000) COLLATE latin1_general_ci NOT NULL,
  `BlogPostPhoto` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `DatePosted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `blogpost`
--

INSERT INTO `blogpost` (`BlogPostID`, `BloggerID`, `PetTypeID`, `CategoryID`, `BlogPostName`, `BlogPostSubName`, `BlogPostContent`, `BlogPostPhoto`, `DatePosted`) VALUES
(46, 1, 2, 2, 'There is never a dull moment going camping with Keel', 'Keel regrets eating that button during our recent camping trip.', 'Why are you wearing the cone of shame too?!I didn\'t want you to have to go through this alone, bro.&#34; Keel is almost ready to take his cone off, his stitches are healed, and he is raring to go! Wearing the cone is a mini punishment for eating a button. We are so glad he&#39;s ok. Please note, Bolt is just wearing the cone for the photo (and for moral solidarity).', 'C:\\xampp\\htdocs\\MVC-Skeleton\\models/../views/images/1591005592.jpeg', '2020-05-31 02:41:48'),
(48, 1, 1, 1, 'Watson &#38; Kiko Hit the Lake', 'Two brothers roaming this world spreading joy through every adventure!', 'One thing is certain, I can\'t go a day without seeing these two precious faces. What a great day this was! Watson and Kiko are truly enjoying exploring as seen in this photo. Having a little splash in Lake before setting out on an epic hike through the mountains. Going on an adventure is not complete without a dog, or two!', 'C:/xampp/htdocs/MVC-Skeleton/views/images/1590933869.jpeg', '2020-05-31 11:43:56'),
(49, 1, 3, 2, 'Mr Pokee\'s Love His First Trip to the Mountains', 'This little guy has caught the travel bug', 'A journey is best measured in friends rather than miles.Mr Pokee and I got to go on our first adventure the other day. We saw so many amazing things. ', 'C:/xampp/htdocs/MVC-Skeleton/views/images/1590932866.jpeg', '2020-05-31 11:46:32'),
(53, 1, 2, 3, 'Suki Takes a Dip', 'Adventures are better with a cat like Suki by your side', 'Many of the mountain lakes are still frozen right now, so we are heading to our cabin this weekend for some canoeing. We have such long winters here, so it\'s been over 6 months since Suki was on a boat. It\'s always fun seeing her reaction to being on the water after a long break!', 'C:/xampp/htdocs/MVC-Skeleton/views/images/Suki Takes a Dip.jpeg', '2020-05-31 12:31:01'),
(54, 1, 1, 3, 'Hiking in the Norwegian Wilderness with George', 'An Irish Setter with a passion for treats and adventures', 'Most of us will agree - dogs are awesome. They are loyal, fun and loving. And that&#39;s exactly what Troja, an Irish Setter with a passion for treats and adventures, is. 4 years ago George from Norway, the owner of Troja, started taking pictures during hikes using his phone. &#13;&#10;&#13;&#10;&#34;At first, it was mostly macro photos of plants, insects and so on,&#34; George told Pawsome. &#34;Troja was always with me on the hikes, but I never had the idea of taking photos of her until people I met during my hikes who complimented her looks. So after that I gave it a try and I enjoyed taking photos of her because it created more interaction between her and me during our hikes.&#34;&#13;&#10;&#13;&#10;In November of 2014, George set up an account on Instagram to share the adventures of Troja. Now the account has close to 100k followers and loyal fans who inspire the photographer. &#34;My inspiration comes from the comments and private messages I get from people who tell me they have been inspired to bond more with their dogs and to be more active with them,&#34; George shared. &#34;The best thing about having this account is the interaction I can have with so many different types of people who also share the same passion for the outdoors and dogs.&#34;', 'C:/xampp/htdocs/MVC-Skeleton/views/images/Hiking in the Norwegian Wilderness with George.jpeg', '2020-05-31 12:33:26'),
(55, 1, 3, 1, 'Suki &#38; Pokee Enjoying a Joke in the Mountains ', 'Who says cats and hedgehogs can\'t be friends?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?', 'C:/xampp/htdocs/MVC-Skeleton/views/images/1590933901.jpeg', '2020-05-31 12:35:54'),
(56, 1, 3, 2, 'Azuki Is Ready For Kayaking', 'We are just about to do some kayaking. Here is a rare candid of Azuki ready to hit the waters! ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?', 'C:/xampp/htdocs/MVC-Skeleton/views/images/Azuki Is Ready For Kayaking.jpeg', '2020-05-31 12:37:15'),
(57, 1, 1, 1, 'My Novia Scotia retrievers enjoying a boat ride! ', 'Two little sweeties on a boat', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?', 'C:/xampp/htdocs/MVC-Skeleton/views/images/My Novia Scotia retrievers enjoying a boat ride!.jpeg', '2020-05-31 12:40:16'),
(58, 1, 2, 1, 'My cute cat enjoying our paddle boarding!', 'She didn\'t fall off', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?', 'C:/xampp/htdocs/MVC-Skeleton/views/images/My cute cat enjoying a boat ride!.jpeg', '2020-05-31 12:42:47'),
(59, 1, 1, 1, 'Watson &#38; Kiko post swimming in the lakes nap!', 'It was a lovely swim', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?', 'C:/xampp/htdocs/MVC-Skeleton/views/images/1590933777.jpeg', '2020-05-31 12:45:36'),
(60, 1, 1, 1, 'What a cutie!', 'I hope you enjoy this photo as much as I do ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?', 'C:/xampp/htdocs/MVC-Skeleton/views/images/What a cutie!.jpeg', '2020-05-31 12:47:00'),
(61, 1, 3, 2, 'Azuki Is Ready for Camping', 'Just arrived at the campsite and Azuki is ready ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?', 'C:/xampp/htdocs/MVC-Skeleton/views/images/Azuki Is Ready for Camping.jpeg', '2020-05-31 12:47:54'),
(62, 1, 3, 2, 'Azuki just set up her tent!', 'Is your pet as cool as mine?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?', 'C:/xampp/htdocs/MVC-Skeleton/views/images/Azuki just set up her tent!.jpeg', '2020-05-31 12:48:57'),
(64, 1, 1, 2, 'So many emails!', 'Jeff working hard', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?', 'C:/xampp/htdocs/MVC-Skeleton/views/images/So many emails!.jpeg', '2020-05-31 12:50:31'),
(65, 1, 2, 3, 'My Majestic Suki', 'This is an amazing lake and I don\'t want to leave this place, Suki feels the same!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?', 'C:/xampp/htdocs/MVC-Skeleton/views/images/My Majestic Suki.jpeg', '2020-05-31 12:51:18'),
(66, 1, 2, 3, 'On a road trip with With Suki!', 'Lovely forest', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?', 'C:/xampp/htdocs/MVC-Skeleton/views/images/Roadtripping With Suki.jpeg', '2020-05-31 12:52:06'),
(67, 1, 2, 3, 'Relaxing by the lake, with Suki, is the best way to end the day.', 'Suki and a beautiful sunset in the background', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?', 'C:/xampp/htdocs/MVC-Skeleton/views/images/1590933733.jpeg', '2020-05-31 12:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(1, 'Aww'),
(2, 'LOL'),
(3, 'Wow');

-- --------------------------------------------------------

--
-- Table structure for table `commentpost`
--

CREATE TABLE `commentpost` (
  `CommentID` int(11) NOT NULL,
  `BlogPostID` int(11) NOT NULL,
  `Username` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `CommentTime` datetime NOT NULL,
  `CommentContent` varchar(100) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `commentpost`
--

INSERT INTO `commentpost` (`CommentID`, `BlogPostID`, `Username`, `CommentTime`, `CommentContent`) VALUES
(5, 66, 'Hello', '2020-05-31 18:02:28', 'Hello'),
(6, 61, 'Anonimo', '2020-05-31 22:24:57', 'Lindisimo'),
(7, 61, 'Anonimous anonimus', '2020-05-31 22:26:10', 'Totally agree, is super cute! ^_^'),
(14, 67, 'Tommy', '2020-06-01 18:21:38', 'Amazing pic! Such a mystic cat...'),
(24, 67, 'Aurora', '2020-06-03 12:48:19', 'What a beautiful place and cat!'),
(26, 67, 'Claudia', '2020-06-03 13:16:10', 'I want this cat!!!! so madly!!!!!'),
(28, 67, 'Flo', '2020-06-03 13:24:40', 'Strolling through the mushroom forest'),
(30, 67, 'Victoria', '2020-06-03 16:15:05', 'Why the text is so bloody small?'),
(31, 67, 'Fatima', '2020-06-03 18:17:31', 'Where did you get this cat?');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `PetTypeID` int(11) NOT NULL,
  `PetType` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`PetTypeID`, `PetType`) VALUES
(1, 'Dog'),
(2, 'Cat'),
(3, 'Hedgehog');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogger`
--
ALTER TABLE `blogger`
  ADD PRIMARY KEY (`BloggerID`);

--
-- Indexes for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD PRIMARY KEY (`BlogPostID`),
  ADD KEY `BloggerID` (`BloggerID`),
  ADD KEY `PetTypeID` (`PetTypeID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `commentpost`
--
ALTER TABLE `commentpost`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `BlogPostID` (`BlogPostID`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`PetTypeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogger`
--
ALTER TABLE `blogger`
  MODIFY `BloggerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `blogpost`
--
ALTER TABLE `blogpost`
  MODIFY `BlogPostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `commentpost`
--
ALTER TABLE `commentpost`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `PetTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD CONSTRAINT `blogpost_ibfk_1` FOREIGN KEY (`BloggerID`) REFERENCES `blogger` (`BloggerID`),
  ADD CONSTRAINT `blogpost_ibfk_2` FOREIGN KEY (`PetTypeID`) REFERENCES `pet` (`PetTypeID`),
  ADD CONSTRAINT `blogpost_ibfk_3` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);

--
-- Constraints for table `commentpost`
--
ALTER TABLE `commentpost`
  ADD CONSTRAINT `commentpost_ibfk_1` FOREIGN KEY (`BlogPostID`) REFERENCES `blogpost` (`BlogPostID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
