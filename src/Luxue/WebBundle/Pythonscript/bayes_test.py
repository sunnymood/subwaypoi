# coding=utf-8

import string
import csv
import numpy as np
from sklearn.naive_bayes import GaussianNB
from itertools import cycle
from time import time
import matplotlib.pyplot as plt
import matplotlib.colors as colors

#csv格式读取
csvfile = open('mixresult.csv', 'rb')
reader = csv.reader(csvfile)

data = []
for line in reader:
    data.append(line)


data = np.array(data)


governmentEntity_Number = data[:48,2]
community_Number = data[:48,3]
viewPoint_Number = data[:48,4]
officeBuilding_Number = data[:48,5]
shoppingMall_Number = data[:48,6]
hospital_Number = data[:48,7]
school_Number = data[:48,8]

betweenness = data[:48,9]
trafficvolume = data[:48,10]
buslines = data[:48,11]
CLUSTER_ID = data[:48,12]


csvfile.close()


x = np.array([
    np.reshape(governmentEntity_Number[1:], len(governmentEntity_Number)-1),
    np.reshape(community_Number[1:], len(community_Number)-1),
    np.reshape(viewPoint_Number[1:], len(viewPoint_Number)-1),
    np.reshape(officeBuilding_Number[1:], len(officeBuilding_Number)-1),
    np.reshape(shoppingMall_Number[1:], len(shoppingMall_Number)-1),
    np.reshape(hospital_Number[1:], len(hospital_Number)-1),
    np.reshape(school_Number[1:], len(school_Number)-1),

    np.reshape(betweenness[1:], len(betweenness)-1),
    np.reshape(trafficvolume[1:], len(trafficvolume)-1),
    np.reshape(buslines[1:], len(buslines)-1),
    np.reshape(CLUSTER_ID[1:], len(CLUSTER_ID)-1)
]).transpose()

x1 = []
for element in x.flat:
    x1.append(string.atof(element))

x1 = np.array(x1).reshape(-1,11)
'''
train_data_1 = x1[:,:9]
train_target_1 = x1[:,10]
print(train_data_1)
print(train_target_1)
'''

train_data_2 = x1[:42,:9]
train_target_2 = x1[:42,10]
test_data_2 = x1[42:,:9]
test_target_2 = x1[42:,10]
print(train_data_2.shape)
print(test_data_2.shape)
print(test_target_2)

'''
train_data_3 = x1[:45,:9]
train_target_3 = x1[:45,10]
test_data_3 = x1[45:,:9]
test_target_3 = x1[45:,10]

print(train_data_3)
print(train_target_3)
print(test_data_3)
print(test_target_3)

print(train_data_3.shape)
print(test_data_3.shape)
'''
gnb = GaussianNB()
y_pred = gnb.fit(train_data_2, train_target_2).predict(test_data_2)
print(y_pred)
print("Number of mislabeled points out of a total %d points : %d"  % (test_target_2.shape[0],(test_target_2 != y_pred).sum()))