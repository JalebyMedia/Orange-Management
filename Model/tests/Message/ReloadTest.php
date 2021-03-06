<?php
/**
 * Orange Management
 *
 * PHP Version 7.2
 *
 * @package    tests
 * @copyright  2013 Dennis Eichhorn
 * @license    OMS License 1.0
 * @version    1.0.0
 * @link       http://website.orange-management.de
 */

namespace phpOMS\tests\phpOMS\Model\Message;

use phpOMS\Model\Message\Reload;

class ReloadTest extends \PHPUnit\Framework\TestCase
{

    public function testAttributes()
    {
        $obj = new Reload();
        self::assertInstanceOf('\phpOMS\Model\Message\Reload', $obj);

        /* Testing members */
        self::assertObjectHasAttribute('delay', $obj);
    }

    public function testDefault()
    {
        $obj = new Reload();

        /* Testing default values */
        self::assertEquals(0, $obj->toArray()['time']);
    }

    public function testSetGet()
    {
        $obj = new Reload(5);

        self::assertEquals(['type' => 'reload', 'time' => 5], $obj->toArray());
        self::assertEquals(\json_encode(['type' => 'reload', 'time' => 5]), $obj->serialize());
        self::assertEquals(['type' => 'reload', 'time' => 5], $obj->jsonSerialize());

        $obj->setDelay(6);
        self::assertEquals(['type' => 'reload', 'time' => 6], $obj->toArray());

        $obj2 = new Reload();
        $obj2->unserialize($obj->serialize());
        self::assertEquals($obj, $obj2);
    }
}
