<?php

/*
 * This file is part of the dinStaticPlugin package.
 * (c) DineCat, 2009-2010 http://dinecat.com/
 * 
 * For the full copyright and license information, please view the LICENSE file,
 * that was distributed with this package, or see http://www.dinecat.com/din/license.html
 */

/**
 * dinStdStaticCategory module helper
 * 
 * @package     dinStaticPlugin.modules.dinStdStaticCategory.lib
 * @signed      4
 * @signer      relo_san
 * @author      relo_san [http://relo-san.com/]
 * @since       february 14, 2010
 * @version     SVN: $Id$
 */
class dinStdStaticCategoryGeneratorHelper extends BaseDinStdStaticCategoryGeneratorHelper
{

    /**
     * Get parent folder path
     * 
     * @return  string
     * @author  relo_san
     * @since   february 16, 2010
     */
    public function getRootName()
    {

        $elem = Doctrine::getTable( 'DinStaticCategory' )->find(
            sfContext::getInstance()->getRequest()->getParameter( 'id', 1 )
        );
        return $this->getPath( $elem->getNode(), '/', false );

    } // dinStdStaticCategoryGeneratorHelper::getRootName()


    /**
     * Gets path to node from root
     * 
     * @param   Doctrine_Node_NestedSet $node
     * @param   string  $separator      Path separator
     * @param   boolean $includeNode    Include node at end of path
     * @return  string  Uri path
     * @author  relo_san
     * @since   february 16, 2010
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

    } // dinStdStaticCategoryGeneratorHelper::getPath()

} // dinStdStaticCategoryGeneratorHelper

//EOF