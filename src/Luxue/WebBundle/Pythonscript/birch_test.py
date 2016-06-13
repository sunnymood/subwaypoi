# coding=utf-8

import string
import csv
import numpy as np
from itertools import cycle
from time import time
import matplotlib.pyplot as plt
import matplotlib.colors as colors

from sklearn.preprocessing import StandardScaler
from sklearn.cluster import Birch, MiniBatchKMeans
from sklearn.datasets.samples_generator import make_blobs


#csv格式读取
csvfile = open('landuse.csv', 'rb')
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

csvfile.close()


x = np.array([
    np.reshape(governmentEntity_Number[1:], len(governmentEntity_Number)-1),
    np.reshape(community_Number[1:], len(community_Number)-1),
    np.reshape(viewPoint_Number[1:], len(viewPoint_Number)-1),
    np.reshape(officeBuilding_Number[1:], len(officeBuilding_Number)-1),
    np.reshape(shoppingMall_Number[1:], len(shoppingMall_Number)-1),
    np.reshape(hospital_Number[1:], len(hospital_Number)-1),
    np.reshape(school_Number[1:], len(school_Number)-1)
]).transpose()

x1 = []
for element in x.flat:
    x1.append(string.atof(element))

x1 = np.array(x1).reshape(-1,7)
print(x1)

'''
#sklearn
k_means = cluster.KMeans(n_clusters=3)
k_means.fit(x)
print(k_means.labels_[:])
'''


brc = Birch(branching_factor=50, n_clusters=3, threshold=0.5,compute_labels=True)
brc.fit(x1)
#brc.predict(x1)
print(brc.labels_[:])




