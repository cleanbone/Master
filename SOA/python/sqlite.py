
import sqlite3
import datetime
'''
aiuto: sqlite3, connect,cursor,execute,executemany, commit,close

classe vuota, tupla,dizionario, setattr()
'''

#conn = sqlite3.connect('example.db')

#conn.close()

def inserisci():
    conn = sqlite3.connect('example.db')
    c = conn.cursor()

    # Create table
    c.execute('''CREATE TABLE stocks
                 (date text, trans text, symbol text, qty real, price real)''')

    # Insert a row of data
    c.execute("INSERT INTO stocks VALUES ('2006-01-05','BUY','RHAT',100,35.14)")

    purchases = [('2006-03-28', 'BUY', 'IBM', 1000, 45.00),
             ('2006-04-05', 'BUY', 'MSFT', 1000, 72.00),
             ('2006-04-06', 'SELL', 'IBM', 500, 53.00),
            ]
    c.executemany('INSERT INTO stocks VALUES (?,?,?,?,?)', purchases)

    # Save (commit) the changes
    conn.commit()

    # We can also close the connection if we are done with it.
    # Just be sure any changes have been committed or they will be lost.
    conn.close()

def pulisci():

    conn = sqlite3.connect('example.db')
    c = conn.cursor()

    # Drop table
    c.execute('''DROP TABLE stocks''')

    # Save (commit) the changes
    conn.commit()
    conn.close()


def trova():
    conn = sqlite3.connect('example.db')
    c = conn.cursor()
    t = ('RHAT',)
    c.execute('SELECT * FROM stocks WHERE symbol=?', t)
    #print c.fetchone()
    c = conn.cursor()
    t = ('RHAT',)
    c.execute('SELECT * FROM stocks WHERE symbol=?', t)
    #print c.fetchone()
    # Esempio normale
    '''for row in c.execute('SELECT * FROM stocks ORDER BY price'):
        for ind in range(0,len(row)):
            print row[ind],
        print '\n'
    print '\n'

    #FARE
    '''
    for row in convert(c.execute('SELECT * FROM stocks ORDER BY price')):
        print row.date, row.trans
    print '\n'

    for row in convertStr(c.execute('SELECT * FROM stocks ORDER BY price'),('date','trans')):
        print row.date, row.trans
    print '\n'

    for row in convertDict(c.execute('SELECT * FROM stocks ORDER BY price'),{0: 'date',1:'trans'}):
        print row['date'], row['trans']
    print '\n'
'''
    for row in c.execute('SELECT * FROM stocks ORDER BY price'):
        date,trans,v3,v4,v5 = row
        print date, ' ', trans
    print '\n'

    for date,trans,v3,v4,v5 in c.execute('SELECT * FROM stocks ORDER BY price'):
        print date, ' ', trans
    print '\n'

    day = datetime.datetime.strptime(date, '%Y-%m-%d')
    print 'che giorno? ',day
    conn.close()
'''

class Riga:
    date = ""
    trans = ""
    symbol = ""
    qty = 0.0
    price = 0.0

    def __init__(self, d="", t="", s="", q=0.0, p=0.0):
        self.date = d
        self.trans = t
        self.symbol = s
        self.qty = q
        self.price = p


def convert(rs):
    for date, trans, symbol, qty, price in rs:
        r = Riga(date, trans, symbol, qty, price)
        yield r


def convertStr(rs, attrnames):
   for p in rs:
       r = Riga()
       setattr(r,attrnames[0],p[0])
       setattr(r,attrnames[1],p[1])
       yield r

def convertDict(rs, attrs):
    for p in rs:
       r = {}
       r[attrs[0]]= p[0]
       r[attrs[1]] = p[1]
       yield r

if True:
    #inserisci()
    trova()
else:
    pulisci()

