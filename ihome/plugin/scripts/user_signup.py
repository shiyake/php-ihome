#!/usr/bin/env python
#coding:utf8
import MySQLdb
from config import db_addr, db_user, db_pass, db_char, db_port, db_name

if __name__ == '__main__':
    conn = MySQLdb.connect(host=db_addr, user=db_user, passwd=db_pass, db=db_name, port=db_port, charset=db_char)

    cursor = conn.cursor()
    cursor.execute("select count(distinct collegeid) from ihome_baseprofile where usertype = '学生' and uid>0 and isactive=1 and length(collegeid)>=8 and length(collegeid)<=9")
    row = cursor.fetchone()
    student_all_num = row[0]
    cursor.execute("select count(distinct uid) from ihome_signup_log where  usertype = '学生'and uid>0 and uid in (select uid from ihome_baseprofile where usertype='学生' and isactive=1 and length(collegeid)>=8 and length(collegeid)<=9 ) ")
    row = cursor.fetchone()
    student_signup_num = row[0]    
	
    cursor.execute("select count(distinct collegeid) from ihome_baseprofile where isactive=1 and uid>0  and usertype='学生' and length(collegeid)=9 ")
    row = cursor.fetchone()
    master_all_num = row[0]
    cursor.execute("select count(distinct uid) from ihome_signup_log where usertype = '学生' and uid>0 and uid in (select uid from ihome_baseprofile where usertype='学生' and  isactive=1 and length(collegeid)=9)")
    row = cursor.fetchone()
    master_signup_num = row[0]
	
    cursor.execute("select count(DISTINCT collegeid) from ihome_baseprofile where isactive=1 and uid>0 and LENGTH(collegeid)=8 and usertype='学生'  ")
    row = cursor.fetchone()
    undergraduate_all_num = row[0]
    cursor.execute("select count(distinct uid) from ihome_signup_log where usertype = '学生' and uid>0 and uid in (select uid from ihome_baseprofile where isactive=1 and usertype='学生' and length(collegeid)=8)")
    row = cursor.fetchone()
    undergraduate_signup_num = row[0]
    
    cursor.execute("select count(distinct collegeid) from ihome_baseprofile where usertype = '教师' and isactive = 1")
    row = cursor.fetchone()
    teacher_all_num = row[0]
    cursor.execute("select count(distinct uid) from ihome_signup_log where usertype = '教师' ")
    row = cursor.fetchone()
    teacher_signup_num = row[0]

    cursor.execute("select count(distinct collegeid) from ihome_baseprofile where usertype = '校友'")
    row = cursor.fetchone()
    alumnus_all_num = row[0]
    cursor.execute("select count(distinct uid) from ihome_signup_log where usertype = '校友'")
    row = cursor.fetchone()
    alumnus_signup_num = row[0]

    print("delete from ihome_signup_analyse where usertype in ('学生', '教师', '校友', '本科生', '研究生')")
    print("insert into ihome_signup_analyse (usertype, total, amount) values (%s, %s, %s)" % ('学生', student_all_num, student_signup_num))
    print("insert into ihome_signup_analyse (usertype, total, amount) values (%s, %s, %s)" % ('教师', teacher_all_num, teacher_signup_num))
    print("insert into ihome_signup_analyse (usertype, total, amount) values (%s, %s, %s)" % ('校友', alumnus_all_num, alumnus_signup_num))
    print("insert into ihome_signup_analyse (usertype, total, amount) values (%s, %s, %s)" % ('研究生', master_all_num, master_signup_num))
    print("insert into ihome_signup_analyse (usertype, total, amount) values (%s, %s, %s)" % ('本科生', undergraduate_all_num,undergraduate_signup_num))

    cursor.execute("delete from ihome_signup_analyse where usertype in ('学生', '教师', '校友', '本科生', '研究生')")
    cursor.execute("insert into ihome_signup_analyse (usertype, total, amount) values (%s, %s, %s)", ('学生', student_all_num, student_signup_num))
    cursor.execute("insert into ihome_signup_analyse (usertype, total, amount) values (%s, %s, %s)", ('教师', teacher_all_num, teacher_signup_num))
    cursor.execute("insert into ihome_signup_analyse (usertype, total, amount) values (%s, %s, %s)", ('校友', alumnus_all_num, alumnus_signup_num))
    cursor.execute("insert into ihome_signup_analyse (usertype, total, amount) values (%s, %s, %s)", ('研究生', master_all_num, master_signup_num))
    cursor.execute("insert into ihome_signup_analyse (usertype, total, amount) values (%s, %s, %s)", ('本科生', undergraduate_all_num, undergraduate_signup_num))
    conn.commit()


