#!/usr/bin/env python

import MySQLdb
import urllib2, json
from seg_util import SegUtil
import heapq

tags = {}

def load_blog(conn):
    cursor = conn.cursor()
    cursor.execute("select a.blogid, a.uid, a.subject, a.dateline, b.message from ihome_blog a left join ihome_blogfield b on a.blogid = b.blogid")
    rows = cursor.fetchall()
    for row in rows:
        parts = []
        if row[2]:
            parts = SegUtil.seg(row[2].encode("utf8"))
        if row[4]:
            parts.extend(SegUtil.seg(row[4].encode("utf8")))
        for p in parts:
            if p[1] == 'ns' or p[1] == 'nr' or p[1] == 'nt' or p[1] == 'n':
                if p[0] not in tags:
                    tags[p[0]] = 0
                tags[p[0]] += 1

    cursor.close()

def load_doing(conn):
    cursor = conn.cursor()
    cursor.execute("select a.doid, a.uid, a.message, a.dateline from ihome_doing a")
    rows = cursor.fetchall()
    for row in rows:
        parts = []
        if row[2]:
            parts = SegUtil.seg(row[2].encode("utf8"))
        for p in parts:
            if p[1] == 'ns' or p[1] == 'nr' or p[1] == 'nt' or p[1] == 'n':
                if p[0] not in tags:
                    tags[p[0]] = 0
                tags[p[0]] += 1


    cursor.close()



    

if __name__ == '__main__':
    conn = MySQLdb.connect(host="localhost", user='root', passwd='nameLR9969', db='ihome', port=3306, charset='utf8')
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
    while len(h) > 0:
        num, word = heapq.heappop(h)
        cursor.execute("INSERT INTO ihome_tagcloud(tag_word, tag_count) values (%s, %s)", (word, num))
        print cursor._executed
        if lastid < 0:
            lastid = cursor.lastrowid

    cursor.execute("delete from ihome_tagcloud where id < %s", lastid)

    conn.commit()
    cursor.close()
    conn.close()


