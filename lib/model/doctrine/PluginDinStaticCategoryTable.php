<?php

/*
 * This file is part of the dinStaticPlugin package.
 * (c) DineCat, 2010 http://dinecat.com/
 * 
 * For the full copyright and license information, please view the LICENSE file,
 * that was distributed with this package, or see http://www.dinecat.com/din/license.html
 */

/**
 * Plugin class for performing query and update operations for DinStaticCategory model table
 * 
 * @package     dinStaticPlugin
 * @subpackage  lib.model.doctrine
 * @author      Nicolay N. Zyk <relo.san@gmail.com>
 */
class PluginDinStaticCategoryTable extends DinDoctrineTable
{

    /**
     * Returns an instance of PluginDinStaticCategoryTable
     * 
     * @return  PluginDinStaticCategoryTable
     */
    public static function getInstance()
    {

        return Doctrine_Core::getTable( 'PluginDinStaticCategory' );

    } // PluginDinStaticCategoryTable::getInstance()


    /**
     * Get categories query
     * 
     * @param   array   $params Query params [optional]
     * @return  Doctrine_Query
     */
    public function getCategoriesQuery( $params = array() )
    {

        $q = $this->createQuery();
        $this->addQuery( $q )->joinI18n()->addSelect( array( 'id', 'uri', 'level', 'title' ) )
            ->addWhere( 'is_public', true )->addOrderBy( array( 'root_id', 'lft' ) )->free();
        return $q;

    } // PluginDinStaticCategoryTable::getCategoriesQuery()

} // PluginDinStaticCategoryTable

//EOF