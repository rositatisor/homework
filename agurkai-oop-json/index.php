<?php

define('DOOR_BELL', 'ring');
define('INSTALL_FOLDER', '/homework/agurkai-oop-json/');
define('URL', 'http://localhost/homework/agurkai-oop-json/');
define('DIR', __DIR__);

include __DIR__.'/bootstrap.php';

Main\App::route();