#!/usr/bin/env python

import MySQLdb, time, sys, jieba, re, datetime
sys.path.append("../../")
import config


if __name__ == '__main__':
    conn = MySQLdb.connect(host=config.dbhost, user='root', passwd='nameLR9969', db='ihome', port=config.dbport, charset='utf8')
    cursor = conn.cursor()
    chinesere = re.compile(ur'[\u4e00-\u9fff]+')
    starttime = int(time.time() - 3600 * 2);
    datestr = datetime.datetime.now().strftime("%Y%m%d")
    cursor.execute("select message from ihome_complain where addtime > %d" % starttime)
    results = {}
    for item in cursor.fetchall():
        print item[0].encode('utf8')
        words = jieba.cut(item[0].encode('utf8'))
        for i in words:
            if chinesere.search(i):
                word = i.encode("utf8")
                if word not in results:
                    results[word] = 0
                results[word] += 1

    for word, num in results.iteritems():
        cursor.execute("insert into ihome_complain_tagcloud (tag_word, tag_count, max_type, type, datatime) values ('%s', %d, 1, 1, '%s')" % (word, num, datestr))
        conn.commit()


