CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `mime_type` varchar(30) DEFAULT NULL,
  `size` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `width` int(5) UNSIGNED NOT NULL DEFAULT '0',
  `height` int(5) UNSIGNED NOT NULL DEFAULT '0',
  `created` int(11) UNSIGNED NOT NULL,
  `modified` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY `id` (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;
