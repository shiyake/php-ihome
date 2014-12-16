#!/usr/bin/env python
#coding:utf8
import MySQLdb
import time, datetime, calendar, sys, json

def cal_one_day(some_day):
    start_time = calendar.timegm(some_day.timetuple())
    end_time = start_time + 3600 * 24
    conn = MySQLdb.connect(host="localhost", user="root", passwd="nameLR9969", db='ihome', port=3306, charset="utf8")

    cursor = conn.cursor()
    cursor.execute("select uid, value from ihome_actionlog where dateline >= %d and dateline < %d and action = 'register'" % (start_time, end_time))

    rows = cursor.fetchall()
    result = {}
    result['quick'] = 0
    result['freshman'] = 0
    result['email'] = 0
    result['mobile'] = 0
    for row in rows:
        uid = int(row[0])
        value = row[1]
        if value not in result:
            result[value] = 0
        result[value] += 1

    xaxis_tag = datetime.date.today().strftime("%Y-%m-%d")
    chart_tag = 'activate_analyse'

    cursor.execute("insert into ihome_columntable (chart_tag, xaxis_tag, value) values (%s, %s, %s)", (chart_tag, xaxis_tag, json.dumps(result)))
    conn.commit()
    cursor.close()
    conn.close()


if __name__ == '__main__':
    cal_one_day(datetime.date.today())

    




