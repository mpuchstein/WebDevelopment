# Übungsblatt 3
## Aufgabe 1: Datenbankmodellierung in phpMyAdmin
### Relation Boards
### Relation Personen
### Relation Spalten
### Relation Taskarten
### Relation Tasks
## Aufgabe 2: Referenzintegritäten
### Constraints der Table Spalten:
[] Boards.id aktualisiert | del(b Board) mit Spalten > b => repell
### Constraints der Table Tasks:
[] upd(Spalte.id) | del(s Spalte) mit Tasks > s => repell
[] upd(Person.id) => upd(tasks.pid = Person.id)
[] del(p Person) => del(tasks.fid = p.id)
[] upd(Taskart.id) => upd(task.taid = Taskart.id)
[] del(ta Taskart) => del(task.taid = ta.id)
