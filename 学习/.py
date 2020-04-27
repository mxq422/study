#-*- coding:utf-8 -*-
class Solution:#猜数字游戏
    def game(self, guess, answer) :
        count=0
        while count<3:
            for i,j in zip(guess,answer):
                n=0
                if i==j:
                    n=n+1
                else:
                    continue
                count=count+1
        return n
'''在这个小作业中，您将得到一串用空格分隔的数字，并且必须返回最高和最低数字。
例：
high_and_low("1 2 3 4 5")  # return "5 1"
high_and_low("1 2 -3 4 5") # return "5 -3"
high_and_low("1 9 3 4 -5") # return "9 -5" '''
def high_and_low(numbers):
    numbers_1=list(map(int,numbers.split(" ")))
    numbers_1.sort()
    print(numbers_1)
    a=numbers_1[-1]
    b=numbers_1[0]
    return a,b
a="1 2 3 4 5 6"
b="4 5 29 54 4 0 -214 542 -64 1 -3 6 -6"
c=high_and_low(a)
d=high_and_low(b)
print(c,d)