<?php
namespace Redaxscript\Filter;

/**
 * children class to filter special
 *
 * @since 2.2.0
 *
 * @category Redaxscript
 * @package Filter
 * @author Henry Ruhs
 */

class Special implements Filter
{
	/**
	 * sanitize the special
	 *
	 * @since 2.2.0
	 *
	 * @param string $special target with special character
	 *
	 * @return string
	 */

	public function sanitize($special = null)
	{
		$output = preg_replace('/\W+/i', '', $special);
		return $output;
	}
}
