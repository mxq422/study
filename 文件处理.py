# _*_coding:utf-8 _*_
import os
import xlrd
import pandas as pd
import pprint

def listdir(path,list_name=[]):#列举指定路径内所有含路径文件名称（包含二级及以上路径）
    for file in os.listdir(path):
        file_path=os.path.join(path,file)
        if os.path.isdir(file_path):
            listdir(file_path,list_name)
        else:
            list_name.append(file_path)
    return list_name
path="D:/111"
list_name=listdir(path)
book=xlrd.open_workbook(list_name[0])
sheet=book.sheet_by_name("Total")
data={}
#for i in range(7,sheet.nrows):
#    row=sheet.row_values(i)
#    country=row[0]
#   data[country]={"1月":[],"2月":[],"3月":[]}
#pprint.pprint(data)