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

use Zimbra\Common\Text;
use Zimbra\Struct\Base;

/**
 * TagSpec struct class
 *
 * @package    Zimbra
 * @subpackage Mail
 * @category   Struct
 * @author     Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright  Copyright © 2013 by Nguyen Van Nguyen.
 */
class TagSpec extends Base
{
    /**
     * Constructor method for TagSpec
     * @param string $name Tag name
     * @param string $rgb RGB color in format #rrggbb where r,g and b are hex digits
     * @param int $color Color numeric; range 0-127; defaults to 0 if not present; client can display only 0-7
     * @return self
     */
    public function __construct(
        $name,
        $rgb = null,
        $color = null
    )
    {
        parent::__construct();
        $this->property('name', trim($name));
        if(null !== $rgb && Text::isRgb(trim($rgb)))
        {
            $this->property('rgb', trim($rgb));
        }
        if(null !== $color)
        {
            $color = (int) $color;
            $this->property('color', ($color > 0 && $color < 128) ? $color : 0);
        }
    }

    /**
     * Gets or sets name
     *
     * @param  string $name
     * @return string|self
     */
    public function name($name = null)
    {
        if(null === $name)
        {
            return $this->property('name');
        }
        return $this->property('name', trim($name));
    }

    /**
     * Gets or sets rgb
     *
     * @param  string $rgb
     * @return string|self
     */
    public function rgb($rgb = null)
    {
        if(null === $rgb)
        {
            return $this->property('rgb');
        }
        return $this->property('rgb', Text::isRgb(trim($rgb)) ? trim($rgb) : '');
    }

    /**
     * Gets or sets color
     *
     * @param  int $color
     * @return int|self
     */
    public function color($color = null)
    {
        if(null === $color)
        {
            return $this->property('color');
        }
        $color = (int) $color;
        return $this->property('color', ($color > 0 && $color < 128) ? $color : 0);
    }

    /**
     * Returns the array representation of this class 
     *
     * @param  string $name
     * @return array
     */
    public function toArray($name = 'tag')
    {
        return parent::toArray($name);
    }

    /**
     * Method returning the xml representative this class
     *
     * @param  string $name
     * @return SimpleXML
     */
    public function toXml($name = 'tag')
    {
        return parent::toXml($name);
    }
}
