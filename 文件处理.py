# _*_coding:utf-8 _*_
import os
import xlrd
import pandas as pd
import pprint
import numpy as np

def listdir(path,list_name=[]):#列举指定路径内所有含路径文件名称（包含二级及以上路径）
    for file in os.listdir(path):
        file_path=os.path.join(path,file)
        if os.path.isdir(file_path):
            listdir(file_path,list_name)
        else:
            list_name.append(file_path)
    return list_name

def content(path):#提取excel内容并形成字典
    book=xlrd.open_workbook(path)
    sheet=book.sheet_by_name("Total") 
    . 
    data={}
    for i in range(7,sheet.nrows):
        row=sheet.row_values(i)
        #        data.append(row)
        #    return data
        #    row=sheet.row_values(i)
        #country=row[0]
        #data[country]={"1月":row[1],"2月":row[2],"3月":row[3]}
        data=np.array(row)
    return data
path="D:/111"
list_name=listdir(path)
dict_1={}
dict_2={}
list_1=[]

for i in list_name:
    dict_1[i]=content(i)
    print(content(i))
    list_1.append(list(dict_1.values()))
pprint.pprint(list_1)
    