#!/usr/bin/env python
import time
import MySQLdb
import urllib2, json
def load_blog(conn):
    cursor = conn.cursor()
    cursor.execute("select a.blogid, a.uid, a.subject, a.dateline, b.message from ihome_blog a left join ihome_blogfield b on a.blogid = b.blogid")
    rows = cursor.fetchall()
    #print "all", len(rows)
    i = 0
    for row in rows:
        i += 1
    #    print i
    	datas = []
        data = {}
        data['blogid'] = str(row[0]);
        data['uid'] = str(row[1]);
        data['subject'] = row[2];
        data['dateline'] = str(row[3]);
        data['blogmessage'] = row[4];
        data['id'] = 'blogid_%d' % row[0]
        data['type'] = 'blog'
        datas.append(data)
        datastr = json.dumps(datas)
        req = urllib2.Request("http://solr.limijiaoyin.com/solr/update/json", data=datastr, headers={'Content-type':'application/json'})
        resp = urllib2.urlopen(req)
    cursor.close()

def load_event(conn):
    cursor = conn.cursor()
    cursor.execute("select a.eventid, a.topicid, a.uid, a.dateline, a.title, b.detail, a.starttime, a.endtime from ihome_event a left join ihome_eventfield b on a.eventid = b.eventid")
    rows = cursor.fetchall()
    #print "all", len(rows)
    i = 0
    for row in rows:
        i += 1
        #print i
        datas = []
        data = {}
        data['eventid'] = str(row[0]);
        data['topicid'] = str(row[1]);
        data['uid'] = str(row[2]);
        data['dateline'] = str(row[3]);
        data['title'] = row[4];
        data['detail'] = row[5];
        data['starttime'] = str(row[6])
        data['endtime'] = str(row[7])
        data['id'] = 'eventid_%d' % row[0]
        data['type'] = 'event'
        datas.append(data)
        datastr = json.dumps(datas)
        req = urllib2.Request("http://solr.limijiaoyin.com/solr/update/json", data=datastr, headers={'Content-type':'application/json'})
        resp = urllib2.urlopen(req)
        resp.read()
    cursor.close()

def load_user(conn):
    cursor = conn.cursor()
    cursor.execute("select a.uid, a.username, a.name from ihome_space a")
    rows = cursor.fetchall()
    #print "all", len(rows)
    i = 0
    for row in rows:
        i += 1
    #    print i
        datas = []
        data = {}
        data['uid'] = str(row[0])
        data['username'] = row[1]
        data['name'] = row[2]
        data['id'] = 'userid_%d' % row[0]
        data['type'] = 'user'
        datas.append(data)
        datastr = json.dumps(datas)
        req = urllib2.Request("http://solr.limijiaoyin.com/solr/update/json", data=datastr, headers={'Content-type':'application/json'})
        resp = urllib2.urlopen(req)
        resp.read()
    cursor.close()

def load_album(conn):
    cursor = conn.cursor()
    cursor.execute("select a.albumid, a.albumname, a.uid, a.dateline from ihome_album a")
    rows = cursor.fetchall()
    #print "all", len(rows)
    i = 0
    for row in rows:
        i += 1
        #print i
        datas = []
        data = {}
        data['albumid'] = str(row[0])
        data['albumname'] = row[1]
        data['uid'] = str(row[2])
        data['dateline'] = str(row[3])
        data['id'] = 'albumid_%d' % row[0]
        data['type'] = 'album'
        datas.append(data)
        datastr = json.dumps(datas)
        req = urllib2.Request("http://solr.limijiaoyin.com/solr/update/json", data=datastr, headers={'Content-type':'application/json'})
        resp = urllib2.urlopen(req)
        resp.read()
    cursor.close()

def load_poll(conn):
    cursor = conn.cursor()
    cursor.execute("select a.pid, a.subject, a.uid, a.topicid, a.dateline from ihome_poll a")
    rows = cursor.fetchall()
    #print "all", len(rows)
    i = 0
    for row in rows:
        i += 1
     #   print i
        datas = []
        data = {}
        data['pid'] = str(row[0])
        data['subject'] = row[1]
        data['uid'] = str(row[2])
        data['topicid'] = str(row[3])
        data['dateline'] = str(row[4])
        data['id'] = 'pollid_%d' % row[0]
        data['type'] = 'poll'
        datas.append(data)
        datastr = json.dumps(datas)
        req = urllib2.Request("http://solr.limijiaoyin.com/solr/update/json", data=datastr, headers={'Content-type':'application/json'})
        resp = urllib2.urlopen(req)
        resp.read()
    cursor.close()

def load_mtag(conn):
    cursor = conn.cursor()
    cursor.execute("select a.tagid, a.tagname, a.fieldid from ihome_mtag a")
    rows = cursor.fetchall()
    #print "all", len(rows)
    i = 0
    for row in rows:
        i += 1
        #print i
        datas = []
        data = {}
        data['tagid'] = str(row[0])
        data['tagname'] = row[1]
        data['fieldid'] = str(row[2])
        data['id'] = 'tagid_%d' % row[0]
        data['uid'] = '0'
        data['type'] = 'mtag'
        datas.append(data)
        datastr = json.dumps(datas)
        req = urllib2.Request("http://solr.limijiaoyin.com/solr/update/json", data=datastr, headers={'Content-type':'application/json'})
        resp = urllib2.urlopen(req)
        resp.read()
    cursor.close()

def load_doing(conn):
    cursor = conn.cursor()
    cursor.execute("select a.doid, a.uid, a.message, a.dateline from ihome_doing a")
    rows = cursor.fetchall()
    #print "all", len(rows)
    i = 0
    for row in rows:
        i += 1
        #print i
        datas = []
        data = {}
        data['doid'] = str(row[0])
        data['uid'] = str(row[1])
        data['domessage'] = row[2]
        data['dateline'] = str(row[3])
        data['id'] = 'doid_%d' % row[0]
        data['type'] = 'doing'
        datas.append(data)
        datastr = json.dumps(datas)
        req = urllib2.Request("http://solr.limijiaoyin.com/solr/update/json", data=datastr, headers={'Content-type':'application/json'})
        resp = urllib2.urlopen(req)
        resp.read()
    cursor.close()



    

if __name__ == '__main__':
    print 'load_data begins at '+time.strftime('%Y-%m-%d %H:%M:%S',time.localtime(time.time()))
    conn = MySQLdb.connect(host="localhost", user='root', passwd='nameLR9969', db='ihome', port=3306, charset='utf8')
    load_blog(conn)
    load_event(conn)
    load_user(conn)
    load_album(conn)
    load_poll(conn)
    load_mtag(conn)
    load_doing(conn)
    print 'load_data ends at '+time.strftime('%Y-%m-%d %H:%M:%S',time.localtime(time.time()))
