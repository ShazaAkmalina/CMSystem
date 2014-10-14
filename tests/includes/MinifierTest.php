<?php
namespace Redaxscript\Tests;

use Redaxscript\Minifier;

/**
 * MinifierTest
 *
 * @since 2.2.0
 *
 * @package Redaxscript
 * @category Tests
 * @author Henry Ruhs
 */

class MinifierTest extends TestCase
{
	/**
	 * providerStyles
	 *
	 * @since 2.2.0
	 *
	 * @return array
	 */

	public function providerStyles()
	{
		return $this->getProvider('tests/provider/minifier_styles.json');
	}

	/**
	 * providerScripts
	 *
	 * @since 2.2.0
	 *
	 * @return array
	 */

	public function providerScripts()
	{
		return $this->getProvider('tests/provider/minifier_scripts.json');
	}

	/**
	 * testStyles
	 *
	 * @since 2.2.0
	 *
	 * @param string $styles
	 * @param string $expect
	 *
	 * @dataProvider providerStyles
	 */

	public function testStyles($styles = null, $expect = null)
	{
		/* setup */

		$minifier = new Minifier();

		/* result */

		$result = $minifier->styles($styles);

		/* compare */

		$this->assertEquals($expect, $result);
	}

	/**
	 * testScripts
	 *
	 * @since 2.2.0
	 *
	 * @param string $scripts
	 * @param string $expect
	 *
	 * @dataProvider providerScripts
	 */

	public function testScripts($scripts = null, $expect = null)
	{
		/* setup */

		$minifier = new Minifier();

		/* result */

		$result = $minifier->scripts($scripts);

		/* compare */

		$this->assertEquals($expect, $result);
	}
}
