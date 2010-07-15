<?php

/*
 * This file is part of the dinStaticPlugin package.
 * (c) DineCat, 2009-2010 http://dinecat.com/
 * 
 * For the full copyright and license information, please view the LICENSE file,
 * that was distributed with this package, or see http://www.dinecat.com/din/license.html
 */

/**
 * dinStdStaticCategory module actions
 * 
 * @package     dinStaticPlugin.modules.dinStdStaticCategory.actions
 * @signed      4
 * @signer      relo_san
 * @author      relo_san [http://relo-san.com/]
 * @since       february 14, 2010
 * @version     SVN: $Id$
 */
class dinStdStaticCategoryActions extends autoDinStdStaticCategoryActions
{

    /**
     * Execute delete
     * 
     * @param   sfWebRequest    $request
     * @return  void
     * @author  relo_san
     * @since   february 16, 2010
     */
    public function executeDelete( sfWebRequest $request )
    {

        $request->checkCSRFProtection();

        $this->dispatcher->notify( new sfEvent(
            $this, 'admin.delete_object', array( 'object' => $this->getRoute()->getObject() )
        ) );

        $object = $this->getRoute()->getObject();
        if ( $object->getNode()->isValidNode() )
        {
            $object->getNode()->delete();
        }
        else
        {
            $object->delete();
        }

        $this->getUser()->setFlash( 'notice', 'admin.messages.deleteSuccess' );

        $this->forward( 'dinStdStaticCategory', 'index' );

    } // dinStdStaticCategoryActions::executeDelete()


    /**
     * Execute list new
     * 
     * @param   sfWebRequest    $request
     * @return  void
     * @author  relo_san
     * @since   february 16, 2010
     */
    public function executeListNew( sfWebRequest $request )
    {

        $this->executeNew( $request );
        $this->form->setDefault( 'parent_id', $request->getParameter( 'id' ) );
        $this->setTemplate( 'new' );

    } // dinStdStaticCategoryActions::executeListNew()


    /**
     * Add sort query
     * 
     * @return  void
     * @author  relo_san
     * @since   february 16, 2010
     */
    protected function addSortQuery( $q )
    {

        $q->addOrderBy( 'root_id, lft' );

    } // dinStdStaticCategoryActions::addSortQuery()


    /**
     * Get filters
     * 
     * @return  boolean false
     * @author  relo_san
     * @since   february 16, 2010
     */
    public function getFilters()
    {

        return false;

    } // dinStdStaticCategoryActions::getFilters()

} // dinStdStaticCategoryActions

//EOF