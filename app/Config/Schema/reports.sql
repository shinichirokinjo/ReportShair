CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `body` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

INSERT INTO `reports` VALUES 
(1, 'RedTrash', '', '2012-10-10 00:00:01', '', now(), now()),
(2, 'Bigbeach fes 2012', '', '2012-10-11 00:00:01', '', now(), now()),
(3, 'Metamorphose2012', '', '2012-10-12 00:00:01', '', now(), now());
