Inventory Tool README
-----------------------------

The tool requires a web server running PHP 5.4, MySQL 5.6,
and an internet connection to access Google fonts.
The tool runs on 'localhost'.

-----------------------------
The following scripts require a user with sufficient privileges for MySQL such as root:

inv-tool.sql           Creates a database with a small number of items and a user
inv-tool_cleanup.sql   Removes the database and the user

-----------------------------
Connection settings are located in common.php
The following values are expected:

Host:       localhost
User:       inv_user
Pass:       inv123
Database:   invdemo
Table:      inventory

-----------------------------
To run the tool:

1. Unzip to the public_html directory on the web server.

2. Create the database and the user by running: 

   mysql -u root -p < ./inv-tool/sql/inv-tool.sql
   
3. Open the following file in a web browser on 'localhost': 

   http://localhost/inv-tool/php/index.php
   
4. Use the tool.

5. When you are finished reviewing the tool, you can remove the database and the user by running:

   mysql -u root -p < ./inv-tool/sql/inv-tool_cleanup.sql
   

