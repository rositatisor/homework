<?php

define('INSTALL_FOLDER', '/homework/agurkai-oop-mvc/');
define('URL', 'http://localhost/homework/agurkai-oop-mvc/');
define('DIR', __DIR__);

include __DIR__.'/bootstrap.php';

Main\App::route();