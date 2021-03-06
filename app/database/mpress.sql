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

CREATE TABLE `tags` (
`id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL COMMENT 'Tags have a max length of 32 chars',
  `author_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `tags`
 ADD PRIMARY KEY (`id`);
 
ALTER TABLE `tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


CREATE TABLE `categories` (
`id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;



CREATE TABLE `settings` (
`id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `key` varchar(160) NOT NULL,
  `value` text NOT NULL,
  `type` enum('radio','text','checkbox') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO `settings` (`id`, `name`, `key`, `value`, `type`) VALUES
(1, 'Website Name (Displayed in browser title bar)', 'sitename', 'MPress', 'text'),
(2, 'Site Title', 'title', 'MPress', 'text'),
(3, 'Site Description', 'desc', 'This is a site powered by the MPress CMS!', 'text'),
(4, 'Use Alternate Login Style?', 'altlogin', '1', 'checkbox'),
(5, 'Show About Block?', 'about_toggle', '1', 'checkbox'),
(6, 'About Block Title', 'about', 'About', 'text'),
(7, 'About Block Description', 'about_desc', 'This is a site powered by MPress. Learn more at mpresscms.com', 'text'),
(8, 'Show Branding?', 'showbranding', '1', 'checkbox'),
(13, 'Use Local Bootstrap CSS? (May be faster than remote on some servers)', 'uselocalbootstrap', '0', 'checkbox'),
(16, 'Show Category Name on Post?', 'show_category_on_post', '0', 'checkbox'),
(17, 'Show Share Link on Posts?', 'display_shorturl', '1', 'checkbox'),
(18, 'Show Share Links on Post?', 'display_sharelinks', '1', 'checkbox'),
(19, 'Enable Tags?', 'enable_tags', '1', 'checkbox'),
(20, 'Facebook Admin ID''s', 'fbadmins', '', 'text'),
(21, 'Facebook App ID', 'fbappid', '', 'text'),
(22, 'Facebook Widget Width', 'fbappwidth', '', 'text'),
(23, 'Facebook Widget Height', 'fbappheight', '', 'text'),
(24, 'Facebook Widget Header', 'fbappheader', 'MPress', 'text'),
(25, 'Facebook Widget Font', 'fbappfont', 'Tahoma', 'text');

ALTER TABLE `settings`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;

/*INSERT INTO `users` (`id`, `username`, `nickname`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@domain.com', '$2y$08$Oe/CbtyKNeKB3zlqJs1Xguh8aY9fBNkK1jWSbzYpa88ihiuI9.llG', '0000-00-00 00:00:00', '0000-00-00 00:00:00');*/;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
