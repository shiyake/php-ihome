#!/usr/local/bin/python2.7
#coding:utf8


import PySeg
import os, os.path

class SegUtil:
    tongyiPair = {}
    @classmethod
    def init(cls, folder):
        PySeg.init(folder)
        customWordPath = os.path.join(folder, "custom_word")
        if not os.path.exists(customWordPath):
            return 
        for fileName in os.listdir(customWordPath):
            path = os.path.join(customWordPath, fileName)
            wordFile = file(path)
            while True:
                line = wordFile.readline()
                if len(line) == 0:
                    break
                PySeg.addUserWord(line.decode("utf8").encode("gbk"))
            wordFile.close()
        tongyiWordPath = os.path.join(folder, "tong_yi_word")
        if not os.path.exists(tongyiWordPath):
            return
        for fileName in os.listdir(tongyiWordPath):
            path = os.path.join(tongyiWordPath, fileName)
            wordFile = file(path)
            while True:
                line = wordFile.readline()
                if len(line) == 0:
                    break
                seps = line.split()
                if len(seps) != 2:
                    continue
                if seps[0] not in cls.tongyiPair:
                    cls.tongyiPair[seps[0]] = seps[1]
                    PySeg.addUserWord(seps[0].decode('utf8').encode("gbk"))
                    PySeg.addUserWord(seps[1].decode('utf8').encode("gbk"))


    @classmethod
    def seg(cls, content):
        res = []
        tmp = PySeg.seg(content)
        for t in tmp:
            if t[0] in cls.tongyiPair:
                res.append((cls.tongyiPair[t[0]], t[1]))
            else:
                res.append(t)
        return res

    @classmethod
    def SegForLtp(cls, content):
        words = PySeg.seg(content)
        res = []
        for w in words:
            res.append((w[0].decode('utf8').encode('gb2312'), cls.ConvertPosICT2Ltp(w[1])))
        return tuple(res)

    @classmethod
    def ConvertPosICT2Ltp(cls, pos):
        converts = [('nr', 'nh'), ('ns', 'ns'), ('nt', 'ni'), ('n', 'n'), ('t', 'nt'), ('s', 'nl'), ('f', 'nd'), ('v', 'v'), ('an', 'b'), ('a', 'a'), ('b', 'a'), ('z', 'a'), ('r', 'r'), ('m', 'm'), ('q', 'q'), ('d', 'd'), ('p', 'p'), ('c', 'c'), ('u', 'u'), ('e', 'e'), ('y', 'u'), ('o', 'o'), ('h', 'h'), ('k', 'k'), ('x', 'x'), ('w', 'wp')]
        for t in converts:
            if pos[0:len(t[0])] == t[0]:
                return t[1]
        return 'x'


if __name__ == '__main__':
    SegUtil.init(".")
    words = "无无"
    parts = SegUtil.seg(words)
    for p in parts:
        print p[0].decode("utf8"), p[1]


