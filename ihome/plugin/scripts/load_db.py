# coding: utf-8
"""
预先从数据库分析出需要的数据
产生3中dump文件，用来给其他hadoop节点提供数据
还有1个log文件，用来驱动hadoop进行分析的日志文件
dump user dict：产生一个字典，键是uid，值为User对象，里面有家乡，title,subtitle,type，班级等信息
dump user friends：产生一个字典，键是uid，值为列表，里面是uid的好友id
dump group birthcity：产生一个字典，键是家乡名称，值为列表，里面是家乡为该地区的uid
dump edu class:产生一个字典，键是班级名称，值为列表，里面是该班级的uid。班级名称是根据subtitle字段得出的
uid map seqence file每一行是一个uid，用于hadoop遍历每个uid分配给其他节点
"""
__author__ = 'songwei'
import config
import MySQLdb
import pickle
from user import User
sql="""
SELECT ihome_spacefield.uid, ihome_spacefield.birthcity, ihome_spaceinfo.class, ihome_spaceinfo.title,
ihome_spaceinfo.subtitle, ihome_spaceinfo.type from ihome_spaceinfo,ihome_spacefield where
ihome_spaceinfo.uid = ihome_spacefield.uid ORDER BY ihome_spaceinfo.uid;
"""
sql = "SELECT ihome_spacefield.uid, ihome_spacefield.birthcity from ihome_spacefield ORDER BY ihome_spacefield.uid"
sql2 = "SELECT uid, class, title, subtitle, type from ihome_spaceinfo ORDER BY infoid;"
sql3 = "SELECT uid, fuid FROM ihome.ihome_friend ORDER BY uid;"
sql4 = "SELECT uid, username FROM ihome.ihome_space ORDER BY uid;"


result = {}
users = {}
if  __name__=='__main__':
    print "begin connect database"
    conn=MySQLdb.connect(host=config.db_addr,user=config.db_user,passwd=config.db_pass,db=config.db_name,charset=config.db_char)
    print "begin load uid and birthcity"
    cursor = conn.cursor()
    cursor.execute("set names utf8")
    cursor.execute(sql)
    rows=cursor.fetchall()
    cursor.close()
    for i in rows:
        if not i[1]:
            i = (i[0], "__")
        result[i[0]] = User(i[0], i[1].encode('utf8').replace("'", ""))
    print "begin load username"
    cursor = conn.cursor()
    cursor.execute("set names utf8")
    cursor.execute(sql4)
    rows=cursor.fetchall()
    cursor.close()
    for i in rows:
        if result.has_key(i[0]):
            item = result[i[0]]
            item.username = i[1].encode('utf8')
    print "begin load ..."
    cursor = conn.cursor()
    cursor.execute("set names utf8")
    cursor.execute(sql2)
    rows=cursor.fetchall()
    cursor.close()
    for i in rows:
        if result.has_key(i[0]):
            item = result[i[0]]
            item.userclass = i[1].encode('utf8').replace("'", "") if i[1] else ''
            item.title = i[2].encode('utf8').replace("'", "")
            item.subtitle = i[3].encode('utf8').replace("'", "")
            item.type = i[4].encode('utf8').strip()
    users = result
    print "dump user dict"
    with open(config.dump_users_path, 'w') as f:
        pickle.dump(result, f)
    print "begin load user friends"
    cursor = conn.cursor()
    cursor.execute("set names utf8")
    cursor.execute(sql3)
    rows=cursor.fetchall()
    cursor.close()
    result = {}
    for i in rows:
        if result.has_key(i[0]):
            result[i[0]].append(i[1])
        else:
            result[i[0]] = [i[1]]
    print "dump user friends"
    with open(config.dump_friends_path, 'w') as f:
        pickle.dump(result, f)
    print "begin group birthcity"
    for i in users.values():
        birth = i.birthcity
        if result.has_key(birth):
            result[birth].append(i.uid)
        else:
            result[birth] = [i.uid]
    print "dump group birthcity"
    with open(config.dump_birthcitygroup_path, 'w') as f:
        pickle.dump(result, f)
    print "begin group edu class"
    for i in users.values():
        if i.type == 'edu':
            if result.has_key(i.subtitle):
                result[i.subtitle].append(i.uid)
            else:
                result[i.subtitle] = [i.uid]
    print "dump edu class"
    with open(config.dump_class_path, 'w') as f:
        pickle.dump(result, f)
    print "begin group work"
    result = {}
    for i in users.values():
        if i.type == 'work':
            if result.has_key(i.title):
                result[i.title].append(i.uid)
            else:
                result[i.title] = [i.uid]
    print "dump work"
    with open(config.dump_work_path, 'w') as f:
        pickle.dump(result, f)
    print "make uid seqence file"
    cursor = conn.cursor()
    cursor.execute("set names utf8")
    cursor.execute(sql)
    rows=cursor.fetchall()
    cursor.close()
    f = open(config.output_uid_seq, "w")
    for i in rows:
        f.writelines(str(i[0]) + "\n")
    f.close()
    print "K.O."