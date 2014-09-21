#!/usr/bin/env python

import MySQLdb, time, sys

if __name__ == '__main__':
   curtime = int(time.time()) - 3600 * 3;
   conn = MySQLdb.connect(host="localhost", user='root', passwd='nameLR9969', db='ihome', port=3306, charset='utf8')
   cursor = conn.cursor()
   infos = {}
   cursor.execute("select uid, lastupdate, upnum, downnum, allreplynum, allreplysecs from ihome_complain_dep")
   for item in cursor.fetchall():
       infos[item[0]] = [item[1], item[2], item[3], item[4], item[5]]
   cursor.execute("select a.updown, b.uid, a.dateline from ihome_complain_op_updown as a, ihome_complain_op as b where a.opid = b.id and a.dateline > %d" % curtime)
   for item in cursor.fetchall():
       if item[1] in infos:
           if item[2] < infos[item[1]][0]:
               continue
           if item[0] == 1:#up
               infos[item[1]][1] += 1
           else:
               infos[item[1]][2] += 1
   print infos
   for k, v in infos.iteritems():
       cursor.execute("update ihome_complain_dep set upnum = %d, downnum=%d, updownnum=%d, aversecs = %d, score = %d, lastupdate=%d where uid = %d" % (v[1], v[2], v[1] + v[2], int(v[4]/v[3]), v[1] - v[2], int(time.time()), k)); 
       conn.commit()



