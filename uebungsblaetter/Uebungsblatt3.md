# Übungsblatt 3
---
1. ## Aufgabe 1: Datenbankmodellierung in phpMyAdmin
- ### Relation Boards
- ### Relation Personen
- ### Relation Spalten
- ### Relation Taskarten
- ### Relation Tasks
---
2. ## Aufgabe 2: Referenzintegritäten
### Constraints der Table Spalten:
 - [ ] Boards.id aktualisiert | del(b Board) mit Spalten > b => repell
### Constraints der Table Tasks:
 - [ ] upd(Spalte.id) | del(s Spalte) mit Tasks > s => repell
 - [ ] upd(Person.id) => upd(tasks.pid = Person.id)
 - [ ] del(p Person) => del(tasks.fid = p.id)
 - [ ] upd(Taskart.id) => upd(task.taid = Taskart.id)
 - [ ] del(ta Taskart) => del(task.taid = ta.id)

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
  9.[ ] test the database
