# def twoSum (self, nums, target):
#         #for   i in range(1,len(nums)):
#     for i in range(1,len(nums)),j=j in range(1,len(nums)):
#         print(i,j)
#         if  i==j:
#             pass
#         elif  i != j:
#             if nums[j]+nums[j]==target:
#             print(i,j)
#                 break
#             else:
#                 pass
#         else:
#             pass

class Solution:
    def twoSum(self, nums, target):
        """
        :type nums: List[int]
        :type target: int
        :rtype: List[int]
        """
        result = list()
        for i in range(len(nums)):
            for j in range(i+1,len(nums)):
                if target == nums[i] + nums[j]:
                    result.append(i)
                    result.append(j)
        return result
nums=[2,7,12,15]
target=9
twoSum(nums,target)
print(target)