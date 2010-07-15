<?php

/*
 * This file is part of the dinStaticPlugin package.
 * (c) DineCat, 2009-2010 http://dinecat.com/
 * 
 * For the full copyright and license information, please view the LICENSE file,
 * that was distributed with this package, or see http://www.dinecat.com/din/license.html
 */

/**
 * Base static helper
 * 
 * @package     dinStaticPlugin.lib.helper
 * @subpackage  DinStaticHelper
 * @signed      5
 * @signer      relo_san
 * @author      relo_san [http://relo-san.com/]
 * @since       june 5, 2010
 * @version     SVN: $Id: DinStaticHelper.php 39 2010-06-05 02:30:30Z relo_san $
 */
class DinStaticHelper
{

    /**
     * block
     * 
     * @param   string  $name       Block name
     * @param   string  $culture    Culture identifier [optional]
     * @return  string  Text for block
     * @author  relo_san
     * @since   june 5, 2010
     */
    static public function block( $name, $culture = null )
    {

        $page = sfContext::getInstance()->get( 'cache_routing' )->getContent(
            'static_page', 'DinStaticPage',
            array( 'category_id' => 2, 'uri' => $name )
        );
        return $page ? $page[0]['body'] : '';

    } // DinStaticHelper::block()

} // DinStaticHelper

//EOF