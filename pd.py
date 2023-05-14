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
arr_norm = arr.array( 'f' , [] )
arr_beta = arr.array( 'f' , [] )
arr_tri = arr.array( 'f' , [] )
    
def inv_beta(al, be, me, sd):
    # alpha = (4 * m + b - 5 * a) / (b - a )
    # bet4 = (5 * b - a - 4 * m) / (b - a )
    # mean = (a + 4*m + b) / 6
    # sd = (b - a) / 6
    
    result = beta.ppf(random(), al, be, me, sd)
    return result

def inv_norm(me, sd, v):
    # me = (a + m + b) / 3
    # sd = (((a - mean)**2) + ((m - mean)**2) + ((b - mean)**2)) / 3
    # v = sqrt(sd)
    result = norm.ppf(random(), me, v)
    return result

# if-else for type of distribution
if pd == 'beta':
    output_beta = (inv_beta(al, be, me, sd))
    print(output_beta)
elif pd == 'normal':
    output_norm = (inv_norm(me, sd, v))
    print(output_norm)