# coding=utf-8


import csv
import numpy as np
from sklearn import cluster
import xlrd

'''
#(1)xlsx格式读取
fname = "scala-connectivity.xlsx"
bk = xlrd.open_workbook(fname)
shxrange = range(bk.nsheets)

try:
    sh = bk.sheet_by_name("Sheet1")
except:
    print("no sheet in %s named Sheet1", fname)

nrows = sh.nrows

ncols = sh.ncols

print("nrows %d,ncols %d" %(nrows,ncols))

#cell_value = sh.cell_value(1,1)

row_list = []
#获取各行数据
for i in range(1,nrows):
    row_data = sh.row_values(i)
    row_list.append(row_data)

#获取各列数据
for i in range(1,ncols):
    ncols = sh.col_values(i)

ids = sh.col_values(0)
betweenness = sh.col_values(2)
trafficvolume = sh.col_values(3)
buslines = sh.col_values(4)

x = np.array([
    np.reshape(betweenness[1:], len(betweenness)-1),
    np.reshape(trafficvolume[1:], len(trafficvolume)-1),
    np.reshape(buslines[1:], len(buslines)-1)
]).transpose()
'''



#(2)csv格式读取
csvfile = open('scala-connectivity.csv', 'rb')
reader = csv.reader(csvfile)

data = []
for line in reader:
    data.append(line)

data = np.array(data).reshape(-1,5)
print(data.dtype)


betweenness = data[:,2]
trafficvolume = data[:,3]
buslines = data[:,4]

print(betweenness)
print(trafficvolume)
print(buslines)

csvfile.close()


x = np.array([
    np.reshape(betweenness[1:], len(betweenness)-1),
    np.reshape(trafficvolume[1:], len(trafficvolume)-1),
    np.reshape(buslines[1:], len(buslines)-1)
]).transpose()

print(x)

#sklearn
k_means = cluster.KMeans(n_clusters=3)#K设为3
k_means.fit(x)
print(k_means.labels_[:])





