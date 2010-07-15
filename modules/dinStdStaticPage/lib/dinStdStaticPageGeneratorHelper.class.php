<?php

/*
 * This file is part of the dinStaticPlugin package.
 * (c) DineCat, 2009-2010 http://dinecat.com/
 * 
 * For the full copyright and license information, please view the LICENSE file,
 * that was distributed with this package, or see http://www.dinecat.com/din/license.html
 */

/**
 * dinStdStaticPage module helper
 * 
 * @package     dinStaticPlugin.modules.dinStdStaticPage.lib
 * @signed      4
 * @signer      relo_san
 * @author      relo_san [http://relo-san.com/]
 * @since       february 14, 2010
 * @version     SVN: $Id$
 */
class dinStdStaticPageGeneratorHelper extends BaseDinStdStaticPageGeneratorHelper
{

    /**
     * Get full folder path
     * 
     * @return  string
     * @author  relo_san
     * @since   february 17, 2010
     */
    public function getFullPathName()
    {

        $elem = Doctrine::getTable( 'DinStaticCategory' )->find(
            sfContext::getInstance()->getRequest()->getParameter( 'category_id', 1 )
        );
        return $this->getPath( $elem->getNode(), '/', true );

    } // dinStdStaticPageGeneratorHelper::getFullPathName()


    /**
     * Gets path to node from root
     * 
     * @param   Doctrine_Node_NestedSet $node
     * @param   string  $separator      Path separator
     * @param   boolean $includeNode    Include node at end of path
     * @return  string  Uri path
     * @author  relo_san
     * @since   february 17, 2010
     */
    public function getPath( $node, $separator = '/', $includeRecord = false )
    {

        $path = array();
        $ancestors = $node->getAncestors();
        if ( $ancestors )
        {
            foreach ( $ancestors as $ancestor )
            {
                $path[] = $ancestor->getUri();
            }
        }
        else
        {
            $path[] = '';
        }
        if ( $includeRecord )
        {
            $path[] = $node->getRecord()->getUri();
        }
        return implode( $separator, $path );

    } // dinStdStaticPageGeneratorHelper::getPath()

} // dinStdStaticPageGeneratorHelper

//EOF