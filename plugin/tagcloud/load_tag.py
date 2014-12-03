#!/usr/bin/env python
#coding:utf8


import MySQLdb
import urllib2, json
from seg_util import SegUtil
import heapq
import sets

tags = {}
black_words = sets.Set([u'宋体'])
import time
start_time = int(time.time()) - 24 * 3600

def load_blog(conn):
    cursor = conn.cursor()
    cursor.execute("select a.blogid, a.uid, a.subject, a.dateline, b.message from ihome_blog a left join ihome_blogfield b on a.blogid = b.blogid where a.dateline > %d" % start_time)
    rows = cursor.fetchall()
    for row in rows:
        parts = []
        if row[2]:
            parts = SegUtil.seg(row[2].encode("utf8"))
        if row[4]:
            parts.extend(SegUtil.seg(row[4].encode("utf8")))
        for p in parts:
            if p[1] == 'ns' or p[1] == 'nr' or p[1] == 'nt' or p[1] == 'n':
                if len(p[0]) <= 0:
                    continue
                if p[0] not in tags:
                    tags[p[0]] = [0, 0, 0]
                tags[p[0]][0] += 1
                tags[p[0]][1] += 1

    cursor.close()

def load_doing(conn):
    cursor = conn.cursor()
    cursor.execute("select a.doid, a.uid, a.message, a.dateline from ihome_doing a where a.dateline > %d" % start_time)
    rows = cursor.fetchall()
    for row in rows:
        parts = []
        if row[2]:
            parts = SegUtil.seg(row[2].encode("utf8"))
        for p in parts:
            if p[1] == 'ns' or p[1] == 'nr' or p[1] == 'nt' or p[1] == 'n':
                if len(p[0]) <= 0:
                    continue
                if p[0] not in tags:
                    tags[p[0]] = [0, 0, 0]
                tags[p[0]][0] += 1
                tags[p[0]][2] += 1


    cursor.close()



    

if __name__ == '__main__':
    conn = MySQLdb.connect(host="localhost", user='root', passwd='nameLR9969', db='ihome', port=3306, charset='utf8')
    #conn = MySQLdb.connect(host="211.71.14.155", user='ancon', passwd='BUAAnic@ancon', db='ihome', port=3306, charset='utf8')
    SegUtil.init('.')
    load_blog(conn)
    load_doing(conn)

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
        print word
        if word[0] == '@':
            word = word[1:]
        if len(word) == 1:
            continue
        if num[1] > num[2]:
            word_type = 'blog'
        else:
            word_type = 'doing'
        if word in black_words:
            continue
        cursor.execute("INSERT INTO ihome_tagcloud(tag_word, tag_count, max_type) values (%s, %s, %s)", (word, num[0], word_type))
        print cursor._executed
        if lastid < 0:
            lastid = cursor.lastrowid

    cursor.execute("delete from ihome_tagcloud where id < %s", lastid)

    conn.commit()
    cursor.close()
    conn.close()


