-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Jun-2019 às 20:01
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ren-chon_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comment` text NOT NULL,
  `url` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comments`
--

INSERT INTO `comments` (`comments_id`, `id_post`, `id_user`, `comment`, `url`, `timestamp`) VALUES
(1, 7, 17, 'teste', '', '2019-06-03 16:36:53'),
(3, 12, 17, 'topster', 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/47a22119-ce82-40b7-83fd-46f1810edc45/dagi7nw-0fb65577-2a02-4fd9-9f73-5d44be9b5b61.jpg/v1/fill/w_445,h_250,q_70,strp/untitled_dank_meme_by_doomenstein_dagi7nw-250t.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9NDQ5IiwicGF0aCI6IlwvZlwvNDdhMjIxMTktY2U4Mi00MGI3LTgzZmQtNDZmMTgxMGVkYzQ1XC9kYWdpN253LTBmYjY1NTc3LTJhMDItNGZkOS05ZjczLTVkNDRiZTliNWI2MS5qcGciLCJ3aWR0aCI6Ijw9ODAwIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmltYWdlLm9wZXJhdGlvbnMiXX0.OysslKnftGRooH4frRPS0AdCFAXjzCALjY7tZtUzmY8', '2019-06-03 17:24:47'),
(4, 11, 18, 'hehe boi\r\n', '', '2019-06-03 17:52:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `friendship`
--

CREATE TABLE `friendship` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `confirm` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `friendship`
--

INSERT INTO `friendship` (`user_id`, `friend_id`, `confirm`) VALUES
(18, 17, 1),
(18, 15, 1),
(18, 16, 1),
(20, 19, 1),
(20, 14, 1),
(20, 15, 1),
(20, 20, 0),
(20, 17, 1),
(20, 16, 1),
(21, 17, 1),
(18, 20, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `likes`
--

INSERT INTO `likes` (`like_id`, `post_id`, `u_id`) VALUES
(1, 12, 17),
(2, 13, 17),
(3, 8, 17),
(4, 7, 17),
(5, 11, 17),
(6, 10, 17),
(7, 9, 17),
(8, 14, 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `url` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `liked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id_post`, `user_id`, `comment`, `url`, `timestamp`, `liked`) VALUES
(7, 17, 'Fuck this shit.', 'http://darksouls.wikidot.com/local--files/npcs/crestfallen-warrior-large.jpg', '2019-06-02 19:33:23', 1),
(8, 18, 'RIP', 'https://i.imgur.com/IpVyUtf.gif', '2019-06-02 19:41:33', 1),
(9, 20, 'pudim', '', '2019-06-02 20:40:45', 1),
(10, 20, 'kakatua', '', '2019-06-02 20:41:24', 1),
(11, 17, 'THIS WORK', 'https://i.redd.it/13puf3zoqtm01.jpg', '2019-06-02 21:14:19', 1),
(12, 21, '..l..', 'https://lillymohsen.files.wordpress.com/2018/01/file-jan-30-9-04-41-pm.jpeg?w=448&h=247', '2019-06-02 21:50:49', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `question`
--

INSERT INTO `question` (`id`, `name`) VALUES
(1, 'Qual o nome do seu animal de estimaÃ§Ã£o?'),
(2, 'Qual a primeira escola que vocÃª frequentou?'),
(3, 'Qual a sua banda favorita?'),
(4, 'Qual o nome de solteira da sua mÃ£e?');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `ques_cod` int(11) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user_info`
--

INSERT INTO `user_info` (`id`, `user`, `password`, `email`, `fullname`, `ques_cod`, `answer`, `photo`) VALUES
(7, 'admin', 'admin', 'admin@applehead.com', 'Administrador', 1, 'tanukidog', 'https://i1.sndcdn.com/artworks-000135411222-hzaga6-t500x500.jpg'),
(14, 'teste1', '123', 'teste@gmail.com', 'teste1', 1, '123', 'https://imgur.com/Pk98UaE.png'),
(15, 'teste2', '123', 'teste@gmail.com', 'teste teste teste', 1, '123', 'https://avatarfiles.alphacoders.com/531/53189.png'),
(16, 'teste3', '123', 'teste@gmail.com', 'teste123123123', 1, '123', 'https://avatarfiles.alphacoders.com/750/75050.png'),
(17, 'biowss', '1234', 'teste@teste.teste', 'Turim', 1, 'bob', 'https://imgur.com/zoPQxkf.png'),
(18, 'zero', '123', 'zero@123.com', 'ZeroPoke', 1, 'Puma', 'https://pbs.twimg.com/profile_images/993173208785338368/rTsyj6jz_400x400.jpg'),
(19, 'cacatua', 'pudim', 'cacatua@cacatua.com', 'cacatua', 1, 'cacatua', 'https://imgur.com/Pk98UaE.png'),
(20, 'pudim', '1234', 'pudimchoclate@gmail.com', 'Natalia', 3, '1234', 'https://imgur.com/Pk98UaE.png'),
(21, 'louvel', 'lolinha', 'lorennaoliveira@a', 'lauri', 1, 'felipe', 'https://i1.sndcdn.com/artworks-000135411222-hzaga6-t500x500.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
