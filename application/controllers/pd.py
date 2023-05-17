#!/usr/bin/env python

from random import random
import array as arr
from scipy import stats as stats
from math import sqrt
import sys

from scipy.stats import norm, beta

pd = sys.argv[1]
N = int(sys.argv[2])
al = float(sys.argv[3])
be = float(sys.argv[4])
me = float(sys.argv[5])
sd = float(sys.argv[6])
v = float(sys.argv[7])
i = 0
arr_beta = []
arr_norm = []
    
def inv_beta(al, be, me, sd):
    result = beta.ppf(random(), al, be, me, sd)
    return result

def inv_norm(me, sd, v):
    result = norm.ppf(random(), me, v)
    return result

# if-else for type of distribution
if pd == 'beta':
    for i in range(N):
        output_beta = (inv_beta(al, be, me, sd))
        arr_beta.append(output_beta)
        
    print(arr_beta)
elif pd == 'normal':
    for i in range(N):
        output_norm = (inv_norm(me, sd, v))
        arr_norm.append(output_norm)
    
    print(arr_norm)