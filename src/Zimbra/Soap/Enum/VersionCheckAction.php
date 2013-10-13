<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\Soap\Enum;

/**
 * VersionCheckAction enum class
 * @package   Zimbra
 * @category  Soap
 * @author    Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright Copyright © 2013 by Nguyen Van Nguyen.
 */
class VersionCheckAction extends Base
{
    /**
     * Constant for value 'check'
     * @return string 'check'
     */
    const CHECK = 'check';
    /**
     * Constant for value 'status'
     * @return string 'status'
     */
    const STATUS = 'status';
}
