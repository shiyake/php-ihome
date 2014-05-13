#!/user/bin/ env python
#encoding: utf-8 
#-*- coding:utf-8 -*-
#vim: set fileencoding=utf-8 :
#import config
import string
import MySQLdb
import hashlib
from operator import itemgetter,attrgetter
import sys
import time
import sys;
# set the default encoding to utf-8
# reload sys model to enable the getdefaultencoding method.
reload(sys);
sys.setdefaultencoding('utf-8')
assert sys.getdefaultencoding().lower() == "utf-8";

def get_not_sameRandom(start,end,x):
	li=[]
	flag=0
	for i in range(x):
		while True:
			num=random.randrange(start,end)
			for j in range(len(li)):
				if num==li[j]:
					flag=1
					break
			if flag==0:
				li.append(num)
	return li

def already_friend(rows,uid1,uid2):
	friend = ""
	for row in rows:
		if row[0] == uid1:
			friend = row[1]
			break
	li = friend.split(',')
	for i in li:
		if i == uid2:
			return True
	return False

def do_recommend_hometown(conn,k,rows):
	cursor = conn.cursor()
	truncate_tb_recommend(conn)
	breakpoint=[]
	for i in range(1,len(rows)):
		if cmp(rows[i][2],rows[i-1][2]):
			breakpoint.append(i)
	start=0
	for i in breakpoint:
		for j in range(start,i):
			#recommend
			cnt=0
			for h in range(start,i):
				if j!=h and not already_friend(rows,rows[j][0],rows[h][0]) and rows[j][2]:
					sql="insert into ihome_friend_toRecomment value('"+str(rows[j][0])+"','"+str(rows[h][0])+"','"+str(time.time())+"','same_hometown','"+rows[j][2]+"','"+str(rows[h][3])+"');"
					cnt+=1
			if cnt>k:
				break
			cursor.execute(sql)
			conn.commit()
	start=i


def do_recommend_class_edu(rows1,rows,conn,k):
	cursor=conn.cursor()
	breakpoint=[]
	cnt=0
	for i in range(1,len(rows1)):
		if cmp(rows1[i][2],rows1[i-1][2]):
			breakpoint.append(i)
	start=0
	for i in breakpoint:
		for j in range(start,i):
			#recommend
			cnt=0
			for h in range(start,i):
				if j!=h and not already_friend(rows,rows1[j][1],rows1[h][1]) and not cmp(rows1[j][0],'edu'):
					cnt+=1
			if cnt<k:
				sql="insert into ihome_friend_toRecomment value('"+str(rows1[j][1])+"','"+str(rows1[h][1])+"','"+str(time.time())+"','same_class_edu','"+rows1[j][2]+"','"+str(rows1[h][3])+"');"
				cursor.execute(sql)
				conn.commit()
	start=i

def do_recommend_class_work(rows1,rows,conn,k):
	cursor=conn.cursor()
	breakpoint=[]
	for i in range(1,len(rows1)):
		if cmp(rows1[i][3],rows1[i-1][3]):
			breakpoint.append(i)
	start=0
	cnt=0
	for i in breakpoint:
		for j in range(start,i):
			#recommend
			for h in range(start,i):

				if j!=h and not already_friend(rows,rows1[j][1],rows1[h][1]) :
					cnt+=1
			if cnt<k:
				sql="insert into ihome_friend_toRecomment value('"+str(rows1[j][0])+"','"+str(rows1[h][0])+"','"+str(time.time())+"','same_class_work','"+rows1[j][2]+"','"+str(rows1[h][3])+"');"
				cursor.execute(sql)
				conn.commit()

		start=i


def truncate_tb_recommend(conn):
	cursor = conn.cursor()
	sql = "truncate table ihome_friend_toRecomment;"
	cursor.execute(sql)
	conn.commit()

if  __name__=='__main__':
	try:
		conn=MySQLdb.connect(host='localhost',user='root',passwd='nameLR9969',db='ihome',port=3306,charset="utf8") 
		#conn=MySQLdb.connect(host=config.host,user=config.user,passwd=config.passwd,db='ihome',port=3306,charset="utf8") 
		cursor = conn.cursor()
		cursor.execute("set names utf8")
		sql="select count(*) from ihome_spacefield,ihome_space where ihome_spacefield.uid=ihome_space.uid;"
		cursor.execute(sql)
		rows=cursor.fetchall() 
		cnt = rows[0][0]
		sql="select ihome_spacefield.uid,ihome_spacefield.friend,ihome_spacefield.birthcity,ihome_space.username from ihome_spacefield,ihome_space where ihome_spacefield.uid=ihome_space.uid order by ihome_spacefield.birthcity desc;"
		cursor.execute(sql)
		rows0=cursor.fetchall() 
		k=5
		do_recommend_hometown(conn,k,rows0)
		sql="select ihome_spaceinfo.type,ihome_spaceinfo.uid,ihome_spaceinfo.class,ihome_space.username from ihome_spaceinfo,ihome_space where ihome_space.uid=ihome_spaceinfo.uid order by ihome_spaceinfo.class desc;"
		cursor.execute(sql)
		rows1=cursor.fetchall()
		do_recommend_class_edu(rows1,rows0,conn,k)
		sql="select ihome_spaceinfo.uid,ihome_spaceinfo.title,ihome_spaceinfo.subtitle,ihome_space.username from ihome_spaceinfo,ihome_space where type='work' and ihome_spaceinfo.uid=ihome_space.uid order by ihome_spaceinfo.title,ihome_spaceinfo.subtitle desc;"
		cursor.execute(sql)
		rows2=cursor.fetchall()
		do_recommend_class_work(rows2,rows0,conn,k)
		conn.close()
	except Exception ,e:
		print e


