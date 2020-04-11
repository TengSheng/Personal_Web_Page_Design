-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-06-11 07:47:58
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personal_web`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `uid` int(20) NOT NULL,
  `uname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `upwd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `admin` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`uid`, `uname`, `upwd`, `admin`) VALUES
(1, '贾邦飞', 'administer', '1');

-- --------------------------------------------------------

--
-- 表的结构 `admin_mc`
--

CREATE TABLE `admin_mc` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `content` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `umb_id` int(11) NOT NULL,
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `ad_announcement`
--

CREATE TABLE `ad_announcement` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `ad_announcement`
--

INSERT INTO `ad_announcement` (`id`, `date`, `content`) VALUES
(13, '2017-05-22', '欢迎来到个人网站管理系统！'),
(14, '2017-05-22', '祝你们有一个愉快的旅程！'),
(15, '2017-06-09', '各位用户你好，最近没有什么重要的通知要公布，不用太担心！'),
(17, '2017-06-09', '明天进行毕业答辩，加油！'),
(18, '2017-06-09', '加油');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sex` enum('男','女') COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `grade` enum('high','low') COLLATE utf8_unicode_ci NOT NULL,
  `login_limit` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `nickname`, `pwd`, `sex`, `date`, `grade`, `login_limit`) VALUES
(1, '腾升', '炊烟步青云', '131217', '男', '1994-03-17', 'high', 'yes'),
(2, '藤新', '极帝藤新', '072915', '男', '1994-08-17', 'high', 'yes'),
(3, '景道', '狼极', '051095', '男', '1995-05-10', 'high', 'yes'),
(10, '张俊军', '争征天空', '123456', '男', '1995-07-01', 'low', 'yes'),
(11, '李玟丽', '美丽阳光', '654321', '女', '1995-08-01', 'high', 'no');

-- --------------------------------------------------------

--
-- 表的结构 `user_album`
--

CREATE TABLE `user_album` (
  `id` int(11) NOT NULL,
  `album` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user_album`
--

INSERT INTO `user_album` (`id`, `album`, `description`, `date`, `name`) VALUES
(55, '民主光环', '那年那兔那些事', '2017-05-22', '腾升'),
(56, '大一宿舍照片', '大学宿舍', '2017-05-22', '腾升'),
(57, '时代变化', '那年那兔那些事', '2017-05-22', '藤新'),
(58, '荟灵湖', '安徽工业大学', '2017-05-22', '藤新'),
(59, '通灵王', '喜爱的动漫人物', '2017-05-22', '景道'),
(60, '北京游', '旅游', '2017-05-22', '景道'),
(61, '狼', '狼极', '2017-05-26', '腾升'),
(62, '个人照片', '贾藤新', '2017-06-09', '腾升'),
(63, '神兽', '青龙', '2017-06-09', '腾升');

-- --------------------------------------------------------

--
-- 表的结构 `user_friends`
--

CREATE TABLE `user_friends` (
  `id` int(11) NOT NULL,
  `friend_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `headimg` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `accept` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL,
  `inform_read` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user_friends`
--

INSERT INTO `user_friends` (`id`, `friend_name`, `name`, `nickname`, `headimg`, `user_id`, `accept`, `inform_read`) VALUES
(18, '腾升', '景道', '狼极', '../head_image/13.jpg', 3, 'yes', 'yes'),
(19, '藤新', '景道', '狼极', '../head_image/13.jpg', 3, 'yes', 'yes'),
(20, '腾升', '张俊军', '争征天空', '../head_image/QQ图像.jpg', 10, 'yes', 'yes'),
(23, '腾升', '李玟丽', '美丽阳光', '../head_image/19.jpg', 11, 'no', 'no'),
(24, '藤新', '李玟丽', '美丽阳光', '../head_image/19.jpg', 11, 'yes', 'yes'),
(25, '景道', '李玟丽', '美丽阳光', '../head_image/19.jpg', 11, 'no', 'no'),
(26, '藤新', '腾升', '炊烟步青云', '../head_image/空间图片33.jpeg', 1, 'yes', 'yes'),
(27, '景道', '腾升', '炊烟步青云', '../head_image/空间图片33.jpeg', 1, 'yes', 'yes'),
(31, '景道', '藤新', '极帝藤新', '../head_image/怪盗基德3.jpg', 2, 'yes', 'yes'),
(48, '张俊军', '藤新', '极帝藤新', '../head_image/怪盗基德3.jpg', 2, 'yes', 'yes'),
(51, '藤新', '张俊军', '争征天空', '../head_image/QQ图像.jpg', 10, 'yes', 'yes'),
(52, '藤新', '藤新', '极帝藤新', '../head_image/怪盗基德3.jpg', 2, 'no', 'yes'),
(53, '腾升', '藤新', '极帝藤新', '../head_image/怪盗基德3.jpg', 2, 'no', 'no');

-- --------------------------------------------------------

--
-- 表的结构 `user_friend_chat`
--

CREATE TABLE `user_friend_chat` (
  `id` int(11) NOT NULL,
  `friend_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `chat` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `chat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `user_image`
--

CREATE TABLE `user_image` (
  `id` int(20) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `album_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user_image`
--

INSERT INTO `user_image` (`id`, `name`, `file`, `date`, `type`, `album_name`) VALUES
(33, '1', '../img/1.png', '2017-05-22', 'image/png', '民主光环'),
(34, '2', '../img/2.png', '2017-05-22', 'image/png', '民主光环'),
(35, '3', '../img/3.png', '2017-05-22', 'image/png', '民主光环'),
(36, '4', '../img/4.png', '2017-05-22', 'image/png', '民主光环'),
(37, '5', '../img/5.png', '2017-05-22', 'image/png', '民主光环'),
(38, '6', '../img/6.png', '2017-05-22', 'image/png', '民主光环'),
(39, '212-6', '../img/安工大212—6.jpg', '2017-05-22', 'image/jpeg', '大一宿舍照片'),
(40, '212-8', '../img/安工大212—8.jpg', '2017-05-22', 'image/jpeg', '大一宿舍照片'),
(41, '方特', '../img/方特游18.jpg', '2017-05-22', 'image/jpeg', '大一宿舍照片'),
(42, '方特水车', '../img/方特游22.jpg', '2017-05-22', 'image/jpeg', '大一宿舍照片'),
(43, '壁纸-1', '../img/宿舍——王伟作品.jpg', '2017-05-22', 'image/jpeg', '大一宿舍照片'),
(44, '壁纸-2', '../img/宿舍——永振作品.jpg', '2017-05-22', 'image/jpeg', '大一宿舍照片'),
(47, '01', '../img/01.png', '2017-05-22', 'image/png', '时代变化'),
(48, '02', '../img/02.png', '2017-05-22', 'image/png', '时代变化'),
(49, '03', '../img/03.png', '2017-05-22', 'image/png', '时代变化'),
(50, '04', '../img/04.png', '2017-05-22', 'image/png', '时代变化'),
(51, '05', '../img/05.png', '2017-05-22', 'image/png', '时代变化'),
(52, '06', '../img/06.png', '2017-05-22', 'image/png', '时代变化'),
(53, '荟灵湖-1', '../img/安工大——荟灵湖.jpg', '2017-05-22', 'image/jpeg', '荟灵湖'),
(54, '荟灵湖-2', '../img/安工大——荟灵湖1.jpg', '2017-05-22', 'image/jpeg', '荟灵湖'),
(55, '荟灵湖-3', '../img/安工大——荟灵湖3.jpg', '2017-05-22', 'image/jpeg', '荟灵湖'),
(56, '荟灵湖-6', '../img/安工大——荟灵湖6.jpg', '2017-05-22', 'image/jpeg', '荟灵湖'),
(57, '荟灵湖-7', '../img/安工大——荟灵湖7.jpg', '2017-05-22', 'image/jpeg', '荟灵湖'),
(58, '荟灵湖-15', '../img/安工大——荟灵湖15.jpg', '2017-05-22', 'image/jpeg', '荟灵湖'),
(59, '荟灵湖-2', '../img/安工大——荟灵湖畔2.jpg', '2017-05-22', 'image/jpeg', '荟灵湖'),
(60, '安娜', '../img/安娜.jpg', '2017-05-22', 'image/jpeg', '通灵王'),
(61, '道连', '../img/道连.jpg', '2017-05-22', 'image/jpeg', '通灵王'),
(62, '好-1', '../img/好-1.png', '2017-05-22', 'image/png', '通灵王'),
(63, '好-2', '../img/好-2.png', '2017-05-22', 'image/png', '通灵王'),
(64, '好-3', '../img/好-3.png', '2017-05-22', 'image/png', '通灵王'),
(65, '好-4', '../img/好-4.png', '2017-05-22', 'image/png', '通灵王'),
(66, '好-5', '../img/好-5.png', '2017-05-22', 'image/png', '通灵王'),
(67, '好-6', '../img/好-6.png', '2017-05-22', 'image/png', '通灵王'),
(68, '叶', '../img/叶.png', '2017-05-22', 'image/png', '通灵王'),
(69, '龙椅', '../img/北京游——故宫（帝座龙椅）.jpg', '2017-05-22', 'image/jpeg', '北京游'),
(70, '合影', '../img/北京游——故宫（外国人合影）.jpg', '2017-05-22', 'image/jpeg', '北京游'),
(71, '故宫-1', '../img/北京游——故宫1.jpg', '2017-05-22', 'image/jpeg', '北京游'),
(72, '故宫-4', '../img/北京游——故宫4.jpg', '2017-05-22', 'image/jpeg', '北京游'),
(73, '故宫-5', '../img/北京游——故宫5.jpg', '2017-05-22', 'image/jpeg', '北京游'),
(74, '故宫-6', '../img/北京游——故宫6.jpg', '2017-05-22', 'image/jpeg', '北京游'),
(75, '纪念碑-1', '../img/北京游——天安门广场（人民英雄纪念碑）.jpg', '2017-05-22', 'image/jpeg', '北京游'),
(76, '纪念碑-2', '../img/北京游——天安门广场（人民英雄纪念碑2）.jpg', '2017-05-22', 'image/jpeg', '北京游'),
(77, '孙中山', '../img/北京游——天安门广场（孙中山）.jpg', '2017-05-22', 'image/jpeg', '北京游'),
(78, '广场', '../img/北京游——天安门广场1.jpg', '2017-05-22', 'image/jpeg', '北京游'),
(79, '狼-1', '../img/20.jpg', '2017-05-26', 'image/jpeg', '狼'),
(80, '狼-2', '../img/19.jpg', '2017-05-26', 'image/jpeg', '狼'),
(81, '狼-3', '../img/17.jpg', '2017-05-26', 'image/jpeg', '狼'),
(82, '狼-4', '../img/13.jpg', '2017-05-26', 'image/jpeg', '狼'),
(83, '狼-5', '../img/12.jpg', '2017-05-26', 'image/jpeg', '狼'),
(84, '狼-6', '../img/11.jpg', '2017-05-26', 'image/jpeg', '狼'),
(85, '狼-7', '../img/08.jpg', '2017-05-26', 'image/jpeg', '狼'),
(86, '狼-8', '../img/03 .jpg', '2017-05-26', 'image/jpeg', '狼'),
(87, '狼-9', '../img/02.jpg', '2017-05-26', 'image/jpeg', '狼'),
(88, '狼-10', '../img/00.png', '2017-05-26', 'image/png', '狼'),
(89, '贾藤新1', '../img/1448168782942.jpeg', '2017-06-09', 'image/jpeg', '个人照片'),
(90, '贾藤新2', '../img/贾藤新.jpg', '2017-06-09', 'image/jpeg', '个人照片'),
(91, '贾藤新3', '../img/贾藤新1.jpg', '2017-06-09', 'image/jpeg', '个人照片'),
(92, '贾藤新4', '../img/贾藤新5.jpg', '2017-06-09', 'image/jpeg', '个人照片'),
(93, '青龙', '../img/青龙.jpg', '2017-06-09', 'image/jpeg', '神兽'),
(94, '白虎', '../img/白虎.jpg', '2017-06-09', 'image/jpeg', '神兽'),
(95, '朱雀', '../img/朱雀.jpg', '2017-06-09', 'image/jpeg', '神兽'),
(96, '玄武', '../img/玄武.jpg', '2017-06-09', 'image/jpeg', '神兽');

-- --------------------------------------------------------

--
-- 表的结构 `user_information`
--

CREATE TABLE `user_information` (
  `id` int(11) NOT NULL,
  `headimg` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('男','女') COLLATE utf8_unicode_ci NOT NULL,
  `blood` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user_information`
--

INSERT INTO `user_information` (`id`, `headimg`, `name`, `nickname`, `gender`, `blood`, `birthday`, `address`, `introduction`) VALUES
(2, '../head_image/空间图片33.jpeg', '腾升', '炊烟步青云', '男', 'A', '1994-03-17', '安徽省巢湖市半汤街道', '种一棵树，最好的时间是十年前，其次是现在！'),
(3, '../head_image/怪盗基德3.jpg', '藤新', '极帝藤新', '男', 'AB', '1994-08-17', '安徽省巢湖市半汤街道', '风景依旧至极归，潜志隐伏匿现魁！'),
(4, '../head_image/13.jpg', '景道', '狼极', '男', 'B', '1995-05-10', '上海市浦东新区临港大学城', '狼极终将不可战胜'),
(5, '../head_image/QQ图像.jpg', '张俊军', '争征天空', '男', 'AB', '1995-07-01', '安徽省马鞍山市雨山区马向路', '雄鹰只有在天空翱翔，才算真正的自由！'),
(6, '../head_image/19.jpg', '李玟丽', '美丽阳光', '女', 'O', '1995-08-01', '江苏省南京市江陵区', '享受每一束明媚的阳光！');

-- --------------------------------------------------------

--
-- 表的结构 `user_journal`
--

CREATE TABLE `user_journal` (
  `id` int(20) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `auther` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user_journal`
--

INSERT INTO `user_journal` (`id`, `title`, `date`, `content`, `auther`) VALUES
(29, '毕业论文的修改工作', '2017-05-12', '<p>&nbsp; &nbsp; &nbsp; &nbsp;经过半个多月的论文设计与编写，毕业论文已经基本完成，这周的任务主要是对论文的修改，因为在第一遍的论文编写中，有很多地方一带而过或者篇幅略微有点重复和赘余，因此，这周，我从头到尾将毕业设计的论文认认真真地修改了一遍，从目录到内容，从需求分析，可行性到详细设计，都经过了充分的思考和改进，相比于第一遍，可以说是变了一个模样。与此同时，对于个人网站管理系统，我也从登录页面到主页面，从用户界面到管理员界面，从说说功能到留言板功能，都进行了一些必要的改变，让界面变得更加美观，用户体验也有所提升。以前用户没有头像，日志也不能修改等，这次的修改时，发现了这些不足，于是我经过一番努力，实现了这部分的功能，让用户界面更加生动，更加容易熟悉这套系统的应用。<br />\r\n&nbsp;</p>\r\n', '贾腾升'),
(32, '美国中情局“中国十诫”', '2017-05-26', '<p>对美国政府决策有着巨大影响的智囊库&mdash;&mdash;兰德公司向美国政府提出建议：</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;美国的对华战略应该分三步走：</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;第一步是西化、分化中国，使中国的意识形态西方化，从而失去与美国对抗的可能性！</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;第二步是在第一部失效或成效不大时，对中国进行全面的遏制，并形成对中国战略上的合围，包括地缘战略层次和国际组织体系层次，以削弱中国的国际生存空间和战略选择余地。</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;第三步是在前两步都不见效时，不惜与中国一战，但作战的最好形式是美国不直接参战，而是支持&ldquo;中国内部谋求独立的地区或与中国有重大利益冲突的周边国家&rdquo;。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '腾升'),
(34, '遇见', '2017-05-22', '<p>&nbsp;&nbsp;&nbsp;引导语：其实绝大多数女孩的一生都爱过不止一个人，就像兔子小姐一样，他们中有的是不适合和你在一起，有的是不能够和你在一起，这没有什么大不了的，&nbsp;</p>\r\n\r\n<p>&nbsp; 因为如果没有他们，你将永远不会知道，那只普普通通的兔子，是如何顶得上一亿两千万个男孩的。1=120000000，这就是爱情的真谛。</p>\r\n', '腾升'),
(35, '低质量的忙碌', '2017-05-22', '<p>低质量的忙碌意味着什么？</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;意味着一个人的大脑始终沿着惯性运转，没有停下来思考的空隙；意味着在身心的疲惫下，我们倾向于&ldquo;做到&rdquo;一件事情，而非&ldquo;努力将它做好&rdquo;；意味着为了尽快完成这些任务，我们倾向于套用过去的思维来解决问题，而未曾想过总结和改进的方法。</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;心理学者李松蔚老师说过，当你心里想着要赶快做这件事的时候，你的心就已经不在这件事上了。因为你只想着完成它，便永远无法专注于这件事情本身。</p>\r\n', '藤新'),
(36, '高效率的人生', '2017-05-22', '<p>第一，一定要有放空大脑的时间。</p>\r\n\r\n<p>　　她常常不坐车，穿过若干个小公园步行回家。看一看这城市的万家灯火，品一品这个城市四季流转之间的鸟语花香。这个习惯，既锻炼了身体，也清空了大脑，让高压之下的身心喘一口气，头脑才能更灵活。</p>\r\n\r\n<p>第二，用碎片化的时间思考。</p>\r\n\r\n<p>　　压力越大，她越喜欢收拾房间、洗衣做饭。这些原本会耗掉很多时间的家务劳动，却变成了工作之余的另一种休息方式。</p>\r\n\r\n<p>　　她说，手上在忙碌，脑子却一刻不停。和坐在办公室里的时候不同，这会儿最没人打扰，她最放松，思维也越活跃。&ldquo;有很多超棒的想法，都是在我刷碗的时候冒出来的呢！&rdquo;</p>\r\n\r\n<p>第三，再用绝对安静的时间，整理和输出。</p>\r\n\r\n<p>　　每天睡前，她会将脑子里冒出的念头稍作整理，写进记事本里。隔一段时间，她也会将前一段时间做过的事情、读过的书总结复盘。长此以往，不仅看得到自己一步一个脚印的成长轨迹，更能够在需要用到某部分知识的时候，迅速地调用它。</p>\r\n\r\n<p>　　最后，她拍了拍我的肩膀：&ldquo;时代太快，只有刻苦学习，不断进步，才能不被它落下。但如果连基本的思考都没有，如愚公一般，吭哧吭哧地搬完一座山，却始终看不到一旁的康庄大道，这便不叫努力，而只是在&lsquo;用努力的幻象自我欺骗&rsquo;。&rdquo;</p>\r\n\r\n<p>　　她的一番话，让我想起美国社会学家米尔斯说过的一句话：工作可能仅仅是一种生计来源，也可能是一个人内心生活中最重要的组成部分。</p>\r\n\r\n<p>　　远离低质量的忙碌，真正地提高效率，才能在工作中获得自己真正想要的成长。</p>\r\n', '藤新'),
(37, '选择毕业设计的准备阶段', '2017-05-22', '<p>&nbsp; &nbsp; &nbsp; 不知不觉已经大四了，临近毕业，我们将要完成在大学的最后一份作业&mdash;&mdash;毕业设计，这次的毕业设计我选的是基于web的个人网页设计与实现，前台依赖于JavaScript的动态网页设计，后台是基于PHP，可以对服务端进行数据库等的相关操作。大三学过JS和HTML,CSS，但是，基础不牢固，一些需要重头开始学起。<br />\r\n&nbsp; &nbsp; &nbsp; 首先,进行的是编辑器和服务器的选择，我选择的是window7环境下的Hbuilder和XAMPP(Apache+MySQL+PHP+PERL),XAMPP是一个功能强大的建站集成软件包。<br />\r\n&nbsp; &nbsp; &nbsp; 其次，对其环境进行配置，尤其要注意服务器端口的选择和密码的重新设置，如果配置的过程出现误差，后面的工作将遇到很多麻烦。<br />\r\n&nbsp; &nbsp; &nbsp; 最后，检查相关设置，进入phpMyAdmin，尝试数据库的建立，以及连接数据库的测试！<br />\r\n&nbsp;</p>\r\n', '景道'),
(38, 'HTML5的学习', '2017-05-22', '<p>&nbsp; &nbsp; &nbsp; 大三的时候学习过HTML5,也做过相关的练习，但是时间过去快一年了，很多知识点有所遗忘，要想做好这次的毕业设计，很多知识必须重头认真学习。这一周学习了Html5的基础标签，格式标签，表单标签，框架标签，图像标签，音频视频标签，链接标签，列表标签等，这部分的内容比较简单，学起来也不难，但对后面CSS和JavaScript的学习而言，要求有一个扎实的HTML5的基础。<br />\r\n&nbsp; &nbsp; &nbsp;上述的标签元素又可以分为两大类，独占一行块元素和可多个放于一行的内联元素。&lt;div&gt;&lt;/div&gt;是最常用最方便的元素之一，是块元素，但是可以通过CSS放于一行，可见div是非常灵活的，所以这次的毕业设计div标签用的最多，table相对而言就少得多了<br />\r\n&nbsp; &nbsp; &nbsp;利用HTML的知识，我设计出毕业设计的管理员，用户，游客的主界面，用的都是Frameset布局，好处是可以将页面分成好几个模块而互不干扰。信息提交至数据库的实现多依赖于form表单。<br />\r\n&nbsp;</p>\r\n', '景道'),
(39, 'CSS的学习', '2017-05-22', '<p>&nbsp; &nbsp; &nbsp; &nbsp;CSS<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">对于</span>Web<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">来说非常重要，没有</span>CSS<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">的</span>HTML<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">就像是没装潢的房子，用户体验特别差，而在</span>web<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">中，静态的样式都依赖于</span>CSS<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">。在我这次毕业设计的主界面中，</span>CSS<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">都是在单独的</span>CSS<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">文件中编写，通过</span>&lt;link&gt;<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">来连接外部样式。</span></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp;<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">在样式的学习中，</span>border<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">的粗细，颜色，线样；背景的背景图，背景颜色；文字的位置，颜色，大小，字体；文本的对齐方式，首行缩进，文本修饰；以及最重要的和模型，这些属性可以将页面做的非常漂亮。这些都是在选择器内的属性。而选择器又有优先级：</span>id&gt;class&gt;<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">标签名</span>&gt;*<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">。</span></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp;<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">在我的毕业设计中，登录界面和注册界面，用了非常多的</span>CSS<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">样式，用户框中的</span>config<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">图片字体，让登录界面更加生动活泼，通过</span>border-radius: 5px;<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">让登录按钮更加美观，当然，这并不是最终的登陆于注册界面，后期会经过美工和测试来提升用户体验！</span></p>\r\n', '景道'),
(40, 'JavaScript的学习', '2017-05-22', '<p>&nbsp; &nbsp; &nbsp;JavaScript是基于对象和事件驱动的客户脚本语言，也可以对样式进行一些操作，实现动态样式，在CSS美化界面的基础上实现网页的动态展现。JavaScript主要分为ECMAscript,DOM,BOM;其中，变量类型，运算符，流程控制都非常简单，这部分的学习也不吃力，对于数组的学习，因为和以前的C语言中的数组有一些差别，稍微多花了点时间在JSon，数组的增加和减少操作（arr.push()和arr.shift()等）上。<br />\r\n&nbsp; &nbsp; &nbsp; 定时器的使用，event对象和事件冒泡等的学习占据了本周的大部分时间。<br />\r\n&nbsp; &nbsp; &nbsp;上面便是一个简单的通过对象和事件实现单击隐藏的代码实现。登录页面中的用户名、密码等不可为空，密码和密码确认不一致，onsubmit点击提交信息至数据库等等，都是通过JavaScript来实现的。可以说javascript实现了浏览器和客户端的交互，服务端的基于php的数据库部分操作，也是通过JavaScript来实现的。<br />\r\n&nbsp;</p>\r\n', '景道'),
(41, 'php的学习', '2017-05-22', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PHP<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">是服务期端的可以嵌入到</span>HTML<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">的脚本语言，可以实现收集表单数据，生成动态网页，字符串处理，会话跟踪等等。这周学习了</span>PHP<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">的基本语法、流程控制、函数应用、数组与数据结构，对象的封装、继承等。</span>php<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">的基础部分有很多和</span>C<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">语言，</span>JAVA,C#<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">很像，所以学起来就没有那么困难，很容易理解。但是真正运用起来的时候确实有点困难，想在短短的一个月做得非常完美更是不可能。</span></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">我的毕业设计中有一个经常用到的功能，叫做留言板功能，无论说说，日志，还是留言，都是以此为基础。在学习用</span>PHP<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">做留言板的时，首先是设计数据库，连接数据库。</span></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">其次是设计表单，以实现通过点击表单的提交按钮实现将信息存到数据库中，然后通过</span>php+mysql+html<span style="font-family:&quot;微软雅黑&quot;,&quot;sans-serif&quot;">将信息展现在页面上。最后经过设计，可以实现留言的删除和回复等功能！</span></p>\r\n', '景道'),
(42, '留言板功能的完成', '2017-05-22', '<p>&nbsp; &nbsp; &nbsp; 在学习完HTML5,CSS,JavaScript,php的同时，初步完成了登录，注册，以及管理员，用户，游客的主界面，从这周开始，将进入说说，日志，相册和留言板功能的实现，这周主要任务是完成留言板，同时，也进行数据库语言mysql的学习。留言板功能依赖于数据库的操作，尤其是对留言，回复在数据库中添加删除操作。<br />\r\n&nbsp; &nbsp; &nbsp; 该功能中，分为三个界面，分别为管理员，用户，游客的相关操作。游客可以给用户留言，并在游客页面显示用户给游客的回复;用户给管理员留言, 并在用户页面显示用户给游客的回复,以及管理游客留言，对游客留言进行回复和删除；管理员管理用户的留言，对用户的留言进行回复和删除。<br />\r\n数据库中要提前设计好visitor_mb(游客留言)，user_mb（用户留言回复），user_mb（用户留言），admin_mc(管理员回复)四个数据库，实现在页面中，对数据库进行操作数据库。<br />\r\n&nbsp;</p>\r\n', '景道'),
(43, '说说功能的实现', '2017-05-22', '<p>&nbsp; &nbsp; &nbsp; 说说的功能比留言板复杂，留言板只有留言和回复，说说除此之外，多了一个评论，以及对评论的回复，一来一回，就不知复杂了一点，需要对各个id进行匹配。让访问某个用户的评论只出现在该用户的某条固定的说说，评论的回复，也同样在某条指定的评论之下。说的有点绕，实现起来却不简单。下面具体介绍三个界面和功能。<br />\r\n&nbsp; &nbsp; &nbsp; 界面同样为三个，管理员界面、用户界面、游客界面。在用户界面，用户可以进行说说的发表和管理，即实现对说说，游客的评论，评论的回复进行删除和回复游客的评论。游客方面，功能相对简单，只能查看说说，以及对说说进行评论。数据库只有三个user_talkabout（用户发表的说说），visitor_comment（游客对说说的回复）,user_replay（用户回复游客的评论）。为了说说、评论的一一对应，在visitor_comment，user_replay中分别存储了说说的id、评论的id以及用户的名称。<br />\r\n&nbsp;</p>\r\n', '景道'),
(44, '日志功能的实现', '2017-05-22', '<p>&nbsp; &nbsp; &nbsp; 前面已经说过，说说，留言板，日志的功能实现，方法不同、界面不一样，但原理都一样。都是先将内容传送到数据库，然后通过对数据库进行操作将内容显示在网页之中。<br />\r\n&nbsp; &nbsp; &nbsp; 日志功能的实现分为三个界面，管理员界面，用户界面，游客界面。用户界面的设计与实现最为复杂，不仅有日志的提交，删除，还需要对展示的日志进行分页管理，每页显示8个日志，当然，这里只是8个日志的标题，通过点击标题，我们可以进入具体的日志页面，阅读用户所写的日志。在游客界面，游客只拥有浏览的权利，不能对日志进行删除操作。管理员界面，拥有删除，浏览的所有功能和用户一样。<br />\r\n&nbsp;</p>\r\n', '景道'),
(45, '相册功能的实现', '2017-05-22', '<p>&nbsp; &nbsp; &nbsp; 相册的功能实现是这几个功能中最为复杂的，不仅得有新建相册的功能，而且新建相册之后，还要添加照片，相册不可同名，否则无法新建。照片的上传和删除，相册的删除，相当的复杂，在设计过程还有到了很多的问题，但是，通过上网查资料，寻求解决办法，最终还是克服了这些困难，实现了相册功能。<br />\r\n&nbsp; &nbsp; &nbsp; 相册功能在管理员界面，用户界面，游客界面三个界面上实现。用户界面，先建立相册和命名相册，进入相册之中，添加上传相册；之后游客就可以访问该页面，查看相册和里面的照片；用户，在新建和上传照片之后，就可以对相册和照片进行删除的管理。同样管理员，也可以对相册和照片进行查看和删除管理。<br />\r\n&nbsp; &nbsp; &nbsp; 该部分所涉及的数据库有user_album（用户新建相册）和user_image（用户上传照片）两张，数据库不多，但数据库中用户、相册和照片的一一对应，还是很复杂的。<br />\r\n&nbsp;</p>\r\n', '景道'),
(46, '公告、密码修改，用户信息管理等', '2017-05-22', '<p>&nbsp; &nbsp; &nbsp; 当留言、说说、日志、相册功能实现之后，主要的功能已经实现，并且在设计功能的同时，也进行着系统的设计与实现，目前管理员，用户，游客，三大界面的主要功能已经实现，这周的任务是在以前的基础上实现管理员对用户的公告通知，管理员和用户的密码修改，用户的个人信息的完善和展示。这部分所要求的数据库为ad_announcement（管理员发布的公告）、user_information（用户的个人信息）、admin（管理员的登录名和密码）、user（用户的登录名和密码）。通过对这些数据库的操作，可以实现这部分相关功能的实现。<br />\r\n&nbsp; &nbsp; &nbsp; 这部分没遇到特别困难的功能实现，但是公告用到了分页功能，花费了些时间。但是整体比较顺利。<br />\r\n&nbsp;</p>\r\n', '景道'),
(47, '个人网站系统的功能完善和毕业论文的开始', '2017-06-09', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;个人网站管理系统整体功能已经基本实现，剩下的工作就是对个人网站管理系统的功能完善和界面美化，这部分没有特别困难的任务，但是挺消耗时间，比较繁琐，细节要注意的地方很多。<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;因为个人网站管理系统还存在很多的漏洞，所以还要经过大量的测试才能真正的实现最初的目标。与此同时，就可以开水毕业论文部分的工作了，以便测试系统，一边编写毕业论文的word文档，目录要清晰，功能介绍要详细。在基于PHP技术的个人网站的设计过程这部分，包含数据库，截图，关键代码。是本次毕业设计的主要内容，也已经详细的在论文中介绍了。<br />\r\n毕业论文的修改工作<br />\r\n&nbsp;经过半个多月的论文设计与编写，毕业论文已经基本完成，这周的任务主要是对论文的修改，因为在第一遍的论文编写中，有很多地方一带而过或者篇幅略微有点重复和赘余，因此，这周，我从头到尾将毕业设计的论文认认真真地修改了一遍，从目录到内容，从需求分析，可行性到详细设计，都经过了充分的思考和改进，相比于第一遍，可以说是变了一个模样。与此同时，对于个人网站管理系统，我也从登录页面到主页面，从用户界面到管理员界面，从说说功能到留言板功能，都进行了一些必要的改变，让界面变得更加美观，用户体验也有所提升。以前用户没有头像，日志也不能修改等，这次的修改时，发现了这些不足，于是我经过一番努力，实现了这部分的功能，让用户界面更加生动，更加容易熟悉这套系统的应用。<br />\r\n&nbsp;</p>\r\n', '景道'),
(48, '毕业', '2017-06-09', '<p>到处的熟悉的，曾经走过的道路、食堂、图书馆，一切都是那么让人留恋！</p>\r\n', '腾升');

-- --------------------------------------------------------

--
-- 表的结构 `user_mb`
--

CREATE TABLE `user_mb` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `content` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user_mb`
--

INSERT INTO `user_mb` (`id`, `date`, `content`, `name`) VALUES
(10, '2017-05-22', '管理员你好，我是刚刚注册的用户腾升。', '腾升'),
(11, '2017-05-22', '你好，初次见面，请多多关照！', '藤新'),
(12, '2017-05-22', '管理员你好，给您添麻烦了！', '景道'),
(20, '2017-06-09', '管理员，你好，最近有什么重要的通知吗？', '腾升'),
(21, '2017-06-09', '最近公告一直没有新的通知，有什么事耽搁了吗？', '腾升');

-- --------------------------------------------------------

--
-- 表的结构 `user_mc`
--

CREATE TABLE `user_mc` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `content` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `vmb_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user_mc`
--

INSERT INTO `user_mc` (`id`, `name`, `date`, `content`, `vmb_id`) VALUES
(37, '腾升', '2017-05-22', '你好你好，认识你很荣幸', 25),
(43, '景道', '2017-06-09', '欢迎来到我的空间。', 27),
(46, '景道', '2017-06-09', '再次表示欢迎！', 27),
(48, '腾升', '2017-06-09', '再次欢迎你的到来！~', 25),
(49, '藤新', '2017-06-09', '欢迎', 26),
(50, '景道', '2017-06-09', '谢谢赏脸！', 28),
(51, '腾升', '2017-06-09', '我很高兴你能来！', 29),
(52, '藤新', '2017-06-09', '你好啊，腾升，好久没见到你人了！', 30);

-- --------------------------------------------------------

--
-- 表的结构 `user_replay`
--

CREATE TABLE `user_replay` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `content` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cm_id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user_replay`
--

INSERT INTO `user_replay` (`id`, `date`, `content`, `cm_id`, `name`) VALUES
(27, '2017-05-20', '是的，是得相信你', 30, '贾邦飞'),
(28, '2017-05-20', '哈哈', 32, '贾邦飞'),
(29, '2017-05-20', '挺好的', 33, '贾邦飞'),
(30, '2017-05-21', '确实挺好的', 33, '贾邦飞'),
(31, '2017-05-21', '挺好', 33, '贾邦飞'),
(34, '2017-05-22', '毕业了，免不了的伤感！', 133, '贾邦飞'),
(36, '2017-05-22', '一起朝着文化人努力吧', 134, '腾升'),
(37, '2017-05-22', '喜欢就好。', 136, '腾升'),
(38, '2017-06-09', '知己', 140, '腾升'),
(40, '2017-06-09', '谢谢夸奖', 0, '景道'),
(42, '2017-06-09', '谢谢夸奖！', 142, '景道'),
(44, '2017-06-09', '谢谢夸奖', 141, '景道'),
(45, '2017-06-09', '没关系，后面的人生将不再如此！', 138, '腾升');

-- --------------------------------------------------------

--
-- 表的结构 `user_talkabout`
--

CREATE TABLE `user_talkabout` (
  `id` int(20) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `browse` int(11) NOT NULL,
  `praise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user_talkabout`
--

INSERT INTO `user_talkabout` (`id`, `name`, `content`, `date`, `browse`, `praise`) VALUES
(20, '腾升', '这世上没有好人和坏人，只有做了好事的人，和做了坏事的人！', '2017-05-22', 3, 1),
(21, '腾升', '我们用日复一日的低质量忙碌，为自己制造了一个努力的幻象，然后，心满意足地活在“年轻人就该吃苦”的海市蜃楼中。', '2017-05-22', 7, 1),
(22, '腾升', '真正的文化包含了四个层面，那就是一个人根植于内心的修养；无需提醒的自觉；以懂得约束为前提的自由；时刻为别人着想的善良。', '2017-05-22', 25, 7),
(24, '藤新', '就如同这干细胞一般，有的人分化成了“大脑和心脏的一部分”，有的人却分化成了“头发，指甲以及脱落的表皮”。社会便如同一个人一般，分化的同时，并成长！', '2017-05-22', 0, 0),
(26, '藤新', '晨阳束束映偕影，清风阵阵散云烟。 残游四纪隐伏现，孤自飘零丝过渊。', '2017-05-22', 0, 0),
(27, '藤新', '问曰：“大师，什么是生命？” ', '2017-05-22', 0, 0),
(28, '藤新', '答曰：“生命，就是时时刻刻不知如何是好！”', '2017-05-22', 5, 1),
(30, '景道', '狼极，将是这个社会的新生角色，他将突破现有的规律和势力，并开辟新的重组分配，获得自己的领域！', '2017-05-22', 5, 1),
(31, '景道', '物质的绝对差异，精神的相对平等，意志的绝对平等！', '2017-05-22', 14, 1),
(33, '腾升', '新未\r\n今方见红豆，他朝语梧桐。\r\n未知终归地，万物皆新处。', '2017-06-09', 4, 1);

-- --------------------------------------------------------

--
-- 表的结构 `visitor_comment`
--

CREATE TABLE `visitor_comment` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `content` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ta_id` int(20) NOT NULL,
  `friend_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `visitor_comment`
--

INSERT INTO `visitor_comment` (`id`, `name`, `date`, `content`, `ta_id`, `friend_name`) VALUES
(133, '贾邦飞', '2017-05-22', '说得在理，深有同感！', 19, '袁崇焕'),
(134, '腾升', '2017-05-22', '非常赞同，说得很有道理！', 22, '藤新'),
(136, '腾升', '2017-05-22', '根植于内心的修养，无需提醒的自由，很喜欢这几句！', 22, '景道'),
(137, '腾升', '2017-05-22', '这句话，值得让人反思。', 21, '景道'),
(138, '腾升', '2017-06-09', '感觉自己一直就是这样的，心酸！', 21, '景道'),
(139, '腾升', '2017-06-09', '我觉得人的好坏只有自己知道。', 20, '景道'),
(140, '腾升', '2017-06-09', '红豆乃寄托相思之情，梧桐乃理想象征，迷茫中探索，并重头开始。', 33, '景道'),
(141, '景道', '2017-06-09', '内心很强大', 31, '藤新'),
(142, '景道', '2017-06-09', '有理想的有为青年。', 30, '藤新');

-- --------------------------------------------------------

--
-- 表的结构 `visitor_mb`
--

CREATE TABLE `visitor_mb` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `content` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `friend_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `visitor_mb`
--

INSERT INTO `visitor_mb` (`id`, `date`, `content`, `name`, `friend_name`) VALUES
(25, '2017-05-22', '腾升你好，今天得空，访问你的空间！', '腾升', '景道'),
(26, '2017-05-22', '藤新，你好，我也顺便猜猜你的空间！', '藤新', '景道'),
(27, '2017-06-09', '你好，初次来访！', '景道', '腾升'),
(28, '2017-06-09', '景道，你好，我是藤新，来看看你！', '景道', '藤新'),
(29, '2017-06-09', '腾升你好，我是藤新，得空来逛逛！', '腾升', '藤新'),
(30, '2017-06-09', '藤新你好，我是腾升！', '藤新', '腾升');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `admin_mc`
--
ALTER TABLE `admin_mc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_announcement`
--
ALTER TABLE `ad_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_album`
--
ALTER TABLE `user_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_friends`
--
ALTER TABLE `user_friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_friend_chat`
--
ALTER TABLE `user_friend_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_image`
--
ALTER TABLE `user_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_journal`
--
ALTER TABLE `user_journal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_mb`
--
ALTER TABLE `user_mb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_mc`
--
ALTER TABLE `user_mc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_replay`
--
ALTER TABLE `user_replay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_talkabout`
--
ALTER TABLE `user_talkabout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_comment`
--
ALTER TABLE `visitor_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_mb`
--
ALTER TABLE `visitor_mb`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `admin_mc`
--
ALTER TABLE `admin_mc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `ad_announcement`
--
ALTER TABLE `ad_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `user_album`
--
ALTER TABLE `user_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- 使用表AUTO_INCREMENT `user_friends`
--
ALTER TABLE `user_friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- 使用表AUTO_INCREMENT `user_friend_chat`
--
ALTER TABLE `user_friend_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `user_image`
--
ALTER TABLE `user_image`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- 使用表AUTO_INCREMENT `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `user_journal`
--
ALTER TABLE `user_journal`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- 使用表AUTO_INCREMENT `user_mb`
--
ALTER TABLE `user_mb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- 使用表AUTO_INCREMENT `user_mc`
--
ALTER TABLE `user_mc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- 使用表AUTO_INCREMENT `user_replay`
--
ALTER TABLE `user_replay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- 使用表AUTO_INCREMENT `user_talkabout`
--
ALTER TABLE `user_talkabout`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- 使用表AUTO_INCREMENT `visitor_comment`
--
ALTER TABLE `visitor_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- 使用表AUTO_INCREMENT `visitor_mb`
--
ALTER TABLE `visitor_mb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
