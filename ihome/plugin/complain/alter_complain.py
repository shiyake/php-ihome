#!/usr/bin/env python

import MySQLdb
import time

if __name__ == '__main__':
	conn = MySQLdb.connect(host="localhost",user='root',passwd='nameLR9969',db='ihome',port=3306,charset='utf8')
	sql = "SELECT doid,addtime FROM ihome_complain"
	cursor = conn.cursor()
	cursor.execute(sql)
	rows = cursor.fetchall()
	for row in rows:
		datatime = time.strftime('%Y%m%d',time.localtime(row[1]))
		
		sql1 = "UPDATE ihome_complain set datatime = "+str(datatime)+" WHERE doid="+str(row[0])
		cursor.execute(sql1)
	conn.commit()
	cursor.close()
	conn.close()
