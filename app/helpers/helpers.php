<?php
/**
 * Вспомогательные функции
 *
 */

/**
 * Отображение представления.
 *
 * @param object $twig Шаблонизатор.
 * @param string $templateName Название шаблона без расширения.
 * @param array @params Переменные, которые необходимо передать представлению.
 * @param string @extension Расширение загружаемого представления.
 */
function view($twig, $templateName, $params=array(), $extension='.html')
{
	echo $twig->render($templateName . $extension, $params);
}

/**
 * Функция для отладки.
 *
 * @param mixed $object Любой объект, переменная, массив и т.д., который нужно проинспектировать.
 * @param boolean @die Останавливать ли программу после инспектирования объекта.
 */
function d($object, $die=true)
{
	ladybug_set_theme('modern');
	ladybug_dump($object);

	if ($die) die();
}

/**
 * Функция для перенаправления на другой контроллер
 *
 * @param string $controller Название контроллера
 */
function redirect($controller)
{
	header('Location: http://example.local/' . $controller);
}