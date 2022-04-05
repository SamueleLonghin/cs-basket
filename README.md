## Cos'è

Questo è un progetto "commissionato" dal ministero per l'istruzione in occasione dei campionati studenteschi di basket dell'anno scolastico 2017/2018. L'applicativo permetteva di:

- visualizzare i risultati delle partite in tempo reale suddivise per squadra, regione e girone
- salvare i risultati
- calcolare le squadre abilitate al passaggio alla fase elimiantoria
- altre cose che non ricordo

## Come è stato fatto

È stato realizzato in php appoggiandosi (male) al framework yii2.

Per la parte di DataBase è stato usato mysql (anche questo molto male).

Probabilmente se qualcuno proverà mai a leggere il codice sarà l'ultima cosa che si troverà a leggere da quanto è scritto male ma a mia discolpa questo è stato il mio vero primo progetto ed è stato realizzato in pochissimo tempo ed in fretta... Vi auguro buona visione

# Utilizzo

### Per avviare il tutto:

- Clonare la repository
- Installare docker da [Docker](https://docs.docker.com/get-docker/)
- aprire un terminale nella cartella radice della repo
- eseguire `docker-compose up`
- Se vedi che non va prova ad eseguire sul terminale:  `docker exec -it yii_web_basket composer update`
  

### Per visualizzare il servizio

- [avviare il docker](#per-avviare-il-tutto)
- andare su [http://localhost:8080](http://localhost:8080)

### Per fermare il tutto:

- aprire un terminale nella cartella radice della repo
- eseguire `docker-compose down`

## Crediti

L'applicativo è stato sviluppato quasi interamente da me ma hanno comunque contribuito anche:

- Bottazzo Angelo -> Grafica del sito
- Edoardo Ginghina -> Molta grafica del sito
