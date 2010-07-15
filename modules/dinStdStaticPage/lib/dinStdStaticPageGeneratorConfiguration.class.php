<?php

/*
 * This file is part of the dinStaticPlugin package.
 * (c) DineCat, 2009-2010 http://dinecat.com/
 * 
 * For the full copyright and license information, please view the LICENSE file,
 * that was distributed with this package, or see http://www.dinecat.com/din/license.html
 */

/**
 * dinStdStaticPage module configuration
 * 
 * @package     dinStaticPlugin.modules.dinStdStaticPage.lib
 * @signed      4
 * @signer      relo_san
 * @author      relo_san [http://relo-san.com/]
 * @since       february 14, 2010
 * @version     SVN: $Id$
 */
class dinStdStaticPageGeneratorConfiguration extends BaseDinStdStaticPageGeneratorConfiguration
{

    /**
     * Get form
     * 
     * @param   DinStaticPage    $object
     * @param   array   $options    Options to merge with the options returned by getFormOptions()
     * @return  DinStaticPageForm
     * @author  relo_san
     * @since   february 17, 2010
     */
    public function getForm( $object = null, $options = array() )
    {

        $form = parent::getForm( $object );
        $id = sfContext::getInstance()->getRequest()->getParameter( 'category_id' );
        $form->setDefault( 'category_id', $id );
        $form->getObject()->category_id = $id;
        return $form;

    } // dinStdStaticPageGeneratorConfiguration::getForm()

} // dinStdStaticPageGeneratorConfiguration

//EOF