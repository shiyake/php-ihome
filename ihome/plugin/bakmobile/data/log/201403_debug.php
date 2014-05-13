<?PHP exit;?>	2014-03-08 07:48:50		61.148.242.254	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='1029160657@qq.com' and password=md5(concat('15ab184bbc8407514abab0d9cfb58575',salt))
<?PHP exit;?>	2014-03-08 07:48:50		61.148.242.254	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='2873'
<?PHP exit;?>	2014-03-08 07:48:50		61.148.242.254	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='2873' OR lastactivity<'1394234330'
<?PHP exit;?>	2014-03-08 07:48:50		61.148.242.254	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2873', '1029160657@qq.com', '15ab184bbc8407514abab0d9cfb58575', '1394236130', '061148242')
<?PHP exit;?>	2014-03-08 07:48:50		61.148.242.254	2873	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='2873' AND rid='10'
<?PHP exit;?>	2014-03-08 07:48:50		61.148.242.254	2873	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394236130',ip='061148242' WHERE uid='2873'
<?PHP exit;?>	2014-03-08 07:48:50		61.148.242.254	2873	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='2873'
<?PHP exit;?>	2014-03-08 07:48:50		61.148.242.254	2873	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2873' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 07:48:52		61.148.242.254	2873	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='2873'
<?PHP exit;?>	2014-03-08 07:48:52		61.148.242.254	2873	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='2873' OR lastactivity<'1394234332'
<?PHP exit;?>	2014-03-08 07:48:52		61.148.242.254	2873	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2873', '1029160657@qq.com', '15ab184bbc8407514abab0d9cfb58575', '1394236132', '061148242')
<?PHP exit;?>	2014-03-08 07:48:52		61.148.242.254	2873	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='2873' AND rid='10'
<?PHP exit;?>	2014-03-08 07:48:52		61.148.242.254	2873	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394236132',ip='061148242' WHERE uid='2873'
<?PHP exit;?>	2014-03-08 07:48:52		61.148.242.254	2873	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='2873'
<?PHP exit;?>	2014-03-08 07:48:52		61.148.242.254	2873	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2873' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 07:48:52		61.148.242.254	2873	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 2873 and new = 1
<?PHP exit;?>	2014-03-08 07:49:16		61.148.242.254	2873	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='2873'
<?PHP exit;?>	2014-03-08 07:49:16		61.148.242.254	2873	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='2873' OR lastactivity<'1394234356'
<?PHP exit;?>	2014-03-08 07:49:16		61.148.242.254	2873	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2873', '1029160657@qq.com', '15ab184bbc8407514abab0d9cfb58575', '1394236156', '061148242')
<?PHP exit;?>	2014-03-08 07:49:16		61.148.242.254	2873	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='2873' AND rid='10'
<?PHP exit;?>	2014-03-08 07:49:16		61.148.242.254	2873	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394236156',ip='061148242' WHERE uid='2873'
<?PHP exit;?>	2014-03-08 07:49:16		61.148.242.254	2873	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='2873'
<?PHP exit;?>	2014-03-08 07:49:16		61.148.242.254	2873	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2873' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 07:49:16		61.148.242.254	2873	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 2978
<?PHP exit;?>	2014-03-08 07:49:16		61.148.242.254	2873	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='2873'
<?PHP exit;?>	2014-03-08 07:49:16		61.148.242.254	2873	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='2873' AND fuid='2978' LIMIT 1
<?PHP exit;?>	2014-03-08 07:49:16		61.148.242.254	2873	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='2978' AND fuid='2873' LIMIT 1
<?PHP exit;?>	2014-03-08 07:50:58		111.195.139.15	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='tudelaty' and password=md5(concat('ea07ed882eca86a14a1736be1a08b7c8',salt))
<?PHP exit;?>	2014-03-08 07:50:58		111.195.139.15	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='23388'
<?PHP exit;?>	2014-03-08 07:50:58		111.195.139.15	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='23388' OR lastactivity<'1394234458'
<?PHP exit;?>	2014-03-08 07:50:58		111.195.139.15	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23388', 'tudelaty', 'ea07ed882eca86a14a1736be1a08b7c8', '1394236258', '111195139')
<?PHP exit;?>	2014-03-08 07:50:58		111.195.139.15	23388	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='23388' AND rid='10'
<?PHP exit;?>	2014-03-08 07:50:58		111.195.139.15	23388	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394236258',credit='3',experience='5' WHERE clid='108456'
<?PHP exit;?>	2014-03-08 07:50:58		111.195.139.15	23388	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394236258',ip='111195139',credit=credit+3,experience=experience+5 WHERE uid='23388'
<?PHP exit;?>	2014-03-08 07:50:58		111.195.139.15	23388	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='23388'
<?PHP exit;?>	2014-03-08 07:50:58		111.195.139.15	23388	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23388' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 07:50:58		111.195.139.15	23388	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('23388', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 07:50:58		111.195.139.15	23388	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 07:50:58		111.195.139.15	23388	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 07:51:00		111.195.139.15	23388	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23388'
<?PHP exit;?>	2014-03-08 07:51:00		111.195.139.15	23388	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23388' OR lastactivity<'1394234460'
<?PHP exit;?>	2014-03-08 07:51:00		111.195.139.15	23388	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23388', 'tudelaty', 'ea07ed882eca86a14a1736be1a08b7c8', '1394236260', '111195139')
<?PHP exit;?>	2014-03-08 07:51:00		111.195.139.15	23388	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23388' AND rid='10'
<?PHP exit;?>	2014-03-08 07:51:00		111.195.139.15	23388	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394236260',ip='111195139' WHERE uid='23388'
<?PHP exit;?>	2014-03-08 07:51:00		111.195.139.15	23388	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23388'
<?PHP exit;?>	2014-03-08 07:51:00		111.195.139.15	23388	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23388' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 07:51:00		111.195.139.15	23388	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23388 and new = 1
<?PHP exit;?>	2014-03-08 07:57:59		114.246.79.47	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='liyunchun' and password=md5(concat('9f654e8eab321e17ed8661b06286653e',salt))
<?PHP exit;?>	2014-03-08 07:57:59		114.246.79.47	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 07:57:59		114.246.79.47	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394234879'
<?PHP exit;?>	2014-03-08 07:57:59		114.246.79.47	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236679', '114246079')
<?PHP exit;?>	2014-03-08 07:57:59		114.246.79.47	7	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 07:57:59		114.246.79.47	7	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394236679',credit='3',experience='5' WHERE clid='44'
<?PHP exit;?>	2014-03-08 07:57:59		114.246.79.47	7	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394236679',ip='114246079',credit=credit+3,experience=experience+5 WHERE uid='7'
<?PHP exit;?>	2014-03-08 07:57:59		114.246.79.47	7	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 07:57:59		114.246.79.47	7	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 07:57:59		114.246.79.47	7	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('7', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 07:57:59		114.246.79.47	7	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 07:57:59		114.246.79.47	7	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 07:58:02		114.246.79.47	7	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 07:58:02		114.246.79.47	7	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394234882'
<?PHP exit;?>	2014-03-08 07:58:02		114.246.79.47	7	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236682', '114246079')
<?PHP exit;?>	2014-03-08 07:58:02		114.246.79.47	7	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 07:58:02		114.246.79.47	7	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394236682',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 07:58:02		114.246.79.47	7	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 07:58:02		114.246.79.47	7	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 07:58:02		114.246.79.47	7	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 7 and new = 1
<?PHP exit;?>	2014-03-08 08:01:27		114.246.79.47	7	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:01:27		114.246.79.47	7	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394235087'
<?PHP exit;?>	2014-03-08 08:01:27		114.246.79.47	7	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236887', '114246079')
<?PHP exit;?>	2014-03-08 08:01:27		114.246.79.47	7	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 08:01:27		114.246.79.47	7	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394236887',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:01:27		114.246.79.47	7	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:01:27		114.246.79.47	7	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:27		114.246.79.47	7	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65089 LIMIT 0,20
<?PHP exit;?>	2014-03-08 08:01:27		114.246.79.47	7	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('90')
<?PHP exit;?>	2014-03-08 08:01:27		114.246.79.47	7	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:01:27		114.246.79.47	7	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394235087'
<?PHP exit;?>	2014-03-08 08:01:27		114.246.79.47	7	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236887', '114246079')
<?PHP exit;?>	2014-03-08 08:01:27		114.246.79.47	7	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 08:01:27		114.246.79.47	7	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394236887',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:01:27		114.246.79.47	7	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:01:27		114.246.79.47	7	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:27		114.246.79.47	7	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='7'
<?PHP exit;?>	2014-03-08 08:01:28		114.246.79.47	7	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:01:28		114.246.79.47	7	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394235088'
<?PHP exit;?>	2014-03-08 08:01:28		114.246.79.47	7	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236888', '114246079')
<?PHP exit;?>	2014-03-08 08:01:28		114.246.79.47	7	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 08:01:28		114.246.79.47	7	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394236888',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:01:28		114.246.79.47	7	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:01:28		114.246.79.47	7	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:28		114.246.79.47	7	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65089 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394235106'
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236906', '114246079')
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	UPDATE ihome_space SET lastlogin='1394236906',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_album WHERE albumid='4738' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_pic WHERE albumid='4738' ORDER BY dateline DESC LIMIT 0,100
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70996' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70995' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70994' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70860' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70859' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70858' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70813' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70812' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70811' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70806' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70805' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70804' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70590' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70589' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70588' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70224' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70223' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70222' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='65210' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='65209' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='65208' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64270' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64269' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64268' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64241' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64240' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64239' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64098' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64097' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64096' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63921' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63920' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63919' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63449' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63448' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63447' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='62985' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='62984' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='62983' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='62030' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='62029' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='62028' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='61379' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='61378' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='61377' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='60301' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='60300' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='60299' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='60079' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='60078' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='60077' LIMIT 1
<?PHP exit;?>	2014-03-08 08:01:46		114.246.79.47	7	/plugin/mobile/do_getalbumpic.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('25233')
<?PHP exit;?>	2014-03-08 08:02:30		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:30		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394235150'
<?PHP exit;?>	2014-03-08 08:02:30		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236950', '114246079')
<?PHP exit;?>	2014-03-08 08:02:30		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 08:02:30		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	UPDATE ihome_space SET lastlogin='1394236950',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:30		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:30		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:02:30		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	SELECT main.*,mt.* FROM ihome_tagspace main   				LEFT JOIN ihome_mtag mt ON mt.tagid=main.tagid  				WHERE main.uid='7' ORDER BY mt.threadnum DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 08:02:32		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:32		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394235152'
<?PHP exit;?>	2014-03-08 08:02:32		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236952', '114246079')
<?PHP exit;?>	2014-03-08 08:02:32		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 08:02:32		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	UPDATE ihome_space SET lastlogin='1394236952',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:32		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:32		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:02:32		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	SELECT main.*,mt.* FROM ihome_tagspace main   				LEFT JOIN ihome_mtag mt ON mt.tagid=main.tagid  				WHERE main.uid='7' ORDER BY mt.threadnum DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 08:02:39		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:39		114.246.79.47	7	/plugin/mobile/do_gettopics.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394235159'
<?PHP exit;?>	2014-03-08 08:02:39		114.246.79.47	7	/plugin/mobile/do_gettopics.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236959', '114246079')
<?PHP exit;?>	2014-03-08 08:02:39		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 08:02:39		114.246.79.47	7	/plugin/mobile/do_gettopics.php	UPDATE ihome_space SET lastlogin='1394236959',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:39		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:39		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:02:39		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT uid FROM ihome_tagspace WHERE tagid='294'
<?PHP exit;?>	2014-03-08 08:02:39		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT tid,subject,replynum,replynum,viewnum,dateline,lastpost,uid,username FROM ihome_thread  WHERE  tagid='294' ORDER BY displayorder DESC, lastpost DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 08:02:39		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('19326','7','4026','4004','20749','1948','14682','2932','11070','2194','14464','1019','8121','3','458')
<?PHP exit;?>	2014-03-08 08:02:43		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:43		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394235163'
<?PHP exit;?>	2014-03-08 08:02:43		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236963', '114246079')
<?PHP exit;?>	2014-03-08 08:02:43		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 08:02:43		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	UPDATE ihome_space SET lastlogin='1394236963',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:43		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:43		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:02:43		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT  grade  FROM  ihome_tagspace    WHERE tagid=0 and uid = 7
<?PHP exit;?>	2014-03-08 08:02:43		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT  uid FROM  ihome_tagspace where tagid = 0
<?PHP exit;?>	2014-03-08 08:02:43		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT  b.viewperm,b.postperm  FROM  ihome_thread a , ihome_mtag b   WHERE a.tagid=b.tagid  and a.tid=1590
<?PHP exit;?>	2014-03-08 08:02:43		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT a.tid, a.subject, a.tagid,a.username, a.uid, a.dateline, b.message,b.pid,a.replynum,a.viewnum,c.tagname,c.viewperm,c.joinperm,c.threadperm,c.postperm  FROM  ihome_thread a , ihome_post  b,ihome_mtag c   WHERE a.tid = b.tid and b.tagid=c.tagid and b.isthread=1 and a.tid=1590
<?PHP exit;?>	2014-03-08 08:02:43		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('7')
<?PHP exit;?>	2014-03-08 08:02:47		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:47		114.246.79.47	7	/plugin/mobile/do_access.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394235167'
<?PHP exit;?>	2014-03-08 08:02:47		114.246.79.47	7	/plugin/mobile/do_access.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236967', '114246079')
<?PHP exit;?>	2014-03-08 08:02:47		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 08:02:47		114.246.79.47	7	/plugin/mobile/do_access.php	UPDATE ihome_space SET lastlogin='1394236967',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:47		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:47		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:02:47		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT  uid FROM  ihome_tagspace where tagid = 294
<?PHP exit;?>	2014-03-08 08:02:47		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT  grade  FROM  ihome_tagspace    WHERE tagid=294 and uid = 7
<?PHP exit;?>	2014-03-08 08:02:47		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT  uid  FROM  ihome_thread    WHERE tid=1590
<?PHP exit;?>	2014-03-08 08:02:47		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT  viewperm,threadperm,postperm  FROM  ihome_mtag    WHERE tagid=294
<?PHP exit;?>	2014-03-08 08:02:50		114.246.79.47	7	/plugin/mobile/do_topicreply.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:50		114.246.79.47	7	/plugin/mobile/do_topicreply.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394235170'
<?PHP exit;?>	2014-03-08 08:02:50		114.246.79.47	7	/plugin/mobile/do_topicreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236970', '114246079')
<?PHP exit;?>	2014-03-08 08:02:50		114.246.79.47	7	/plugin/mobile/do_topicreply.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 08:02:50		114.246.79.47	7	/plugin/mobile/do_topicreply.php	UPDATE ihome_space SET lastlogin='1394236970',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:50		114.246.79.47	7	/plugin/mobile/do_topicreply.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:50		114.246.79.47	7	/plugin/mobile/do_topicreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:02:50		114.246.79.47	7	/plugin/mobile/do_topicreply.php	SELECT tagid,tid,uid,message,dateline,pid FROM  ihome_post  WHERE tid =1590 and isthread=0 order by dateline asc LIMIT  0,20
<?PHP exit;?>	2014-03-08 08:02:50		114.246.79.47	7	/plugin/mobile/do_topicreply.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('529')
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394235172'
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236972', '114246079')
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	UPDATE ihome_space SET lastlogin='1394236972',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT  grade  FROM  ihome_tagspace    WHERE tagid=0 and uid = 7
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT  uid FROM  ihome_tagspace where tagid = 0
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT  b.viewperm,b.postperm  FROM  ihome_thread a , ihome_mtag b   WHERE a.tagid=b.tagid  and a.tid=1655
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT a.tid, a.subject, a.tagid,a.username, a.uid, a.dateline, b.message,b.pid,a.replynum,a.viewnum,c.tagname,c.viewperm,c.joinperm,c.threadperm,c.postperm  FROM  ihome_thread a , ihome_post  b,ihome_mtag c   WHERE a.tid = b.tid and b.tagid=c.tagid and b.isthread=1 and a.tid=1655
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('20749')
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_access.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394235172'
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_access.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236972', '114246079')
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_access.php	UPDATE ihome_space SET lastlogin='1394236972',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT  uid FROM  ihome_tagspace where tagid = 294
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT  grade  FROM  ihome_tagspace    WHERE tagid=294 and uid = 7
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT  uid  FROM  ihome_thread    WHERE tid=1655
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT  viewperm,threadperm,postperm  FROM  ihome_mtag    WHERE tagid=294
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_topicreply.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_topicreply.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394235172'
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_topicreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236972', '114246079')
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_topicreply.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_topicreply.php	UPDATE ihome_space SET lastlogin='1394236972',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_topicreply.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_topicreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:02:52		114.246.79.47	7	/plugin/mobile/do_topicreply.php	SELECT tagid,tid,uid,message,dateline,pid FROM  ihome_post  WHERE tid =1655 and isthread=0 order by dateline asc LIMIT  0,20
<?PHP exit;?>	2014-03-08 08:02:55		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:55		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394235175'
<?PHP exit;?>	2014-03-08 08:02:55		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236975', '114246079')
<?PHP exit;?>	2014-03-08 08:02:55		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 08:02:55		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	UPDATE ihome_space SET lastlogin='1394236975',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:55		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:55		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:02:55		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT  grade  FROM  ihome_tagspace    WHERE tagid=0 and uid = 7
<?PHP exit;?>	2014-03-08 08:02:55		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT  uid FROM  ihome_tagspace where tagid = 0
<?PHP exit;?>	2014-03-08 08:02:55		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT  b.viewperm,b.postperm  FROM  ihome_thread a , ihome_mtag b   WHERE a.tagid=b.tagid  and a.tid=1587
<?PHP exit;?>	2014-03-08 08:02:55		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT a.tid, a.subject, a.tagid,a.username, a.uid, a.dateline, b.message,b.pid,a.replynum,a.viewnum,c.tagname,c.viewperm,c.joinperm,c.threadperm,c.postperm  FROM  ihome_thread a , ihome_post  b,ihome_mtag c   WHERE a.tid = b.tid and b.tagid=c.tagid and b.isthread=1 and a.tid=1587
<?PHP exit;?>	2014-03-08 08:02:55		114.246.79.47	7	/plugin/mobile/do_getthetopic.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('14682')
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_access.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394235176'
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_access.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236976', '114246079')
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_access.php	UPDATE ihome_space SET lastlogin='1394236976',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT  uid FROM  ihome_tagspace where tagid = 294
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT  grade  FROM  ihome_tagspace    WHERE tagid=294 and uid = 7
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT  uid  FROM  ihome_thread    WHERE tid=1587
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_access.php	SELECT  viewperm,threadperm,postperm  FROM  ihome_mtag    WHERE tagid=294
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_topicreply.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_topicreply.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394235176'
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_topicreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236976', '114246079')
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_topicreply.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_topicreply.php	UPDATE ihome_space SET lastlogin='1394236976',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_topicreply.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_topicreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_topicreply.php	SELECT tagid,tid,uid,message,dateline,pid FROM  ihome_post  WHERE tid =1587 and isthread=0 order by dateline asc LIMIT  0,20
<?PHP exit;?>	2014-03-08 08:02:56		114.246.79.47	7	/plugin/mobile/do_topicreply.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('2979')
<?PHP exit;?>	2014-03-08 08:03:00		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:03:00		114.246.79.47	7	/plugin/mobile/do_gettopics.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394235180'
<?PHP exit;?>	2014-03-08 08:03:00		114.246.79.47	7	/plugin/mobile/do_gettopics.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236980', '114246079')
<?PHP exit;?>	2014-03-08 08:03:00		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 08:03:00		114.246.79.47	7	/plugin/mobile/do_gettopics.php	UPDATE ihome_space SET lastlogin='1394236980',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:03:00		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:03:00		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:03:00		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT uid FROM ihome_tagspace WHERE tagid='1388'
<?PHP exit;?>	2014-03-08 08:03:00		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT tid,subject,replynum,replynum,viewnum,dateline,lastpost,uid,username FROM ihome_thread  WHERE  tagid='1388' ORDER BY displayorder DESC, lastpost DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 08:03:00		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('956','1556','34','3455','3073','11462','8643','804','192','2029','5119','665')
<?PHP exit;?>	2014-03-08 08:03:04		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:03:04		114.246.79.47	7	/plugin/mobile/do_gettopics.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394235184'
<?PHP exit;?>	2014-03-08 08:03:04		114.246.79.47	7	/plugin/mobile/do_gettopics.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236984', '114246079')
<?PHP exit;?>	2014-03-08 08:03:04		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 08:03:04		114.246.79.47	7	/plugin/mobile/do_gettopics.php	UPDATE ihome_space SET lastlogin='1394236984',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:03:04		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:03:04		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:03:04		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT uid FROM ihome_tagspace WHERE tagid='419'
<?PHP exit;?>	2014-03-08 08:03:04		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT tid,subject,replynum,replynum,viewnum,dateline,lastpost,uid,username FROM ihome_thread  WHERE  tagid='419' ORDER BY displayorder DESC, lastpost DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 08:03:04		114.246.79.47	7	/plugin/mobile/do_gettopics.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('5618','665','956','3','1')
<?PHP exit;?>	2014-03-08 08:03:07		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:03:07		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394235187'
<?PHP exit;?>	2014-03-08 08:03:07		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394236987', '114246079')
<?PHP exit;?>	2014-03-08 08:03:07		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 08:03:07		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	UPDATE ihome_space SET lastlogin='1394236987',ip='114246079' WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:03:07		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 08:03:07		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:03:07		114.246.79.47	7	/plugin/mobile/do_getmygroups.php	SELECT main.*,mt.* FROM ihome_tagspace main   				LEFT JOIN ihome_mtag mt ON mt.tagid=main.tagid  				WHERE main.uid='7' ORDER BY mt.threadnum DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 08:09:01		111.194.210.159	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='09166@buaa.edu.cn' and password=md5(concat('fac906f29a10b79682eaed73e7f9bdd7',salt))
<?PHP exit;?>	2014-03-08 08:09:01		111.194.210.159	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='2072'
<?PHP exit;?>	2014-03-08 08:09:01		111.194.210.159	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='2072' OR lastactivity<'1394235541'
<?PHP exit;?>	2014-03-08 08:09:01		111.194.210.159	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2072', '09166@buaa.edu.cn', 'fac906f29a10b79682eaed73e7f9bdd7', '1394237341', '111194210')
<?PHP exit;?>	2014-03-08 08:09:01		111.194.210.159	2072	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='2072' AND rid='10'
<?PHP exit;?>	2014-03-08 08:09:01		111.194.210.159	2072	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394237341',credit='3',experience='5' WHERE clid='8814'
<?PHP exit;?>	2014-03-08 08:09:01		111.194.210.159	2072	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394237341',ip='111194210',credit=credit+3,experience=experience+5 WHERE uid='2072'
<?PHP exit;?>	2014-03-08 08:09:01		111.194.210.159	2072	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='2072'
<?PHP exit;?>	2014-03-08 08:09:01		111.194.210.159	2072	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2072' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:09:01		111.194.210.159	2072	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('2072', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 08:09:01		111.194.210.159	2072	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 08:09:01		111.194.210.159	2072	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 08:09:04		111.194.210.159	2072	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='2072'
<?PHP exit;?>	2014-03-08 08:09:04		111.194.210.159	2072	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='2072' OR lastactivity<'1394235544'
<?PHP exit;?>	2014-03-08 08:09:04		111.194.210.159	2072	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2072', '09166@buaa.edu.cn', 'fac906f29a10b79682eaed73e7f9bdd7', '1394237344', '111194210')
<?PHP exit;?>	2014-03-08 08:09:04		111.194.210.159	2072	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='2072' AND rid='10'
<?PHP exit;?>	2014-03-08 08:09:04		111.194.210.159	2072	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394237344',ip='111194210' WHERE uid='2072'
<?PHP exit;?>	2014-03-08 08:09:04		111.194.210.159	2072	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='2072'
<?PHP exit;?>	2014-03-08 08:09:04		111.194.210.159	2072	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2072' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:09:04		111.194.210.159	2072	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 2072 and new = 1
<?PHP exit;?>	2014-03-08 08:26:35		172.16.64.17	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='1250135090@qq.com' and password=md5(concat('b83b1351d6646b5b470292722d44e09f',salt))
<?PHP exit;?>	2014-03-08 08:26:35		172.16.64.17	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='23432'
<?PHP exit;?>	2014-03-08 08:26:35		172.16.64.17	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='23432' OR lastactivity<'1394236595'
<?PHP exit;?>	2014-03-08 08:26:35		172.16.64.17	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23432', '1250135090@qq.com', 'b83b1351d6646b5b470292722d44e09f', '1394238395', '172016064')
<?PHP exit;?>	2014-03-08 08:26:35		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='23432' AND rid='10'
<?PHP exit;?>	2014-03-08 08:26:35		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394238395',credit='3',experience='5' WHERE clid='108627'
<?PHP exit;?>	2014-03-08 08:26:35		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394238395',ip='172016064',credit=credit+3,experience=experience+5 WHERE uid='23432'
<?PHP exit;?>	2014-03-08 08:26:35		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='23432'
<?PHP exit;?>	2014-03-08 08:26:35		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23432' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:26:35		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('23432', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 08:26:35		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 08:26:35		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 08:26:37		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23432'
<?PHP exit;?>	2014-03-08 08:26:37		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23432' OR lastactivity<'1394236597'
<?PHP exit;?>	2014-03-08 08:26:37		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23432', '1250135090@qq.com', 'b83b1351d6646b5b470292722d44e09f', '1394238397', '172016064')
<?PHP exit;?>	2014-03-08 08:26:37		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23432' AND rid='10'
<?PHP exit;?>	2014-03-08 08:26:37		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394238397',ip='172016064' WHERE uid='23432'
<?PHP exit;?>	2014-03-08 08:26:37		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23432'
<?PHP exit;?>	2014-03-08 08:26:37		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23432' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:26:37		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23432 and new = 1
<?PHP exit;?>	2014-03-08 08:34:52		172.16.7.251	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='645746766@qq.com' and password=md5(concat('acac71351e454c7fea9a4c0f267a07cf',salt))
<?PHP exit;?>	2014-03-08 08:34:52		172.16.7.251	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:34:52		172.16.7.251	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='23804' OR lastactivity<'1394237092'
<?PHP exit;?>	2014-03-08 08:34:52		172.16.7.251	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23804', '645746766@qq.com', 'd1df734d6336d93ccbabce70c91f7976', '1394238892', '172016007')
<?PHP exit;?>	2014-03-08 08:34:52		172.16.7.251	23804	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='23804' AND rid='10'
<?PHP exit;?>	2014-03-08 08:34:52		172.16.7.251	23804	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394238892',credit='3',experience='5' WHERE clid='109808'
<?PHP exit;?>	2014-03-08 08:34:52		172.16.7.251	23804	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394238892',ip='172016007',credit=credit+3,experience=experience+5 WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:34:52		172.16.7.251	23804	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:34:52		172.16.7.251	23804	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23804' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:34:52		172.16.7.251	23804	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('23804', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 08:34:52		172.16.7.251	23804	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 08:34:52		172.16.7.251	23804	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 08:34:53		172.16.7.251	23804	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:34:53		172.16.7.251	23804	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23804' OR lastactivity<'1394237093'
<?PHP exit;?>	2014-03-08 08:34:53		172.16.7.251	23804	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23804', '645746766@qq.com', 'd1df734d6336d93ccbabce70c91f7976', '1394238893', '172016007')
<?PHP exit;?>	2014-03-08 08:34:53		172.16.7.251	23804	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23804' AND rid='10'
<?PHP exit;?>	2014-03-08 08:34:53		172.16.7.251	23804	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394238893',ip='172016007' WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:34:53		172.16.7.251	23804	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:34:53		172.16.7.251	23804	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23804' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:34:53		172.16.7.251	23804	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23804 and new = 1
<?PHP exit;?>	2014-03-08 08:35:05		172.16.7.251	23804	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:35:05		172.16.7.251	23804	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='23804' OR lastactivity<'1394237105'
<?PHP exit;?>	2014-03-08 08:35:05		172.16.7.251	23804	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23804', '645746766@qq.com', 'd1df734d6336d93ccbabce70c91f7976', '1394238905', '172016007')
<?PHP exit;?>	2014-03-08 08:35:05		172.16.7.251	23804	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='23804' AND rid='10'
<?PHP exit;?>	2014-03-08 08:35:05		172.16.7.251	23804	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394238905',ip='172016007' WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:35:05		172.16.7.251	23804	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:35:05		172.16.7.251	23804	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23804' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:05		172.16.7.251	23804	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65082 LIMIT 0,20
<?PHP exit;?>	2014-03-08 08:35:05		172.16.7.251	23804	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('25233')
<?PHP exit;?>	2014-03-08 08:35:06		172.16.7.251	23804	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:35:06		172.16.7.251	23804	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='23804' OR lastactivity<'1394237106'
<?PHP exit;?>	2014-03-08 08:35:06		172.16.7.251	23804	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23804', '645746766@qq.com', 'd1df734d6336d93ccbabce70c91f7976', '1394238906', '172016007')
<?PHP exit;?>	2014-03-08 08:35:06		172.16.7.251	23804	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='23804' AND rid='10'
<?PHP exit;?>	2014-03-08 08:35:06		172.16.7.251	23804	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394238906',ip='172016007' WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:35:06		172.16.7.251	23804	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:35:06		172.16.7.251	23804	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23804' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:06		172.16.7.251	23804	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='23804'
<?PHP exit;?>	2014-03-08 08:35:06		172.16.7.251	23804	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:35:06		172.16.7.251	23804	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='23804' OR lastactivity<'1394237106'
<?PHP exit;?>	2014-03-08 08:35:06		172.16.7.251	23804	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23804', '645746766@qq.com', 'd1df734d6336d93ccbabce70c91f7976', '1394238906', '172016007')
<?PHP exit;?>	2014-03-08 08:35:06		172.16.7.251	23804	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='23804' AND rid='10'
<?PHP exit;?>	2014-03-08 08:35:06		172.16.7.251	23804	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394238906',ip='172016007' WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:35:06		172.16.7.251	23804	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:35:06		172.16.7.251	23804	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23804' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:06		172.16.7.251	23804	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65082 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT password FROM ihome_member WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	DELETE FROM ihome_session WHERE uid='23804' OR lastactivity<'1394237114'
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23804', '645746766@qq.com', 'd1df734d6336d93ccbabce70c91f7976', '1394238914', '172016007')
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_creditlog WHERE uid='23804' AND rid='10'
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	UPDATE ihome_space SET lastlogin='1394238914',ip='172016007' WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_spacelog WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23804' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_album WHERE albumid='4738' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_pic WHERE albumid='4738' ORDER BY dateline DESC LIMIT 0,100
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70996' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70995' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70994' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70860' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70859' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70858' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70813' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70812' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70811' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70806' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70805' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70804' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70590' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70589' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70588' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70224' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70223' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70222' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='65210' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='65209' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='65208' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64270' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64269' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64268' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64241' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64240' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64239' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64098' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64097' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64096' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63921' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63920' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63919' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63449' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63448' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63447' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='62985' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='62984' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='62983' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='62030' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='62029' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='62028' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='61379' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='61378' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='61377' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='60301' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='60300' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='60299' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='60079' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='60078' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='60077' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:14		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('25233')
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT password FROM ihome_member WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	DELETE FROM ihome_session WHERE uid='23804' OR lastactivity<'1394237125'
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23804', '645746766@qq.com', 'd1df734d6336d93ccbabce70c91f7976', '1394238925', '172016007')
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_creditlog WHERE uid='23804' AND rid='10'
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	UPDATE ihome_space SET lastlogin='1394238925',ip='172016007' WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_spacelog WHERE uid='23804'
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23804' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_album WHERE albumid='4738' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_pic WHERE albumid='4738' ORDER BY dateline DESC LIMIT 0,100
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70996' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70995' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70994' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70860' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70859' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70858' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70813' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70812' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70811' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70806' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70805' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70804' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70590' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70589' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70588' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70224' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70223' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70222' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='65210' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='65209' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='65208' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64270' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64269' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64268' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64241' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64240' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64239' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64098' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64097' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='64096' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63921' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63920' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63919' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63449' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63448' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63447' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='62985' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='62984' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='62983' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='62030' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='62029' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='62028' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='61379' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='61378' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='61377' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='60301' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='60300' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='60299' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='60079' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='60078' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='60077' LIMIT 1
<?PHP exit;?>	2014-03-08 08:35:25		172.16.7.251	23804	/plugin/mobile/do_getalbumpic.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('25233')
<?PHP exit;?>	2014-03-08 08:45:56		111.195.196.211	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='2324897477@qq.com' and password=md5(concat('f30220fd7dc2d8aa3d5bc8789ce8ca95',salt))
<?PHP exit;?>	2014-03-08 08:45:56		111.195.196.211	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='4063'
<?PHP exit;?>	2014-03-08 08:45:56		111.195.196.211	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='4063' OR lastactivity<'1394237756'
<?PHP exit;?>	2014-03-08 08:45:56		111.195.196.211	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4063', '2324897477@qq.com', '90794a55f44e635df4a7c036cbf313b3', '1394239556', '111195196')
<?PHP exit;?>	2014-03-08 08:45:56		111.195.196.211	4063	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='4063' AND rid='10'
<?PHP exit;?>	2014-03-08 08:45:56		111.195.196.211	4063	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394239556',credit='3',experience='5' WHERE clid='19225'
<?PHP exit;?>	2014-03-08 08:45:56		111.195.196.211	4063	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394239556',ip='111195196',credit=credit+3,experience=experience+5 WHERE uid='4063'
<?PHP exit;?>	2014-03-08 08:45:56		111.195.196.211	4063	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='4063'
<?PHP exit;?>	2014-03-08 08:45:56		111.195.196.211	4063	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4063' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:45:56		111.195.196.211	4063	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('4063', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 08:45:56		111.195.196.211	4063	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 08:45:56		111.195.196.211	4063	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 08:45:58		111.195.196.211	4063	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='4063'
<?PHP exit;?>	2014-03-08 08:45:58		111.195.196.211	4063	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='4063' OR lastactivity<'1394237758'
<?PHP exit;?>	2014-03-08 08:45:58		111.195.196.211	4063	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4063', '2324897477@qq.com', '90794a55f44e635df4a7c036cbf313b3', '1394239558', '111195196')
<?PHP exit;?>	2014-03-08 08:45:58		111.195.196.211	4063	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='4063' AND rid='10'
<?PHP exit;?>	2014-03-08 08:45:58		111.195.196.211	4063	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394239558',ip='111195196' WHERE uid='4063'
<?PHP exit;?>	2014-03-08 08:45:58		111.195.196.211	4063	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='4063'
<?PHP exit;?>	2014-03-08 08:45:58		111.195.196.211	4063	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4063' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:45:58		111.195.196.211	4063	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 4063 and new = 1
<?PHP exit;?>	2014-03-08 08:51:52		172.16.23.27	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='lvjiagao' and password=md5(concat('ce4f5a34517008d4c3962646beb7504e',salt))
<?PHP exit;?>	2014-03-08 08:51:52		172.16.23.27	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:51:52		172.16.23.27	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='23446' OR lastactivity<'1394238112'
<?PHP exit;?>	2014-03-08 08:51:52		172.16.23.27	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23446', 'lvjiagao', 'ce4f5a34517008d4c3962646beb7504e', '1394239912', '172016023')
<?PHP exit;?>	2014-03-08 08:51:52		172.16.23.27	23446	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='23446' AND rid='10'
<?PHP exit;?>	2014-03-08 08:51:52		172.16.23.27	23446	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394239912',ip='172016023' WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:51:52		172.16.23.27	23446	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:51:52		172.16.23.27	23446	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23446' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:51:54		172.16.23.27	23446	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:51:54		172.16.23.27	23446	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23446' OR lastactivity<'1394238114'
<?PHP exit;?>	2014-03-08 08:51:54		172.16.23.27	23446	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23446', 'lvjiagao', 'ce4f5a34517008d4c3962646beb7504e', '1394239914', '172016023')
<?PHP exit;?>	2014-03-08 08:51:54		172.16.23.27	23446	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23446' AND rid='10'
<?PHP exit;?>	2014-03-08 08:51:54		172.16.23.27	23446	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394239914',ip='172016023' WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:51:54		172.16.23.27	23446	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:51:54		172.16.23.27	23446	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23446' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:51:54		172.16.23.27	23446	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23446 and new = 1
<?PHP exit;?>	2014-03-08 08:52:14		172.16.23.27	23446	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:52:14		172.16.23.27	23446	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='23446' OR lastactivity<'1394238134'
<?PHP exit;?>	2014-03-08 08:52:14		172.16.23.27	23446	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23446', 'lvjiagao', 'ce4f5a34517008d4c3962646beb7504e', '1394239934', '172016023')
<?PHP exit;?>	2014-03-08 08:52:14		172.16.23.27	23446	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='23446' AND rid='10'
<?PHP exit;?>	2014-03-08 08:52:14		172.16.23.27	23446	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394239934',ip='172016023' WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:52:14		172.16.23.27	23446	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:52:14		172.16.23.27	23446	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23446' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:52:14		172.16.23.27	23446	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='23446'
<?PHP exit;?>	2014-03-08 08:52:14		172.16.23.27	23446	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:52:14		172.16.23.27	23446	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='23446' OR lastactivity<'1394238134'
<?PHP exit;?>	2014-03-08 08:52:14		172.16.23.27	23446	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23446', 'lvjiagao', 'ce4f5a34517008d4c3962646beb7504e', '1394239934', '172016023')
<?PHP exit;?>	2014-03-08 08:52:14		172.16.23.27	23446	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='23446' AND rid='10'
<?PHP exit;?>	2014-03-08 08:52:14		172.16.23.27	23446	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394239934',ip='172016023' WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:52:14		172.16.23.27	23446	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:52:14		172.16.23.27	23446	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23446' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:52:14		172.16.23.27	23446	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='23446'
<?PHP exit;?>	2014-03-08 08:52:14		172.16.23.27	23446	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43637
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='23446' OR lastactivity<'1394238153'
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23446', 'lvjiagao', 'ce4f5a34517008d4c3962646beb7504e', '1394239953', '172016023')
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='23446' AND rid='10'
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394239953',ip='172016023' WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23446' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=64994 LIMIT 0,20
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('1776')
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='23446' OR lastactivity<'1394238153'
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23446', 'lvjiagao', 'ce4f5a34517008d4c3962646beb7504e', '1394239953', '172016023')
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='23446' AND rid='10'
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394239953',ip='172016023' WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23446' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='23446'
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='23446' OR lastactivity<'1394238153'
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23446', 'lvjiagao', 'ce4f5a34517008d4c3962646beb7504e', '1394239953', '172016023')
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='23446' AND rid='10'
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394239953',ip='172016023' WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='23446'
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23446' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 08:52:33		172.16.23.27	23446	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=64994 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 09:12:30		172.16.213.188	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='541785201@qq.com' and password=md5(concat('25faada7a2b6b73f02dc3e0e711bfbc2',salt))
<?PHP exit;?>	2014-03-08 09:12:30		172.16.213.188	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='22719'
<?PHP exit;?>	2014-03-08 09:12:30		172.16.213.188	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='22719' OR lastactivity<'1394239350'
<?PHP exit;?>	2014-03-08 09:12:30		172.16.213.188	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('22719', '541785201@qq.com', 'f506bc5580269da783caad4bb0e6c95f', '1394241150', '172016213')
<?PHP exit;?>	2014-03-08 09:12:30		172.16.213.188	22719	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='22719' AND rid='10'
<?PHP exit;?>	2014-03-08 09:12:30		172.16.213.188	22719	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394241150',credit='3',experience='5' WHERE clid='106217'
<?PHP exit;?>	2014-03-08 09:12:30		172.16.213.188	22719	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394241150',ip='172016213',credit=credit+3,experience=experience+5 WHERE uid='22719'
<?PHP exit;?>	2014-03-08 09:12:30		172.16.213.188	22719	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='22719'
<?PHP exit;?>	2014-03-08 09:12:30		172.16.213.188	22719	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='22719' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:12:30		172.16.213.188	22719	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('22719', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 09:12:30		172.16.213.188	22719	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 09:12:30		172.16.213.188	22719	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 09:12:33		172.16.213.188	22719	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='22719'
<?PHP exit;?>	2014-03-08 09:12:33		172.16.213.188	22719	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='22719' OR lastactivity<'1394239353'
<?PHP exit;?>	2014-03-08 09:12:33		172.16.213.188	22719	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('22719', '541785201@qq.com', 'f506bc5580269da783caad4bb0e6c95f', '1394241153', '172016213')
<?PHP exit;?>	2014-03-08 09:12:33		172.16.213.188	22719	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='22719' AND rid='10'
<?PHP exit;?>	2014-03-08 09:12:33		172.16.213.188	22719	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394241153',ip='172016213' WHERE uid='22719'
<?PHP exit;?>	2014-03-08 09:12:33		172.16.213.188	22719	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='22719'
<?PHP exit;?>	2014-03-08 09:12:33		172.16.213.188	22719	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='22719' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:12:33		172.16.213.188	22719	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 22719 and new = 1
<?PHP exit;?>	2014-03-08 09:25:07		172.16.7.13	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='617573276' and password=md5(concat('ae8b809f1674cff7c4a0e02b87b25a19',salt))
<?PHP exit;?>	2014-03-08 09:25:07		172.16.7.13	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='22743'
<?PHP exit;?>	2014-03-08 09:25:07		172.16.7.13	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='22743' OR lastactivity<'1394240107'
<?PHP exit;?>	2014-03-08 09:25:07		172.16.7.13	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('22743', '617573276', 'e3aed4687d1d1eb48629dd10fe8f5696', '1394241907', '172016007')
<?PHP exit;?>	2014-03-08 09:25:07		172.16.7.13	22743	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='22743' AND rid='10'
<?PHP exit;?>	2014-03-08 09:25:07		172.16.7.13	22743	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394241907',credit='3',experience='5' WHERE clid='106296'
<?PHP exit;?>	2014-03-08 09:25:07		172.16.7.13	22743	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394241907',ip='172016007',credit=credit+3,experience=experience+5 WHERE uid='22743'
<?PHP exit;?>	2014-03-08 09:25:07		172.16.7.13	22743	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='22743'
<?PHP exit;?>	2014-03-08 09:25:07		172.16.7.13	22743	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='22743' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:25:07		172.16.7.13	22743	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('22743', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 09:25:07		172.16.7.13	22743	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 09:25:07		172.16.7.13	22743	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 09:25:08		172.16.7.13	22743	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='22743'
<?PHP exit;?>	2014-03-08 09:25:08		172.16.7.13	22743	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='22743' OR lastactivity<'1394240108'
<?PHP exit;?>	2014-03-08 09:25:08		172.16.7.13	22743	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('22743', '617573276', 'e3aed4687d1d1eb48629dd10fe8f5696', '1394241908', '172016007')
<?PHP exit;?>	2014-03-08 09:25:08		172.16.7.13	22743	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='22743' AND rid='10'
<?PHP exit;?>	2014-03-08 09:25:08		172.16.7.13	22743	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394241908',ip='172016007' WHERE uid='22743'
<?PHP exit;?>	2014-03-08 09:25:08		172.16.7.13	22743	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='22743'
<?PHP exit;?>	2014-03-08 09:25:08		172.16.7.13	22743	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='22743' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:25:08		172.16.7.13	22743	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 22743 and new = 1
<?PHP exit;?>	2014-03-08 09:26:03		192.168.12.117	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='11051275' and password=md5(concat('670b14728ad9902aecba32e22fa4f6bd',salt))
<?PHP exit;?>	2014-03-08 09:26:03		192.168.12.117	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 09:26:03		192.168.12.117	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394240163'
<?PHP exit;?>	2014-03-08 09:26:03		192.168.12.117	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394241963', '192168012')
<?PHP exit;?>	2014-03-08 09:26:03		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 09:26:03		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394241963',credit='3',experience='5' WHERE clid='55281'
<?PHP exit;?>	2014-03-08 09:26:03		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394241963',ip='192168012',credit=credit+3,experience=experience+5 WHERE uid='14279'
<?PHP exit;?>	2014-03-08 09:26:03		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 09:26:03		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:26:03		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('14279', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 09:26:03		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 09:26:03		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 09:26:04		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 09:26:04		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394240164'
<?PHP exit;?>	2014-03-08 09:26:04		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394241964', '192168012')
<?PHP exit;?>	2014-03-08 09:26:04		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 09:26:04		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394241964',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 09:26:04		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 09:26:04		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:26:04		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 14279 and new = 1
<?PHP exit;?>	2014-03-08 09:26:27		192.168.12.117	14279	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 09:26:27		192.168.12.117	14279	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394240187'
<?PHP exit;?>	2014-03-08 09:26:27		192.168.12.117	14279	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394241987', '192168012')
<?PHP exit;?>	2014-03-08 09:26:27		192.168.12.117	14279	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 09:26:27		192.168.12.117	14279	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394241987',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 09:26:27		192.168.12.117	14279	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 09:26:27		192.168.12.117	14279	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:26:27		192.168.12.117	14279	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65087 LIMIT 0,20
<?PHP exit;?>	2014-03-08 09:26:27		192.168.12.117	14279	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('4914')
<?PHP exit;?>	2014-03-08 09:26:27		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 09:26:27		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394240187'
<?PHP exit;?>	2014-03-08 09:26:27		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394241987', '192168012')
<?PHP exit;?>	2014-03-08 09:26:27		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 09:26:27		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394241987',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 09:26:27		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 09:26:27		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:26:27		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 09:26:28		192.168.12.117	14279	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 09:26:28		192.168.12.117	14279	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394240188'
<?PHP exit;?>	2014-03-08 09:26:28		192.168.12.117	14279	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394241988', '192168012')
<?PHP exit;?>	2014-03-08 09:26:28		192.168.12.117	14279	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 09:26:28		192.168.12.117	14279	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394241988',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 09:26:28		192.168.12.117	14279	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 09:26:28		192.168.12.117	14279	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:26:28		192.168.12.117	14279	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65087 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 09:39:09		117.136.0.132	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='liyunchun' and password=md5(concat('9f654e8eab321e17ed8661b06286653e',salt))
<?PHP exit;?>	2014-03-08 09:39:09		117.136.0.132	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 09:39:09		117.136.0.132	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394240949'
<?PHP exit;?>	2014-03-08 09:39:09		117.136.0.132	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394242749', '117136000')
<?PHP exit;?>	2014-03-08 09:39:09		117.136.0.132	7	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 09:39:09		117.136.0.132	7	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394242749',ip='117136000' WHERE uid='7'
<?PHP exit;?>	2014-03-08 09:39:09		117.136.0.132	7	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 09:39:09		117.136.0.132	7	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:39:12		117.136.0.132	7	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 09:39:12		117.136.0.132	7	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394240952'
<?PHP exit;?>	2014-03-08 09:39:12		117.136.0.132	7	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394242752', '117136000')
<?PHP exit;?>	2014-03-08 09:39:12		117.136.0.132	7	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 09:39:12		117.136.0.132	7	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394242752',ip='117136000' WHERE uid='7'
<?PHP exit;?>	2014-03-08 09:39:12		117.136.0.132	7	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 09:39:12		117.136.0.132	7	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:39:12		117.136.0.132	7	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 7 and new = 1
<?PHP exit;?>	2014-03-08 09:49:34		61.148.242.89	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='736691574@qq.com' and password=md5(concat('6094bd699138739b09b97d6044d3e210',salt))
<?PHP exit;?>	2014-03-08 09:49:34		61.148.242.89	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='25650'
<?PHP exit;?>	2014-03-08 09:49:34		61.148.242.89	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='25650' OR lastactivity<'1394241574'
<?PHP exit;?>	2014-03-08 09:49:34		61.148.242.89	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25650', '736691574@qq.com', 'df1462d861b74430b1a84f200b683c94', '1394243374', '061148242')
<?PHP exit;?>	2014-03-08 09:49:34		61.148.242.89	25650	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='25650' AND rid='10'
<?PHP exit;?>	2014-03-08 09:49:34		61.148.242.89	25650	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394243374',ip='061148242' WHERE uid='25650'
<?PHP exit;?>	2014-03-08 09:49:34		61.148.242.89	25650	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='25650'
<?PHP exit;?>	2014-03-08 09:49:34		61.148.242.89	25650	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25650' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:49:37		61.148.242.89	25650	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='25650'
<?PHP exit;?>	2014-03-08 09:49:37		61.148.242.89	25650	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='25650' OR lastactivity<'1394241577'
<?PHP exit;?>	2014-03-08 09:49:37		61.148.242.89	25650	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25650', '736691574@qq.com', 'df1462d861b74430b1a84f200b683c94', '1394243377', '061148242')
<?PHP exit;?>	2014-03-08 09:49:37		61.148.242.89	25650	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='25650' AND rid='10'
<?PHP exit;?>	2014-03-08 09:49:37		61.148.242.89	25650	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394243377',ip='061148242' WHERE uid='25650'
<?PHP exit;?>	2014-03-08 09:49:37		61.148.242.89	25650	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='25650'
<?PHP exit;?>	2014-03-08 09:49:37		61.148.242.89	25650	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25650' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:49:37		61.148.242.89	25650	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 25650 and new = 1
<?PHP exit;?>	2014-03-08 09:51:17		61.148.242.89	25650	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='25650'
<?PHP exit;?>	2014-03-08 09:51:17		61.148.242.89	25650	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='25650' OR lastactivity<'1394241677'
<?PHP exit;?>	2014-03-08 09:51:17		61.148.242.89	25650	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25650', '736691574@qq.com', 'df1462d861b74430b1a84f200b683c94', '1394243477', '061148242')
<?PHP exit;?>	2014-03-08 09:51:17		61.148.242.89	25650	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='25650' AND rid='10'
<?PHP exit;?>	2014-03-08 09:51:17		61.148.242.89	25650	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394243477',ip='061148242' WHERE uid='25650'
<?PHP exit;?>	2014-03-08 09:51:17		61.148.242.89	25650	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='25650'
<?PHP exit;?>	2014-03-08 09:51:17		61.148.242.89	25650	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25650' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:51:17		61.148.242.89	25650	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65089 LIMIT 0,20
<?PHP exit;?>	2014-03-08 09:51:17		61.148.242.89	25650	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('90')
<?PHP exit;?>	2014-03-08 09:51:17		61.148.242.89	25650	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='25650'
<?PHP exit;?>	2014-03-08 09:51:17		61.148.242.89	25650	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='25650' OR lastactivity<'1394241677'
<?PHP exit;?>	2014-03-08 09:51:17		61.148.242.89	25650	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25650', '736691574@qq.com', 'df1462d861b74430b1a84f200b683c94', '1394243477', '061148242')
<?PHP exit;?>	2014-03-08 09:51:17		61.148.242.89	25650	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='25650' AND rid='10'
<?PHP exit;?>	2014-03-08 09:51:17		61.148.242.89	25650	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394243477',ip='061148242' WHERE uid='25650'
<?PHP exit;?>	2014-03-08 09:51:17		61.148.242.89	25650	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='25650'
<?PHP exit;?>	2014-03-08 09:51:17		61.148.242.89	25650	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25650' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:51:17		61.148.242.89	25650	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='25650'
<?PHP exit;?>	2014-03-08 09:51:18		61.148.242.89	25650	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='25650'
<?PHP exit;?>	2014-03-08 09:51:18		61.148.242.89	25650	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='25650' OR lastactivity<'1394241678'
<?PHP exit;?>	2014-03-08 09:51:18		61.148.242.89	25650	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25650', '736691574@qq.com', 'df1462d861b74430b1a84f200b683c94', '1394243478', '061148242')
<?PHP exit;?>	2014-03-08 09:51:18		61.148.242.89	25650	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='25650' AND rid='10'
<?PHP exit;?>	2014-03-08 09:51:18		61.148.242.89	25650	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394243478',ip='061148242' WHERE uid='25650'
<?PHP exit;?>	2014-03-08 09:51:18		61.148.242.89	25650	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='25650'
<?PHP exit;?>	2014-03-08 09:51:18		61.148.242.89	25650	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25650' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:51:18		61.148.242.89	25650	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65089 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 09:52:23		172.16.25.205	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='mengdechaolive@qq.com' and password=md5(concat('a0049c9ae2a0215f550d40dde26fb1e8',salt))
<?PHP exit;?>	2014-03-08 09:52:23		172.16.25.205	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='23342'
<?PHP exit;?>	2014-03-08 09:52:23		172.16.25.205	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='23342' OR lastactivity<'1394241743'
<?PHP exit;?>	2014-03-08 09:52:23		172.16.25.205	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23342', 'mengdechaolive@qq.com', 'a0049c9ae2a0215f550d40dde26fb1e8', '1394243543', '172016025')
<?PHP exit;?>	2014-03-08 09:52:23		172.16.25.205	23342	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='23342' AND rid='10'
<?PHP exit;?>	2014-03-08 09:52:23		172.16.25.205	23342	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394243543',credit='3',experience='5' WHERE clid='108303'
<?PHP exit;?>	2014-03-08 09:52:23		172.16.25.205	23342	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394243543',ip='172016025',credit=credit+3,experience=experience+5 WHERE uid='23342'
<?PHP exit;?>	2014-03-08 09:52:23		172.16.25.205	23342	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='23342'
<?PHP exit;?>	2014-03-08 09:52:23		172.16.25.205	23342	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23342' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:52:23		172.16.25.205	23342	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('23342', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 09:52:23		172.16.25.205	23342	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 09:52:23		172.16.25.205	23342	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 09:52:25		172.16.25.205	23342	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23342'
<?PHP exit;?>	2014-03-08 09:52:25		172.16.25.205	23342	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23342' OR lastactivity<'1394241745'
<?PHP exit;?>	2014-03-08 09:52:25		172.16.25.205	23342	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23342', 'mengdechaolive@qq.com', 'a0049c9ae2a0215f550d40dde26fb1e8', '1394243545', '172016025')
<?PHP exit;?>	2014-03-08 09:52:25		172.16.25.205	23342	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23342' AND rid='10'
<?PHP exit;?>	2014-03-08 09:52:25		172.16.25.205	23342	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394243545',ip='172016025' WHERE uid='23342'
<?PHP exit;?>	2014-03-08 09:52:25		172.16.25.205	23342	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23342'
<?PHP exit;?>	2014-03-08 09:52:25		172.16.25.205	23342	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23342' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:52:25		172.16.25.205	23342	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23342 and new = 1
<?PHP exit;?>	2014-03-08 09:52:47		172.16.25.205	23342	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='23342'
<?PHP exit;?>	2014-03-08 09:52:47		172.16.25.205	23342	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='23342' OR lastactivity<'1394241767'
<?PHP exit;?>	2014-03-08 09:52:47		172.16.25.205	23342	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23342', 'mengdechaolive@qq.com', 'a0049c9ae2a0215f550d40dde26fb1e8', '1394243567', '172016025')
<?PHP exit;?>	2014-03-08 09:52:47		172.16.25.205	23342	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='23342' AND rid='10'
<?PHP exit;?>	2014-03-08 09:52:47		172.16.25.205	23342	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394243567',ip='172016025' WHERE uid='23342'
<?PHP exit;?>	2014-03-08 09:52:47		172.16.25.205	23342	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='23342'
<?PHP exit;?>	2014-03-08 09:52:47		172.16.25.205	23342	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23342' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:52:47		172.16.25.205	23342	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47282 LIMIT 0,20
<?PHP exit;?>	2014-03-08 09:52:47		172.16.25.205	23342	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23231')
<?PHP exit;?>	2014-03-08 09:52:47		172.16.25.205	23342	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='23342'
<?PHP exit;?>	2014-03-08 09:52:47		172.16.25.205	23342	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='23342' OR lastactivity<'1394241767'
<?PHP exit;?>	2014-03-08 09:52:47		172.16.25.205	23342	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23342', 'mengdechaolive@qq.com', 'a0049c9ae2a0215f550d40dde26fb1e8', '1394243567', '172016025')
<?PHP exit;?>	2014-03-08 09:52:47		172.16.25.205	23342	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='23342' AND rid='10'
<?PHP exit;?>	2014-03-08 09:52:47		172.16.25.205	23342	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394243567',ip='172016025' WHERE uid='23342'
<?PHP exit;?>	2014-03-08 09:52:47		172.16.25.205	23342	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='23342'
<?PHP exit;?>	2014-03-08 09:52:47		172.16.25.205	23342	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23342' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 09:52:47		172.16.25.205	23342	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47282 LIMIT 0,20
<?PHP exit;?>	2014-03-08 09:52:47		172.16.25.205	23342	/plugin/mobile/do_gettherecordingreply.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('5633','12905')
<?PHP exit;?>	2014-03-08 10:37:13		117.136.0.132	7	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 10:37:13		117.136.0.132	7	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394244433'
<?PHP exit;?>	2014-03-08 10:37:13		117.136.0.132	7	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394246233', '117136000')
<?PHP exit;?>	2014-03-08 10:37:13		117.136.0.132	7	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 10:37:13		117.136.0.132	7	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394246233',ip='117136000' WHERE uid='7'
<?PHP exit;?>	2014-03-08 10:37:13		117.136.0.132	7	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 10:37:13		117.136.0.132	7	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 10:37:13		117.136.0.132	7	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 7 and new = 1
<?PHP exit;?>	2014-03-08 10:41:27		172.16.64.17	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='1250135090@qq.com' and password=md5(concat('b83b1351d6646b5b470292722d44e09f',salt))
<?PHP exit;?>	2014-03-08 10:41:27		172.16.64.17	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='23432'
<?PHP exit;?>	2014-03-08 10:41:27		172.16.64.17	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='23432' OR lastactivity<'1394244687'
<?PHP exit;?>	2014-03-08 10:41:27		172.16.64.17	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23432', '1250135090@qq.com', 'b83b1351d6646b5b470292722d44e09f', '1394246487', '172016064')
<?PHP exit;?>	2014-03-08 10:41:27		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='23432' AND rid='10'
<?PHP exit;?>	2014-03-08 10:41:27		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394246487',ip='172016064' WHERE uid='23432'
<?PHP exit;?>	2014-03-08 10:41:27		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='23432'
<?PHP exit;?>	2014-03-08 10:41:27		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23432' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 10:41:29		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23432'
<?PHP exit;?>	2014-03-08 10:41:29		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23432' OR lastactivity<'1394244689'
<?PHP exit;?>	2014-03-08 10:41:29		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23432', '1250135090@qq.com', 'b83b1351d6646b5b470292722d44e09f', '1394246489', '172016064')
<?PHP exit;?>	2014-03-08 10:41:29		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23432' AND rid='10'
<?PHP exit;?>	2014-03-08 10:41:29		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394246489',ip='172016064' WHERE uid='23432'
<?PHP exit;?>	2014-03-08 10:41:29		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23432'
<?PHP exit;?>	2014-03-08 10:41:29		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23432' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 10:41:29		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23432 and new = 1
<?PHP exit;?>	2014-03-08 10:45:07		192.168.13.23	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='ihome_mobile' and password=md5(concat('66ecbfdaef34e3a75712bca5c2c53c9a',salt))
<?PHP exit;?>	2014-03-08 10:45:07		192.168.13.23	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:45:07		192.168.13.23	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394244907'
<?PHP exit;?>	2014-03-08 10:45:07		192.168.13.23	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394246707', '192168013')
<?PHP exit;?>	2014-03-08 10:45:07		192.168.13.23	29970	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 10:45:07		192.168.13.23	29970	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394246707',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:45:07		192.168.13.23	29970	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:45:07		192.168.13.23	29970	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 10:45:26		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:45:26		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394244926'
<?PHP exit;?>	2014-03-08 10:45:26		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394246726', '192168013')
<?PHP exit;?>	2014-03-08 10:45:26		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 10:45:26		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394246726',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:45:26		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:45:26		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 10:45:26		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47308 LIMIT 0,20
<?PHP exit;?>	2014-03-08 10:45:26		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('90')
<?PHP exit;?>	2014-03-08 10:45:26		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:45:26		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394244926'
<?PHP exit;?>	2014-03-08 10:45:26		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394246726', '192168013')
<?PHP exit;?>	2014-03-08 10:45:26		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 10:45:26		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394246726',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:45:26		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:45:26		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 10:45:26		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47308 LIMIT 0,20
<?PHP exit;?>	2014-03-08 10:45:26		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('2744','23443')
<?PHP exit;?>	2014-03-08 10:47:24		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23432'
<?PHP exit;?>	2014-03-08 10:47:24		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23432' OR lastactivity<'1394245044'
<?PHP exit;?>	2014-03-08 10:47:24		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23432', '1250135090@qq.com', 'b83b1351d6646b5b470292722d44e09f', '1394246844', '172016064')
<?PHP exit;?>	2014-03-08 10:47:24		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23432' AND rid='10'
<?PHP exit;?>	2014-03-08 10:47:24		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394246844',ip='172016064' WHERE uid='23432'
<?PHP exit;?>	2014-03-08 10:47:24		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23432'
<?PHP exit;?>	2014-03-08 10:47:24		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23432' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 10:47:24		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23432 and new = 1
<?PHP exit;?>	2014-03-08 10:50:51		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:50:51		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394245251'
<?PHP exit;?>	2014-03-08 10:50:51		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394247051', '192168013')
<?PHP exit;?>	2014-03-08 10:50:51		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 10:50:51		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394247051',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:50:51		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:50:51		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 10:50:51		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 29970 and new = 1
<?PHP exit;?>	2014-03-08 10:58:37		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:58:37		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394245717'
<?PHP exit;?>	2014-03-08 10:58:37		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394247517', '192168013')
<?PHP exit;?>	2014-03-08 10:58:37		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 10:58:37		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394247517',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:58:37		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:58:37		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 10:58:37		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47322 LIMIT 0,20
<?PHP exit;?>	2014-03-08 10:58:37		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23115')
<?PHP exit;?>	2014-03-08 10:58:37		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:58:37		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394245717'
<?PHP exit;?>	2014-03-08 10:58:37		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394247517', '192168013')
<?PHP exit;?>	2014-03-08 10:58:37		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 10:58:37		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394247517',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:58:37		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:58:37		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 10:58:37		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47322 LIMIT 0,20
<?PHP exit;?>	2014-03-08 10:58:41		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:58:41		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394245721'
<?PHP exit;?>	2014-03-08 10:58:41		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394247521', '192168013')
<?PHP exit;?>	2014-03-08 10:58:41		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 10:58:41		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394247521',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:58:41		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:58:41		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 10:58:41		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47322 LIMIT 0,20
<?PHP exit;?>	2014-03-08 10:58:41		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23115')
<?PHP exit;?>	2014-03-08 10:58:41		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:58:41		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394245721'
<?PHP exit;?>	2014-03-08 10:58:41		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394247521', '192168013')
<?PHP exit;?>	2014-03-08 10:58:41		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 10:58:41		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394247521',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:58:41		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 10:58:41		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 10:58:41		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47322 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:03:30		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:30		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246010'
<?PHP exit;?>	2014-03-08 11:03:30		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394247810', '192168013')
<?PHP exit;?>	2014-03-08 11:03:30		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:03:30		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394247810',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:30		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:30		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:03:30		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65117 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:03:30		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('22622')
<?PHP exit;?>	2014-03-08 11:03:30		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:30		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246010'
<?PHP exit;?>	2014-03-08 11:03:30		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394247810', '192168013')
<?PHP exit;?>	2014-03-08 11:03:30		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:03:30		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394247810',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:30		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:30		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:03:30		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=31462 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:03:30		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('674')
<?PHP exit;?>	2014-03-08 11:03:45		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:45		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246025'
<?PHP exit;?>	2014-03-08 11:03:45		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394247825', '192168013')
<?PHP exit;?>	2014-03-08 11:03:45		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:03:45		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394247825',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:45		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:45		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:03:45		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65117 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:03:45		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('22622')
<?PHP exit;?>	2014-03-08 11:03:45		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:45		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246025'
<?PHP exit;?>	2014-03-08 11:03:45		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394247825', '192168013')
<?PHP exit;?>	2014-03-08 11:03:45		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:03:45		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394247825',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:45		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:45		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:03:45		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=31462 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:03:45		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('674')
<?PHP exit;?>	2014-03-08 11:03:46		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:46		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246026'
<?PHP exit;?>	2014-03-08 11:03:46		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394247826', '192168013')
<?PHP exit;?>	2014-03-08 11:03:46		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:03:46		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394247826',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:46		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:46		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:03:46		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=31462 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:03:46		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('674')
<?PHP exit;?>	2014-03-08 11:03:46		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:46		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246026'
<?PHP exit;?>	2014-03-08 11:03:46		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394247826', '192168013')
<?PHP exit;?>	2014-03-08 11:03:46		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:03:46		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394247826',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:46		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:46		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:03:46		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=31462 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:03:46		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('4317','674')
<?PHP exit;?>	2014-03-08 11:03:55		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:55		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246035'
<?PHP exit;?>	2014-03-08 11:03:55		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394247835', '192168013')
<?PHP exit;?>	2014-03-08 11:03:55		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:03:55		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394247835',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:55		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:55		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:03:55		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47330 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:03:55		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23042')
<?PHP exit;?>	2014-03-08 11:03:55		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:55		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246035'
<?PHP exit;?>	2014-03-08 11:03:55		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394247835', '192168013')
<?PHP exit;?>	2014-03-08 11:03:55		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:03:55		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394247835',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:55		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:03:55		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:03:55		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47330 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:03:55		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23042')
<?PHP exit;?>	2014-03-08 11:04:02		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:04:02		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246042'
<?PHP exit;?>	2014-03-08 11:04:02		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394247842', '192168013')
<?PHP exit;?>	2014-03-08 11:04:02		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:04:02		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394247842',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:04:02		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:04:02		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:04:02		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65114 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:04:02		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('24881')
<?PHP exit;?>	2014-03-08 11:04:02		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:04:02		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246042'
<?PHP exit;?>	2014-03-08 11:04:02		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394247842', '192168013')
<?PHP exit;?>	2014-03-08 11:04:02		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:04:02		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394247842',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:04:02		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:04:02		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:04:02		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-08 11:04:03		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:04:03		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246043'
<?PHP exit;?>	2014-03-08 11:04:03		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394247843', '192168013')
<?PHP exit;?>	2014-03-08 11:04:03		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:04:03		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394247843',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:04:03		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:04:03		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:04:03		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-08 11:04:03		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:04:03		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246043'
<?PHP exit;?>	2014-03-08 11:04:03		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394247843', '192168013')
<?PHP exit;?>	2014-03-08 11:04:03		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:04:03		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394247843',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:04:03		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:04:03		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:04:03		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-08 11:04:03		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43660
<?PHP exit;?>	2014-03-08 11:05:00		192.168.113.208	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='10051025' and password=md5(concat('db7816546d2a9d640110c004a8c37450',salt))
<?PHP exit;?>	2014-03-08 11:05:00		192.168.113.208	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:00		192.168.113.208	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='2145' OR lastactivity<'1394246100'
<?PHP exit;?>	2014-03-08 11:05:00		192.168.113.208	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2145', '10051025', 'e0011d6eeccd22dfde3146083abf570e', '1394247900', '192168113')
<?PHP exit;?>	2014-03-08 11:05:00		192.168.113.208	2145	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='2145' AND rid='10'
<?PHP exit;?>	2014-03-08 11:05:00		192.168.113.208	2145	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394247900',credit='3',experience='5' WHERE clid='9128'
<?PHP exit;?>	2014-03-08 11:05:00		192.168.113.208	2145	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394247900',ip='192168113',credit=credit+3,experience=experience+5 WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:00		192.168.113.208	2145	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:00		192.168.113.208	2145	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2145' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:05:00		192.168.113.208	2145	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('2145', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 11:05:00		192.168.113.208	2145	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 11:05:00		192.168.113.208	2145	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 11:05:02		192.168.113.208	2145	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:02		192.168.113.208	2145	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='2145' OR lastactivity<'1394246102'
<?PHP exit;?>	2014-03-08 11:05:02		192.168.113.208	2145	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2145', '10051025', 'e0011d6eeccd22dfde3146083abf570e', '1394247902', '192168113')
<?PHP exit;?>	2014-03-08 11:05:02		192.168.113.208	2145	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='2145' AND rid='10'
<?PHP exit;?>	2014-03-08 11:05:02		192.168.113.208	2145	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394247902',ip='192168113' WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:02		192.168.113.208	2145	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:02		192.168.113.208	2145	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2145' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:05:02		192.168.113.208	2145	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 2145 and new = 1
<?PHP exit;?>	2014-03-08 11:05:29		192.168.113.208	2145	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:29		192.168.113.208	2145	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='2145' OR lastactivity<'1394246129'
<?PHP exit;?>	2014-03-08 11:05:29		192.168.113.208	2145	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2145', '10051025', 'e0011d6eeccd22dfde3146083abf570e', '1394247929', '192168113')
<?PHP exit;?>	2014-03-08 11:05:29		192.168.113.208	2145	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='2145' AND rid='10'
<?PHP exit;?>	2014-03-08 11:05:29		192.168.113.208	2145	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394247929',ip='192168113' WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:29		192.168.113.208	2145	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:29		192.168.113.208	2145	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2145' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:05:29		192.168.113.208	2145	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=64884 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:05:29		192.168.113.208	2145	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('7415')
<?PHP exit;?>	2014-03-08 11:05:37		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:37		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='2145' OR lastactivity<'1394246137'
<?PHP exit;?>	2014-03-08 11:05:37		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2145', '10051025', 'e0011d6eeccd22dfde3146083abf570e', '1394247937', '192168113')
<?PHP exit;?>	2014-03-08 11:05:37		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='2145' AND rid='10'
<?PHP exit;?>	2014-03-08 11:05:37		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394247937',ip='192168113' WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:37		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:37		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2145' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:05:37		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47225 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:05:37		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('19609')
<?PHP exit;?>	2014-03-08 11:05:38		192.168.113.208	2145	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:38		192.168.113.208	2145	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='2145' OR lastactivity<'1394246138'
<?PHP exit;?>	2014-03-08 11:05:38		192.168.113.208	2145	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2145', '10051025', 'e0011d6eeccd22dfde3146083abf570e', '1394247938', '192168113')
<?PHP exit;?>	2014-03-08 11:05:38		192.168.113.208	2145	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='2145' AND rid='10'
<?PHP exit;?>	2014-03-08 11:05:38		192.168.113.208	2145	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394247938',ip='192168113' WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:38		192.168.113.208	2145	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:38		192.168.113.208	2145	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2145' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:05:38		192.168.113.208	2145	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=64884 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:05:43		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:43		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='2145' OR lastactivity<'1394246143'
<?PHP exit;?>	2014-03-08 11:05:43		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2145', '10051025', 'e0011d6eeccd22dfde3146083abf570e', '1394247943', '192168113')
<?PHP exit;?>	2014-03-08 11:05:43		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='2145' AND rid='10'
<?PHP exit;?>	2014-03-08 11:05:43		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394247943',ip='192168113' WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:43		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:43		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2145' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:05:43		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47335 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:05:43		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('29970')
<?PHP exit;?>	2014-03-08 11:05:44		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:44		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='2145' OR lastactivity<'1394246144'
<?PHP exit;?>	2014-03-08 11:05:44		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2145', '10051025', 'e0011d6eeccd22dfde3146083abf570e', '1394247944', '192168113')
<?PHP exit;?>	2014-03-08 11:05:44		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='2145' AND rid='10'
<?PHP exit;?>	2014-03-08 11:05:44		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394247944',ip='192168113' WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:44		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:44		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2145' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:05:44		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47335 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:05:52		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:52		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='2145' OR lastactivity<'1394246152'
<?PHP exit;?>	2014-03-08 11:05:52		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2145', '10051025', 'e0011d6eeccd22dfde3146083abf570e', '1394247952', '192168113')
<?PHP exit;?>	2014-03-08 11:05:52		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='2145' AND rid='10'
<?PHP exit;?>	2014-03-08 11:05:52		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394247952',ip='192168113' WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:52		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:52		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2145' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:05:52		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47335 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:05:52		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('29970')
<?PHP exit;?>	2014-03-08 11:05:52		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:52		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='2145' OR lastactivity<'1394246152'
<?PHP exit;?>	2014-03-08 11:05:52		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2145', '10051025', 'e0011d6eeccd22dfde3146083abf570e', '1394247952', '192168113')
<?PHP exit;?>	2014-03-08 11:05:52		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='2145' AND rid='10'
<?PHP exit;?>	2014-03-08 11:05:52		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394247952',ip='192168113' WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:52		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:05:52		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2145' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:05:52		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47335 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:06:21		192.168.113.208	2145	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:06:21		192.168.113.208	2145	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='2145' OR lastactivity<'1394246181'
<?PHP exit;?>	2014-03-08 11:06:21		192.168.113.208	2145	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2145', '10051025', 'e0011d6eeccd22dfde3146083abf570e', '1394247981', '192168113')
<?PHP exit;?>	2014-03-08 11:06:21		192.168.113.208	2145	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='2145' AND rid='10'
<?PHP exit;?>	2014-03-08 11:06:21		192.168.113.208	2145	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394247981',ip='192168113' WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:06:21		192.168.113.208	2145	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:06:21		192.168.113.208	2145	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2145' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:06:21		192.168.113.208	2145	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=64884 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:06:21		192.168.113.208	2145	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('7415')
<?PHP exit;?>	2014-03-08 11:06:32		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:06:32		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='2145' OR lastactivity<'1394246192'
<?PHP exit;?>	2014-03-08 11:06:32		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2145', '10051025', 'e0011d6eeccd22dfde3146083abf570e', '1394247992', '192168113')
<?PHP exit;?>	2014-03-08 11:06:32		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='2145' AND rid='10'
<?PHP exit;?>	2014-03-08 11:06:32		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394247992',ip='192168113' WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:06:32		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:06:32		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2145' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:06:32		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47225 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:06:32		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('19609')
<?PHP exit;?>	2014-03-08 11:06:33		192.168.113.208	2145	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:06:33		192.168.113.208	2145	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='2145' OR lastactivity<'1394246193'
<?PHP exit;?>	2014-03-08 11:06:33		192.168.113.208	2145	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2145', '10051025', 'e0011d6eeccd22dfde3146083abf570e', '1394247993', '192168113')
<?PHP exit;?>	2014-03-08 11:06:33		192.168.113.208	2145	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='2145' AND rid='10'
<?PHP exit;?>	2014-03-08 11:06:33		192.168.113.208	2145	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394247993',ip='192168113' WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:06:33		192.168.113.208	2145	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:06:33		192.168.113.208	2145	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2145' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:06:33		192.168.113.208	2145	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=64884 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:07:00		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:07:00		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246220'
<?PHP exit;?>	2014-03-08 11:07:00		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394248020', '192168013')
<?PHP exit;?>	2014-03-08 11:07:00		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:07:00		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	UPDATE ihome_space SET lastlogin='1394248020',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:07:00		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:07:00		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:07:00		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT main.*,mt.* FROM ihome_tagspace main   				LEFT JOIN ihome_mtag mt ON mt.tagid=main.tagid  				WHERE main.uid='29970' ORDER BY mt.threadnum DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:07:30		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:07:30		192.168.13.23	29970	/plugin/mobile/do_getnews.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246250'
<?PHP exit;?>	2014-03-08 11:07:30		192.168.13.23	29970	/plugin/mobile/do_getnews.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394248050', '192168013')
<?PHP exit;?>	2014-03-08 11:07:30		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:07:30		192.168.13.23	29970	/plugin/mobile/do_getnews.php	UPDATE ihome_space SET lastlogin='1394248050',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:07:30		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:07:30		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:07:30		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-08 11:07:30		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.dateline,bf.message FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '18054' ORDER BY b.dateline DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:07:30		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('18054')
<?PHP exit;?>	2014-03-08 11:08:19		192.168.113.208	2145	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:08:19		192.168.113.208	2145	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='2145' OR lastactivity<'1394246299'
<?PHP exit;?>	2014-03-08 11:08:19		192.168.113.208	2145	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2145', '10051025', 'e0011d6eeccd22dfde3146083abf570e', '1394248099', '192168113')
<?PHP exit;?>	2014-03-08 11:08:19		192.168.113.208	2145	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='2145' AND rid='10'
<?PHP exit;?>	2014-03-08 11:08:19		192.168.113.208	2145	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394248099',ip='192168113' WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:08:19		192.168.113.208	2145	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:08:19		192.168.113.208	2145	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2145' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:08:19		192.168.113.208	2145	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='2145'
<?PHP exit;?>	2014-03-08 11:08:19		192.168.113.208	2145	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:08:19		192.168.113.208	2145	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='2145' OR lastactivity<'1394246299'
<?PHP exit;?>	2014-03-08 11:08:19		192.168.113.208	2145	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2145', '10051025', 'e0011d6eeccd22dfde3146083abf570e', '1394248099', '192168113')
<?PHP exit;?>	2014-03-08 11:08:19		192.168.113.208	2145	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='2145' AND rid='10'
<?PHP exit;?>	2014-03-08 11:08:19		192.168.113.208	2145	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394248099',ip='192168113' WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:08:19		192.168.113.208	2145	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:08:19		192.168.113.208	2145	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2145' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:08:19		192.168.113.208	2145	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='2145'
<?PHP exit;?>	2014-03-08 11:08:19		192.168.113.208	2145	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43530
<?PHP exit;?>	2014-03-08 11:08:40		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:08:40		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='2145' OR lastactivity<'1394246320'
<?PHP exit;?>	2014-03-08 11:08:40		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2145', '10051025', 'e0011d6eeccd22dfde3146083abf570e', '1394248120', '192168113')
<?PHP exit;?>	2014-03-08 11:08:40		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='2145' AND rid='10'
<?PHP exit;?>	2014-03-08 11:08:40		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394248120',ip='192168113' WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:08:40		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:08:40		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2145' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:08:40		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47335 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:08:40		192.168.113.208	2145	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('29970')
<?PHP exit;?>	2014-03-08 11:08:41		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:08:41		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='2145' OR lastactivity<'1394246321'
<?PHP exit;?>	2014-03-08 11:08:41		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2145', '10051025', 'e0011d6eeccd22dfde3146083abf570e', '1394248121', '192168113')
<?PHP exit;?>	2014-03-08 11:08:41		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='2145' AND rid='10'
<?PHP exit;?>	2014-03-08 11:08:41		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394248121',ip='192168113' WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:08:41		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='2145'
<?PHP exit;?>	2014-03-08 11:08:41		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2145' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:08:41		192.168.113.208	2145	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47335 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:11:33		172.31.68.146	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='13142党支部' and password=md5(concat('549640bbfaee3cd77479714bedbb4e8f',salt))
<?PHP exit;?>	2014-03-08 11:11:33		172.31.68.146	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='29771'
<?PHP exit;?>	2014-03-08 11:11:33		172.31.68.146	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='29771' OR lastactivity<'1394246493'
<?PHP exit;?>	2014-03-08 11:11:33		172.31.68.146	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29771', '13142党支部', '2369a90b937a1084e91178836bbbe255', '1394248293', '172031068')
<?PHP exit;?>	2014-03-08 11:11:33		172.31.68.146	29771	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='29771' AND rid='10'
<?PHP exit;?>	2014-03-08 11:11:33		172.31.68.146	29771	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394248293',ip='172031068' WHERE uid='29771'
<?PHP exit;?>	2014-03-08 11:11:33		172.31.68.146	29771	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='29771'
<?PHP exit;?>	2014-03-08 11:11:33		172.31.68.146	29771	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29771' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:11:36		172.31.68.146	29771	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='29771'
<?PHP exit;?>	2014-03-08 11:11:36		172.31.68.146	29771	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='29771' OR lastactivity<'1394246496'
<?PHP exit;?>	2014-03-08 11:11:36		172.31.68.146	29771	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29771', '13142党支部', '2369a90b937a1084e91178836bbbe255', '1394248296', '172031068')
<?PHP exit;?>	2014-03-08 11:11:36		172.31.68.146	29771	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='29771' AND rid='10'
<?PHP exit;?>	2014-03-08 11:11:36		172.31.68.146	29771	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394248296',ip='172031068' WHERE uid='29771'
<?PHP exit;?>	2014-03-08 11:11:36		172.31.68.146	29771	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='29771'
<?PHP exit;?>	2014-03-08 11:11:36		172.31.68.146	29771	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29771' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:11:36		172.31.68.146	29771	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 29771 and new = 1
<?PHP exit;?>	2014-03-08 11:11:51		172.31.68.146	29771	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='29771'
<?PHP exit;?>	2014-03-08 11:11:51		172.31.68.146	29771	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='29771' OR lastactivity<'1394246511'
<?PHP exit;?>	2014-03-08 11:11:51		172.31.68.146	29771	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29771', '13142党支部', '2369a90b937a1084e91178836bbbe255', '1394248311', '172031068')
<?PHP exit;?>	2014-03-08 11:11:51		172.31.68.146	29771	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='29771' AND rid='10'
<?PHP exit;?>	2014-03-08 11:11:51		172.31.68.146	29771	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394248311',ip='172031068' WHERE uid='29771'
<?PHP exit;?>	2014-03-08 11:11:51		172.31.68.146	29771	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='29771'
<?PHP exit;?>	2014-03-08 11:11:51		172.31.68.146	29771	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29771' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:11:51		172.31.68.146	29771	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29771'
<?PHP exit;?>	2014-03-08 11:11:51		172.31.68.146	29771	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='29771'
<?PHP exit;?>	2014-03-08 11:11:51		172.31.68.146	29771	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='29771' OR lastactivity<'1394246511'
<?PHP exit;?>	2014-03-08 11:11:51		172.31.68.146	29771	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29771', '13142党支部', '2369a90b937a1084e91178836bbbe255', '1394248311', '172031068')
<?PHP exit;?>	2014-03-08 11:11:51		172.31.68.146	29771	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='29771' AND rid='10'
<?PHP exit;?>	2014-03-08 11:11:51		172.31.68.146	29771	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394248311',ip='172031068' WHERE uid='29771'
<?PHP exit;?>	2014-03-08 11:11:51		172.31.68.146	29771	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='29771'
<?PHP exit;?>	2014-03-08 11:11:51		172.31.68.146	29771	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29771' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:11:51		172.31.68.146	29771	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29771'
<?PHP exit;?>	2014-03-08 11:11:51		172.31.68.146	29771	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43674
<?PHP exit;?>	2014-03-08 11:12:43		192.168.44.177	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='1182039493@qq.com' and password=md5(concat('f11f5b31dc8217b7451d4321e6326dab',salt))
<?PHP exit;?>	2014-03-08 11:12:43		192.168.44.177	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 11:12:43		192.168.44.177	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394246563'
<?PHP exit;?>	2014-03-08 11:12:43		192.168.44.177	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394248363', '192168044')
<?PHP exit;?>	2014-03-08 11:12:43		192.168.44.177	24548	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 11:12:43		192.168.44.177	24548	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394248363',ip='192168044' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 11:12:43		192.168.44.177	24548	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 11:12:43		192.168.44.177	24548	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:12:45		192.168.44.177	24548	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 11:12:45		192.168.44.177	24548	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394246565'
<?PHP exit;?>	2014-03-08 11:12:45		192.168.44.177	24548	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394248365', '192168044')
<?PHP exit;?>	2014-03-08 11:12:45		192.168.44.177	24548	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 11:12:45		192.168.44.177	24548	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394248365',ip='192168044' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 11:12:45		192.168.44.177	24548	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 11:12:45		192.168.44.177	24548	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:12:45		192.168.44.177	24548	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 24548 and new = 1
<?PHP exit;?>	2014-03-08 11:16:09		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:09		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246769'
<?PHP exit;?>	2014-03-08 11:16:09		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394248569', '192168013')
<?PHP exit;?>	2014-03-08 11:16:09		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:16:09		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394248569',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:09		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:09		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:16:09		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 29970 and new = 1
<?PHP exit;?>	2014-03-08 11:16:16		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:16		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246776'
<?PHP exit;?>	2014-03-08 11:16:16		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394248576', '192168013')
<?PHP exit;?>	2014-03-08 11:16:16		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:16:16		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394248576',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:16		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:16		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:16:16		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47335 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:16:16		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('29970')
<?PHP exit;?>	2014-03-08 11:16:16		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:16		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246776'
<?PHP exit;?>	2014-03-08 11:16:16		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394248576', '192168013')
<?PHP exit;?>	2014-03-08 11:16:16		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:16:16		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394248576',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:16		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:16		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:16:16		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47335 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:16:20		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:20		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246780'
<?PHP exit;?>	2014-03-08 11:16:20		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394248580', '192168013')
<?PHP exit;?>	2014-03-08 11:16:20		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:16:20		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394248580',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:20		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:20		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:16:20		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47335 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:16:20		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('29970')
<?PHP exit;?>	2014-03-08 11:16:20		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:20		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246780'
<?PHP exit;?>	2014-03-08 11:16:20		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394248580', '192168013')
<?PHP exit;?>	2014-03-08 11:16:20		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:16:20		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394248580',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:20		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:20		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:16:20		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47335 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:16:25		192.168.13.23	29970	/plugin/mobile/do_deletenews.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:25		192.168.13.23	29970	/plugin/mobile/do_deletenews.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246785'
<?PHP exit;?>	2014-03-08 11:16:25		192.168.13.23	29970	/plugin/mobile/do_deletenews.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394248585', '192168013')
<?PHP exit;?>	2014-03-08 11:16:25		192.168.13.23	29970	/plugin/mobile/do_deletenews.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:16:25		192.168.13.23	29970	/plugin/mobile/do_deletenews.php	UPDATE ihome_space SET lastlogin='1394248585',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:25		192.168.13.23	29970	/plugin/mobile/do_deletenews.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:25		192.168.13.23	29970	/plugin/mobile/do_deletenews.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:16:25		192.168.13.23	29970	/plugin/mobile/do_deletenews.php	DELETE FROM ihome_doing WHERE doid IN ('47335')
<?PHP exit;?>	2014-03-08 11:16:25		192.168.13.23	29970	/plugin/mobile/do_deletenews.php	DELETE FROM ihome_docomment WHERE doid IN ('47335')
<?PHP exit;?>	2014-03-08 11:16:25		192.168.13.23	29970	/plugin/mobile/do_deletenews.php	DELETE FROM ihome_feed WHERE id IN ('47335') AND idtype='doid'
<?PHP exit;?>	2014-03-08 11:16:37		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:37		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246797'
<?PHP exit;?>	2014-03-08 11:16:37		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394248597', '192168013')
<?PHP exit;?>	2014-03-08 11:16:37		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:16:37		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394248597',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:37		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:37		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:16:37		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65117 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:16:37		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('22622')
<?PHP exit;?>	2014-03-08 11:16:37		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:37		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246797'
<?PHP exit;?>	2014-03-08 11:16:37		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394248597', '192168013')
<?PHP exit;?>	2014-03-08 11:16:37		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:16:37		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394248597',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:37		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:37		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:16:37		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=31462 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:16:37		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('674')
<?PHP exit;?>	2014-03-08 11:16:38		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:38		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246798'
<?PHP exit;?>	2014-03-08 11:16:38		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394248598', '192168013')
<?PHP exit;?>	2014-03-08 11:16:38		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:16:38		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394248598',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:38		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:38		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:16:38		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=31462 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:16:38		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('674')
<?PHP exit;?>	2014-03-08 11:16:39		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:39		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394246799'
<?PHP exit;?>	2014-03-08 11:16:39		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394248599', '192168013')
<?PHP exit;?>	2014-03-08 11:16:39		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 11:16:39		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394248599',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:39		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 11:16:39		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:16:39		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=31462 LIMIT 0,20
<?PHP exit;?>	2014-03-08 11:16:39		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('4317','674')
<?PHP exit;?>	2014-03-08 11:43:13		192.168.119.98	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='gs1221d38' and password=md5(concat('1c7f17c73b2e812e6b569738b8bf49a4',salt))
<?PHP exit;?>	2014-03-08 11:59:48		172.16.229.241	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='11141025' and password=md5(concat('98314ec40dc36aeb701e872e809140c2',salt))
<?PHP exit;?>	2014-03-08 11:59:48		172.16.229.241	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='13296'
<?PHP exit;?>	2014-03-08 11:59:48		172.16.229.241	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='13296' OR lastactivity<'1394249388'
<?PHP exit;?>	2014-03-08 11:59:48		172.16.229.241	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('13296', '11141025', '98314ec40dc36aeb701e872e809140c2', '1394251188', '172016229')
<?PHP exit;?>	2014-03-08 11:59:48		172.16.229.241	13296	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='13296' AND rid='10'
<?PHP exit;?>	2014-03-08 11:59:48		172.16.229.241	13296	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394251188',credit='3',experience='5' WHERE clid='49712'
<?PHP exit;?>	2014-03-08 11:59:48		172.16.229.241	13296	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394251188',ip='172016229',credit=credit+3,experience=experience+5 WHERE uid='13296'
<?PHP exit;?>	2014-03-08 11:59:48		172.16.229.241	13296	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='13296'
<?PHP exit;?>	2014-03-08 11:59:48		172.16.229.241	13296	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='13296' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:59:48		172.16.229.241	13296	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('13296', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 11:59:48		172.16.229.241	13296	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 11:59:48		172.16.229.241	13296	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 11:59:51		172.16.229.241	13296	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='13296'
<?PHP exit;?>	2014-03-08 11:59:51		172.16.229.241	13296	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='13296' OR lastactivity<'1394249391'
<?PHP exit;?>	2014-03-08 11:59:51		172.16.229.241	13296	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('13296', '11141025', '98314ec40dc36aeb701e872e809140c2', '1394251191', '172016229')
<?PHP exit;?>	2014-03-08 11:59:51		172.16.229.241	13296	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='13296' AND rid='10'
<?PHP exit;?>	2014-03-08 11:59:51		172.16.229.241	13296	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394251191',ip='172016229' WHERE uid='13296'
<?PHP exit;?>	2014-03-08 11:59:51		172.16.229.241	13296	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='13296'
<?PHP exit;?>	2014-03-08 11:59:51		172.16.229.241	13296	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='13296' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 11:59:51		172.16.229.241	13296	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 13296 and new = 1
<?PHP exit;?>	2014-03-08 12:00:44		172.16.229.241	13296	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='13296'
<?PHP exit;?>	2014-03-08 12:00:44		172.16.229.241	13296	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='13296' OR lastactivity<'1394249444'
<?PHP exit;?>	2014-03-08 12:00:44		172.16.229.241	13296	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('13296', '11141025', '98314ec40dc36aeb701e872e809140c2', '1394251244', '172016229')
<?PHP exit;?>	2014-03-08 12:00:44		172.16.229.241	13296	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='13296' AND rid='10'
<?PHP exit;?>	2014-03-08 12:00:44		172.16.229.241	13296	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394251244',ip='172016229' WHERE uid='13296'
<?PHP exit;?>	2014-03-08 12:00:44		172.16.229.241	13296	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='13296'
<?PHP exit;?>	2014-03-08 12:00:44		172.16.229.241	13296	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='13296' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:00:44		172.16.229.241	13296	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='13296'
<?PHP exit;?>	2014-03-08 12:00:45		172.16.229.241	13296	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='13296'
<?PHP exit;?>	2014-03-08 12:00:45		172.16.229.241	13296	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='13296' OR lastactivity<'1394249445'
<?PHP exit;?>	2014-03-08 12:00:45		172.16.229.241	13296	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('13296', '11141025', '98314ec40dc36aeb701e872e809140c2', '1394251245', '172016229')
<?PHP exit;?>	2014-03-08 12:00:45		172.16.229.241	13296	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='13296' AND rid='10'
<?PHP exit;?>	2014-03-08 12:00:45		172.16.229.241	13296	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394251245',ip='172016229' WHERE uid='13296'
<?PHP exit;?>	2014-03-08 12:00:45		172.16.229.241	13296	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='13296'
<?PHP exit;?>	2014-03-08 12:00:45		172.16.229.241	13296	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='13296' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:00:45		172.16.229.241	13296	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='13296'
<?PHP exit;?>	2014-03-08 12:00:45		172.16.229.241	13296	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43611
<?PHP exit;?>	2014-03-08 12:04:01		117.136.0.254	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='liyunchun' and password=md5(concat('9f654e8eab321e17ed8661b06286653e',salt))
<?PHP exit;?>	2014-03-08 12:04:01		117.136.0.254	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 12:04:01		117.136.0.254	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394249641'
<?PHP exit;?>	2014-03-08 12:04:01		117.136.0.254	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394251441', '117136000')
<?PHP exit;?>	2014-03-08 12:04:01		117.136.0.254	7	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 12:04:01		117.136.0.254	7	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394251441',ip='117136000' WHERE uid='7'
<?PHP exit;?>	2014-03-08 12:04:01		117.136.0.254	7	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 12:04:01		117.136.0.254	7	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:04:24		117.136.0.254	7	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 12:04:24		117.136.0.254	7	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394249664'
<?PHP exit;?>	2014-03-08 12:04:24		117.136.0.254	7	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394251464', '117136000')
<?PHP exit;?>	2014-03-08 12:04:24		117.136.0.254	7	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 12:04:24		117.136.0.254	7	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394251464',ip='117136000' WHERE uid='7'
<?PHP exit;?>	2014-03-08 12:04:24		117.136.0.254	7	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 12:04:24		117.136.0.254	7	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:04:24		117.136.0.254	7	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 7 and new = 1
<?PHP exit;?>	2014-03-08 12:04:40		117.136.0.254	7	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 12:04:40		117.136.0.254	7	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394249680'
<?PHP exit;?>	2014-03-08 12:04:40		117.136.0.254	7	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394251480', '117136000')
<?PHP exit;?>	2014-03-08 12:04:40		117.136.0.254	7	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 12:04:40		117.136.0.254	7	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394251480',ip='117136000' WHERE uid='7'
<?PHP exit;?>	2014-03-08 12:04:40		117.136.0.254	7	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 12:04:40		117.136.0.254	7	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:04:40		117.136.0.254	7	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47315 LIMIT 0,20
<?PHP exit;?>	2014-03-08 12:04:40		117.136.0.254	7	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('2439')
<?PHP exit;?>	2014-03-08 12:04:48		117.136.0.254	7	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 12:04:48		117.136.0.254	7	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394249688'
<?PHP exit;?>	2014-03-08 12:04:48		117.136.0.254	7	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394251488', '117136000')
<?PHP exit;?>	2014-03-08 12:04:48		117.136.0.254	7	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 12:04:48		117.136.0.254	7	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394251488',ip='117136000' WHERE uid='7'
<?PHP exit;?>	2014-03-08 12:04:48		117.136.0.254	7	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 12:04:48		117.136.0.254	7	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:04:48		117.136.0.254	7	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47315 LIMIT 0,20
<?PHP exit;?>	2014-03-08 12:05:00		61.148.243.88	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='lichao057@163.com' and password=md5(concat('7de63347217093f5cd63974a5a181496',salt))
<?PHP exit;?>	2014-03-08 12:05:00		61.148.243.88	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:00		61.148.243.88	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='24337' OR lastactivity<'1394249700'
<?PHP exit;?>	2014-03-08 12:05:00		61.148.243.88	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24337', 'lichao057@163.com', 'b600489fac03ad2cc81c0736b8e11e66', '1394251500', '061148243')
<?PHP exit;?>	2014-03-08 12:05:00		61.148.243.88	24337	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='24337' AND rid='10'
<?PHP exit;?>	2014-03-08 12:05:00		61.148.243.88	24337	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394251500',credit='3',experience='5' WHERE clid='111683'
<?PHP exit;?>	2014-03-08 12:05:00		61.148.243.88	24337	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394251500',ip='061148243',credit=credit+3,experience=experience+5 WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:00		61.148.243.88	24337	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:00		61.148.243.88	24337	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24337' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:05:00		61.148.243.88	24337	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('24337', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 12:05:00		61.148.243.88	24337	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 12:05:00		61.148.243.88	24337	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 12:05:02		61.148.243.88	24337	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:02		61.148.243.88	24337	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='24337' OR lastactivity<'1394249702'
<?PHP exit;?>	2014-03-08 12:05:02		61.148.243.88	24337	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24337', 'lichao057@163.com', 'b600489fac03ad2cc81c0736b8e11e66', '1394251502', '061148243')
<?PHP exit;?>	2014-03-08 12:05:02		61.148.243.88	24337	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='24337' AND rid='10'
<?PHP exit;?>	2014-03-08 12:05:02		61.148.243.88	24337	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394251502',ip='061148243' WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:02		61.148.243.88	24337	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:02		61.148.243.88	24337	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24337' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:05:02		61.148.243.88	24337	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 24337 and new = 1
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24337' OR lastactivity<'1394249714'
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24337', 'lichao057@163.com', 'b600489fac03ad2cc81c0736b8e11e66', '1394251514', '061148243')
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24337' AND rid='10'
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394251514',ip='061148243' WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24337' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=64485 LIMIT 0,20
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('17674')
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24337' OR lastactivity<'1394249714'
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24337', 'lichao057@163.com', 'b600489fac03ad2cc81c0736b8e11e66', '1394251514', '061148243')
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24337' AND rid='10'
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394251514',ip='061148243' WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24337' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24337'
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24337' OR lastactivity<'1394249714'
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24337', 'lichao057@163.com', 'b600489fac03ad2cc81c0736b8e11e66', '1394251514', '061148243')
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24337' AND rid='10'
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394251514',ip='061148243' WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24337' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=64485 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 12:05:14		61.148.243.88	24337	/plugin/mobile/do_getsharereplylist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('25233')
<?PHP exit;?>	2014-03-08 12:05:36		61.148.243.88	24337	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:36		61.148.243.88	24337	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='24337' OR lastactivity<'1394249736'
<?PHP exit;?>	2014-03-08 12:05:36		61.148.243.88	24337	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24337', 'lichao057@163.com', 'b600489fac03ad2cc81c0736b8e11e66', '1394251536', '061148243')
<?PHP exit;?>	2014-03-08 12:05:36		61.148.243.88	24337	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='24337' AND rid='10'
<?PHP exit;?>	2014-03-08 12:05:36		61.148.243.88	24337	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394251536',ip='061148243' WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:36		61.148.243.88	24337	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:36		61.148.243.88	24337	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24337' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:05:36		61.148.243.88	24337	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 17674
<?PHP exit;?>	2014-03-08 12:05:36		61.148.243.88	24337	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24337'
<?PHP exit;?>	2014-03-08 12:05:36		61.148.243.88	24337	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='24337' AND fuid='17674' LIMIT 1
<?PHP exit;?>	2014-03-08 12:05:36		61.148.243.88	24337	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='17674' AND fuid='24337' LIMIT 1
<?PHP exit;?>	2014-03-08 12:05:41		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT password FROM ihome_member WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:41		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	DELETE FROM ihome_session WHERE uid='24337' OR lastactivity<'1394249741'
<?PHP exit;?>	2014-03-08 12:05:41		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24337', 'lichao057@163.com', 'b600489fac03ad2cc81c0736b8e11e66', '1394251541', '061148243')
<?PHP exit;?>	2014-03-08 12:05:41		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_creditlog WHERE uid='24337' AND rid='10'
<?PHP exit;?>	2014-03-08 12:05:41		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	UPDATE ihome_space SET lastlogin='1394251541',ip='061148243' WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:41		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_spacelog WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:41		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24337' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:05:41		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24337'
<?PHP exit;?>	2014-03-08 12:05:41		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.viewnum,b.replynum,b.dateline FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '17674' ORDER BY b.dateline DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 12:05:41		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('17674')
<?PHP exit;?>	2014-03-08 12:05:52		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT password FROM ihome_member WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:52		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	DELETE FROM ihome_session WHERE uid='24337' OR lastactivity<'1394249752'
<?PHP exit;?>	2014-03-08 12:05:52		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24337', 'lichao057@163.com', 'b600489fac03ad2cc81c0736b8e11e66', '1394251552', '061148243')
<?PHP exit;?>	2014-03-08 12:05:52		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_creditlog WHERE uid='24337' AND rid='10'
<?PHP exit;?>	2014-03-08 12:05:52		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	UPDATE ihome_space SET lastlogin='1394251552',ip='061148243' WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:52		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_spacelog WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:05:52		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24337' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:05:52		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24337'
<?PHP exit;?>	2014-03-08 12:05:52		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.viewnum,b.replynum,b.dateline FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '17674' ORDER BY b.dateline DESC LIMIT 20,20
<?PHP exit;?>	2014-03-08 12:05:52		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('17674')
<?PHP exit;?>	2014-03-08 12:06:04		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT password FROM ihome_member WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:04		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	DELETE FROM ihome_session WHERE uid='24337' OR lastactivity<'1394249764'
<?PHP exit;?>	2014-03-08 12:06:04		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24337', 'lichao057@163.com', 'b600489fac03ad2cc81c0736b8e11e66', '1394251564', '061148243')
<?PHP exit;?>	2014-03-08 12:06:04		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_creditlog WHERE uid='24337' AND rid='10'
<?PHP exit;?>	2014-03-08 12:06:04		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	UPDATE ihome_space SET lastlogin='1394251564',ip='061148243' WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:04		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_spacelog WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:04		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24337' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:06:04		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24337'
<?PHP exit;?>	2014-03-08 12:06:04		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.viewnum,b.replynum,b.dateline FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '17674' ORDER BY b.dateline DESC LIMIT 40,20
<?PHP exit;?>	2014-03-08 12:06:04		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('17674')
<?PHP exit;?>	2014-03-08 12:06:14		61.148.243.88	24337	/plugin/mobile/do_getusertopics.php	SELECT password FROM ihome_member WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:14		61.148.243.88	24337	/plugin/mobile/do_getusertopics.php	DELETE FROM ihome_session WHERE uid='24337' OR lastactivity<'1394249774'
<?PHP exit;?>	2014-03-08 12:06:14		61.148.243.88	24337	/plugin/mobile/do_getusertopics.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24337', 'lichao057@163.com', 'b600489fac03ad2cc81c0736b8e11e66', '1394251574', '061148243')
<?PHP exit;?>	2014-03-08 12:06:14		61.148.243.88	24337	/plugin/mobile/do_getusertopics.php	SELECT * FROM ihome_creditlog WHERE uid='24337' AND rid='10'
<?PHP exit;?>	2014-03-08 12:06:14		61.148.243.88	24337	/plugin/mobile/do_getusertopics.php	UPDATE ihome_space SET lastlogin='1394251574',ip='061148243' WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:14		61.148.243.88	24337	/plugin/mobile/do_getusertopics.php	SELECT * FROM ihome_spacelog WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:14		61.148.243.88	24337	/plugin/mobile/do_getusertopics.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24337' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:06:14		61.148.243.88	24337	/plugin/mobile/do_getusertopics.php	SELECT main.tid,main.dateline,main.subject,main.tagid,mt.tagname,mt.fieldid,main.replynum  FROM ihome_thread main   				LEFT JOIN ihome_mtag mt ON mt.tagid=main.tagid  				WHERE main.uid='17674' ORDER BY mt.threadnum DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 12:06:19		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT password FROM ihome_member WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:19		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	DELETE FROM ihome_session WHERE uid='24337' OR lastactivity<'1394249779'
<?PHP exit;?>	2014-03-08 12:06:19		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24337', 'lichao057@163.com', 'b600489fac03ad2cc81c0736b8e11e66', '1394251579', '061148243')
<?PHP exit;?>	2014-03-08 12:06:19		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_creditlog WHERE uid='24337' AND rid='10'
<?PHP exit;?>	2014-03-08 12:06:19		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	UPDATE ihome_space SET lastlogin='1394251579',ip='061148243' WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:19		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_spacelog WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:19		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24337' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:06:19		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24337'
<?PHP exit;?>	2014-03-08 12:06:19		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.viewnum,b.replynum,b.dateline FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '17674' ORDER BY b.dateline DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 12:06:19		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('17674')
<?PHP exit;?>	2014-03-08 12:06:29		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT password FROM ihome_member WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:29		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	DELETE FROM ihome_session WHERE uid='24337' OR lastactivity<'1394249789'
<?PHP exit;?>	2014-03-08 12:06:29		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24337', 'lichao057@163.com', 'b600489fac03ad2cc81c0736b8e11e66', '1394251589', '061148243')
<?PHP exit;?>	2014-03-08 12:06:29		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_creditlog WHERE uid='24337' AND rid='10'
<?PHP exit;?>	2014-03-08 12:06:29		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	UPDATE ihome_space SET lastlogin='1394251589',ip='061148243' WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:29		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_spacelog WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:29		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24337' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:06:29		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24337'
<?PHP exit;?>	2014-03-08 12:06:29		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.viewnum,b.replynum,b.dateline FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '17674' ORDER BY b.dateline DESC LIMIT 20,20
<?PHP exit;?>	2014-03-08 12:06:29		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('17674')
<?PHP exit;?>	2014-03-08 12:06:39		117.136.0.129	7	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='7'
<?PHP exit;?>	2014-03-08 12:06:39		117.136.0.129	7	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='7' OR lastactivity<'1394249799'
<?PHP exit;?>	2014-03-08 12:06:39		117.136.0.129	7	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('7', 'liyunchun', '9700456a6fbfb79335d12586ef887dd3', '1394251599', '117136000')
<?PHP exit;?>	2014-03-08 12:06:39		117.136.0.129	7	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='7' AND rid='10'
<?PHP exit;?>	2014-03-08 12:06:39		117.136.0.129	7	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394251599',ip='117136000' WHERE uid='7'
<?PHP exit;?>	2014-03-08 12:06:39		117.136.0.129	7	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='7'
<?PHP exit;?>	2014-03-08 12:06:39		117.136.0.129	7	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='7' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:06:39		117.136.0.129	7	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 5618
<?PHP exit;?>	2014-03-08 12:06:39		117.136.0.129	7	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='7'
<?PHP exit;?>	2014-03-08 12:06:39		117.136.0.129	7	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='7' AND fuid='5618' LIMIT 1
<?PHP exit;?>	2014-03-08 12:06:39		117.136.0.129	7	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='5618' AND fuid='7' LIMIT 1
<?PHP exit;?>	2014-03-08 12:06:47		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT password FROM ihome_member WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:47		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	DELETE FROM ihome_session WHERE uid='24337' OR lastactivity<'1394249807'
<?PHP exit;?>	2014-03-08 12:06:47		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24337', 'lichao057@163.com', 'b600489fac03ad2cc81c0736b8e11e66', '1394251607', '061148243')
<?PHP exit;?>	2014-03-08 12:06:47		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_creditlog WHERE uid='24337' AND rid='10'
<?PHP exit;?>	2014-03-08 12:06:47		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	UPDATE ihome_space SET lastlogin='1394251607',ip='061148243' WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:47		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_spacelog WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:47		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24337' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:06:47		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24337'
<?PHP exit;?>	2014-03-08 12:06:47		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.viewnum,b.replynum,b.dateline FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '17674' ORDER BY b.dateline DESC LIMIT 40,20
<?PHP exit;?>	2014-03-08 12:06:47		61.148.243.88	24337	/plugin/mobile/do_getbloglist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('17674')
<?PHP exit;?>	2014-03-08 12:06:50		61.148.243.88	24337	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:50		61.148.243.88	24337	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24337' OR lastactivity<'1394249810'
<?PHP exit;?>	2014-03-08 12:06:50		61.148.243.88	24337	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24337', 'lichao057@163.com', 'b600489fac03ad2cc81c0736b8e11e66', '1394251610', '061148243')
<?PHP exit;?>	2014-03-08 12:06:50		61.148.243.88	24337	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24337' AND rid='10'
<?PHP exit;?>	2014-03-08 12:06:50		61.148.243.88	24337	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394251610',ip='061148243' WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:50		61.148.243.88	24337	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:50		61.148.243.88	24337	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24337' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:06:50		61.148.243.88	24337	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24337'
<?PHP exit;?>	2014-03-08 12:06:51		61.148.243.88	24337	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:51		61.148.243.88	24337	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='24337' OR lastactivity<'1394249811'
<?PHP exit;?>	2014-03-08 12:06:51		61.148.243.88	24337	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24337', 'lichao057@163.com', 'b600489fac03ad2cc81c0736b8e11e66', '1394251611', '061148243')
<?PHP exit;?>	2014-03-08 12:06:51		61.148.243.88	24337	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24337' AND rid='10'
<?PHP exit;?>	2014-03-08 12:06:51		61.148.243.88	24337	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394251611',ip='061148243' WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:51		61.148.243.88	24337	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24337'
<?PHP exit;?>	2014-03-08 12:06:51		61.148.243.88	24337	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24337' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:06:51		61.148.243.88	24337	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24337'
<?PHP exit;?>	2014-03-08 12:06:51		61.148.243.88	24337	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=26396
<?PHP exit;?>	2014-03-08 12:08:30		114.250.92.253	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='2671362312@qq.com' and password=md5(concat('9924493a6a7c264f8540133cb95a8522',salt))
<?PHP exit;?>	2014-03-08 12:08:30		114.250.92.253	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='4048'
<?PHP exit;?>	2014-03-08 12:08:30		114.250.92.253	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='4048' OR lastactivity<'1394249910'
<?PHP exit;?>	2014-03-08 12:08:30		114.250.92.253	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4048', '2671362312@qq.com', '9924493a6a7c264f8540133cb95a8522', '1394251710', '114250092')
<?PHP exit;?>	2014-03-08 12:08:30		114.250.92.253	4048	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='4048' AND rid='10'
<?PHP exit;?>	2014-03-08 12:08:30		114.250.92.253	4048	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394251710',credit='3',experience='5' WHERE clid='19139'
<?PHP exit;?>	2014-03-08 12:08:30		114.250.92.253	4048	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394251710',ip='114250092',credit=credit+3,experience=experience+5 WHERE uid='4048'
<?PHP exit;?>	2014-03-08 12:08:30		114.250.92.253	4048	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='4048'
<?PHP exit;?>	2014-03-08 12:08:30		114.250.92.253	4048	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4048' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:08:30		114.250.92.253	4048	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('4048', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 12:08:30		114.250.92.253	4048	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 12:08:30		114.250.92.253	4048	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 12:08:40		114.250.92.253	4048	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='4048'
<?PHP exit;?>	2014-03-08 12:08:40		114.250.92.253	4048	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='4048' OR lastactivity<'1394249920'
<?PHP exit;?>	2014-03-08 12:08:40		114.250.92.253	4048	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4048', '2671362312@qq.com', '9924493a6a7c264f8540133cb95a8522', '1394251720', '114250092')
<?PHP exit;?>	2014-03-08 12:08:40		114.250.92.253	4048	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='4048' AND rid='10'
<?PHP exit;?>	2014-03-08 12:08:40		114.250.92.253	4048	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394251720',ip='114250092' WHERE uid='4048'
<?PHP exit;?>	2014-03-08 12:08:40		114.250.92.253	4048	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='4048'
<?PHP exit;?>	2014-03-08 12:08:40		114.250.92.253	4048	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4048' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:08:40		114.250.92.253	4048	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 4048 and new = 1
<?PHP exit;?>	2014-03-08 12:08:54		114.250.92.253	4048	/plugin/mobile/do_getnews.php	SELECT password FROM ihome_member WHERE uid='4048'
<?PHP exit;?>	2014-03-08 12:08:54		114.250.92.253	4048	/plugin/mobile/do_getnews.php	DELETE FROM ihome_session WHERE uid='4048' OR lastactivity<'1394249934'
<?PHP exit;?>	2014-03-08 12:08:54		114.250.92.253	4048	/plugin/mobile/do_getnews.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4048', '2671362312@qq.com', '9924493a6a7c264f8540133cb95a8522', '1394251734', '114250092')
<?PHP exit;?>	2014-03-08 12:08:54		114.250.92.253	4048	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_creditlog WHERE uid='4048' AND rid='10'
<?PHP exit;?>	2014-03-08 12:08:54		114.250.92.253	4048	/plugin/mobile/do_getnews.php	UPDATE ihome_space SET lastlogin='1394251734',ip='114250092' WHERE uid='4048'
<?PHP exit;?>	2014-03-08 12:08:54		114.250.92.253	4048	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_spacelog WHERE uid='4048'
<?PHP exit;?>	2014-03-08 12:08:54		114.250.92.253	4048	/plugin/mobile/do_getnews.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4048' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:08:54		114.250.92.253	4048	/plugin/mobile/do_getnews.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='4048'
<?PHP exit;?>	2014-03-08 12:08:54		114.250.92.253	4048	/plugin/mobile/do_getnews.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.dateline,bf.message FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '18054' ORDER BY b.dateline DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 12:08:54		114.250.92.253	4048	/plugin/mobile/do_getnews.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('18054')
<?PHP exit;?>	2014-03-08 12:16:30		114.242.248.32	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='aureyu' and password=md5(concat('04faff7bdbff21c409b7c0a29aecac37',salt))
<?PHP exit;?>	2014-03-08 12:16:30		114.242.248.32	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='4706'
<?PHP exit;?>	2014-03-08 12:16:30		114.242.248.32	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='4706' OR lastactivity<'1394250390'
<?PHP exit;?>	2014-03-08 12:16:30		114.242.248.32	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4706', 'aureyu', '5022d17619a98d2e9a4e79d406411901', '1394252190', '114242248')
<?PHP exit;?>	2014-03-08 12:16:30		114.242.248.32	4706	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='4706' AND rid='10'
<?PHP exit;?>	2014-03-08 12:16:30		114.242.248.32	4706	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394252190',credit='3',experience='5' WHERE clid='22437'
<?PHP exit;?>	2014-03-08 12:16:30		114.242.248.32	4706	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394252190',ip='114242248',credit=credit+3,experience=experience+5 WHERE uid='4706'
<?PHP exit;?>	2014-03-08 12:16:30		114.242.248.32	4706	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='4706'
<?PHP exit;?>	2014-03-08 12:16:30		114.242.248.32	4706	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4706' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:16:30		114.242.248.32	4706	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('4706', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 12:16:30		114.242.248.32	4706	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 12:16:30		114.242.248.32	4706	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 12:16:32		114.242.248.32	4706	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='4706'
<?PHP exit;?>	2014-03-08 12:16:32		114.242.248.32	4706	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='4706' OR lastactivity<'1394250392'
<?PHP exit;?>	2014-03-08 12:16:32		114.242.248.32	4706	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4706', 'aureyu', '5022d17619a98d2e9a4e79d406411901', '1394252192', '114242248')
<?PHP exit;?>	2014-03-08 12:16:32		114.242.248.32	4706	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='4706' AND rid='10'
<?PHP exit;?>	2014-03-08 12:16:32		114.242.248.32	4706	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394252192',ip='114242248' WHERE uid='4706'
<?PHP exit;?>	2014-03-08 12:16:32		114.242.248.32	4706	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='4706'
<?PHP exit;?>	2014-03-08 12:16:32		114.242.248.32	4706	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4706' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:16:32		114.242.248.32	4706	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 4706 and new = 1
<?PHP exit;?>	2014-03-08 12:21:07		114.242.248.233	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='www.13693700607' and password=md5(concat('b99e1f622cfa88e7229ead8ee69dc839',salt))
<?PHP exit;?>	2014-03-08 12:21:07		114.242.248.233	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='4034'
<?PHP exit;?>	2014-03-08 12:21:07		114.242.248.233	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='4034' OR lastactivity<'1394250667'
<?PHP exit;?>	2014-03-08 12:21:07		114.242.248.233	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4034', 'www.13693700607', 'd1df734d6336d93ccbabce70c91f7976', '1394252467', '114242248')
<?PHP exit;?>	2014-03-08 12:21:07		114.242.248.233	4034	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='4034' AND rid='10'
<?PHP exit;?>	2014-03-08 12:21:07		114.242.248.233	4034	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394252467',credit='3',experience='5' WHERE clid='19059'
<?PHP exit;?>	2014-03-08 12:21:07		114.242.248.233	4034	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394252467',ip='114242248',credit=credit+3,experience=experience+5 WHERE uid='4034'
<?PHP exit;?>	2014-03-08 12:21:07		114.242.248.233	4034	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='4034'
<?PHP exit;?>	2014-03-08 12:21:07		114.242.248.233	4034	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4034' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:21:07		114.242.248.233	4034	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('4034', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 12:21:07		114.242.248.233	4034	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 12:21:07		114.242.248.233	4034	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 12:21:10		114.242.248.233	4034	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='4034'
<?PHP exit;?>	2014-03-08 12:21:10		114.242.248.233	4034	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='4034' OR lastactivity<'1394250670'
<?PHP exit;?>	2014-03-08 12:21:10		114.242.248.233	4034	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4034', 'www.13693700607', 'd1df734d6336d93ccbabce70c91f7976', '1394252470', '114242248')
<?PHP exit;?>	2014-03-08 12:21:10		114.242.248.233	4034	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='4034' AND rid='10'
<?PHP exit;?>	2014-03-08 12:21:10		114.242.248.233	4034	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394252470',ip='114242248' WHERE uid='4034'
<?PHP exit;?>	2014-03-08 12:21:10		114.242.248.233	4034	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='4034'
<?PHP exit;?>	2014-03-08 12:21:10		114.242.248.233	4034	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4034' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:21:10		114.242.248.233	4034	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 4034 and new = 1
<?PHP exit;?>	2014-03-08 12:21:54		114.242.248.233	4034	/plugin/mobile/do_getnews.php	SELECT password FROM ihome_member WHERE uid='4034'
<?PHP exit;?>	2014-03-08 12:21:54		114.242.248.233	4034	/plugin/mobile/do_getnews.php	DELETE FROM ihome_session WHERE uid='4034' OR lastactivity<'1394250714'
<?PHP exit;?>	2014-03-08 12:21:54		114.242.248.233	4034	/plugin/mobile/do_getnews.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4034', 'www.13693700607', 'd1df734d6336d93ccbabce70c91f7976', '1394252514', '114242248')
<?PHP exit;?>	2014-03-08 12:21:54		114.242.248.233	4034	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_creditlog WHERE uid='4034' AND rid='10'
<?PHP exit;?>	2014-03-08 12:21:54		114.242.248.233	4034	/plugin/mobile/do_getnews.php	UPDATE ihome_space SET lastlogin='1394252514',ip='114242248' WHERE uid='4034'
<?PHP exit;?>	2014-03-08 12:21:54		114.242.248.233	4034	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_spacelog WHERE uid='4034'
<?PHP exit;?>	2014-03-08 12:21:54		114.242.248.233	4034	/plugin/mobile/do_getnews.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4034' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:21:54		114.242.248.233	4034	/plugin/mobile/do_getnews.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='4034'
<?PHP exit;?>	2014-03-08 12:21:54		114.242.248.233	4034	/plugin/mobile/do_getnews.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.dateline,bf.message FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '18054' ORDER BY b.dateline DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 12:21:54		114.242.248.233	4034	/plugin/mobile/do_getnews.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('18054')
<?PHP exit;?>	2014-03-08 12:54:15		114.242.248.101	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='2324897477@qq.com' and password=md5(concat('f30220fd7dc2d8aa3d5bc8789ce8ca95',salt))
<?PHP exit;?>	2014-03-08 12:54:15		114.242.248.101	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='4063'
<?PHP exit;?>	2014-03-08 12:54:15		114.242.248.101	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='4063' OR lastactivity<'1394252655'
<?PHP exit;?>	2014-03-08 12:54:15		114.242.248.101	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4063', '2324897477@qq.com', '90794a55f44e635df4a7c036cbf313b3', '1394254455', '114242248')
<?PHP exit;?>	2014-03-08 12:54:15		114.242.248.101	4063	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='4063' AND rid='10'
<?PHP exit;?>	2014-03-08 12:54:15		114.242.248.101	4063	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394254455',ip='114242248' WHERE uid='4063'
<?PHP exit;?>	2014-03-08 12:54:15		114.242.248.101	4063	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='4063'
<?PHP exit;?>	2014-03-08 12:54:15		114.242.248.101	4063	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4063' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:54:19		114.242.248.101	4063	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='4063'
<?PHP exit;?>	2014-03-08 12:54:19		114.242.248.101	4063	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='4063' OR lastactivity<'1394252659'
<?PHP exit;?>	2014-03-08 12:54:19		114.242.248.101	4063	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4063', '2324897477@qq.com', '90794a55f44e635df4a7c036cbf313b3', '1394254459', '114242248')
<?PHP exit;?>	2014-03-08 12:54:19		114.242.248.101	4063	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='4063' AND rid='10'
<?PHP exit;?>	2014-03-08 12:54:19		114.242.248.101	4063	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394254459',ip='114242248' WHERE uid='4063'
<?PHP exit;?>	2014-03-08 12:54:19		114.242.248.101	4063	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='4063'
<?PHP exit;?>	2014-03-08 12:54:19		114.242.248.101	4063	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4063' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:54:19		114.242.248.101	4063	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 4063 and new = 1
<?PHP exit;?>	2014-03-08 12:59:27		172.16.6.32	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='tudelaty' and password=md5(concat('ea07ed882eca86a14a1736be1a08b7c8',salt))
<?PHP exit;?>	2014-03-08 12:59:27		172.16.6.32	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='23388'
<?PHP exit;?>	2014-03-08 12:59:27		172.16.6.32	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='23388' OR lastactivity<'1394252967'
<?PHP exit;?>	2014-03-08 12:59:27		172.16.6.32	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23388', 'tudelaty', 'ea07ed882eca86a14a1736be1a08b7c8', '1394254767', '172016006')
<?PHP exit;?>	2014-03-08 12:59:27		172.16.6.32	23388	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='23388' AND rid='10'
<?PHP exit;?>	2014-03-08 12:59:27		172.16.6.32	23388	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394254767',ip='172016006' WHERE uid='23388'
<?PHP exit;?>	2014-03-08 12:59:27		172.16.6.32	23388	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='23388'
<?PHP exit;?>	2014-03-08 12:59:27		172.16.6.32	23388	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23388' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:59:28		172.16.6.32	23388	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23388'
<?PHP exit;?>	2014-03-08 12:59:28		172.16.6.32	23388	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23388' OR lastactivity<'1394252968'
<?PHP exit;?>	2014-03-08 12:59:28		172.16.6.32	23388	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23388', 'tudelaty', 'ea07ed882eca86a14a1736be1a08b7c8', '1394254768', '172016006')
<?PHP exit;?>	2014-03-08 12:59:28		172.16.6.32	23388	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23388' AND rid='10'
<?PHP exit;?>	2014-03-08 12:59:28		172.16.6.32	23388	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394254768',ip='172016006' WHERE uid='23388'
<?PHP exit;?>	2014-03-08 12:59:28		172.16.6.32	23388	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23388'
<?PHP exit;?>	2014-03-08 12:59:28		172.16.6.32	23388	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23388' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 12:59:28		172.16.6.32	23388	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23388 and new = 1
<?PHP exit;?>	2014-03-08 13:04:20		172.31.153.133	29970	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 13:04:20		172.31.153.133	29970	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394253260'
<?PHP exit;?>	2014-03-08 13:04:20		172.31.153.133	29970	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394255060', '172031153')
<?PHP exit;?>	2014-03-08 13:04:20		172.31.153.133	29970	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 13:04:20		172.31.153.133	29970	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394255060',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 13:04:20		172.31.153.133	29970	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 13:04:20		172.31.153.133	29970	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 13:04:20		172.31.153.133	29970	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 29970 and new = 1
<?PHP exit;?>	2014-03-08 13:04:35		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 13:04:35		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394253275'
<?PHP exit;?>	2014-03-08 13:04:35		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394255075', '172031153')
<?PHP exit;?>	2014-03-08 13:04:35		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 13:04:35		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394255075',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 13:04:35		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 13:04:35		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 13:04:35		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47355 LIMIT 0,20
<?PHP exit;?>	2014-03-08 13:04:35		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('22763')
<?PHP exit;?>	2014-03-08 13:04:35		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 13:04:35		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394253275'
<?PHP exit;?>	2014-03-08 13:04:35		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394255075', '172031153')
<?PHP exit;?>	2014-03-08 13:04:35		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 13:04:35		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394255075',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 13:04:35		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 13:04:35		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 13:04:35		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47355 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:17:31		172.31.153.133	29970	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:31		172.31.153.133	29970	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257651'
<?PHP exit;?>	2014-03-08 14:17:31		172.31.153.133	29970	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259451', '172031153')
<?PHP exit;?>	2014-03-08 14:17:31		172.31.153.133	29970	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:17:31		172.31.153.133	29970	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394259451',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:31		172.31.153.133	29970	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:31		172.31.153.133	29970	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:17:31		172.31.153.133	29970	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 29970 and new = 1
<?PHP exit;?>	2014-03-08 14:17:37		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:37		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257657'
<?PHP exit;?>	2014-03-08 14:17:37		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259457', '172031153')
<?PHP exit;?>	2014-03-08 14:17:37		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:17:37		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394259457',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:37		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:37		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:17:37		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47372 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:17:37		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('25072')
<?PHP exit;?>	2014-03-08 14:17:37		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:37		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257657'
<?PHP exit;?>	2014-03-08 14:17:37		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259457', '172031153')
<?PHP exit;?>	2014-03-08 14:17:37		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:17:37		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394259457',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:37		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:37		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:17:37		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47372 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:17:41		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:41		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257661'
<?PHP exit;?>	2014-03-08 14:17:41		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259461', '172031153')
<?PHP exit;?>	2014-03-08 14:17:41		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:17:41		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394259461',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:41		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:41		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:17:41		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47371 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:17:41		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('25072')
<?PHP exit;?>	2014-03-08 14:17:41		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:41		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257661'
<?PHP exit;?>	2014-03-08 14:17:41		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259461', '172031153')
<?PHP exit;?>	2014-03-08 14:17:41		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:17:41		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394259461',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:41		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:41		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:17:41		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47371 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:17:46		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:46		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257666'
<?PHP exit;?>	2014-03-08 14:17:46		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259466', '172031153')
<?PHP exit;?>	2014-03-08 14:17:46		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:17:46		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394259466',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:46		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:46		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:17:46		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47368 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:17:46		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('7155')
<?PHP exit;?>	2014-03-08 14:17:46		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:46		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257666'
<?PHP exit;?>	2014-03-08 14:17:46		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259466', '172031153')
<?PHP exit;?>	2014-03-08 14:17:46		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:17:46		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394259466',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:46		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:46		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:17:46		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47368 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:17:52		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:52		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257672'
<?PHP exit;?>	2014-03-08 14:17:52		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259472', '172031153')
<?PHP exit;?>	2014-03-08 14:17:52		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:17:52		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394259472',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:52		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:52		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:17:52		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47364 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:17:52		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('2534')
<?PHP exit;?>	2014-03-08 14:17:52		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:52		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257672'
<?PHP exit;?>	2014-03-08 14:17:52		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259472', '172031153')
<?PHP exit;?>	2014-03-08 14:17:52		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:17:52		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394259472',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:52		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:52		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:17:52		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47364 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:17:58		172.31.153.133	29970	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:58		172.31.153.133	29970	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257678'
<?PHP exit;?>	2014-03-08 14:17:58		172.31.153.133	29970	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259478', '172031153')
<?PHP exit;?>	2014-03-08 14:17:58		172.31.153.133	29970	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:17:58		172.31.153.133	29970	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394259478',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:58		172.31.153.133	29970	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:58		172.31.153.133	29970	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:17:58		172.31.153.133	29970	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65128 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:17:58		172.31.153.133	29970	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('26830')
<?PHP exit;?>	2014-03-08 14:17:58		172.31.153.133	29970	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:58		172.31.153.133	29970	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257678'
<?PHP exit;?>	2014-03-08 14:17:58		172.31.153.133	29970	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259478', '172031153')
<?PHP exit;?>	2014-03-08 14:17:58		172.31.153.133	29970	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:17:58		172.31.153.133	29970	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394259478',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:58		172.31.153.133	29970	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:17:58		172.31.153.133	29970	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:17:58		172.31.153.133	29970	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-08 14:18:00		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:00		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257680'
<?PHP exit;?>	2014-03-08 14:18:00		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259480', '172031153')
<?PHP exit;?>	2014-03-08 14:18:00		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:18:00		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394259480',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:00		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:00		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:18:00		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47360 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:18:00		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('6404')
<?PHP exit;?>	2014-03-08 14:18:00		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:00		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257680'
<?PHP exit;?>	2014-03-08 14:18:00		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259480', '172031153')
<?PHP exit;?>	2014-03-08 14:18:00		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:18:00		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394259480',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:00		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:00		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:18:00		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47360 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:18:01		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:01		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257681'
<?PHP exit;?>	2014-03-08 14:18:01		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259481', '172031153')
<?PHP exit;?>	2014-03-08 14:18:01		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:18:01		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394259481',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:01		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:01		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:18:01		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47358 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:18:01		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('2074')
<?PHP exit;?>	2014-03-08 14:18:02		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:02		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257682'
<?PHP exit;?>	2014-03-08 14:18:02		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259482', '172031153')
<?PHP exit;?>	2014-03-08 14:18:02		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:18:02		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394259482',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:02		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:02		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:18:02		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47358 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:18:08		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:08		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257688'
<?PHP exit;?>	2014-03-08 14:18:08		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259488', '172031153')
<?PHP exit;?>	2014-03-08 14:18:08		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:18:08		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394259488',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:08		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:08		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:18:08		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47349 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:18:08		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('24225')
<?PHP exit;?>	2014-03-08 14:18:09		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:09		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257689'
<?PHP exit;?>	2014-03-08 14:18:09		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259489', '172031153')
<?PHP exit;?>	2014-03-08 14:18:09		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:18:09		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394259489',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:09		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:09		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:18:09		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47349 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:18:10		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:10		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257690'
<?PHP exit;?>	2014-03-08 14:18:10		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259490', '172031153')
<?PHP exit;?>	2014-03-08 14:18:10		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:18:10		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394259490',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:10		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:10		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:18:10		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47346 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:18:10		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('24414')
<?PHP exit;?>	2014-03-08 14:18:11		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:11		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257691'
<?PHP exit;?>	2014-03-08 14:18:11		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259491', '172031153')
<?PHP exit;?>	2014-03-08 14:18:11		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:18:11		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394259491',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:11		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:11		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:18:11		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47346 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:18:12		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:12		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257692'
<?PHP exit;?>	2014-03-08 14:18:12		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259492', '172031153')
<?PHP exit;?>	2014-03-08 14:18:12		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:18:12		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394259492',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:12		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:12		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:18:12		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47348 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:18:12		172.31.153.133	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('8799')
<?PHP exit;?>	2014-03-08 14:18:12		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:12		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394257692'
<?PHP exit;?>	2014-03-08 14:18:12		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394259492', '172031153')
<?PHP exit;?>	2014-03-08 14:18:12		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 14:18:12		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394259492',ip='172031153' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:12		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 14:18:12		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:18:12		172.31.153.133	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47348 LIMIT 0,20
<?PHP exit;?>	2014-03-08 14:20:13		111.195.201.119	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='2915529483@qq.com' and password=md5(concat('6253abb6a187f6ea98ab7385d984467f',salt))
<?PHP exit;?>	2014-03-08 14:20:13		111.195.201.119	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='23104'
<?PHP exit;?>	2014-03-08 14:20:13		111.195.201.119	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='23104' OR lastactivity<'1394257813'
<?PHP exit;?>	2014-03-08 14:20:13		111.195.201.119	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23104', '2915529483@qq.com', '98d1b7f432e9bda116993c3f7a0c4e5d', '1394259613', '111195201')
<?PHP exit;?>	2014-03-08 14:20:13		111.195.201.119	23104	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='23104' AND rid='10'
<?PHP exit;?>	2014-03-08 14:20:13		111.195.201.119	23104	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394259613',ip='111195201' WHERE uid='23104'
<?PHP exit;?>	2014-03-08 14:20:13		111.195.201.119	23104	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='23104'
<?PHP exit;?>	2014-03-08 14:20:13		111.195.201.119	23104	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23104' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:20:15		111.195.201.119	23104	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23104'
<?PHP exit;?>	2014-03-08 14:20:15		111.195.201.119	23104	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23104' OR lastactivity<'1394257815'
<?PHP exit;?>	2014-03-08 14:20:15		111.195.201.119	23104	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23104', '2915529483@qq.com', '98d1b7f432e9bda116993c3f7a0c4e5d', '1394259615', '111195201')
<?PHP exit;?>	2014-03-08 14:20:15		111.195.201.119	23104	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23104' AND rid='10'
<?PHP exit;?>	2014-03-08 14:20:15		111.195.201.119	23104	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394259615',ip='111195201' WHERE uid='23104'
<?PHP exit;?>	2014-03-08 14:20:15		111.195.201.119	23104	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23104'
<?PHP exit;?>	2014-03-08 14:20:15		111.195.201.119	23104	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23104' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 14:20:15		111.195.201.119	23104	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23104 and new = 1
<?PHP exit;?>	2014-03-08 15:58:14		111.200.68.240	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='349568757' and password=md5(concat('27b2dbe96b95664750a0cbb6a647f399',salt))
<?PHP exit;?>	2014-03-08 15:58:14		111.200.68.240	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='2788'
<?PHP exit;?>	2014-03-08 15:58:14		111.200.68.240	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='2788' OR lastactivity<'1394263694'
<?PHP exit;?>	2014-03-08 15:58:14		111.200.68.240	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2788', '349568757', '27b2dbe96b95664750a0cbb6a647f399', '1394265494', '111200068')
<?PHP exit;?>	2014-03-08 15:58:14		111.200.68.240	2788	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='2788' AND rid='10'
<?PHP exit;?>	2014-03-08 15:58:14		111.200.68.240	2788	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394265494',ip='111200068' WHERE uid='2788'
<?PHP exit;?>	2014-03-08 15:58:14		111.200.68.240	2788	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='2788'
<?PHP exit;?>	2014-03-08 15:58:14		111.200.68.240	2788	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2788' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 15:58:16		111.200.68.240	2788	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='2788'
<?PHP exit;?>	2014-03-08 15:58:16		111.200.68.240	2788	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='2788' OR lastactivity<'1394263696'
<?PHP exit;?>	2014-03-08 15:58:16		111.200.68.240	2788	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2788', '349568757', '27b2dbe96b95664750a0cbb6a647f399', '1394265496', '111200068')
<?PHP exit;?>	2014-03-08 15:58:16		111.200.68.240	2788	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='2788' AND rid='10'
<?PHP exit;?>	2014-03-08 15:58:16		111.200.68.240	2788	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394265496',ip='111200068' WHERE uid='2788'
<?PHP exit;?>	2014-03-08 15:58:16		111.200.68.240	2788	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='2788'
<?PHP exit;?>	2014-03-08 15:58:16		111.200.68.240	2788	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2788' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 15:58:16		111.200.68.240	2788	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 2788 and new = 1
<?PHP exit;?>	2014-03-08 16:07:38		221.216.135.21	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='13061110' and password=md5(concat('f03fdb26341270a698b64f13382804f7',salt))
<?PHP exit;?>	2014-03-08 16:07:48		221.216.135.21	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='814640845' and password=md5(concat('f03fdb26341270a698b64f13382804f7',salt))
<?PHP exit;?>	2014-03-08 16:07:48		221.216.135.21	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:07:48		221.216.135.21	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='24213' OR lastactivity<'1394264268'
<?PHP exit;?>	2014-03-08 16:07:48		221.216.135.21	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24213', '814640845', '949d6d666241336fbd169d233461d01d', '1394266068', '221216135')
<?PHP exit;?>	2014-03-08 16:07:48		221.216.135.21	24213	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='24213' AND rid='10'
<?PHP exit;?>	2014-03-08 16:07:48		221.216.135.21	24213	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394266068',ip='221216135' WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:07:48		221.216.135.21	24213	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:07:48		221.216.135.21	24213	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24213' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:07:49		221.216.135.21	24213	/plugin/mobile/do_getuserinfo.php	SELECT password FROM ihome_member WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:07:49		221.216.135.21	24213	/plugin/mobile/do_getuserinfo.php	DELETE FROM ihome_session WHERE uid='24213' OR lastactivity<'1394264269'
<?PHP exit;?>	2014-03-08 16:07:49		221.216.135.21	24213	/plugin/mobile/do_getuserinfo.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24213', '814640845', '949d6d666241336fbd169d233461d01d', '1394266069', '221216135')
<?PHP exit;?>	2014-03-08 16:07:49		221.216.135.21	24213	/plugin/mobile/do_getuserinfo.php	SELECT * FROM ihome_creditlog WHERE uid='24213' AND rid='10'
<?PHP exit;?>	2014-03-08 16:07:49		221.216.135.21	24213	/plugin/mobile/do_getuserinfo.php	UPDATE ihome_space SET lastlogin='1394266069',ip='221216135' WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:07:49		221.216.135.21	24213	/plugin/mobile/do_getuserinfo.php	SELECT * FROM ihome_spacelog WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:07:49		221.216.135.21	24213	/plugin/mobile/do_getuserinfo.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24213' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:07:49		221.216.135.21	24213	/plugin/mobile/do_getuserinfo.php	SELECT s.uid,s.name,ug.grouptitle,sf.note,s.friendnum ,s.threadnum,s.blognum,sf.privacy FROM ihome_space s   				, ihome_spacefield sf ,ihome_usergroup ug where s.uid=sf.uid and s.groupid=ug.gid                  and s.uid =24213
<?PHP exit;?>	2014-03-08 16:07:49		221.216.135.21	24213	/plugin/mobile/do_getuserinfo.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('24213')
<?PHP exit;?>	2014-03-08 16:07:49		221.216.135.21	24213	/plugin/mobile/do_getuserinfo.php	SELECT  friend  FROM  ihome_spacefield  WHERE uid = 24213
<?PHP exit;?>	2014-03-08 16:07:51		221.216.135.21	24213	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:07:51		221.216.135.21	24213	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='24213' OR lastactivity<'1394264271'
<?PHP exit;?>	2014-03-08 16:07:51		221.216.135.21	24213	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24213', '814640845', '949d6d666241336fbd169d233461d01d', '1394266071', '221216135')
<?PHP exit;?>	2014-03-08 16:07:51		221.216.135.21	24213	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='24213' AND rid='10'
<?PHP exit;?>	2014-03-08 16:07:51		221.216.135.21	24213	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394266071',ip='221216135' WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:07:51		221.216.135.21	24213	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:07:51		221.216.135.21	24213	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24213' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:07:51		221.216.135.21	24213	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 24213 and new = 1
<?PHP exit;?>	2014-03-08 16:07:53		221.216.135.21	24213	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:07:53		221.216.135.21	24213	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='24213' OR lastactivity<'1394264273'
<?PHP exit;?>	2014-03-08 16:07:53		221.216.135.21	24213	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24213', '814640845', '949d6d666241336fbd169d233461d01d', '1394266073', '221216135')
<?PHP exit;?>	2014-03-08 16:07:53		221.216.135.21	24213	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='24213' AND rid='10'
<?PHP exit;?>	2014-03-08 16:07:53		221.216.135.21	24213	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394266073',ip='221216135' WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:07:53		221.216.135.21	24213	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:07:53		221.216.135.21	24213	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24213' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:07:53		221.216.135.21	24213	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 24213 and new = 1
<?PHP exit;?>	2014-03-08 16:08:34		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23104'
<?PHP exit;?>	2014-03-08 16:08:34		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23104' OR lastactivity<'1394264314'
<?PHP exit;?>	2014-03-08 16:08:34		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23104', '2915529483@qq.com', '98d1b7f432e9bda116993c3f7a0c4e5d', '1394266114', '172016025')
<?PHP exit;?>	2014-03-08 16:08:34		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23104' AND rid='10'
<?PHP exit;?>	2014-03-08 16:08:34		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394266114',ip='172016025' WHERE uid='23104'
<?PHP exit;?>	2014-03-08 16:08:34		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23104'
<?PHP exit;?>	2014-03-08 16:08:34		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23104' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:08:34		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23104 and new = 1
<?PHP exit;?>	2014-03-08 16:08:36		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23104'
<?PHP exit;?>	2014-03-08 16:08:36		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23104' OR lastactivity<'1394264316'
<?PHP exit;?>	2014-03-08 16:08:36		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23104', '2915529483@qq.com', '98d1b7f432e9bda116993c3f7a0c4e5d', '1394266116', '172016025')
<?PHP exit;?>	2014-03-08 16:08:36		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23104' AND rid='10'
<?PHP exit;?>	2014-03-08 16:08:36		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394266116',ip='172016025' WHERE uid='23104'
<?PHP exit;?>	2014-03-08 16:08:36		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23104'
<?PHP exit;?>	2014-03-08 16:08:36		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23104' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:08:36		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23104 and new = 1
<?PHP exit;?>	2014-03-08 16:09:00		172.16.64.17	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='1250135090@qq.com' and password=md5(concat('b83b1351d6646b5b470292722d44e09f',salt))
<?PHP exit;?>	2014-03-08 16:09:00		172.16.64.17	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='23432'
<?PHP exit;?>	2014-03-08 16:09:00		172.16.64.17	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='23432' OR lastactivity<'1394264340'
<?PHP exit;?>	2014-03-08 16:09:00		172.16.64.17	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23432', '1250135090@qq.com', 'b83b1351d6646b5b470292722d44e09f', '1394266140', '172016064')
<?PHP exit;?>	2014-03-08 16:09:00		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='23432' AND rid='10'
<?PHP exit;?>	2014-03-08 16:09:00		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394266140',ip='172016064' WHERE uid='23432'
<?PHP exit;?>	2014-03-08 16:09:00		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='23432'
<?PHP exit;?>	2014-03-08 16:09:00		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23432' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:09:02		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23432'
<?PHP exit;?>	2014-03-08 16:09:02		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23432' OR lastactivity<'1394264342'
<?PHP exit;?>	2014-03-08 16:09:02		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23432', '1250135090@qq.com', 'b83b1351d6646b5b470292722d44e09f', '1394266142', '172016064')
<?PHP exit;?>	2014-03-08 16:09:02		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23432' AND rid='10'
<?PHP exit;?>	2014-03-08 16:09:02		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394266142',ip='172016064' WHERE uid='23432'
<?PHP exit;?>	2014-03-08 16:09:02		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23432'
<?PHP exit;?>	2014-03-08 16:09:02		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23432' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:09:02		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23432 and new = 1
<?PHP exit;?>	2014-03-08 16:09:19		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='23432'
<?PHP exit;?>	2014-03-08 16:09:19		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='23432' OR lastactivity<'1394264359'
<?PHP exit;?>	2014-03-08 16:09:19		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23432', '1250135090@qq.com', 'b83b1351d6646b5b470292722d44e09f', '1394266159', '172016064')
<?PHP exit;?>	2014-03-08 16:09:19		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='23432' AND rid='10'
<?PHP exit;?>	2014-03-08 16:09:19		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394266159',ip='172016064' WHERE uid='23432'
<?PHP exit;?>	2014-03-08 16:09:19		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='23432'
<?PHP exit;?>	2014-03-08 16:09:19		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23432' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:09:19		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 24071
<?PHP exit;?>	2014-03-08 16:09:19		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='23432'
<?PHP exit;?>	2014-03-08 16:09:19		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='23432' AND fuid='24071' LIMIT 1
<?PHP exit;?>	2014-03-08 16:09:19		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='24071' AND fuid='23432' LIMIT 1
<?PHP exit;?>	2014-03-08 16:09:23		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='23432'
<?PHP exit;?>	2014-03-08 16:09:23		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='23432' OR lastactivity<'1394264363'
<?PHP exit;?>	2014-03-08 16:09:23		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23432', '1250135090@qq.com', 'b83b1351d6646b5b470292722d44e09f', '1394266163', '172016064')
<?PHP exit;?>	2014-03-08 16:09:23		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='23432' AND rid='10'
<?PHP exit;?>	2014-03-08 16:09:23		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394266163',ip='172016064' WHERE uid='23432'
<?PHP exit;?>	2014-03-08 16:09:23		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='23432'
<?PHP exit;?>	2014-03-08 16:09:23		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23432' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:09:23		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 24071
<?PHP exit;?>	2014-03-08 16:09:23		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='23432'
<?PHP exit;?>	2014-03-08 16:09:23		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='23432' AND fuid='24071' LIMIT 1
<?PHP exit;?>	2014-03-08 16:09:23		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='24071' AND fuid='23432' LIMIT 1
<?PHP exit;?>	2014-03-08 16:09:36		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='23432'
<?PHP exit;?>	2014-03-08 16:09:36		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='23432' OR lastactivity<'1394264376'
<?PHP exit;?>	2014-03-08 16:09:36		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23432', '1250135090@qq.com', 'b83b1351d6646b5b470292722d44e09f', '1394266176', '172016064')
<?PHP exit;?>	2014-03-08 16:09:36		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='23432' AND rid='10'
<?PHP exit;?>	2014-03-08 16:09:36		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394266176',ip='172016064' WHERE uid='23432'
<?PHP exit;?>	2014-03-08 16:09:36		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='23432'
<?PHP exit;?>	2014-03-08 16:09:36		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23432' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:09:36		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 22180
<?PHP exit;?>	2014-03-08 16:09:36		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='23432'
<?PHP exit;?>	2014-03-08 16:09:36		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='23432' AND fuid='22180' LIMIT 1
<?PHP exit;?>	2014-03-08 16:09:36		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='22180' AND fuid='23432' LIMIT 1
<?PHP exit;?>	2014-03-08 16:09:37		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='23432'
<?PHP exit;?>	2014-03-08 16:09:37		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='23432' OR lastactivity<'1394264377'
<?PHP exit;?>	2014-03-08 16:09:37		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23432', '1250135090@qq.com', 'b83b1351d6646b5b470292722d44e09f', '1394266177', '172016064')
<?PHP exit;?>	2014-03-08 16:09:37		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='23432' AND rid='10'
<?PHP exit;?>	2014-03-08 16:09:37		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394266177',ip='172016064' WHERE uid='23432'
<?PHP exit;?>	2014-03-08 16:09:37		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='23432'
<?PHP exit;?>	2014-03-08 16:09:37		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23432' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:09:37		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 23193
<?PHP exit;?>	2014-03-08 16:09:37		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='23432'
<?PHP exit;?>	2014-03-08 16:09:37		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='23432' AND fuid='23193' LIMIT 1
<?PHP exit;?>	2014-03-08 16:09:37		172.16.64.17	23432	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='23193' AND fuid='23432' LIMIT 1
<?PHP exit;?>	2014-03-08 16:16:16		221.216.135.21	24213	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:16:16		221.216.135.21	24213	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24213' OR lastactivity<'1394264776'
<?PHP exit;?>	2014-03-08 16:16:16		221.216.135.21	24213	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24213', '814640845', '949d6d666241336fbd169d233461d01d', '1394266576', '221216135')
<?PHP exit;?>	2014-03-08 16:16:16		221.216.135.21	24213	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24213' AND rid='10'
<?PHP exit;?>	2014-03-08 16:16:16		221.216.135.21	24213	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394266576',ip='221216135' WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:16:16		221.216.135.21	24213	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:16:16		221.216.135.21	24213	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24213' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:16:16		221.216.135.21	24213	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=64995 LIMIT 0,20
<?PHP exit;?>	2014-03-08 16:16:16		221.216.135.21	24213	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('1776')
<?PHP exit;?>	2014-03-08 16:16:16		221.216.135.21	24213	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:16:16		221.216.135.21	24213	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24213' OR lastactivity<'1394264776'
<?PHP exit;?>	2014-03-08 16:16:16		221.216.135.21	24213	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24213', '814640845', '949d6d666241336fbd169d233461d01d', '1394266576', '221216135')
<?PHP exit;?>	2014-03-08 16:16:16		221.216.135.21	24213	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24213' AND rid='10'
<?PHP exit;?>	2014-03-08 16:16:16		221.216.135.21	24213	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394266576',ip='221216135' WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:16:16		221.216.135.21	24213	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:16:16		221.216.135.21	24213	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24213' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:16:16		221.216.135.21	24213	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24213'
<?PHP exit;?>	2014-03-08 16:16:17		221.216.135.21	24213	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:16:17		221.216.135.21	24213	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24213' OR lastactivity<'1394264777'
<?PHP exit;?>	2014-03-08 16:16:17		221.216.135.21	24213	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24213', '814640845', '949d6d666241336fbd169d233461d01d', '1394266577', '221216135')
<?PHP exit;?>	2014-03-08 16:16:17		221.216.135.21	24213	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24213' AND rid='10'
<?PHP exit;?>	2014-03-08 16:16:17		221.216.135.21	24213	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394266577',ip='221216135' WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:16:17		221.216.135.21	24213	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24213'
<?PHP exit;?>	2014-03-08 16:16:17		221.216.135.21	24213	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24213' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:16:17		221.216.135.21	24213	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=64995 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 16:20:51		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:20:51		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394265051'
<?PHP exit;?>	2014-03-08 16:20:51		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394266851', '192168013')
<?PHP exit;?>	2014-03-08 16:20:51		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 16:20:51		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394266851',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:20:51		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:20:51		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:20:51		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 29970 and new = 1
<?PHP exit;?>	2014-03-08 16:21:02		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:21:02		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394265062'
<?PHP exit;?>	2014-03-08 16:21:02		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394266862', '192168013')
<?PHP exit;?>	2014-03-08 16:21:02		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 16:21:02		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394266862',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:21:02		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:21:02		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:21:02		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47382 LIMIT 0,20
<?PHP exit;?>	2014-03-08 16:21:02		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('29201')
<?PHP exit;?>	2014-03-08 16:21:02		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:21:02		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394265062'
<?PHP exit;?>	2014-03-08 16:21:02		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394266862', '192168013')
<?PHP exit;?>	2014-03-08 16:21:02		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 16:21:02		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394266862',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:21:02		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:21:02		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:21:02		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47382 LIMIT 0,20
<?PHP exit;?>	2014-03-08 16:21:26		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:21:26		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394265086'
<?PHP exit;?>	2014-03-08 16:21:26		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394266886', '192168013')
<?PHP exit;?>	2014-03-08 16:21:26		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 16:21:26		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394266886',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:21:26		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:21:26		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:21:26		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47368 LIMIT 0,20
<?PHP exit;?>	2014-03-08 16:21:26		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('7155')
<?PHP exit;?>	2014-03-08 16:21:26		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:21:26		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394265086'
<?PHP exit;?>	2014-03-08 16:21:26		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394266886', '192168013')
<?PHP exit;?>	2014-03-08 16:21:26		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 16:21:26		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394266886',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:21:26		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:21:26		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:21:26		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47368 LIMIT 0,20
<?PHP exit;?>	2014-03-08 16:22:52		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:22:52		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394265172'
<?PHP exit;?>	2014-03-08 16:22:52		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394266972', '192168013')
<?PHP exit;?>	2014-03-08 16:22:52		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 16:22:52		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394266972',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:22:52		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:22:52		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:22:52		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 29970 and new = 1
<?PHP exit;?>	2014-03-08 16:23:06		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:23:06		192.168.13.23	29970	/plugin/mobile/do_getnews.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394265186'
<?PHP exit;?>	2014-03-08 16:23:06		192.168.13.23	29970	/plugin/mobile/do_getnews.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394266986', '192168013')
<?PHP exit;?>	2014-03-08 16:23:06		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 16:23:06		192.168.13.23	29970	/plugin/mobile/do_getnews.php	UPDATE ihome_space SET lastlogin='1394266986',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:23:06		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:23:06		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:23:06		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-08 16:23:06		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.dateline,bf.message FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '18054' ORDER BY b.dateline DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 16:23:06		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('18054')
<?PHP exit;?>	2014-03-08 16:23:19		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:23:19		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394265199'
<?PHP exit;?>	2014-03-08 16:23:19		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394266999', '192168013')
<?PHP exit;?>	2014-03-08 16:23:19		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 16:23:19		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	UPDATE ihome_space SET lastlogin='1394266999',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:23:19		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:23:19		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:23:19		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT main.*,mt.* FROM ihome_tagspace main   				LEFT JOIN ihome_mtag mt ON mt.tagid=main.tagid  				WHERE main.uid='29970' ORDER BY mt.threadnum DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 16:23:22		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:23:22		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394265202'
<?PHP exit;?>	2014-03-08 16:23:22		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394267002', '192168013')
<?PHP exit;?>	2014-03-08 16:23:22		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 16:23:22		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	UPDATE ihome_space SET lastlogin='1394267002',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:23:22		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:23:22		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:23:22		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT main.*,mt.* FROM ihome_tagspace main   				LEFT JOIN ihome_mtag mt ON mt.tagid=main.tagid  				WHERE main.uid='29970' ORDER BY mt.threadnum DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 16:23:26		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:23:26		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394265206'
<?PHP exit;?>	2014-03-08 16:23:26		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394267006', '192168013')
<?PHP exit;?>	2014-03-08 16:23:26		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 16:23:26		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394267006',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:23:26		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:23:26		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:23:26		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 29959
<?PHP exit;?>	2014-03-08 16:23:26		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-08 16:23:26		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='29970' AND fuid='29959' LIMIT 1
<?PHP exit;?>	2014-03-08 16:23:26		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='29959' AND fuid='29970' LIMIT 1
<?PHP exit;?>	2014-03-08 16:23:29		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:23:29		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394265209'
<?PHP exit;?>	2014-03-08 16:23:29		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394267009', '192168013')
<?PHP exit;?>	2014-03-08 16:23:29		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 16:23:29		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394267009',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:23:29		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:23:29		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:23:29		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 29959
<?PHP exit;?>	2014-03-08 16:23:29		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-08 16:23:29		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='29970' AND fuid='29959' LIMIT 1
<?PHP exit;?>	2014-03-08 16:23:29		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='29959' AND fuid='29970' LIMIT 1
<?PHP exit;?>	2014-03-08 16:23:32		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:23:32		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394265212'
<?PHP exit;?>	2014-03-08 16:23:32		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394267012', '192168013')
<?PHP exit;?>	2014-03-08 16:23:32		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 16:23:32		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394267012',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:23:32		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:23:32		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:23:32		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 19609
<?PHP exit;?>	2014-03-08 16:23:32		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-08 16:23:32		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='29970' AND fuid='19609' LIMIT 1
<?PHP exit;?>	2014-03-08 16:23:32		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='19609' AND fuid='29970' LIMIT 1
<?PHP exit;?>	2014-03-08 16:24:11		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:24:11		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394265251'
<?PHP exit;?>	2014-03-08 16:24:11		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394267051', '192168013')
<?PHP exit;?>	2014-03-08 16:24:11		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 16:24:11		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394267051',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:24:11		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:24:11		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:24:11		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 29450
<?PHP exit;?>	2014-03-08 16:24:11		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-08 16:24:11		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='29970' AND fuid='29450' LIMIT 1
<?PHP exit;?>	2014-03-08 16:24:11		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='29450' AND fuid='29970' LIMIT 1
<?PHP exit;?>	2014-03-08 16:24:14		192.168.13.23	29970	/plugin/mobile/do_getbloglist.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:24:14		192.168.13.23	29970	/plugin/mobile/do_getbloglist.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394265254'
<?PHP exit;?>	2014-03-08 16:24:14		192.168.13.23	29970	/plugin/mobile/do_getbloglist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394267054', '192168013')
<?PHP exit;?>	2014-03-08 16:24:14		192.168.13.23	29970	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 16:24:14		192.168.13.23	29970	/plugin/mobile/do_getbloglist.php	UPDATE ihome_space SET lastlogin='1394267054',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:24:14		192.168.13.23	29970	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:24:14		192.168.13.23	29970	/plugin/mobile/do_getbloglist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:24:14		192.168.13.23	29970	/plugin/mobile/do_getbloglist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-08 16:24:14		192.168.13.23	29970	/plugin/mobile/do_getbloglist.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.viewnum,b.replynum,b.dateline FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '29450' ORDER BY b.dateline DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 16:24:14		192.168.13.23	29970	/plugin/mobile/do_getbloglist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('29450')
<?PHP exit;?>	2014-03-08 16:24:16		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:24:16		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394265256'
<?PHP exit;?>	2014-03-08 16:24:16		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394267056', '192168013')
<?PHP exit;?>	2014-03-08 16:24:16		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 16:24:16		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394267056',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:24:16		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:24:16		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:24:16		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-08 16:24:17		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:24:17		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394265257'
<?PHP exit;?>	2014-03-08 16:24:17		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394267057', '192168013')
<?PHP exit;?>	2014-03-08 16:24:17		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 16:24:17		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394267057',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:24:17		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:24:17		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:24:17		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-08 16:24:17		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43634
<?PHP exit;?>	2014-03-08 16:50:42		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:50:42		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394266842'
<?PHP exit;?>	2014-03-08 16:50:42		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394268642', '192168013')
<?PHP exit;?>	2014-03-08 16:50:42		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 16:50:42		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394268642',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:50:42		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:50:42		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:50:42		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 29970 and new = 1
<?PHP exit;?>	2014-03-08 16:56:00		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:56:00		192.168.13.23	29970	/plugin/mobile/do_getnews.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394267160'
<?PHP exit;?>	2014-03-08 16:56:00		192.168.13.23	29970	/plugin/mobile/do_getnews.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394268960', '192168013')
<?PHP exit;?>	2014-03-08 16:56:00		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 16:56:00		192.168.13.23	29970	/plugin/mobile/do_getnews.php	UPDATE ihome_space SET lastlogin='1394268960',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:56:00		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:56:00		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:56:00		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-08 16:56:00		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.dateline,bf.message FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '18054' ORDER BY b.dateline DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 16:56:00		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('18054')
<?PHP exit;?>	2014-03-08 16:56:05		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:56:05		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394267165'
<?PHP exit;?>	2014-03-08 16:56:05		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394268965', '192168013')
<?PHP exit;?>	2014-03-08 16:56:05		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 16:56:05		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	UPDATE ihome_space SET lastlogin='1394268965',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:56:05		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 16:56:05		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 16:56:05		192.168.13.23	29970	/plugin/mobile/do_getmygroups.php	SELECT main.*,mt.* FROM ihome_tagspace main   				LEFT JOIN ihome_mtag mt ON mt.tagid=main.tagid  				WHERE main.uid='29970' ORDER BY mt.threadnum DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 17:11:30		192.168.12.79	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='10005042' and password=md5(concat('c7b5efa6c641848dbe98b009094ef97e',salt))
<?PHP exit;?>	2014-03-08 17:11:30		192.168.12.79	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:11:30		192.168.12.79	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='21628' OR lastactivity<'1394268090'
<?PHP exit;?>	2014-03-08 17:11:30		192.168.12.79	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('21628', '10005042', 'c7b5efa6c641848dbe98b009094ef97e', '1394269890', '192168012')
<?PHP exit;?>	2014-03-08 17:11:30		192.168.12.79	21628	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='21628' AND rid='10'
<?PHP exit;?>	2014-03-08 17:11:30		192.168.12.79	21628	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394269890',ip='192168012' WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:11:30		192.168.12.79	21628	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:11:30		192.168.12.79	21628	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='21628' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:11:31		192.168.12.79	21628	/plugin/mobile/do_getuserinfo.php	SELECT password FROM ihome_member WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:11:31		192.168.12.79	21628	/plugin/mobile/do_getuserinfo.php	DELETE FROM ihome_session WHERE uid='21628' OR lastactivity<'1394268091'
<?PHP exit;?>	2014-03-08 17:11:31		192.168.12.79	21628	/plugin/mobile/do_getuserinfo.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('21628', '10005042', 'c7b5efa6c641848dbe98b009094ef97e', '1394269891', '192168012')
<?PHP exit;?>	2014-03-08 17:11:31		192.168.12.79	21628	/plugin/mobile/do_getuserinfo.php	SELECT * FROM ihome_creditlog WHERE uid='21628' AND rid='10'
<?PHP exit;?>	2014-03-08 17:11:31		192.168.12.79	21628	/plugin/mobile/do_getuserinfo.php	UPDATE ihome_space SET lastlogin='1394269891',ip='192168012' WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:11:31		192.168.12.79	21628	/plugin/mobile/do_getuserinfo.php	SELECT * FROM ihome_spacelog WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:11:31		192.168.12.79	21628	/plugin/mobile/do_getuserinfo.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='21628' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:11:31		192.168.12.79	21628	/plugin/mobile/do_getuserinfo.php	SELECT s.uid,s.name,ug.grouptitle,sf.note,s.friendnum ,s.threadnum,s.blognum,sf.privacy FROM ihome_space s   				, ihome_spacefield sf ,ihome_usergroup ug where s.uid=sf.uid and s.groupid=ug.gid                  and s.uid =21628
<?PHP exit;?>	2014-03-08 17:11:31		192.168.12.79	21628	/plugin/mobile/do_getuserinfo.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('21628')
<?PHP exit;?>	2014-03-08 17:11:31		192.168.12.79	21628	/plugin/mobile/do_getuserinfo.php	SELECT  friend  FROM  ihome_spacefield  WHERE uid = 21628
<?PHP exit;?>	2014-03-08 17:11:33		192.168.12.79	21628	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:11:33		192.168.12.79	21628	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='21628' OR lastactivity<'1394268093'
<?PHP exit;?>	2014-03-08 17:11:33		192.168.12.79	21628	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('21628', '10005042', 'c7b5efa6c641848dbe98b009094ef97e', '1394269893', '192168012')
<?PHP exit;?>	2014-03-08 17:11:33		192.168.12.79	21628	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='21628' AND rid='10'
<?PHP exit;?>	2014-03-08 17:11:33		192.168.12.79	21628	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394269893',ip='192168012' WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:11:33		192.168.12.79	21628	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:11:33		192.168.12.79	21628	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='21628' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:11:33		192.168.12.79	21628	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 21628 and new = 1
<?PHP exit;?>	2014-03-08 17:12:02		192.168.12.79	21628	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:12:02		192.168.12.79	21628	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='21628' OR lastactivity<'1394268122'
<?PHP exit;?>	2014-03-08 17:12:02		192.168.12.79	21628	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('21628', '10005042', 'c7b5efa6c641848dbe98b009094ef97e', '1394269922', '192168012')
<?PHP exit;?>	2014-03-08 17:12:02		192.168.12.79	21628	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='21628' AND rid='10'
<?PHP exit;?>	2014-03-08 17:12:02		192.168.12.79	21628	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394269922',ip='192168012' WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:12:02		192.168.12.79	21628	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:12:02		192.168.12.79	21628	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='21628' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:12:02		192.168.12.79	21628	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65132 LIMIT 0,20
<?PHP exit;?>	2014-03-08 17:12:02		192.168.12.79	21628	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('8555')
<?PHP exit;?>	2014-03-08 17:12:02		192.168.12.79	21628	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:12:02		192.168.12.79	21628	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='21628' OR lastactivity<'1394268122'
<?PHP exit;?>	2014-03-08 17:12:02		192.168.12.79	21628	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('21628', '10005042', 'c7b5efa6c641848dbe98b009094ef97e', '1394269922', '192168012')
<?PHP exit;?>	2014-03-08 17:12:02		192.168.12.79	21628	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='21628' AND rid='10'
<?PHP exit;?>	2014-03-08 17:12:02		192.168.12.79	21628	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394269922',ip='192168012' WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:12:02		192.168.12.79	21628	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:12:02		192.168.12.79	21628	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='21628' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:12:02		192.168.12.79	21628	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='21628'
<?PHP exit;?>	2014-03-08 17:12:19		192.168.12.79	21628	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:12:19		192.168.12.79	21628	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='21628' OR lastactivity<'1394268139'
<?PHP exit;?>	2014-03-08 17:12:19		192.168.12.79	21628	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('21628', '10005042', 'c7b5efa6c641848dbe98b009094ef97e', '1394269939', '192168012')
<?PHP exit;?>	2014-03-08 17:12:19		192.168.12.79	21628	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='21628' AND rid='10'
<?PHP exit;?>	2014-03-08 17:12:19		192.168.12.79	21628	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394269939',ip='192168012' WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:12:19		192.168.12.79	21628	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:12:19		192.168.12.79	21628	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='21628' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:12:19		192.168.12.79	21628	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='21628'
<?PHP exit;?>	2014-03-08 17:12:23		192.168.12.79	21628	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:12:23		192.168.12.79	21628	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='21628' OR lastactivity<'1394268143'
<?PHP exit;?>	2014-03-08 17:12:23		192.168.12.79	21628	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('21628', '10005042', 'c7b5efa6c641848dbe98b009094ef97e', '1394269943', '192168012')
<?PHP exit;?>	2014-03-08 17:12:23		192.168.12.79	21628	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='21628' AND rid='10'
<?PHP exit;?>	2014-03-08 17:12:23		192.168.12.79	21628	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394269943',ip='192168012' WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:12:23		192.168.12.79	21628	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:12:23		192.168.12.79	21628	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='21628' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:12:23		192.168.12.79	21628	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65132 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 17:12:23		192.168.12.79	21628	/plugin/mobile/do_getsharereplylist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('24962','23650')
<?PHP exit;?>	2014-03-08 17:12:23		192.168.12.79	21628	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:12:23		192.168.12.79	21628	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='21628' OR lastactivity<'1394268143'
<?PHP exit;?>	2014-03-08 17:12:23		192.168.12.79	21628	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('21628', '10005042', 'c7b5efa6c641848dbe98b009094ef97e', '1394269943', '192168012')
<?PHP exit;?>	2014-03-08 17:12:23		192.168.12.79	21628	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='21628' AND rid='10'
<?PHP exit;?>	2014-03-08 17:12:23		192.168.12.79	21628	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394269943',ip='192168012' WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:12:23		192.168.12.79	21628	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='21628'
<?PHP exit;?>	2014-03-08 17:12:23		192.168.12.79	21628	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='21628' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:12:23		192.168.12.79	21628	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='21628'
<?PHP exit;?>	2014-03-08 17:12:23		192.168.12.79	21628	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43660
<?PHP exit;?>	2014-03-08 17:26:52		172.16.58.143	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='1204195860@qq.com' and password=md5(concat('10e298ae395a6fe5a5ad7035ea1e24f0',salt))
<?PHP exit;?>	2014-03-08 17:26:52		172.16.58.143	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:26:52		172.16.58.143	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269012'
<?PHP exit;?>	2014-03-08 17:26:52		172.16.58.143	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394270812', '172016058')
<?PHP exit;?>	2014-03-08 17:26:52		172.16.58.143	24204	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:26:52		172.16.58.143	24204	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394270812',credit='3',experience='5' WHERE clid='111281'
<?PHP exit;?>	2014-03-08 17:26:52		172.16.58.143	24204	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394270812',ip='172016058',credit=credit+3,experience=experience+5 WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:26:52		172.16.58.143	24204	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:26:52		172.16.58.143	24204	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:26:52		172.16.58.143	24204	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('24204', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 17:26:52		172.16.58.143	24204	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 17:26:52		172.16.58.143	24204	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 17:26:54		172.16.58.143	24204	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:26:54		172.16.58.143	24204	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269014'
<?PHP exit;?>	2014-03-08 17:26:54		172.16.58.143	24204	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394270814', '172016058')
<?PHP exit;?>	2014-03-08 17:26:54		172.16.58.143	24204	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:26:54		172.16.58.143	24204	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394270814',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:26:54		172.16.58.143	24204	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:26:54		172.16.58.143	24204	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:26:54		172.16.58.143	24204	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 24204 and new = 1
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269041'
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394270841', '172016058')
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394270841',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65113 LIMIT 0,20
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('24881')
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269041'
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394270841', '172016058')
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394270841',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269041'
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394270841', '172016058')
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394270841',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:27:21		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65113 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 17:27:26		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:27:26		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269046'
<?PHP exit;?>	2014-03-08 17:27:26		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394270846', '172016058')
<?PHP exit;?>	2014-03-08 17:27:26		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:27:26		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394270846',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:27:26		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:27:26		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:27:26		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:27:26		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:27:26		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269046'
<?PHP exit;?>	2014-03-08 17:27:26		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394270846', '172016058')
<?PHP exit;?>	2014-03-08 17:27:26		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:27:26		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394270846',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:27:26		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:27:26		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:27:26		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:27:26		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43661
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269124'
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394270924', '172016058')
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394270924',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65113 LIMIT 0,20
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('24881')
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269124'
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394270924', '172016058')
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394270924',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269124'
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394270924', '172016058')
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394270924',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:28:44		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65113 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 17:28:45		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:28:45		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269125'
<?PHP exit;?>	2014-03-08 17:28:45		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394270925', '172016058')
<?PHP exit;?>	2014-03-08 17:28:45		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:28:45		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394270925',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:28:45		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:28:45		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:28:45		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:28:45		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:28:45		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269125'
<?PHP exit;?>	2014-03-08 17:28:45		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394270925', '172016058')
<?PHP exit;?>	2014-03-08 17:28:45		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:28:45		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394270925',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:28:45		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:28:45		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:28:45		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:28:45		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43661
<?PHP exit;?>	2014-03-08 17:29:34		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:29:34		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269174'
<?PHP exit;?>	2014-03-08 17:29:34		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394270974', '172016058')
<?PHP exit;?>	2014-03-08 17:29:34		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:29:34		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394270974',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:29:34		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:29:34		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:29:34		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:29:34		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:29:34		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269174'
<?PHP exit;?>	2014-03-08 17:29:34		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394270974', '172016058')
<?PHP exit;?>	2014-03-08 17:29:34		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:29:34		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394270974',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:29:34		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:29:34		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:29:34		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:29:34		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43682
<?PHP exit;?>	2014-03-08 17:29:48		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:29:48		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269188'
<?PHP exit;?>	2014-03-08 17:29:48		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394270988', '172016058')
<?PHP exit;?>	2014-03-08 17:29:48		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:29:48		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394270988',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:29:48		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:29:48		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:29:48		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:29:48		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:29:48		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269188'
<?PHP exit;?>	2014-03-08 17:29:48		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394270988', '172016058')
<?PHP exit;?>	2014-03-08 17:29:48		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:29:48		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394270988',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:29:48		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:29:48		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:29:48		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:29:48		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43682
<?PHP exit;?>	2014-03-08 17:31:23		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:31:23		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269283'
<?PHP exit;?>	2014-03-08 17:31:23		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394271083', '172016058')
<?PHP exit;?>	2014-03-08 17:31:23		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:31:23		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394271083',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:31:23		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:31:23		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:31:23		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:31:23		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:31:23		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269283'
<?PHP exit;?>	2014-03-08 17:31:23		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394271083', '172016058')
<?PHP exit;?>	2014-03-08 17:31:23		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:31:23		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394271083',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:31:23		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:31:23		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:31:23		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:31:23		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43682
<?PHP exit;?>	2014-03-08 17:31:34		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:31:34		172.16.58.143	24204	/plugin/mobile/do_addshare.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269294'
<?PHP exit;?>	2014-03-08 17:31:34		172.16.58.143	24204	/plugin/mobile/do_addshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394271094', '172016058')
<?PHP exit;?>	2014-03-08 17:31:34		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:31:34		172.16.58.143	24204	/plugin/mobile/do_addshare.php	UPDATE ihome_space SET lastlogin='1394271094',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:31:34		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:31:34		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:31:34		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT b.*,bf.message,bf.hotuser FROM ihome_blog b  				LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  				WHERE b.blogid='43682'
<?PHP exit;?>	2014-03-08 17:31:34		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('22180')
<?PHP exit;?>	2014-03-08 17:31:34		172.16.58.143	24204	/plugin/mobile/do_addshare.php	INSERT INTO ihome_share (`title_template`, `body_template`, `body_data`, `body_general`, `type`, `id`, `uid`, `username`, `dateline`, `topicid`, `fromdevice`) VALUES ('分享了一篇日志', '<b>{subject}</b><br>{username}<br>{message}', 'a:3:{s:7:\"subject\";s:124:\"<a href=\"space.php?uid=22180&do=blog&id=43682\">【班团建设】1315大班举行大一第二学期第一次班委例会</a>\";s:8:\"username\";s:53:\"<a href=\"space.php?uid=22180\">宇航学院2013级</a>\";s:7:\"message\";s:192:\"1315    大班举行大一第二学期第一次班委例会               2014   年   3   月   2   日晚上，洋哥、博导、   1315   大班全体大班委、小班长、小班团支书\";}', '！', 'blog', '43682', '24204', '1204195860@qq.com', '1394271094', '0', '')
<?PHP exit;?>	2014-03-08 17:31:34		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 17:31:34		172.16.58.143	24204	/plugin/mobile/do_addshare.php	UPDATE ihome_stat SET `share`=`share`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 17:31:34		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT * FROM ihome_share WHERE sid='65160'
<?PHP exit;?>	2014-03-08 17:31:34		172.16.58.143	24204	/plugin/mobile/do_addshare.php	INSERT INTO ihome_feed (`icon`, `id`, `idtype`, `uid`, `username`, `dateline`, `hot`, `title_template`, `body_template`, `body_data`, `body_general`, `image_1`, `image_1_link`, `appid`, `title_data`, `hash_template`, `hash_data`, `fromdevice`) VALUES ('share', '65160', 'sid', '24204', '1204195860@qq.c', '1394271094', '0', '{actor} 分享了一篇日志', '<b>{subject}</b><br>{username}<br>{message}', 'a:3:{s:7:\"subject\";s:124:\"<a href=\"space.php?uid=22180&do=blog&id=43682\">【班团建设】1315大班举行大一第二学期第一次班委例会</a>\";s:8:\"username\";s:53:\"<a href=\"space.php?uid=22180\">宇航学院2013级</a>\";s:7:\"message\";s:192:\"1315    大班举行大一第二学期第一次班委例会               2014   年   3   月   2   日晚上，洋哥、博导、   1315   大班全体大班委、小班长、小班团支书\";}', '！', '', '', '1', 'N;', '27cf8a1dd4dd271c4a3232bdccc10fbf', 'fb7b15fea679b357337c9c1093f7eedc', '')
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269309'
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394271109', '172016058')
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394271109',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65089 LIMIT 0,20
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('90')
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269309'
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394271109', '172016058')
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394271109',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269309'
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394271109', '172016058')
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394271109',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:31:49		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65089 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 17:32:01		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:32:01		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269321'
<?PHP exit;?>	2014-03-08 17:32:01		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394271121', '172016058')
<?PHP exit;?>	2014-03-08 17:32:01		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:32:01		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394271121',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:32:01		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:32:01		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:32:01		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:32:01		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:32:01		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269321'
<?PHP exit;?>	2014-03-08 17:32:01		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394271121', '172016058')
<?PHP exit;?>	2014-03-08 17:32:01		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:32:01		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394271121',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:32:01		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:32:01		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:32:01		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:32:01		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43674
<?PHP exit;?>	2014-03-08 17:32:35		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:32:35		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269355'
<?PHP exit;?>	2014-03-08 17:32:35		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394271155', '172016058')
<?PHP exit;?>	2014-03-08 17:32:35		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:32:35		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394271155',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:32:35		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:32:35		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:32:35		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:32:35		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:32:35		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269355'
<?PHP exit;?>	2014-03-08 17:32:35		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394271155', '172016058')
<?PHP exit;?>	2014-03-08 17:32:35		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:32:35		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394271155',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:32:35		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:32:35		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:32:35		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:32:35		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43668
<?PHP exit;?>	2014-03-08 17:32:51		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:32:51		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269371'
<?PHP exit;?>	2014-03-08 17:32:51		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394271171', '172016058')
<?PHP exit;?>	2014-03-08 17:32:51		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:32:51		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394271171',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:32:51		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:32:51		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:32:51		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:32:51		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:32:51		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269371'
<?PHP exit;?>	2014-03-08 17:32:51		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394271171', '172016058')
<?PHP exit;?>	2014-03-08 17:32:51		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:32:51		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394271171',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:32:51		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:32:51		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:32:51		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:32:51		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43668
<?PHP exit;?>	2014-03-08 17:37:40		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:37:40		172.16.58.143	24204	/plugin/mobile/do_addshare.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269660'
<?PHP exit;?>	2014-03-08 17:37:40		172.16.58.143	24204	/plugin/mobile/do_addshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394271460', '172016058')
<?PHP exit;?>	2014-03-08 17:37:40		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:37:40		172.16.58.143	24204	/plugin/mobile/do_addshare.php	UPDATE ihome_space SET lastlogin='1394271460',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:37:40		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:37:40		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:37:40		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT b.*,bf.message,bf.hotuser FROM ihome_blog b  				LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  				WHERE b.blogid='43668'
<?PHP exit;?>	2014-03-08 17:37:40		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('2619')
<?PHP exit;?>	2014-03-08 17:37:40		172.16.58.143	24204	/plugin/mobile/do_addshare.php	INSERT INTO ihome_share (`title_template`, `body_template`, `body_data`, `image`, `image_link`, `body_general`, `type`, `id`, `uid`, `username`, `dateline`, `topicid`, `fromdevice`) VALUES ('分享了一篇日志', '<b>{subject}</b><br>{username}<br>{message}', 'a:3:{s:7:\"subject\";s:71:\"<a href=\"space.php?uid=2619&do=blog&id=43668\">尊严是这样写的</a>\";s:8:\"username\";s:42:\"<a href=\"space.php?uid=2619\">陈祖永</a>\";s:7:\"message\";s:226:\"&nbsp; &nbsp; &nbsp; 这么久，我总结了：说给我自己，以及所有的女孩。虽然生活让我们不甘心，但是请记住，只有自己才能给予自己所想要的满分。 (  要明白自己想要什么，\";}', 'attachment/201403/7/2619_1394196463sFlF.jpg.thumb.jpg', 'space.php?uid=2619&do=blog&id=43668', '分享', 'blog', '43668', '24204', '1204195860@qq.com', '1394271460', '0', '')
<?PHP exit;?>	2014-03-08 17:37:40		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 17:37:40		172.16.58.143	24204	/plugin/mobile/do_addshare.php	UPDATE ihome_stat SET `share`=`share`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 17:37:40		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT * FROM ihome_share WHERE sid='65162'
<?PHP exit;?>	2014-03-08 17:37:40		172.16.58.143	24204	/plugin/mobile/do_addshare.php	INSERT INTO ihome_feed (`icon`, `id`, `idtype`, `uid`, `username`, `dateline`, `hot`, `title_template`, `body_template`, `body_data`, `body_general`, `image_1`, `image_1_link`, `appid`, `title_data`, `hash_template`, `hash_data`, `fromdevice`) VALUES ('share', '65162', 'sid', '24204', '1204195860@qq.c', '1394271460', '0', '{actor} 分享了一篇日志', '<b>{subject}</b><br>{username}<br>{message}', 'a:3:{s:7:\"subject\";s:71:\"<a href=\"space.php?uid=2619&do=blog&id=43668\">尊严是这样写的</a>\";s:8:\"username\";s:42:\"<a href=\"space.php?uid=2619\">陈祖永</a>\";s:7:\"message\";s:226:\"&nbsp; &nbsp; &nbsp; 这么久，我总结了：说给我自己，以及所有的女孩。虽然生活让我们不甘心，但是请记住，只有自己才能给予自己所想要的满分。 (  要明白自己想要什么，\";}', '分享', 'attachment/201403/7/2619_1394196463sFlF.jpg.thumb.jpg', 'space.php?uid=2619&do=blog&id=43668', '1', 'N;', '27cf8a1dd4dd271c4a3232bdccc10fbf', 'e228d150af0dacc778df96684c37a67b', '')
<?PHP exit;?>	2014-03-08 17:37:47		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:37:47		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269667'
<?PHP exit;?>	2014-03-08 17:37:47		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394271467', '172016058')
<?PHP exit;?>	2014-03-08 17:37:47		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:37:47		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394271467',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:37:47		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:37:47		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:37:47		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:37:47		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:37:47		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269667'
<?PHP exit;?>	2014-03-08 17:37:47		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394271467', '172016058')
<?PHP exit;?>	2014-03-08 17:37:47		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:37:47		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394271467',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:37:47		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:37:47		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:37:47		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:37:47		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43667
<?PHP exit;?>	2014-03-08 17:37:50		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:37:50		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269670'
<?PHP exit;?>	2014-03-08 17:37:50		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394271470', '172016058')
<?PHP exit;?>	2014-03-08 17:37:50		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:37:50		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394271470',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:37:50		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:37:50		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:37:50		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:37:50		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:37:50		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394269670'
<?PHP exit;?>	2014-03-08 17:37:50		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394271470', '172016058')
<?PHP exit;?>	2014-03-08 17:37:50		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:37:50		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394271470',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:37:50		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:37:50		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:37:50		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:37:50		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43667
<?PHP exit;?>	2014-03-08 17:49:00		117.136.0.235	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='sy1305' and password=md5(concat('1adbb3178591fd5bb0c248518f39bf6d',salt))
<?PHP exit;?>	2014-03-08 17:49:00		117.136.0.235	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='26159'
<?PHP exit;?>	2014-03-08 17:49:00		117.136.0.235	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='26159' OR lastactivity<'1394270340'
<?PHP exit;?>	2014-03-08 17:49:00		117.136.0.235	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('26159', 'sy1305', '56c400e2665c816eb8d5d9de444ddb85', '1394272140', '117136000')
<?PHP exit;?>	2014-03-08 17:49:00		117.136.0.235	26159	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='26159' AND rid='10'
<?PHP exit;?>	2014-03-08 17:49:00		117.136.0.235	26159	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394272140',credit='3',experience='5' WHERE clid='129126'
<?PHP exit;?>	2014-03-08 17:49:00		117.136.0.235	26159	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394272140',ip='117136000',credit=credit+3,experience=experience+5 WHERE uid='26159'
<?PHP exit;?>	2014-03-08 17:49:00		117.136.0.235	26159	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='26159'
<?PHP exit;?>	2014-03-08 17:49:00		117.136.0.235	26159	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='26159' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:49:00		117.136.0.235	26159	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('26159', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 17:49:00		117.136.0.235	26159	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 17:49:00		117.136.0.235	26159	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 17:49:09		117.136.0.235	26159	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='26159'
<?PHP exit;?>	2014-03-08 17:49:09		117.136.0.235	26159	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='26159' OR lastactivity<'1394270349'
<?PHP exit;?>	2014-03-08 17:49:09		117.136.0.235	26159	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('26159', 'sy1305', '56c400e2665c816eb8d5d9de444ddb85', '1394272149', '117136000')
<?PHP exit;?>	2014-03-08 17:49:09		117.136.0.235	26159	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='26159' AND rid='10'
<?PHP exit;?>	2014-03-08 17:49:09		117.136.0.235	26159	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394272149',ip='117136000' WHERE uid='26159'
<?PHP exit;?>	2014-03-08 17:49:09		117.136.0.235	26159	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='26159'
<?PHP exit;?>	2014-03-08 17:49:09		117.136.0.235	26159	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='26159' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:49:09		117.136.0.235	26159	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 26159 and new = 1
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394270432'
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394272232', '172016058')
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394272232',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65030 LIMIT 0,20
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('2619')
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394270432'
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394272232', '172016058')
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394272232',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394270432'
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394272232', '172016058')
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394272232',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:50:32		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65030 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394270437'
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394272237', '172016058')
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394272237',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65030 LIMIT 0,20
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('2619')
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394270437'
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394272237', '172016058')
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394272237',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394270437'
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394272237', '172016058')
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394272237',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:50:37		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65030 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394270817'
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394272617', '172016058')
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394272617',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=64917 LIMIT 0,20
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('15996')
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394270817'
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394272617', '172016058')
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394272617',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394270817'
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394272617', '172016058')
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394272617',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:56:57		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=64917 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394270821'
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394272621', '172016058')
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394272621',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=64917 LIMIT 0,20
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('15996')
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394270821'
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394272621', '172016058')
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394272621',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394270821'
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394272621', '172016058')
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394272621',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:57:01		172.16.58.143	24204	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=64917 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 17:57:09		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:57:09		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394270829'
<?PHP exit;?>	2014-03-08 17:57:09		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394272629', '172016058')
<?PHP exit;?>	2014-03-08 17:57:09		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:57:09		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394272629',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:57:09		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:57:09		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:57:09		172.16.58.143	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:57:09		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:57:09		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394270829'
<?PHP exit;?>	2014-03-08 17:57:09		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394272629', '172016058')
<?PHP exit;?>	2014-03-08 17:57:09		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 17:57:09		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394272629',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:57:09		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 17:57:09		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 17:57:09		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 17:57:09		172.16.58.143	24204	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43620
<?PHP exit;?>	2014-03-08 18:00:13		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 18:00:13		172.16.58.143	24204	/plugin/mobile/do_addshare.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394271013'
<?PHP exit;?>	2014-03-08 18:00:13		172.16.58.143	24204	/plugin/mobile/do_addshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394272813', '172016058')
<?PHP exit;?>	2014-03-08 18:00:13		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 18:00:13		172.16.58.143	24204	/plugin/mobile/do_addshare.php	UPDATE ihome_space SET lastlogin='1394272813',ip='172016058' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 18:00:13		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 18:00:13		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 18:00:13		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT b.*,bf.message,bf.hotuser FROM ihome_blog b  				LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  				WHERE b.blogid='43620'
<?PHP exit;?>	2014-03-08 18:00:13		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('17201')
<?PHP exit;?>	2014-03-08 18:00:13		172.16.58.143	24204	/plugin/mobile/do_addshare.php	INSERT INTO ihome_share (`title_template`, `body_template`, `body_data`, `body_general`, `type`, `id`, `uid`, `username`, `dateline`, `topicid`, `fromdevice`) VALUES ('分享了一篇日志', '<b>{subject}</b><br>{username}<br>{message}', 'a:3:{s:7:\"subject\";s:87:\"<a href=\"space.php?uid=17201&do=blog&id=43620\">导师不会告诉你的十条真理</a>\";s:8:\"username\";s:46:\"<a href=\"space.php?uid=17201\">科研经验</a>\";s:7:\"message\";s:222:\"关于研究生教育方面的问题一直都是讨论的焦点。科学网上总有一些导师写如何教育学生，也总有一些学生会写自己对导师的看法。前两天看到篇有意思也没意思的文章\";}', '分享', 'blog', '43620', '24204', '1204195860@qq.com', '1394272813', '0', '')
<?PHP exit;?>	2014-03-08 18:00:13		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 18:00:13		172.16.58.143	24204	/plugin/mobile/do_addshare.php	UPDATE ihome_stat SET `share`=`share`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 18:00:13		172.16.58.143	24204	/plugin/mobile/do_addshare.php	SELECT * FROM ihome_share WHERE sid='65165'
<?PHP exit;?>	2014-03-08 18:00:13		172.16.58.143	24204	/plugin/mobile/do_addshare.php	INSERT INTO ihome_feed (`icon`, `id`, `idtype`, `uid`, `username`, `dateline`, `hot`, `title_template`, `body_template`, `body_data`, `body_general`, `image_1`, `image_1_link`, `appid`, `title_data`, `hash_template`, `hash_data`, `fromdevice`) VALUES ('share', '65165', 'sid', '24204', '1204195860@qq.c', '1394272813', '0', '{actor} 分享了一篇日志', '<b>{subject}</b><br>{username}<br>{message}', 'a:3:{s:7:\"subject\";s:87:\"<a href=\"space.php?uid=17201&do=blog&id=43620\">导师不会告诉你的十条真理</a>\";s:8:\"username\";s:46:\"<a href=\"space.php?uid=17201\">科研经验</a>\";s:7:\"message\";s:222:\"关于研究生教育方面的问题一直都是讨论的焦点。科学网上总有一些导师写如何教育学生，也总有一些学生会写自己对导师的看法。前两天看到篇有意思也没意思的文章\";}', '分享', '', '', '1', 'N;', '27cf8a1dd4dd271c4a3232bdccc10fbf', 'd56b506b58404b90534eacf51d239de6', '')
<?PHP exit;?>	2014-03-08 18:28:47		114.242.249.137	24204	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 18:28:47		114.242.249.137	24204	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394272727'
<?PHP exit;?>	2014-03-08 18:28:47		114.242.249.137	24204	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394274527', '114242249')
<?PHP exit;?>	2014-03-08 18:28:47		114.242.249.137	24204	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 18:28:47		114.242.249.137	24204	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394274527',ip='114242249' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 18:28:47		114.242.249.137	24204	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 18:28:47		114.242.249.137	24204	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 18:28:47		114.242.249.137	24204	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 24204 and new = 1
<?PHP exit;?>	2014-03-08 18:29:38		114.242.249.137	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 18:29:38		114.242.249.137	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394272778'
<?PHP exit;?>	2014-03-08 18:29:38		114.242.249.137	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394274578', '114242249')
<?PHP exit;?>	2014-03-08 18:29:38		114.242.249.137	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 18:29:38		114.242.249.137	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394274578',ip='114242249' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 18:29:38		114.242.249.137	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 18:29:38		114.242.249.137	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 18:29:38		114.242.249.137	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 18:29:39		114.242.249.137	24204	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 18:29:39		114.242.249.137	24204	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394272779'
<?PHP exit;?>	2014-03-08 18:29:39		114.242.249.137	24204	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394274579', '114242249')
<?PHP exit;?>	2014-03-08 18:29:39		114.242.249.137	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 18:29:39		114.242.249.137	24204	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394274579',ip='114242249' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 18:29:39		114.242.249.137	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 18:29:39		114.242.249.137	24204	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 18:29:39		114.242.249.137	24204	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 18:29:39		114.242.249.137	24204	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43682
<?PHP exit;?>	2014-03-08 18:30:05		114.242.249.137	24204	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 18:30:05		114.242.249.137	24204	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394272805'
<?PHP exit;?>	2014-03-08 18:30:05		114.242.249.137	24204	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394274605', '114242249')
<?PHP exit;?>	2014-03-08 18:30:05		114.242.249.137	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 18:30:05		114.242.249.137	24204	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394274605',ip='114242249' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 18:30:05		114.242.249.137	24204	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 18:30:05		114.242.249.137	24204	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 18:30:05		114.242.249.137	24204	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 18:30:06		114.242.249.137	24204	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='24204'
<?PHP exit;?>	2014-03-08 18:30:06		114.242.249.137	24204	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='24204' OR lastactivity<'1394272806'
<?PHP exit;?>	2014-03-08 18:30:06		114.242.249.137	24204	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24204', '1204195860@qq.com', '02f08dad02f05739648108b66a0ce9c1', '1394274606', '114242249')
<?PHP exit;?>	2014-03-08 18:30:06		114.242.249.137	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24204' AND rid='10'
<?PHP exit;?>	2014-03-08 18:30:06		114.242.249.137	24204	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394274606',ip='114242249' WHERE uid='24204'
<?PHP exit;?>	2014-03-08 18:30:06		114.242.249.137	24204	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24204'
<?PHP exit;?>	2014-03-08 18:30:06		114.242.249.137	24204	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24204' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 18:30:06		114.242.249.137	24204	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24204'
<?PHP exit;?>	2014-03-08 18:30:06		114.242.249.137	24204	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43682
<?PHP exit;?>	2014-03-08 18:47:23		218.240.29.254	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='11091001' and password=md5(concat('0510534baae61872e109757163c2c6a7',salt))
<?PHP exit;?>	2014-03-08 18:47:23		218.240.29.254	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='5865'
<?PHP exit;?>	2014-03-08 18:47:23		218.240.29.254	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='5865' OR lastactivity<'1394273843'
<?PHP exit;?>	2014-03-08 18:47:23		218.240.29.254	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5865', '11091001', '0510534baae61872e109757163c2c6a7', '1394275643', '218240029')
<?PHP exit;?>	2014-03-08 18:47:23		218.240.29.254	5865	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='5865' AND rid='10'
<?PHP exit;?>	2014-03-08 18:47:23		218.240.29.254	5865	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394275643',ip='218240029' WHERE uid='5865'
<?PHP exit;?>	2014-03-08 18:47:23		218.240.29.254	5865	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='5865'
<?PHP exit;?>	2014-03-08 18:47:23		218.240.29.254	5865	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5865' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 18:47:26		218.240.29.254	5865	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='5865'
<?PHP exit;?>	2014-03-08 18:47:26		218.240.29.254	5865	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='5865' OR lastactivity<'1394273846'
<?PHP exit;?>	2014-03-08 18:47:26		218.240.29.254	5865	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5865', '11091001', '0510534baae61872e109757163c2c6a7', '1394275646', '218240029')
<?PHP exit;?>	2014-03-08 18:47:26		218.240.29.254	5865	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='5865' AND rid='10'
<?PHP exit;?>	2014-03-08 18:47:26		218.240.29.254	5865	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394275646',ip='218240029' WHERE uid='5865'
<?PHP exit;?>	2014-03-08 18:47:26		218.240.29.254	5865	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='5865'
<?PHP exit;?>	2014-03-08 18:47:26		218.240.29.254	5865	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5865' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 18:47:26		218.240.29.254	5865	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 5865 and new = 1
<?PHP exit;?>	2014-03-08 18:56:03		192.168.12.177	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='11061023' and password=md5(concat('b1747e6110ccd5161dd24e0f66d56bed',salt))
<?PHP exit;?>	2014-03-08 18:56:03		192.168.12.177	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='13248'
<?PHP exit;?>	2014-03-08 18:56:03		192.168.12.177	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='13248' OR lastactivity<'1394274363'
<?PHP exit;?>	2014-03-08 18:56:03		192.168.12.177	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('13248', '11061023', '2a096807210f82259cf47292d63dbe94', '1394276163', '192168012')
<?PHP exit;?>	2014-03-08 18:56:03		192.168.12.177	13248	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='13248' AND rid='10'
<?PHP exit;?>	2014-03-08 18:56:03		192.168.12.177	13248	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394276163',credit='3',experience='5' WHERE clid='49462'
<?PHP exit;?>	2014-03-08 18:56:03		192.168.12.177	13248	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394276163',ip='192168012',credit=credit+3,experience=experience+5 WHERE uid='13248'
<?PHP exit;?>	2014-03-08 18:56:03		192.168.12.177	13248	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='13248'
<?PHP exit;?>	2014-03-08 18:56:03		192.168.12.177	13248	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='13248' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 18:56:03		192.168.12.177	13248	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('13248', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 18:56:03		192.168.12.177	13248	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 18:56:03		192.168.12.177	13248	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 18:56:04		192.168.12.177	13248	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='13248'
<?PHP exit;?>	2014-03-08 18:56:04		192.168.12.177	13248	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='13248' OR lastactivity<'1394274364'
<?PHP exit;?>	2014-03-08 18:56:04		192.168.12.177	13248	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('13248', '11061023', '2a096807210f82259cf47292d63dbe94', '1394276164', '192168012')
<?PHP exit;?>	2014-03-08 18:56:04		192.168.12.177	13248	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='13248' AND rid='10'
<?PHP exit;?>	2014-03-08 18:56:04		192.168.12.177	13248	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394276164',ip='192168012' WHERE uid='13248'
<?PHP exit;?>	2014-03-08 18:56:04		192.168.12.177	13248	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='13248'
<?PHP exit;?>	2014-03-08 18:56:04		192.168.12.177	13248	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='13248' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 18:56:04		192.168.12.177	13248	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 13248 and new = 1
<?PHP exit;?>	2014-03-08 18:56:13		192.168.12.177	13248	/plugin/mobile/do_getmygroups.php	SELECT password FROM ihome_member WHERE uid='13248'
<?PHP exit;?>	2014-03-08 18:56:13		192.168.12.177	13248	/plugin/mobile/do_getmygroups.php	DELETE FROM ihome_session WHERE uid='13248' OR lastactivity<'1394274373'
<?PHP exit;?>	2014-03-08 18:56:13		192.168.12.177	13248	/plugin/mobile/do_getmygroups.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('13248', '11061023', '2a096807210f82259cf47292d63dbe94', '1394276173', '192168012')
<?PHP exit;?>	2014-03-08 18:56:13		192.168.12.177	13248	/plugin/mobile/do_getmygroups.php	SELECT * FROM ihome_creditlog WHERE uid='13248' AND rid='10'
<?PHP exit;?>	2014-03-08 18:56:13		192.168.12.177	13248	/plugin/mobile/do_getmygroups.php	UPDATE ihome_space SET lastlogin='1394276173',ip='192168012' WHERE uid='13248'
<?PHP exit;?>	2014-03-08 18:56:13		192.168.12.177	13248	/plugin/mobile/do_getmygroups.php	SELECT * FROM ihome_spacelog WHERE uid='13248'
<?PHP exit;?>	2014-03-08 18:56:13		192.168.12.177	13248	/plugin/mobile/do_getmygroups.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='13248' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 18:56:13		192.168.12.177	13248	/plugin/mobile/do_getmygroups.php	SELECT main.*,mt.* FROM ihome_tagspace main   				LEFT JOIN ihome_mtag mt ON mt.tagid=main.tagid  				WHERE main.uid='13248' ORDER BY mt.threadnum DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 19:01:37		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 19:01:37		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394274697'
<?PHP exit;?>	2014-03-08 19:01:37		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394276497', '192168013')
<?PHP exit;?>	2014-03-08 19:01:37		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 19:01:37		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394276497',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 19:01:37		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 19:01:37		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 19:01:37		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 29970 and new = 1
<?PHP exit;?>	2014-03-08 19:01:42		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 19:01:42		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394274702'
<?PHP exit;?>	2014-03-08 19:01:42		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394276502', '192168013')
<?PHP exit;?>	2014-03-08 19:01:42		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 19:01:42		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394276502',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 19:01:42		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 19:01:42		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 19:01:42		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 90
<?PHP exit;?>	2014-03-08 19:01:42		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-08 19:01:42		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='29970' AND fuid='90' LIMIT 1
<?PHP exit;?>	2014-03-08 19:01:42		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='90' AND fuid='29970' LIMIT 1
<?PHP exit;?>	2014-03-08 19:01:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 19:01:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394274705'
<?PHP exit;?>	2014-03-08 19:01:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394276505', '192168013')
<?PHP exit;?>	2014-03-08 19:01:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 19:01:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394276505',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 19:01:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 19:01:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 19:01:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 23147
<?PHP exit;?>	2014-03-08 19:01:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-08 19:01:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='29970' AND fuid='23147' LIMIT 1
<?PHP exit;?>	2014-03-08 19:01:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='23147' AND fuid='29970' LIMIT 1
<?PHP exit;?>	2014-03-08 19:02:09		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-08 19:02:09		192.168.13.23	29970	/plugin/mobile/do_getnews.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394274729'
<?PHP exit;?>	2014-03-08 19:02:09		192.168.13.23	29970	/plugin/mobile/do_getnews.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394276529', '192168013')
<?PHP exit;?>	2014-03-08 19:02:09		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-08 19:02:09		192.168.13.23	29970	/plugin/mobile/do_getnews.php	UPDATE ihome_space SET lastlogin='1394276529',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-08 19:02:09		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-08 19:02:09		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 19:02:09		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-08 19:02:09		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.dateline,bf.message FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '18054' ORDER BY b.dateline DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 19:02:09		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('18054')
<?PHP exit;?>	2014-03-08 19:27:10		192.168.185.104	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='任亚雄' and password=md5(concat('c46c004218d0fffb4b563ab305c19673',salt))
<?PHP exit;?>	2014-03-08 19:27:10		192.168.185.104	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='1438'
<?PHP exit;?>	2014-03-08 19:27:10		192.168.185.104	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='1438' OR lastactivity<'1394276230'
<?PHP exit;?>	2014-03-08 19:27:10		192.168.185.104	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('1438', '任亚雄', 'f34bfed9a0d2ab318ff88a6898043a48', '1394278030', '192168185')
<?PHP exit;?>	2014-03-08 19:27:10		192.168.185.104	1438	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='1438' AND rid='10'
<?PHP exit;?>	2014-03-08 19:27:10		192.168.185.104	1438	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394278030',credit='3',experience='5' WHERE clid='5854'
<?PHP exit;?>	2014-03-08 19:27:10		192.168.185.104	1438	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394278030',ip='192168185',credit=credit+3,experience=experience+5 WHERE uid='1438'
<?PHP exit;?>	2014-03-08 19:27:10		192.168.185.104	1438	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='1438'
<?PHP exit;?>	2014-03-08 19:27:10		192.168.185.104	1438	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='1438' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 19:27:10		192.168.185.104	1438	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('1438', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 19:27:10		192.168.185.104	1438	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 19:27:10		192.168.185.104	1438	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 19:27:12		192.168.185.104	1438	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='1438'
<?PHP exit;?>	2014-03-08 19:27:12		192.168.185.104	1438	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='1438' OR lastactivity<'1394276232'
<?PHP exit;?>	2014-03-08 19:27:12		192.168.185.104	1438	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('1438', '任亚雄', 'f34bfed9a0d2ab318ff88a6898043a48', '1394278032', '192168185')
<?PHP exit;?>	2014-03-08 19:27:12		192.168.185.104	1438	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='1438' AND rid='10'
<?PHP exit;?>	2014-03-08 19:27:12		192.168.185.104	1438	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394278032',ip='192168185' WHERE uid='1438'
<?PHP exit;?>	2014-03-08 19:27:12		192.168.185.104	1438	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='1438'
<?PHP exit;?>	2014-03-08 19:27:12		192.168.185.104	1438	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='1438' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 19:27:12		192.168.185.104	1438	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 1438 and new = 1
<?PHP exit;?>	2014-03-08 19:46:16		114.242.248.102	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='1029160657@qq.com' and password=md5(concat('15ab184bbc8407514abab0d9cfb58575',salt))
<?PHP exit;?>	2014-03-08 19:46:16		114.242.248.102	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='2873'
<?PHP exit;?>	2014-03-08 19:46:16		114.242.248.102	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='2873' OR lastactivity<'1394277376'
<?PHP exit;?>	2014-03-08 19:46:16		114.242.248.102	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2873', '1029160657@qq.com', '15ab184bbc8407514abab0d9cfb58575', '1394279176', '114242248')
<?PHP exit;?>	2014-03-08 19:46:16		114.242.248.102	2873	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='2873' AND rid='10'
<?PHP exit;?>	2014-03-08 19:46:16		114.242.248.102	2873	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394279176',ip='114242248' WHERE uid='2873'
<?PHP exit;?>	2014-03-08 19:46:16		114.242.248.102	2873	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='2873'
<?PHP exit;?>	2014-03-08 19:46:16		114.242.248.102	2873	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2873' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 19:46:18		114.242.248.102	2873	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='2873'
<?PHP exit;?>	2014-03-08 19:46:18		114.242.248.102	2873	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='2873' OR lastactivity<'1394277378'
<?PHP exit;?>	2014-03-08 19:46:18		114.242.248.102	2873	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2873', '1029160657@qq.com', '15ab184bbc8407514abab0d9cfb58575', '1394279178', '114242248')
<?PHP exit;?>	2014-03-08 19:46:18		114.242.248.102	2873	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='2873' AND rid='10'
<?PHP exit;?>	2014-03-08 19:46:18		114.242.248.102	2873	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394279178',ip='114242248' WHERE uid='2873'
<?PHP exit;?>	2014-03-08 19:46:18		114.242.248.102	2873	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='2873'
<?PHP exit;?>	2014-03-08 19:46:18		114.242.248.102	2873	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2873' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 19:46:18		114.242.248.102	2873	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 2873 and new = 1
<?PHP exit;?>	2014-03-08 20:14:55		111.195.197.142	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='13061074' and password=md5(concat('62e51ff343af5bc0c89a06a8640cd01c',salt))
<?PHP exit;?>	2014-03-08 20:14:55		111.195.197.142	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='25377'
<?PHP exit;?>	2014-03-08 20:14:55		111.195.197.142	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='25377' OR lastactivity<'1394279095'
<?PHP exit;?>	2014-03-08 20:14:55		111.195.197.142	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25377', '13061074', '62e51ff343af5bc0c89a06a8640cd01c', '1394280895', '111195197')
<?PHP exit;?>	2014-03-08 20:14:55		111.195.197.142	25377	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='25377' AND rid='10'
<?PHP exit;?>	2014-03-08 20:14:55		111.195.197.142	25377	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394280895',credit='3',experience='5' WHERE clid='115540'
<?PHP exit;?>	2014-03-08 20:14:55		111.195.197.142	25377	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394280895',ip='111195197',credit=credit+3,experience=experience+5 WHERE uid='25377'
<?PHP exit;?>	2014-03-08 20:14:55		111.195.197.142	25377	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='25377'
<?PHP exit;?>	2014-03-08 20:14:55		111.195.197.142	25377	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25377' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 20:14:55		111.195.197.142	25377	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('25377', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 20:14:55		111.195.197.142	25377	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 20:14:55		111.195.197.142	25377	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 20:14:57		111.195.197.142	25377	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='25377'
<?PHP exit;?>	2014-03-08 20:14:57		111.195.197.142	25377	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='25377' OR lastactivity<'1394279097'
<?PHP exit;?>	2014-03-08 20:14:57		111.195.197.142	25377	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25377', '13061074', '62e51ff343af5bc0c89a06a8640cd01c', '1394280897', '111195197')
<?PHP exit;?>	2014-03-08 20:14:57		111.195.197.142	25377	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='25377' AND rid='10'
<?PHP exit;?>	2014-03-08 20:14:57		111.195.197.142	25377	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394280897',ip='111195197' WHERE uid='25377'
<?PHP exit;?>	2014-03-08 20:14:57		111.195.197.142	25377	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='25377'
<?PHP exit;?>	2014-03-08 20:14:57		111.195.197.142	25377	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25377' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 20:14:57		111.195.197.142	25377	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 25377 and new = 1
<?PHP exit;?>	2014-03-08 20:15:14		111.195.197.142	25377	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='25377'
<?PHP exit;?>	2014-03-08 20:15:14		111.195.197.142	25377	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='25377' OR lastactivity<'1394279114'
<?PHP exit;?>	2014-03-08 20:15:14		111.195.197.142	25377	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25377', '13061074', '62e51ff343af5bc0c89a06a8640cd01c', '1394280914', '111195197')
<?PHP exit;?>	2014-03-08 20:15:14		111.195.197.142	25377	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='25377' AND rid='10'
<?PHP exit;?>	2014-03-08 20:15:14		111.195.197.142	25377	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394280914',ip='111195197' WHERE uid='25377'
<?PHP exit;?>	2014-03-08 20:15:14		111.195.197.142	25377	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='25377'
<?PHP exit;?>	2014-03-08 20:15:14		111.195.197.142	25377	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25377' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 20:15:14		111.195.197.142	25377	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='25377'
<?PHP exit;?>	2014-03-08 20:15:14		111.195.197.142	25377	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='25377'
<?PHP exit;?>	2014-03-08 20:15:14		111.195.197.142	25377	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='25377' OR lastactivity<'1394279114'
<?PHP exit;?>	2014-03-08 20:15:14		111.195.197.142	25377	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25377', '13061074', '62e51ff343af5bc0c89a06a8640cd01c', '1394280914', '111195197')
<?PHP exit;?>	2014-03-08 20:15:14		111.195.197.142	25377	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='25377' AND rid='10'
<?PHP exit;?>	2014-03-08 20:15:14		111.195.197.142	25377	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394280914',ip='111195197' WHERE uid='25377'
<?PHP exit;?>	2014-03-08 20:15:14		111.195.197.142	25377	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='25377'
<?PHP exit;?>	2014-03-08 20:15:14		111.195.197.142	25377	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25377' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 20:15:14		111.195.197.142	25377	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='25377'
<?PHP exit;?>	2014-03-08 20:15:14		111.195.197.142	25377	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43654
<?PHP exit;?>	2014-03-08 20:15:35		111.195.197.142	25377	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='25377'
<?PHP exit;?>	2014-03-08 20:15:35		111.195.197.142	25377	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='25377' OR lastactivity<'1394279135'
<?PHP exit;?>	2014-03-08 20:15:35		111.195.197.142	25377	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25377', '13061074', '62e51ff343af5bc0c89a06a8640cd01c', '1394280935', '111195197')
<?PHP exit;?>	2014-03-08 20:15:35		111.195.197.142	25377	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='25377' AND rid='10'
<?PHP exit;?>	2014-03-08 20:15:35		111.195.197.142	25377	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394280935',ip='111195197' WHERE uid='25377'
<?PHP exit;?>	2014-03-08 20:15:35		111.195.197.142	25377	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='25377'
<?PHP exit;?>	2014-03-08 20:15:35		111.195.197.142	25377	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25377' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 20:15:35		111.195.197.142	25377	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='25377'
<?PHP exit;?>	2014-03-08 20:15:35		111.195.197.142	25377	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='25377'
<?PHP exit;?>	2014-03-08 20:15:35		111.195.197.142	25377	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='25377' OR lastactivity<'1394279135'
<?PHP exit;?>	2014-03-08 20:15:35		111.195.197.142	25377	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25377', '13061074', '62e51ff343af5bc0c89a06a8640cd01c', '1394280935', '111195197')
<?PHP exit;?>	2014-03-08 20:15:35		111.195.197.142	25377	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='25377' AND rid='10'
<?PHP exit;?>	2014-03-08 20:15:35		111.195.197.142	25377	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394280935',ip='111195197' WHERE uid='25377'
<?PHP exit;?>	2014-03-08 20:15:35		111.195.197.142	25377	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='25377'
<?PHP exit;?>	2014-03-08 20:15:35		111.195.197.142	25377	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25377' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 20:15:35		111.195.197.142	25377	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='25377'
<?PHP exit;?>	2014-03-08 20:15:35		111.195.197.142	25377	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43654
<?PHP exit;?>	2014-03-08 20:17:18		172.16.11.150	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='450794737@qq.com' and password=md5(concat('e777fb103b1ef04d1e7677eedaeaf2f0',salt))
<?PHP exit;?>	2014-03-08 20:17:18		172.16.11.150	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='25019'
<?PHP exit;?>	2014-03-08 20:17:18		172.16.11.150	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='25019' OR lastactivity<'1394279238'
<?PHP exit;?>	2014-03-08 20:17:18		172.16.11.150	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25019', '450794737@qq.com', 'e777fb103b1ef04d1e7677eedaeaf2f0', '1394281038', '172016011')
<?PHP exit;?>	2014-03-08 20:17:18		172.16.11.150	25019	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='25019' AND rid='10'
<?PHP exit;?>	2014-03-08 20:17:18		172.16.11.150	25019	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394281038',credit='3',experience='5' WHERE clid='114194'
<?PHP exit;?>	2014-03-08 20:17:18		172.16.11.150	25019	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394281038',ip='172016011',credit=credit+3,experience=experience+5 WHERE uid='25019'
<?PHP exit;?>	2014-03-08 20:17:18		172.16.11.150	25019	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='25019'
<?PHP exit;?>	2014-03-08 20:17:18		172.16.11.150	25019	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25019' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 20:17:18		172.16.11.150	25019	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('25019', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 20:17:18		172.16.11.150	25019	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 20:17:18		172.16.11.150	25019	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 20:17:20		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='25019'
<?PHP exit;?>	2014-03-08 20:17:20		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='25019' OR lastactivity<'1394279240'
<?PHP exit;?>	2014-03-08 20:17:20		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25019', '450794737@qq.com', 'e777fb103b1ef04d1e7677eedaeaf2f0', '1394281040', '172016011')
<?PHP exit;?>	2014-03-08 20:17:20		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='25019' AND rid='10'
<?PHP exit;?>	2014-03-08 20:17:20		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394281040',ip='172016011' WHERE uid='25019'
<?PHP exit;?>	2014-03-08 20:17:20		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='25019'
<?PHP exit;?>	2014-03-08 20:17:20		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25019' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 20:17:20		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 25019 and new = 1
<?PHP exit;?>	2014-03-08 20:26:07		172.16.7.62	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='xly_452628201@aliyun.com' and password=md5(concat('5ff9c81ca2d55716975d70abd69e0f2e',salt))
<?PHP exit;?>	2014-03-08 20:26:07		172.16.7.62	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='24414'
<?PHP exit;?>	2014-03-08 20:26:07		172.16.7.62	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='24414' OR lastactivity<'1394279767'
<?PHP exit;?>	2014-03-08 20:26:07		172.16.7.62	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24414', 'xly_452628201@aliyun.com', '57a94e1a447a8ee0ed6bce3669cd54d0', '1394281567', '172016007')
<?PHP exit;?>	2014-03-08 20:26:07		172.16.7.62	24414	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='24414' AND rid='10'
<?PHP exit;?>	2014-03-08 20:26:07		172.16.7.62	24414	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394281567',ip='172016007' WHERE uid='24414'
<?PHP exit;?>	2014-03-08 20:26:07		172.16.7.62	24414	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='24414'
<?PHP exit;?>	2014-03-08 20:26:07		172.16.7.62	24414	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24414' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 20:26:09		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='24414'
<?PHP exit;?>	2014-03-08 20:26:09		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='24414' OR lastactivity<'1394279769'
<?PHP exit;?>	2014-03-08 20:26:09		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24414', 'xly_452628201@aliyun.com', '57a94e1a447a8ee0ed6bce3669cd54d0', '1394281569', '172016007')
<?PHP exit;?>	2014-03-08 20:26:09		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='24414' AND rid='10'
<?PHP exit;?>	2014-03-08 20:26:09		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394281569',ip='172016007' WHERE uid='24414'
<?PHP exit;?>	2014-03-08 20:26:09		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='24414'
<?PHP exit;?>	2014-03-08 20:26:09		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24414' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 20:26:09		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 24414 and new = 1
<?PHP exit;?>	2014-03-08 20:54:15		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='25019'
<?PHP exit;?>	2014-03-08 20:54:15		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='25019' OR lastactivity<'1394281455'
<?PHP exit;?>	2014-03-08 20:54:15		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25019', '450794737@qq.com', 'e777fb103b1ef04d1e7677eedaeaf2f0', '1394283255', '172016011')
<?PHP exit;?>	2014-03-08 20:54:15		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='25019' AND rid='10'
<?PHP exit;?>	2014-03-08 20:54:15		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394283255',ip='172016011' WHERE uid='25019'
<?PHP exit;?>	2014-03-08 20:54:15		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='25019'
<?PHP exit;?>	2014-03-08 20:54:15		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25019' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 20:54:15		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 25019 and new = 1
<?PHP exit;?>	2014-03-08 20:54:17		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='25019'
<?PHP exit;?>	2014-03-08 20:54:17		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='25019' OR lastactivity<'1394281457'
<?PHP exit;?>	2014-03-08 20:54:17		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25019', '450794737@qq.com', 'e777fb103b1ef04d1e7677eedaeaf2f0', '1394283257', '172016011')
<?PHP exit;?>	2014-03-08 20:54:17		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='25019' AND rid='10'
<?PHP exit;?>	2014-03-08 20:54:17		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394283257',ip='172016011' WHERE uid='25019'
<?PHP exit;?>	2014-03-08 20:54:17		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='25019'
<?PHP exit;?>	2014-03-08 20:54:17		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25019' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 20:54:17		172.16.11.150	25019	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 25019 and new = 1
<?PHP exit;?>	2014-03-08 21:04:34		218.240.29.254	5865	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='5865'
<?PHP exit;?>	2014-03-08 21:04:34		218.240.29.254	5865	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='5865' OR lastactivity<'1394282074'
<?PHP exit;?>	2014-03-08 21:04:34		218.240.29.254	5865	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5865', '11091001', '0510534baae61872e109757163c2c6a7', '1394283874', '218240029')
<?PHP exit;?>	2014-03-08 21:04:34		218.240.29.254	5865	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='5865' AND rid='10'
<?PHP exit;?>	2014-03-08 21:04:34		218.240.29.254	5865	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394283874',ip='218240029' WHERE uid='5865'
<?PHP exit;?>	2014-03-08 21:04:34		218.240.29.254	5865	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='5865'
<?PHP exit;?>	2014-03-08 21:04:34		218.240.29.254	5865	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5865' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:04:34		218.240.29.254	5865	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 5865 and new = 1
<?PHP exit;?>	2014-03-08 21:14:11		172.16.6.42	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='tudelaty' and password=md5(concat('ea07ed882eca86a14a1736be1a08b7c8',salt))
<?PHP exit;?>	2014-03-08 21:14:11		172.16.6.42	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='23388'
<?PHP exit;?>	2014-03-08 21:14:11		172.16.6.42	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='23388' OR lastactivity<'1394282651'
<?PHP exit;?>	2014-03-08 21:14:11		172.16.6.42	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23388', 'tudelaty', 'ea07ed882eca86a14a1736be1a08b7c8', '1394284451', '172016006')
<?PHP exit;?>	2014-03-08 21:14:11		172.16.6.42	23388	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='23388' AND rid='10'
<?PHP exit;?>	2014-03-08 21:14:11		172.16.6.42	23388	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394284451',ip='172016006' WHERE uid='23388'
<?PHP exit;?>	2014-03-08 21:14:11		172.16.6.42	23388	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='23388'
<?PHP exit;?>	2014-03-08 21:14:11		172.16.6.42	23388	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23388' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:14:12		172.16.6.42	23388	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23388'
<?PHP exit;?>	2014-03-08 21:14:12		172.16.6.42	23388	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23388' OR lastactivity<'1394282652'
<?PHP exit;?>	2014-03-08 21:14:12		172.16.6.42	23388	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23388', 'tudelaty', 'ea07ed882eca86a14a1736be1a08b7c8', '1394284452', '172016006')
<?PHP exit;?>	2014-03-08 21:14:12		172.16.6.42	23388	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23388' AND rid='10'
<?PHP exit;?>	2014-03-08 21:14:12		172.16.6.42	23388	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394284452',ip='172016006' WHERE uid='23388'
<?PHP exit;?>	2014-03-08 21:14:12		172.16.6.42	23388	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23388'
<?PHP exit;?>	2014-03-08 21:14:12		172.16.6.42	23388	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23388' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:14:12		172.16.6.42	23388	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23388 and new = 1
<?PHP exit;?>	2014-03-08 21:22:21		172.31.251.181	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='1182039493@qq.com' and password=md5(concat('f11f5b31dc8217b7451d4321e6326dab',salt))
<?PHP exit;?>	2014-03-08 21:22:21		172.31.251.181	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:21		172.31.251.181	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283141'
<?PHP exit;?>	2014-03-08 21:22:21		172.31.251.181	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394284941', '172031251')
<?PHP exit;?>	2014-03-08 21:22:21		172.31.251.181	24548	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:22:21		172.31.251.181	24548	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394284941',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:21		172.31.251.181	24548	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:21		172.31.251.181	24548	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:22:23		172.31.251.181	24548	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:23		172.31.251.181	24548	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283143'
<?PHP exit;?>	2014-03-08 21:22:23		172.31.251.181	24548	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394284943', '172031251')
<?PHP exit;?>	2014-03-08 21:22:23		172.31.251.181	24548	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:22:23		172.31.251.181	24548	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394284943',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:23		172.31.251.181	24548	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:23		172.31.251.181	24548	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:22:23		172.31.251.181	24548	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 24548 and new = 1
<?PHP exit;?>	2014-03-08 21:22:24		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:24		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283144'
<?PHP exit;?>	2014-03-08 21:22:24		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394284944', '172031251')
<?PHP exit;?>	2014-03-08 21:22:24		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:22:24		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394284944',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:24		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:24		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:22:24		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-08 21:22:24		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:24		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283144'
<?PHP exit;?>	2014-03-08 21:22:24		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394284944', '172031251')
<?PHP exit;?>	2014-03-08 21:22:24		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:22:24		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394284944',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:24		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:24		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:22:24		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-08 21:22:24		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43669
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283166'
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394284966', '172031251')
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394284966',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=64229 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('17674')
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283166'
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394284966', '172031251')
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394284966',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=46875 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('983')
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283166'
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394284966', '172031251')
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394284966',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=64229 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:22:46		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('25233','22636')
<?PHP exit;?>	2014-03-08 21:22:50		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:50		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283170'
<?PHP exit;?>	2014-03-08 21:22:50		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394284970', '172031251')
<?PHP exit;?>	2014-03-08 21:22:50		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:22:50		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394284970',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:50		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:50		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:22:50		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=46983 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:22:50		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('17674')
<?PHP exit;?>	2014-03-08 21:22:50		172.31.251.181	24548	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:50		172.31.251.181	24548	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283170'
<?PHP exit;?>	2014-03-08 21:22:50		172.31.251.181	24548	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394284970', '172031251')
<?PHP exit;?>	2014-03-08 21:22:50		172.31.251.181	24548	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:22:50		172.31.251.181	24548	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394284970',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:50		172.31.251.181	24548	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:50		172.31.251.181	24548	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:22:50		172.31.251.181	24548	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=46983 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:22:50		172.31.251.181	24548	/plugin/mobile/do_gettherecordingreply.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('22323')
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283177'
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394284977', '172031251')
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394284977',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65126 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('17674')
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283177'
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394284977', '172031251')
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394284977',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47183 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23006')
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283177'
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394284977', '172031251')
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394284977',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:22:57		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65126 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283180'
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394284980', '172031251')
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394284980',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65126 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('17674')
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283180'
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394284980', '172031251')
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394284980',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47183 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23006')
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283180'
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394284980', '172031251')
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394284980',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:23:00		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65126 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:23:41		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:41		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283221'
<?PHP exit;?>	2014-03-08 21:23:41		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285021', '172031251')
<?PHP exit;?>	2014-03-08 21:23:41		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:23:41		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394285021',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:41		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:41		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:23:41		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 29374
<?PHP exit;?>	2014-03-08 21:23:41		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-08 21:23:41		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='24548' AND fuid='29374' LIMIT 1
<?PHP exit;?>	2014-03-08 21:23:41		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='29374' AND fuid='24548' LIMIT 1
<?PHP exit;?>	2014-03-08 21:23:44		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:44		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283224'
<?PHP exit;?>	2014-03-08 21:23:44		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285024', '172031251')
<?PHP exit;?>	2014-03-08 21:23:44		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:23:44		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394285024',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:44		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:44		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:23:44		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 29374
<?PHP exit;?>	2014-03-08 21:23:44		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-08 21:23:44		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='24548' AND fuid='29374' LIMIT 1
<?PHP exit;?>	2014-03-08 21:23:44		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='29374' AND fuid='24548' LIMIT 1
<?PHP exit;?>	2014-03-08 21:23:44		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	INSERT INTO ihome_friend (`uid`, `fuid`, `fusername`, `gid`, `dateline`) VALUES ('24548', '29374', 'buaaswzl', '0', '1394285024')
<?PHP exit;?>	2014-03-08 21:23:44		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29374'
<?PHP exit;?>	2014-03-08 21:23:44		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET addfriendnum=addfriendnum+1 WHERE uid='29374'
<?PHP exit;?>	2014-03-08 21:23:47		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:47		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283227'
<?PHP exit;?>	2014-03-08 21:23:47		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285027', '172031251')
<?PHP exit;?>	2014-03-08 21:23:47		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:23:47		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	UPDATE ihome_space SET lastlogin='1394285027',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:47		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:47		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:23:47		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-08 21:23:47		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.viewnum,b.replynum,b.dateline FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '29374' ORDER BY b.dateline DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:23:47		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('29374')
<?PHP exit;?>	2014-03-08 21:23:51		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:51		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283231'
<?PHP exit;?>	2014-03-08 21:23:51		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285031', '172031251')
<?PHP exit;?>	2014-03-08 21:23:51		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:23:51		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394285031',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:51		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:51		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:23:51		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-08 21:23:51		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:51		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283231'
<?PHP exit;?>	2014-03-08 21:23:51		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285031', '172031251')
<?PHP exit;?>	2014-03-08 21:23:51		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:23:51		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394285031',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:51		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:51		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:23:51		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-08 21:23:51		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=41601
<?PHP exit;?>	2014-03-08 21:23:58		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:58		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283238'
<?PHP exit;?>	2014-03-08 21:23:58		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285038', '172031251')
<?PHP exit;?>	2014-03-08 21:23:58		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:23:58		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394285038',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:58		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:23:58		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:23:58		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 26814
<?PHP exit;?>	2014-03-08 21:23:58		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-08 21:23:58		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='24548' AND fuid='26814' LIMIT 1
<?PHP exit;?>	2014-03-08 21:23:58		172.31.251.181	24548	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='26814' AND fuid='24548' LIMIT 1
<?PHP exit;?>	2014-03-08 21:24:00		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:00		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283240'
<?PHP exit;?>	2014-03-08 21:24:00		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285040', '172031251')
<?PHP exit;?>	2014-03-08 21:24:00		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:24:00		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	UPDATE ihome_space SET lastlogin='1394285040',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:00		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:00		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:24:00		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-08 21:24:00		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.viewnum,b.replynum,b.dateline FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '26814' ORDER BY b.dateline DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:24:00		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('26814')
<?PHP exit;?>	2014-03-08 21:24:02		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:02		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283242'
<?PHP exit;?>	2014-03-08 21:24:02		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285042', '172031251')
<?PHP exit;?>	2014-03-08 21:24:02		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:24:02		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394285042',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:02		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:02		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:24:02		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-08 21:24:03		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:03		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283243'
<?PHP exit;?>	2014-03-08 21:24:03		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285043', '172031251')
<?PHP exit;?>	2014-03-08 21:24:03		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:24:03		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394285043',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:03		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:03		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:24:03		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-08 21:24:03		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=41453
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283259'
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285059', '172031251')
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394285059',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=64486 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('17674')
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283259'
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285059', '172031251')
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394285059',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283259'
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285059', '172031251')
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394285059',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:24:19		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=64486 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283264'
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285064', '172031251')
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394285064',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65126 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('17674')
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283264'
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285064', '172031251')
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394285064',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47183 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23006')
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283264'
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285064', '172031251')
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394285064',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:24:24		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65126 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283266'
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285066', '172031251')
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394285066',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65126 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('17674')
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283266'
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285066', '172031251')
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394285066',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47183 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23006')
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283266'
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285066', '172031251')
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394285066',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:24:26		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65126 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283268'
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285068', '172031251')
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394285068',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65126 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('17674')
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283268'
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285068', '172031251')
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394285068',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47183 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23006')
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283268'
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285068', '172031251')
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394285068',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:24:28		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65126 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283364'
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285164', '172031251')
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394285164',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=63765 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23238')
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283364'
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285164', '172031251')
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394285164',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283364'
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285164', '172031251')
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394285164',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:26:04		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=63765 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283388'
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285188', '172031251')
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394285188',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=63764 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23238')
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283388'
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285188', '172031251')
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394285188',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283388'
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285188', '172031251')
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394285188',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:26:28		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=63764 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283391'
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285191', '172031251')
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394285191',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=63765 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23238')
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283391'
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285191', '172031251')
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394285191',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283391'
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285191', '172031251')
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394285191',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:26:31		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=63765 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283395'
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285195', '172031251')
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394285195',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=63765 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23238')
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283395'
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285195', '172031251')
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394285195',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283395'
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285195', '172031251')
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394285195',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:26:35		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=63765 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:27:03		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:27:03		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283423'
<?PHP exit;?>	2014-03-08 21:27:03		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285223', '172031251')
<?PHP exit;?>	2014-03-08 21:27:03		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:27:03		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394285223',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:27:03		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:27:03		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:27:03		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=63765 LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:27:03		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23238')
<?PHP exit;?>	2014-03-08 21:27:03		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:27:03		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283423'
<?PHP exit;?>	2014-03-08 21:27:03		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285223', '172031251')
<?PHP exit;?>	2014-03-08 21:27:03		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:27:03		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394285223',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:27:03		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:27:03		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:27:03		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-08 21:27:04		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:27:04		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394283424'
<?PHP exit;?>	2014-03-08 21:27:04		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394285224', '172031251')
<?PHP exit;?>	2014-03-08 21:27:04		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-08 21:27:04		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394285224',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:27:04		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-08 21:27:04		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:27:04		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=63765 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:53:00		172.16.6.42	23388	/plugin/mobile/do_getnews.php	SELECT password FROM ihome_member WHERE uid='23388'
<?PHP exit;?>	2014-03-08 21:53:00		172.16.6.42	23388	/plugin/mobile/do_getnews.php	DELETE FROM ihome_session WHERE uid='23388' OR lastactivity<'1394284980'
<?PHP exit;?>	2014-03-08 21:53:00		172.16.6.42	23388	/plugin/mobile/do_getnews.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23388', 'tudelaty', 'ea07ed882eca86a14a1736be1a08b7c8', '1394286780', '172016006')
<?PHP exit;?>	2014-03-08 21:53:00		172.16.6.42	23388	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_creditlog WHERE uid='23388' AND rid='10'
<?PHP exit;?>	2014-03-08 21:53:00		172.16.6.42	23388	/plugin/mobile/do_getnews.php	UPDATE ihome_space SET lastlogin='1394286780',ip='172016006' WHERE uid='23388'
<?PHP exit;?>	2014-03-08 21:53:00		172.16.6.42	23388	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_spacelog WHERE uid='23388'
<?PHP exit;?>	2014-03-08 21:53:00		172.16.6.42	23388	/plugin/mobile/do_getnews.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23388' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 21:53:00		172.16.6.42	23388	/plugin/mobile/do_getnews.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='23388'
<?PHP exit;?>	2014-03-08 21:53:00		172.16.6.42	23388	/plugin/mobile/do_getnews.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.dateline,bf.message FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '18054' ORDER BY b.dateline DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 21:53:00		172.16.6.42	23388	/plugin/mobile/do_getnews.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('18054')
<?PHP exit;?>	2014-03-08 22:39:11		172.16.25.205	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='2915529483@qq.com' and password=md5(concat('6253abb6a187f6ea98ab7385d984467f',salt))
<?PHP exit;?>	2014-03-08 22:39:11		172.16.25.205	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='23104'
<?PHP exit;?>	2014-03-08 22:39:11		172.16.25.205	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='23104' OR lastactivity<'1394287751'
<?PHP exit;?>	2014-03-08 22:39:11		172.16.25.205	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23104', '2915529483@qq.com', '98d1b7f432e9bda116993c3f7a0c4e5d', '1394289551', '172016025')
<?PHP exit;?>	2014-03-08 22:39:11		172.16.25.205	23104	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='23104' AND rid='10'
<?PHP exit;?>	2014-03-08 22:39:11		172.16.25.205	23104	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394289551',ip='172016025' WHERE uid='23104'
<?PHP exit;?>	2014-03-08 22:39:11		172.16.25.205	23104	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='23104'
<?PHP exit;?>	2014-03-08 22:39:11		172.16.25.205	23104	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23104' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 22:39:12		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23104'
<?PHP exit;?>	2014-03-08 22:39:12		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23104' OR lastactivity<'1394287752'
<?PHP exit;?>	2014-03-08 22:39:12		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23104', '2915529483@qq.com', '98d1b7f432e9bda116993c3f7a0c4e5d', '1394289552', '172016025')
<?PHP exit;?>	2014-03-08 22:39:12		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23104' AND rid='10'
<?PHP exit;?>	2014-03-08 22:39:12		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394289552',ip='172016025' WHERE uid='23104'
<?PHP exit;?>	2014-03-08 22:39:12		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23104'
<?PHP exit;?>	2014-03-08 22:39:12		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23104' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 22:39:12		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23104 and new = 1
<?PHP exit;?>	2014-03-08 22:42:41		61.148.243.210	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='loculi@163.com' and password=md5(concat('231433d878c3bcc3a9107650a2b4597e',salt))
<?PHP exit;?>	2014-03-08 22:42:41		61.148.243.210	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='22567'
<?PHP exit;?>	2014-03-08 22:42:41		61.148.243.210	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='22567' OR lastactivity<'1394287961'
<?PHP exit;?>	2014-03-08 22:42:41		61.148.243.210	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('22567', 'loculi@163.com', '6f92d170699e3024306556c5a5bb26df', '1394289761', '061148243')
<?PHP exit;?>	2014-03-08 22:42:41		61.148.243.210	22567	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='22567' AND rid='10'
<?PHP exit;?>	2014-03-08 22:42:41		61.148.243.210	22567	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394289761',credit='3',experience='5' WHERE clid='105730'
<?PHP exit;?>	2014-03-08 22:42:41		61.148.243.210	22567	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394289761',ip='061148243',credit=credit+3,experience=experience+5 WHERE uid='22567'
<?PHP exit;?>	2014-03-08 22:42:41		61.148.243.210	22567	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='22567'
<?PHP exit;?>	2014-03-08 22:42:41		61.148.243.210	22567	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='22567' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 22:42:41		61.148.243.210	22567	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('22567', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-08 22:42:41		61.148.243.210	22567	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140308' LIMIT 1
<?PHP exit;?>	2014-03-08 22:42:41		61.148.243.210	22567	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140308'
<?PHP exit;?>	2014-03-08 22:42:53		61.148.243.210	22567	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='22567'
<?PHP exit;?>	2014-03-08 22:42:53		61.148.243.210	22567	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='22567' OR lastactivity<'1394287973'
<?PHP exit;?>	2014-03-08 22:42:53		61.148.243.210	22567	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('22567', 'loculi@163.com', '6f92d170699e3024306556c5a5bb26df', '1394289773', '061148243')
<?PHP exit;?>	2014-03-08 22:42:53		61.148.243.210	22567	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='22567' AND rid='10'
<?PHP exit;?>	2014-03-08 22:42:53		61.148.243.210	22567	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394289773',ip='061148243' WHERE uid='22567'
<?PHP exit;?>	2014-03-08 22:42:53		61.148.243.210	22567	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='22567'
<?PHP exit;?>	2014-03-08 22:42:53		61.148.243.210	22567	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='22567' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 22:42:53		61.148.243.210	22567	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 22567 and new = 1
<?PHP exit;?>	2014-03-08 23:44:19		192.168.12.117	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='11051275' and password=md5(concat('670b14728ad9902aecba32e22fa4f6bd',salt))
<?PHP exit;?>	2014-03-08 23:44:19		192.168.12.117	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:44:19		192.168.12.117	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291659'
<?PHP exit;?>	2014-03-08 23:44:19		192.168.12.117	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293459', '192168012')
<?PHP exit;?>	2014-03-08 23:44:19		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:44:19		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394293459',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:44:19		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:44:19		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:44:21		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:44:21		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291661'
<?PHP exit;?>	2014-03-08 23:44:21		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293461', '192168012')
<?PHP exit;?>	2014-03-08 23:44:21		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:44:21		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394293461',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:44:21		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:44:21		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:44:21		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 14279 and new = 1
<?PHP exit;?>	2014-03-08 23:44:34		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:44:34		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291674'
<?PHP exit;?>	2014-03-08 23:44:34		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293474', '192168012')
<?PHP exit;?>	2014-03-08 23:44:34		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:44:34		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394293474',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:44:34		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:44:34		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:44:34		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 23:44:34		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:44:34		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291674'
<?PHP exit;?>	2014-03-08 23:44:34		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293474', '192168012')
<?PHP exit;?>	2014-03-08 23:44:34		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:44:34		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394293474',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:44:34		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:44:34		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:44:34		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 23:44:34		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43662
<?PHP exit;?>	2014-03-08 23:45:22		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:45:22		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291722'
<?PHP exit;?>	2014-03-08 23:45:22		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293522', '192168012')
<?PHP exit;?>	2014-03-08 23:45:22		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:45:22		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394293522',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:45:22		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:45:22		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:45:22		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 14279 and new = 1
<?PHP exit;?>	2014-03-08 23:45:24		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:45:24		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291724'
<?PHP exit;?>	2014-03-08 23:45:24		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293524', '192168012')
<?PHP exit;?>	2014-03-08 23:45:24		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:45:24		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394293524',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:45:24		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:45:24		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:45:24		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 14279 and new = 1
<?PHP exit;?>	2014-03-08 23:45:54		192.168.12.117	14279	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:45:54		192.168.12.117	14279	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291754'
<?PHP exit;?>	2014-03-08 23:45:54		192.168.12.117	14279	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293554', '192168012')
<?PHP exit;?>	2014-03-08 23:45:54		192.168.12.117	14279	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:45:54		192.168.12.117	14279	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394293554',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:45:54		192.168.12.117	14279	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:45:54		192.168.12.117	14279	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:45:54		192.168.12.117	14279	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 21804
<?PHP exit;?>	2014-03-08 23:45:54		192.168.12.117	14279	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 23:45:54		192.168.12.117	14279	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='14279' AND fuid='21804' LIMIT 1
<?PHP exit;?>	2014-03-08 23:45:54		192.168.12.117	14279	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='21804' AND fuid='14279' LIMIT 1
<?PHP exit;?>	2014-03-08 23:45:59		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:45:59		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291759'
<?PHP exit;?>	2014-03-08 23:45:59		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293559', '192168012')
<?PHP exit;?>	2014-03-08 23:45:59		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:45:59		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	UPDATE ihome_space SET lastlogin='1394293559',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:45:59		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:45:59		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:45:59		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 23:45:59		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.viewnum,b.replynum,b.dateline FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '21804' ORDER BY b.dateline DESC LIMIT 0,20
<?PHP exit;?>	2014-03-08 23:45:59		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('21804')
<?PHP exit;?>	2014-03-08 23:46:06		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:06		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291766'
<?PHP exit;?>	2014-03-08 23:46:06		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293566', '192168012')
<?PHP exit;?>	2014-03-08 23:46:06		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:46:06		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394293566',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:06		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:06		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:46:06		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 23:46:06		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:06		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291766'
<?PHP exit;?>	2014-03-08 23:46:06		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293566', '192168012')
<?PHP exit;?>	2014-03-08 23:46:06		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:46:06		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394293566',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:06		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:06		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:46:06		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 23:46:06		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43517
<?PHP exit;?>	2014-03-08 23:46:17		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:17		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291777'
<?PHP exit;?>	2014-03-08 23:46:17		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293577', '192168012')
<?PHP exit;?>	2014-03-08 23:46:17		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:46:17		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394293577',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:17		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:17		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:46:17		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 23:46:17		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:17		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291777'
<?PHP exit;?>	2014-03-08 23:46:17		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293577', '192168012')
<?PHP exit;?>	2014-03-08 23:46:17		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:46:17		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394293577',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:17		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:17		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:46:17		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 23:46:17		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43428
<?PHP exit;?>	2014-03-08 23:46:24		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:24		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291784'
<?PHP exit;?>	2014-03-08 23:46:24		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293584', '192168012')
<?PHP exit;?>	2014-03-08 23:46:24		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:46:24		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	UPDATE ihome_space SET lastlogin='1394293584',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:24		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:24		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:46:24		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 23:46:24		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.viewnum,b.replynum,b.dateline FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '21804' ORDER BY b.dateline DESC LIMIT 20,20
<?PHP exit;?>	2014-03-08 23:46:24		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('21804')
<?PHP exit;?>	2014-03-08 23:46:30		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:30		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291790'
<?PHP exit;?>	2014-03-08 23:46:30		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293590', '192168012')
<?PHP exit;?>	2014-03-08 23:46:30		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:46:30		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394293590',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:30		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:30		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:46:30		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 23:46:30		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:30		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291790'
<?PHP exit;?>	2014-03-08 23:46:30		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293590', '192168012')
<?PHP exit;?>	2014-03-08 23:46:30		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:46:30		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394293590',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:30		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:30		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:46:30		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 23:46:30		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43421
<?PHP exit;?>	2014-03-08 23:46:39		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:39		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291799'
<?PHP exit;?>	2014-03-08 23:46:39		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293599', '192168012')
<?PHP exit;?>	2014-03-08 23:46:39		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:46:39		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394293599',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:39		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:39		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:46:39		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 23:46:42		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:42		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291802'
<?PHP exit;?>	2014-03-08 23:46:42		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293602', '192168012')
<?PHP exit;?>	2014-03-08 23:46:42		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:46:42		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394293602',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:42		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:42		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:46:42		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 23:46:57		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:57		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291817'
<?PHP exit;?>	2014-03-08 23:46:57		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293617', '192168012')
<?PHP exit;?>	2014-03-08 23:46:57		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:46:57		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394293617',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:57		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:57		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:46:57		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 23:46:52		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:52		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291812'
<?PHP exit;?>	2014-03-08 23:46:52		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293612', '192168012')
<?PHP exit;?>	2014-03-08 23:46:52		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:46:52		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	UPDATE ihome_space SET lastlogin='1394293612',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:52		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:52		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:46:52		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 23:46:52		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.viewnum,b.replynum,b.dateline FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '21804' ORDER BY b.dateline DESC LIMIT 40,20
<?PHP exit;?>	2014-03-08 23:46:52		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('21804')
<?PHP exit;?>	2014-03-08 23:46:53		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:53		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291813'
<?PHP exit;?>	2014-03-08 23:46:53		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293613', '192168012')
<?PHP exit;?>	2014-03-08 23:46:53		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:46:53		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	UPDATE ihome_space SET lastlogin='1394293613',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:53		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:46:53		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:46:53		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 23:46:53		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.viewnum,b.replynum,b.dateline FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '21804' ORDER BY b.dateline DESC LIMIT 60,20
<?PHP exit;?>	2014-03-08 23:46:53		192.168.12.117	14279	/plugin/mobile/do_getbloglist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('21804')
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291820'
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293620', '192168012')
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394293620',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=41508
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291820'
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293620', '192168012')
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394293620',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=41509
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394291820'
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394293620', '192168012')
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394293620',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-08 23:47:00		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=40946
<?PHP exit;?>	2014-03-09 00:24:05		111.200.66.228	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='812319498@qq.com' and password=md5(concat('8fb282489b5cc7f9374fecf4b4e71df3',salt))
<?PHP exit;?>	2014-03-09 00:24:05		111.200.66.228	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:24:05		111.200.66.228	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='10460' OR lastactivity<'1394294045'
<?PHP exit;?>	2014-03-09 00:24:05		111.200.66.228	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('10460', '812319498@qq.com', '57668af5ddae152c10bfef0bb157ee59', '1394295845', '111200066')
<?PHP exit;?>	2014-03-09 00:24:05		111.200.66.228	10460	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='10460' AND rid='10'
<?PHP exit;?>	2014-03-09 00:24:05		111.200.66.228	10460	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394295845',credit='3',experience='5' WHERE clid='38662'
<?PHP exit;?>	2014-03-09 00:24:05		111.200.66.228	10460	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394295845',ip='111200066',credit=credit+3,experience=experience+5 WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:24:05		111.200.66.228	10460	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:24:05		111.200.66.228	10460	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='10460' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 00:24:05		111.200.66.228	10460	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('10460', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 00:24:05		111.200.66.228	10460	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 00:24:05		111.200.66.228	10460	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 00:24:07		111.200.66.228	10460	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:24:07		111.200.66.228	10460	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='10460' OR lastactivity<'1394294047'
<?PHP exit;?>	2014-03-09 00:24:07		111.200.66.228	10460	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('10460', '812319498@qq.com', '57668af5ddae152c10bfef0bb157ee59', '1394295847', '111200066')
<?PHP exit;?>	2014-03-09 00:24:07		111.200.66.228	10460	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='10460' AND rid='10'
<?PHP exit;?>	2014-03-09 00:24:07		111.200.66.228	10460	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394295847',ip='111200066' WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:24:07		111.200.66.228	10460	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:24:07		111.200.66.228	10460	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='10460' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 00:24:07		111.200.66.228	10460	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 10460 and new = 1
<?PHP exit;?>	2014-03-09 00:25:56		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:25:56		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='10460' OR lastactivity<'1394294156'
<?PHP exit;?>	2014-03-09 00:25:56		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('10460', '812319498@qq.com', '57668af5ddae152c10bfef0bb157ee59', '1394295956', '111200066')
<?PHP exit;?>	2014-03-09 00:25:56		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='10460' AND rid='10'
<?PHP exit;?>	2014-03-09 00:25:56		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394295956',ip='111200066' WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:25:56		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:25:56		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='10460' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 00:25:56		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='10460'
<?PHP exit;?>	2014-03-09 00:25:56		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:25:56		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='10460' OR lastactivity<'1394294156'
<?PHP exit;?>	2014-03-09 00:25:56		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('10460', '812319498@qq.com', '57668af5ddae152c10bfef0bb157ee59', '1394295956', '111200066')
<?PHP exit;?>	2014-03-09 00:25:56		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='10460' AND rid='10'
<?PHP exit;?>	2014-03-09 00:25:56		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394295956',ip='111200066' WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:25:56		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:25:56		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='10460' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 00:25:56		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='10460'
<?PHP exit;?>	2014-03-09 00:25:56		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43668
<?PHP exit;?>	2014-03-09 00:29:48		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:29:48		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='10460' OR lastactivity<'1394294388'
<?PHP exit;?>	2014-03-09 00:29:48		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('10460', '812319498@qq.com', '57668af5ddae152c10bfef0bb157ee59', '1394296188', '111200066')
<?PHP exit;?>	2014-03-09 00:29:48		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='10460' AND rid='10'
<?PHP exit;?>	2014-03-09 00:29:48		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394296188',ip='111200066' WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:29:48		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:29:48		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='10460' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 00:29:48		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='10460'
<?PHP exit;?>	2014-03-09 00:29:49		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:29:49		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='10460' OR lastactivity<'1394294389'
<?PHP exit;?>	2014-03-09 00:29:49		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('10460', '812319498@qq.com', '57668af5ddae152c10bfef0bb157ee59', '1394296189', '111200066')
<?PHP exit;?>	2014-03-09 00:29:49		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='10460' AND rid='10'
<?PHP exit;?>	2014-03-09 00:29:49		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394296189',ip='111200066' WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:29:49		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:29:49		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='10460' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 00:29:49		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='10460'
<?PHP exit;?>	2014-03-09 00:29:49		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43668
<?PHP exit;?>	2014-03-09 00:30:24		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:30:24		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='10460' OR lastactivity<'1394294424'
<?PHP exit;?>	2014-03-09 00:30:24		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('10460', '812319498@qq.com', '57668af5ddae152c10bfef0bb157ee59', '1394296224', '111200066')
<?PHP exit;?>	2014-03-09 00:30:24		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='10460' AND rid='10'
<?PHP exit;?>	2014-03-09 00:30:24		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394296224',ip='111200066' WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:30:24		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:30:24		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='10460' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 00:30:24		111.200.66.228	10460	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='10460'
<?PHP exit;?>	2014-03-09 00:30:25		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:30:25		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='10460' OR lastactivity<'1394294425'
<?PHP exit;?>	2014-03-09 00:30:25		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('10460', '812319498@qq.com', '57668af5ddae152c10bfef0bb157ee59', '1394296225', '111200066')
<?PHP exit;?>	2014-03-09 00:30:25		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='10460' AND rid='10'
<?PHP exit;?>	2014-03-09 00:30:25		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394296225',ip='111200066' WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:30:25		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='10460'
<?PHP exit;?>	2014-03-09 00:30:25		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='10460' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 00:30:25		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='10460'
<?PHP exit;?>	2014-03-09 00:30:25		111.200.66.228	10460	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43666
<?PHP exit;?>	2014-03-09 00:43:01		192.168.186.50	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='11071023' and password=md5(concat('010e765f6886a5c08065e04be22e31fd',salt))
<?PHP exit;?>	2014-03-09 00:43:01		192.168.186.50	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:43:01		192.168.186.50	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='1996' OR lastactivity<'1394295181'
<?PHP exit;?>	2014-03-09 00:43:01		192.168.186.50	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('1996', '11071023', '670b14728ad9902aecba32e22fa4f6bd', '1394296981', '192168186')
<?PHP exit;?>	2014-03-09 00:43:01		192.168.186.50	1996	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='1996' AND rid='10'
<?PHP exit;?>	2014-03-09 00:43:01		192.168.186.50	1996	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394296981',credit='3',experience='5' WHERE clid='8426'
<?PHP exit;?>	2014-03-09 00:43:01		192.168.186.50	1996	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394296981',ip='192168186',credit=credit+3,experience=experience+5 WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:43:01		192.168.186.50	1996	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:43:01		192.168.186.50	1996	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='1996' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 00:43:01		192.168.186.50	1996	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('1996', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 00:43:01		192.168.186.50	1996	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 00:43:01		192.168.186.50	1996	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 00:43:03		192.168.186.50	1996	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:43:03		192.168.186.50	1996	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='1996' OR lastactivity<'1394295183'
<?PHP exit;?>	2014-03-09 00:43:03		192.168.186.50	1996	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('1996', '11071023', '670b14728ad9902aecba32e22fa4f6bd', '1394296983', '192168186')
<?PHP exit;?>	2014-03-09 00:43:03		192.168.186.50	1996	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='1996' AND rid='10'
<?PHP exit;?>	2014-03-09 00:43:03		192.168.186.50	1996	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394296983',ip='192168186' WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:43:03		192.168.186.50	1996	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:43:03		192.168.186.50	1996	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='1996' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 00:43:03		192.168.186.50	1996	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 1996 and new = 1
<?PHP exit;?>	2014-03-09 00:43:17		192.168.186.50	1996	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:43:17		192.168.186.50	1996	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='1996' OR lastactivity<'1394295197'
<?PHP exit;?>	2014-03-09 00:43:17		192.168.186.50	1996	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('1996', '11071023', '670b14728ad9902aecba32e22fa4f6bd', '1394296997', '192168186')
<?PHP exit;?>	2014-03-09 00:43:17		192.168.186.50	1996	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='1996' AND rid='10'
<?PHP exit;?>	2014-03-09 00:43:17		192.168.186.50	1996	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394296997',ip='192168186' WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:43:17		192.168.186.50	1996	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:43:17		192.168.186.50	1996	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='1996' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 00:43:17		192.168.186.50	1996	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='1996'
<?PHP exit;?>	2014-03-09 00:43:17		192.168.186.50	1996	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:43:17		192.168.186.50	1996	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='1996' OR lastactivity<'1394295197'
<?PHP exit;?>	2014-03-09 00:43:17		192.168.186.50	1996	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('1996', '11071023', '670b14728ad9902aecba32e22fa4f6bd', '1394296997', '192168186')
<?PHP exit;?>	2014-03-09 00:43:17		192.168.186.50	1996	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='1996' AND rid='10'
<?PHP exit;?>	2014-03-09 00:43:17		192.168.186.50	1996	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394296997',ip='192168186' WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:43:17		192.168.186.50	1996	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:43:17		192.168.186.50	1996	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='1996' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 00:43:17		192.168.186.50	1996	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='1996'
<?PHP exit;?>	2014-03-09 00:43:17		192.168.186.50	1996	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43693
<?PHP exit;?>	2014-03-09 00:43:55		192.168.186.50	1996	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:43:55		192.168.186.50	1996	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='1996' OR lastactivity<'1394295235'
<?PHP exit;?>	2014-03-09 00:43:55		192.168.186.50	1996	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('1996', '11071023', '670b14728ad9902aecba32e22fa4f6bd', '1394297035', '192168186')
<?PHP exit;?>	2014-03-09 00:43:55		192.168.186.50	1996	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='1996' AND rid='10'
<?PHP exit;?>	2014-03-09 00:43:55		192.168.186.50	1996	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394297035',ip='192168186' WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:43:55		192.168.186.50	1996	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:43:55		192.168.186.50	1996	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='1996' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 00:43:55		192.168.186.50	1996	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65170 LIMIT 0,20
<?PHP exit;?>	2014-03-09 00:43:55		192.168.186.50	1996	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('3815')
<?PHP exit;?>	2014-03-09 00:43:56		192.168.186.50	1996	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:43:56		192.168.186.50	1996	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='1996' OR lastactivity<'1394295236'
<?PHP exit;?>	2014-03-09 00:43:56		192.168.186.50	1996	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('1996', '11071023', '670b14728ad9902aecba32e22fa4f6bd', '1394297036', '192168186')
<?PHP exit;?>	2014-03-09 00:43:56		192.168.186.50	1996	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='1996' AND rid='10'
<?PHP exit;?>	2014-03-09 00:43:56		192.168.186.50	1996	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394297036',ip='192168186' WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:43:56		192.168.186.50	1996	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:43:56		192.168.186.50	1996	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='1996' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 00:43:56		192.168.186.50	1996	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='1996'
<?PHP exit;?>	2014-03-09 00:44:17		192.168.186.50	1996	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:44:17		192.168.186.50	1996	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='1996' OR lastactivity<'1394295257'
<?PHP exit;?>	2014-03-09 00:44:17		192.168.186.50	1996	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('1996', '11071023', '670b14728ad9902aecba32e22fa4f6bd', '1394297057', '192168186')
<?PHP exit;?>	2014-03-09 00:44:17		192.168.186.50	1996	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='1996' AND rid='10'
<?PHP exit;?>	2014-03-09 00:44:17		192.168.186.50	1996	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394297057',ip='192168186' WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:44:17		192.168.186.50	1996	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='1996'
<?PHP exit;?>	2014-03-09 00:44:17		192.168.186.50	1996	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='1996' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 00:44:17		192.168.186.50	1996	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65170 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-09 00:54:18		61.148.243.210	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='loculi@163.com' and password=md5(concat('231433d878c3bcc3a9107650a2b4597e',salt))
<?PHP exit;?>	2014-03-09 00:54:18		61.148.243.210	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='22567'
<?PHP exit;?>	2014-03-09 00:54:18		61.148.243.210	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='22567' OR lastactivity<'1394295858'
<?PHP exit;?>	2014-03-09 00:54:18		61.148.243.210	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('22567', 'loculi@163.com', '6f92d170699e3024306556c5a5bb26df', '1394297658', '061148243')
<?PHP exit;?>	2014-03-09 00:54:18		61.148.243.210	22567	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='22567' AND rid='10'
<?PHP exit;?>	2014-03-09 00:54:18		61.148.243.210	22567	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394297658',credit='3',experience='5' WHERE clid='105730'
<?PHP exit;?>	2014-03-09 00:54:18		61.148.243.210	22567	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394297658',ip='061148243',credit=credit+3,experience=experience+5 WHERE uid='22567'
<?PHP exit;?>	2014-03-09 00:54:18		61.148.243.210	22567	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='22567'
<?PHP exit;?>	2014-03-09 00:54:18		61.148.243.210	22567	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='22567' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 00:54:18		61.148.243.210	22567	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('22567', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 00:54:18		61.148.243.210	22567	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 00:54:18		61.148.243.210	22567	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 00:54:42		61.148.243.210	22567	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='22567'
<?PHP exit;?>	2014-03-09 00:54:42		61.148.243.210	22567	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='22567' OR lastactivity<'1394295882'
<?PHP exit;?>	2014-03-09 00:54:42		61.148.243.210	22567	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('22567', 'loculi@163.com', '6f92d170699e3024306556c5a5bb26df', '1394297682', '061148243')
<?PHP exit;?>	2014-03-09 00:54:42		61.148.243.210	22567	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='22567' AND rid='10'
<?PHP exit;?>	2014-03-09 00:54:42		61.148.243.210	22567	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394297682',ip='061148243' WHERE uid='22567'
<?PHP exit;?>	2014-03-09 00:54:42		61.148.243.210	22567	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='22567'
<?PHP exit;?>	2014-03-09 00:54:42		61.148.243.210	22567	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='22567' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 00:54:42		61.148.243.210	22567	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 22567 and new = 1
<?PHP exit;?>	2014-03-09 01:35:54		172.16.51.211	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='12131017' and password=md5(concat('f7513c74a3d511aefde8d7c561cdd0ae',salt))
<?PHP exit;?>	2014-03-09 01:36:17		172.16.51.211	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='12131017' and password=md5(concat('f7513c74a3d511aefde8d7c561cdd0ae',salt))
<?PHP exit;?>	2014-03-09 01:36:19		172.16.51.211	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='12131017' and password=md5(concat('f7513c74a3d511aefde8d7c561cdd0ae',salt))
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='sdzywangzhiwei' and password=md5(concat('f7513c74a3d511aefde8d7c561cdd0ae',salt))
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='3205' OR lastactivity<'1394298401'
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('3205', 'sdzywangzhiwei', '882f58772dba6fb7981c8d78e89f083e', '1394300201', '172016051')
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	3205	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='3205' AND rid='10'
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	3205	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394300201',credit='3',experience='5' WHERE clid='14510'
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	3205	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394300201',ip='172016051',credit=credit+3,experience=experience+5 WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	3205	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	3205	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='3205' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	3205	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('3205', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	3205	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	3205	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	3205	/plugin/mobile/do_getuserinfo.php	SELECT password FROM ihome_member WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	3205	/plugin/mobile/do_getuserinfo.php	DELETE FROM ihome_session WHERE uid='3205' OR lastactivity<'1394298401'
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	3205	/plugin/mobile/do_getuserinfo.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('3205', 'sdzywangzhiwei', '882f58772dba6fb7981c8d78e89f083e', '1394300201', '172016051')
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	3205	/plugin/mobile/do_getuserinfo.php	SELECT * FROM ihome_creditlog WHERE uid='3205' AND rid='10'
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	3205	/plugin/mobile/do_getuserinfo.php	UPDATE ihome_space SET lastlogin='1394300201',ip='172016051' WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	3205	/plugin/mobile/do_getuserinfo.php	SELECT * FROM ihome_spacelog WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	3205	/plugin/mobile/do_getuserinfo.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='3205' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	3205	/plugin/mobile/do_getuserinfo.php	SELECT s.uid,s.name,ug.grouptitle,sf.note,s.friendnum ,s.threadnum,s.blognum,sf.privacy FROM ihome_space s   				, ihome_spacefield sf ,ihome_usergroup ug where s.uid=sf.uid and s.groupid=ug.gid                  and s.uid =3205
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	3205	/plugin/mobile/do_getuserinfo.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('3205')
<?PHP exit;?>	2014-03-09 01:36:41		172.16.51.211	3205	/plugin/mobile/do_getuserinfo.php	SELECT  friend  FROM  ihome_spacefield  WHERE uid = 3205
<?PHP exit;?>	2014-03-09 01:36:44		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:36:44		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='3205' OR lastactivity<'1394298404'
<?PHP exit;?>	2014-03-09 01:36:44		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('3205', 'sdzywangzhiwei', '882f58772dba6fb7981c8d78e89f083e', '1394300204', '172016051')
<?PHP exit;?>	2014-03-09 01:36:44		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='3205' AND rid='10'
<?PHP exit;?>	2014-03-09 01:36:44		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394300204',ip='172016051' WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:36:44		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:36:44		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='3205' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 01:36:44		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 3205 and new = 1
<?PHP exit;?>	2014-03-09 01:39:06		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:39:06		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='3205' OR lastactivity<'1394298546'
<?PHP exit;?>	2014-03-09 01:39:06		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('3205', 'sdzywangzhiwei', '882f58772dba6fb7981c8d78e89f083e', '1394300346', '172016051')
<?PHP exit;?>	2014-03-09 01:39:06		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='3205' AND rid='10'
<?PHP exit;?>	2014-03-09 01:39:06		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394300346',ip='172016051' WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:39:06		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:39:06		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='3205' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 01:39:06		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 3205 and new = 1
<?PHP exit;?>	2014-03-09 01:40:10		172.16.51.211	3205	/plugin/mobile/do_getuserphotoalbum.php	SELECT password FROM ihome_member WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:40:10		172.16.51.211	3205	/plugin/mobile/do_getuserphotoalbum.php	DELETE FROM ihome_session WHERE uid='3205' OR lastactivity<'1394298610'
<?PHP exit;?>	2014-03-09 01:40:10		172.16.51.211	3205	/plugin/mobile/do_getuserphotoalbum.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('3205', 'sdzywangzhiwei', '882f58772dba6fb7981c8d78e89f083e', '1394300410', '172016051')
<?PHP exit;?>	2014-03-09 01:40:10		172.16.51.211	3205	/plugin/mobile/do_getuserphotoalbum.php	SELECT * FROM ihome_creditlog WHERE uid='3205' AND rid='10'
<?PHP exit;?>	2014-03-09 01:40:10		172.16.51.211	3205	/plugin/mobile/do_getuserphotoalbum.php	UPDATE ihome_space SET lastlogin='1394300410',ip='172016051' WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:40:10		172.16.51.211	3205	/plugin/mobile/do_getuserphotoalbum.php	SELECT * FROM ihome_spacelog WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:40:10		172.16.51.211	3205	/plugin/mobile/do_getuserphotoalbum.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='3205' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 01:40:10		172.16.51.211	3205	/plugin/mobile/do_getuserphotoalbum.php	SELECT albumid,dateline,albumname,pic,picnum FROM ihome_album WHERE  uid=3205
<?PHP exit;?>	2014-03-09 01:40:12		172.16.51.211	3205	/plugin/mobile/do_getalbumpic.php	SELECT password FROM ihome_member WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:40:12		172.16.51.211	3205	/plugin/mobile/do_getalbumpic.php	DELETE FROM ihome_session WHERE uid='3205' OR lastactivity<'1394298612'
<?PHP exit;?>	2014-03-09 01:40:12		172.16.51.211	3205	/plugin/mobile/do_getalbumpic.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('3205', 'sdzywangzhiwei', '882f58772dba6fb7981c8d78e89f083e', '1394300412', '172016051')
<?PHP exit;?>	2014-03-09 01:40:12		172.16.51.211	3205	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_creditlog WHERE uid='3205' AND rid='10'
<?PHP exit;?>	2014-03-09 01:40:12		172.16.51.211	3205	/plugin/mobile/do_getalbumpic.php	UPDATE ihome_space SET lastlogin='1394300412',ip='172016051' WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:40:12		172.16.51.211	3205	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_spacelog WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:40:12		172.16.51.211	3205	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='3205' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 01:40:12		172.16.51.211	3205	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_album WHERE albumid='1157' LIMIT 1
<?PHP exit;?>	2014-03-09 01:40:12		172.16.51.211	3205	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_pic WHERE albumid='1157' ORDER BY dateline DESC LIMIT 0,100
<?PHP exit;?>	2014-03-09 01:40:12		172.16.51.211	3205	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='12385' LIMIT 1
<?PHP exit;?>	2014-03-09 01:40:12		172.16.51.211	3205	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='12384' LIMIT 1
<?PHP exit;?>	2014-03-09 01:40:12		172.16.51.211	3205	/plugin/mobile/do_getalbumpic.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('3205')
<?PHP exit;?>	2014-03-09 01:40:35		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:40:35		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='3205' OR lastactivity<'1394298635'
<?PHP exit;?>	2014-03-09 01:40:35		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('3205', 'sdzywangzhiwei', '882f58772dba6fb7981c8d78e89f083e', '1394300435', '172016051')
<?PHP exit;?>	2014-03-09 01:40:35		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='3205' AND rid='10'
<?PHP exit;?>	2014-03-09 01:40:35		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394300435',ip='172016051' WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:40:35		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='3205'
<?PHP exit;?>	2014-03-09 01:40:35		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='3205' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 01:40:35		172.16.51.211	3205	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 3205 and new = 1
<?PHP exit;?>	2014-03-09 02:28:38		192.168.13.23	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='ihome_mobile' and password=md5(concat('66ecbfdaef34e3a75712bca5c2c53c9a',salt))
<?PHP exit;?>	2014-03-09 02:28:38		192.168.13.23	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 02:28:38		192.168.13.23	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394301518'
<?PHP exit;?>	2014-03-09 02:28:38		192.168.13.23	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394303318', '192168013')
<?PHP exit;?>	2014-03-09 02:28:38		192.168.13.23	29970	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 02:28:38		192.168.13.23	29970	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394303318',credit='3',experience='5' WHERE clid='147030'
<?PHP exit;?>	2014-03-09 02:28:38		192.168.13.23	29970	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394303318',ip='192168013',credit=credit+3,experience=experience+5 WHERE uid='29970'
<?PHP exit;?>	2014-03-09 02:28:38		192.168.13.23	29970	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 02:28:38		192.168.13.23	29970	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 02:28:38		192.168.13.23	29970	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('29970', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 02:28:38		192.168.13.23	29970	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 02:28:38		192.168.13.23	29970	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 02:28:43		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 02:28:43		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394301523'
<?PHP exit;?>	2014-03-09 02:28:43		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394303323', '192168013')
<?PHP exit;?>	2014-03-09 02:28:43		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 02:28:43		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394303323',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 02:28:43		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 02:28:43		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 02:28:43		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47423 LIMIT 0,20
<?PHP exit;?>	2014-03-09 02:28:43		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('10460')
<?PHP exit;?>	2014-03-09 02:28:43		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 02:28:43		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394301523'
<?PHP exit;?>	2014-03-09 02:28:43		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394303323', '192168013')
<?PHP exit;?>	2014-03-09 02:28:43		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 02:28:43		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394303323',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 02:28:43		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 02:28:43		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 02:28:43		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47423 LIMIT 0,20
<?PHP exit;?>	2014-03-09 02:28:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 02:28:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394301525'
<?PHP exit;?>	2014-03-09 02:28:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394303325', '192168013')
<?PHP exit;?>	2014-03-09 02:28:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 02:28:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394303325',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 02:28:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 02:28:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 02:28:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 10460
<?PHP exit;?>	2014-03-09 02:28:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-09 02:28:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='29970' AND fuid='10460' LIMIT 1
<?PHP exit;?>	2014-03-09 02:28:45		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='10460' AND fuid='29970' LIMIT 1
<?PHP exit;?>	2014-03-09 02:29:16		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 02:29:16		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394301556'
<?PHP exit;?>	2014-03-09 02:29:16		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394303356', '192168013')
<?PHP exit;?>	2014-03-09 02:29:16		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 02:29:16		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394303356',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 02:29:16		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 02:29:16		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 02:29:16		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-09 02:29:16		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 02:29:16		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394301556'
<?PHP exit;?>	2014-03-09 02:29:16		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394303356', '192168013')
<?PHP exit;?>	2014-03-09 02:29:16		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 02:29:16		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394303356',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 02:29:16		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 02:29:16		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 02:29:16		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-09 02:29:16		192.168.13.23	29970	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43698
<?PHP exit;?>	2014-03-09 06:33:14		111.196.84.24	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='bhuyuqingguo@gmail.com' and password=md5(concat('61d12d72f41329d5d26140ffea98305d',salt))
<?PHP exit;?>	2014-03-09 06:33:23		111.196.84.24	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='bhuyuqingguo@gmail.com' and password=md5(concat('40d51d0c1681d7b0d3145a5a242cced6',salt))
<?PHP exit;?>	2014-03-09 06:33:23		111.196.84.24	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='30471'
<?PHP exit;?>	2014-03-09 06:33:23		111.196.84.24	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='30471' OR lastactivity<'1394316203'
<?PHP exit;?>	2014-03-09 06:33:23		111.196.84.24	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('30471', 'bhuyuqingguo@gmail.com', '5c60f2894f8b1c64aaf8dc4d20f6e5a9', '1394318003', '111196084')
<?PHP exit;?>	2014-03-09 06:33:23		111.196.84.24	30471	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='30471' AND rid='10'
<?PHP exit;?>	2014-03-09 06:33:23		111.196.84.24	30471	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394318003',credit='3',experience='5' WHERE clid='152875'
<?PHP exit;?>	2014-03-09 06:33:23		111.196.84.24	30471	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394318003',ip='111196084',credit=credit+3,experience=experience+5 WHERE uid='30471'
<?PHP exit;?>	2014-03-09 06:33:23		111.196.84.24	30471	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='30471'
<?PHP exit;?>	2014-03-09 06:33:23		111.196.84.24	30471	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='30471' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 06:33:23		111.196.84.24	30471	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('30471', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 06:33:23		111.196.84.24	30471	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 06:33:23		111.196.84.24	30471	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 06:33:24		111.196.84.24	30471	/plugin/mobile/do_getuserinfo.php	SELECT password FROM ihome_member WHERE uid='30471'
<?PHP exit;?>	2014-03-09 06:33:24		111.196.84.24	30471	/plugin/mobile/do_getuserinfo.php	DELETE FROM ihome_session WHERE uid='30471' OR lastactivity<'1394316204'
<?PHP exit;?>	2014-03-09 06:33:24		111.196.84.24	30471	/plugin/mobile/do_getuserinfo.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('30471', 'bhuyuqingguo@gmail.com', '5c60f2894f8b1c64aaf8dc4d20f6e5a9', '1394318004', '111196084')
<?PHP exit;?>	2014-03-09 06:33:24		111.196.84.24	30471	/plugin/mobile/do_getuserinfo.php	SELECT * FROM ihome_creditlog WHERE uid='30471' AND rid='10'
<?PHP exit;?>	2014-03-09 06:33:24		111.196.84.24	30471	/plugin/mobile/do_getuserinfo.php	UPDATE ihome_space SET lastlogin='1394318004',ip='111196084' WHERE uid='30471'
<?PHP exit;?>	2014-03-09 06:33:24		111.196.84.24	30471	/plugin/mobile/do_getuserinfo.php	SELECT * FROM ihome_spacelog WHERE uid='30471'
<?PHP exit;?>	2014-03-09 06:33:24		111.196.84.24	30471	/plugin/mobile/do_getuserinfo.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='30471' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 06:33:24		111.196.84.24	30471	/plugin/mobile/do_getuserinfo.php	SELECT s.uid,s.name,ug.grouptitle,sf.note,s.friendnum ,s.threadnum,s.blognum,sf.privacy FROM ihome_space s   				, ihome_spacefield sf ,ihome_usergroup ug where s.uid=sf.uid and s.groupid=ug.gid                  and s.uid =30471
<?PHP exit;?>	2014-03-09 06:33:24		111.196.84.24	30471	/plugin/mobile/do_getuserinfo.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('30471')
<?PHP exit;?>	2014-03-09 06:33:24		111.196.84.24	30471	/plugin/mobile/do_getuserinfo.php	SELECT  friend  FROM  ihome_spacefield  WHERE uid = 30471
<?PHP exit;?>	2014-03-09 06:33:25		111.196.84.24	30471	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='30471'
<?PHP exit;?>	2014-03-09 06:33:25		111.196.84.24	30471	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='30471' OR lastactivity<'1394316205'
<?PHP exit;?>	2014-03-09 06:33:25		111.196.84.24	30471	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('30471', 'bhuyuqingguo@gmail.com', '5c60f2894f8b1c64aaf8dc4d20f6e5a9', '1394318005', '111196084')
<?PHP exit;?>	2014-03-09 06:33:25		111.196.84.24	30471	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='30471' AND rid='10'
<?PHP exit;?>	2014-03-09 06:33:25		111.196.84.24	30471	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394318005',ip='111196084' WHERE uid='30471'
<?PHP exit;?>	2014-03-09 06:33:25		111.196.84.24	30471	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='30471'
<?PHP exit;?>	2014-03-09 06:33:25		111.196.84.24	30471	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='30471' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 06:33:25		111.196.84.24	30471	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 30471 and new = 1
<?PHP exit;?>	2014-03-09 08:26:10		172.16.22.162	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='741824256' and password=md5(concat('4e8b14b573c0760f9431bc93561a1744',salt))
<?PHP exit;?>	2014-03-09 08:26:10		172.16.22.162	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='23026'
<?PHP exit;?>	2014-03-09 08:26:10		172.16.22.162	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='23026' OR lastactivity<'1394322970'
<?PHP exit;?>	2014-03-09 08:26:10		172.16.22.162	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23026', '741824256', 'd1ce7c04f4ba7033016e54563b5553a8', '1394324770', '172016022')
<?PHP exit;?>	2014-03-09 08:26:10		172.16.22.162	23026	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='23026' AND rid='10'
<?PHP exit;?>	2014-03-09 08:26:10		172.16.22.162	23026	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394324770',ip='172016022' WHERE uid='23026'
<?PHP exit;?>	2014-03-09 08:26:10		172.16.22.162	23026	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='23026'
<?PHP exit;?>	2014-03-09 08:26:10		172.16.22.162	23026	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23026' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 08:26:10		172.16.22.162	23026	/plugin/mobile/do_getuserinfo.php	SELECT password FROM ihome_member WHERE uid='23026'
<?PHP exit;?>	2014-03-09 08:26:10		172.16.22.162	23026	/plugin/mobile/do_getuserinfo.php	DELETE FROM ihome_session WHERE uid='23026' OR lastactivity<'1394322970'
<?PHP exit;?>	2014-03-09 08:26:10		172.16.22.162	23026	/plugin/mobile/do_getuserinfo.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23026', '741824256', 'd1ce7c04f4ba7033016e54563b5553a8', '1394324770', '172016022')
<?PHP exit;?>	2014-03-09 08:26:10		172.16.22.162	23026	/plugin/mobile/do_getuserinfo.php	SELECT * FROM ihome_creditlog WHERE uid='23026' AND rid='10'
<?PHP exit;?>	2014-03-09 08:26:10		172.16.22.162	23026	/plugin/mobile/do_getuserinfo.php	UPDATE ihome_space SET lastlogin='1394324770',ip='172016022' WHERE uid='23026'
<?PHP exit;?>	2014-03-09 08:26:10		172.16.22.162	23026	/plugin/mobile/do_getuserinfo.php	SELECT * FROM ihome_spacelog WHERE uid='23026'
<?PHP exit;?>	2014-03-09 08:26:10		172.16.22.162	23026	/plugin/mobile/do_getuserinfo.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23026' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 08:26:10		172.16.22.162	23026	/plugin/mobile/do_getuserinfo.php	SELECT s.uid,s.name,ug.grouptitle,sf.note,s.friendnum ,s.threadnum,s.blognum,sf.privacy FROM ihome_space s   				, ihome_spacefield sf ,ihome_usergroup ug where s.uid=sf.uid and s.groupid=ug.gid                  and s.uid =23026
<?PHP exit;?>	2014-03-09 08:26:10		172.16.22.162	23026	/plugin/mobile/do_getuserinfo.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23026')
<?PHP exit;?>	2014-03-09 08:26:10		172.16.22.162	23026	/plugin/mobile/do_getuserinfo.php	SELECT  friend  FROM  ihome_spacefield  WHERE uid = 23026
<?PHP exit;?>	2014-03-09 08:26:12		172.16.22.162	23026	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23026'
<?PHP exit;?>	2014-03-09 08:26:12		172.16.22.162	23026	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23026' OR lastactivity<'1394322972'
<?PHP exit;?>	2014-03-09 08:26:12		172.16.22.162	23026	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23026', '741824256', 'd1ce7c04f4ba7033016e54563b5553a8', '1394324772', '172016022')
<?PHP exit;?>	2014-03-09 08:26:12		172.16.22.162	23026	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23026' AND rid='10'
<?PHP exit;?>	2014-03-09 08:26:12		172.16.22.162	23026	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394324772',ip='172016022' WHERE uid='23026'
<?PHP exit;?>	2014-03-09 08:26:12		172.16.22.162	23026	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23026'
<?PHP exit;?>	2014-03-09 08:26:12		172.16.22.162	23026	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23026' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 08:26:12		172.16.22.162	23026	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23026 and new = 1
<?PHP exit;?>	2014-03-09 08:46:02		172.16.7.62	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='xly_452628201@aliyun.com' and password=md5(concat('5ff9c81ca2d55716975d70abd69e0f2e',salt))
<?PHP exit;?>	2014-03-09 08:46:02		172.16.7.62	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='24414'
<?PHP exit;?>	2014-03-09 08:46:02		172.16.7.62	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='24414' OR lastactivity<'1394324162'
<?PHP exit;?>	2014-03-09 08:46:02		172.16.7.62	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24414', 'xly_452628201@aliyun.com', '57a94e1a447a8ee0ed6bce3669cd54d0', '1394325962', '172016007')
<?PHP exit;?>	2014-03-09 08:46:02		172.16.7.62	24414	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='24414' AND rid='10'
<?PHP exit;?>	2014-03-09 08:46:02		172.16.7.62	24414	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394325962',credit='3',experience='5' WHERE clid='112000'
<?PHP exit;?>	2014-03-09 08:46:02		172.16.7.62	24414	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394325962',ip='172016007',credit=credit+3,experience=experience+5 WHERE uid='24414'
<?PHP exit;?>	2014-03-09 08:46:02		172.16.7.62	24414	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='24414'
<?PHP exit;?>	2014-03-09 08:46:02		172.16.7.62	24414	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24414' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 08:46:02		172.16.7.62	24414	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('24414', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 08:46:02		172.16.7.62	24414	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 08:46:02		172.16.7.62	24414	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 08:46:03		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='24414'
<?PHP exit;?>	2014-03-09 08:46:03		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='24414' OR lastactivity<'1394324163'
<?PHP exit;?>	2014-03-09 08:46:03		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24414', 'xly_452628201@aliyun.com', '57a94e1a447a8ee0ed6bce3669cd54d0', '1394325963', '172016007')
<?PHP exit;?>	2014-03-09 08:46:03		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='24414' AND rid='10'
<?PHP exit;?>	2014-03-09 08:46:03		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394325963',ip='172016007' WHERE uid='24414'
<?PHP exit;?>	2014-03-09 08:46:03		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='24414'
<?PHP exit;?>	2014-03-09 08:46:03		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24414' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 08:46:03		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 24414 and new = 1
<?PHP exit;?>	2014-03-09 08:46:08		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='24414'
<?PHP exit;?>	2014-03-09 08:46:08		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='24414' OR lastactivity<'1394324168'
<?PHP exit;?>	2014-03-09 08:46:08		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24414', 'xly_452628201@aliyun.com', '57a94e1a447a8ee0ed6bce3669cd54d0', '1394325968', '172016007')
<?PHP exit;?>	2014-03-09 08:46:08		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='24414' AND rid='10'
<?PHP exit;?>	2014-03-09 08:46:08		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394325968',ip='172016007' WHERE uid='24414'
<?PHP exit;?>	2014-03-09 08:46:08		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='24414'
<?PHP exit;?>	2014-03-09 08:46:08		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24414' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 08:46:08		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 24414 and new = 1
<?PHP exit;?>	2014-03-09 08:46:10		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='24414'
<?PHP exit;?>	2014-03-09 08:46:10		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='24414' OR lastactivity<'1394324170'
<?PHP exit;?>	2014-03-09 08:46:10		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24414', 'xly_452628201@aliyun.com', '57a94e1a447a8ee0ed6bce3669cd54d0', '1394325970', '172016007')
<?PHP exit;?>	2014-03-09 08:46:10		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='24414' AND rid='10'
<?PHP exit;?>	2014-03-09 08:46:10		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394325970',ip='172016007' WHERE uid='24414'
<?PHP exit;?>	2014-03-09 08:46:10		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='24414'
<?PHP exit;?>	2014-03-09 08:46:10		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24414' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 08:46:10		172.16.7.62	24414	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 24414 and new = 1
<?PHP exit;?>	2014-03-09 09:23:08		192.168.12.117	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='11051275' and password=md5(concat('670b14728ad9902aecba32e22fa4f6bd',salt))
<?PHP exit;?>	2014-03-09 09:23:08		192.168.12.117	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-09 09:23:08		192.168.12.117	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394326388'
<?PHP exit;?>	2014-03-09 09:23:08		192.168.12.117	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394328188', '192168012')
<?PHP exit;?>	2014-03-09 09:23:08		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-09 09:23:08		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394328188',credit='3',experience='5' WHERE clid='55281'
<?PHP exit;?>	2014-03-09 09:23:08		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394328188',ip='192168012',credit=credit+3,experience=experience+5 WHERE uid='14279'
<?PHP exit;?>	2014-03-09 09:23:08		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-09 09:23:08		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 09:23:08		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('14279', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 09:23:08		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 09:23:08		192.168.12.117	14279	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 09:23:10		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-09 09:23:10		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394326390'
<?PHP exit;?>	2014-03-09 09:23:10		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394328190', '192168012')
<?PHP exit;?>	2014-03-09 09:23:10		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-09 09:23:10		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394328190',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-09 09:23:10		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-09 09:23:10		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 09:23:10		192.168.12.117	14279	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 14279 and new = 1
<?PHP exit;?>	2014-03-09 09:23:42		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-09 09:23:42		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394326422'
<?PHP exit;?>	2014-03-09 09:23:42		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394328222', '192168012')
<?PHP exit;?>	2014-03-09 09:23:42		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-09 09:23:42		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394328222',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-09 09:23:42		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-09 09:23:42		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 09:23:42		192.168.12.117	14279	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-09 09:23:49		192.168.47.220	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='www.13693700607' and password=md5(concat('b99e1f622cfa88e7229ead8ee69dc839',salt))
<?PHP exit;?>	2014-03-09 09:23:49		192.168.47.220	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='4034'
<?PHP exit;?>	2014-03-09 09:23:49		192.168.47.220	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='4034' OR lastactivity<'1394326429'
<?PHP exit;?>	2014-03-09 09:23:49		192.168.47.220	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4034', 'www.13693700607', 'd1df734d6336d93ccbabce70c91f7976', '1394328229', '192168047')
<?PHP exit;?>	2014-03-09 09:23:49		192.168.47.220	4034	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='4034' AND rid='10'
<?PHP exit;?>	2014-03-09 09:23:49		192.168.47.220	4034	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394328229',credit='3',experience='5' WHERE clid='19059'
<?PHP exit;?>	2014-03-09 09:23:49		192.168.47.220	4034	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394328229',ip='192168047',credit=credit+3,experience=experience+5 WHERE uid='4034'
<?PHP exit;?>	2014-03-09 09:23:49		192.168.47.220	4034	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='4034'
<?PHP exit;?>	2014-03-09 09:23:49		192.168.47.220	4034	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4034' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 09:23:49		192.168.47.220	4034	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('4034', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 09:23:49		192.168.47.220	4034	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 09:23:49		192.168.47.220	4034	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 09:23:52		192.168.47.220	4034	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='4034'
<?PHP exit;?>	2014-03-09 09:23:52		192.168.47.220	4034	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='4034' OR lastactivity<'1394326432'
<?PHP exit;?>	2014-03-09 09:23:52		192.168.47.220	4034	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4034', 'www.13693700607', 'd1df734d6336d93ccbabce70c91f7976', '1394328232', '192168047')
<?PHP exit;?>	2014-03-09 09:23:52		192.168.47.220	4034	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='4034' AND rid='10'
<?PHP exit;?>	2014-03-09 09:23:52		192.168.47.220	4034	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394328232',ip='192168047' WHERE uid='4034'
<?PHP exit;?>	2014-03-09 09:23:52		192.168.47.220	4034	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='4034'
<?PHP exit;?>	2014-03-09 09:23:52		192.168.47.220	4034	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4034' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 09:23:52		192.168.47.220	4034	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 4034 and new = 1
<?PHP exit;?>	2014-03-09 09:24:04		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='14279'
<?PHP exit;?>	2014-03-09 09:24:04		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='14279' OR lastactivity<'1394326444'
<?PHP exit;?>	2014-03-09 09:24:04		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('14279', '11051275', '670b14728ad9902aecba32e22fa4f6bd', '1394328244', '192168012')
<?PHP exit;?>	2014-03-09 09:24:04		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='14279' AND rid='10'
<?PHP exit;?>	2014-03-09 09:24:04		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394328244',ip='192168012' WHERE uid='14279'
<?PHP exit;?>	2014-03-09 09:24:04		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='14279'
<?PHP exit;?>	2014-03-09 09:24:04		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='14279' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 09:24:04		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='14279'
<?PHP exit;?>	2014-03-09 09:24:04		192.168.12.117	14279	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43684
<?PHP exit;?>	2014-03-09 09:48:16		222.128.146.83	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='547800120@qq.com' and password=md5(concat('e4045d821e5703657047402bf341779e',salt))
<?PHP exit;?>	2014-03-09 09:48:16		222.128.146.83	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='28213'
<?PHP exit;?>	2014-03-09 09:48:16		222.128.146.83	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='28213' OR lastactivity<'1394327896'
<?PHP exit;?>	2014-03-09 09:48:16		222.128.146.83	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('28213', '547800120@qq.com', '667011c67adedc2ddb0eb7f315f31229', '1394329696', '222128146')
<?PHP exit;?>	2014-03-09 09:48:16		222.128.146.83	28213	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='28213' AND rid='10'
<?PHP exit;?>	2014-03-09 09:48:16		222.128.146.83	28213	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394329696',credit='3',experience='5' WHERE clid='130357'
<?PHP exit;?>	2014-03-09 09:48:16		222.128.146.83	28213	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394329696',ip='222128146',credit=credit+3,experience=experience+5 WHERE uid='28213'
<?PHP exit;?>	2014-03-09 09:48:16		222.128.146.83	28213	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='28213'
<?PHP exit;?>	2014-03-09 09:48:16		222.128.146.83	28213	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='28213' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 09:48:16		222.128.146.83	28213	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('28213', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 09:48:16		222.128.146.83	28213	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 09:48:16		222.128.146.83	28213	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 09:48:17		222.128.146.83	28213	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='28213'
<?PHP exit;?>	2014-03-09 09:48:17		222.128.146.83	28213	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='28213' OR lastactivity<'1394327897'
<?PHP exit;?>	2014-03-09 09:48:17		222.128.146.83	28213	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('28213', '547800120@qq.com', '667011c67adedc2ddb0eb7f315f31229', '1394329697', '222128146')
<?PHP exit;?>	2014-03-09 09:48:17		222.128.146.83	28213	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='28213' AND rid='10'
<?PHP exit;?>	2014-03-09 09:48:17		222.128.146.83	28213	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394329697',ip='222128146' WHERE uid='28213'
<?PHP exit;?>	2014-03-09 09:48:17		222.128.146.83	28213	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='28213'
<?PHP exit;?>	2014-03-09 09:48:17		222.128.146.83	28213	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='28213' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 09:48:17		222.128.146.83	28213	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 28213 and new = 1
<?PHP exit;?>	2014-03-09 09:57:39		192.168.47.251	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='974922865@qq.com' and password=md5(concat('fa29e6ed2d7e08040e90f562c1a5540e',salt))
<?PHP exit;?>	2014-03-09 09:57:39		192.168.47.251	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='17811'
<?PHP exit;?>	2014-03-09 09:57:39		192.168.47.251	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='17811' OR lastactivity<'1394328459'
<?PHP exit;?>	2014-03-09 09:57:39		192.168.47.251	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('17811', '974922865@qq.com', '670b14728ad9902aecba32e22fa4f6bd', '1394330259', '192168047')
<?PHP exit;?>	2014-03-09 09:57:39		192.168.47.251	17811	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='17811' AND rid='10'
<?PHP exit;?>	2014-03-09 09:57:39		192.168.47.251	17811	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394330259',credit='3',experience='5' WHERE clid='72135'
<?PHP exit;?>	2014-03-09 09:57:39		192.168.47.251	17811	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394330259',ip='192168047',credit=credit+3,experience=experience+5 WHERE uid='17811'
<?PHP exit;?>	2014-03-09 09:57:39		192.168.47.251	17811	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='17811'
<?PHP exit;?>	2014-03-09 09:57:39		192.168.47.251	17811	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='17811' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 09:57:39		192.168.47.251	17811	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('17811', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 09:57:39		192.168.47.251	17811	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 09:57:39		192.168.47.251	17811	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 09:57:40		192.168.47.251	17811	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='17811'
<?PHP exit;?>	2014-03-09 09:57:40		192.168.47.251	17811	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='17811' OR lastactivity<'1394328460'
<?PHP exit;?>	2014-03-09 09:57:40		192.168.47.251	17811	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('17811', '974922865@qq.com', '670b14728ad9902aecba32e22fa4f6bd', '1394330260', '192168047')
<?PHP exit;?>	2014-03-09 09:57:40		192.168.47.251	17811	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='17811' AND rid='10'
<?PHP exit;?>	2014-03-09 09:57:40		192.168.47.251	17811	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394330260',ip='192168047' WHERE uid='17811'
<?PHP exit;?>	2014-03-09 09:57:40		192.168.47.251	17811	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='17811'
<?PHP exit;?>	2014-03-09 09:57:40		192.168.47.251	17811	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='17811' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 09:57:40		192.168.47.251	17811	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 17811 and new = 1
<?PHP exit;?>	2014-03-09 09:58:13		192.168.47.251	17811	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='17811'
<?PHP exit;?>	2014-03-09 09:58:13		192.168.47.251	17811	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='17811' OR lastactivity<'1394328493'
<?PHP exit;?>	2014-03-09 09:58:13		192.168.47.251	17811	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('17811', '974922865@qq.com', '670b14728ad9902aecba32e22fa4f6bd', '1394330293', '192168047')
<?PHP exit;?>	2014-03-09 09:58:13		192.168.47.251	17811	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='17811' AND rid='10'
<?PHP exit;?>	2014-03-09 09:58:13		192.168.47.251	17811	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394330293',ip='192168047' WHERE uid='17811'
<?PHP exit;?>	2014-03-09 09:58:13		192.168.47.251	17811	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='17811'
<?PHP exit;?>	2014-03-09 09:58:13		192.168.47.251	17811	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='17811' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 09:58:13		192.168.47.251	17811	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='17811'
<?PHP exit;?>	2014-03-09 09:58:13		192.168.47.251	17811	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='17811'
<?PHP exit;?>	2014-03-09 09:58:13		192.168.47.251	17811	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='17811' OR lastactivity<'1394328493'
<?PHP exit;?>	2014-03-09 09:58:13		192.168.47.251	17811	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('17811', '974922865@qq.com', '670b14728ad9902aecba32e22fa4f6bd', '1394330293', '192168047')
<?PHP exit;?>	2014-03-09 09:58:13		192.168.47.251	17811	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='17811' AND rid='10'
<?PHP exit;?>	2014-03-09 09:58:13		192.168.47.251	17811	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394330293',ip='192168047' WHERE uid='17811'
<?PHP exit;?>	2014-03-09 09:58:13		192.168.47.251	17811	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='17811'
<?PHP exit;?>	2014-03-09 09:58:13		192.168.47.251	17811	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='17811' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 09:58:13		192.168.47.251	17811	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='17811'
<?PHP exit;?>	2014-03-09 09:58:13		192.168.47.251	17811	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43180
<?PHP exit;?>	2014-03-09 10:00:28		114.242.248.162	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='1029160657@qq.com' and password=md5(concat('15ab184bbc8407514abab0d9cfb58575',salt))
<?PHP exit;?>	2014-03-09 10:00:28		114.242.248.162	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='2873'
<?PHP exit;?>	2014-03-09 10:00:28		114.242.248.162	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='2873' OR lastactivity<'1394328628'
<?PHP exit;?>	2014-03-09 10:00:28		114.242.248.162	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2873', '1029160657@qq.com', '15ab184bbc8407514abab0d9cfb58575', '1394330428', '114242248')
<?PHP exit;?>	2014-03-09 10:00:28		114.242.248.162	2873	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='2873' AND rid='10'
<?PHP exit;?>	2014-03-09 10:00:28		114.242.248.162	2873	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394330428',ip='114242248' WHERE uid='2873'
<?PHP exit;?>	2014-03-09 10:00:28		114.242.248.162	2873	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='2873'
<?PHP exit;?>	2014-03-09 10:00:28		114.242.248.162	2873	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2873' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:00:31		114.242.248.162	2873	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='2873'
<?PHP exit;?>	2014-03-09 10:00:31		114.242.248.162	2873	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='2873' OR lastactivity<'1394328631'
<?PHP exit;?>	2014-03-09 10:00:31		114.242.248.162	2873	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2873', '1029160657@qq.com', '15ab184bbc8407514abab0d9cfb58575', '1394330431', '114242248')
<?PHP exit;?>	2014-03-09 10:00:31		114.242.248.162	2873	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='2873' AND rid='10'
<?PHP exit;?>	2014-03-09 10:00:31		114.242.248.162	2873	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394330431',ip='114242248' WHERE uid='2873'
<?PHP exit;?>	2014-03-09 10:00:31		114.242.248.162	2873	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='2873'
<?PHP exit;?>	2014-03-09 10:00:31		114.242.248.162	2873	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2873' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:00:31		114.242.248.162	2873	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 2873 and new = 1
<?PHP exit;?>	2014-03-09 10:33:36		172.16.25.205	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='2915529483@qq.com' and password=md5(concat('6253abb6a187f6ea98ab7385d984467f',salt))
<?PHP exit;?>	2014-03-09 10:33:36		172.16.25.205	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='23104'
<?PHP exit;?>	2014-03-09 10:33:36		172.16.25.205	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='23104' OR lastactivity<'1394330616'
<?PHP exit;?>	2014-03-09 10:33:36		172.16.25.205	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23104', '2915529483@qq.com', '98d1b7f432e9bda116993c3f7a0c4e5d', '1394332416', '172016025')
<?PHP exit;?>	2014-03-09 10:33:36		172.16.25.205	23104	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='23104' AND rid='10'
<?PHP exit;?>	2014-03-09 10:33:36		172.16.25.205	23104	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394332416',credit='3',experience='5' WHERE clid='107534'
<?PHP exit;?>	2014-03-09 10:33:36		172.16.25.205	23104	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394332416',ip='172016025',credit=credit+3,experience=experience+5 WHERE uid='23104'
<?PHP exit;?>	2014-03-09 10:33:36		172.16.25.205	23104	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='23104'
<?PHP exit;?>	2014-03-09 10:33:36		172.16.25.205	23104	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23104' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:33:36		172.16.25.205	23104	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('23104', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 10:33:36		172.16.25.205	23104	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 10:33:36		172.16.25.205	23104	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 10:33:38		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23104'
<?PHP exit;?>	2014-03-09 10:33:38		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23104' OR lastactivity<'1394330618'
<?PHP exit;?>	2014-03-09 10:33:38		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23104', '2915529483@qq.com', '98d1b7f432e9bda116993c3f7a0c4e5d', '1394332418', '172016025')
<?PHP exit;?>	2014-03-09 10:33:38		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23104' AND rid='10'
<?PHP exit;?>	2014-03-09 10:33:38		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394332418',ip='172016025' WHERE uid='23104'
<?PHP exit;?>	2014-03-09 10:33:38		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23104'
<?PHP exit;?>	2014-03-09 10:33:38		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23104' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:33:38		172.16.25.205	23104	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23104 and new = 1
<?PHP exit;?>	2014-03-09 10:48:50		172.31.251.181	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='1182039493@qq.com' and password=md5(concat('f11f5b31dc8217b7451d4321e6326dab',salt))
<?PHP exit;?>	2014-03-09 10:48:50		172.31.251.181	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:48:50		172.31.251.181	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394331530'
<?PHP exit;?>	2014-03-09 10:48:50		172.31.251.181	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394333330', '172031251')
<?PHP exit;?>	2014-03-09 10:48:50		172.31.251.181	24548	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-09 10:48:50		172.31.251.181	24548	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394333330',credit='3',experience='5' WHERE clid='112593'
<?PHP exit;?>	2014-03-09 10:48:50		172.31.251.181	24548	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394333330',ip='172031251',credit=credit+3,experience=experience+5 WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:48:50		172.31.251.181	24548	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:48:50		172.31.251.181	24548	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:48:50		172.31.251.181	24548	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('24548', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 10:48:50		172.31.251.181	24548	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 10:48:50		172.31.251.181	24548	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 10:48:52		172.31.251.181	24548	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:48:52		172.31.251.181	24548	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394331532'
<?PHP exit;?>	2014-03-09 10:48:52		172.31.251.181	24548	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394333332', '172031251')
<?PHP exit;?>	2014-03-09 10:48:52		172.31.251.181	24548	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-09 10:48:52		172.31.251.181	24548	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394333332',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:48:52		172.31.251.181	24548	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:48:52		172.31.251.181	24548	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:48:52		172.31.251.181	24548	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 24548 and new = 1
<?PHP exit;?>	2014-03-09 10:48:54		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:48:54		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394331534'
<?PHP exit;?>	2014-03-09 10:48:54		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394333334', '172031251')
<?PHP exit;?>	2014-03-09 10:48:54		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-09 10:48:54		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394333334',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:48:54		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:48:54		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:48:54		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65132 LIMIT 0,20
<?PHP exit;?>	2014-03-09 10:48:54		172.31.251.181	24548	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('8555')
<?PHP exit;?>	2014-03-09 10:48:54		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:48:54		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394331534'
<?PHP exit;?>	2014-03-09 10:48:54		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394333334', '172031251')
<?PHP exit;?>	2014-03-09 10:48:54		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-09 10:48:54		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394333334',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:48:54		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:48:54		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:48:54		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-09 10:49:15		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:49:15		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394331555'
<?PHP exit;?>	2014-03-09 10:49:15		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394333355', '172031251')
<?PHP exit;?>	2014-03-09 10:49:15		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-09 10:49:15		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394333355',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:49:15		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:49:15		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:49:15		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65132 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-09 10:49:15		172.31.251.181	24548	/plugin/mobile/do_getsharereplylist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('24962','23650')
<?PHP exit;?>	2014-03-09 10:49:37		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:49:37		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394331577'
<?PHP exit;?>	2014-03-09 10:49:37		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394333377', '172031251')
<?PHP exit;?>	2014-03-09 10:49:37		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-09 10:49:37		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	UPDATE ihome_space SET lastlogin='1394333377',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:49:37		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:49:37		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:49:37		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-09 10:49:37		172.31.251.181	24548	/plugin/mobile/do_getbloglist.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.viewnum,b.replynum,b.dateline FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '24548' ORDER BY b.dateline DESC LIMIT 0,20
<?PHP exit;?>	2014-03-09 10:49:40		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:49:40		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394331580'
<?PHP exit;?>	2014-03-09 10:49:40		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394333380', '172031251')
<?PHP exit;?>	2014-03-09 10:49:40		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-09 10:49:40		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394333380',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:49:40		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:49:40		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:49:40		172.31.251.181	24548	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-09 10:49:40		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:49:40		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='24548' OR lastactivity<'1394331580'
<?PHP exit;?>	2014-03-09 10:49:40		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('24548', '1182039493@qq.com', '9281cdd292f80ff772af5dff9493067c', '1394333380', '172031251')
<?PHP exit;?>	2014-03-09 10:49:40		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='24548' AND rid='10'
<?PHP exit;?>	2014-03-09 10:49:40		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394333380',ip='172031251' WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:49:40		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='24548'
<?PHP exit;?>	2014-03-09 10:49:40		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='24548' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:49:40		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='24548'
<?PHP exit;?>	2014-03-09 10:49:40		172.31.251.181	24548	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=42540
<?PHP exit;?>	2014-03-09 10:52:35		111.196.84.24	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='bhuyuqingguo@gmail.com' and password=md5(concat('40d51d0c1681d7b0d3145a5a242cced6',salt))
<?PHP exit;?>	2014-03-09 10:52:35		111.196.84.24	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='30471'
<?PHP exit;?>	2014-03-09 10:52:35		111.196.84.24	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='30471' OR lastactivity<'1394331755'
<?PHP exit;?>	2014-03-09 10:52:35		111.196.84.24	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('30471', 'bhuyuqingguo@gmail.com', '5c60f2894f8b1c64aaf8dc4d20f6e5a9', '1394333555', '111196084')
<?PHP exit;?>	2014-03-09 10:52:35		111.196.84.24	30471	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='30471' AND rid='10'
<?PHP exit;?>	2014-03-09 10:52:35		111.196.84.24	30471	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394333555',ip='111196084' WHERE uid='30471'
<?PHP exit;?>	2014-03-09 10:52:35		111.196.84.24	30471	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='30471'
<?PHP exit;?>	2014-03-09 10:52:35		111.196.84.24	30471	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='30471' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:52:37		111.196.84.24	30471	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='30471'
<?PHP exit;?>	2014-03-09 10:52:37		111.196.84.24	30471	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='30471' OR lastactivity<'1394331757'
<?PHP exit;?>	2014-03-09 10:52:37		111.196.84.24	30471	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('30471', 'bhuyuqingguo@gmail.com', '5c60f2894f8b1c64aaf8dc4d20f6e5a9', '1394333557', '111196084')
<?PHP exit;?>	2014-03-09 10:52:37		111.196.84.24	30471	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='30471' AND rid='10'
<?PHP exit;?>	2014-03-09 10:52:37		111.196.84.24	30471	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394333557',ip='111196084' WHERE uid='30471'
<?PHP exit;?>	2014-03-09 10:52:37		111.196.84.24	30471	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='30471'
<?PHP exit;?>	2014-03-09 10:52:37		111.196.84.24	30471	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='30471' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:52:37		111.196.84.24	30471	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 30471 and new = 1
<?PHP exit;?>	2014-03-09 10:53:30		192.168.13.23	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='ihome_mobile' and password=md5(concat('66ecbfdaef34e3a75712bca5c2c53c9a',salt))
<?PHP exit;?>	2014-03-09 10:53:30		192.168.13.23	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:53:30		192.168.13.23	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394331810'
<?PHP exit;?>	2014-03-09 10:53:30		192.168.13.23	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394333610', '192168013')
<?PHP exit;?>	2014-03-09 10:53:30		192.168.13.23	29970	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 10:53:30		192.168.13.23	29970	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394333610',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:53:30		192.168.13.23	29970	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:53:30		192.168.13.23	29970	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:53:38		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:53:38		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394331818'
<?PHP exit;?>	2014-03-09 10:53:38		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394333618', '192168013')
<?PHP exit;?>	2014-03-09 10:53:38		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 10:53:38		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394333618',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:53:38		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:53:38		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:53:38		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47432 LIMIT 0,20
<?PHP exit;?>	2014-03-09 10:53:38		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('26982')
<?PHP exit;?>	2014-03-09 10:53:38		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:53:38		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394331818'
<?PHP exit;?>	2014-03-09 10:53:38		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394333618', '192168013')
<?PHP exit;?>	2014-03-09 10:53:38		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 10:53:38		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394333618',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:53:38		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:53:38		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:53:38		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47432 LIMIT 0,20
<?PHP exit;?>	2014-03-09 10:53:54		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:53:54		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394331834'
<?PHP exit;?>	2014-03-09 10:53:54		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394333634', '192168013')
<?PHP exit;?>	2014-03-09 10:53:54		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 10:53:54		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394333634',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:53:54		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:53:54		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:53:54		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47431 LIMIT 0,20
<?PHP exit;?>	2014-03-09 10:53:54		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('1145')
<?PHP exit;?>	2014-03-09 10:53:54		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:53:54		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394331834'
<?PHP exit;?>	2014-03-09 10:53:54		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394333634', '192168013')
<?PHP exit;?>	2014-03-09 10:53:54		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 10:53:54		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394333634',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:53:54		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:53:54		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:53:54		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47431 LIMIT 0,20
<?PHP exit;?>	2014-03-09 10:53:58		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:53:58		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394331838'
<?PHP exit;?>	2014-03-09 10:53:58		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394333638', '192168013')
<?PHP exit;?>	2014-03-09 10:53:58		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 10:53:58		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394333638',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:53:58		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:53:58		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:53:58		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 3
<?PHP exit;?>	2014-03-09 10:53:58		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-09 10:53:58		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='29970' AND fuid='3' LIMIT 1
<?PHP exit;?>	2014-03-09 10:53:58		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='3' AND fuid='29970' LIMIT 1
<?PHP exit;?>	2014-03-09 10:54:04		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:04		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394331844'
<?PHP exit;?>	2014-03-09 10:54:04		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394333644', '192168013')
<?PHP exit;?>	2014-03-09 10:54:04		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 10:54:04		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394333644',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:04		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:04		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:54:04		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47430 LIMIT 0,20
<?PHP exit;?>	2014-03-09 10:54:04		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('2534')
<?PHP exit;?>	2014-03-09 10:54:04		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:04		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394331844'
<?PHP exit;?>	2014-03-09 10:54:04		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394333644', '192168013')
<?PHP exit;?>	2014-03-09 10:54:04		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 10:54:04		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394333644',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:04		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:04		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:54:04		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47430 LIMIT 0,20
<?PHP exit;?>	2014-03-09 10:54:16		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:16		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394331856'
<?PHP exit;?>	2014-03-09 10:54:16		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394333656', '192168013')
<?PHP exit;?>	2014-03-09 10:54:16		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 10:54:16		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394333656',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:16		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:16		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:54:16		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65222 LIMIT 0,20
<?PHP exit;?>	2014-03-09 10:54:16		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23723')
<?PHP exit;?>	2014-03-09 10:54:16		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:16		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394331856'
<?PHP exit;?>	2014-03-09 10:54:16		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394333656', '192168013')
<?PHP exit;?>	2014-03-09 10:54:16		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 10:54:16		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394333656',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:16		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:16		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:54:16		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47397 LIMIT 0,20
<?PHP exit;?>	2014-03-09 10:54:16		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('90')
<?PHP exit;?>	2014-03-09 10:54:20		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:20		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394331860'
<?PHP exit;?>	2014-03-09 10:54:20		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394333660', '192168013')
<?PHP exit;?>	2014-03-09 10:54:20		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 10:54:20		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394333660',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:20		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:20		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:54:20		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47397 LIMIT 0,20
<?PHP exit;?>	2014-03-09 10:54:20		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('90')
<?PHP exit;?>	2014-03-09 10:54:20		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:20		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394331860'
<?PHP exit;?>	2014-03-09 10:54:20		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394333660', '192168013')
<?PHP exit;?>	2014-03-09 10:54:20		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 10:54:20		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394333660',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:20		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:20		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:54:20		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47397 LIMIT 0,20
<?PHP exit;?>	2014-03-09 10:54:20		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23147','24225','3336','90','24071')
<?PHP exit;?>	2014-03-09 10:54:54		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:54		192.168.13.23	29970	/plugin/mobile/do_getnews.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394331894'
<?PHP exit;?>	2014-03-09 10:54:54		192.168.13.23	29970	/plugin/mobile/do_getnews.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394333694', '192168013')
<?PHP exit;?>	2014-03-09 10:54:54		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 10:54:54		192.168.13.23	29970	/plugin/mobile/do_getnews.php	UPDATE ihome_space SET lastlogin='1394333694',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:54		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 10:54:54		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 10:54:54		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-09 10:54:54		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.dateline,bf.message FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '18054' ORDER BY b.dateline DESC LIMIT 0,20
<?PHP exit;?>	2014-03-09 10:54:54		192.168.13.23	29970	/plugin/mobile/do_getnews.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('18054')
<?PHP exit;?>	2014-03-09 11:10:58		192.168.119.29	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='11051147' and password=md5(concat('eb24d084dcc54e1820800441b5e24ab3',salt))
<?PHP exit;?>	2014-03-09 11:10:58		192.168.119.29	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:10:58		192.168.119.29	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394332858'
<?PHP exit;?>	2014-03-09 11:10:58		192.168.119.29	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394334658', '192168119')
<?PHP exit;?>	2014-03-09 11:10:58		192.168.119.29	5000	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:10:58		192.168.119.29	5000	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394334658',credit='3',experience='5' WHERE clid='23838'
<?PHP exit;?>	2014-03-09 11:10:58		192.168.119.29	5000	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394334658',ip='192168119',credit=credit+3,experience=experience+5 WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:10:58		192.168.119.29	5000	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:10:58		192.168.119.29	5000	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:10:58		192.168.119.29	5000	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('5000', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 11:10:58		192.168.119.29	5000	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 11:10:58		192.168.119.29	5000	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 11:11:00		192.168.119.29	5000	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:11:00		192.168.119.29	5000	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394332860'
<?PHP exit;?>	2014-03-09 11:11:00		192.168.119.29	5000	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394334660', '192168119')
<?PHP exit;?>	2014-03-09 11:11:00		192.168.119.29	5000	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:11:00		192.168.119.29	5000	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394334660',ip='192168119' WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:11:00		192.168.119.29	5000	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:11:00		192.168.119.29	5000	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:11:00		192.168.119.29	5000	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 5000 and new = 1
<?PHP exit;?>	2014-03-09 11:16:14		111.195.201.23	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='12031167' and password=md5(concat('b7012387cdcb5d3d62a967435d604740',salt))
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='2390325879@qq.com' and password=md5(concat('2f217c19ce37fe42e5dc8472084eea3c',salt))
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='2558'
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='2558' OR lastactivity<'1394333476'
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2558', '2390325879@qq.com', 'c1b4abac9cd127df1501fc0fdb8135c3', '1394335276', '111195138')
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	2558	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='2558' AND rid='10'
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	2558	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394335276',credit='3',experience='5' WHERE clid='11124'
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	2558	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394335276',ip='111195138',credit=credit+3,experience=experience+5 WHERE uid='2558'
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	2558	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='2558'
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	2558	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2558' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	2558	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('2558', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	2558	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	2558	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	2558	/plugin/mobile/do_getuserinfo.php	SELECT password FROM ihome_member WHERE uid='2558'
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	2558	/plugin/mobile/do_getuserinfo.php	DELETE FROM ihome_session WHERE uid='2558' OR lastactivity<'1394333476'
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	2558	/plugin/mobile/do_getuserinfo.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2558', '2390325879@qq.com', 'c1b4abac9cd127df1501fc0fdb8135c3', '1394335276', '111195138')
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	2558	/plugin/mobile/do_getuserinfo.php	SELECT * FROM ihome_creditlog WHERE uid='2558' AND rid='10'
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	2558	/plugin/mobile/do_getuserinfo.php	UPDATE ihome_space SET lastlogin='1394335276',ip='111195138' WHERE uid='2558'
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	2558	/plugin/mobile/do_getuserinfo.php	SELECT * FROM ihome_spacelog WHERE uid='2558'
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	2558	/plugin/mobile/do_getuserinfo.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2558' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	2558	/plugin/mobile/do_getuserinfo.php	SELECT s.uid,s.name,ug.grouptitle,sf.note,s.friendnum ,s.threadnum,s.blognum,sf.privacy FROM ihome_space s   				, ihome_spacefield sf ,ihome_usergroup ug where s.uid=sf.uid and s.groupid=ug.gid                  and s.uid =2558
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	2558	/plugin/mobile/do_getuserinfo.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('2558')
<?PHP exit;?>	2014-03-09 11:21:16		111.195.138.199	2558	/plugin/mobile/do_getuserinfo.php	SELECT  friend  FROM  ihome_spacefield  WHERE uid = 2558
<?PHP exit;?>	2014-03-09 11:21:18		111.195.138.199	2558	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='2558'
<?PHP exit;?>	2014-03-09 11:21:18		111.195.138.199	2558	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='2558' OR lastactivity<'1394333478'
<?PHP exit;?>	2014-03-09 11:21:18		111.195.138.199	2558	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2558', '2390325879@qq.com', 'c1b4abac9cd127df1501fc0fdb8135c3', '1394335278', '111195138')
<?PHP exit;?>	2014-03-09 11:21:18		111.195.138.199	2558	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='2558' AND rid='10'
<?PHP exit;?>	2014-03-09 11:21:18		111.195.138.199	2558	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394335278',ip='111195138' WHERE uid='2558'
<?PHP exit;?>	2014-03-09 11:21:18		111.195.138.199	2558	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='2558'
<?PHP exit;?>	2014-03-09 11:21:18		111.195.138.199	2558	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2558' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:21:18		111.195.138.199	2558	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 2558 and new = 1
<?PHP exit;?>	2014-03-09 11:25:50		172.16.219.50	2558	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='2558'
<?PHP exit;?>	2014-03-09 11:25:50		172.16.219.50	2558	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='2558' OR lastactivity<'1394333750'
<?PHP exit;?>	2014-03-09 11:25:50		172.16.219.50	2558	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2558', '2390325879@qq.com', 'c1b4abac9cd127df1501fc0fdb8135c3', '1394335550', '172016219')
<?PHP exit;?>	2014-03-09 11:25:50		172.16.219.50	2558	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='2558' AND rid='10'
<?PHP exit;?>	2014-03-09 11:25:50		172.16.219.50	2558	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394335550',ip='172016219' WHERE uid='2558'
<?PHP exit;?>	2014-03-09 11:25:50		172.16.219.50	2558	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='2558'
<?PHP exit;?>	2014-03-09 11:25:50		172.16.219.50	2558	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2558' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:25:50		172.16.219.50	2558	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 2558 and new = 1
<?PHP exit;?>	2014-03-09 11:26:31		172.16.219.50	2558	/plugin/mobile/do_getnews.php	SELECT password FROM ihome_member WHERE uid='2558'
<?PHP exit;?>	2014-03-09 11:26:31		172.16.219.50	2558	/plugin/mobile/do_getnews.php	DELETE FROM ihome_session WHERE uid='2558' OR lastactivity<'1394333791'
<?PHP exit;?>	2014-03-09 11:26:31		172.16.219.50	2558	/plugin/mobile/do_getnews.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2558', '2390325879@qq.com', 'c1b4abac9cd127df1501fc0fdb8135c3', '1394335591', '172016219')
<?PHP exit;?>	2014-03-09 11:26:31		172.16.219.50	2558	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_creditlog WHERE uid='2558' AND rid='10'
<?PHP exit;?>	2014-03-09 11:26:31		172.16.219.50	2558	/plugin/mobile/do_getnews.php	UPDATE ihome_space SET lastlogin='1394335591',ip='172016219' WHERE uid='2558'
<?PHP exit;?>	2014-03-09 11:26:31		172.16.219.50	2558	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_spacelog WHERE uid='2558'
<?PHP exit;?>	2014-03-09 11:26:31		172.16.219.50	2558	/plugin/mobile/do_getnews.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2558' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:26:31		172.16.219.50	2558	/plugin/mobile/do_getnews.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='2558'
<?PHP exit;?>	2014-03-09 11:26:31		172.16.219.50	2558	/plugin/mobile/do_getnews.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.dateline,bf.message FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '18054' ORDER BY b.dateline DESC LIMIT 0,20
<?PHP exit;?>	2014-03-09 11:26:31		172.16.219.50	2558	/plugin/mobile/do_getnews.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('18054')
<?PHP exit;?>	2014-03-09 11:32:51		192.168.119.29	5000	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:32:51		192.168.119.29	5000	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394334171'
<?PHP exit;?>	2014-03-09 11:32:51		192.168.119.29	5000	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394335971', '192168119')
<?PHP exit;?>	2014-03-09 11:32:51		192.168.119.29	5000	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:32:51		192.168.119.29	5000	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394335971',ip='192168119' WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:32:51		192.168.119.29	5000	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:32:51		192.168.119.29	5000	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:32:51		192.168.119.29	5000	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 5000 and new = 1
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394334177'
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394335977', '192168119')
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394335977',ip='192168119' WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65193 LIMIT 0,20
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('17674')
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394334177'
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394335977', '192168119')
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394335977',ip='192168119' WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='5000'
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394334177'
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394335977', '192168119')
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394335977',ip='192168119' WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:32:57		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65193 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394334275'
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394336075', '192168119')
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394336075',ip='192168119' WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=64941 LIMIT 0,20
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('17200')
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394334275'
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394336075', '192168119')
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394336075',ip='192168119' WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='5000'
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394334275'
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394336075', '192168119')
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394336075',ip='192168119' WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:34:35		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=64941 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-09 11:35:19		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:35:19		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394334319'
<?PHP exit;?>	2014-03-09 11:35:19		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394336119', '192168119')
<?PHP exit;?>	2014-03-09 11:35:19		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:35:19		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394336119',ip='192168119' WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:35:19		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:35:19		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:35:19		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='5000'
<?PHP exit;?>	2014-03-09 11:35:19		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:35:19		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394334319'
<?PHP exit;?>	2014-03-09 11:35:19		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394336119', '192168119')
<?PHP exit;?>	2014-03-09 11:35:19		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:35:19		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394336119',ip='192168119' WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:35:19		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:35:19		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:35:19		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='5000'
<?PHP exit;?>	2014-03-09 11:35:19		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43651
<?PHP exit;?>	2014-03-09 11:36:09		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:09		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394334369'
<?PHP exit;?>	2014-03-09 11:36:09		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394336169', '192168119')
<?PHP exit;?>	2014-03-09 11:36:09		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:36:09		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394336169',ip='192168119' WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:09		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:09		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:36:09		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='5000'
<?PHP exit;?>	2014-03-09 11:36:09		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:09		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394334369'
<?PHP exit;?>	2014-03-09 11:36:09		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394336169', '192168119')
<?PHP exit;?>	2014-03-09 11:36:09		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:36:09		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394336169',ip='192168119' WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:09		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:09		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:36:09		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='5000'
<?PHP exit;?>	2014-03-09 11:36:09		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43587
<?PHP exit;?>	2014-03-09 11:36:27		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:27		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394334387'
<?PHP exit;?>	2014-03-09 11:36:27		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394336187', '192168119')
<?PHP exit;?>	2014-03-09 11:36:27		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:36:27		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394336187',ip='192168119' WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:27		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:27		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:36:27		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='5000'
<?PHP exit;?>	2014-03-09 11:36:27		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:27		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394334387'
<?PHP exit;?>	2014-03-09 11:36:27		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394336187', '192168119')
<?PHP exit;?>	2014-03-09 11:36:27		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:36:27		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394336187',ip='192168119' WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:27		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:27		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:36:27		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='5000'
<?PHP exit;?>	2014-03-09 11:36:27		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43586
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394334418'
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394336218', '192168119')
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394336218',ip='192168119' WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=64486 LIMIT 0,20
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('17674')
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394334418'
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394336218', '192168119')
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394336218',ip='192168119' WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='5000'
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394334418'
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394336218', '192168119')
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394336218',ip='192168119' WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:36:58		192.168.119.29	5000	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=64486 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-09 11:37:07		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:37:07		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394334427'
<?PHP exit;?>	2014-03-09 11:37:07		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394336227', '192168119')
<?PHP exit;?>	2014-03-09 11:37:07		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:37:07		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394336227',ip='192168119' WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:37:07		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:37:07		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:37:07		192.168.119.29	5000	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='5000'
<?PHP exit;?>	2014-03-09 11:37:07		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT password FROM ihome_member WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:37:07		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	DELETE FROM ihome_session WHERE uid='5000' OR lastactivity<'1394334427'
<?PHP exit;?>	2014-03-09 11:37:07		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('5000', '11051147', 'eb24d084dcc54e1820800441b5e24ab3', '1394336227', '192168119')
<?PHP exit;?>	2014-03-09 11:37:07		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='5000' AND rid='10'
<?PHP exit;?>	2014-03-09 11:37:07		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	UPDATE ihome_space SET lastlogin='1394336227',ip='192168119' WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:37:07		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='5000'
<?PHP exit;?>	2014-03-09 11:37:07		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='5000' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 11:37:07		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='5000'
<?PHP exit;?>	2014-03-09 11:37:07		192.168.119.29	5000	/plugin/mobile/do_getblogreplylist.php	SELECT bf.target_ids, b.uid,b.friend, FROM ihome_blog b left join ihome_blogfield bf  on b.blogid=bf.blogid where  b.blogid=43516
<?PHP exit;?>	2014-03-09 12:15:14		172.16.64.17	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='1250135090@qq.com' and password=md5(concat('b83b1351d6646b5b470292722d44e09f',salt))
<?PHP exit;?>	2014-03-09 12:15:14		172.16.64.17	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='23432'
<?PHP exit;?>	2014-03-09 12:15:14		172.16.64.17	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='23432' OR lastactivity<'1394336714'
<?PHP exit;?>	2014-03-09 12:15:14		172.16.64.17	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23432', '1250135090@qq.com', 'b83b1351d6646b5b470292722d44e09f', '1394338514', '172016064')
<?PHP exit;?>	2014-03-09 12:15:14		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='23432' AND rid='10'
<?PHP exit;?>	2014-03-09 12:15:14		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394338514',credit='3',experience='5' WHERE clid='108627'
<?PHP exit;?>	2014-03-09 12:15:14		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394338514',ip='172016064',credit=credit+3,experience=experience+5 WHERE uid='23432'
<?PHP exit;?>	2014-03-09 12:15:14		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='23432'
<?PHP exit;?>	2014-03-09 12:15:14		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23432' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 12:15:14		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('23432', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 12:15:14		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 12:15:14		172.16.64.17	23432	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 12:15:16		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23432'
<?PHP exit;?>	2014-03-09 12:15:16		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23432' OR lastactivity<'1394336716'
<?PHP exit;?>	2014-03-09 12:15:16		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23432', '1250135090@qq.com', 'b83b1351d6646b5b470292722d44e09f', '1394338516', '172016064')
<?PHP exit;?>	2014-03-09 12:15:16		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23432' AND rid='10'
<?PHP exit;?>	2014-03-09 12:15:16		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394338516',ip='172016064' WHERE uid='23432'
<?PHP exit;?>	2014-03-09 12:15:16		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23432'
<?PHP exit;?>	2014-03-09 12:15:16		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23432' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 12:15:16		172.16.64.17	23432	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23432 and new = 1
<?PHP exit;?>	2014-03-09 12:37:27		111.195.199.160	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='tudelaty' and password=md5(concat('ea07ed882eca86a14a1736be1a08b7c8',salt))
<?PHP exit;?>	2014-03-09 12:37:27		111.195.199.160	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='23388'
<?PHP exit;?>	2014-03-09 12:37:27		111.195.199.160	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='23388' OR lastactivity<'1394338047'
<?PHP exit;?>	2014-03-09 12:37:27		111.195.199.160	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23388', 'tudelaty', 'ea07ed882eca86a14a1736be1a08b7c8', '1394339847', '111195199')
<?PHP exit;?>	2014-03-09 12:37:27		111.195.199.160	23388	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='23388' AND rid='10'
<?PHP exit;?>	2014-03-09 12:37:27		111.195.199.160	23388	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394339847',credit='3',experience='5' WHERE clid='108456'
<?PHP exit;?>	2014-03-09 12:37:27		111.195.199.160	23388	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394339847',ip='111195199',credit=credit+3,experience=experience+5 WHERE uid='23388'
<?PHP exit;?>	2014-03-09 12:37:27		111.195.199.160	23388	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='23388'
<?PHP exit;?>	2014-03-09 12:37:27		111.195.199.160	23388	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23388' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 12:37:27		111.195.199.160	23388	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('23388', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 12:37:27		111.195.199.160	23388	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 12:37:27		111.195.199.160	23388	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 12:37:29		111.195.199.160	23388	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23388'
<?PHP exit;?>	2014-03-09 12:37:29		111.195.199.160	23388	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23388' OR lastactivity<'1394338049'
<?PHP exit;?>	2014-03-09 12:37:29		111.195.199.160	23388	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23388', 'tudelaty', 'ea07ed882eca86a14a1736be1a08b7c8', '1394339849', '111195199')
<?PHP exit;?>	2014-03-09 12:37:29		111.195.199.160	23388	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23388' AND rid='10'
<?PHP exit;?>	2014-03-09 12:37:29		111.195.199.160	23388	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394339849',ip='111195199' WHERE uid='23388'
<?PHP exit;?>	2014-03-09 12:37:29		111.195.199.160	23388	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23388'
<?PHP exit;?>	2014-03-09 12:37:29		111.195.199.160	23388	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23388' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 12:37:29		111.195.199.160	23388	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23388 and new = 1
<?PHP exit;?>	2014-03-09 12:48:46		114.242.248.70	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='13774066021cy@sina.com' and password=md5(concat('f399ce4f09804a0b125e7d613649391b',salt))
<?PHP exit;?>	2014-03-09 12:48:46		114.242.248.70	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='23971'
<?PHP exit;?>	2014-03-09 12:48:46		114.242.248.70	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='23971' OR lastactivity<'1394338726'
<?PHP exit;?>	2014-03-09 12:48:46		114.242.248.70	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23971', '13774066021cy@sina.com', 'a7f813a1f372cd3946aa47009a00f485', '1394340526', '114242248')
<?PHP exit;?>	2014-03-09 12:48:46		114.242.248.70	23971	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='23971' AND rid='10'
<?PHP exit;?>	2014-03-09 12:48:46		114.242.248.70	23971	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394340526',credit='3',experience='5' WHERE clid='110423'
<?PHP exit;?>	2014-03-09 12:48:46		114.242.248.70	23971	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394340526',ip='114242248',credit=credit+3,experience=experience+5 WHERE uid='23971'
<?PHP exit;?>	2014-03-09 12:48:46		114.242.248.70	23971	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='23971'
<?PHP exit;?>	2014-03-09 12:48:46		114.242.248.70	23971	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23971' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 12:48:46		114.242.248.70	23971	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('23971', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 12:48:46		114.242.248.70	23971	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 12:48:46		114.242.248.70	23971	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 12:48:48		114.242.248.70	23971	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23971'
<?PHP exit;?>	2014-03-09 12:48:48		114.242.248.70	23971	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23971' OR lastactivity<'1394338728'
<?PHP exit;?>	2014-03-09 12:48:48		114.242.248.70	23971	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23971', '13774066021cy@sina.com', 'a7f813a1f372cd3946aa47009a00f485', '1394340528', '114242248')
<?PHP exit;?>	2014-03-09 12:48:48		114.242.248.70	23971	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23971' AND rid='10'
<?PHP exit;?>	2014-03-09 12:48:48		114.242.248.70	23971	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394340528',ip='114242248' WHERE uid='23971'
<?PHP exit;?>	2014-03-09 12:48:48		114.242.248.70	23971	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23971'
<?PHP exit;?>	2014-03-09 12:48:48		114.242.248.70	23971	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23971' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 12:48:48		114.242.248.70	23971	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23971 and new = 1
<?PHP exit;?>	2014-03-09 12:49:49		114.242.248.70	23971	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='23971'
<?PHP exit;?>	2014-03-09 12:49:49		114.242.248.70	23971	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='23971' OR lastactivity<'1394338789'
<?PHP exit;?>	2014-03-09 12:49:49		114.242.248.70	23971	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23971', '13774066021cy@sina.com', 'a7f813a1f372cd3946aa47009a00f485', '1394340589', '114242248')
<?PHP exit;?>	2014-03-09 12:49:49		114.242.248.70	23971	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='23971' AND rid='10'
<?PHP exit;?>	2014-03-09 12:49:49		114.242.248.70	23971	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394340589',ip='114242248' WHERE uid='23971'
<?PHP exit;?>	2014-03-09 12:49:49		114.242.248.70	23971	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='23971'
<?PHP exit;?>	2014-03-09 12:49:49		114.242.248.70	23971	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23971' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 12:49:49		114.242.248.70	23971	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65132 LIMIT 0,20
<?PHP exit;?>	2014-03-09 12:49:49		114.242.248.70	23971	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('8555')
<?PHP exit;?>	2014-03-09 12:49:49		114.242.248.70	23971	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='23971'
<?PHP exit;?>	2014-03-09 12:49:49		114.242.248.70	23971	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='23971' OR lastactivity<'1394338789'
<?PHP exit;?>	2014-03-09 12:49:49		114.242.248.70	23971	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23971', '13774066021cy@sina.com', 'a7f813a1f372cd3946aa47009a00f485', '1394340589', '114242248')
<?PHP exit;?>	2014-03-09 12:49:49		114.242.248.70	23971	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='23971' AND rid='10'
<?PHP exit;?>	2014-03-09 12:49:49		114.242.248.70	23971	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394340589',ip='114242248' WHERE uid='23971'
<?PHP exit;?>	2014-03-09 12:49:49		114.242.248.70	23971	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='23971'
<?PHP exit;?>	2014-03-09 12:49:49		114.242.248.70	23971	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23971' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 12:49:49		114.242.248.70	23971	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='23971'
<?PHP exit;?>	2014-03-09 12:50:11		114.242.248.70	23971	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='23971'
<?PHP exit;?>	2014-03-09 12:50:11		114.242.248.70	23971	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='23971' OR lastactivity<'1394338811'
<?PHP exit;?>	2014-03-09 12:50:11		114.242.248.70	23971	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23971', '13774066021cy@sina.com', 'a7f813a1f372cd3946aa47009a00f485', '1394340611', '114242248')
<?PHP exit;?>	2014-03-09 12:50:11		114.242.248.70	23971	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='23971' AND rid='10'
<?PHP exit;?>	2014-03-09 12:50:11		114.242.248.70	23971	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394340611',ip='114242248' WHERE uid='23971'
<?PHP exit;?>	2014-03-09 12:50:11		114.242.248.70	23971	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='23971'
<?PHP exit;?>	2014-03-09 12:50:11		114.242.248.70	23971	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23971' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 12:50:11		114.242.248.70	23971	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65132 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-09 12:50:11		114.242.248.70	23971	/plugin/mobile/do_getsharereplylist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('24962','23650')
<?PHP exit;?>	2014-03-09 13:39:03		172.16.64.205	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='dpc_work@163.com' and password=md5(concat('e8f015f7eedeee68db89e3a52a3a3761',salt))
<?PHP exit;?>	2014-03-09 13:39:03		172.16.64.205	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:39:03		172.16.64.205	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='25058' OR lastactivity<'1394341743'
<?PHP exit;?>	2014-03-09 13:39:03		172.16.64.205	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25058', 'dpc_work@163.com', 'e8f015f7eedeee68db89e3a52a3a3761', '1394343543', '172016064')
<?PHP exit;?>	2014-03-09 13:39:03		172.16.64.205	25058	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='25058' AND rid='10'
<?PHP exit;?>	2014-03-09 13:39:03		172.16.64.205	25058	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394343543',credit='3',experience='5' WHERE clid='114411'
<?PHP exit;?>	2014-03-09 13:39:03		172.16.64.205	25058	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394343543',ip='172016064',credit=credit+3,experience=experience+5 WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:39:03		172.16.64.205	25058	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:39:03		172.16.64.205	25058	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25058' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 13:39:03		172.16.64.205	25058	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('25058', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 13:39:03		172.16.64.205	25058	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 13:39:03		172.16.64.205	25058	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 13:39:17		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:39:17		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='25058' OR lastactivity<'1394341757'
<?PHP exit;?>	2014-03-09 13:39:17		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25058', 'dpc_work@163.com', 'e8f015f7eedeee68db89e3a52a3a3761', '1394343557', '172016064')
<?PHP exit;?>	2014-03-09 13:39:17		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='25058' AND rid='10'
<?PHP exit;?>	2014-03-09 13:39:17		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394343557',ip='172016064' WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:39:17		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:39:17		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25058' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 13:39:17		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 25058 and new = 1
<?PHP exit;?>	2014-03-09 13:39:33		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:39:33		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='25058' OR lastactivity<'1394341773'
<?PHP exit;?>	2014-03-09 13:39:33		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25058', 'dpc_work@163.com', 'e8f015f7eedeee68db89e3a52a3a3761', '1394343573', '172016064')
<?PHP exit;?>	2014-03-09 13:39:33		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='25058' AND rid='10'
<?PHP exit;?>	2014-03-09 13:39:33		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394343573',ip='172016064' WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:39:33		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:39:33		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25058' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 13:39:33		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=64251 LIMIT 0,20
<?PHP exit;?>	2014-03-09 13:39:33		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('8292')
<?PHP exit;?>	2014-03-09 13:39:38		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:39:38		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='25058' OR lastactivity<'1394341778'
<?PHP exit;?>	2014-03-09 13:39:38		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25058', 'dpc_work@163.com', 'e8f015f7eedeee68db89e3a52a3a3761', '1394343578', '172016064')
<?PHP exit;?>	2014-03-09 13:39:38		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='25058' AND rid='10'
<?PHP exit;?>	2014-03-09 13:39:38		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394343578',ip='172016064' WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:39:38		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:39:38		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25058' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 13:39:38		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='25058'
<?PHP exit;?>	2014-03-09 13:44:00		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:00		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='25058' OR lastactivity<'1394342040'
<?PHP exit;?>	2014-03-09 13:44:00		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25058', 'dpc_work@163.com', 'e8f015f7eedeee68db89e3a52a3a3761', '1394343840', '172016064')
<?PHP exit;?>	2014-03-09 13:44:00		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='25058' AND rid='10'
<?PHP exit;?>	2014-03-09 13:44:00		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394343840',ip='172016064' WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:00		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:00		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25058' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 13:44:00		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65184 LIMIT 0,20
<?PHP exit;?>	2014-03-09 13:44:00		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23147')
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='25058' OR lastactivity<'1394342041'
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25058', 'dpc_work@163.com', 'e8f015f7eedeee68db89e3a52a3a3761', '1394343841', '172016064')
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='25058' AND rid='10'
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394343841',ip='172016064' WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25058' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65184 LIMIT 0,20
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23147')
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='25058' OR lastactivity<'1394342041'
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25058', 'dpc_work@163.com', 'e8f015f7eedeee68db89e3a52a3a3761', '1394343841', '172016064')
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='25058' AND rid='10'
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394343841',ip='172016064' WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25058' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='25058'
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='25058' OR lastactivity<'1394342041'
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25058', 'dpc_work@163.com', 'e8f015f7eedeee68db89e3a52a3a3761', '1394343841', '172016064')
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='25058' AND rid='10'
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394343841',ip='172016064' WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25058' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 13:44:01		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 25058 and new = 1
<?PHP exit;?>	2014-03-09 13:44:02		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:02		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='25058' OR lastactivity<'1394342042'
<?PHP exit;?>	2014-03-09 13:44:02		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25058', 'dpc_work@163.com', 'e8f015f7eedeee68db89e3a52a3a3761', '1394343842', '172016064')
<?PHP exit;?>	2014-03-09 13:44:02		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='25058' AND rid='10'
<?PHP exit;?>	2014-03-09 13:44:02		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394343842',ip='172016064' WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:02		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:02		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25058' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 13:44:02		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='25058'
<?PHP exit;?>	2014-03-09 13:44:03		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:03		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='25058' OR lastactivity<'1394342043'
<?PHP exit;?>	2014-03-09 13:44:03		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25058', 'dpc_work@163.com', 'e8f015f7eedeee68db89e3a52a3a3761', '1394343843', '172016064')
<?PHP exit;?>	2014-03-09 13:44:03		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='25058' AND rid='10'
<?PHP exit;?>	2014-03-09 13:44:03		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394343843',ip='172016064' WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:03		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:03		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25058' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 13:44:03		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65184 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-09 13:44:04		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:04		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='25058' OR lastactivity<'1394342044'
<?PHP exit;?>	2014-03-09 13:44:04		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25058', 'dpc_work@163.com', 'e8f015f7eedeee68db89e3a52a3a3761', '1394343844', '172016064')
<?PHP exit;?>	2014-03-09 13:44:04		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='25058' AND rid='10'
<?PHP exit;?>	2014-03-09 13:44:04		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394343844',ip='172016064' WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:04		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='25058'
<?PHP exit;?>	2014-03-09 13:44:04		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25058' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 13:44:04		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65184 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-09 14:24:49		114.242.250.119	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='liuqibinandy@163.com' and password=md5(concat('8b86042b41876c86b769145e9e262d2c',salt))
<?PHP exit;?>	2014-03-09 14:24:49		114.242.250.119	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='22716'
<?PHP exit;?>	2014-03-09 14:24:49		114.242.250.119	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='22716' OR lastactivity<'1394344489'
<?PHP exit;?>	2014-03-09 14:24:49		114.242.250.119	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('22716', 'liuqibinandy@163.com', '17c30bf351c29f45ad8fb6e319c72faf', '1394346289', '114242250')
<?PHP exit;?>	2014-03-09 14:24:49		114.242.250.119	22716	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='22716' AND rid='10'
<?PHP exit;?>	2014-03-09 14:24:49		114.242.250.119	22716	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394346289',credit='3',experience='5' WHERE clid='106210'
<?PHP exit;?>	2014-03-09 14:24:49		114.242.250.119	22716	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394346289',ip='114242250',credit=credit+3,experience=experience+5 WHERE uid='22716'
<?PHP exit;?>	2014-03-09 14:24:49		114.242.250.119	22716	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='22716'
<?PHP exit;?>	2014-03-09 14:24:49		114.242.250.119	22716	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='22716' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 14:24:49		114.242.250.119	22716	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('22716', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 14:24:49		114.242.250.119	22716	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 14:24:49		114.242.250.119	22716	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 14:24:50		114.242.250.119	22716	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='22716'
<?PHP exit;?>	2014-03-09 14:24:50		114.242.250.119	22716	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='22716' OR lastactivity<'1394344490'
<?PHP exit;?>	2014-03-09 14:24:50		114.242.250.119	22716	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('22716', 'liuqibinandy@163.com', '17c30bf351c29f45ad8fb6e319c72faf', '1394346290', '114242250')
<?PHP exit;?>	2014-03-09 14:24:50		114.242.250.119	22716	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='22716' AND rid='10'
<?PHP exit;?>	2014-03-09 14:24:50		114.242.250.119	22716	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394346290',ip='114242250' WHERE uid='22716'
<?PHP exit;?>	2014-03-09 14:24:50		114.242.250.119	22716	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='22716'
<?PHP exit;?>	2014-03-09 14:24:50		114.242.250.119	22716	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='22716' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 14:24:50		114.242.250.119	22716	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 22716 and new = 1
<?PHP exit;?>	2014-03-09 14:38:43		114.242.250.247	4034	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='4034'
<?PHP exit;?>	2014-03-09 14:38:43		114.242.250.247	4034	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='4034' OR lastactivity<'1394345323'
<?PHP exit;?>	2014-03-09 14:38:43		114.242.250.247	4034	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4034', 'www.13693700607', 'd1df734d6336d93ccbabce70c91f7976', '1394347123', '114242250')
<?PHP exit;?>	2014-03-09 14:38:43		114.242.250.247	4034	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='4034' AND rid='10'
<?PHP exit;?>	2014-03-09 14:38:43		114.242.250.247	4034	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394347123',ip='114242250' WHERE uid='4034'
<?PHP exit;?>	2014-03-09 14:38:43		114.242.250.247	4034	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='4034'
<?PHP exit;?>	2014-03-09 14:38:43		114.242.250.247	4034	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4034' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 14:38:43		114.242.250.247	4034	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 4034 and new = 1
<?PHP exit;?>	2014-03-09 14:47:38		111.195.197.66	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='502933519@qq.com' and password=md5(concat('76af357c6d064e0f392be3e26d633faa',salt))
<?PHP exit;?>	2014-03-09 14:47:38		111.195.197.66	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='4572'
<?PHP exit;?>	2014-03-09 14:47:38		111.195.197.66	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='4572' OR lastactivity<'1394345858'
<?PHP exit;?>	2014-03-09 14:47:38		111.195.197.66	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4572', '502933519@qq.com', '76af357c6d064e0f392be3e26d633faa', '1394347658', '111195197')
<?PHP exit;?>	2014-03-09 14:47:38		111.195.197.66	4572	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='4572' AND rid='10'
<?PHP exit;?>	2014-03-09 14:47:38		111.195.197.66	4572	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394347658',credit='3',experience='5' WHERE clid='21731'
<?PHP exit;?>	2014-03-09 14:47:38		111.195.197.66	4572	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394347658',ip='111195197',credit=credit+3,experience=experience+5 WHERE uid='4572'
<?PHP exit;?>	2014-03-09 14:47:38		111.195.197.66	4572	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='4572'
<?PHP exit;?>	2014-03-09 14:47:38		111.195.197.66	4572	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4572' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 14:47:38		111.195.197.66	4572	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('4572', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 14:47:38		111.195.197.66	4572	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 14:47:38		111.195.197.66	4572	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 14:47:40		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='4572'
<?PHP exit;?>	2014-03-09 14:47:40		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='4572' OR lastactivity<'1394345860'
<?PHP exit;?>	2014-03-09 14:47:40		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4572', '502933519@qq.com', '76af357c6d064e0f392be3e26d633faa', '1394347660', '111195197')
<?PHP exit;?>	2014-03-09 14:47:40		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='4572' AND rid='10'
<?PHP exit;?>	2014-03-09 14:47:40		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394347660',ip='111195197' WHERE uid='4572'
<?PHP exit;?>	2014-03-09 14:47:40		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='4572'
<?PHP exit;?>	2014-03-09 14:47:40		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4572' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 14:47:40		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 4572 and new = 1
<?PHP exit;?>	2014-03-09 15:18:02		111.195.138.143	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='617573276' and password=md5(concat('ae8b809f1674cff7c4a0e02b87b25a19',salt))
<?PHP exit;?>	2014-03-09 15:18:02		111.195.138.143	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:18:02		111.195.138.143	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='22743' OR lastactivity<'1394347682'
<?PHP exit;?>	2014-03-09 15:18:02		111.195.138.143	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('22743', '617573276', 'e3aed4687d1d1eb48629dd10fe8f5696', '1394349482', '111195138')
<?PHP exit;?>	2014-03-09 15:18:02		111.195.138.143	22743	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='22743' AND rid='10'
<?PHP exit;?>	2014-03-09 15:18:02		111.195.138.143	22743	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394349482',credit='3',experience='5' WHERE clid='106296'
<?PHP exit;?>	2014-03-09 15:18:02		111.195.138.143	22743	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394349482',ip='111195138',credit=credit+3,experience=experience+5 WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:18:02		111.195.138.143	22743	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:18:02		111.195.138.143	22743	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='22743' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:18:02		111.195.138.143	22743	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('22743', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 15:18:02		111.195.138.143	22743	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 15:18:02		111.195.138.143	22743	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 15:18:03		111.195.138.143	22743	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:18:03		111.195.138.143	22743	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='22743' OR lastactivity<'1394347683'
<?PHP exit;?>	2014-03-09 15:18:03		111.195.138.143	22743	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('22743', '617573276', 'e3aed4687d1d1eb48629dd10fe8f5696', '1394349483', '111195138')
<?PHP exit;?>	2014-03-09 15:18:03		111.195.138.143	22743	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='22743' AND rid='10'
<?PHP exit;?>	2014-03-09 15:18:03		111.195.138.143	22743	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394349483',ip='111195138' WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:18:03		111.195.138.143	22743	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:18:03		111.195.138.143	22743	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='22743' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:18:03		111.195.138.143	22743	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 22743 and new = 1
<?PHP exit;?>	2014-03-09 15:18:23		111.195.138.143	22743	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:18:23		111.195.138.143	22743	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='22743' OR lastactivity<'1394347703'
<?PHP exit;?>	2014-03-09 15:18:23		111.195.138.143	22743	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('22743', '617573276', 'e3aed4687d1d1eb48629dd10fe8f5696', '1394349503', '111195138')
<?PHP exit;?>	2014-03-09 15:18:23		111.195.138.143	22743	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='22743' AND rid='10'
<?PHP exit;?>	2014-03-09 15:18:23		111.195.138.143	22743	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394349503',ip='111195138' WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:18:23		111.195.138.143	22743	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:18:23		111.195.138.143	22743	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='22743' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:18:23		111.195.138.143	22743	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65216 LIMIT 0,20
<?PHP exit;?>	2014-03-09 15:18:23		111.195.138.143	22743	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('24199')
<?PHP exit;?>	2014-03-09 15:18:24		111.195.138.143	22743	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:18:24		111.195.138.143	22743	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='22743' OR lastactivity<'1394347704'
<?PHP exit;?>	2014-03-09 15:18:24		111.195.138.143	22743	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('22743', '617573276', 'e3aed4687d1d1eb48629dd10fe8f5696', '1394349504', '111195138')
<?PHP exit;?>	2014-03-09 15:18:24		111.195.138.143	22743	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='22743' AND rid='10'
<?PHP exit;?>	2014-03-09 15:18:24		111.195.138.143	22743	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394349504',ip='111195138' WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:18:24		111.195.138.143	22743	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:18:24		111.195.138.143	22743	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='22743' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:18:24		111.195.138.143	22743	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='22743'
<?PHP exit;?>	2014-03-09 15:18:24		111.195.138.143	22743	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:18:24		111.195.138.143	22743	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='22743' OR lastactivity<'1394347704'
<?PHP exit;?>	2014-03-09 15:18:24		111.195.138.143	22743	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('22743', '617573276', 'e3aed4687d1d1eb48629dd10fe8f5696', '1394349504', '111195138')
<?PHP exit;?>	2014-03-09 15:18:24		111.195.138.143	22743	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='22743' AND rid='10'
<?PHP exit;?>	2014-03-09 15:18:24		111.195.138.143	22743	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394349504',ip='111195138' WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:18:24		111.195.138.143	22743	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:18:24		111.195.138.143	22743	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='22743' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:18:24		111.195.138.143	22743	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65216 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	SELECT password FROM ihome_member WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	DELETE FROM ihome_session WHERE uid='22743' OR lastactivity<'1394347718'
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('22743', '617573276', 'e3aed4687d1d1eb48629dd10fe8f5696', '1394349518', '111195138')
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_creditlog WHERE uid='22743' AND rid='10'
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	UPDATE ihome_space SET lastlogin='1394349518',ip='111195138' WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_spacelog WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='22743' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_album WHERE albumid='5330' LIMIT 1
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	SELECT status FROM ihome_friend WHERE uid='22743' AND fuid='23658' LIMIT 1
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_pic WHERE albumid='5330' ORDER BY dateline DESC LIMIT 0,100
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='71068' LIMIT 1
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='71067' LIMIT 1
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='71066' LIMIT 1
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='71065' LIMIT 1
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='71064' LIMIT 1
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='71063' LIMIT 1
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='71062' LIMIT 1
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='71061' LIMIT 1
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='71060' LIMIT 1
<?PHP exit;?>	2014-03-09 15:18:38		111.195.138.143	22743	/plugin/mobile/do_getalbumpic.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23658')
<?PHP exit;?>	2014-03-09 15:19:42		111.195.138.143	22743	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:19:42		111.195.138.143	22743	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='22743' OR lastactivity<'1394347782'
<?PHP exit;?>	2014-03-09 15:19:42		111.195.138.143	22743	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('22743', '617573276', 'e3aed4687d1d1eb48629dd10fe8f5696', '1394349582', '111195138')
<?PHP exit;?>	2014-03-09 15:19:42		111.195.138.143	22743	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='22743' AND rid='10'
<?PHP exit;?>	2014-03-09 15:19:42		111.195.138.143	22743	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394349582',ip='111195138' WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:19:42		111.195.138.143	22743	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:19:42		111.195.138.143	22743	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='22743' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:19:42		111.195.138.143	22743	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47365 LIMIT 0,20
<?PHP exit;?>	2014-03-09 15:19:42		111.195.138.143	22743	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('14108')
<?PHP exit;?>	2014-03-09 15:19:42		111.195.138.143	22743	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:19:42		111.195.138.143	22743	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='22743' OR lastactivity<'1394347782'
<?PHP exit;?>	2014-03-09 15:19:42		111.195.138.143	22743	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('22743', '617573276', 'e3aed4687d1d1eb48629dd10fe8f5696', '1394349582', '111195138')
<?PHP exit;?>	2014-03-09 15:19:42		111.195.138.143	22743	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='22743' AND rid='10'
<?PHP exit;?>	2014-03-09 15:19:42		111.195.138.143	22743	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394349582',ip='111195138' WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:19:42		111.195.138.143	22743	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='22743'
<?PHP exit;?>	2014-03-09 15:19:42		111.195.138.143	22743	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='22743' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:19:42		111.195.138.143	22743	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47365 LIMIT 0,20
<?PHP exit;?>	2014-03-09 15:19:42		111.195.138.143	22743	/plugin/mobile/do_gettherecordingreply.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('2185','14108','29357','887')
<?PHP exit;?>	2014-03-09 15:21:20		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='25058'
<?PHP exit;?>	2014-03-09 15:21:20		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='25058' OR lastactivity<'1394347880'
<?PHP exit;?>	2014-03-09 15:21:20		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25058', 'dpc_work@163.com', 'e8f015f7eedeee68db89e3a52a3a3761', '1394349680', '172016064')
<?PHP exit;?>	2014-03-09 15:21:20		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='25058' AND rid='10'
<?PHP exit;?>	2014-03-09 15:21:20		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394349680',ip='172016064' WHERE uid='25058'
<?PHP exit;?>	2014-03-09 15:21:20		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='25058'
<?PHP exit;?>	2014-03-09 15:21:20		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25058' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:21:20		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 25058 and new = 1
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='25058'
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='25058' OR lastactivity<'1394347881'
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25058', 'dpc_work@163.com', 'e8f015f7eedeee68db89e3a52a3a3761', '1394349681', '172016064')
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='25058' AND rid='10'
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394349681',ip='172016064' WHERE uid='25058'
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='25058'
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25058' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65184 LIMIT 0,20
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23147')
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='25058'
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='25058' OR lastactivity<'1394347881'
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25058', 'dpc_work@163.com', 'e8f015f7eedeee68db89e3a52a3a3761', '1394349681', '172016064')
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='25058' AND rid='10'
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394349681',ip='172016064' WHERE uid='25058'
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='25058'
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25058' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='25058'
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='25058'
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='25058' OR lastactivity<'1394347881'
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25058', 'dpc_work@163.com', 'e8f015f7eedeee68db89e3a52a3a3761', '1394349681', '172016064')
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='25058' AND rid='10'
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394349681',ip='172016064' WHERE uid='25058'
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='25058'
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25058' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:21:21		172.16.64.205	25058	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=65184 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-09 15:21:28		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='25058'
<?PHP exit;?>	2014-03-09 15:21:28		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='25058' OR lastactivity<'1394347888'
<?PHP exit;?>	2014-03-09 15:21:28		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('25058', 'dpc_work@163.com', 'e8f015f7eedeee68db89e3a52a3a3761', '1394349688', '172016064')
<?PHP exit;?>	2014-03-09 15:21:28		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='25058' AND rid='10'
<?PHP exit;?>	2014-03-09 15:21:28		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394349688',ip='172016064' WHERE uid='25058'
<?PHP exit;?>	2014-03-09 15:21:28		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='25058'
<?PHP exit;?>	2014-03-09 15:21:28		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='25058' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:21:28		172.16.64.205	25058	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 25058 and new = 1
<?PHP exit;?>	2014-03-09 15:43:44		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:43:44		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394349224'
<?PHP exit;?>	2014-03-09 15:43:44		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394351024', '192168013')
<?PHP exit;?>	2014-03-09 15:43:44		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 15:43:44		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394351024',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:43:44		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:43:44		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:43:44		192.168.13.23	29970	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 29970 and new = 1
<?PHP exit;?>	2014-03-09 15:43:54		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:43:54		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394349234'
<?PHP exit;?>	2014-03-09 15:43:54		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394351034', '192168013')
<?PHP exit;?>	2014-03-09 15:43:54		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 15:43:54		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394351034',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:43:54		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:43:54		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:43:54		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 22716
<?PHP exit;?>	2014-03-09 15:43:54		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-09 15:43:54		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='29970' AND fuid='22716' LIMIT 1
<?PHP exit;?>	2014-03-09 15:43:54		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='22716' AND fuid='29970' LIMIT 1
<?PHP exit;?>	2014-03-09 15:43:58		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:43:58		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394349238'
<?PHP exit;?>	2014-03-09 15:43:58		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394351038', '192168013')
<?PHP exit;?>	2014-03-09 15:43:58		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 15:43:58		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394351038',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:43:58		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:43:58		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:43:58		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47439 LIMIT 0,20
<?PHP exit;?>	2014-03-09 15:43:58		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('1260')
<?PHP exit;?>	2014-03-09 15:43:58		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:43:58		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394349238'
<?PHP exit;?>	2014-03-09 15:43:58		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394351038', '192168013')
<?PHP exit;?>	2014-03-09 15:43:58		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 15:43:58		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394351038',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:43:58		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:43:58		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:43:58		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47439 LIMIT 0,20
<?PHP exit;?>	2014-03-09 15:44:09		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:09		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394349249'
<?PHP exit;?>	2014-03-09 15:44:09		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394351049', '192168013')
<?PHP exit;?>	2014-03-09 15:44:09		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 15:44:09		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394351049',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:09		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:09		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:09		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47436 LIMIT 0,20
<?PHP exit;?>	2014-03-09 15:44:09		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23147')
<?PHP exit;?>	2014-03-09 15:44:09		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:09		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394349249'
<?PHP exit;?>	2014-03-09 15:44:09		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394351049', '192168013')
<?PHP exit;?>	2014-03-09 15:44:09		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 15:44:09		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394351049',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:09		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:09		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:09		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47436 LIMIT 0,20
<?PHP exit;?>	2014-03-09 15:44:09		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('15022')
<?PHP exit;?>	2014-03-09 15:44:19		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:19		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394349259'
<?PHP exit;?>	2014-03-09 15:44:19		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394351059', '192168013')
<?PHP exit;?>	2014-03-09 15:44:19		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 15:44:19		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	UPDATE ihome_space SET lastlogin='1394351059',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:19		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:19		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:19		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT username,name FROM ihome_space where uid = 15022
<?PHP exit;?>	2014-03-09 15:44:19		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-09 15:44:19		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='29970' AND fuid='15022' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:19		192.168.13.23	29970	/plugin/mobile/do_cpfriend.php	SELECT status FROM ihome_friend WHERE uid='15022' AND fuid='29970' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:25		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:25		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394349265'
<?PHP exit;?>	2014-03-09 15:44:25		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394351065', '192168013')
<?PHP exit;?>	2014-03-09 15:44:25		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 15:44:25		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394351065',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:25		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:25		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:25		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=65236 LIMIT 0,20
<?PHP exit;?>	2014-03-09 15:44:25		192.168.13.23	29970	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('1016')
<?PHP exit;?>	2014-03-09 15:44:25		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:25		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394349265'
<?PHP exit;?>	2014-03-09 15:44:25		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394351065', '192168013')
<?PHP exit;?>	2014-03-09 15:44:25		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 15:44:25		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394351065',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:25		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:25		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:25		192.168.13.23	29970	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='29970'
<?PHP exit;?>	2014-03-09 15:44:30		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:30		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394349270'
<?PHP exit;?>	2014-03-09 15:44:30		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394351070', '192168013')
<?PHP exit;?>	2014-03-09 15:44:30		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 15:44:30		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	UPDATE ihome_space SET lastlogin='1394351070',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:30		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:30		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:30		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid,username,uid,message,dateline,doid,image_1 FROM ihome_doing  where doid=47434 LIMIT 0,20
<?PHP exit;?>	2014-03-09 15:44:30		192.168.13.23	29970	/plugin/mobile/do_gettherecording.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('1473')
<?PHP exit;?>	2014-03-09 15:44:30		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:30		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394349270'
<?PHP exit;?>	2014-03-09 15:44:30		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394351070', '192168013')
<?PHP exit;?>	2014-03-09 15:44:30		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 15:44:30		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	UPDATE ihome_space SET lastlogin='1394351070',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:30		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:30		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:30		192.168.13.23	29970	/plugin/mobile/do_gettherecordingreply.php	SELECT uid,username,id,message,dateline FROM ihome_docomment  where doid=47434 LIMIT 0,20
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394349275'
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394351075', '192168013')
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	UPDATE ihome_space SET lastlogin='1394351075',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_album WHERE albumid='3231' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_pic WHERE albumid='3231' ORDER BY dateline DESC LIMIT 0,100
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70825' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70824' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70823' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70739' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70738' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70737' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63218' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63217' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63216' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='59854' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='59853' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='59852' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='59755' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='59754' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='59753' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='59440' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='59439' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='59438' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='55141' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='54486' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='37576' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='37026' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='36927' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='36857' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='36856' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='36855' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='36396' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='36272' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='36235' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='36200' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:35		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23850')
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394349278'
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394351078', '192168013')
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	UPDATE ihome_space SET lastlogin='1394351078',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_album WHERE albumid='3231' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_pic WHERE albumid='3231' ORDER BY dateline DESC LIMIT 0,100
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70825' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70824' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70823' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70739' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70738' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='70737' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63218' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63217' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63216' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='59854' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='59853' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='59852' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='59755' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='59754' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='59753' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='59440' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='59439' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='59438' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='55141' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='54486' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='37576' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='37026' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='36927' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='36857' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='36856' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='36855' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='36396' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='36272' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='36235' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='36200' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:38		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23850')
<?PHP exit;?>	2014-03-09 15:44:49		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:49		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394349289'
<?PHP exit;?>	2014-03-09 15:44:49		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394351089', '192168013')
<?PHP exit;?>	2014-03-09 15:44:49		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 15:44:49		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	UPDATE ihome_space SET lastlogin='1394351089',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:49		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:49		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:49		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT a.picid,a.albumid,a.dateline,a.title,a.filepath,b.albumname,b.username,b.uid FROM ihome_pic a, ihome_album b WHERE picid='63218' and a.albumid=b.albumid and a.uid=b.uid limit 1
<?PHP exit;?>	2014-03-09 15:44:49		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63218' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:49		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23850')
<?PHP exit;?>	2014-03-09 15:44:49		192.168.13.23	29970	/plugin/mobile/do_getalbumreplylist.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:49		192.168.13.23	29970	/plugin/mobile/do_getalbumreplylist.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394349289'
<?PHP exit;?>	2014-03-09 15:44:49		192.168.13.23	29970	/plugin/mobile/do_getalbumreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394351089', '192168013')
<?PHP exit;?>	2014-03-09 15:44:49		192.168.13.23	29970	/plugin/mobile/do_getalbumreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 15:44:49		192.168.13.23	29970	/plugin/mobile/do_getalbumreplylist.php	UPDATE ihome_space SET lastlogin='1394351089',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:49		192.168.13.23	29970	/plugin/mobile/do_getalbumreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:49		192.168.13.23	29970	/plugin/mobile/do_getalbumreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:49		192.168.13.23	29970	/plugin/mobile/do_getalbumreplylist.php	SELECT authorid,cid,message,dateline FROM ihome_comment  where id=63218 and idtype='picid' order by dateline desc LIMIT 0,20
<?PHP exit;?>	2014-03-09 15:44:49		192.168.13.23	29970	/plugin/mobile/do_getalbumreplylist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('25072')
<?PHP exit;?>	2014-03-09 15:44:59		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:59		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394349299'
<?PHP exit;?>	2014-03-09 15:44:59		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394351099', '192168013')
<?PHP exit;?>	2014-03-09 15:44:59		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 15:44:59		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	UPDATE ihome_space SET lastlogin='1394351099',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:59		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:59		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:59		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT a.picid,a.albumid,a.dateline,a.title,a.filepath,b.albumname,b.username,b.uid FROM ihome_pic a, ihome_album b WHERE picid='63218' and a.albumid=b.albumid and a.uid=b.uid limit 1
<?PHP exit;?>	2014-03-09 15:44:59		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT COUNT(*) FROM ihome_comment WHERE `idtype`='picid' AND `id`='63218' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:59		192.168.13.23	29970	/plugin/mobile/do_getalbumpic.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('23850')
<?PHP exit;?>	2014-03-09 15:44:59		192.168.13.23	29970	/plugin/mobile/do_getalbumreplylist.php	SELECT password FROM ihome_member WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:59		192.168.13.23	29970	/plugin/mobile/do_getalbumreplylist.php	DELETE FROM ihome_session WHERE uid='29970' OR lastactivity<'1394349299'
<?PHP exit;?>	2014-03-09 15:44:59		192.168.13.23	29970	/plugin/mobile/do_getalbumreplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('29970', 'ihome_mobile', 'e58239b3636202e181b67635ac8b5b19', '1394351099', '192168013')
<?PHP exit;?>	2014-03-09 15:44:59		192.168.13.23	29970	/plugin/mobile/do_getalbumreplylist.php	SELECT * FROM ihome_creditlog WHERE uid='29970' AND rid='10'
<?PHP exit;?>	2014-03-09 15:44:59		192.168.13.23	29970	/plugin/mobile/do_getalbumreplylist.php	UPDATE ihome_space SET lastlogin='1394351099',ip='192168013' WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:59		192.168.13.23	29970	/plugin/mobile/do_getalbumreplylist.php	SELECT * FROM ihome_spacelog WHERE uid='29970'
<?PHP exit;?>	2014-03-09 15:44:59		192.168.13.23	29970	/plugin/mobile/do_getalbumreplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='29970' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 15:44:59		192.168.13.23	29970	/plugin/mobile/do_getalbumreplylist.php	SELECT authorid,cid,message,dateline FROM ihome_comment  where id=63218 and idtype='picid' order by dateline desc LIMIT 0,20
<?PHP exit;?>	2014-03-09 15:44:59		192.168.13.23	29970	/plugin/mobile/do_getalbumreplylist.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('25072')
<?PHP exit;?>	2014-03-09 16:53:21		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='4572'
<?PHP exit;?>	2014-03-09 16:53:21		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='4572' OR lastactivity<'1394353401'
<?PHP exit;?>	2014-03-09 16:53:21		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4572', '502933519@qq.com', '76af357c6d064e0f392be3e26d633faa', '1394355201', '111195197')
<?PHP exit;?>	2014-03-09 16:53:21		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='4572' AND rid='10'
<?PHP exit;?>	2014-03-09 16:53:21		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394355201',ip='111195197' WHERE uid='4572'
<?PHP exit;?>	2014-03-09 16:53:21		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='4572'
<?PHP exit;?>	2014-03-09 16:53:21		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4572' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 16:53:21		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 4572 and new = 1
<?PHP exit;?>	2014-03-09 16:53:23		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='4572'
<?PHP exit;?>	2014-03-09 16:53:23		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='4572' OR lastactivity<'1394353403'
<?PHP exit;?>	2014-03-09 16:53:23		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4572', '502933519@qq.com', '76af357c6d064e0f392be3e26d633faa', '1394355203', '111195197')
<?PHP exit;?>	2014-03-09 16:53:23		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='4572' AND rid='10'
<?PHP exit;?>	2014-03-09 16:53:23		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394355203',ip='111195197' WHERE uid='4572'
<?PHP exit;?>	2014-03-09 16:53:23		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='4572'
<?PHP exit;?>	2014-03-09 16:53:23		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4572' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 16:53:23		111.195.197.66	4572	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 4572 and new = 1
<?PHP exit;?>	2014-03-09 16:53:31		111.195.197.66	4572	/plugin/mobile/do_getnews.php	SELECT password FROM ihome_member WHERE uid='4572'
<?PHP exit;?>	2014-03-09 16:53:31		111.195.197.66	4572	/plugin/mobile/do_getnews.php	DELETE FROM ihome_session WHERE uid='4572' OR lastactivity<'1394353411'
<?PHP exit;?>	2014-03-09 16:53:31		111.195.197.66	4572	/plugin/mobile/do_getnews.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('4572', '502933519@qq.com', '76af357c6d064e0f392be3e26d633faa', '1394355211', '111195197')
<?PHP exit;?>	2014-03-09 16:53:31		111.195.197.66	4572	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_creditlog WHERE uid='4572' AND rid='10'
<?PHP exit;?>	2014-03-09 16:53:31		111.195.197.66	4572	/plugin/mobile/do_getnews.php	UPDATE ihome_space SET lastlogin='1394355211',ip='111195197' WHERE uid='4572'
<?PHP exit;?>	2014-03-09 16:53:31		111.195.197.66	4572	/plugin/mobile/do_getnews.php	SELECT * FROM ihome_spacelog WHERE uid='4572'
<?PHP exit;?>	2014-03-09 16:53:31		111.195.197.66	4572	/plugin/mobile/do_getnews.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='4572' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 16:53:31		111.195.197.66	4572	/plugin/mobile/do_getnews.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='4572'
<?PHP exit;?>	2014-03-09 16:53:31		111.195.197.66	4572	/plugin/mobile/do_getnews.php	SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.dateline,bf.message FROM ihome_blog b LEFT JOIN ihome_blogfield bf ON bf.blogid=b.blogid  		WHERE b.uid =  '18054' ORDER BY b.dateline DESC LIMIT 0,20
<?PHP exit;?>	2014-03-09 16:53:31		111.195.197.66	4572	/plugin/mobile/do_getnews.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('18054')
<?PHP exit;?>	2014-03-09 16:58:14		123.120.39.159	0	/plugin/mobile/do_mobileaccess.php	select uid from `ihome`.ihomeuser_members where username='39231220' and password=md5(concat('d7993b0df8a87ec955b1ae02543dd9dd',salt))
<?PHP exit;?>	2014-03-09 16:58:14		123.120.39.159	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='18160'
<?PHP exit;?>	2014-03-09 16:58:14		123.120.39.159	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='18160' OR lastactivity<'1394353694'
<?PHP exit;?>	2014-03-09 16:58:14		123.120.39.159	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('18160', '39231220', '83cdfe7bf2ac9e0129e8083399066147', '1394355494', '123120039')
<?PHP exit;?>	2014-03-09 16:58:14		123.120.39.159	18160	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='18160' AND rid='10'
<?PHP exit;?>	2014-03-09 16:58:14		123.120.39.159	18160	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394355494',credit='3',experience='5' WHERE clid='73726'
<?PHP exit;?>	2014-03-09 16:58:14		123.120.39.159	18160	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394355494',ip='123120039',credit=credit+3,experience=experience+5 WHERE uid='18160'
<?PHP exit;?>	2014-03-09 16:58:14		123.120.39.159	18160	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='18160'
<?PHP exit;?>	2014-03-09 16:58:14		123.120.39.159	18160	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='18160' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 16:58:14		123.120.39.159	18160	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('18160', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 16:58:14		123.120.39.159	18160	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 16:58:14		123.120.39.159	18160	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 16:58:15		123.120.39.159	18160	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='18160'
<?PHP exit;?>	2014-03-09 16:58:15		123.120.39.159	18160	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='18160' OR lastactivity<'1394353695'
<?PHP exit;?>	2014-03-09 16:58:15		123.120.39.159	18160	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('18160', '39231220', '83cdfe7bf2ac9e0129e8083399066147', '1394355495', '123120039')
<?PHP exit;?>	2014-03-09 16:58:15		123.120.39.159	18160	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='18160' AND rid='10'
<?PHP exit;?>	2014-03-09 16:58:15		123.120.39.159	18160	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394355495',ip='123120039' WHERE uid='18160'
<?PHP exit;?>	2014-03-09 16:58:15		123.120.39.159	18160	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='18160'
<?PHP exit;?>	2014-03-09 16:58:15		123.120.39.159	18160	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='18160' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 16:58:15		123.120.39.159	18160	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 18160 and new = 1
<?PHP exit;?>	2014-03-09 16:58:28		123.120.39.159	18160	/plugin/mobile/do_gettheshare.php	SELECT password FROM ihome_member WHERE uid='18160'
<?PHP exit;?>	2014-03-09 16:58:28		123.120.39.159	18160	/plugin/mobile/do_gettheshare.php	DELETE FROM ihome_session WHERE uid='18160' OR lastactivity<'1394353708'
<?PHP exit;?>	2014-03-09 16:58:28		123.120.39.159	18160	/plugin/mobile/do_gettheshare.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('18160', '39231220', '83cdfe7bf2ac9e0129e8083399066147', '1394355508', '123120039')
<?PHP exit;?>	2014-03-09 16:58:28		123.120.39.159	18160	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_creditlog WHERE uid='18160' AND rid='10'
<?PHP exit;?>	2014-03-09 16:58:28		123.120.39.159	18160	/plugin/mobile/do_gettheshare.php	UPDATE ihome_space SET lastlogin='1394355508',ip='123120039' WHERE uid='18160'
<?PHP exit;?>	2014-03-09 16:58:28		123.120.39.159	18160	/plugin/mobile/do_gettheshare.php	SELECT * FROM ihome_spacelog WHERE uid='18160'
<?PHP exit;?>	2014-03-09 16:58:28		123.120.39.159	18160	/plugin/mobile/do_gettheshare.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='18160' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 16:58:28		123.120.39.159	18160	/plugin/mobile/do_gettheshare.php	SELECT id,uid,type,dateline,body_template,body_general FROM ihome_share  where sid=64820 LIMIT 0,20
<?PHP exit;?>	2014-03-09 16:58:28		123.120.39.159	18160	/plugin/mobile/do_gettheshare.php	SELECT uid, name, namestatus FROM ihome_space WHERE uid IN ('13960')
<?PHP exit;?>	2014-03-09 16:58:28		123.120.39.159	18160	/plugin/mobile/do_gettheblog.php	SELECT password FROM ihome_member WHERE uid='18160'
<?PHP exit;?>	2014-03-09 16:58:28		123.120.39.159	18160	/plugin/mobile/do_gettheblog.php	DELETE FROM ihome_session WHERE uid='18160' OR lastactivity<'1394353708'
<?PHP exit;?>	2014-03-09 16:58:28		123.120.39.159	18160	/plugin/mobile/do_gettheblog.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('18160', '39231220', '83cdfe7bf2ac9e0129e8083399066147', '1394355508', '123120039')
<?PHP exit;?>	2014-03-09 16:58:28		123.120.39.159	18160	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_creditlog WHERE uid='18160' AND rid='10'
<?PHP exit;?>	2014-03-09 16:58:28		123.120.39.159	18160	/plugin/mobile/do_gettheblog.php	UPDATE ihome_space SET lastlogin='1394355508',ip='123120039' WHERE uid='18160'
<?PHP exit;?>	2014-03-09 16:58:28		123.120.39.159	18160	/plugin/mobile/do_gettheblog.php	SELECT * FROM ihome_spacelog WHERE uid='18160'
<?PHP exit;?>	2014-03-09 16:58:28		123.120.39.159	18160	/plugin/mobile/do_gettheblog.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='18160' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 16:58:28		123.120.39.159	18160	/plugin/mobile/do_gettheblog.php	SELECT sf.*, s.* FROM ihome_space s LEFT JOIN ihome_spacefield sf ON sf.uid=s.uid WHERE s.uid='18160'
<?PHP exit;?>	2014-03-09 16:58:29		123.120.39.159	18160	/plugin/mobile/do_getsharereplylist.php	SELECT password FROM ihome_member WHERE uid='18160'
<?PHP exit;?>	2014-03-09 16:58:29		123.120.39.159	18160	/plugin/mobile/do_getsharereplylist.php	DELETE FROM ihome_session WHERE uid='18160' OR lastactivity<'1394353709'
<?PHP exit;?>	2014-03-09 16:58:29		123.120.39.159	18160	/plugin/mobile/do_getsharereplylist.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('18160', '39231220', '83cdfe7bf2ac9e0129e8083399066147', '1394355509', '123120039')
<?PHP exit;?>	2014-03-09 16:58:29		123.120.39.159	18160	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_creditlog WHERE uid='18160' AND rid='10'
<?PHP exit;?>	2014-03-09 16:58:29		123.120.39.159	18160	/plugin/mobile/do_getsharereplylist.php	UPDATE ihome_space SET lastlogin='1394355509',ip='123120039' WHERE uid='18160'
<?PHP exit;?>	2014-03-09 16:58:29		123.120.39.159	18160	/plugin/mobile/do_getsharereplylist.php	SELECT * FROM ihome_spacelog WHERE uid='18160'
<?PHP exit;?>	2014-03-09 16:58:29		123.120.39.159	18160	/plugin/mobile/do_getsharereplylist.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='18160' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 16:58:29		123.120.39.159	18160	/plugin/mobile/do_getsharereplylist.php	SELECT authorid,cid,idtype,id,message,dateline FROM ihome_comment  where  id=64820 and idtype='sid' LIMIT 0,20
<?PHP exit;?>	2014-03-09 17:34:46		117.136.0.240	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='654205090@qq.com' and password=md5(concat('3d8acffecd71511798c92d5d0d58f6f8',salt))
<?PHP exit;?>	2014-03-09 17:34:46		117.136.0.240	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='2804'
<?PHP exit;?>	2014-03-09 17:34:46		117.136.0.240	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='2804' OR lastactivity<'1394355886'
<?PHP exit;?>	2014-03-09 17:34:46		117.136.0.240	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2804', '654205090@qq.com', '3d8acffecd71511798c92d5d0d58f6f8', '1394357686', '117136000')
<?PHP exit;?>	2014-03-09 17:34:46		117.136.0.240	2804	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='2804' AND rid='10'
<?PHP exit;?>	2014-03-09 17:34:46		117.136.0.240	2804	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394357686',ip='117136000' WHERE uid='2804'
<?PHP exit;?>	2014-03-09 17:34:46		117.136.0.240	2804	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='2804'
<?PHP exit;?>	2014-03-09 17:34:46		117.136.0.240	2804	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2804' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 17:34:49		117.136.0.240	2804	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='2804'
<?PHP exit;?>	2014-03-09 17:34:49		117.136.0.240	2804	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='2804' OR lastactivity<'1394355889'
<?PHP exit;?>	2014-03-09 17:34:49		117.136.0.240	2804	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('2804', '654205090@qq.com', '3d8acffecd71511798c92d5d0d58f6f8', '1394357689', '117136000')
<?PHP exit;?>	2014-03-09 17:34:49		117.136.0.240	2804	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='2804' AND rid='10'
<?PHP exit;?>	2014-03-09 17:34:49		117.136.0.240	2804	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394357689',ip='117136000' WHERE uid='2804'
<?PHP exit;?>	2014-03-09 17:34:49		117.136.0.240	2804	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='2804'
<?PHP exit;?>	2014-03-09 17:34:49		117.136.0.240	2804	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='2804' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 17:34:49		117.136.0.240	2804	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 2804 and new = 1
<?PHP exit;?>	2014-03-09 18:35:15		61.148.243.139	0	/plugin/mobile/do_mobileaccess.php	select uid,username from `ihome`.ihomeuser_members where email='ttingzhong_spring@163.com' and password=md5(concat('1a617de51254bdd93790f0eb244b8885',salt))
<?PHP exit;?>	2014-03-09 18:35:15		61.148.243.139	0	/plugin/mobile/do_mobileaccess.php	SELECT password FROM ihome_member WHERE uid='23263'
<?PHP exit;?>	2014-03-09 18:35:15		61.148.243.139	0	/plugin/mobile/do_mobileaccess.php	DELETE FROM ihome_session WHERE uid='23263' OR lastactivity<'1394359515'
<?PHP exit;?>	2014-03-09 18:35:15		61.148.243.139	0	/plugin/mobile/do_mobileaccess.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23263', 'ttingzhong_spring@163.com', 'e1a45d0d24cb87490b9efb2fc2e8a2ba', '1394361315', '061148243')
<?PHP exit;?>	2014-03-09 18:35:15		61.148.243.139	23263	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_creditlog WHERE uid='23263' AND rid='10'
<?PHP exit;?>	2014-03-09 18:35:15		61.148.243.139	23263	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_creditlog SET cyclenum=1,total=total+1,dateline='1394361315',credit='3',experience='5' WHERE clid='108046'
<?PHP exit;?>	2014-03-09 18:35:15		61.148.243.139	23263	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_space SET lastlogin='1394361315',ip='061148243',credit=credit+3,experience=experience+5 WHERE uid='23263'
<?PHP exit;?>	2014-03-09 18:35:15		61.148.243.139	23263	/plugin/mobile/do_mobileaccess.php	SELECT * FROM ihome_spacelog WHERE uid='23263'
<?PHP exit;?>	2014-03-09 18:35:15		61.148.243.139	23263	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23263' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 18:35:15		61.148.243.139	23263	/plugin/mobile/do_mobileaccess.php	INSERT INTO ihome_statuser (`uid`, `daytime`, `type`) VALUES ('23263', '$nowdaytime', 'login')
<?PHP exit;?>	2014-03-09 18:35:15		61.148.243.139	23263	/plugin/mobile/do_mobileaccess.php	SELECT COUNT(*) FROM ihome_stat WHERE `daytime`='20140309' LIMIT 1
<?PHP exit;?>	2014-03-09 18:35:15		61.148.243.139	23263	/plugin/mobile/do_mobileaccess.php	UPDATE ihome_stat SET `login`=`login`+1 WHERE daytime='20140309'
<?PHP exit;?>	2014-03-09 18:35:18		61.148.243.139	23263	/plugin/mobile/do_newnotificationcount.php	SELECT password FROM ihome_member WHERE uid='23263'
<?PHP exit;?>	2014-03-09 18:35:18		61.148.243.139	23263	/plugin/mobile/do_newnotificationcount.php	DELETE FROM ihome_session WHERE uid='23263' OR lastactivity<'1394359518'
<?PHP exit;?>	2014-03-09 18:35:18		61.148.243.139	23263	/plugin/mobile/do_newnotificationcount.php	REPLACE INTO ihome_session (`uid`, `username`, `password`, `lastactivity`, `ip`) VALUES ('23263', 'ttingzhong_spring@163.com', 'e1a45d0d24cb87490b9efb2fc2e8a2ba', '1394361318', '061148243')
<?PHP exit;?>	2014-03-09 18:35:18		61.148.243.139	23263	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_creditlog WHERE uid='23263' AND rid='10'
<?PHP exit;?>	2014-03-09 18:35:18		61.148.243.139	23263	/plugin/mobile/do_newnotificationcount.php	UPDATE ihome_space SET lastlogin='1394361318',ip='061148243' WHERE uid='23263'
<?PHP exit;?>	2014-03-09 18:35:18		61.148.243.139	23263	/plugin/mobile/do_newnotificationcount.php	SELECT * FROM ihome_spacelog WHERE uid='23263'
<?PHP exit;?>	2014-03-09 18:35:18		61.148.243.139	23263	/plugin/mobile/do_newnotificationcount.php	SELECT COUNT(*) FROM ihome_statuser WHERE `uid`='23263' AND `daytime`='$nowdaytime' AND `type`='login' LIMIT 1
<?PHP exit;?>	2014-03-09 18:35:18		61.148.243.139	23263	/plugin/mobile/do_newnotificationcount.php	SELECT count(new) FROM ihome_notification  where uid = 23263 and new = 1
