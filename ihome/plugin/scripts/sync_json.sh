#!/bin/bash
#这个是主存储站点给其他站点同步data_xxxx.json用的脚本
#第一个参数是源文件的位置
#这样，就可以把本机的文件传给其他web服务器中了

scp $1 phpuser@web2:$1
scp $1 phpuser@web3:$1
