<?php

function view($twig, $templateName, $params=array(), $extension='.html')
{
	echo $twig->render($templateName . $extension, $params);
}

function d($object, $die=true)
{
	ladybug_set_theme('modern');
	ladybug_dump($object);

	if ($die) die();
}

function redirect($controller)
{
	header('Location: http://example.local/' . $controller);
}

function base_url()
{
	echo "http://" . $_SERVER['SERVER_NAME'] . '/';
}