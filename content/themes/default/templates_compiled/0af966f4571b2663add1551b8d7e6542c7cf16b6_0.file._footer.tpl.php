<?php
/* Smarty version 3.1.30-dev/(88), created on 2017-03-15 12:10:45
  from "C:\Te\OpenServer\domains\www.redate.tk\content\themes\default\templates\_footer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/(88)',
  'unifunc' => 'content_58c92f4537b848_85228061',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0af966f4571b2663add1551b8d7e6542c7cf16b6' => 
    array (
      0 => 'C:\\Te\\OpenServer\\domains\\www.redate.tk\\content\\themes\\default\\templates\\_footer.tpl',
      1 => 1473048671,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_js_files.tpl' => 1,
    'file:_js_templates.tpl' => 1,
  ),
),false)) {
function content_58c92f4537b848_85228061 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- footer -->
<div class="container">
	<div class="row footer">
		<div class="col-lg-6 col-md-6 col-sm-6">
			&copy; <?php echo date('Y');?>
 <?php echo $_smarty_tpl->tpl_vars['system']->value['system_title'];?>
 · <span class="text-link" data-toggle="modal" data-url="#translator"><?php echo $_smarty_tpl->tpl_vars['system']->value['language']['title'];?>
</span>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 links">
			<?php if (count($_smarty_tpl->tpl_vars['static_pages']->value) > 0) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['static_pages']->value, 'static_page', true);
$_smarty_tpl->tpl_vars['static_page']->iteration = 0;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['static_page']->value) {
$_smarty_tpl->tpl_vars['static_page']->iteration++;
$_smarty_tpl->tpl_vars['static_page']->last = $_smarty_tpl->tpl_vars['static_page']->iteration == $_smarty_tpl->tpl_vars['static_page']->total;
$__foreach_static_page_11_saved = $_smarty_tpl->tpl_vars['static_page'];
?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/static/<?php echo $_smarty_tpl->tpl_vars['static_page']->value['page_url'];?>
">
						<?php echo $_smarty_tpl->tpl_vars['static_page']->value['page_title'];?>

					</a><?php if (!$_smarty_tpl->tpl_vars['static_page']->last || $_smarty_tpl->tpl_vars['system']->value['system_public']) {?> · <?php }?>
				<?php
$_smarty_tpl->tpl_vars['static_page'] = $__foreach_static_page_11_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['system']->value['system_public']) {?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/directory">
					<?php echo __("Directory");?>

				</a>
				 · 
				<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/search">
					<?php echo __("Search");?>

				</a>
			<?php }?>
		</div>
	</div>
</div>
<!-- footer -->

</div>
<!-- main wrapper -->

<!-- JS Files -->
<?php $_smarty_tpl->_subTemplateRender("file:_js_files.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- JS Files -->

<!-- JS Templates -->
<?php $_smarty_tpl->_subTemplateRender("file:_js_templates.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- JS Templates -->

<!-- Analytics Code -->
<?php if ($_smarty_tpl->tpl_vars['system']->value['analytics_code']) {
echo html_entity_decode($_smarty_tpl->tpl_vars['system']->value['analytics_code'],ENT_QUOTES);
}?>
<!-- Analytics Code -->

<?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
	<!-- Chat Audio -->
	<audio id="chat_audio">
		<source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/sounds/notify.ogg" type="audio/ogg">
		<source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/sounds/notify.mp3" type="audio/mpeg">
		<source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/sounds/notify.wav" type="audio/wav">
	</audio>
	<!-- Chat Audio -->
<?php }?>

</body>
</html><?php }
}
