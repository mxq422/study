class Solution:
    def game(self, guess, answer) :
        count=0
        while count<3:
            for i,j in zip(guess,answer):
                n=0
                print(i,j)
                if i==j:
                    n=n+1
                    print(n)
                else:   
                    continue
                print(count)
                count=count+1
        print(n)
