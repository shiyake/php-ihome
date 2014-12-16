#!/usr/bin/env python

import MySQLdb, time, sys, jieba, re, datetime
# sys.path.append("../../")
# import config


if __name__ == '__main__':
    # conn = MySQLdb.connect(host=config.dbhost, user='root', passwd='nameLR9969', db='ihome', port=config.dbport, charset='utf8')
    conn = MySQLdb.connect(host='localhost', user='root', passwd='nameLR9969', db='ihome', port=3306, charset='utf8')
    cursor = conn.cursor()
    chinesere = re.compile(ur'[\u4e00-\u9fff]+')
    starttime = int(time.time() - 3600 * 24);
    datestr = datetime.datetime.now().strftime("%Y%m%d")
    cursor.execute("select message, atuid from ihome_complain where addtime > %d" % starttime)
    results = {}
    results[0] = {}
    for item in cursor.fetchall():
        print item[0].encode('utf8')
        atuid = item[1]
        words = jieba.cut(item[0].encode('utf8'))
        for i in words:
            if chinesere.search(i):
                word = i.encode("utf8")
                if atuid not in results:
                    results[atuid] = {}
                result = results[atuid]
                if word not in result:
                    result[word] = 0
                result[word] += 1
                if word not in results[0]:
                    results[0][word] = 0
                results[0][word] += 1

    for atuid, result in results.iteritems():
        for word, num in result.iteritems():
            cursor.execute("insert into ihome_complain_tagcloud (tag_word, tag_count, max_type, type, datatime, atuid) values ('%s', %d, 1, 1, '%s', %d)" % (word, num, datestr, atuid))
            conn.commit()


