def ageMap(input):
    out = {}
    el = ""
    odd = True
    for i in input:
        if(odd):
            el = i
            odd = False
        else :
            if i in out:
                out[i].append(el)
            else:
                out[i] = [el]
            odd = True
    return out
inp = ['a',20,'b',21,'c',20]
print ageMap(inp)
