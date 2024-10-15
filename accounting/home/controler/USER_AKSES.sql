CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `USER` varchar(30) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `AKSES` varchar(100) NOT NULL,
  `stts_data` int(11) NOT NULL,
  `c_data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
INSERT INTO `users` (`id`, `USER`, `PASSWORD`, `AKSES`, `stts_data`) VALUES
(1, 'superuser', 'superuser', '#SUPER', 1);
