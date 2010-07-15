<div class="sf_admin_list ui-grid-table ui-widget ui-corner-all ui-helper-reset ui-helper-clearfix">
    <table id="tree_list" class="ui-widget ui-widget-content list-table" cellpadding="0" cellspacing="0" border="0">
        <caption class="ui-widget-header ui-corner-top">
                        <h1><?php echo I18n::__( 'dinStdStaticCategory.titles.list', array(  ) ) ?></h1>
        </caption>
        <thead class="ui-widget-header">
            <tr>
                <th id="sf_admin_list_batch_actions" class="ui-th-column"><input id="sf_admin_list_batch_checkbox" class="ui-widget-content" type="checkbox" onclick="checkAll();" /></th>
          <?php echo Partial::get( 'dinStdStaticCategory/list_th_tabular', array( 'sort' => $sort ) ) ?>
                <th id="sf_admin_list_th_actions" class="ui-th-column"><?php echo I18n::__( 'admin.labels.actions' ) ?></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th  style="margin:0;padding:0;border:0;" colspan="5">
                    <div class="ui-widget-header ui-corner-bottom">
                        <div class="ui-th-column sf-list-foot">
                        <?php if ( $pager->haveToPaginate() ): ?>
                            <?php echo Partial::get( 'dinStdStaticCategory/pagination', array( 'pager' => $pager ) ) ?>
                        <?php endif ?>
                        </div>
                    </div>
                </th>
            </tr>
        </tfoot>
        <tbody>
        <?php if ( !$pager->getNbResults() ): ?>
        <tr class="sf_admin_row ui-widget-content"><td colspan="20" height="30" align="center">
            <p style="text-align:center"><?php echo I18n::__( 'admin.labels.noResult' ) ?></p>
        </td></tr>
        <?php else: ?>
        <?php foreach ( $pager->getResults() as $i => $din_static_category ): $odd = fmod( ++$i, 2 ) ? 'odd' : 'even' ?>
            <tr id="node-<?php echo $din_static_category->getId() ?>" class="sf_admin_row ui-widget-content <?php echo $odd ?> <?php $node = $din_static_category->getNode(); if ( $node->isValidNode() && $node->hasParent() ) { echo ' child-of-node-' . $node->getParent()->getId(); } ?>">
                <td>
                    <input type="checkbox" name="ids[]" value="<?php echo $din_static_category->getPrimaryKey() ?>" class="sf_admin_batch_checkbox" />
                    <input type="hidden" id="select_node-<?php echo $din_static_category->getPrimaryKey() ?>" name="newparent[<?php echo $din_static_category->getPrimaryKey() ?>]" />
                </td>

<td class="sf_admin_text sf_admin_list_td_title tree-node">
    <span class="tree-node-text">
        <?php if( $din_static_category->getNode()->isLeaf() ): ?><span class="ui-icon ui-icon-folder-open empty-folder"></span><?php endif ?>
        <?php echo $din_static_category->getTitle() ?>
    </span>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_public">
  <?php echo '<div class="ui-icon' . ( $din_static_category->getIsPublic() ? ' ui-icon-check' : ' ui-icon-close' ) . '" title="' . I18n::__( 'admin.label.' . ( $din_static_category->getIsPublic() ? '' : 'un' ) . 'checked' ) . '"></div>' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_uri">
  <?php echo $din_static_category->getUri() ?>
</td>
<td style="padding-right:5px">
    <ul class="sf_admin_td_actions">
        <li class="sf_admin_action_new">
            <script type="text/javascript">$(function(){$(".sf_admin_action_new a").button({icons:{primary:'ui-icon-plus'}})});</script>
            <?php echo Url::link( I18n::__( 'dinStdStaticCategory.listLabels.addChild' ), 'dinStdStaticCategory/listNew?id='.$din_static_category->getId(), array(  'ajax' => 'action',) ) ?>        </li>
        <li class="sf_admin_action_pages">
            <script type="text/javascript">$(function(){$(".sf_admin_action_pages a").button({icons:{primary:'ui-icon-document'}})});</script>
            <?php echo Url::link( I18n::__( 'dinStdStaticCategory.listLabels.pages' ), 'dinStdStaticCategory/pages?id='.$din_static_category->getId(), array(  'ajax' => 'action',) ) ?>        </li>
        <?php echo $helper->linkToEdit( $din_static_category, array(  'params' =>   array(    'ajax' => 'action',  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
        <?php echo $helper->linkToDelete( $din_static_category, array(  'params' =>   array(    'ajax' => 'post',  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
    </ul>
</td>

            </tr>
        <?php endforeach ?>
        <?php endif ?>
        </tbody>
    </table>
</div>
<div id="dialog-del-obj" style="display:none" title="<?php echo I18n::__( 'admin.label.deleteObjectConfirm' ) ?>">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span><?php echo I18n::__( 'admin.text.deleteObjectConfirm' ) ?></p>
</div>

<script type="text/javascript">
function checkAll(){var boxes=document.getElementsByTagName('input');for(var index=0;index<boxes.length;index++){box=boxes[index];if(box.type=='checkbox'&&box.className=='sf_admin_batch_checkbox')box.checked=document.getElementById('sf_admin_list_batch_checkbox').checked}return true;}
$(document).ready(function(){
    $('#tree_list').treeTable({treeColumn:1,indent:16,initialState:'expanded'});
    $('table#tree_list tbody tr').mousedown(function(){$('tr.ui-state-hover').removeClass('ui-state-hover');$(this).addClass('ui-state-hover');});
    $('table#tree_list tbody tr span').mousedown(function(){$($(this).parents('tr')[0]).trigger('mousedown');});
});

</script>
