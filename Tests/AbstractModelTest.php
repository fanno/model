<?php
/**
 * @copyright  Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Model\Tests;

use Joomla\Model\AbstractModel;
use Joomla\Registry\Registry;

require_once __DIR__ . '/Stubs/DatabaseModel.php';

/**
 * Tests for the Joomla\Model\Base class.
 *
 * @since  1.0
 */
class AbstractModelTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var    \Joomla\Model\Base
	 * @since  1.0
	 */
	private $instance;

	/**
	 * Tests the __construct method.
	 *
	 * @return  void
	 *
	 * @covers  Joomla\Model\Base::__construct
	 * @since   1.0
	 */
	public function test__construct()
	{
		$this->assertEquals(new Registry, $this->instance->getState(), 'Checks default state.');

		$state = new Registry(array('foo' => 'bar'));
		$class = new DatabaseModel($state);
		$this->assertEquals($state, $class->getState(), 'Checks state injection.');
	}

	/**
	 * Tests the setState method.
	 *
	 * @return  void
	 *
	 * @covers  Joomla\Model\Base::getState
	 * @covers  Joomla\Model\Base::setState
	 * @since   1.0
	 */
	public function testSetState()
	{
		$state = new Registry(array('foo' => 'bar'));
		$this->instance->setState($state);
		$this->assertSame($state, $this->instance->getState());
	}

	/**
	 * Setup the tests.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	protected function setUp()
	{
		// Note: We're using DatabaseModel because it still uses the majority of the AbstractModel methods.
		$this->instance = new DatabaseModel;
	}
}