<?php
namespace Redaxscript\Tests;
use Redaxscript\Registry;

/**
 * RegistryTest
 *
 * @since 2.1.0
 *
 * @package Redaxscript
 * @category Tests
 * @author Henry Ruhs
 * @author Gary Aylward
 */

class RegistryTest extends TestCase
{
	/**
	 * instance of the registry class
	 *
	 * @var object
	 */

	protected $_registry;

	/**
	 * setUp
	 *
	 * @since 2.1.0
	 */

	protected function setUp()
	{
		$this->_registry = Registry::getInstance();
		$this->_registry->init();
	}

	/**
	 * testGetAndSet
	 *
	 * @since 2.1.0
	 */

	public function testGetAndSet()
	{
		/* setup */

		$this->_registry->set('testKey', 'testValue');

		/* result */

		$result = $this->_registry->get('testKey');

		/* compare */

		$this->assertEquals('testValue', $result);
	}

	/**
	 * testGetAll
	 *
	 * @since 2.2.0
	 */

	public function testGetAll()
	{
		/* setup */

		$this->_registry->set('testAll', 'testAll');

		/* result */

		$result = $this->_registry->get();

		/* compare */

		$this->assertArrayHasKey('testAll', $result);
	}

	/**
	 * testGetInvalid
	 *
	 * @since 2.1.0
	 */

	public function testGetInvalid()
	{
		/* result */

		$result = $this->_registry->get('invalidKey');

		/* compare */

		$this->assertEquals(null, $result);
	}
}
