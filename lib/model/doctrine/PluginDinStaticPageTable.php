<?php

/*
 * This file is part of the dinStaticPlugin package.
 * (c) DineCat, 2010 http://dinecat.com/
 * 
 * For the full copyright and license information, please view the LICENSE file,
 * that was distributed with this package, or see http://www.dinecat.com/din/license.html
 */

/**
 * Plugin class for performing query and update operations for DinStaticPage model table
 * 
 * @package     dinStaticPlugin
 * @subpackage  lib.model.doctrine
 * @author      Nicolay N. Zyk <relo.san@gmail.com>
 */
class PluginDinStaticPageTable extends dinDoctrineTable
{

    /**
     * Returns an instance of PluginDinStaticPageTable
     * 
     * @return  PluginDinStaticPageTable
     */
    public static function getInstance()
    {

        return Doctrine_Core::getTable( 'PluginDinStaticPage' );

    } // PluginDinStaticPageTable::getInstance()


    /**
     * Get page query
     * 
     * @param   array   $params Query params
     * @return  Doctrine_Query
     */
    public function getPageQuery( $params )
    {

        $q = $this->createQuery();
        $alias = $q->getRootAlias();

        if ( $this->isI18n() )
        {
            $this->joinI18n( $q );
        }

        return $q->where( $this->getColumn( $q, 'uri' ) . ' = ?', $params['uri'] )
            ->andWhere( $this->getColumn( $q, 'is_public' ) . ' = ?', true )
            ->andWhere( $this->getColumn( $q, 'category_id' ) . ' = ?', $params['category_id'] )
            ->limit( 1 );

    } // PluginDinStaticPageTable::getPageQuery()

} // PluginDinStaticPageTable

//EOF