<?php
/* Smarty version 3.1.30-dev/(88), created on 2017-03-15 12:10:45
  from "C:\Te\OpenServer\domains\www.redate.tk\content\themes\default\templates\_js_files.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/(88)',
  'unifunc' => 'content_58c92f45a65260_83845553',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7252b1a3d69156174d6d024dfa940468ea4ddca4' => 
    array (
      0 => 'C:\\Te\\OpenServer\\domains\\www.redate.tk\\content\\themes\\default\\templates\\_js_files.tpl',
      1 => 1473048671,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c92f45a65260_83845553 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- HTML5 shim, for IE6-8 support of HTML5 elements --><!--[if lt IE 9]><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/html5shiv/html5shiv.js"><?php echo '</script'; ?>
><![endif]--><!-- Initialize --><?php echo '<script'; ?>
 type="text/javascript">/* initialize vars */var site_path = "<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
";var ajax_path = site_path+'/includes/ajax/';var uploads_path = "<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
";var secret = '<?php echo $_smarty_tpl->tpl_vars['secret']->value;?>
';var min_data_heartbeat = "<?php echo $_smarty_tpl->tpl_vars['system']->value['data_heartbeat']*1000;?>
";var min_chat_heartbeat = "<?php echo $_smarty_tpl->tpl_vars['system']->value['chat_heartbeat']*1000;?>
";var chat_enabled = <?php if ($_smarty_tpl->tpl_vars['system']->value['chat_enabled']) {?>true<?php } else { ?>false<?php }?>;<?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript">/* i18n for JS */var __ = [];__["Add Friend"] = '<?php echo __("Add Friend");?>
';__["Friends"] = '<?php echo __("Friends");?>
';__["Friend Request Sent"] = '<?php echo __("Friend Request Sent");?>
';__["Following"] = '<?php echo __("Following");?>
';__["Follow"] = '<?php echo __("Follow");?>
';__["Remove"] = '<?php echo __("Remove");?>
';__["Error"] = '<?php echo __("Error");?>
';__["Success"] = '<?php echo __("Success");?>
';__["Loading"] = '<?php echo __("Loading");?>
';__["Like"] = '<?php echo __("Like");?>
';__["Unlike"] = '<?php echo __("Unlike");?>
';__["Joined"] = '<?php echo __("Joined");?>
';__["Join Group"] = '<?php echo __("Join Group");?>
';__["Delete"] = '<?php echo __("Delete");?>
';__["Delete Cover"] = '<?php echo __("Delete Cover");?>
';__["Delete Picture"] = '<?php echo __("Delete Picture");?>
';__["Delete Post"] = '<?php echo __("Delete Post");?>
';__["Delete Comment"] = '<?php echo __("Delete Comment");?>
';__["Delete Conversation"] = '<?php echo __("Delete Conversation");?>
';__["Share Post"] = '<?php echo __("Share Post");?>
';__["Report User"] = '<?php echo __("Report User");?>
';__["Report Page"] = '<?php echo __("Report Page");?>
';__["Report Group"] = '<?php echo __("Report Group");?>
';__["Block User"] = '<?php echo __("Block User");?>
';__["Unblock User"] = '<?php echo __("Unblock User");?>
';__["Save Post"] = '<?php echo __("Save Post");?>
';__["Unsave Post"] = '<?php echo __("Unsave Post");?>
';__["Pin Post"] = '<?php echo __("Pin Post");?>
';__["Unpin Post"] = '<?php echo __("Unpin Post");?>
';__["Are you sure you want to delete this?"] = '<?php echo __("Are you sure you want to delete this?");?>
';__["Are you sure you want to remove your cover photo?"] = '<?php echo __("Are you sure you want to remove your cover photo?");?>
';__["Are you sure you want to remove your profile picture?"] = '<?php echo __("Are you sure you want to remove your profile picture?");?>
';__["Are you sure you want to delete this post?"] = '<?php echo __("Are you sure you want to delete this post?");?>
';__["Are you sure you want to share this post?"] = '<?php echo __("Are you sure you want to share this post?");?>
';__["Are you sure you want to delete this comment?"] = '<?php echo __("Are you sure you want to delete this comment?");?>
';__["Are you sure you want to delete this conversation?"] = '<?php echo __("Are you sure you want to delete this conversation?");?>
';__["Are you sure you want to report this user?"] = '<?php echo __("Are you sure you want to report this user?");?>
';__["Are you sure you want to report this page?"] = '<?php echo __("Are you sure you want to report this page?");?>
';__["Are you sure you want to report this group?"] = '<?php echo __("Are you sure you want to report this group?");?>
';__["Are you sure you want to block this user?"] = '<?php echo __("Are you sure you want to block this user?");?>
';__["Are you sure you want to unblock this user?"] = '<?php echo __("Are you sure you want to unblock this user?");?>
';__["Are you sure you want to delete your account?"] = '<?php echo __("Are you sure you want to delete your account?");?>
';__["There is something that went wrong!"] = '<?php echo __("There is something that went wrong!");?>
';__["There is no more data to show"] = '<?php echo __("There is no more data to show");?>
';__["This has been shared to your Timeline"] = '<?php echo __("This has been shared to your Timeline");?>
';<?php echo '</script'; ?>
><!-- Initialize --><!-- Dependencies Libs [jQuery|Bootstrap|Mustache] --><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/jquery/jquery-1.12.2.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/bootstrap/bootstrap.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/mustache/mustache.min.js"><?php echo '</script'; ?>
><!-- Dependencies Libs [jQuery|Bootstrap|Mustache] --><!-- Dependencies Plugins [JS] [fastclick|slimscroll|autogrow|moment|form|inview|videojs|mediaelementplayer] --><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/fastclick/fastclick.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/slimscroll/slimscroll.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/autogrow/autogrow.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/moment/moment-with-locales.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/inview/inview.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/form/form.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/videojs/video.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/mediaelementplayer/mediaelement-and-player.min.js"><?php echo '</script'; ?>
><!-- Dependencies Plugins [JS] [fastclick|slimscroll|autogrow|moment|form|inview|videojs|mediaelementplayer] --><!-- Dependencies Plugins [CSS] [videojs|mediaelementplayer] --><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/videojs/video-js.min.css"><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/mediaelementplayer/mediaelementplayer.min.css"><!-- Dependencies Plugins [CSS] [videojs|mediaelementplayer] --><!-- Dependencies CSS [Twemoji-Awesome|Flag-Icon] --><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/css/twemoji-awesome/twemoji-awesome.min.css" onload="if(media!='all')media='all'"><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/css/flag-icon/css/flag-icon.min.css" onload="if(media!='all')media='all'"><!-- Dependencies CSS [Twemoji-Awesome|Flag-Icon] --><!-- Sngine [JS] --><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/sngine/core.min.js"><?php echo '</script'; ?>
><?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {
echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/sngine/user.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/sngine/post.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/sngine/chat.js"><?php echo '</script'; ?>
><?php }?><!-- Sngine [JS] --><?php if ($_smarty_tpl->tpl_vars['page']->value == "admin") {?><!-- Dependencies Plugins [JS] --><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/metisMenu/metisMenu.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/dataTables/jquery.dataTables.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/dataTables/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/colorpicker/bootstrap-colorpicker.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/datetimepicker/datetimepicker.min.js"><?php echo '</script'; ?>
><!-- Dependencies Plugins [JS] --><!-- Dependencies Plugins [CSS] --><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/metisMenu/metisMenu.min.css"><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/dataTables/dataTables.bootstrap.min.css"><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/colorpicker/bootstrap-colorpicker.min.css"><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/datetimepicker/datetimepicker.min.css"><!-- Dependencies Plugins [CSS] --><!-- Sngine [JS] --><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/sngine/admin.js"><?php echo '</script'; ?>
><!-- Sngine [JS] --><?php }
}
}
