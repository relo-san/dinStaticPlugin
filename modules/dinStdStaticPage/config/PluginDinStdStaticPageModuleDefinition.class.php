<?php

/**
 * This file is part of the dinStaticPlugin package.
 * (c) DineCat, 2009-2010 http://dinecat.com/
 * 
 * For the full copyright and license information, please view the LICENSE file,
 * that was distributed with this package, or see http://www.dinecat.com/din/license.html
 */

/**
 * Base dinStdStaticPage module definition
 * 
 * @package     dinStaticPlugin.modules.dinStdStaticPage.config
 * @signed      5
 * @signer      relo_san
 * @author      relo_san [http://relo-san.com/]
 * @since       february 17, 2010
 * @version     SVN: $Id: PluginDinStdStaticPageModuleDefinition.class.php 36 2010-05-22 11:03:30Z relo_san $
 */
class PluginDinStdStaticPageModuleDefinition extends DinModuleDefinition
{

    protected $definitions = array(
        'plugin'    => 'dinStaticPlugin',
        'generator' => array(
            'class' => 'dinDoctrineGenerator',
            'param' => array(

                // module config
                'actions_base_class'    => 'dinActions',
                'model_class'           => 'DinStaticPage',
                'theme'                 => 'admin',
                'non_verbose_templates' => true,
                'with_show'             => false,
                'singular'              => null,
                'plural'                => null,
                'route_prefix'          => 'din_std_static_page',
                'with_doctrine_route'   => true,
                'css'                   => false,
                'i18n_catalogue'        => 'dinStdStaticPage',

                // actions config
                'config' => array(

                    'parent_links'      => array(
                        'categories'    => '@din_std_static_category'
                    ),

                    'actions'           => null,

                    'fields'            => array(
                        'title'         => array( 'label' => 'listLabels.title' ),
                        'published_at'  => array( 'label' => 'listLabels.publishedAt' ),
                        'uri'           => array( 'label' => 'listLabels.uri' ),
                        'categories'    => array( 'label' => 'listLabels.category' ),
                        'is_public'     => array( 'label' => 'listLabels.isPublic' )
                    ),

                    'list'              => array(
                        'title'         => 'titles.list.%@fullPath@%',
                        'display'       => array( 'title', 'uri' ),
                        'table_method'  => 'retrieveWithI18n',
                        'pager_class'   => 'dinDoctrinePager',
                        'actions'       => array(
                            '_new'      => array( 'params' => array( 'ajax' => 'action' ) )
                        ),
                        'object_actions'=> array(
                            '_edit'     => array( 'params' => array( 'ajax' => 'action' ) ),
                            '_delete'   => array( 'params' => array( 'ajax' => 'post' ) )
                        ),
                        'sort'          => array(
                            'title'         => array( 'columns' => array( 'title' ) ),
                            'published_at'  => array( 'columns' => array( 'published_at' ) ),
                            'is_public'     => array( 'columns' => array( 'is_public' ) ),
                            'uri'           => array( 'columns' => array( 'uri' ) ),
                            'category'      => array( 'columns' => array( 'category_id' ) )
                        )
                    ),

                    'filter'            => array(
                        'display'       => array( 'is_public', 'uri', 'title', 'body' )
                    ),

                    'form'              => array(
                        'display'       => array(
                            'fieldsets.base'    => array( 'category_id', 'uri', 'is_public', 'title', 'description', 'body', 'sequence' )
                        )
                    ),

                    'edit'              => array(
                        'title'         => 'titles.edit.%%title%%',
                        'actions'       => array(
                            '_delete'   => array( 'params' => array( 'ajax' => 'action' ) ),
                            '_save'     => null,
                            '_list'     => array( 'params' => array( 'ajax' => 'action' ) )
                        )
                    ),

                    'new'               => array(
                        'title'         => 'titles.new',
                        'actions'       => array(
                            '_save_and_add' => null,
                            '_save'         => null,
                            '_list'         => array( 'params' => array( 'ajax' => 'action' ) )
                        )
                    ),

                    'show'              => null

                )

            )
        )
    );

} // PluginDinStdStaticPageModuleDefinition

//EOF