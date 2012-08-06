CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `thumb` int(11) UNSIGNED,
  `title` varchar(100) NOT NULL,
  `body` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `photo_count` int(11) UNSIGNED DEFAULT 0,
  `went_count` int(11) UNSIGNED DEFAULT 0,
  `hashtag` varchar(30) DEFAULT NULL,
  `status` enum('delete', 'publish') NOT NULL DEFAULT 'publish',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

INSERT INTO `reports` VALUES
(1, 1, 'RedTrash', 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor maurisDonec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris', '2012-10-10 00:00:01', 'Place', 'publish', now(), now()),
(2, 1, 'Bigbeach fes 2012', 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor maurisDonec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris', '2012-10-11 00:00:01', 'Place', 'publish', now(), now()),
(3, 1, 'Metamorphose2012', 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor maurisDonec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris', '2012-10-12 00:00:01', 'Place', 'publish', now(), now());
