__author__ = 'songwei'

class User:
    def __init__(self, uid=0, birthcity="", title="", subtitle="", userclass="", type="", username=""):
        self.uid = uid
        self.username = username
        self.birthcity = birthcity
        self.title = title
        self.subtitle = subtitle
        self.userclass = userclass
        self.type = type

    def __str__(self):
        return "uid:%d,type:%s" % (self.uid, self.type)

    def __unicode__(self):
        return "uid:%d,type:%s" % (self.uid, self.type)