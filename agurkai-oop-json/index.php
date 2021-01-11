<?php

define('DOOR_BELL', 'ring');
define('INSTALL_FOLDER', '/homework/agurkai-oop-json/');

$uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']);
$uri = explode('/', $uri);

include __DIR__.'/bootstrap.php';

define('URL', 'http://localhost/homework/agurkai-oop-json/');
define('DIR', __DIR__);


// Router
if('sodinimas' == $uri[0]) {
    include __DIR__.'/sodinimas.php';
}
elseif('auginimas' == $uri[0]) {
    include __DIR__.'/auginimas.php';
} 
elseif('skynimas' == $uri[0]) {
    include __DIR__.'/skynimas.php';
} 