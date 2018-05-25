<div class="panel panel-default">
    <div class="panel-heading with-icon">
        <i class="fa fa-paint-brush pr5 panel-icon"></i>
        <strong>{__("Design")}</strong>
    </div>
    <div class="panel-body">

        <!-- Design -->
        <form class="js_ajax-forms form-horizontal" data-url="admin/design.php">
            <div class="form-group">
                <label class="col-sm-3 control-label text-left">
                    {__("Website Logo")}
                </label>
                <div class="col-sm-9">
                    {if $system['system_logo'] == ''}
                        <div class="x-image">
                            <button type="button" class="close x-hidden js_x-image-remover" title='{__("Remove")}'>
                                <span>×</span>
                            </button>
                            <div class="loader loader_small x-hidden"></div>
                            <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                            <input type="hidden" class="js_x-image-input" name="system_logo" value="">
                        </div>
                    {else}
                        <div class="x-image" style="background-image: url('{$system['system_uploads']}/{$system['system_logo']}')">
                            <button type="button" class="close js_x-image-remover" title='{__("Remove")}'>
                                <span>×</span>
                            </button>
                            <div class="loader loader_small x-hidden"></div>
                            <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                            <input type="hidden" class="js_x-image-input" name="system_logo" value="{$system['system_logo']}">
                        </div>
                    {/if}
                    <span class="help-block">
                        {__("The perfect size for your logo should be (wdith: 60px & height: 46px)")}
                    </span>
                </div>
            </div>

            <div class="divider"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label text-left">
                    {__("Website Favicon")}
                </label>
                <div class="col-sm-9">
                    <div>
                        <div class="onoffswitch">
                            <input type="checkbox" name="system_favicon_default" class="onoffswitch-checkbox" id="system_favicon_default" {if $system['system_favicon_default']}checked{/if}>
                            <label class="onoffswitch-label" for="system_favicon_default"></label>
                        </div>
                        <span class="help-block">
                            {__("Use the default")} (<a target="_blank" href="{$system['system_url']}/content/themes/{$system['theme']}/images/favicon.png">{__("preview")}</a>)
                        </span>
                    </div>
                    {if $system['system_favicon'] == ''}
                        <div class="x-image">
                            <button type="button" class="close x-hidden js_x-image-remover" title='{__("Remove")}'>
                                <span>×</span>
                            </button>
                            <div class="loader loader_small x-hidden"></div>
                            <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                            <input type="hidden" class="js_x-image-input" name="system_favicon" value="">
                        </div>
                    {else}
                        <div class="x-image" style="background-image: url('{$system['system_uploads']}/{$system['system_favicon']}')">
                            <button type="button" class="close js_x-image-remover" title='{__("Remove")}'>
                                <span>×</span>
                            </button>
                            <div class="loader loader_small x-hidden"></div>
                            <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                            <input type="hidden" class="js_x-image-input" name="system_favicon" value="{$system['system_favicon']}">
                        </div>
                    {/if}
                    <span class="help-block">
                        {__("The perfect size for your favicon should be (wdith: 196px & height: 196px)")}
                    </span>
                </div>
            </div>

            <div class="divider"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label text-left">
                    {__("Website OG-Image")}
                </label>
                <div class="col-sm-9">
                    <div>
                        <div class="onoffswitch">
                            <input type="checkbox" name="system_ogimage_default" class="onoffswitch-checkbox" id="system_ogimage_default" {if $system['system_ogimage_default']}checked{/if}>
                            <label class="onoffswitch-label" for="system_ogimage_default"></label>
                        </div>
                        <span class="help-block">
                            {__("Use the default")} (<a target="_blank" href="{$system['system_url']}/content/themes/{$system['theme']}/images/og-image.jpg">{__("preview")}</a>)
                        </span>
                    </div>
                    {if $system['system_ogimage'] == ''}
                        <div class="x-image">
                            <button type="button" class="close x-hidden js_x-image-remover" title='{__("Remove")}'>
                                <span>×</span>
                            </button>
                            <div class="loader loader_small x-hidden"></div>
                            <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                            <input type="hidden" class="js_x-image-input" name="system_ogimage" value="">
                        </div>
                    {else}
                        <div class="x-image" style="background-image: url('{$system['system_uploads']}/{$system['system_ogimage']}')">
                            <button type="button" class="close js_x-image-remover" title='{__("Remove")}'>
                                <span>×</span>
                            </button>
                            <div class="loader loader_small x-hidden"></div>
                            <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                            <input type="hidden" class="js_x-image-input" name="system_ogimage" value="{$system['system_ogimage']}">
                        </div>
                    {/if}
                    <span class="help-block">
                        {__("The perfect size for your og-image should be (wdith: 590px & height: 300px)")}
                    </span>
                </div>
            </div>

            <div class="divider"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label text-left">
                    {__("Enable Customization")}
                </label>
                <div class="col-sm-9">
                    <div class="onoffswitch">
                        <input type="checkbox" name="css_customized" class="onoffswitch-checkbox" id="css_customized" {if $system['css_customized']}checked{/if}>
                        <label class="onoffswitch-label" for="css_customized"></label>
                    </div>
                    <span class="help-block">
                        {__("Turn the customization On and Off")}
                    </span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">
                {__("Background Color")}
                </label>
                <div class="col-sm-9">
                    <div class="input-group colorpicker-component js_colorpicker">
                        <input type="text" class="form-control" name="css_background" value="{$system['css_background']}" />
                        <span class="input-group-addon"><i></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">
                {__("Link Color")}
                </label>
                <div class="col-sm-9">
                    <div class="input-group colorpicker-component js_colorpicker">
                        <input type="text" class="form-control" name="css_link_color" value="{$system['css_link_color']}" />
                        <span class="input-group-addon"><i></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">
                {__("Header Color")}
                </label>
                <div class="col-sm-9">
                    <div class="input-group colorpicker-component js_colorpicker">
                        <input type="text" class="form-control" name="css_header" value="{$system['css_header']}" />
                        <span class="input-group-addon"><i></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">
                {__("Header Search Background")}
                </label>
                <div class="col-sm-9">
                    <div class="input-group colorpicker-component js_colorpicker">
                        <input type="text" class="form-control" name="css_header_search" value="{$system['css_header_search']}" />
                        <span class="input-group-addon"><i></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">
                {__("Header Search Font")}
                </label>
                <div class="col-sm-9">
                    <div class="input-group colorpicker-component js_colorpicker">
                        <input type="text" class="form-control" name="css_header_search_color" value="{$system['css_header_search_color']}" />
                        <span class="input-group-addon"><i></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">
                {__("Button Primary")}
                </label>
                <div class="col-sm-9">
                    <div class="input-group colorpicker-component js_colorpicker">
                        <input type="text" class="form-control" name="css_btn_primary" value="{$system['css_btn_primary']}" />
                        <span class="input-group-addon"><i></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">
                {__("Menu Background")}
                </label>
                <div class="col-sm-9">
                    <div class="input-group colorpicker-component js_colorpicker">
                        <input type="text" class="form-control" name="css_menu_background" value="{$system['css_menu_background']}" />
                        <span class="input-group-addon"><i></i></span>
                    </div>
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
        <!-- Design -->
    </div>
</div>