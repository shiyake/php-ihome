#!/usr/bin/env python

import MySQLdb, time, sys
sys.path.append("../../")
import config


if __name__ == '__main__':
    conn = MySQLdb.connect(host=config.dbhost, user='root', passwd='nameLR9969', db='ihome', port=config.dbport, charset='utf8')
    cursor = conn.cursor()
    closetime = time.time() - 3600 * 24 * 3;
    cursor.execute("select a.id, a.doid, b.dateline from ihome_complain as a, ihome_complain_op as b where a.lastopid = b.id and a.status = 1")
    tocloseid = []
    for item in cursor.fetchall():
        print item
        if item[2] < closetime:
            tocloseid.append(str(item[0]))
    print tocloseid
    if len(tocloseid) > 0:
        cursor.execute("update ihome_complain set status = 2 where id in (%s)" % ",".join(tocloseid))
        conn.commit()
    
