DROP TABLE if EXISTS `ihome_signup_log`;
create table ihome_signup_log (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `uid` int(10) NOT NULL,
    `usertype` varchar(20) NOT NULL,
    `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE if EXISTS `ihome_signup_analyse`;
create table ihome_signup_analyse (
    `usertype` varchar(20) NOT NULL,
    `total` int(10) NOT NULL,
    `amount` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

