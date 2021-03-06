<?php
/**
 * Orange Management
 *
 * PHP Version 7.2
 *
 * @package    TBD
 * @copyright  Dennis Eichhorn
 * @license    OMS License 1.0
 * @version    1.0.0
 * @link       http://website.orange-management.de
 */
//<editor-fold desc="Require/Include">
require_once __DIR__ . '/phpOMS/Autoloader.php';
require_once __DIR__ . '/config.php';
//</editor-fold>

$App = new \Socket\SocketApplication($CONFIG, $argv[1] ?? SocketType::TCP_CLIENT);
