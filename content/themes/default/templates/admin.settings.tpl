<div class="panel panel-default">
    <div class="panel-heading with-icon">
        <i class="fa fa-cog pr5 panel-icon"></i>
        <strong>{__("Settings")}</strong>
    </div>
    <div class="panel-body">

        <!-- tabs nav -->
        <ul class="nav nav-tabs admin mb20">
            <li class="active">
                <a href="#System" data-toggle="tab">
                    <strong class="pr5">{__("System")}</strong>
                </a>
            </li>
            <li>
                <a href="#Registration" data-toggle="tab">
                    <strong class="pr5">{__("Registration")}</strong>
                </a>
            </li>
            <li>
                <a href="#Emails" data-toggle="tab">
                    <strong class="pr5">{__("Emails")}</strong>
                </a>
            </li>
            <li>
                <a href="#Chat" data-toggle="tab">
                    <strong class="pr5">{__("Chat")}</strong>
                </a>
            </li>
            <li>
                <a href="#Uploads" data-toggle="tab">
                    <strong class="pr5">{__("Uploads")}</strong>
                </a>
            </li>
            <li>
                <a href="#Security" data-toggle="tab">
                    <strong class="pr5">{__("Security")}</strong>
                </a>
            </li>
            <li>
                <a href="#Limits" data-toggle="tab">
                    <strong class="pr5">{__("Limits")}</strong>
                </a>
            </li>
            <li>
                <a href="#Analytics" data-toggle="tab">
                    <strong class="pr5">{__("Analytics")}</strong>
                </a>
            </li>
        </ul>
        <!-- tabs nav -->

        <!-- tabs content -->
        <div class="tab-content">
            <!-- System -->
            <div class="tab-pane active" id="System">
                <form class="js_ajax-forms form-horizontal" data-url="admin/settings.php?edit=system">
                    <div class="form-group">
                        <label class="col-sm-3 control-label text-left">
                            {__("Website Live")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="system_live" class="onoffswitch-checkbox" id="system_live" {if $system['system_live']}checked{/if}>
                                <label class="onoffswitch-label" for="system_live"></label>
                            </div>
                            <span class="help-block">
                                {__("Turn the entire website On and Off")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Shutdown Message")}
                        </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="system_message" rows="3">{$system['system_message']}</textarea>
                            <span class="help-block">
                                {__("The text that is presented when the site is closed")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label text-left">
                            {__("Website Public")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="system_public" class="onoffswitch-checkbox" id="system_public" {if $system['system_public']}checked{/if}>
                                <label class="onoffswitch-label" for="system_public"></label>
                            </div>
                            <span class="help-block">
                                {__("Disable it to prevent non logged users to view website")}
                            </span>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Website Title")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="system_title" value="{$system['system_title']}">
                            <span class="help-block">
                                {__("Title of your website")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Website Description")}
                        </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="system_description" rows="3">{$system['system_description']}</textarea>
                            <span class="help-block">
                                {__("Description of your website")}
                            </span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Website Keywords")}
                        </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="system_keywords" rows="3">{$system['system_keywords']}</textarea>
                            <span class="help-block">
                                {__("Example: social, sngine, social site")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Website Path")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="system_url" value="{$system['system_url']}">
                            <span class="help-block">
                                {__("The path of your system")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Uploads Directory")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="system_uploads_directory" value="{$system['system_uploads_directory']}">
                            <span class="help-block">
                                {__("The path of uploads directory")}
                            </span>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label text-left">
                            {__("Wall Posts Enabled")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="wall_posts_enabled" class="onoffswitch-checkbox" id="wall_posts_enabled" {if $system['wall_posts_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="wall_posts_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Users can publish posts on their friends walls")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label text-left">
                            {__("Pages Enabled")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="pages_enabled" class="onoffswitch-checkbox" id="pages_enabled" {if $system['pages_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="pages_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Users can create pages or only admins/moderators")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label text-left">
                            {__("Groups Enabled")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="groups_enabled" class="onoffswitch-checkbox" id="groups_enabled" {if $system['groups_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="groups_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Users can create groups or only admins/moderators")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label text-left">
                            {__("Profile visit notification")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="profile_notification_enabled" class="onoffswitch-checkbox" id="profile_notification_enabled" {if $system['profile_notification_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="profile_notification_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Turn the profile visit notification On and Off")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label text-left">
                            {__("Games Enabled")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="games_enabled" class="onoffswitch-checkbox" id="games_enabled" {if $system['games_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="games_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Turn the games On and Off")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label text-left">
                            {__("Geolocation Enabled")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="geolocation_enabled" class="onoffswitch-checkbox" id="geolocation_enabled" {if $system['geolocation_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="geolocation_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Turn the post Geolocation On and Off")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label text-left">
                            {__("Geolocation Google Key")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="geolocation_key" value="{$system['geolocation_key']}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary">{__("Save Changes")}</button>
                        </div>
                    </div>

                    <!-- success -->
                    <div class="alert alert-success mb0 mt10 x-hidden" role="alert"></div>
                    <!-- success -->

                    <!-- error -->
                    <div class="alert alert-danger mb0 mt10 x-hidden" role="alert"></div>
                    <!-- error -->
                </form>
            </div>
            <!-- System -->

            <!-- Registration -->
            <div class="tab-pane" id="Registration">
                <form class="js_ajax-forms form-horizontal" data-url="admin/settings.php?edit=registration">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Registration Enabled")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="registration_enabled" class="onoffswitch-checkbox" id="registration_enabled" {if $system['registration_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="registration_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Turn registration On and Off")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Send Activation Email")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="email_send_activation" class="onoffswitch-checkbox" id="email_send_activation" {if $system['email_send_activation']}checked{/if}>
                                <label class="onoffswitch-label" for="email_send_activation"></label>
                            </div>
                            <span class="help-block">
                                {__("Enable/Disable activation email after registration")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Getting Started")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="getting_started" class="onoffswitch-checkbox" id="getting_started" {if $system['getting_started']}checked{/if}>
                                <label class="onoffswitch-label" for="getting_started"></label>
                            </div>
                            <span class="help-block">
                                {__("Enable/Disable getting started page after registration")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label text-left">
                            {__("Delete Account")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="delete_accounts_enabled" class="onoffswitch-checkbox" id="delete_accounts_enabled" {if $system['delete_accounts_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="delete_accounts_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Allow users to delete their account")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Accounts/IP")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="max_accounts" value="{$system['max_accounts']}">
                            <span class="help-block">
                                {__("Number of accounts allowed to register per IP (0 for unlimited)")}
                            </span>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Social Logins")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="social_login_enabled" class="onoffswitch-checkbox" id="social_login_enabled" {if $system['social_login_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="social_login_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Turn registration/login via social media (Facebook, Twitter and etc) On and Off")}
                            </span>
                        </div>
                    </div>

                    <!-- facebook -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Facebook Login")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="facebook_login_enabled" class="onoffswitch-checkbox" id="facebook_login_enabled" {if $system['facebook_login_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="facebook_login_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Turn registration/login via Facebook On and Off")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Facebook App ID")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="facebook_appid" value="{$system['facebook_appid']}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Facebook App Secret")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="facebook_secret" value="{$system['facebook_secret']}">
                        </div>
                    </div>
                    <!-- facebook -->

                    <!-- twitter -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Twitter Login")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="twitter_login_enabled" class="onoffswitch-checkbox" id="twitter_login_enabled" {if $system['twitter_login_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="twitter_login_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Turn registration/login via Twitter On and Off")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Twitter App ID")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="twitter_appid" value="{$system['twitter_appid']}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Twitter App Secret")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="twitter_secret" value="{$system['twitter_secret']}">
                        </div>
                    </div>
                    <!-- twitter -->

                    <!-- google -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Google Login")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="google_login_enabled" class="onoffswitch-checkbox" id="google_login_enabled" {if $system['google_login_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="google_login_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Turn registration/login via Google On and Off")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Google App ID")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="google_appid" value="{$system['google_appid']}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Google App Secret")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="google_secret" value="{$system['google_secret']}">
                        </div>
                    </div>
                    <!-- google -->

                    <!-- linkedin -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Linkedin Login")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="linkedin_login_enabled" class="onoffswitch-checkbox" id="linkedin_login_enabled" {if $system['linkedin_login_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="linkedin_login_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Turn registration/login via Linkedin On and Off")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Linkedin App ID")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="linkedin_appid" value="{$system['linkedin_appid']}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Linkedin App Secret")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="linkedin_secret" value="{$system['linkedin_secret']}">
                        </div>
                    </div>
                    <!-- linkedin -->

                    <!-- vk -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Vkontakte Login")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="vkontakte_login_enabled" class="onoffswitch-checkbox" id="vkontakte_login_enabled" {if $system['vkontakte_login_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="vkontakte_login_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Turn registration/login via Vkontakte On and Off")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Vkontakte App ID")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="vkontakte_appid" value="{$system['vkontakte_appid']}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Vkontakte App Secret")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="vkontakte_secret" value="{$system['vkontakte_secret']}">
                        </div>
                    </div>
                    <!-- vk -->

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary">{__("Save Changes")}</button>
                        </div>
                    </div>

                    <!-- success -->
                    <div class="alert alert-success mb0 mt10 x-hidden" role="alert"></div>
                    <!-- success -->

                    <!-- error -->
                    <div class="alert alert-danger mb0 mt10 x-hidden" role="alert"></div>
                    <!-- error -->
                </form>
            </div>
            <!-- Registration -->

            <!-- Emails -->
            <div class="tab-pane" id="Emails">
                <form class="js_ajax-forms form-horizontal" data-url="admin/settings.php?edit=emails">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("SMTP Emails")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="email_smtp_enabled" class="onoffswitch-checkbox" id="email_smtp_enabled" {if $system['email_smtp_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="email_smtp_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Enable/Disable SMTP email system")}<br/>
                                {__("PHP mail() function will be used in case of disabled")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("SMTP Server")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email_smtp_server" value="{$system['email_smtp_server']}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("SMTP Require Authentication")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="email_smtp_authentication" class="onoffswitch-checkbox" id="email_smtp_authentication" {if $system['email_smtp_authentication']}checked{/if}>
                                <label class="onoffswitch-label" for="email_smtp_authentication"></label>
                            </div>
                            <span class="help-block">
                                {__("Enable/Disable SMTP email system")}<br/>
                                {__("PHP mail() function will be used in case of disabled")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("SMTP Port")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email_smtp_port" value="{$system['email_smtp_port']}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("SMTP Username")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email_smtp_username" value="{$system['email_smtp_username']}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("SMTP Password")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email_smtp_password" value="{$system['email_smtp_password']}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary">{__("Save Changes")}</button>
                        </div>
                    </div>

                    <!-- success -->
                    <div class="alert alert-success mb0 mt10 x-hidden" role="alert"></div>
                    <!-- success -->

                    <!-- error -->
                    <div class="alert alert-danger mb0 mt10 x-hidden" role="alert"></div>
                    <!-- error -->
                </form>
            </div>
            <!-- Emails -->

            <!-- Chat -->
            <div class="tab-pane" id="Chat">
                <form class="js_ajax-forms form-horizontal" data-url="admin/settings.php?edit=chat">
                    <div class="form-group">
                        <label class="col-sm-3 control-label text-left">
                            {__("Chat Enabled")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="chat_enabled" class="onoffswitch-checkbox" id="chat_enabled" {if $system['chat_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="chat_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Turn the chat system On and Off")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label text-left">
                            {__("User Status Enabled")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="chat_status_enabled" class="onoffswitch-checkbox" id="chat_status_enabled" {if $system['chat_status_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="chat_status_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Turn the Last Seen On and Off")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary">{__("Save Changes")}</button>
                        </div>
                    </div>

                    <!-- success -->
                    <div class="alert alert-success mb0 mt10 x-hidden" role="alert"></div>
                    <!-- success -->

                    <!-- error -->
                    <div class="alert alert-danger mb0 mt10 x-hidden" role="alert"></div>
                    <!-- error -->
                </form>
            </div>
            <!-- Chat -->

            <!-- Uploads -->
            <div class="tab-pane" id="Uploads">
                <form class="js_ajax-forms form-horizontal" data-url="admin/settings.php?edit=uploads">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Uploads Prefix")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="uploads_prefix" value="{$system['uploads_prefix']}">
                            <span class="help-block">
                                {__("Add a prefix to the uploaded files")}
                            </span>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Max profile photo size")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="max_avatar_size" value="{$system['max_avatar_size']}">
                            <span class="help-block">
                                {__("The Maximum size of profile photo")} {__("in kilobytes (1 M = 1024 KB)")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Max cover photo size")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="max_cover_size" value="{$system['max_cover_size']}">
                            <span class="help-block">
                                {__("The Maximum size of cover photo")} {__("in kilobytes (1 M = 1024 KB)")}
                            </span>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label text-left">
                            {__("Photo Upload")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="photos_enabled" class="onoffswitch-checkbox" id="photos_enabled" {if $system['photos_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="photos_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Enable photo upload to share & upload photos to the site")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Max photo size")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="max_photo_size" value="{$system['max_photo_size']}">
                            <span class="help-block">
                                {__("The Maximum size of uploaded photo in posts")} {__("in kilobytes (1M = 1024KB)")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label text-left">
                            {__("Video Upload")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="videos_enabled" class="onoffswitch-checkbox" id="videos_enabled" {if $system['videos_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="videos_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Enable video upload to share & upload videos to the site")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Max video size")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="max_video_size" value="{$system['max_video_size']}">
                            <span class="help-block">
                                {__("The Maximum size of uploaded video in posts")} {__("in kilobytes (1M = 1024KB)")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Allowed video extensions")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="video_extensions" value="{$system['video_extensions']}">
                            <span class="help-block">
                                {__("Allowed video extensions (separated with comma ',)")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label text-left">
                            {__("Audio Upload")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="audio_enabled" class="onoffswitch-checkbox" id="audio_enabled" {if $system['audio_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="audio_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Enable audio upload to share & upload sounds to the site")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Max audio size")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="max_audio_size" value="{$system['max_audio_size']}">
                            <span class="help-block">
                                {__("The Maximum size of uploaded audio in posts")} {__("in kilobytes (1M = 1024KB)")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Allowed audio extensions")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="audio_extensions" value="{$system['audio_extensions']}">
                            <span class="help-block">
                                {__("Allowed audio extensions (separated with comma ',)")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label text-left">
                            {__("File Upload")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="file_enabled" class="onoffswitch-checkbox" id="file_enabled" {if $system['file_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="file_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Enable file upload to share & upload files to the site")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Max file size")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="max_file_size" value="{$system['max_file_size']}">
                            <span class="help-block">
                                {__("The Maximum size of uploaded file in posts")} {__("in kilobytes (1M = 1024KB)")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Allowed file extensions")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="file_extensions" value="{$system['file_extensions']}">
                            <span class="help-block">
                                {__("Allowed file extensions (separated with comma ',)")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary">{__("Save Changes")}</button>
                        </div>
                    </div>

                    <!-- success -->
                    <div class="alert alert-success mb0 mt10 x-hidden" role="alert"></div>
                    <!-- success -->

                    <!-- error -->
                    <div class="alert alert-danger mb0 mt10 x-hidden" role="alert"></div>
                    <!-- error -->
                </form>
            </div>
            <!-- Uploads -->

            <!-- Security -->
            <div class="tab-pane" id="Security">
                <form class="js_ajax-forms form-horizontal" data-url="admin/settings.php?edit=security">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Censored Words Enabled")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="censored_words_enabled" class="onoffswitch-checkbox" id="censored_words_enabled" {if $system['censored_words_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="censored_words_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Enable/Disable Words to be censored")}<br/>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Censored Words")}
                        </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="censored_words" rows="3">{$system['censored_words']}</textarea>
                            <span class="help-block">
                                {__("Words to be censored, separated by a comma (,)")}
                            </span>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("reCAPTCHA Enabled")}
                        </label>
                        <div class="col-sm-9">
                            <div class="onoffswitch">
                                <input type="checkbox" name="reCAPTCHA_enabled" class="onoffswitch-checkbox" id="reCAPTCHA_enabled" {if $system['reCAPTCHA_enabled']}checked{/if}>
                                <label class="onoffswitch-label" for="reCAPTCHA_enabled"></label>
                            </div>
                            <span class="help-block">
                                {__("Turn reCAPTCHA On and Off")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("reCAPTCHA Site Key")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="reCAPTCHA_site_key" value="{$system['reCAPTCHA_site_key']}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("reCAPTCHA Secret Key")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="reCAPTCHA_secret_key" value="{$system['reCAPTCHA_secret_key']}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary">{__("Save Changes")}</button>
                        </div>
                    </div>

                    <!-- success -->
                    <div class="alert alert-success mb0 mt10 x-hidden" role="alert"></div>
                    <!-- success -->

                    <!-- error -->
                    <div class="alert alert-danger mb0 mt10 x-hidden" role="alert"></div>
                    <!-- error -->
                </form>
            </div>
            <!-- Security -->

            <!-- Limits -->
            <div class="tab-pane" id="Limits">
                <form class="js_ajax-forms form-horizontal" data-url="admin/settings.php?edit=limits">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Data Heartbeat")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="data_heartbeat" value="{$system['data_heartbeat']}">
                            <span class="help-block">
                                {__("The update interval to check for new data (in seconds)")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Chat Heartbeat")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="chat_heartbeat" value="{$system['chat_heartbeat']}">
                            <span class="help-block">
                                {__("The update interval to check for new messages (in seconds)")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Offline after")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="offline_time" value="{$system['offline_time']}">
                            <span class="help-block">
                                {__("The amount of time to be considered online since the last user's activity (in seconds)")}
                            </span>
                        </div>
                    </div>

                    <div class="divider"></div>


                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Minimum Results")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="min_results" value="{$system['min_results']}">
                            <span class="help-block">
                                {__("The Min number of results per request")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Maximum Results")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="max_results" value="{$system['max_results']}">
                            <span class="help-block">
                                {__("The Max number of results per request")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Minimum Even Results")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="min_results_even" value="{$system['min_results_even']}">
                            <span class="help-block">
                                {__("The Min even number of results per request")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Maximum Even Results")}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="max_results_even" value="{$system['max_results_even']}">
                            <span class="help-block">
                                {__("The Max even number of results per request")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary">{__("Save Changes")}</button>
                        </div>
                    </div>

                    <!-- success -->
                    <div class="alert alert-success mb0 mt10 x-hidden" role="alert"></div>
                    <!-- success -->

                    <!-- error -->
                    <div class="alert alert-danger mb0 mt10 x-hidden" role="alert"></div>
                    <!-- error -->
                </form>
            </div>
            <!-- Limits -->

            <!-- Analytics -->
            <div class="tab-pane" id="Analytics">
                <form class="js_ajax-forms form-horizontal" data-url="admin/settings.php?edit=analytics">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            {__("Tracking Code")}
                        </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="analytics_code" rows="3">{$system['analytics_code']}</textarea>
                            <span class="help-block">
                                {__("The analytics tracking code (Ex: Google Analytics)")}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary">{__("Save Changes")}</button>
                        </div>
                    </div>

                    <!-- success -->
                    <div class="alert alert-success mb0 mt10 x-hidden" role="alert"></div>
                    <!-- success -->

                    <!-- error -->
                    <div class="alert alert-danger mb0 mt10 x-hidden" role="alert"></div>
                    <!-- error -->
                </form>
            </div>
            <!-- Analytics -->
        </div>
        <!-- tabs content -->
    </div>
</div>