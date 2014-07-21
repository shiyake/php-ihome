#!/usr/bin/env python
# encoding=utf-8
import time
import MySQLdb

def recTo(row):
	uid = row[0]
	if row[2] == None:
		name = ''
	else:
		name = row[2].encode('utf-8')
	conn = MySQLdb.connect(host="dev-node1.limijiaoyin.com", user='root', passwd='nameLR9969', db='ihome', port=3306, charset='utf8')
	cursor = conn.cursor()
	auds = set(row[1].split(',')) - set([''])
	recs = set()
	if len(auds):
		cursor.execute("select friend from ihome_spacefield where uid in ({0})".format(','.join(auds)))
		friends = cursor.fetchall()
		for x in friends:
			recs |= set(x[0].split(','))
	recs = recs - auds - set([''])
	if len(recs):
		recTo = ',,'+','.join(recs)+',,'
		cursor.execute("insert into ihome_autorecpub (uid, name, recTo, exclude) values({0}, '{1}', '{2}', ',,')".format(uid, name, recTo))
	cursor.close()

if __name__ == '__main__':
	print 'recmendation begins at '+time.strftime('%Y-%m-%d %H:%M:%S',time.localtime(time.time()))
	conn = MySQLdb.connect(host="dev-node1.limijiaoyin.com", user='root', passwd='nameLR9969', db='ihome', port=3306, charset='utf8')
	cursor = conn.cursor()
	cursor.execute("delete from ihome_autorecpub")
	cursor.execute("select uid, aud, name from ihome_space where audnum > 0 order by audnum desc")
	rows = cursor.fetchall()
	for row in rows:
		if row[1] != None:
			recTo(row)
	

	cursor.close()
	print 'recmendation ends at '+time.strftime('%Y-%m-%d %H:%M:%S',time.localtime(time.time()))