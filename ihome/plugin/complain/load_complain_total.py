#!/usr/bin/env python

import MySQLdb
import urllib2, json
from seg_util import SegUtil
import heapq
import time

tags = {}
date_array = []
def load_complain(conn,date):
	cursor = conn.cursor()
	cursor.execute("select doid,uid,message,datatime from ihome_complain where datatime="+date)
	rows = cursor.fetchall()
	for row in rows:
		parts = []
		if row[2]:
			parts = SegUtil.seg(row[2].encode("utf8"))
		for p in parts:
			if p[1] == 'ns' or p[1] == 'nr' or p[1] == 'nt' or p[1] == 'n':
				if p[0] not in tags:
					tags[p[0]] = [0, 0, 0]
				tags[p[0]][0] += 1
				tags[p[0]][2] += 1
	cursor.close()

if __name__ == '__main__':
	conn = MySQLdb.connect(host="localhost", user='root', passwd='nameLR9969', db='ihome', port=3306, charset='utf8')
	SegUtil.init('.')
	cursor = conn.cursor()
	cursor.execute("select doid,uid,message,datatime from ihome_complain group by datatime")
	rows = cursor.fetchall()
	for row in rows:
		date_array.append(row[3]);
	
	cursor.execute("TRUNCATE TABLE ihome_complain_tagcloud")
	for date_message in date_array:
		load_complain(conn,date_message)
		h = []
		for k,v in tags.iteritems():
			if len(h) < 100:
				heapq.heappush(h, (v, k))
			else:
				heapq.heappushpop(h, (v, k))
		cursor = conn.cursor()
		lastid = -1
		results = []
		while len(h) > 0:
			num, word = heapq.heappop(h)
			results.append( (num, word.decode('utf8')) )
		for num, word in results[::-1]:
			flag=1
			if word.find('@'):
				flag=0
			word = word.replace('@','')
			type='uname'
			if flag==0:
				type='message'
			cursor.execute("INSERT INTO ihome_complain_tagcloud(tag_word, tag_count, max_type, type,datatime) values ( %s, %s, %s, %s , %s)", ( word, num[0], 'doing', type , date_message))
			if lastid < 0:
				lastid = cursor.lastrowid

		tags={}
	conn.commit()
	cursor.close()
	conn.close()
