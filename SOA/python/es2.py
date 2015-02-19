def sum(nInput):
    s = 0
    while nInput > 0:
        print('Insert number:')
        n = int(raw_input())
        s += n
        nInput-=1
    return s
print('How many number do you want to sum:')
s = sum(int(raw_input()))
print('This is the sum:')
print s
