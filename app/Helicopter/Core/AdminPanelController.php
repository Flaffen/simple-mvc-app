<?php
/**
 * Родительский контроллер всех контроллеров админ-части сайта.
 *
 */

namespace Helicopter\Core;

use Helicopter\Core\Controller;

class AdminPanelController extends Controller
{
	/**
	 * При инициализации всех дочерних контроллеров будет проверяться: ввёл ли пользователь логин и пароль,
	 * Если нет, перенаправить на страницу входа.
	 *
	 * @param object $twig Шаблонизатор
	 */
	public function __construct($twig)
	{
		parent::__construct($twig);
		
		if (!isset($_SESSION['logged']))
		{
			redirect('auth');
		}
	}
}