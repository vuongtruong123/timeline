{include file='_head.tpl'}
{include file='_header.tpl'}

<!-- page content -->
<div class="container">

    <!-- profile-header -->
    <div class="profile-header">
        <!-- profile-cover -->
        <div {if $spage['page_cover_id']} class="profile-cover-wrapper js_lightbox" data-id="{$spage['page_cover_id']}" data-image="{$system['system_uploads']}/{$spage['page_cover']}" data-context="album" {else} class="profile-cover-wrapper" {/if}  {if $spage['page_cover']} style="background-image:url('{$system['system_uploads']}/{$spage['page_cover']}');" {/if}>
            {if $user->_logged_in && $user->_data['user_id'] == $spage['page_admin']}
                <div class="profile-cover-change">
                    <i class="fa fa-camera js_x-uploader" data-handle="cover-page" data-id="{$spage['page_id']}"></i>
                </div>
                <div class="profile-cover-delete {if !$spage['page_cover']}x-hidden{/if}">
                    <i class="fa fa-trash js_delete-cover" data-handle="cover-page" data-id="{$spage['page_id']}" title='{__("Delete Cover")}'></i>
                </div>
                <div class="profile-cover-change-loader">
                    <div class="loader loader_large"></div>
                </div>
            {/if}
        </div>
        <!-- profile-cover -->

        <!-- profile-avatar -->
        <div class="profile-avatar-wrapper">
            <img {if $spage['page_picture_id']} class="js_lightbox" data-id="{$spage['page_picture_id']}" data-image="{$spage['page_picture']}" data-context="album" {/if} src="{$spage['page_picture']}" alt="{$spage['page_title']}">
            {if $user->_logged_in && $user->_data['user_id'] == $spage['page_admin']}
                <div class="profile-avatar-change">
                    <i class="fa fa-camera js_x-uploader" data-handle="picture-page" data-id="{$spage['page_id']}"></i>
                </div>
                <div class="profile-avatar-delete {if $spage['page_picture_default']}x-hidden{/if}">
                    <i class="fa fa-trash js_delete-picture" data-handle="picture-page" data-id="{$spage['page_id']}" title='{__("Delete Picture")}'></i>
                </div>
                <div class="profile-avatar-change-loader">
                    <div class="loader loader_medium"></div>
                </div>
            {/if}
        </div>
        <!-- profile-avatar -->

        <!-- profile-name -->
        <div class="profile-name-wrapper">
            <a href="{$system['system_url']}/pages/{$spage['page_name']}">{$spage['page_title']}</a>
            {if $spage['page_verified']}
                <i data-toggle="tooltip" data-placement="top" title='{__("Verified page")}' class="fa fa-check verified-badge"></i>
            {/if}
        </div>
        <!-- profile-name -->

        <!-- profile-buttons -->
        <div class="profile-buttons-wrapper">
            {if $user->_logged_in && $spage['i_like']}
                <button type="button" class="btn btn-default js_unlike-page" data-id="{$spage['page_id']}">
                    <i class="fa fa-thumbs-o-up"></i>
                    {__("Unlike")}
                </button>
            {else}
                <button type="button" class="btn btn-primary js_like-page" data-id="{$spage['page_id']}">
                    <i class="fa fa-thumbs-o-up"></i>
                    {__("Like")}
                </button>
            {/if}
            {if $user->_logged_in && $user->_data['user_id'] == $spage['page_admin']}
                <a href="{$system['system_url']}/pages/{$spage['page_name']}/settings" class="btn btn-default">
                    <i class="fa fa-pencil"></i> {__("Update Info")}
                </a>
            {else}
                <button class="btn btn-default js_report-page" data-id="{$spage['page_id']}">
                    <i class="fa fa-flag"></i> {__("Report")}
                </button>
            {/if}
        </div>
        <!-- profile-buttons -->

        <!-- profile-tabs -->
        <div class="profile-tabs-wrapper">
            <ul class="nav">
                <li>
                    <a href="{$system['system_url']}/pages/{$spage['page_name']}">
                        {__("Timeline")}
                    </a>
                </li>
                <li>
                    <a href="{$system['system_url']}/pages/{$spage['page_name']}/photos">
                        {__("Photos")} 
                    </a>
                </li>
            </ul>
        </div>
        <!-- profile-tabs -->
    </div>
    <!-- profile-header -->


    <!-- profile-content -->
    <div class="row">

        <!-- profile-buttons alt -->
        <div class="col-sm-12">
            <div class="panel panel-default profile-buttons-wrapper-alt">
                <div class="panel-body">
                    {if $user->_logged_in && $spage['i_like']}
                        <button type="button" class="btn btn-default js_ullike-page" data-pid="{$spage['page_id']}">
                            <i class="fa fa-thumbs-o-up"></i>
                            {__("Unlike")}
                        </button>
                    {else}
                        <button type="button" class="btn btn-primary js_like-page" data-pid="{$spage['page_id']}">
                            <i class="fa fa-thumbs-o-up"></i>
                            {__("Like")}
                        </button>
                    {/if}
                    {if $user->_logged_in && $user->_data['user_id'] == $spage['page_admin']}
                        <a href="{$system['system_url']}/pages/{$spage['page_name']}/settings" class="btn btn-default">
                            <i class="fa fa-pencil"></i> {__("Update Info")}
                        </a>
                    {else}
                        <button class="btn btn-default js_report-page" data-id="{$spage['page_id']}">
                            <i class="fa fa-flag"></i> {__("Report")}
                        </button>
                    {/if}
                </div>
            </div>
        </div>
        <!-- profile-buttons alt -->

        <!-- view content -->
        {if $view == ""}
            <div class="col-sm-4">
                <!-- about -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="about-list">
                            <!-- likes -->
                            <li>
                                <div class="about-list-item">
                                    <i class="fa fa-thumbs-o-up fa-fw fa-lg"></i>
                                    {$spage['page_likes']} {__("people like this")}
                                </div>
                            </li>
                            <!-- likes -->
                            <!-- category -->
                            <li>
                                <div class="about-list-item">
                                    <i class="fa fa-briefcase fa-fw fa-lg"></i>
                                    {$spage['category_name']}
                                </div>
                            </li>
                            <!-- category -->
                            <!-- description -->
                            {if $spage['page_description']}
                                <li>
                                    <div class="about-list-item">
                                        <i class="fa fa-info-circle fa-fw fa-lg"></i>
                                        {$spage['page_description']}
                                    </div>
                                </li>
                            {/if}
                            <!-- description -->
                        </ul>
                    </div>
                </div>
                <!-- about -->

                <!-- photos -->
                {if count($spage['photos']) > 0}
                    <div class="panel panel-default panel-photos">
                        <div class="panel-heading">
                            <a href="{$system['system_url']}/pages/{$spage['page_name']}/photos">{__("Photos")}</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                {foreach $spage['photos'] as $photo}
                                    {include file='__feeds_photo.tpl' _context="photos" _small=true}
                                {/foreach}
                            </div>
                        </div>
                    </div>
                {/if}
                <!-- photos -->
            </div>
            <div class="col-sm-8">
                <!-- publisher -->
                {if $user->_logged_in && $user->_data['user_id'] == $spage['page_admin']}
                    {include file='_publisher.tpl' _handle="page" _id=$spage['page_id']}
                {/if}
                <!-- publisher -->

                <!-- pinned post -->
                {if $pinned_post}
                    {include file='_pinned_post.tpl' post=$pinned_post}
                {/if}
                <!-- pinned post -->
                
                <!-- posts -->
                {include file='_posts.tpl' _get="posts_page" _id=$spage['page_id']}
                <!-- posts -->
            </div>
        {elseif $view == "photos"}
            <!-- photos -->
            <div class="col-xs-12">
                <div class="panel panel-default panel-photos">
                    <div class="panel-heading with-icon with-nav">
                        <!-- panel title -->
                        <div class="mb20">
                            <i class="fa fa-picture-o pr5 panel-icon"></i>
                            <strong>{__("Photos")}</strong>
                        </div>
                        <!-- panel title -->

                        <!-- panel nav -->
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="{$system['system_url']}/pages/{$spage['page_name']}/photos">
                                    <strong class="pr5">{__("Photos")}</strong>
                                </a>
                            </li>
                            <li>
                                <a href="{$system['system_url']}/pages/{$spage['page_name']}/albums">{__("Albums")}</a>
                            </li>
                        </ul>
                        <!-- panel nav -->
                    </div>
                    <div class="panel-body">
                        {if count($spage['photos']) > 0}
                            <ul class="row">
                                {foreach $spage['photos'] as $photo}
                                    {include file='__feeds_photo.tpl' _context="photos"}
                                {/foreach}
                            </ul>
                            {if count($spage['photos']) >= $system['min_results_even']}
                                <!-- see-more -->
                                <div class="alert alert-info see-more js_see-more" data-get="photos" data-id="{$spage['page_id']}" data-type='page'>
                                    <span>{__("See More")}</span>
                                    <div class="loader loader_small x-hidden"></div>
                                </div>
                                <!-- see-more -->
                            {/if}
                        {else}
                            <p class="text-center text-muted mt10">
                                {$spage['page_title']} {__("doesn't have photos")}
                            </p>
                        {/if}
                    </div>
                </div>
            </div>
            <!-- photos -->
        {elseif $view == "albums"}
            <!-- albums -->
            <div class="col-xs-12">
                <div class="panel panel-default panel-albums">
                    <div class="panel-heading with-icon with-nav">
                        <!-- panel title -->
                        <div class="mb20">
                            <i class="fa fa-picture-o pr5 panel-icon"></i>
                            <strong>{__("Photos")}</strong>
                        </div>
                        <!-- panel title -->

                        <!-- panel nav -->
                        <ul class="nav nav-tabs">
                            <li>
                                <a href="{$system['system_url']}/pages/{$spage['page_name']}/photos">{__("Photos")}</a>
                            </li>
                            <li class="active">
                                <a href="{$system['system_url']}/pages/{$spage['page_name']}/albums">
                                    <strong class="pr5">{__("Albums")}</strong>
                                </a>
                            </li>
                        </ul>
                        <!-- panel nav -->
                    </div>
                    <div class="panel-body">
                        {if count($spage['albums']) > 0}
                            <ul class="row">
                                {foreach $spage['albums'] as $album}
                                {include file='__feeds_album.tpl'}
                                {/foreach}
                            </ul>
                            {if count($spage['albums']) >= $system['max_results_even']}
                                <!-- see-more -->
                                <div class="alert alert-info see-more js_see-more" data-get="albums" data-id="{$spage['page_id']}" data-type='page'>
                                    <span>{__("See More")}</span>
                                    <div class="loader loader_small x-hidden"></div>
                                </div>
                                <!-- see-more -->
                            {/if}
                        {else}
                            <p class="text-center text-muted mt10">
                                {$spage['page_title']} {__("doesn't have albums")}
                            </p>
                        {/if}
                    </div>
                </div>
            </div>
            <!-- albums -->
        {elseif $view == "album"}
            <!-- albums -->
            <div class="col-xs-12">
                <div class="panel panel-default panel-albums">
                    <div class="panel-heading with-icon with-nav">
                        <!-- back to albums -->
                        <div class="pull-right flip">
                            <a href="{$system['system_url']}/pages/{$spage['page_name']}/albums" class="btn btn-default btn-sm">
                                {__("Back to Albums")}
                            </a>
                        </div>
                        <!-- back to albums -->
                        
                        <!-- panel title -->
                        <div class="mb20">
                            <i class="fa fa-picture-o pr5 panel-icon"></i>
                            <strong>{__("Photos")}</strong>
                        </div>
                        <!-- panel title -->

                        <!-- panel nav -->
                        <ul class="nav nav-tabs">
                            <li>
                                <a href="{$system['system_url']}/pages/{$spage['page_name']}/photos">{__("Photos")}</a>
                            </li>
                            <li class="active">
                                <a href="{$system['system_url']}/pages/{$spage['page_name']}/albums">
                                    <strong class="pr5">{__("Albums")}</strong>
                                </a>
                            </li>
                        </ul>
                        <!-- panel nav -->
                    </div>
                    <div class="panel-body">
                    {include file='_album.tpl'}
                    </div>
                </div>
            </div>
            <!-- albums -->
        {elseif $view == "settings"}
            <div class="col-md-3 col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-body with-nav">
                        <ul class="nav">
                            <li class="active">
                                <a href="{$system['system_url']}/pages/{$spage['page_name']}/settings"><i class="fa fa-wrench fa-fw fa-lg pr10"></i> {__("Page Settings")}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9">
                <!-- edit page -->
                <div class="panel panel-default">
                    <div class="panel-heading with-icon">
                        <!-- delete -->
                        <div class="pull-right flip">
                            <button type="button" class="btn btn-danger js_delete-page" data-id="{$spage['page_id']}">
                                <i class="fa fa-trash-o"></i>
                                {__("Delete Page")}
                            </button>
                        </div>
                        <!-- delete -->
                        <!-- panel title -->
                        <i class="fa fa-wrench pr5 panel-icon"></i>
                        <strong>{__("Page Settings")}</strong>
                        <!-- panel title -->
                    </div>
                    <div class="panel-body">
                        <form class="js_ajax-forms" data-url="data/create.php?type=page&amp;do=edit&amp;id={$spage['page_id']}">
                            <div class="form-group">
                                <label for="category">{__("Category")}:</label>
                                <select class="form-control" name="category" id="category">
                                    {foreach $categories as $category}
                                        <option {if $spage['page_category'] == $category['category_id']}selected{/if} value="{$category['category_id']}">{$category['category_name']}</option>
                                    {/foreach}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">{__("Title")}:</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder='{__("Title of your page")}' value="{$spage['page_title']}">
                            </div>
                            <div class="form-group">
                                <label for="username">{__("Username")}:</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder='{__("Username, e.g. YouTubeOfficial")}' value="{$spage['page_name']}">
                            </div>
                            <div class="form-group">
                                <label for="description">{__("Description")}:</label>
                                <textarea class="form-control" name="description" id="description" placeholder='{__("Write about your page...")}'>{$spage['page_description']}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">{__("Save")}</button>

                            <!-- error -->
                            <div class="alert alert-danger mb0 mt10 x-hidden" role="alert"></div>
                            <!-- error -->
                        </form>
                    </div>
                </div>
                <!-- edit page -->
            </div>
        {/if}
        <!-- view content -->

    </div>
    <!-- profile-content -->

</div>
<!-- page content -->

{include file='_footer.tpl'}