#!/usr/bin/env python

from random import random
import array as arr
from scipy import stats as stats
from math import sqrt
import sys

from scipy.stats import norm, beta

pd = sys.argv[1]
a = int(sys.argv[2])
m = int(sys.argv[3])
b = int(sys.argv[4])
N = int(sys.argv[5])
i = 0
arr_norm = arr.array( 'f' , [] )
arr_beta = arr.array( 'f' , [] )
arr_tri = arr.array( 'f' , [] )
    
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

# if-else for type of distribution
if pd == 'beta':
    for i in range(N):
        output_beta = (inv_beta(a, m, b))
        arr_beta.append(output_beta)
        
    average_beta = sum(arr_beta)/len(arr_beta)
    print (average_beta)
elif pd == 'normal':
    for i in range(N):
        output_norm = (inv_norm(a, m, b))
        arr_norm.append(output_norm)
    
    average_norm = sum(arr_norm)/len(arr_norm)
    print (average_norm)
elif pd == 'tri':
    for i in range(N):
        output_tri = (inv_tri(a, m, b))
        arr_tri.append(output_tri)
    
    average_tri = sum(arr_tri)/len(arr_tri)
    print (average_tri)