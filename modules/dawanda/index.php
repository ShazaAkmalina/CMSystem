<?php
namespace Redaxscript\Modules;

use Redaxscript\Module;

/**
 * javascript powered dawanda api client
 *
 * @since 2.2.0
 *
 * @package Redaxscript
 * @category Modules
 * @author Henry Ruhs
 */

class Dawanda extends Module
{
	/**
	 * custom module setup
	 *
	 * @var array
	 */

	protected static $_module = array(
		'name' => 'Dawanda',
		'alias' => 'dawanda',
		'author' => 'Redaxmedia',
		'description' => 'Javascript powered Dawanda API client',
		'version' => '2.2.0',
		'status' => 1,
		'access' => 0
	);

	/**
	 * loaderStart
	 *
	 * @since 2.2.0
	 */

	public static function loaderStart()
	{
		global $loader_modules_scripts;
		$loader_modules_scripts[] = 'modules/dawanda/scripts/startup.js';
		$loader_modules_scripts[] = 'modules/dawanda/scripts/dawanda.js';
	}
}