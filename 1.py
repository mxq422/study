# _*_coding:utf-8 _*_
import os
import pandas as pd

def listdir(path,list_name=[]):#列举指定路径内所有文件名称（包含二级及以上路径）
    for file in os.listdir(path):
        file_path=os.path.join(path,file)
        if os.path.isdir(file_path):
            listdir(file_path,list_name)
        else:
            list_name.append(file_path)
    return list_name
path="D:/111"
