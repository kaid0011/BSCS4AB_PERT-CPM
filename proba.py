#!/usr/bin/env python

from random import random
import array as arr
from scipy import stats as stats
from math import sqrt

from scipy.stats import norm, weibull_min, beta

# import warnings
# warnings.filterwarnings("ignore")

def inv_beta(a, m, b):
    alpha = (4 * m + b - 5 * a) / (b - a )
    bet4 = (5 * b - a - 4 * m) / (b - a )
    mean = (a + 4*m + b) / 6
    sd = (b - a) / 6
    
    result = beta.ppf(random(), alpha, bet4, mean, sd)
    return result

def inv_norm(a, m , b):
    mean = (a + m + b) / 3
    sd = (((a - mean)**2) + ((m - mean)**2) + ((b - mean)**2)) / 3
    var = sqrt(sd)
    result = norm.ppf(random(), mean, var)
    return result

def inv_tri(a, m, b):
    r = random()
    if r < (m - a) / (b - a):
        x = 1
        y = -2 * a
        z = a**2 - r * (m - a) * (b - a)
        result = (-y + sqrt(y**2 - 4 * x * z)) / 2 / x
    else:
        x = 1
        y = -2 * b
        z = b**2 - (1 - r) * (b - a) * (b - m)
        result = (-y - sqrt(y**2 - 4 * x * z)) / 2 / x
    return result

a = 1
m = 1.5
b = 3

N = int(input("Enter number of trials:"))
arr_norm = arr.array( 'f' , [] )
arr_beta = arr.array( 'f' , [] )
arr_tri = arr.array( 'f' , [] )

i = 0
for i in range(N):
    # print(x)
    output_norm = (inv_norm(a, m, b))
    output_beta = (inv_beta(a, m, b))
    output_tri = (inv_tri(a, m, b))
    # print (output)
    arr_norm.append(output_norm)
    arr_beta.append(output_beta)
    arr_tri.append(output_tri)
    
# print (arr_results)
average_norm = sum(arr_norm)/len(arr_norm)
average_beta = sum(arr_beta)/len(arr_beta)
average_tri = sum(arr_tri)/len(arr_tri)
print (average_norm)
print (average_beta)
print (average_tri)