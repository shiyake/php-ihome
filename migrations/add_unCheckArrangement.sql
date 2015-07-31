ALTER TABLE `ihome_arrangement` DROP COLUMN allow;

CREATE TABLE `ihome_unCheckArrangement` (
      `arrangementid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
      `uid` mediumint(8) unsigned DEFAULT '0',
      `subject` varchar(200) NOT NULL,
      `classid` smallint(6) unsigned NOT NULL DEFAULT '0',
      `starttime` int(10) unsigned NOT NULL DEFAULT '0',
      `message` mediumtext NOT NULL,
      `tag` varchar(255) NOT NULL,
      `postip` varchar(20) NOT NULL,
      `viewnum` mediumint(8) unsigned NOT NULL DEFAULT '0',
      `replynum` mediumint(8) unsigned NOT NULL DEFAULT '0',
      `dateline` int(10) NOT NULL,
      `pic` varchar(120) NOT NULL,
      `picflag` tinyint(1) NOT NULL DEFAULT '0',
      `noreply` tinyint(1) NOT NULL DEFAULT '0',
      PRIMARY KEY (`arrangementid`),
      UNIQUE KEY `time` (`starttime`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8
