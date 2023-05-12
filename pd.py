#!/usr/bin/env python
K='f'
J=print
B=int
from random import random as C
import array as D
from scipy import stats as R
from math import sqrt as E
import sys as A
from scipy.stats import norm,beta
F=A.argv[1]
G=B(A.argv[2])
H=B(A.argv[3])
I=B(A.argv[4])
S=B(A.argv[5])
T=0
U=D.array(K,[])
V=D.array(K,[])
W=D.array(K,[])
def L(a,m,b):A=(4*m+b-5*a)/(b-a);B=(5*b-a-4*m)/(b-a);D=(a+4*m+b)/6;E=(b-a)/6;F=beta.ppf(C(),A,B,D,E);return F
def M(a,m,b):A=(a+m+b)/3;B=((a-A)**2+(m-A)**2+(b-A)**2)/3;D=E(B);F=norm.ppf(C(),A,D);return F
def N(a,m,b):
	D=C()
	if D<(m-a)/(b-a):A=1;B=-2*a;F=a**2-D*(m-a)*(b-a);G=(-B+E(B**2-4*A*F))/2/A
	else:A=1;B=-2*b;F=b**2-(1-D)*(b-a)*(b-m);G=(-B-E(B**2-4*A*F))/2/A
	return G
if F=='beta':O=L(G,H,I);J(O)
elif F=='normal':P=M(G,H,I);J(P)
elif F=='tri':Q=N(G,H,I);J(Q)