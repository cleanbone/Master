__author__ = 'marino'

from google.appengine.api import users
from google.appengine.ext import ndb

DEFAULT_USER_NAME = 'anonimo'


# We set a parent key on the 'Greetings' to ensure that they are all in the same
# entity group. Queries across the single entity group will be consistent.
# However, the write rate should be limited to ~1/second.

def recensione_key(user_name=DEFAULT_USER_NAME):
    """Constructs a Datastore key for a Guestbook entity with guestbook_name."""
    return ndb.Key('Recensione', user_name)


class Greeting(ndb.Model):
    """Models an individual Guestbook entry with author, content, and date."""
    author = ndb.UserProperty()
    content = ndb.StringProperty(indexed=False)
    date = ndb.DateTimeProperty(auto_now_add=True)


class Utente(ndb.Model):
    nome = ndb.StringProperty(indexed=True)
    password = ndb.StringProperty(indexed=False)

class Cinema(ndb.Model):
    nome = ndb.StringProperty(indexed=True)

class Film(ndb.Model):
    titolo = ndb.StringProperty(indexed=True)

def creaRecensione(login , passwd , title , cine, rat, commento):
    # recupera user
    ute = Utente.query(Utente.nome == login).get()
    if ute:
        if ute.password != passwd:
            return ute.nome, 'password errata'
        ute = ute.key
    else:
        ute = Utente(nome=login,password=passwd).put()
    mov = Film.query(Film.titolo == title).get()
    if mov:
        mov = mov.key
    else:
        mov = Film(titolo=title).put()
    cin = Cinema.query(Cinema.nome == cine).get()
    if cin:
        cin = cin.key
    else:
        cin = Cinema(nome =cine).put()
    rece= Recensione(author=ute, movie = mov, cinema=cin, rating = rat,testo=commento).put()
    return 'inserito', 'rece'


class Recensione(ndb.Model):
   # author = ndb.UserProperty()
    author = ndb.KeyProperty(kind=Utente)
    movie = ndb.KeyProperty(kind=Film)
    cinema = ndb.KeyProperty(kind=Cinema)
    rating = ndb.StringProperty(indexed=True)
    testo = ndb.StringProperty(indexed=False)
    date = ndb.DateTimeProperty(auto_now_add=True)

    def __str__(self):
        return self.testo #str(self.author)

def popolaGAE():
    movie1 = Film(titolo='Blade Runner').put()
    movie2 = Film(titolo='Star Wars').put()
    utente1 = Utente(nome='marino',password='marino').put()
    utente2 = Utente(nome='mario',password='mario').put()
    cine1= Cinema(nome='Romano').put()
    cine2= Cinema(nome='Eliseo').put()
    rec1= Recensione(author=utente1, movie = movie1, cinema=cine1, rating = '4',testo='bello').put()
    rec2= Recensione(author=utente2, movie = movie2, cinema=cine2, rating = '5',testo='molto bello').put()
