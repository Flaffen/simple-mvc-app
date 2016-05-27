<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('app/views');

$twig = new Twig_Environment($loader, array(
	'cache' => 'tmp/twig',
	'auto_reload' => 'true'
));

$function = new Twig_SimpleFunction('base_url', function() {
	return 'http://' . $_SERVER['SERVER_NAME'] . '/';
});
$twig->addFunction($function);