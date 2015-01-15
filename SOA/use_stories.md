## Use Stories
* Attori: Utenti del cinema, gestore del cinema, sistema
* il cliente sceglie il cinema
* il cliente sceglie il film e la proiezione (restituisce
  la sala)
* il cliente indica il numero di posti e se li vuole
  adiacenti (restituisce il numero di fila e il numero
  di posto)
* (Consigliato ma non previsto) il cliente può avere una
  visione dello stato della sala e selezionare lui i posti
* il cliente lascia i propri dati a conferma
* il sistema riceve una nuova richiesta di prenotazione
  con sala, spettacolo,
    numero di posti e se sono adiacenti. Il sistema controlla se è possibile
    soddisfare la richiesta, sceglie i posti da restituire e li marca come occupabili
* ricevuta la conferma salva il numero di telefono nella prenotazione e salva i posti
    come prenotati. Se arriva un segnale di annullamento o un timeout il sistema ripristina lo stato libero dei posti.
    I Posti dovranno quindi contenere data di modifica e stato.
* l'operatore può richiedere lo stato della sala per un determinato spettacolo
* l'operatore può utilizzare lo stesso sistema del cliente evitando l'inserimento del numero

## CLASSI CRC

### Cinema
* Attributi:
  * Nome
  * Indirizzo

### Sala
* Attributi:
  * Cinema
  * Numero sala
  * Numero file
  * Posti per fila

### Spettacolo
* Attributi:
  * Sala
  * Film
  * Data e ora

### Film
* Attributi:
  * Nome film
  * Descrizione
  * Durata

### Prenotazione
* Attributi:
  * Utente
  * Spettacolo

### Posto
* Attributi:
  * Sala
  * Prenotazione
  * Numero posto
  * Fila
  * Stato

### Utente
* Attributi:
  * Numero di telefono
  * Tipologia
  * username
  * Password
