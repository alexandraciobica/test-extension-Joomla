# test-extension-Joomla
An extension made for the GSoC 2018 proposal @Joomla

Requirements:
--------
Backend: 
As a Super User I want to choose a user with the user field and save the ID somewhere in the database

Frontend: As User I want to see the chosen user with his/her name which has a link to his/her profile

Implementation details:
---------
I named the extension helloworld because I wanted to differentiate it from com_users, and because I started it from the helloworld tutorial.

The **backend** can be accessed at /administrator/index.php/option=com_helloworld.

I have used a JHtml 'jgrid.state' to provide the option of changing whether the profile of the user is made public or not. I have extended the UsersModel and added a column `publicProfile` in the `#__users` table through an sql alter script at install of the component.

------
The **frontend** can be accessed by adding a site menu item, it is named "Hello world!", or by accessing /index.php/option=com_helloworld?view=helloworld.
