<?php

/**
 * This file is part of the dinStaticPlugin package.
 * (c) DineCat, 2009-2010 http://dinecat.com/
 * 
 * For the full copyright and license information, please view the LICENSE file,
 * that was distributed with this package, or see http://www.dinecat.com/din/license.html
 */

/**
 * Base dinStdStaticCategory module definition
 * 
 * @package     dinStaticPlugin.modules.dinStdStaticCategory.config
 * @signed      5
 * @signer      relo_san
 * @author      relo_san [http://relo-san.com/]
 * @since       february 9, 2010
 * @version     SVN: $Id: PluginDinStdStaticCategoryModuleDefinition.class.php 31 2010-03-08 19:59:47Z relo_san $
 */
class PluginDinStdStaticCategoryModuleDefinition extends DinModuleDefinition
{

    protected $definitions = array(
        'plugin'    => 'dinStaticPlugin',
        'generator' => array(
            'class' => 'dinDoctrineGenerator',
            'param' => array(

                // module config
                'actions_base_class'    => 'dinActions',
                'model_class'           => 'DinStaticCategory',
                'theme'                 => 'admin',
                'non_verbose_templates' => true,
                'with_show'             => false,
                'singular'              => null,
                'plural'                => null,
                'route_prefix'          => 'din_std_static_category',
                'with_doctrine_route'   => true,
                'css'                   => false,
                'i18n_catalogue'        => 'dinStdStaticCategory',

                // actions config
                'config' => array(

                    'actions'           => null,

                    'fields'            => array(
                        'title'         => array( 'label' => 'listLabels.title' ),
                        'uri'           => array( 'label' => 'listLabels.uri' ),
                        'is_public'     => array( 'label' => 'listLabels.isPublic' )
                    ),

                    'list'              => array(
                        'max_per_page'  => 999999,
                        'title'         => 'titles.list',
                        'display'       => array( 'title', 'is_public', 'uri' ),
                        'table_method'  => 'retrieveWithI18n',
                        'pager_class'   => 'dinDoctrinePager',
                        'actions'       => array(),
                        'object_actions'=> array(
                            'listNew'   => array( 'label' => 'listLabels.addChild', 'action' => 'listNew', 'icon_class_suffix' => 'plus', 'params' => array( 'ajax' => 'action' ) ),
                            'pages'     => array( 'label' => 'listLabels.pages', 'action' => 'pages', 'icon_class_suffix' => 'document', 'params' => array( 'ajax' => 'action' ) ),
                            '_edit'     => array( 'params' => array( 'ajax' => 'action' ) ),
                            '_delete'   => array( 'params' => array( 'ajax' => 'post' ) )
                        ),
                        'sort'          => array()
                    ),

                    'filter'            => array(
                        'class'         => false
                    ),

                    'form'              => array(
                        'display'       => array(
                            'fieldsets.base'    => array( 'parent_id', 'is_public', 'uri', 'title', 'description' )
                        )
                    ),

                    'edit'              => array(
                        'title'         => 'titles.edit.%%uri%%%@root@%',
                        'actions'       => array(
                            '_delete'   => array( 'params' => array( 'ajax' => 'action' ) ),
                            '_save'     => null,
                            '_list'     => array( 'params' => array( 'ajax' => 'action' ) )
                        )
                    ),

                    'new'               => array(
                        'title'         => 'titles.new.%@root@%',
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

} // PluginDinStdStaticCategoryModuleDefinition

//EOF