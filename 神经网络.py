import numpy as np
import matplotlib.pyplot as plt
def sigmoid(x):
    return 1/(1+np.exp(-x))
i=np.arange(-5.0,5.0)
y=sigmoid(i)
print(y)
plt.plot(i,y)
plt.ylim(-1.1,1.1)
plt.show()