{include file='_head.tpl'}
{include file='_header.tpl'}

<!-- page content -->
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h3 class="mb20 text-center">{__("Sign up")}</h3>

            {if $system['social_login_enabled']}
                {if $system['facebook_login_enabled'] || $system['twitter_login_enabled'] || $system['google_login_enabled'] || $system['linkedin_login_enabled'] || $system['vkontakte_login_enabled']}
                    <div class="mb20">
                        {if $system['facebook_login_enabled']}
                        <a href="{$system['system_url']}/connect/facebook" class="btn btn-block btn-social btn-facebook">
                            <i class="fa fa-facebook"></i> {__("Login with")} {__("Facebook")}
                        </a>
                        {/if}
                        {if $system['twitter_login_enabled']}
                        <a href="{$system['system_url']}/connect/twitter" class="btn btn-block btn-social btn-twitter">
                            <i class="fa fa-twitter"></i> {__("Login with")} {__("Twitter")}
                        </a>
                        {/if}
                        {if $system['google_login_enabled']}
                        <a href="{$system['system_url']}/connect/google" class="btn btn-block btn-social btn-google">
                            <i class="fa fa-google"></i> {__("Login with")} {__("Google")}
                        </a>
                        {/if}
                        {if $system['linkedin_login_enabled']}
                        <a href="{$system['system_url']}/connect/linkedin" class="btn btn-block btn-social btn-linkedin">
                            <i class="fa fa-linkedin"></i> {__("Login with")} {__("Linkedin")}
                        </a>
                        {/if}
                        {if $system['vkontakte_login_enabled']}
                        <a href="{$system['system_url']}/connect/vkontakte" class="btn btn-block btn-social btn-vk">
                            <i class="fa fa-vk"></i> {__("Login with")} {__("Vkontakte")}
                        </a>
                        {/if}
                    </div>
                    <div class="hr-heading mb10">
                        <div class="hr-heading-text">
                            {__("or")}
                        </div>
                    </div>
                {/if}
            {/if}
            
            <form class="js_ajax-forms" data-url="core/signup.php">
                <div class="form-group">
                    <label for="full_name">{__("Full name")}</label>
                    <input name="full_name" id="full_name" type="text" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label for="username">{__("Username")}</label>
                    <input name="username" id="username" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">{__("Email")}</label>
                    <input name="email" id="email" type="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">{__("Password")}</label>
                    <input name="password" id="password" type="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="gender">{__("I am")}</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="none">{__("Select Sex")}:</option>
                        <option value="male">{__("Male")}</option>
                        <option value="female">{__("Female")}</option>
                    </select>
                </div>
                {if $system.reCAPTCHA_enabled}
                <div class="form-group">
                    <!-- reCAPTCHA -->
                    <script src='https://www.google.com/recaptcha/api.js'></script>
                    <div class="g-recaptcha" data-sitekey="{$system.reCAPTCHA_site_key}"></div>
                    <!-- reCAPTCHA -->
                </div>
                {/if}
                <p class="text-muted">
                    {__("By clicking Sign Up, you agree to our")} <a href="{$system['system_url']}/static/terms">{__("Terms")}</a>
                </p>
                <button type="submit" class="btn btn-lg btn-success btn-block">{__("Sign Up")}</button>

                <!-- error -->
                <div class="alert alert-danger mb0 mt10 x-hidden" role="alert"></div>
                <!-- error -->
            </form>

        </div>

    </div>
</div>
<!-- page content -->

{include file='_footer.tpl'}