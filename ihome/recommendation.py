#!/usr/bin/env python
# encoding=utf-8
import time
import MySQLdb
import Queue
import math

def getCount(table, type, id, cursor):
	ret = 0
	if table == 'share':
		cursor.execute("select count(*) from ihome_share where type='{0}' and id={1}".format(type, id))
	elif table == 'comment':
		cursor.execute("select count(*) from ihome_comment where idtype='{0}' and id={1}".format(type, id))
	temp = cursor.fetchone()
	if temp != None:
		ret = temp[0]
	return ret

def insert(item, pq):
	if pq.qsize() == 5:
		item = max(pq.get(), item)
	pq.put(item)

def clearRec(conn):
	cursor = conn.cursor()
	cursor.execute("delete from ihome_recommendation where recfrom_i = 0")
	cursor.execute("update ihome_recommendation set score = 0, autorec = 0 where autorec = 1")
	cursor.close()

def updateRec(conn, recs):
	cursor = conn.cursor()
	
	while not recs.empty():
		rec = recs.get()
		cursor.execute("select feedid from ihome_recommendation where feedid={0}".format(rec[1]))
		rows = cursor.fetchall()
		if len(rows):
			for row in rows:
				cursor.execute("update ihome_recommendation set score={0}, autorec=1 where feedid={1}".format(rec[0], rec[1]))
		else:
			cursor.execute("insert into ihome_recommendation select *, 0, 0, {0}, 1 from ihome_feed where feedid={1}".format(rec[0], rec[1]))

	cursor.close()

def recDoing(conn):
	recs = Queue.PriorityQueue()
	cursor = conn.cursor()
	R, S, T, score = (0, )*4
	cursor.execute("select feedid, dateline, id from ihome_feed where dateline > {0} and icon='doing'".format(BEFORE))
	rows = cursor.fetchall()
	for row in rows:
		T = math.ceil((NOW-row[1])/86400)

		cursor.execute("select replynum from ihome_doing where doid={0}".format(row[-1]))
		doing = cursor.fetchone()
		if doing != None:
			R = doing[0]

		S = getCount('share', 'doing', row[-1], cursor)

		if R or S:
			score = (math.sqrt(R)+S*2)/(T+2)**GRAVITY			

		rec = (score, row[0])
		insert(rec, recs)

	
	updateRec(conn, recs)

	cursor.close()

def recPic(conn):
	recs = Queue.PriorityQueue()
	cursor = conn.cursor()
	H, A, C, T, score = (0, )*5
	cursor.execute("select feedid, dateline, id from ihome_feed where dateline > {0} and icon='album'".format(BEFORE))
	rows = cursor.fetchall()
	for row in rows:
		T = math.ceil((NOW-row[1])/86400)

		cursor.execute("select hot, click_6, click_7, click_8, click_9, click_10 from ihome_pic where picid={0}".format(row[-1]))
		pic = cursor.fetchone()
		if pic != None:
			H = pic[0]
			A = sum(pic[1:])
		
		C = getCount('comment', 'picid', row[-1], cursor)

		if H or A or C:
			score = (A*2+math.sqrt(C)+H)/(T+2)**GRAVITY

		rec = (score, row[0])
		insert(rec, recs)

	updateRec(conn, recs)

	cursor.close()

def recPoll(conn):
	recs = Queue.PriorityQueue()
	cursor = conn.cursor()
	E, P, R, H, T, score = (0, )*6
	cursor.execute("select feedid, dateline, id from ihome_feed where dateline > {0} and icon='poll'".format(BEFORE))
	rows = cursor.fetchall()
	for row in rows:
		T = math.ceil((NOW-row[1])/86400)

		cursor.execute("select voternum, replynum, hot, expiration from ihome_poll where pid={0}".format(row[-1]))
		poll = cursor.fetchone()
		if poll != None:
			P, R, H = poll[:-1]
			E += poll[-1] < NOW and 1
		
		if E == 0 and (P or R or H):
			score = (P+math.sqrt(R)+H)/(T+2)**GRAVITY

		rec = (score, row[0])
		insert(rec, recs)

	updateRec(conn, recs)

	cursor.close()

def recBlog(conn):
	recs = Queue.PriorityQueue()
	cursor = conn.cursor()
	V, R, H, S, A, T, score = (0, )*7
	cursor.execute("select feedid, dateline, id from ihome_feed where dateline > {0} and icon='blog'".format(BEFORE))
	rows = cursor.fetchall()
	for row in rows:
		T = math.ceil((NOW-row[1])/86400)

		cursor.execute("select viewnum, replynum, hot, click_1, click_2, click_3, click_4, click_5 from ihome_blog where blogid={0}".format(row[-1]))
		blog = cursor.fetchone()
		if blog != None:
			V, R, H = blog[:3]
			A = sum(blog[3:])
		
		S = getCount('share', 'blogid', row[-1], cursor)

		if V or R or H or S or A:
			score = (0.2*V+math.sqrt(R)+H+2*S+A*2)/(T+2)**GRAVITY

		rec = (score, row[0])
		insert(rec, recs)

	updateRec(conn, recs)

	cursor.close()

def recEvent(conn):
	recs = Queue.PriorityQueue()
	cursor = conn.cursor()
	E, M, F, V, C, H, T, score = (0, )*8
	cursor.execute("select feedid, dateline, id from ihome_feed where dateline > {0} and icon='event'".format(BEFORE))
	rows = cursor.fetchall()
	for row in rows:
		T = math.ceil((NOW-row[1])/86400)

		cursor.execute("select membernum, follownum, viewnum, hot, endtime from ihome_event where eventid={0}".format(row[-1]))
		event = cursor.fetchone()
		if event != None:
			M, F, V, H = event[:4]
			E += event[4] < NOW and 1
		
		C = getCount('comment', 'eventid', row[-1], cursor)

		if E == 0 and (M or F or V or C or H):
			score = (M+2*F+0.2*V+math.sqrt(C)+H)/(T+2)**GRAVITY

		rec = (score, row[0])
		insert(rec, recs)

	updateRec(conn, recs)

	cursor.close()

def recThread(conn):
	# (0.2*V+sqrt(R)+H+2*A)/(T+2)^1.8
	recs = Queue.PriorityQueue()
	cursor = conn.cursor()
	V, R, H, A, T, score = (0, )*6
	cursor.execute("select feedid, dateline, id from ihome_feed where dateline > {0} and icon='thread'".format(BEFORE))
	rows = cursor.fetchall()
	for row in rows:
		T = math.ceil((NOW-row[1])/86400)

		cursor.execute("select viewnum, replynum, hot, click_11, click_12, click_13, click_14, click_15 from ihome_thread where tid={0}".format(row[-1]))
		thread = cursor.fetchone()
		if thread != None:
			V, R, H = thread[:3]
			A = sum(thread[3:])
		
		if V or R or H or A:
			score = (0.2*V+math.sqrt(R)+H+2*A)/(T+2)**GRAVITY

		rec = (score, row[0])
		insert(rec, recs)

	updateRec(conn, recs)

	cursor.close()

if __name__ == '__main__':
	print 'recmendation begins at '+time.strftime('%Y-%m-%d %H:%M:%S',time.localtime(time.time()))
	conn = MySQLdb.connect(host="dev-node1.limijiaoyin.com", user='root', passwd='nameLR9969', db='ihome', port=3306, charset='utf8')
	NOW = time.time()
	BEFORE = NOW - 2592000
	GRAVITY = 1.8

	clearRec(conn)
	recDoing(conn)
	recPic(conn)
	recPoll(conn)
	recBlog(conn)
	recEvent(conn)
	recThread(conn)
	print 'recmendation ends at '+time.strftime('%Y-%m-%d %H:%M:%S',time.localtime(time.time()))