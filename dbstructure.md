Using mySQL to setup database connection. 

The database connection is connected to dbadmin.one.com which is the local hosting site for one.com, the hosting is via phpMyAdmin and the structure of the database is as follows:
For the bookings i only have one table to store all the information. This is for the rendering of the calendar to be easier where i take the dates and room_type directly from this calendar. 

In the future there will be a Table of "user" since the setup of my code have the possibility to activate deletion of dates via an admin site. 

Tables: bookings 

Columns: 
id    booking_date    created_at    updated_at    email    name    room_type    features
