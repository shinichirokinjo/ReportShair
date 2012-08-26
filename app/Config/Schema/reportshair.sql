
CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `album_id` int(11) UNSIGNED NOT NULL,
  `created` int(11) UNSIGNED NOT NULL,
  `modified` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `event_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT '',
  `start_time` int(11) UNSIGNED,
  `end_time` int(11) UNSIGNED,
  `location` varchar(50),
  `venue` varchar(50),
  `privacy` varchar(10) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created` int(11) UNSIGNED NOT NULL,
  `modified` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `photo_id` int(11) UNSIGNED NOT NULL,
  `created` int(11) UNSIGNED NOT NULL,
  `modified` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `page_id` int(11) UNSIGNED NOT NULL,
  `slug` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` enum('delete', 'publish') NOT NULL DEFAULT 'publish',
  `created` int(11) UNSIGNED NOT NULL,
  `modified` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `facebook_id` bigint(20) UNSIGNED NOT NULL,
  `facebook_link` varchar(100) DEFAULT '',
  `twitter_id` varchar(50) DEFAULT '',
  `website_link` varchar(100) DEFAULT '',
  `profile` text DEFAULT '',
  `locale` varchar(10) DEFAULT '',
  `language` varchar(20) DEFAULT '',
  `deleted` boolean NOT NULL DEFAULT false,
  `created` int(11) UNSIGNED NOT NULL,
  `modified` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`username`),
  UNIQUE KEY (`facebook_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
