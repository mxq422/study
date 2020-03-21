
# coding: utf-8
import sys, os
sys.path.append(os.pardir)  # 为了导入父目录的文件而进行的设定
import numpy as np
from dataset.mnist import load_mnist
from PIL import Image

import numpy as np
import matplotlib.pyplot as plt
def sigmoid(x):
    return 1/(1+np.exp(-x))
def relu(x):
    return np.maximum(0,x)
def identity_function(x):
    return x
def init_network():
    network={}
    network["W1"]=np.array([[0.1,0.3,0.5],[0.2,0.4,0.6]])
    network["b1"]=np.array([0.1,0.2,0.3])
    network["W2"]=np.array([[0.1,0.4],[0.2,0.5],[0.3,0.6]])
    network["b2"]=np.array([0.1,0.2])
    network["W3"]=np.array([[0.1,0.3],[0.2,0.4]])
    network["b3"]=np.array([0.1,0.2])
    return network
def forward(network,x):
    W1,W2,W3=network["W1"],network["W2"],network["W3"]
    b1,b2,b3=network["b1"],network["b2"],network["b3"]
    a1=np.dot(x,W1)+b1
    z1=sigmoid(a1)
    a2=np.dot(z1,W2)+b2
    z2=sigmoid(a2)
    a3=np.dot(z2,W3)+b3
    y=identity_function(a3)
    return y
def softmax(a):#概率
    c=np.max(a)
    exp_a=np/exp(a-c)
    sum_exp_a=np.sum(exp_a)
    y=exp_a/sum_exp_a
    return y
