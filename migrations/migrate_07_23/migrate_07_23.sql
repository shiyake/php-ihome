alter table ihome_space add alias varchar(30);
alter table ihome_space add identity varchar(30);
alter table ihome_space add iden_t varchar(30);
alter table ihome_feed add column isdeleted tinyint(1) default 0;
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

alter table ihome_publicapply add adminupdatetime varchar(20);
alter table ihome_publicapply add nameupdatetime varchar(20);
alter table ihome_doing add top int(11) default 0;
alter table ihome_doing add address varchar(255) default NULL;

alter table ihome_feed add ip varchar(45) default NULL;
alter table ihome_feed add address varchar(255) default NULL;
alter table ihome_comment add secret varchar(255) default NULL;
alter table ihome_thread add anonymous int not null default 0;
alter table ihome_post add anonymous int not null default 0;
