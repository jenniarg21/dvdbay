# dvdbay
PHP e-commerce website selling DVD's.

Live website: http://jenniarg.com/movies/index.php

This is an updated project that was built in a PHP version below 5.5. I updated it to be compliant with PHP 7 and updated both the design and functionality. This website allows end users to view DVD's for purchase and create accounts. It also lets administrators add products to the database which get displayed for the end users. With that said, I have not added purchasability--this is a future functionality.

The design is now modern:
  - Header is fixed on the page and consists of dynamic dropdown menus for navigation
  - Footer contains entire navigation for usability
  - Images are more prevalent than previously on the landing page
  - Images for the DVD covers have a text overlay to assist with usability in reading title names that may be too small on read on the images
  - Design is somewhat responsive (exclusion with the header navigation for smaller resolution displays)

Functionality-wise:
  - This site now uses sessions on each page instead of using the GET method for user login verification--which was a huge security risk previously
  - Header code, footer code, and re-usable PHP scripts are brought in from separate files to make it easier to make changes across the website and cuts down on lines of code
  - Database credentials are now separated in a private configuration file

This project is still a work-in-progress but it shows a fair amount of my skill level in PHP and MySQL. And it also shows how fast I can pick up new/updated technologies as this revamp was done on a single weekend.

If you'd like to see what an admin view would be like on the DVDBay website here are some credentials (don't worry, I trust you~):
Username: admin@movies.com
Password: pass123
