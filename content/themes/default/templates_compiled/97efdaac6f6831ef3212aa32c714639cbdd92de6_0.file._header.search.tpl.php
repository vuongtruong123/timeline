<?php
/* Smarty version 3.1.30-dev/(88), created on 2017-03-15 12:10:44
  from "C:\Te\OpenServer\domains\www.redate.tk\content\themes\default\templates\_header.search.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/(88)',
  'unifunc' => 'content_58c92f44d72384_30965419',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97efdaac6f6831ef3212aa32c714639cbdd92de6' => 
    array (
      0 => 'C:\\Te\\OpenServer\\domains\\www.redate.tk\\content\\themes\\default\\templates\\_header.search.tpl',
      1 => 1473048671,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c92f44d72384_30965419 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form class="navbar-form pull-left flip hidden-xs">
    <input id="search-input" type="text" class="form-control" placeholder='<?php echo __("Search for people, pages and #hashtags");?>
' autocomplete="off">
    <div id="search-results" class="dropdown-menu dropdown-widget dropdown-search js_dropdown-keepopen">
        <div class="dropdown-widget-header">
            <?php echo __("Search Results");?>

        </div>
        <div class="dropdown-widget-body">
            <div class="loader loader_small ptb10"></div>
        </div>
        <a class="dropdown-widget-footer" id="search-results-all" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/search/"><?php echo __("See All Results");?>
</a>
    </div>
</form><?php }
}
