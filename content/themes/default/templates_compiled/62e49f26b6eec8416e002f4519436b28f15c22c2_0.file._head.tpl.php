<?php
/* Smarty version 3.1.30-dev/(88), created on 2017-03-15 12:10:42
  from "C:\Te\OpenServer\domains\www.redate.tk\content\themes\default\templates\_head.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/(88)',
  'unifunc' => 'content_58c92f420aff65_87848457',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '62e49f26b6eec8416e002f4519436b28f15c22c2' => 
    array (
      0 => 'C:\\Te\\OpenServer\\domains\\www.redate.tk\\content\\themes\\default\\templates\\_head.tpl',
      1 => 1473048671,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../../../includes/assets/css/bootstrap/css/bootstrap+social.css' => 1,
    'file:../css/style.rtl.css' => 1,
    'file:../css/style.css' => 1,
    'file:_head.css.tpl' => 1,
  ),
),false)) {
function content_58c92f420aff65_87848457 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>

<!--[if IE 8]><html class="ie8"> <![endif]-->
<!--[if IE 9]><html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--><html class="gt-ie8 gt-ie9 not-ie" lang="<?php echo $_smarty_tpl->tpl_vars['system']->value['language']['code'];?>
" dir="<?php echo $_smarty_tpl->tpl_vars['system']->value['language']['dir'];?>
"><!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="generator" content="Sngine">
    <meta name="version" content="<?php echo $_smarty_tpl->tpl_vars['system']->value['version'];?>
">

    <!-- Title -->
    <title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</title>

    <!-- Meta -->
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_description'];?>
">
    <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_keywords'];?>
">

    <!-- OG-Meta -->
    <meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
"/>
    <meta property="og:description" content="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_description'];?>
"/>
    <meta property="og:url" content="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
"/>
    <meta property="og:site_name" content="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_title'];?>
"/>

    <!-- OG-Image -->
    <?php if ($_smarty_tpl->tpl_vars['system']->value['system_ogimage']) {?>
        <meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['system_ogimage'];?>
"/>
    <?php } elseif ($_smarty_tpl->tpl_vars['system']->value['system_ogimage_default']) {?>
        <meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/og-image.jpg"/>
    <?php }?>

    <!-- Favicon -->
    <?php if ($_smarty_tpl->tpl_vars['system']->value['system_favicon_default']) {?>
        <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/favicon.png" />
    <?php } elseif ($_smarty_tpl->tpl_vars['system']->value['system_favicon']) {?>
        <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['system_favicon'];?>
" />
    <?php }?>

    <!-- Dependencies CSS [Roboto|Font-Awesome|Twemoji-Awesome|Flag-Icon|Bootstrap] -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300ita‌​lic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css' onload="if(media!='all')media='all'">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/css/font-awesome/css/font-awesome.min.css" onload="if(media!='all')media='all'">
    <style type="text/css"><?php $_smarty_tpl->_subTemplateRender("file:../../../../includes/assets/css/bootstrap/css/bootstrap+social.css", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 1, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</style>
    

    <!-- CSS -->
    <?php if ($_smarty_tpl->tpl_vars['system']->value['language']['dir'] == "RTL") {?>
    <link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/css/bootstrap/css/bootstrap-rtl.min.css">
    <style type="text/css"><?php $_smarty_tpl->_subTemplateRender("file:../css/style.rtl.css", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 1, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</style>
    <?php } else { ?>
    <style type="text/css"><?php $_smarty_tpl->_subTemplateRender("file:../css/style.css", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 1, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</style>
    <?php }?>

    <!-- CSS Customized -->
    <?php $_smarty_tpl->_subTemplateRender("file:_head.css.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <!-- CSS Customized -->

</head><?php }
}
