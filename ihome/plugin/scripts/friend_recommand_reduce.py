#!/usr/local/bin/python
# coding: utf-8
__author__ = 'songwei'

'''
将收到的 用户id:推荐好友类型:出生地:推荐好友id列表  翻译成SQL语句作为reduce过程的输出
'''


import sys
import re
import time

if  __name__=='__main__':
    pattern = re.compile(r'^(\d+):([^:]*):([^:]*):(.+)')
    for line in sys.stdin:
        match = pattern.match(line)
        if match:
            groups = match.groups()
            if groups[1] == 'hometown':
                birthcity = groups[2]
                uid, friends = groups[0], eval(groups[3])
                uid = int(uid)
                print "DELETE FROM ihome.ihome_friend_toRecomment WHERE uid1=%d AND res_toRecomment='%s';" % (uid, 'same_hometown')
                for i in friends:
                    fid, fname = i[0], i[1]
                    print "INSERT INTO ihome.ihome_friend_toRecomment(uid1, uid2, time, res_toRecomment, other, username) " \
                    "VALUES(%d, %d, '%s', '%s', '%s', '%s');" % (uid, fid, time.time(), 'same_hometown', birthcity, fname)
            elif groups[1] == 'educlass':
                classname = groups[2]
                uid, friends = groups[0], eval(groups[3])
                uid = int(uid)
                print "DELETE FROM ihome.ihome_friend_toRecomment WHERE uid1=%d AND res_toRecomment='%s';" % (uid, 'same_class_edu')
                for i in friends:
                    fid, fname = i[0], i[1]
                    print "INSERT INTO ihome.ihome_friend_toRecomment(uid1, uid2, time, res_toRecomment, other, username) " \
                    "VALUES(%d, %d, '%s', '%s', '%s', '%s');" % (uid, fid, time.time(), 'same_class_edu', classname, fname)
            elif groups[1] == 'work':
                work = groups[2]
                uid, friends = groups[0], eval(groups[3])
                uid = int(uid)
                print "DELETE FROM ihome.ihome_friend_toRecomment WHERE uid1=%d AND res_toRecomment='%s';" % (uid, 'same_class_work')
                for i in friends:
                    fid, fname = i[0], i[1]
                    print "INSERT INTO ihome.ihome_friend_toRecomment(uid1, uid2, time, res_toRecomment, other, username) " \
                    "VALUES(%d, %d, '%s', '%s', '%s', '%s');" % (uid, fid, time.time(), 'same_class_work', work, fname)