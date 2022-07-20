-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2018 at 11:33 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `option_first` varchar(255) NOT NULL,
  `option_second` varchar(255) NOT NULL,
  `option_third` varchar(255) NOT NULL,
  `option_fourth` varchar(255) NOT NULL,
  `wright_answer` varchar(255) NOT NULL,
  `assignment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `course_id`, `teacher_id`, `question_text`, `option_first`, `option_second`, `option_third`, `option_fourth`, `wright_answer`, `assignment_date`) VALUES
(1, 1, 1, 'What is Vibgyor?', 'color1', 'color2', 'color3', 'color4', 'color3', '2017-03-19'),
(2, 1, 1, 'What is newstons law?', 'About motion', 'about gravity', 'about optics', 'about prism', 'about motion', '2017-03-19'),
(3, 6, 2, 'Who developed Python?', 'Guido Van Rossum', 'Dennis', 'Rasmus', 'Albert', 'Guido Van Rossum', '2018-11-28'),
(4, 6, 2, 'What is python', 'Programming Language', 'Operating System', 'Technology', 'None', 'Programming Language', '2018-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `course_duration` varchar(255) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`, `teacher_id`, `course_duration`, `start_date`) VALUES
(1, 'Computer Fundamentals', 1, '20 Days', '2017-04-03'),
(2, 'Electronic Circuit', 1, '40 Days', '2017-04-03'),
(3, 'PHP', 2, '120', '2018-11-28'),
(4, 'Java', 3, '120', '2018-11-28'),
(5, 'C', 2, '90', '2018-11-28'),
(6, 'Python', 2, '30', '2018-11-28'),
(7, 'Ruby', 2, '20', '2018-11-28'),
(8, 'C++', 2, '90', '2018-11-28'),
(9, 'HTML', 2, '20', '2018-11-28'),
(10, 'test', 2, '23', '2018-11-28'),
(11, 'tt', 2, '22', '2018-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `groupmaster`
--

CREATE TABLE `groupmaster` (
  `group_id` int(10) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `category_id` int(10) NOT NULL,
  `group_status` int(10) NOT NULL,
  `group_owner` int(10) NOT NULL,
  `creation_date` date NOT NULL,
  `active_member` int(10) NOT NULL,
  `total_member` int(10) NOT NULL,
  `group_code` varchar(50) NOT NULL,
  `total_quizzes` int(10) NOT NULL,
  `total_polls` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_master`
--

CREATE TABLE `login_master` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_master`
--

INSERT INTO `login_master` (`id`, `username`, `password`, `user_type`) VALUES
(1, 'abhishek@gmail.com', '111111', 'student'),
(2, 'vijay@gmail.com', '111111', 'teacher'),
(3, 'abcd@gmail.com', '111111', 'student'),
(4, 'rahul@yahoo.com', '121212', 'teacher'),
(5, 'shazia@gmail.com', '111111', 'teacher'),
(6, 'prateek@gmail.com', '111', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `mcquestionmaster`
--

CREATE TABLE `mcquestionmaster` (
  `question_id` int(10) NOT NULL,
  `questionText` varchar(500) NOT NULL,
  `containsImage` int(20) NOT NULL,
  `imageUrl` varchar(100) NOT NULL,
  `No_Of_Options` int(20) NOT NULL,
  `correctOption` int(10) NOT NULL,
  `option1` varchar(50) NOT NULL,
  `option2` varchar(50) NOT NULL,
  `option3` varchar(50) NOT NULL,
  `option4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcquestionmaster`
--

INSERT INTO `mcquestionmaster` (`question_id`, `questionText`, `containsImage`, `imageUrl`, `No_Of_Options`, `correctOption`, `option1`, `option2`, `option3`, `option4`) VALUES
(2, 'full form of hal', 0, '', 0, 4, 'abc', 'xyz', 'dfs', 'dsfs'),
(3, 'sx', 0, '', 0, 2, 'sd', 'sad', 'sd', 'sd'),
(4, 'what is the full form of cpu', 0, '', 0, 4, 'asdf', 'sdfs', 'dsfs', 'sdfs'),
(5, 'zxcz', 0, '', 0, 2, 'a', 'a', 'a', 'a'),
(6, '2', 0, '', 0, 3, '2', '2', '2', '2'),
(7, '23', 0, '', 0, 3, '3', '3', '3', '3'),
(8, '75reteert', 0, '', 0, 4, 'retg', 'rte', 'ert', 'ert');

-- --------------------------------------------------------

--
-- Table structure for table `postmaster`
--

CREATE TABLE `postmaster` (
  `post_id` int(15) NOT NULL,
  `postTile` varchar(200) NOT NULL,
  `postDate` date NOT NULL,
  `postedBy` varchar(40) NOT NULL,
  `postType` int(10) NOT NULL,
  `postContents` varchar(2000) NOT NULL,
  `attachmentUrl` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postmaster`
--

INSERT INTO `postmaster` (`post_id`, `postTile`, `postDate`, `postedBy`, `postType`, `postContents`, `attachmentUrl`) VALUES
(5, '', '2014-04-10', 'kumararvind213', 0, 'Nova Edge is run by highly skilled and experienced software professionals who have experience in world class product developments. We have domain expertise in medical systems, rule based expert systems, banking and more. In the past, we have created custom based software and web based solutions for many different types of businesses. Some examples of the web based solutions developed by us are, ', ''),
(8, '', '2014-04-10', 'kumararvind213', 0, '', ''),
(9, 'abc', '2014-04-11', 'akhilesh', 0, 'â€¢	Teachers can manage students in groups, can upload assignments, quizzes and polls, can share notices and other information with the class, can view and grade assignments, award badges to students, can create their library of contents, and can collaborate with other teachers etc.\r\nâ€¢	Students can join teachers groups to receive assignments, notes, alerts and feedback, to share their homework, assignment and quizzes with other students, to communicate with their peers and teacher in real time etc.\r\nâ€¢	Parents can find out how their children are performing individually and collectively in the class, they can share their concerns with the teachers and receive their feedback.\r\n', ''),
(10, 'Event', '2014-04-13', 'kumararvind213', 0, 'Smart learning is a webbased platform which facilitates int3rafction between teaher ,student and parents.\r\nits provideds a safe and easy way for the class to commect and collaborate, share contents and access homework, grafes and school notices. Main goal fof sl is to help to customize the classroom for each and every learer Teacher can mangate student group can upload assignment quizzes, nd polls , nc share ntices and other information with the class', ''),
(11, 'sjldfkjk', '2014-04-13', 'kumararvind213', 0, 'jodksfoisd', ''),
(12, 'dofjgodfk', '2014-04-14', 'kumararvind213', 0, 'jkjkdgjkfdjsgkflkdglkfdgfldkglskfld', ''),
(13, 'xcvxxczxcz', '2014-04-15', 'kumararvind213', 0, 'xzczxc', ''),
(14, 'uygjh', '2014-04-16', 'kumararvind213', 0, 'hjhgugjhghghguh', ''),
(15, 'hsidfjsdi', '2014-04-19', 'kumararvind213', 0, 'sjdfkjsdkjfksdjfkjsdlkfjsdlkjfksds\r\ndf\r\nsd\r\nf\r\ns\r\nd\r\nf5465545454545', '');

-- --------------------------------------------------------

--
-- Table structure for table `profilepic`
--

CREATE TABLE `profilepic` (
  `img` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profilepic`
--

INSERT INTO `profilepic` (`img`, `username`) VALUES
('upload/imagesdfsf.jpg', 'akhilesh'),
('upload/images.jpg', 'akhilesh kumar'),
('upload/Ben Nevis_ Scotland - 1600x1200 - ID 25779.jpg', 'kumararvind213'),
('upload/Vista Feel - (183).jpg', 'mukesh');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `option_first` varchar(255) NOT NULL,
  `option_second` varchar(255) NOT NULL,
  `option_third` varchar(255) NOT NULL,
  `option_fourth` varchar(255) NOT NULL,
  `wright_answer` varchar(255) NOT NULL,
  `assignment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `teacher_id`, `question_text`, `option_first`, `option_second`, `option_third`, `option_fourth`, `wright_answer`, `assignment_date`) VALUES
(1, 1, 'this is first', 'yes', 'no', 'dont', 'oops', 'no', '2017-04-19'),
(2, 1, 'second', 'a', 'b', 'c', 'd', 'c', '2017-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `studentmaster`
--

CREATE TABLE `studentmaster` (
  `studentid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `joining_date` date NOT NULL,
  `student_image` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentmaster`
--

INSERT INTO `studentmaster` (`studentid`, `email`, `first_name`, `last_name`, `mobile`, `joining_date`, `student_image`, `status`) VALUES
(1, 'abhishek@gmail.com', 'Abhishek', 'Kumar', 9090909090, '2017-04-03', 'Desert.jpg', 0),
(2, 'abcd@gmail.com', 'Ujjwal', 'Rastogi', 8908908909, '2018-11-28', 'Penguins.jpg', 0),
(3, 'prateek@gmail.com', 'Prateek', 'Yadav', 9090909090, '2018-12-13', 'Penguins.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teachermaster`
--

CREATE TABLE `teachermaster` (
  `teacherid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `joining_date` date NOT NULL,
  `teacher_image` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachermaster`
--

INSERT INTO `teachermaster` (`teacherid`, `email`, `first_name`, `last_name`, `mobile`, `joining_date`, `teacher_image`, `status`) VALUES
(1, 'vijay@gmail.com', 'Vijay', 'Kumar', 9090909090, '2017-04-03', 'Lighthouse.jpg', 0),
(2, 'rahul@yahoo.com', 'Rahul', 'Raj', 8987898989, '2018-11-28', 'Hydrangeas.jpg', 0),
(3, 'shazia@gmail.com', 'Shazia', 'Khan', 1234567890, '2018-11-28', 'Hydrangeas.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `topic_file`
--

CREATE TABLE `topic_file` (
  `file_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic_file`
--

INSERT INTO `topic_file` (`file_id`, `course_id`, `teacher_id`, `file_name`) VALUES
(1, 1, 1, '1491246271.docx');

-- --------------------------------------------------------

--
-- Table structure for table `topic_selection`
--

CREATE TABLE `topic_selection` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `select_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic_selection`
--

INSERT INTO `topic_selection` (`id`, `topic_id`, `student_id`, `select_date`) VALUES
(1, 2, 1, '2017-04-03'),
(2, 1, 1, '2017-04-03'),
(3, 1, 2, '2018-11-28'),
(4, 6, 2, '2018-11-28'),
(5, 1, 3, '2018-12-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupmaster`
--
ALTER TABLE `groupmaster`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `login_master`
--
ALTER TABLE `login_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcquestionmaster`
--
ALTER TABLE `mcquestionmaster`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `postmaster`
--
ALTER TABLE `postmaster`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `profilepic`
--
ALTER TABLE `profilepic`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentmaster`
--
ALTER TABLE `studentmaster`
  ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `teachermaster`
--
ALTER TABLE `teachermaster`
  ADD PRIMARY KEY (`teacherid`);

--
-- Indexes for table `topic_file`
--
ALTER TABLE `topic_file`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `topic_selection`
--
ALTER TABLE `topic_selection`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login_master`
--
ALTER TABLE `login_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mcquestionmaster`
--
ALTER TABLE `mcquestionmaster`
  MODIFY `question_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `postmaster`
--
ALTER TABLE `postmaster`
  MODIFY `post_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studentmaster`
--
ALTER TABLE `studentmaster`
  MODIFY `studentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachermaster`
--
ALTER TABLE `teachermaster`
  MODIFY `teacherid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topic_file`
--
ALTER TABLE `topic_file`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topic_selection`
--
ALTER TABLE `topic_selection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
