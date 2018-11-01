## Talking Statue

## Installation
- Customize .env file (Change db name, username and password)
- Update Composer, require command from the Terminal:
``` composer update ```
- Create all table: 
``` php artisan migrate ```
if error occured rollback migration and import db from project folder DB/statue.sql
- Seed: 
``` php artisan db:seed ``` 
- Run project: 
``` php artisan serve ``` 
- Login from browser using username: admin@gmail.com, password: password

Features:
### Complete backend system for NEW YORK City statue finder.
### API for mobile application.


