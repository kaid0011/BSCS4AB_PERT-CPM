#!/usr/bin/env python

from random import random
import array as arr
from scipy import stats as stats

from scipy.stats import norm, weibull_min, beta

# import warnings
# warnings.filterwarnings("ignore")

def inv_beta(a, m, b):
    alpha = (4 * m + b - 5 * a) / (b - a )
    bet4 = (5 * b - a - 4 * m) / (b - a )
    mean = (a + 4*m + b) / 6
    sd = (b - a) / 6
    
    result = beta.ppf(x, alpha, bet4, mean, sd)
    return result

a = 1
m = 1.5
b = 3

N = int(input("Enter number of trials:"))
arr_results = arr.array( 'f' , [] )

i = 0
for i in range(N):
    x = random()
    # print(x)
    output = (inv_beta(a, m, b))
    # print (output)
    arr_results.append(output)
    
# print (arr_results)
average = sum(arr_results)/len(arr_results)
print (average)