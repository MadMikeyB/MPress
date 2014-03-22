SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `url` varchar(2000) NOT NULL,
  `position` int(11) NOT NULL,
  `group` enum('guest','admin') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `title_seo` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `share_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `author` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `comments` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `views` int(11) NOT NULL,
  `category` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `featured` int(11) NOT NULL,
  `slider` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `share_id` (`share_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `posts` (`id`, `title`, `title_seo`, `share_id`, `body`, `author_id`, `author`, `comments`, `created_at`, `updated_at`, `views`, `category`, `featured`, `slider`, `image`) VALUES
(1, 'Welcome to MPress!', 'welcome-to-mikeypress', '3fq0', '<p>Oh hello there,&nbsp;This is MPress! New default design powered by <a href="http://getbootstrap.com">Bootstrap</a>.</p><blockquote><p>&quot;We love bootstrap&quot; - Everyone</p></blockquote><p>New Admin Center is also powered by a Bootstrap based design, called <a href="https://github.com/almasaeed2010/AdminLTE">AdminLTE</a>. It&#39;s a rockstar of a design, I must say. :)</p><p>Comments are powered by Facebook, this is just your example post which you may edit or delete. I&#39;ve also attached an image to this article for demonstration purposes.</p><p>Here&#39;s an automatically embedded&nbsp;video, just post the link!&nbsp;</p><p><iframe width="560" height="360" src="//www.youtube.com/embed/6Cp6mKbRTQY" frameborder="0" allowfullscreen=""></iframe></p>', 1, 'Mikey', 1, '2014-03-21 15:58:02', '2014-03-22 17:16:03', 127, 'uncategorized', 0, 0, '');


CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `username`, `nickname`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@domain.com', '$2y$08$Oe/CbtyKNeKB3zlqJs1Xguh8aY9fBNkK1jWSbzYpa88ihiuI9.llG', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
