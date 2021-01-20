<?php
use Main\App;

define('INSTALL_FOLDER', '/homework/agurkai-oop-db/');
define('URL', 'http://localhost/homework/agurkai-oop-db/');
define('DIR', __DIR__);

include __DIR__.'/bootstrap.php';

App::start()->send();