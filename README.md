~ PROJET_4 ~
 
Requirements :
   Composer, Twig, Sass
 
Composer quick install:
   php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
   php -r "if (hash_file('sha384', 'composer-setup.php') === 'e5325b19b381bfd88ce90a5ddb7823406b2a38cff6bb704b0acc289a09c8128d4a8ce2bbafcd1fcbdc38666422fe2806') { echo 'Installer    verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
   php composer-setup.php
   php -r "unlink('composer-setup.php');"
 
Installation Twig:
   composer require "twig/twig:^3.0"
 
Installation sass:
   npm install sass -g
Compilation sass:
   npm run sass

Changement d'accés à la BDD :
   =>  Dans le fichier db_config.yml situé dans le dossier config,
       modifier les valeurs correspondant à votre base de données.

Le fichier db.sql situé à la racine vous permettra d'importer la base de données.

Login Administrateur : 
   Username : admin@admin.com
   Password : AdminPassword
