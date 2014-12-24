#!/usr/bin/env python
#coding:utf8
import MySQLdb
import time, datetime, calendar, sys
import config

if __name__ == '__main__':
    conn = MySQLdb.connect(host=config.host, user=config.username, passwd=config.passwd, db='ihome', port=3306, charset='utf8')

    cursor = conn.cursor()
    cursor.execute("select count(distinct collegeid) from ihome_baseprofile where usertype = '学生'")
    row = cursor.fetchone()
    student_all_num = row[0]
    cursor.execute("select count(distinct collegeid) from ihome_baseprofile where usertype = '学生' and isactive = 1")
    row = cursor.fetchone()
    student_active_num = row[0]
    cursor.execute("select count(distinct collegeid) from ihome_baseprofile where usertype = '教师'")
    row = cursor.fetchone()
    teacher_all_num = row[0]
    cursor.execute("select count(distinct collegeid) from ihome_baseprofile where usertype = '教师' and isactive = 1")
    row = cursor.fetchone()
    teacher_active_num = row[0]

    cursor.execute("select count(distinct collegeid) from ihome_baseprofile where usertype = '校友'")
    row = cursor.fetchone()
    alumnus_all_num = row[0]
    cursor.execute("select count(distinct collegeid) from ihome_baseprofile where usertype = '校友' and isactive = 1")
    row = cursor.fetchone()
    alumnus_active_num = row[0]

    cursor.execute("delete from ihome_register_analyse where user_type in ('学生', '教师', '校友')")
    cursor.execute("insert into ihome_register_analyse (user_type, all_num, register_num) values (%s, %s, %s)", ('学生', student_all_num, student_active_num))
    cursor.execute("insert into ihome_register_analyse (user_type, all_num, register_num) values (%s, %s, %s)", ('教师', teacher_all_num, teacher_active_num))
    cursor.execute("insert into ihome_register_analyse (user_type, all_num, register_num) values (%s, %s, %s)", ('校友', alumnus_all_num, alumnus_active_num))
    
    conn.commit()



