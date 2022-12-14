#!/usr/bin/env python

import sys
import scipy.stats

x = float(sys.argv[1])      #expected duration
m = float(sys.argv[2])      #mean
s = float(sys.argv[3])      #standard deviation

# x = 16
# m = 15
# s = 0.58

z = (m - x) / s

p = scipy.stats.norm.cdf(x, m, s) 
print (p)