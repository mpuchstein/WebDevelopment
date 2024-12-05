# GitHub Repository for the university project Webentwicklung WS2024/25
## Goal
A KanBan board with CodeIgniter 4 as backend

//TODO: explain what a KanBan is

### How to remove index.php from URLs in CodeIgniter 4 and Apache
https://codeigniter.com/user_guide/general/urls.html#removing-the-index-php-file
#### httpd.conf:=
1. Enable rewrite_module
2. Allow override for the DocumentRoot or add a own directory configuration for the project
3. Add .htaccess to /public

## ToDos:
- ### Aufgabe 1: Die erste statische Webseite
  1. [x] Integrate Bootstrap CSS and JS
  2. [x] Implement own CSS
  3. [x] Place logo in nav
  4. [x] Add Tasks, Spalten, Boards to nav
  5. [x] Let nav have a color
  6. [x] Tasks:
     - As startpage it will contain the future KanBan board
     - for now:
       - [x] contain 1 container element
       - [x] contain 1 card element
  7. [x] Footer:
     - [x] contain Copyright Web-Entwicklung Team 2024
     - [x] contain Impressum
     - [x] contain Datenschutz
     - [x] contain Kontakt
     - [x] get styled
- ### 2. Aufgabe 3: Bootstrap Tables
  - [x] create new webpage, referenced by Spalten in nav
  - [x] create a table containing:
    - [x] ID
    - [x] Board
    - [x] Sortid
    - [x] Spalte
    - [x] Spaltenbeschreibung
    - [x] Bearbeiten
  - [x] create 2 example rows
  - [x] place button "Erstellen" above the table
- ### 3. Aufgabe 4: Formulare
  - [x] aim the button from the previous assignment towards a new webpage
  - [x] add following elements to the page using bootstrap:
    - [x] field type text for Spaltenbezeichnung
    - [x] textarea for Spaltenbezeichnung
    - [x] field type text for Sortid
    - [x] dropdown
    - [x] buttons for save and reset
  - [x] pair every element with an label
  - [x] make button "Speichern" visual different to "Abbrechen" 
  - [x] give the formular a heading
- ### Uebung 3: Datenbankmodellierung in phpMyAdmin
  - Deadline: 11.12.2024
  1. [X] create new database
  2. [X] create 'boards' table:
      - [X] id
      - [X] board
  3. [ ] create 'personen' table:
      - [ ] id
      - [ ] vorname
      - [ ] name
      - [ ] email
      - [ ] passwort
  4. [ ] create 'spalten' table:
      - [ ] id
      - [ ] boardsid
      - [ ] spalte
      - [ ] spaltenbeschreibung
      - [ ] adding foreign keys
  5. [ ] create 'taskarten' table:
      - [ ] id
      - [ ] taskart
      - [ ] taskartenicon
  6. [ ] create 'tasks' table:
      - [ ] id
      - [ ] personenid
      - [ ] taskartenid
      - [ ] spaltenid
      - [ ] sortid
      - [ ] tasks
      - [ ] erstelldatum
      - [ ] erinnerung
      - [ ] notizen
      - [ ] erledigt
      - [ ] geloescht
      - [ ] adding foreign keys
  7. [ ] adding constaints
  8. [ ] test the database
