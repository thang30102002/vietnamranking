<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.9-dev
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

return array(
	/**
	 * -------------------------------------------------------------------------
	 *  Default route
	 * -------------------------------------------------------------------------
	 *
	 */

	'_root_' => 'player',

	/**
	 * -------------------------------------------------------------------------
	 *  Page not found
	 * -------------------------------------------------------------------------
	 *
	 */

	'_404_' => 'welcome/404',

	/**
	 * -------------------------------------------------------------------------
	 *  Example for Presenter
	 * -------------------------------------------------------------------------
	 *
	 *  A route for showing page using Presenter
	 *
	 */

	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
	'player/info' => 'player/info',
	'player/checkTkon' =>'player/checkTkon',
	'player/wallet' => 'player/wallet',	
	'api/tournament/(:id)?' => 'api/tournament/detail/$1',
	'login' => 'account/index',
	'logout' => 'account/logout',
	'player/detail/(:id)' =>'player/detail/$1',
	'getPass' => 'account/getPass',
	'register' => 'account/register',
	'checkTkonGetPass' => 'account/checkTkonGetPass',
	'checkTkon' => 'account/checkTkon',


);
