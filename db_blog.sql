-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2020 at 03:12 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori_temp`
--

CREATE TABLE `kategori_temp` (
  `id` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_temp`
--

INSERT INTO `kategori_temp` (`id`, `kategori`, `slug`) VALUES
(6, 'Ibadah Haji', 'ibadah-haji'),
(7, 'Bulan Ramadhan', 'bulan-ramadhan'),
(8, 'Edukasi', 'edukasi');

-- --------------------------------------------------------

--
-- Table structure for table `post_temp`
--

CREATE TABLE `post_temp` (
  `id` int(11) NOT NULL,
  `nama_artikel` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `artikel_short` varchar(100) NOT NULL,
  `artikel_text` longtext NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `author` varchar(30) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_temp`
--

INSERT INTO `post_temp` (`id`, `nama_artikel`, `slug`, `artikel_short`, `artikel_text`, `image`, `created_at`, `author`, `kategori_id`) VALUES
(1, 'Haji di tengah Pandemi', 'haji-di-tengah-pandemi', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, eos!', '<p><strong>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur,&nbsp;</strong>adipisicing&nbsp;elit.&nbsp;Incidunt&nbsp;molestiae&nbsp;nesciunt&nbsp;dolore&nbsp;ducimus&nbsp;in&nbsp;consequuntur,&nbsp;autem&nbsp;corporis&nbsp;nulla&nbsp;ex&nbsp;hic&nbsp;alias&nbsp;recusandae&nbsp;nam&nbsp;molestias&nbsp;voluptates&nbsp;at&nbsp;distinctio&nbsp;magni&nbsp;blanditiis&nbsp;neque&nbsp;dicta,&nbsp;amet&nbsp;velit&nbsp;labore&nbsp;eum&nbsp;id!&nbsp;Possimus&nbsp;reiciendis&nbsp;deserunt,&nbsp;exercitationem&nbsp;laboriosam&nbsp;dicta&nbsp;repellendus&nbsp;quisquam&nbsp;sapiente&nbsp;suscipit&nbsp;id&nbsp;eos&nbsp;aut&nbsp;corrupti.</p>\r\n\r\n<p><strong>Lorem,&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.</strong>&nbsp;Possimus&nbsp;a&nbsp;aperiam&nbsp;omnis&nbsp;sequi,&nbsp;ratione,&nbsp;quis&nbsp;cumque&nbsp;id&nbsp;odit&nbsp;hic&nbsp;explicabo,&nbsp;repellat&nbsp;ipsum&nbsp;at&nbsp;quas?&nbsp;Similique&nbsp;sunt&nbsp;magni&nbsp;expedita&nbsp;maiores&nbsp;laudantium!&nbsp;Assumenda&nbsp;sunt&nbsp;porro&nbsp;error&nbsp;est&nbsp;quae!&nbsp;Veniam&nbsp;autem&nbsp;pariatur&nbsp;doloremque,&nbsp;expedita&nbsp;inventore&nbsp;rerum,&nbsp;ad&nbsp;modi,&nbsp;mollitia&nbsp;ipsam&nbsp;quidem&nbsp;nisi.&nbsp;At&nbsp;similique&nbsp;eligendi&nbsp;perferendis&nbsp;dolor.&nbsp;Sunt&nbsp;a&nbsp;architecto&nbsp;saepe&nbsp;ad&nbsp;voluptatem&nbsp;in&nbsp;tempore&nbsp;non&nbsp;doloribus&nbsp;obcaecati&nbsp;aliquam&nbsp;earum&nbsp;repellendus&nbsp;doloremque&nbsp;mollitia,&nbsp;ipsum&nbsp;neque&nbsp;facere&nbsp;dolorum&nbsp;atque?</p>\r\n\r\n<blockquote>\r\n<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Sequi,&nbsp;illum?</p>\r\n</blockquote>', '5e8874db6bfca.jpg', '2020-04-04', 'Umar', 6),
(2, 'Puasa Sebelum Ramadhan', 'puasa-sebelum-ramadhan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, eos!', '<p><strong>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur,&nbsp;</strong>adipisicing&nbsp;elit.&nbsp;Incidunt&nbsp;molestiae&nbsp;nesciunt&nbsp;dolore&nbsp;ducimus&nbsp;in&nbsp;consequuntur,&nbsp;autem&nbsp;corporis&nbsp;nulla&nbsp;ex&nbsp;hic&nbsp;alias&nbsp;recusandae&nbsp;nam&nbsp;molestias&nbsp;voluptates&nbsp;at&nbsp;distinctio&nbsp;magni&nbsp;blanditiis&nbsp;neque&nbsp;dicta,&nbsp;amet&nbsp;velit&nbsp;labore&nbsp;eum&nbsp;id!&nbsp;Possimus&nbsp;reiciendis&nbsp;deserunt,&nbsp;exercitationem&nbsp;laboriosam&nbsp;dicta&nbsp;repellendus&nbsp;quisquam&nbsp;sapiente&nbsp;suscipit&nbsp;id&nbsp;eos&nbsp;aut&nbsp;corrupti.</p>\r\n\r\n<p><strong>Lorem,&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.</strong>&nbsp;Possimus&nbsp;a&nbsp;aperiam&nbsp;omnis&nbsp;sequi,&nbsp;ratione,&nbsp;quis&nbsp;cumque&nbsp;id&nbsp;odit&nbsp;hic&nbsp;explicabo,&nbsp;repellat&nbsp;ipsum&nbsp;at&nbsp;quas?&nbsp;Similique&nbsp;sunt&nbsp;magni&nbsp;expedita&nbsp;maiores&nbsp;laudantium!&nbsp;Assumenda&nbsp;sunt&nbsp;porro&nbsp;error&nbsp;est&nbsp;quae!&nbsp;Veniam&nbsp;autem&nbsp;pariatur&nbsp;doloremque,&nbsp;expedita&nbsp;inventore&nbsp;rerum,&nbsp;ad&nbsp;modi,&nbsp;mollitia&nbsp;ipsam&nbsp;quidem&nbsp;nisi.&nbsp;At&nbsp;similique&nbsp;eligendi&nbsp;perferendis&nbsp;dolor.&nbsp;Sunt&nbsp;a&nbsp;architecto&nbsp;saepe&nbsp;ad&nbsp;voluptatem&nbsp;in&nbsp;tempore&nbsp;non&nbsp;doloribus&nbsp;obcaecati&nbsp;aliquam&nbsp;earum&nbsp;repellendus&nbsp;doloremque&nbsp;mollitia,&nbsp;ipsum&nbsp;neque&nbsp;facere&nbsp;dolorum&nbsp;atque?</p>', '5e88776812d6b.jpg', '2020-04-04', 'Rohaya', 7),
(3, 'Haji di Arab', 'haji-di-arab', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, eos!', '<p><strong>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur,&nbsp;</strong>adipisicing&nbsp;elit.&nbsp;Incidunt&nbsp;molestiae&nbsp;nesciunt&nbsp;dolore&nbsp;ducimus&nbsp;in&nbsp;consequuntur,&nbsp;autem&nbsp;corporis&nbsp;nulla&nbsp;ex&nbsp;hic&nbsp;alias&nbsp;recusandae&nbsp;nam&nbsp;molestias&nbsp;voluptates&nbsp;at&nbsp;distinctio&nbsp;magni&nbsp;blanditiis&nbsp;neque&nbsp;dicta,&nbsp;amet&nbsp;velit&nbsp;labore&nbsp;eum&nbsp;id!&nbsp;Possimus&nbsp;reiciendis&nbsp;deserunt,&nbsp;exercitationem&nbsp;laboriosam&nbsp;dicta&nbsp;repellendus&nbsp;quisquam&nbsp;sapiente&nbsp;suscipit&nbsp;id&nbsp;eos&nbsp;aut&nbsp;corrupti.</p>\r\n\r\n<p><strong>Lorem,&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.</strong>&nbsp;Possimus&nbsp;a&nbsp;aperiam&nbsp;omnis&nbsp;sequi,&nbsp;ratione,&nbsp;quis&nbsp;cumque&nbsp;id&nbsp;odit&nbsp;hic&nbsp;explicabo,&nbsp;repellat&nbsp;ipsum&nbsp;at&nbsp;quas?&nbsp;Similique&nbsp;sunt&nbsp;magni&nbsp;expedita&nbsp;maiores&nbsp;laudantium!&nbsp;Assumenda&nbsp;sunt&nbsp;porro&nbsp;error&nbsp;est&nbsp;quae!&nbsp;Veniam&nbsp;autem&nbsp;pariatur&nbsp;doloremque,&nbsp;expedita&nbsp;inventore&nbsp;rerum,&nbsp;ad&nbsp;modi,&nbsp;mollitia&nbsp;ipsam&nbsp;quidem&nbsp;nisi.&nbsp;At&nbsp;similique&nbsp;eligendi&nbsp;perferendis&nbsp;dolor.&nbsp;Sunt&nbsp;a&nbsp;architecto&nbsp;saepe&nbsp;ad&nbsp;voluptatem&nbsp;in&nbsp;tempore&nbsp;non&nbsp;doloribus&nbsp;obcaecati&nbsp;aliquam&nbsp;earum&nbsp;repellendus&nbsp;doloremque&nbsp;mollitia,&nbsp;ipsum&nbsp;neque&nbsp;facere&nbsp;dolorum&nbsp;atque?</p>', '5e887798a31f6.jpg', '2020-04-04', 'Rohaya', 6),
(4, 'Belajar Mengaji', 'belajar-mengaji', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, eos!', '<p><strong>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur,&nbsp;</strong>adipisicing&nbsp;elit.&nbsp;Incidunt&nbsp;molestiae&nbsp;nesciunt&nbsp;dolore&nbsp;ducimus&nbsp;in&nbsp;consequuntur,&nbsp;autem&nbsp;corporis&nbsp;nulla&nbsp;ex&nbsp;hic&nbsp;alias&nbsp;recusandae&nbsp;nam&nbsp;molestias&nbsp;voluptates&nbsp;at&nbsp;distinctio&nbsp;magni&nbsp;blanditiis&nbsp;neque&nbsp;dicta,&nbsp;amet&nbsp;velit&nbsp;labore&nbsp;eum&nbsp;id!&nbsp;Possimus&nbsp;reiciendis&nbsp;deserunt,&nbsp;exercitationem&nbsp;laboriosam&nbsp;dicta&nbsp;repellendus&nbsp;quisquam&nbsp;sapiente&nbsp;suscipit&nbsp;id&nbsp;eos&nbsp;aut&nbsp;corrupti.</p>\r\n\r\n<p><strong>Lorem,&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.</strong>&nbsp;Possimus&nbsp;a&nbsp;aperiam&nbsp;omnis&nbsp;sequi,&nbsp;ratione,&nbsp;quis&nbsp;cumque&nbsp;id&nbsp;odit&nbsp;hic&nbsp;explicabo,&nbsp;repellat&nbsp;ipsum&nbsp;at&nbsp;quas?&nbsp;Similique&nbsp;sunt&nbsp;magni&nbsp;expedita&nbsp;maiores&nbsp;laudantium!&nbsp;Assumenda&nbsp;sunt&nbsp;porro&nbsp;error&nbsp;est&nbsp;quae!&nbsp;Veniam&nbsp;autem&nbsp;pariatur&nbsp;doloremque,&nbsp;expedita&nbsp;inventore&nbsp;rerum,&nbsp;ad&nbsp;modi,&nbsp;mollitia&nbsp;ipsam&nbsp;quidem&nbsp;nisi.&nbsp;At&nbsp;similique&nbsp;eligendi&nbsp;perferendis&nbsp;dolor.&nbsp;Sunt&nbsp;a&nbsp;architecto&nbsp;saepe&nbsp;ad&nbsp;voluptatem&nbsp;in&nbsp;tempore&nbsp;non&nbsp;doloribus&nbsp;obcaecati&nbsp;aliquam&nbsp;earum&nbsp;repellendus&nbsp;doloremque&nbsp;mollitia,&nbsp;ipsum&nbsp;neque&nbsp;facere&nbsp;dolorum&nbsp;atque?</p>', '5e8877bf82acc.jpg', '2020-04-04', 'Umar', 8),
(5, 'Belajar Membaca', 'belajar-membaca', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, eos!', '<p><strong>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur,&nbsp;</strong>adipisicing&nbsp;elit.&nbsp;Incidunt&nbsp;molestiae&nbsp;nesciunt&nbsp;dolore&nbsp;ducimus&nbsp;in&nbsp;consequuntur,&nbsp;autem&nbsp;corporis&nbsp;nulla&nbsp;ex&nbsp;hic&nbsp;alias&nbsp;recusandae&nbsp;nam&nbsp;molestias&nbsp;voluptates&nbsp;at&nbsp;distinctio&nbsp;magni&nbsp;blanditiis&nbsp;neque&nbsp;dicta,&nbsp;amet&nbsp;velit&nbsp;labore&nbsp;eum&nbsp;id!&nbsp;Possimus&nbsp;reiciendis&nbsp;deserunt,&nbsp;exercitationem&nbsp;laboriosam&nbsp;dicta&nbsp;repellendus&nbsp;quisquam&nbsp;sapiente&nbsp;suscipit&nbsp;id&nbsp;eos&nbsp;aut&nbsp;corrupti.</p>\r\n\r\n<p><strong>Lorem,&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.</strong>&nbsp;Possimus&nbsp;a&nbsp;aperiam&nbsp;omnis&nbsp;sequi,&nbsp;ratione,&nbsp;quis&nbsp;cumque&nbsp;id&nbsp;odit&nbsp;hic&nbsp;explicabo,&nbsp;repellat&nbsp;ipsum&nbsp;at&nbsp;quas?&nbsp;Similique&nbsp;sunt&nbsp;magni&nbsp;expedita&nbsp;maiores&nbsp;laudantium!&nbsp;Assumenda&nbsp;sunt&nbsp;porro&nbsp;error&nbsp;est&nbsp;quae!&nbsp;Veniam&nbsp;autem&nbsp;pariatur&nbsp;doloremque,&nbsp;expedita&nbsp;inventore&nbsp;rerum,&nbsp;ad&nbsp;modi,&nbsp;mollitia&nbsp;ipsam&nbsp;quidem&nbsp;nisi.&nbsp;At&nbsp;similique&nbsp;eligendi&nbsp;perferendis&nbsp;dolor.&nbsp;Sunt&nbsp;a&nbsp;architecto&nbsp;saepe&nbsp;ad&nbsp;voluptatem&nbsp;in&nbsp;tempore&nbsp;non&nbsp;doloribus&nbsp;obcaecati&nbsp;aliquam&nbsp;earum&nbsp;repellendus&nbsp;doloremque&nbsp;mollitia,&nbsp;ipsum&nbsp;neque&nbsp;facere&nbsp;dolorum&nbsp;atque?</p>', '5e8877e59e543.jpg', '2020-04-04', 'Umar', 8),
(6, 'Mobil Bagus Nih!', 'mobil-bagus-nih', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, eos!', '<p><strong>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur,&nbsp;</strong>adipisicing&nbsp;elit.&nbsp;Incidunt&nbsp;molestiae&nbsp;nesciunt&nbsp;dolore&nbsp;ducimus&nbsp;in&nbsp;consequuntur,&nbsp;autem&nbsp;corporis&nbsp;nulla&nbsp;ex&nbsp;hic&nbsp;alias&nbsp;recusandae&nbsp;nam&nbsp;molestias&nbsp;voluptates&nbsp;at&nbsp;distinctio&nbsp;magni&nbsp;blanditiis&nbsp;neque&nbsp;dicta,&nbsp;amet&nbsp;velit&nbsp;labore&nbsp;eum&nbsp;id!&nbsp;Possimus&nbsp;reiciendis&nbsp;deserunt,&nbsp;exercitationem&nbsp;laboriosam&nbsp;dicta&nbsp;repellendus&nbsp;quisquam&nbsp;sapiente&nbsp;suscipit&nbsp;id&nbsp;eos&nbsp;aut&nbsp;corrupti.</p>\r\n\r\n<p><strong>Lorem,&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.</strong>&nbsp;Possimus&nbsp;a&nbsp;aperiam&nbsp;omnis&nbsp;sequi,&nbsp;ratione,&nbsp;quis&nbsp;cumque&nbsp;id&nbsp;odit&nbsp;hic&nbsp;explicabo,&nbsp;repellat&nbsp;ipsum&nbsp;at&nbsp;quas?&nbsp;Similique&nbsp;sunt&nbsp;magni&nbsp;expedita&nbsp;maiores&nbsp;laudantium!&nbsp;Assumenda&nbsp;sunt&nbsp;porro&nbsp;error&nbsp;est&nbsp;quae!&nbsp;Veniam&nbsp;autem&nbsp;pariatur&nbsp;doloremque,&nbsp;expedita&nbsp;inventore&nbsp;rerum,&nbsp;ad&nbsp;modi,&nbsp;mollitia&nbsp;ipsam&nbsp;quidem&nbsp;nisi.&nbsp;At&nbsp;similique&nbsp;eligendi&nbsp;perferendis&nbsp;dolor.&nbsp;Sunt&nbsp;a&nbsp;architecto&nbsp;saepe&nbsp;ad&nbsp;voluptatem&nbsp;in&nbsp;tempore&nbsp;non&nbsp;doloribus&nbsp;obcaecati&nbsp;aliquam&nbsp;earum&nbsp;repellendus&nbsp;doloremque&nbsp;mollitia,&nbsp;ipsum&nbsp;neque&nbsp;facere&nbsp;dolorum&nbsp;atque?</p>', '5e88781226843.jpg', '2020-04-04', 'Rohaya', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `image`, `role_id`) VALUES
(1, 'Alfian Andre Ramadhan', 'andrealfian.work@gmail.com', '$2y$10$W3oyUkkbsIDIGq2rC3L.i.stYixnoMeMSoToRzi8Rtml4ugGYRY/m', 'default.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'SUPERADMIN'),
(2, 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_temp`
--
ALTER TABLE `kategori_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_temp`
--
ALTER TABLE `post_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_temp`
--
ALTER TABLE `kategori_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post_temp`
--
ALTER TABLE `post_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
