<?php

/**
 * This file is part of the dinStaticPlugin package.
 * (c) DineCat, 2009-2010 http://dinecat.com/
 * 
 * For the full copyright and license information, please view the LICENSE file,
 * that was distributed with this package, or see http://www.dinecat.com/din/license.html
 */

/**
 * Manage dynamic routes for static plugin
 * 
 * @package     dinStaticPlugin.lib
 * @signed      5
 * @signer      relo_san
 * @author      relo_san [http://relo-san.com/]
 * @since       may 22, 2010
 * @version     SVN: $Id: DinStaticRouting.class.php 36 2010-05-22 11:03:30Z relo_san $
 */
class DinStaticRouting
{

    /**
     * listenToRoutingLoadConfigurationEvent
     * 
     * @param   sfEvent
     * @return  void
     * @author  relo_san
     * @since   may 22, 2010
     */
    static public function listenToRoutingLoadConfigurationEvent( sfEvent $event )
    {

        $routing = $event->getSubject();

        $cats = sfContext::getInstance()->get( 'cache_manager' )->getContent(
            'static_categories', 'DinStaticCategory', array()
        );

        $uriParams = sfConfig::get( 'app_static_uri' );
        $level = 0;
        $compUri = '';
        foreach ( $cats as $cat )
        {
            if ( is_null( $cat['uri'] ) )
            {
                continue;
            }
            $compUri = ( $level < $cat['level'] ? $compUri : '' ) . '/' . $cat['uri'];
            $level = $cat['level'];
            $routing->prependRoute( 'static_' . $cat['id'], new sfRoute(
                ( isset( $uriParams['prepend'] ) ? $uriParams['prepend'] : '' ) . $compUri
                . '/:uri' . ( isset( $uriParams['append'] ) ? $uriParams['append'] : '' ),
                array(
                    'module' => isset( $uriParams['module'] ) ? $uriParams['module'] : 'statis',
                    'action' => 'view', 'category' => $cat['id']
                )
            ) );
        }

    } // DinStaticRouting::listenToRoutingLoadConfigurationEvent()

} // DinStaticRouting

//EOF