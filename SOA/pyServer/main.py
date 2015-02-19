import cgi
import urllib
import logging
import webapp2
import json
import os

from google.appengine.api import users
from google.appengine.ext import ndb
from google.appengine.ext.db import Query

from entita import *


class MainHandler(webapp2.RequestHandler):
    def get(self):
        popolaGAE()
        self.response.write('CIAO MONDO!!')

# DEFAULT_GUESTBOOK_NAME = 'default'
#
# def guestbook_key(guestbook_name=DEFAULT_GUESTBOOK_NAME):
#    """Constructs a Datastore key for a Guestbook entity with guestbook_name."""
#    return ndb.Key('Guestbook', guestbook_name)

live = os.environ['SERVER_SOFTWARE'].startswith('Development')


class Recens(webapp2.RequestHandler):
    def post(self):
        logging.getLogger().setLevel(logging.DEBUG)
        # We set the same parent key on the 'Greeting' to ensure each Greeting
        # is in the same entity group. Queries across the single entity group
        # will be consistent. However, the write rate to a single entity group
        # should be limited to ~1/second.
        logging.warning('dentro a Recens.post() ')
        login = self.request.get('login', 'anonimo')
        password = self.request.get('password', 'anonimo')
        title = self.request.get('title', 'nessun titolo')
        rating = self.request.get('rating', '3')
        cinema = self.request.get('cinema', 'chissa')
        commento = self.request.get('comment', 'nessun commento')
        ut, pw = creaRecensione(login, password, title, cinema, rating, commento);
        logging.debug('ut=%s pw=%s', ut, pw)
        logging.debug('dentro a recens.post')
        self.response.write('parametri :' + ut + ' ' + pw)

    def get(self):
        logging.getLogger().setLevel(logging.DEBUG)
        logging.warning('dentro a Recens.get() ')
        res = Recensione.query()
        #res = q.get()
        oute = ''
        for rec in res:
            oute += ' ' + str(rec)
        logging.debug('dentro a recens.get %s', res)
        self.response.write('parametri :' + oute)


class TitoliFilm(webapp2.RequestHandler):
    def get(self):
        logging.getLogger().setLevel(logging.DEBUG)
        logging.warning('dentro a TitoliFilm.get() ')
        res = Film.query()
        #res = q.get()
        oute = []
        for rec in res:
            oute.append(rec.titolo)
        logging.debug('dentro a TitoliFilm.get %s', oute)
        self.response.headers['Content-Type'] = 'application/json'
        self.response.write(json.dumps(oute))


class ProvaLog(webapp2.RequestHandler):
    def get(self):
        # Checks for active Google account session
        user = users.get_current_user()
        if user:
            self.response.headers['Content-Type'] = 'text/plain'
            self.response.write('Hello, ' + user.nickname())
        else:
            self.redirect(users.create_login_url(self.request.uri))


app = webapp2.WSGIApplication([
                                  ('/', MainHandler),
                                  ('/recensione', Recens),
                                  ('/titoli', TitoliFilm),
                                  ('/sign', ProvaLog),

                              ], debug=True)

#if __name__ == '__main__':
#    res = Film.query()
#    oute = []
#    for rec in res:
#        oute.append(rec)
#    print oute