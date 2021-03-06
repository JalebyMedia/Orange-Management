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

use phpOMS\Model\Message\Dom;
use phpOMS\Model\Message\DomAction;

class DomTest extends \PHPUnit\Framework\TestCase
{

    public function testAttributes()
    {
        $obj = new Dom();
        self::assertInstanceOf('\phpOMS\Model\Message\Dom', $obj);

        /* Testing members */
        self::assertObjectHasAttribute('delay', $obj);
        self::assertObjectHasAttribute('content', $obj);
        self::assertObjectHasAttribute('selector', $obj);
        self::assertObjectHasAttribute('action', $obj);
    }

    public function testDefault()
    {
        $obj = new Dom();

        /* Testing default values */
        self::assertEquals(0, $obj->toArray()['time']);
        self::assertEquals('', $obj->toArray()['selector']);
        self::assertEquals('', $obj->toArray()['content']);
        self::assertEquals(DomAction::MODIFY, $obj->toArray()['action']);
    }

    public function testSetGet()
    {
        $obj = new Dom();
        $obj->setDelay(3);
        $obj->setAction(DomAction::SHOW);
        $obj->setContent('msg');
        $obj->setSelector('#sel');

        self::assertEquals([
            'type' => 'dom',
            'time' => 3,
            'selector' => '#sel',
            'action' => DomAction::SHOW,
            'content' => 'msg',
        ], $obj->toArray());

        self::assertEquals(\json_encode([
            'type' => 'dom',
            'time' => 3,
            'selector' => '#sel',
            'action' => DomAction::SHOW,
            'content' => 'msg',
        ]), $obj->serialize());

        self::assertEquals([
            'type' => 'dom',
            'time' => 3,
            'selector' => '#sel',
            'action' => DomAction::SHOW,
            'content' => 'msg',
        ], $obj->jsonSerialize());

        $obj2 = new Dom();
        $obj2->unserialize($obj->serialize());
        self::assertEquals($obj, $obj2);
    }
}
