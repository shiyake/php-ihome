#!/usr/local/bin/python
# coding: utf-8
__author__ = 'songwei'

import sys
import config
import random
import pickle

users = {}

def map_friend(fid):
    if users.has_key(fid):
        return (fid, users[fid].username,)
    return (fid, "")

if  __name__=='__main__':
    with open(config.dump_users_path, 'r') as f:
        users = pickle.load(f)
    with open(config.dump_friends_path, 'r') as f:
        friends = pickle.load(f)
    with open(config.dump_birthcitygroup_path, 'r') as f:
        group = pickle.load(f)
    with open(config.dump_class_path, 'r') as f:
        educlass = pickle.load(f)
    with open(config.dump_work_path, 'r') as f:
        works = pickle.load(f)
    for line in sys.stdin:
        id = int(line)
        if users.has_key(id) and group.has_key(users[id].birthcity):
            if friends.has_key(id):
                birth_uids = list(set(group[users[id].birthcity]).difference(set(friends[id])))
            else:
                birth_uids = group[users[id].birthcity]
            if len(birth_uids) < config.birthcity_count:
                slice = birth_uids
            else:
                slice = random.sample(birth_uids, config.birthcity_count)
            print "%d:%s:%s:%s" % (id, "hometown", users[id].birthcity, map(map_friend, slice))
        if users.has_key(id) and users[id].type == "edu" and educlass.has_key(users[id].subtitle):
            if friends.has_key(id):
                class_uids = list(set(educlass[users[id].subtitle]).difference(set(friends[id])))
            else:
                class_uids = educlass[users[id].subtitle]
            if len(class_uids) < config.educlass_count:
                slice = class_uids
            else:
                slice = random.sample(class_uids, config.educlass_count)
            print "%d:%s:%s:%s" % (id, "educlass", users[id].subtitle, map(map_friend, slice))
        if users.has_key(id) and users[id].type == "work" and works.has_key(users[id].title):
            if friends.has_key(id):
                work_uids = list(set(works[users[id].title]).difference(set(friends[id])))
            else:
                work_uids = works[users[id].title]
            if len(work_uids) < config.work_count:
                slice = work_uids
            else:
                slice = random.sample(work_uids, config.work_count)
            print "%d:%s:%s:%s" % (id, "work", users[id].title, map(map_friend, slice))

