<?php
/**
 * Родительский контроллер для всех остальных контроллеров
 *
 */

namespace Helicopter\Core;

class Controller 
{
	/**
	 * Шаблонизатор. Используется во всех дочерних контроллерах для отображения представлений.
	 *
	 * @var object Объект шаблонизатора.
	 */
	protected $twig;

	public function __construct($twig)
	{
		$this->twig = $twig;
	}
}