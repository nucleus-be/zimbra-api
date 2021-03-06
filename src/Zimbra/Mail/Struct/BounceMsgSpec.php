<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\Mail\Struct;

use Zimbra\Common\TypedSequence;
use Zimbra\Struct\Base;

/**
 * BounceMsgSpec struct class
 *
 * @package    Zimbra
 * @subpackage Mail
 * @category   Struct
 * @author     Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright  Copyright © 2013 by Nguyen Van Nguyen.
 */
class BounceMsgSpec extends Base
{
    /**
     * Email addresses
     * @var TypedSequence<EmailAddrInfo>
     */
    protected $_e;

    /**
     * Constructor method for BounceMsgSpec
     * @param  string $id ID of message to resend
     * @param  array  $e
     * @return self
     */
    public function __construct($id, array $e = array())
    {
        parent::__construct();
        $this->property('id', trim($id));
        $this->_e = new TypedSequence('Zimbra\Mail\Struct\EmailAddrInfo', $e);

        $this->on('before', function(Base $sender)
        {
            if($sender->e()->count())
            {
                $sender->child('e', $sender->e()->all());
            }
        });
    }

    /**
     * Gets or sets id
     *
     * @param  string $id
     * @return string|self
     */
    public function id($id = null)
    {
        if(null === $id)
        {
            return $this->property('id');
        }
        return $this->property('id', trim($id));
    }

    /**
     * Add an email address
     *
     * @param  EmailAddrInfo $xparam
     * @return self
     */
    public function addE(EmailAddrInfo $e)
    {
        $this->_e->add($e);
        return $this;
    }

    /**
     * Gets email address sequence
     *
     * @return Sequence
     */
    public function e()
    {
        return $this->_e;
    }

    /**
     * Returns the array representation of this class 
     *
     * @param  string $name
     * @return array
     */
    public function toArray($name = 'm')
    {
        return parent::toArray($name);
    }

    /**
     * Method returning the xml representation of this class
     *
     * @param  string $name
     * @return SimpleXML
     */
    public function toXml($name = 'm')
    {
        return parent::toXml($name);
    }
}
