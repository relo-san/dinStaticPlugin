<?php

/*
 * This file is part of the dinStaticPlugin package.
 * (c) DineCat, 2010 http://dinecat.com/
 * 
 * For the full copyright and license information, please view the LICENSE file,
 * that was distributed with this package, or see http://www.dinecat.com/din/license.html
 */

/**
 * Plugin class that represents a record of DinStaticCategory model
 * 
 * @package     dinStaticPlugin
 * @subpackage  lib.model.doctrine
 * @author      Nicolay N. Zyk <relo.san@gmail.com>
 */
abstract class PluginDinStaticCategory extends BaseDinStaticCategory
{

    /**
     * Get parent identifier
     * 
     * @return  integer Parent identifier
     */
    public function getParentId()
    {

        if ( !$this->getNode()->isValidNode() || $this->getNode()->isRoot() )
        {
            return null;
        }
        return $this->getNode()->getParent()->getId();

    } // PluginDinStaticCategory::getParentId()


    /**
     * Get indented name
     * 
     * @return  string  Indented title
     */
    public function getIndentedName()
    {

        return str_repeat( '- ', $this->getLevel() ) . $this->getTitle();

    } // PluginDinStaticCategory::getIndentedName()

} // PluginDinStaticCategory

//EOF