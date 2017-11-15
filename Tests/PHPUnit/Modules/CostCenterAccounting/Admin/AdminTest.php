<?php
/**
 * Orange Management
 *
 * PHP Version 7.1
 *
 * @category   TBD
 * @package    TBD
 * @author     OMS Development Team <dev@oms.com>
 * @copyright  Dennis Eichhorn
 * @license    OMS License 1.0
 * @version    1.0.0
 * @link       http://website.orange-management.de
 */

namespace Tests\PHPUnit\Modules\CostCenterAccounting\Admin;

use Modules\CostCenterAccounting\Admin\Installer;
use Modules\CostCenterAccounting\Admin\Uninstall;
use phpOMS\ApplicationAbstract;
use phpOMS\DataStorage\Database\DatabasePool;
use phpOMS\Module\ModuleManager;

require_once __DIR__ . '/../../../../../phpOMS/Autoloader.php';
require_once __DIR__ . '/../../../../../config.php';

class AdminTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @group admin
     * @slowThreshold 5000
     */
    public function testModuleIntegration() 
    {
        $app = new class extends ApplicationAbstract {};
        $app->dbPool = $GLOBALS['dbpool'];

        $moduleManager = new ModuleManager($app, __DIR__ . '/../../../../../Modules');
        $moduleManager->install('CostCenterAccounting');

        $moduleManager->deactivate('CostCenterAccounting');
        self::assertFalse($moduleManager->isActive('CostCenterAccounting'));

        $moduleManager->activate('CostCenterAccounting');
        self::assertTrue($moduleManager->isActive('CostCenterAccounting'));
    }
}
