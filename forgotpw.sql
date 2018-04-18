CREATE TABLE `forgotpw` (
  `forgot_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `date_forgot` datetime,
  PRIMARY KEY (`forgot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;