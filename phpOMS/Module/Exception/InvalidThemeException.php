<?php
/**
 * Orange Management
 *
 * PHP Version 7.1
 *
 * @category   TBD
 * @package    TBD
 * @copyright  Dennis Eichhorn
 * @license    OMS License 1.0
 * @version    1.0.0
 * @link       http://orange-management.com
 */
declare(strict_types = 1);

namespace phpOMS\Module\Exception;

/**
 * Zero devision exception.
 *
 * @category   Framework
 * @package    phpOMS/Uri
 * @license    OMS License 1.0
 * @link       http://orange-management.com
 * @since      1.0.0
 */
class InvalidThemeException extends \UnexpectedValueException
{
    /**
     * Constructor.
     *
     * @param string     $message Exception message
     * @param int        $code    Exception code
     * @param \Exception $previous Previous exception
     *
     * @since  1.0.0
     */
    public function __construct(string $message, int $code = 0, \Exception $previous = null)
    {
        parent::__construct('Data for theme "' . $message . '" could be found.', $code, $previous);
    }
}
