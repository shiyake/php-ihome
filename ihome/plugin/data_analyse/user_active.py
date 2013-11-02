#!/usr/bin/env python
#coding:utf8
import MySQLdb
import time, datetime, calendar, sys

if __name__ == '__main__':
    before_date = datetime.date.today() - datetime.timedelta(days=30)
    before_time = calendar.timegm(before_date.timetuple())
    conn = MySQLdb.connect(host="localhost", user='root', passwd='nameLR9969', db='ihome', port=3306, charset='utf8')

    cursor = conn.cursor()
    cursor.execute("select uid, dateline from ihome_actionlog where dateline > %d order by uid asc" % before_time)
    rows = cursor.fetchall()
    nums = [0 for i in range(31)]
    uin = 0
    login_days = {}
    for row in rows:
        cur_uin = int(row[0])
        if cur_uin != uin:
            if uin != 0:
                print uin, login_days
                nums[len(login_days)] += 1
                login_days = {}
            uin = cur_uin
        cur_time = int(row[1])
        login_days[int((cur_time - before_time) / (3600 * 24))] = 1

    if uin != 0:
        nums[len(login_days)] += 1
        login_days = {}

    cursor.close()
    cursor = conn.cursor()
    cursor.execute("select count(*) as num from ihome_space where flag = 0")
    row = cursor.fetchone()
    num0 = int(row[0])
    for i in nums:
        num0 -= i
    nums[0] = num0
    print nums
    analyse_cursor = conn.cursor()
    chart_tag = datetime.date.today().strftime("user_active_%Y_%m_%d")
    analyse_cursor.execute("delete from ihome_pietable where chart_tag = %s", chart_tag)
    for i in range(len(nums)):
        analyse_cursor.execute("insert into ihome_pietable (chart_tag, item_tag, num) values (%s, %s, %s)", (chart_tag, u"%d天" % i, nums[i]))
    conn.commit()
    analyse_cursor.close()
    conn.close()



