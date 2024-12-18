# Übungsblatt 3

---

## Aufgabe 1: Datenbankmodellierung in phpMyAdmin

- ### Relation Boards [x]

| Field     | Type      | Description       |
|-----------|-----------|-------------------|
| id        | int       | primary, autoinc  |
| board     | varchar   | name des boards   | 

- ### Relation Personen [x]

| Field     | Type      | Description       |
|-----------|-----------|-------------------|
| id        | int       | primary, autoinc  |
| name      | varchar   | name der person   | 
| email     | varchar   | email adress      | 
| passwort  | varchar   | passwort          | 

- ### Relation Spalten [x]

| Field                 | Type      | Description       |
|-----------------------|-----------|-------------------|
| id                    | int       | primary, autoinc  |
| boardsid              | int       | foreignkey board  | 
| sortid                | int       | ???               | 
| spalte                | varchar   | name der spalte   | 
| spalteneschreibung    | varchar   | beschreibung      | 

- ### Relation Taskarten [x]

| Field         | Type      | Description       |
|---------------|-----------|-------------------|
| id            | int       | primary, autoinc  |
| taskart       | varchar   | Name der taskart  | 
| taskartenicon | varchar   | Icon der taskart  | 

- ### Relation Tasks [x]

| Field            | Type     | Description      |
|------------------|----------|------------------|
| id               | int      | primary, autoinc |
| personenid       | int      | | 
| taskartenid      | int      | | 
| spaltenid        | int      | | 
| sortid           | int      | | 
| tasks            | varchar  | | 
| erstelldatum     | date     | | 
| erinnerungsdatum | datetime | | 
| erinnerung       | smallint | | 
| notizen          | text     | | 
| erledigt         | smallint | | 
| geloescht        | smallint | | 

---
## Aufgabe 2: Referenzintegritäten
### Constraints der Table Spalten:
 - [x] Boards.id aktualisiert | del(b Board) mit Spalten > b => repell
### Constraints der Table Tasks:
 - [x] upd(Spalte.id) | del(s Spalte) mit Tasks > s => repell
 - [x] upd(Person.id) => upd(tasks.pid = Person.id)
 - [x] del(p Person) => del(tasks.fid = p.id)
 - [x] upd(Taskart.id) => upd(task.taid = Taskart.id)
 - [x] del(ta Taskart) => del(task.taid = ta.id)

- ## Uebung 3: Datenbankmodellierung in phpMyAdmin
  - Deadline: 11.12.2024
  1. [X] create new database
  2. [X] create 'boards' table:
      - [X] id
      - [X] board
  3. [X] create 'personen' table:
      - [X] id
      - [X] vorname
      - [X] name
      - [X] email
      - [X] passwort
  4. [X] create 'spalten' table:
      - [X] id
      - [X] boardsid
      - [X] spalte
      - [X] spaltenbeschreibung
      - [X] adding foreign keys
  5. [X] create 'taskarten' table:
      - [X] id
      - [X] taskart
      - [X] taskartenicon
  6. [X] create 'tasks' table:
      - [X] id
      - [X] personenid
      - [X] taskartenid
      - [X] spaltenid
      - [X] sortid
      - [X] tasks
      - [X] erstelldatum
      - [X] erinnerung
      - [X] notizen
      - [X] erledigt
      - [X] geloescht
      - [X] adding foreign keys
  7. [X] adding constaints
  8. [X] export database
  9.[x] test the database
