# php-no-framework
Basic App Without Framework
#Instalation
  - php min version 5.6
  - Clone the repository
  - If you don't have composer yet, please get it by this [LINK] (https://getcomposer.org/)
  - Run "php composer.phar install" or "composer install"
  - Set the server DOCUMENT ROOT to ``public/`` directory of the application;
    - You can use the command ``php -S 0.0.0.0:8000 -t public/``
  - Access localhost:8000/funcionario
##Don't forget to create the database (see ``db.sql``) and configure your database connection
    
#Application Structure;
  - configs/config.php
    - Configuration Array. It Provides Routes, database config and generic services.
  - public/index.php;
    - Application DOCUMENT ROOT. The Server MUST point to this directory.
  - src/Controllers;
    - Application Controllers.
  - src/Db;
    - It contains models and ConnectionFactory to provide the PDO conection object;
  - src/Traits;
    - Traits to validation, formatting and utilities;
  - src/layouts;
     - Directory of base layouts (templates) to the aplication
     - src/layouts/home_layout
       - Directory that contains "head_layout" and "foot_layout".
  - src/views
    - Contains the content of base layouts (templates);
  - src/views/funcionario
    - Contains the view of FuncionarioController.
    
#Framework    
  - src/Lib;
    - This directory contains the "framework".
  - src/Lib/Application;
    - This class provides the aplication startup.
      - It Process the request route and execute the respective controller method;
      - It Creates the container object.
  - src/Lib/Controller;
    - Base class to Controllers
  - src/Lib/Container;
    - Class responsible to retrieve services;
  - src/Lib/Renderable;
    - All "responseAware" classes must implement this interface;
  - src/Lib/Rederer/HTMLRenderer
    - Class to make HTML responses
  - src/Lib/Rederer/JSONRenderer
    - Class to make JSON responses
