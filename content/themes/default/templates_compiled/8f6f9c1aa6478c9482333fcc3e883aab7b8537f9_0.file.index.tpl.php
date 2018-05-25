<?php
/* Smarty version 3.1.30-dev/(88), created on 2017-03-15 12:10:41
  from "C:\Te\OpenServer\domains\www.redate.tk\content\themes\default\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/(88)',
  'unifunc' => 'content_58c92f41a31793_51677573',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f6f9c1aa6478c9482333fcc3e883aab7b8537f9' => 
    array (
      0 => 'C:\\Te\\OpenServer\\domains\\www.redate.tk\\content\\themes\\default\\templates\\index.tpl',
      1 => 1473048671,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:_directory.tpl' => 1,
    'file:_announcements.tpl' => 1,
    'file:_publisher.tpl' => 1,
    'file:_posts.tpl' => 2,
    'file:__feeds_page.tpl' => 2,
    'file:__feeds_group.tpl' => 2,
    'file:__feeds_game.tpl' => 1,
    'file:_ads.tpl' => 1,
    'file:_widget.tpl' => 1,
    'file:__feeds_user.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_58c92f41a31793_51677573 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
    <!-- page content -->
    <div class="index-wrapper">
        <div class="container">
            <div class="index-intro">
                <h1>
                    <?php echo __("Welcome to");?>
 <?php echo $_smarty_tpl->tpl_vars['system']->value['system_title'];?>

                </h1>
                <p>
                    <?php echo __("Share your memories, connect with others, make new friends");?>

                </p>
            </div>

            <div class="row relative">
                
                <?php if ($_smarty_tpl->tpl_vars['random_users']->value) {?>
                    <!-- random 4 users -->
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['random_users']->value, 'random_user');
$_smarty_tpl->tpl_vars['random_user']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['random_user']->value) {
$_smarty_tpl->tpl_vars['random_user']->index++;
$__foreach_random_user_0_saved = $_smarty_tpl->tpl_vars['random_user'];
?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['random_user']->value['user_name'];?>
" class="fly-head" 
                            <?php if ($_smarty_tpl->tpl_vars['random_user']->index == 0) {?> style="top: 140px;left: 50px;" <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['random_user']->index == 1) {?> style="bottom: 60px;left: 210px;" <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['random_user']->index == 2) {?> style="top: 140px;right: 50px;" <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['random_user']->index == 3) {?> style="bottom: 60px;right: 210px;" <?php }?>
                            data-toggle="tooltip" data-placement="top" title="<?php echo $_smarty_tpl->tpl_vars['random_user']->value['user_fullname'];?>
">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['random_user']->value['user_picture'];?>
">
                        </a>
                    <?php
$_smarty_tpl->tpl_vars['random_user'] = $__foreach_random_user_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    <!-- random 4 users -->
                <?php }?>

                <div class="col-xs-12 col-sm-4 col-sm-offset-4">
                    <div class="panel panel-login">
                        <div class="panel-body">
                            <h4><?php echo __("Login");?>
</h4>
                            <form class="js_ajax-forms" data-url="core/signin.php">
                                <div class="form-group">
                                    <input name="username_email" type="text" class="form-control" placeholder='<?php echo __("Email");?>
 <?php echo __("or");?>
 <?php echo __("Username");?>
' required>
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control" placeholder='<?php echo __("Password");?>
' required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> <?php echo __("Remember me");?>

                                    </label>
                                    | <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/reset"><?php echo __("Forget your password?");?>
</a>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary"><?php echo __("Login");?>
</button>

                                <!-- error -->
                                <div class="alert alert-danger mb0 mt10 x-hidden" role="alert"></div>
                                <!-- error -->
                            </form>
                            <?php if ($_smarty_tpl->tpl_vars['system']->value['social_login_enabled']) {?>
                                <?php if ($_smarty_tpl->tpl_vars['system']->value['facebook_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['twitter_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['google_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['linkedin_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['vkontakte_login_enabled']) {?>
                                    <div class="hr-heading mt5 mb10">
                                        <div class="hr-heading-text">
                                            <?php echo __("or");?>
 <?php echo __("login with");?>

                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <?php if ($_smarty_tpl->tpl_vars['system']->value['facebook_login_enabled']) {?>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/facebook" class="btn btn-social-icon btn-facebook">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['system']->value['twitter_login_enabled']) {?>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/twitter" class="btn btn-social-icon btn-twitter">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['system']->value['google_login_enabled']) {?>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/google" class="btn btn-social-icon btn-google">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['system']->value['linkedin_login_enabled']) {?>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/linkedin" class="btn btn-social-icon btn-linkedin">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['system']->value['vkontakte_login_enabled']) {?>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/vkontakte" class="btn btn-social-icon btn-vk">
                                                <i class="fa fa-vk"></i>
                                            </a>
                                        <?php }?>
                                    </div>
                                <?php }?>
                            <?php }?>
                            <div class="mt20 text-center"><?php echo __("Not registered?");?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/signup" class="js_toggle-panel text-link"><?php echo __("Create an account");?>
</a></div>
                        </div>
                        <div class="panel-body x-hidden">
                            <h4><?php echo __("New to");?>
 <?php echo $_smarty_tpl->tpl_vars['system']->value['system_title'];?>
! <?php echo __("Sign up");?>
</h4>
                            <form class="js_ajax-forms" data-url="core/signup.php">
                                <div class="form-group">
                                    <input name="full_name" type="text" class="form-control" placeholder='<?php echo __("Full name");?>
' required>
                                </div>
                                <div class="form-group">
                                    <input name="username" type="text" class="form-control" placeholder='<?php echo __("Username");?>
' required>
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" placeholder='<?php echo __("Email");?>
' required>
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control" placeholder='<?php echo __("Password");?>
' required>
                                </div>
                                <div class="js_hidden-section x-hidden">
                                    <div class="form-group">
                                        <label for="gender"><?php echo __("I am");?>
</label>
                                        <select name="gender" id="gender" class="form-control" required>
                                            <option value="none"><?php echo __("Select Sex");?>
:</option>
                                            <option value="male"><?php echo __("Male");?>
</option>
                                            <option value="female"><?php echo __("Female");?>
</option>
                                        </select>
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['system']->value['reCAPTCHA_enabled']) {?>
                                    <div class="form-group">
                                        <!-- reCAPTCHA -->
                                        <?php echo '<script'; ?>
 src='https://www.google.com/recaptcha/api.js'><?php echo '</script'; ?>
>
                                        <div class="g-recaptcha" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['system']->value['reCAPTCHA_site_key'];?>
"></div>
                                        <!-- reCAPTCHA -->
                                    </div>
                                    <?php }?>
                                    <p class="text-muted">
                                        <?php echo __("By clicking Sign Up, you agree to our");?>
 <a href="#"><?php echo __("Terms");?>
</a>
                                    </p>
                                </div>
                                <button type="submit" class="btn btn-block btn-success"><?php echo __("Sign Up");?>
</button>

                                <!-- error -->
                                <div class="alert alert-danger mb0 mt10 x-hidden" role="alert"></div>
                                <!-- error -->
                            </form>
                            <?php if ($_smarty_tpl->tpl_vars['system']->value['social_login_enabled']) {?>
                                <?php if ($_smarty_tpl->tpl_vars['system']->value['facebook_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['twitter_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['google_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['linkedin_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['vkontakte_login_enabled']) {?>
                                    <div class="hr-heading mt5 mb10">
                                        <div class="hr-heading-text">
                                            <?php echo __("or");?>
 <?php echo __("login with");?>

                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <?php if ($_smarty_tpl->tpl_vars['system']->value['facebook_login_enabled']) {?>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/facebook" class="btn btn-social-icon btn-facebook">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['system']->value['twitter_login_enabled']) {?>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/twitter" class="btn btn-social-icon btn-twitter">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['system']->value['google_login_enabled']) {?>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/google" class="btn btn-social-icon btn-google">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['system']->value['linkedin_login_enabled']) {?>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/linkedin" class="btn btn-social-icon btn-linkedin">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['system']->value['vkontakte_login_enabled']) {?>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/vkontakte" class="btn btn-social-icon btn-vk">
                                                <i class="fa fa-vk"></i>
                                            </a>
                                        <?php }?>
                                    </div>
                                <?php }?>
                            <?php }?>
                            <div class="mt20 text-center"><?php echo __("Have account?");?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/signin" class="js_toggle-panel text-link"><?php echo __("Login Now");?>
</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['system']->value['system_public']) {?>
        <?php $_smarty_tpl->_subTemplateRender("file:_directory.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php }?>
    <!-- page content -->
<?php } else { ?>
    <!-- page content -->
    <div class="container mt20">
        <div class="row">

            <!-- left panel -->
            <div class="col-sm-2">
                <ul class="nav nav-pills nav-stacked nav-home hidden-xs">
                    <!-- basic -->
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_name'];?>
">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_fullname'];?>
">
                            <span><?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_fullname'];?>
</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile">
                            <i class="fa fa-pencil-square fa-fw pr10"></i> 
                            <?php echo __("Edit Profile");?>

                        </a>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_group'] == 1) {?>
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/admin">
                                <i class="fa fa-tachometer fa-fw pr10"></i> 
                                <?php echo __("Admin Panel");?>

                            </a>
                        </li>
                    <?php }?>
                    <!-- basic -->

                    <!-- favorites -->
                    <li class="ptb5">
                        <small class="text-muted"><?php echo mb_strtoupper(__("favorites"), 'UTF-8');?>
</small>
                    </li>

                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>class="active"<?php }?>>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
"><i class="fa fa-newspaper-o fa-fw pr10"></i> <?php echo __("News Feed");?>
</a>
                    </li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/messages"><i class="fa fa-comments-o fa-fw pr10"></i> <?php echo __("Messages");?>
</a>
                    </li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_name'];?>
/photos"><i class="fa fa-picture-o fa-fw pr10"></i> <?php echo __("Photos");?>
</a>
                    </li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_name'];?>
/friends"><i class="fa fa-users fa-fw pr10"></i> <?php echo __("Friends");?>
</a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "saved") {?>class="active"<?php }?>>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/saved"><i class="fa fa-bookmark fa-fw pr10"></i> <?php echo __("Saved");?>
</a>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['system']->value['games_enabled']) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "games") {?>class="active"<?php }?>>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/games"><i class="fa fa-gamepad fa-fw pr10"></i> <?php echo __("Games");?>
</a>
                        </li>
                    <?php }?>
                    <!-- favorites -->

                    <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_group'] < 3 || $_smarty_tpl->tpl_vars['system']->value['pages_enabled']) {?>
                        <!-- pages -->
                        <li class="ptb5">
                            <small class="text-muted"><?php echo mb_strtoupper(__("pages"), 'UTF-8');?>
</small>
                        </li>

                        <?php if (count($_smarty_tpl->tpl_vars['pages']->value) > 0) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pages']->value, 'page');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
?>
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages/<?php echo $_smarty_tpl->tpl_vars['page']->value['page_name'];?>
">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['page']->value['page_picture'];?>
" alt="">
                                        <span><?php echo $_smarty_tpl->tpl_vars['page']->value['page_title'];?>
</span>
                                    </a>
                                </li>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        <?php }?>

                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "create_page") {?>class="active"<?php }?>>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/create/page"><i class="fa fa-flag fa-fw pr10"></i> <?php echo __("Create Page");?>
</a>
                        </li>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "pages") {?>class="active"<?php }?>>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages"><i class="fa fa-cubes fa-fw pr10"></i> <?php echo __("Manage Pages");?>
</a>
                        </li>
                        <!-- pages -->
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_group'] < 3 || $_smarty_tpl->tpl_vars['system']->value['groups_enabled']) {?>
                        <!-- groups -->
                        <li class="ptb5">
                            <small class="text-muted"><?php echo mb_strtoupper(__("groups"), 'UTF-8');?>
</small>
                        </li>

                        <?php if (count($_smarty_tpl->tpl_vars['groups']->value) > 0) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'group');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
?>
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/<?php echo $_smarty_tpl->tpl_vars['group']->value['group_name'];?>
">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['group']->value['group_picture'];?>
" alt="">
                                        <span><?php echo $_smarty_tpl->tpl_vars['group']->value['group_title'];?>
</span>
                                    </a>
                                </li>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        <?php }?>

                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "create_group") {?>class="active"<?php }?>>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/create/group"><i class="fa fa-users fa-fw pr10"></i> <?php echo __("Create Group");?>
</a>
                        </li>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "groups") {?>class="active"<?php }?>>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups"><i class="fa fa-cubes fa-fw pr10"></i> <?php echo __("Manage Groups");?>
</a>
                        </li>
                        <!-- groups -->
                    <?php }?>
                </ul>
            </div>
            <!-- left panel -->

            <!-- center panel -->
            <div class="col-sm-6">
                <!-- announcments -->
                <?php $_smarty_tpl->_subTemplateRender("file:_announcements.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <!-- announcments -->

                <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>
                    <!-- publisher -->
                    <?php $_smarty_tpl->_subTemplateRender("file:_publisher.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_handle'=>"me",'_privacy'=>true), 0, false);
?>

                    <!-- publisher -->

                    <!-- posts stream -->
                    <?php $_smarty_tpl->_subTemplateRender("file:_posts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"newsfeed"), 0, false);
?>

                    <!-- posts stream -->

                <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "saved") {?>
                    <!-- saved posts stream -->
                    <?php $_smarty_tpl->_subTemplateRender("file:_posts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"saved",'_title'=>__("Saved Posts")), 0, true);
?>

                    <!-- saved posts stream -->

                <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "pages") {?>
                    <div class="panel panel-default">
                        <div class="panel-heading light clearfix">
                            <div class="pull-right flip">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/create/page" class="btn btn-default btn-sm">
                                    <i class="fa fa-flag fa-fw pr10"></i> <?php echo __("Create Page");?>

                                </a>
                            </div>
                            <div class="mt5">
                                <strong><?php echo __("Your Pages");?>
</strong>
                            </div>
                        </div>
                        <div class="panel-body">

                            <?php if (count($_smarty_tpl->tpl_vars['pages']->value) > 0) {?>
                                <ul>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pages']->value, '_page');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['_page']->value) {
?>
                                    <?php $_smarty_tpl->_subTemplateRender("file:__feeds_page.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </ul>
                            <?php } else { ?>
                                <p class="text-center text-muted">
                                    <?php echo __("No pages available");?>

                                </p>
                            <?php }?>

                            <!-- see-more -->
                            <?php if (count($_smarty_tpl->tpl_vars['pages']->value) >= $_smarty_tpl->tpl_vars['system']->value['max_results']) {?>
                                <div class="alert alert-info see-more js_see-more" data-get="pages">
                                    <span><?php echo __("See More");?>
</span>
                                    <div class="loader loader_small x-hidden"></div>
                                </div>
                            <?php }?>
                            <!-- see-more -->

                        </div>
                    </div>

                <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "groups") {?>
                    <div class="panel panel-default">
                        <div class="panel-heading light clearfix">
                            <div class="pull-right flip">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/create/group" class="btn btn-default btn-sm">
                                    <i class="fa fa-flag fa-fw pr10"></i> <?php echo __("Create Group");?>

                                </a>
                            </div>
                            <div class="mt5">
                                <strong><?php echo __("Your Groups");?>
</strong>
                            </div>
                        </div>
                        <div class="panel-body">

                            <?php if (count($_smarty_tpl->tpl_vars['groups']->value) > 0) {?>
                                <ul>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, '_group');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['_group']->value) {
?>
                                    <?php $_smarty_tpl->_subTemplateRender("file:__feeds_group.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </ul>
                            <?php } else { ?>
                                <p class="text-center text-muted">
                                    <?php echo __("No groups available");?>

                                </p>
                            <?php }?>

                            <!-- see-more -->
                            <?php if (count($_smarty_tpl->tpl_vars['groups']->value) >= $_smarty_tpl->tpl_vars['system']->value['max_results']) {?>
                                <div class="alert alert-info see-more js_see-more" data-get="groups">
                                    <span><?php echo __("See More");?>
</span>
                                    <div class="loader loader_small x-hidden"></div>
                                </div>
                            <?php }?>
                            <!-- see-more -->

                        </div>
                    </div>

                <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "create_page") {?>
                    <!-- create page -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="mt5">
                                <strong><?php echo __("Create Page");?>
</strong>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="js_ajax-forms" data-url="data/create.php?type=page&amp;do=create">
                                <div class="form-group">
                                    <label for="category"><?php echo __("Category");?>
:</label>
                                    <select class="form-control" name="category" id="category">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['category_name'];?>
</option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title"><?php echo __("Title");?>
:</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder='<?php echo __("Title of your page");?>
'>
                                </div>
                                <div class="form-group">
                                    <label for="username"><?php echo __("Username");?>
:</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder='<?php echo __("Username, e.g. YouTubeOfficial");?>
'>
                                </div>
                                <div class="form-group">
                                    <label for="description"><?php echo __("Description");?>
:</label>
                                    <textarea class="form-control" name="description" name="description"  placeholder='<?php echo __("Write about your page...");?>
'></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary"><?php echo __("Create");?>
</button>

                                <!-- error -->
                                <div class="alert alert-danger mb0 mt10 x-hidden" role="alert"></div>
                                <!-- error -->
                            </form>
                        </div>
                    </div>
                    <!-- create page -->

                <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "create_group") {?>
                    <!-- create group -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="mt5">
                                <strong><?php echo __("Create Group");?>
</strong>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="js_ajax-forms" data-url="data/create.php?type=group&amp;do=create">
                                <div class="form-group">
                                    <label for="title"><?php echo __("Title");?>
:</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder='<?php echo __("Title of your group");?>
'>
                                </div>
                                <div class="form-group">
                                    <label for="username"><?php echo __("Username");?>
:</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder='<?php echo __("Username, e.g. DevelopersGroup");?>
'>
                                </div>
                                <div class="form-group">
                                    <label for="description"><?php echo __("Description");?>
:</label>
                                    <textarea class="form-control" name="description" placeholder='<?php echo __("Write about your group...");?>
'></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary"><?php echo __("Create");?>
</button>

                                <!-- error -->
                                <div class="alert alert-danger mb0 mt10 x-hidden" role="alert"></div>
                                <!-- error -->
                            </form>
                        </div>
                    </div>
                    <!-- create group -->

                <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "games") {?>
                    <div class="panel panel-default">
                        <div class="panel-heading light clearfix">
                            <div class="mt5">
                                <strong><?php echo __("Games");?>
</strong>
                            </div>
                        </div>
                        <div class="panel-body">

                            <?php if (count($_smarty_tpl->tpl_vars['games']->value) > 0) {?>
                                <ul>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['games']->value, '_game');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['_game']->value) {
?>
                                    <?php $_smarty_tpl->_subTemplateRender("file:__feeds_game.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </ul>
                            <?php } else { ?>
                                <p class="text-center text-muted">
                                    <?php echo __("No games available");?>

                                </p>
                            <?php }?>

                            <!-- see-more -->
                            <?php if (count($_smarty_tpl->tpl_vars['games']->value) >= $_smarty_tpl->tpl_vars['system']->value['max_results']) {?>
                                <div class="alert alert-info see-more js_see-more" data-get="games">
                                    <span><?php echo __("See More");?>
</span>
                                    <div class="loader loader_small x-hidden"></div>
                                </div>
                            <?php }?>
                            <!-- see-more -->

                        </div>
                    </div>

                <?php }?>
            </div>
            <!-- center panel -->

            <!-- right panel -->
            <div class="col-sm-4">

                <?php $_smarty_tpl->_subTemplateRender("file:_ads.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php $_smarty_tpl->_subTemplateRender("file:_widget.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


                <!-- people you may know -->
                <?php if (count($_smarty_tpl->tpl_vars['new_people']->value) > 0) {?>
                    <div class="panel panel-default panel-widget">
                        <div class="panel-heading">
                            <div class="pull-right flip">
                                <small><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/friends/requests"><?php echo __("See All");?>
</a></small>
                            </div>
                            <strong><?php echo __("People you may know");?>
</strong>
                        </div>
                        <div class="panel-body">
                            <ul>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['new_people']->value, '_user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
?>
                                <?php $_smarty_tpl->_subTemplateRender("file:__feeds_user.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_connection'=>"add",'_small'=>true), 0, true);
?>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            </ul>
                        </div>
                    </div>
                <?php }?>
                 <!-- people you may know -->

                <!-- suggested pages -->
                <?php if (count($_smarty_tpl->tpl_vars['new_pages']->value) > 0) {?>
                    <div class="panel panel-default panel-widget">
                        <div class="panel-heading">
                            <strong><?php echo __("Suggested Pages");?>
</strong>
                        </div>
                        <div class="panel-body">
                            <ul>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['new_pages']->value, '_page');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['_page']->value) {
?>
                                <?php $_smarty_tpl->_subTemplateRender("file:__feeds_page.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            </ul>
                        </div>
                    </div>
                <?php }?>
                <!-- suggested pages -->

                <!-- suggested groups -->
                <?php if (count($_smarty_tpl->tpl_vars['new_groups']->value) > 0) {?>
                    <div class="panel panel-default panel-widget">
                        <div class="panel-heading">
                            <strong><?php echo __("Suggested Groups");?>
</strong>
                        </div>
                        <div class="panel-body">
                            <ul>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['new_groups']->value, '_group');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['_group']->value) {
?>
                                <?php $_smarty_tpl->_subTemplateRender("file:__feeds_group.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            </ul>
                        </div>
                    </div>
                <?php }?>
                <!-- suggested groups -->

                <!-- mini footer -->
                <?php if (($_smarty_tpl->tpl_vars['view']->value == '' || $_smarty_tpl->tpl_vars['view']->value == "saved") && (count($_smarty_tpl->tpl_vars['new_people']->value) > 0 || count($_smarty_tpl->tpl_vars['new_pages']->value) > 0 || count($_smarty_tpl->tpl_vars['new_groups']->value) > 0)) {?>
                    <div class="row plr10 hidden-xs">
                        <div class="col-xs-12 mb5">
                            <?php if (count($_smarty_tpl->tpl_vars['static_pages']->value) > 0) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['static_pages']->value, 'static_page', true);
$_smarty_tpl->tpl_vars['static_page']->iteration = 0;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['static_page']->value) {
$_smarty_tpl->tpl_vars['static_page']->iteration++;
$_smarty_tpl->tpl_vars['static_page']->last = $_smarty_tpl->tpl_vars['static_page']->iteration == $_smarty_tpl->tpl_vars['static_page']->total;
$__foreach_static_page_10_saved = $_smarty_tpl->tpl_vars['static_page'];
?>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/static/<?php echo $_smarty_tpl->tpl_vars['static_page']->value['page_url'];?>
">
                                        <?php echo $_smarty_tpl->tpl_vars['static_page']->value['page_title'];?>

                                    </a><?php if (!$_smarty_tpl->tpl_vars['static_page']->last || $_smarty_tpl->tpl_vars['system']->value['system_public']) {?> · <?php }?>
                                <?php
$_smarty_tpl->tpl_vars['static_page'] = $__foreach_static_page_10_saved;
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
                        <div class="col-xs-12">
                            &copy; <?php echo date('Y');?>
 <?php echo $_smarty_tpl->tpl_vars['system']->value['system_title'];?>
 · <span class="text-link" data-toggle="modal" data-url="#translator"><?php echo $_smarty_tpl->tpl_vars['system']->value['language']['title'];?>
</span>
                        </div>
                    </div>
                <?php }?>
                <!-- mini footer -->

            </div>
            <!-- right panel -->

        </div>
    </div>
    <!-- page content -->
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
