Database Set up

Directions: 
    1. Go to "localhost/phpmyadmin"
    2. Click the "Databases" tab
    3. Under Create Database enter "GatorAirlines" and Collation = uft8 -> uft8_general_ci
    4. Click "GatorAirlines" which should appear in the list below
    5. Create Table "airports" 5 columns
    6. Fill in the information under airports below in this txt file

key: pk = primary key, ai = auto increment

Schema : "GatorAirlines"

Tables

airports 
    - airport_id (int, pk, ai)
    - name (varchar(65), null)
    - city (varchar(40), null)
    - state (varchar(2), null)
    - iata (varchar(3), null)