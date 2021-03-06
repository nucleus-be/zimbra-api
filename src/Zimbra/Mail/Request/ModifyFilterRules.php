<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\Mail\Request;

use Zimbra\Mail\Struct\FilterRules;

/**
 * ModifyFilterRules request class
 * Modify Filter rules
 *
 * @package    Zimbra
 * @subpackage Mail
 * @category   Request
 * @author     Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright  Copyright © 2013 by Nguyen Van Nguyen.
 */
class ModifyFilterRules extends Base
{
    /**
     * Filter rules
     * @var FilterRules
     */
    private $_filterRules;

    /**
     * Constructor method for ModifyFilterRules
     * @param  FilterRules $filterRules
     * @return self
     */
    public function __construct(FilterRules $filterRules)
    {
        parent::__construct();
        $this->child('filterRules', $filterRules);
    }

    /**
     * Get or set filterRules
     *
     * @param  FilterRules $filterRules
     * @return FilterRules|self
     */
    public function filterRules(FilterRules $filterRules = null)
    {
        if(null === $filterRules)
        {
            return $this->child('filterRules');
        }
        return $this->child('filterRules', $filterRules);
    }
}
