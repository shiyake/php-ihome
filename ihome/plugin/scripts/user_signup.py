#!/usr/bin/env python
#coding:utf8
import MySQLdb
from config import db_addr, db_user, db_pass, db_char, db_port, db_name

if __name__ == '__main__':
    conn = MySQLdb.connect(host=db_addr, user=db_user, passwd=db_pass, db=db_name, port=db_port, charset=db_char)

    cursor = conn.cursor()
    cursor.execute("select count(distinct collegeid) from ihome_baseprofile where usertype = '学生'")
    row = cursor.fetchone()
    student_all_num = row[0]
    cursor.execute("select count(distinct uid) from ihome_signup_log where usertype = '学生'")
    row = cursor.fetchone()
    student_signup_num = row[0]

    cursor.execute("select count(distinct collegeid) from ihome_baseprofile where usertype = '教师'")
    row = cursor.fetchone()
    teacher_all_num = row[0]
    cursor.execute("select count(distinct uid) from ihome_signup_log where usertype = '教师'")
    row = cursor.fetchone()
    teacher_signup_num = row[0]

    cursor.execute("select count(distinct collegeid) from ihome_baseprofile where usertype = '校友'")
    row = cursor.fetchone()
    alumnus_all_num = row[0]
    cursor.execute("select count(distinct uid) from ihome_signup_log where usertype = '校友'")
    row = cursor.fetchone()
    alumnus_signup_num = row[0]

    cursor.execute("delete from ihome_signup_analyse where usertype in ('学生', '教师', '校友')")
    cursor.execute("insert into ihome_signup_analyse (usertype, total, amount) values (%s, %s, %s)", ('学生', student_all_num, student_signup_num))
    cursor.execute("insert into ihome_signup_analyse (usertype, total, amount) values (%s, %s, %s)", ('教师', teacher_all_num, teacher_signup_num))
    cursor.execute("insert into ihome_signup_analyse (usertype, total, amount) values (%s, %s, %s)", ('校友', alumnus_all_num, alumnus_signup_num))
    
    conn.commit()

