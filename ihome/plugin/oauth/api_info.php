<?php
  /* 本文件用于api的存储对应 */
  /* 为节省空间，实际上api权限是以数字编号形式存在数据库中 */
  /* 最后匹配权限时需要检查api脚本名对应的数字是否与从数据库中读出的相同 */
  /* add by sjh1014@dse.buaa.edu.cn    2012-12-18 19:33 */

$api_nums=array(
    'getallthings'=>1,
    'getnotification'=>2,
    'getmessages'=>3,
    'getpersonmessages'=>4,
    'getfriendslist'=>5,
    'getuserinfo'=>6,
    'getuserthings'=>7,
    'getusertopics'=>8,
    'getmygroups'=>9,
    'gethotgroups'=>10,
    'gettopics'=>11,
    'topicreply'=>12,
    'gettherecording'=>13,
    'gettherecordingreply'=>14,
    'getbloglist'=>15,
    'gettheblog'=>16,
    'getblogreplylist'=>17,
    'cpfriend'=>18,
    'getuserphotoalbum'=>19,
    'getselectphotoalbum'=>20,
    'gettheshare'=>21,
    'getsharereplylist'=>22,
    'addreplyreply'=>23,
    'getalbumpic'=>24,
    'getalbumreplylist'=>25,
    'getarrangereplylist'=>26,
    'getfuturearrang'=>27,
    'getnotification'=>28,
    'getrecommendgroups'=>29,
    'getthearrange'=>30,
    'getthepic'=>31,
    'getthetopic'=>32,
    'editblog'=>33,
	'getuid'=>34, 
	'getuser'=>35, 	
	

    'sendsms'=>60,	
    'addnews'=>61,
    'addmessage'=>62,
    'addblog'=>63,
    'addtopic'=>64,
    'addshare'=>65,
    'addnewsreply'=>66,
    'addblogreply'=>67,
    'addtopicreply'=>68,
    'addsharereply'=>69,
    'addalbumreply'=>70,
    'addarrangereply'=>71,
	'addcomplain'=>72,
	
    'deletenews'=>101,
    'deleteblog'=>102,
    'deletecomment'=>103,
    'deletetopic'=>104,
    'deletefriend'=>105
    );
?>
