import  numpy as np
import matplotlib.pyplot as plt
def sigmoid(x):
    return 1/(1+np.exp(-x))
def relu(x):
    return np.maximum(0,x)
i=np.array([[100,100,0.1]])
print(i)
print(np.ndim(i),i.shape)