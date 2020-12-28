# AllSalud

1. Clone the last commit from the "Modificaciones Branch". It is important to know that in this case .env is available so you don't have to touch nothing in this point
2. Run composer update
3. Now is time to load the database, for doing this the best option is
  3.A Create a database called "allsalud"
  3.B Go to the root of the project->BD->allsalud_1 2.sql, use this file to generate all tables and take advantaje of the hundres of records already written =)
4. Run php artisan serve and get fun =)

PD: Going to localhost:8000/admin you can play with the administrator's interface, you can use for log in:
    USERNAME: info@allsalud.com.ar
    PASSWORD: 123
