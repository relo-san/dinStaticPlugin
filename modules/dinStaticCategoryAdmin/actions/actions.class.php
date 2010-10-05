<?php

/*
 * This file is part of the dinStaticPlugin package.
 * (c) DineCat, 2010 http://dinecat.com/
 * 
 * For the full copyright and license information, please view the LICENSE file,
 * that was distributed with this package, or see http://www.dinecat.com/din/license.html
 */

/**
 * dinStaticCategoryAdmin module actions
 * 
 * @package     dinStaticPlugin
 * @subpackage  modules.dinStaticCategoryAdmin.actions
 * @author      Nicolay N. Zyk <relo.san@gmail.com>
 */
class dinStaticCategoryAdminActions extends autoDinStaticCategoryAdminActions
{

    /**
     * Delete action
     * 
     * @param   sfWebRequest    $request
     * @return  string  View name constant or partial
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

        $this->forward( 'dinStaticCategoryAdmin', 'index' );

    } // dinStaticCategoryAdminActions::executeDelete()


    /**
     * List new action
     * 
     * @param   sfWebRequest    $request
     * @return  string  View name constant or partial
     */
    public function executeListNew( sfWebRequest $request )
    {

        $this->executeNew( $request );
        $this->form->setDefault( 'parent_id', $request->getParameter( 'id' ) );
        $this->setTemplate( 'new' );

    } // dinStaticCategoryAdminActions::executeListNew()


    /**
     * Add sort query
     * 
     * @param   Doctrine_Query  $q
     * @return  void
     */
    protected function addSortQuery( $q )
    {

        $q->addOrderBy( 'root_id, lft' );

    } // dinStaticCategoryAdminActions::addSortQuery()


    /**
     * Get filters
     * 
     * @return  boolean false
     */
    public function getFilters()
    {

        return false;

    } // dinStaticCategoryAdminActions::getFilters()

} // dinStaticCategoryAdminActions

//EOF