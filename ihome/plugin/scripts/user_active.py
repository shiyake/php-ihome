#!/usr/bin/env python
#coding:utf8
import MySQLdb
import datetime
import calendar
from config import db_addr, db_user, db_pass, db_char, db_port, db_name

if __name__ == '__main__':
    before_date = datetime.date.today() - datetime.timedelta(days=30)
    before_time = calendar.timegm(before_date.timetuple())
    conn = MySQLdb.connect(host=db_addr, user=db_user, passwd=db_pass, db=db_name, port=db_port, charset=db_char)

    cursor = conn.cursor()
    print before_time
    cursor.execute("select uid, dateline from ihome_actionlog where dateline > %d and action = 'login' order by uid asc" % before_time)
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
    results = {}
    num = 0
    for i in range(0, 6):
        num += nums[i]
    results['0-5天'] = num
    num = 0
    for i in range(6, 11):
        num += nums[i]
    results['6-10天'] = num
    num = 0
    for i in range(11, 20):
        num += nums[i]
    results['11-20天'] = num
    num = 0
    for i in range(21, 31):
        num += nums[i]
    results['21-30天'] = num
    print results

    analyse_cursor.execute("delete from ihome_pietable where chart_tag = '%s'" % (chart_tag,))
    for k, v in results.iteritems():
        analyse_cursor.execute("insert into ihome_pietable (chart_tag, item_tag, num) values ('%s', '%s', '%s')" % (chart_tag, k, v,))
    conn.commit()
    analyse_cursor.close()
    conn.close()



