<?php

/*
 * This file is part of the dinStaticPlugin package.
 * (c) DineCat, 2009-2010 http://dinecat.com/
 * 
 * For the full copyright and license information, please view the LICENSE file,
 * that was distributed with this package, or see http://www.dinecat.com/din/license.html
 */

/**
 * dinStdStaticPage module actions
 * 
 * @package     dinStaticPlugin.modules.dinStdStaticPage.actions
 * @signed      4
 * @signer      relo_san
 * @author      relo_san [http://relo-san.com/]
 * @since       february 14, 2010
 * @version     SVN: $Id$
 */
class dinStdStaticPageActions extends autoDinStdStaticPageActions
{

    /**
     * Pre execute action
     * 
     * @return  void
     * @author  relo_san
     * @since   february 17, 2010
     */
    public function preExecute()
    {

        parent::preExecute();
        $this->getContext()->getRouting()->setDefaultParameter(
            'category_id', $this->request->getParameter( 'category_id' )
        );

    } // dinStdStaticPage::preExecute()


    /**
     * Build query
     * 
     * @return  Doctrine_Query
     * @author  relo_san
     * @since   february 17, 2010
     */
    public function buildQuery()
    {

        $q = parent::buildQuery();
        return $q->andWhere(
            $q->getRootAlias() . '.category_id = ?', $this->request->getParameter( 'category_id', 0 )
        );

    } // dinStdStaticPage::buildQuery()

} // dinStdStaticPage

//EOF