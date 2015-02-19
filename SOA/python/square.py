
import math


def square(number):
    l = {}
    for i in xrange(1, number+1):
        for y in xrange(1, i+1):
            for z in xrange(1, y+1):
                tn = i*i + y*y + z*z
                if int(math.sqrt(tn)) == math.sqrt(tn):
                    l[tn] = [i, y, z]
    return l

res = square(20)
for i in sorted(res):
    print str(i)+" : "+ str(res[i])