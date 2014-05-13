#!/usr/bin/env python
#coding:utf8
import MySQLdb
import json
import datetime
import calendar
from config import db_addr, db_user, db_pass, db_char, db_port, db_name

def retention(register_day, retention_day_num, conn):
    cursor = conn.cursor()
    start_time = calendar.timegm(register_day.timetuple())
    end_day_time = start_time + 3600 * 24
    end_time = start_time + (retention_day_num + 1) * 3600 * 24
    cursor.execute("select count(*) from ihome_actionlog where dateline > %d and dateline < %d and action = 'register'" % (start_time, end_day_time))
    row = cursor.fetchone()
    register_num = int(row[0])

    cursor.execute("select count(distinct a.uid) from ihome_actionlog a join ihome_actionlog b on a.uid = b.uid and a.dateline > %d and a.dateline < %d and b.dateline > %d and b.dateline < %d and a.action = 'register' and b.action = 'login'" % (start_time, end_day_time, end_day_time, end_time));
    row = cursor.fetchone()
    login_num = int(row[0])
    chart_tag = 'retention_analyse'
    xaxis_tag = register_day.strftime("%Y-%m-%d")
    cursor.execute("select value from ihome_columntable where chart_tag = '%s' and xaxis_tag = '%s'" % (chart_tag, xaxis_tag))
    if register_num <= 0:
        r = 0
    else:
        r = float(login_num) / register_num
    row = cursor.fetchone()
    if row:
        value = json.loads(row[0])
    else:
        value = {}
        value['one_day'] = 0
        value['half_week'] = 0
        value['one_week'] = 0
        value['one_month'] = 0
    if retention_day_num == 1:
        value['one_day'] = r
    elif retention_day_num == 4:
        value['half_week'] = r
    elif retention_day_num == 7:
        value['one_week'] = r
    elif retention_day_num == 30:
        value['one_month'] = r

    cursor.execute("delete from ihome_columntable where chart_tag = '%s' and xaxis_tag = '%s'" % (chart_tag, xaxis_tag))

    cursor.execute("insert into ihome_columntable (chart_tag, xaxis_tag, value) values (%s, %s, %s)", (chart_tag, xaxis_tag, json.dumps(value)))

    conn.commit()
    cursor.close()


if __name__ == '__main__':
    conn = MySQLdb.connect(host=db_addr, user=db_user, passwd=db_pass, db=db_name, port=db_port, charset=db_char)
    today = datetime.date.today()
    retention(today - datetime.timedelta(days=2), 1, conn)
    retention(today - datetime.timedelta(days=5), 4, conn)
    retention(today - datetime.timedelta(days=8), 7, conn)
    retention(today - datetime.timedelta(days=31), 30, conn)
    conn.close()
