<?php
namespace Redaxscript\Tests\Admin\View\Helper;

use Redaxscript\Admin\View\Helper;
use Redaxscript\Module;
use Redaxscript\Modules\TestDummy;
use Redaxscript\Tests\TestCaseAbstract;

/**
 * NotificationTest
 *
 * @since 4.0.0
 *
 * @package Redaxscript
 * @category Tests
 * @author Henry Ruhs
 */

class NotificationTest extends TestCaseAbstract
{
	/**
	 * setUp
	 *
	 * @since 3.1.0
	 */

	public function setUp()
	{
		parent::setUp();
		$installer = $this->installerFactory();
		$installer->init();
		$installer->rawCreate();
		$testDummy = new TestDummy\TestDummy($this->_registry, $this->_request, $this->_language, $this->_config);
		$testDummy->install();
	}

	/**
	 * tearDown
	 *
	 * @since 3.1.0
	 */

	public function tearDown()
	{
		$installer = $this->installerFactory();
		$installer->init();
		$installer->rawDrop();
	}

	/**
	 * providerRender
	 *
	 * @since 4.0.0
	 *
	 * @return array
	 */

	public function providerRender() : array
	{
		return $this->getProvider('tests/provider/Admin/View/Helper/notification_render.json');
	}

	/**
	 * testRender
	 *
	 * @since 4.0.0
	 *
	 * @param array $optionArray
	 * @param string $expect
	 *
	 * @dataProvider providerRender
	 */

	public function testRender(array $optionArray = [], string $expect = null)
	{
		/* setup */

		Module\Hook::construct($this->_registry, $this->_request, $this->_language, $this->_config);
		Module\Hook::init();
		$adminNotification = new Helper\Notification($this->_language);
		$adminNotification->init($optionArray);

		/* actual */

		$actual = $adminNotification->render();

		/* compare */

		$this->assertEquals($expect, $actual);
	}
}
