{if !$standalone}<li>{/if}
    <!-- post -->
    <div class="post" data-id="{$post['post_id']}">

        <!-- post body -->
        <div class="post-body">
            <!-- post header -->
            <div class="post-header">
                <!-- post picture -->
                <div class="post-avatar">
                    <a class="post-avatar-picture" href="{$post['post_author_url']}" style="background-image:url({$post['post_author_picture']});">
                    </a>
                </div>
                <!-- post picture -->

                <!-- post meta -->
                <div class="post-meta">
                    <!-- post author name & menu -->
                    <div>
                        {if $user->_logged_in}
                            <!-- post menu -->
                            <div class="pull-right flip dropdown">
                                <i class="fa fa-chevron-down dropdown-toggle" data-toggle="dropdown"></i>
                                <ul class="dropdown-menu post-dropdown-menu">
                                    <li>
                                        {if $post['i_save']}
                                            <a href="#" class="js_unsave-post">
                                                <div class="action no-desc">
                                                    <i class="fa fa-bookmark fa-fw"></i> <span>{__("Unsave Post")}</span>
                                                </div>
                                            </a>
                                        {else}
                                            <a href="#" class="js_save-post">
                                                <div class="action no-desc">
                                                    <i class="fa fa-bookmark fa-fw"></i> <span>{__("Save Post")}</span>
                                                </div>
                                            </a>
                                        {/if}
                                    </li>
                                    <li class="divider"></li>
                                    {if $post['manage_post']}
                                        <li>
                                            {if $post['pinned']}
                                                <a href="#" class="js_unpin-post">
                                                    <div class="action no-desc">
                                                        <i class="fa fa-thumb-tack fa-fw"></i> <span>{__("Unpin Post")}</span>
                                                    </div>
                                                </a>
                                            {else}
                                                <a href="#" class="js_pin-post">
                                                    <div class="action no-desc">
                                                        <i class="fa fa-thumb-tack fa-fw"></i> <span>{__("Pin Post")}</span>
                                                    </div>
                                                </a>
                                            {/if}
                                        </li>
                                        <li>
                                            <a href="#" class="js_edit-post">
                                                <div class="action no-desc">
                                                    <i class="fa fa-pencil fa-fw"></i> {__("Edit Post")}
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="js_delete-post">
                                                <div class="action no-desc">
                                                    <i class="fa fa-trash-o fa-fw"></i> {__("Delete Post")}
                                                </div>
                                            </a>
                                        </li>
                                    {else}
                                        {if $post['user_type'] == "user"}
                                            <li>
                                                <a href="#" class="js_hide-author" data-author-id="{$post['user_id']}" data-author-name="{$post['post_author_name']}">
                                                    <div class="action">
                                                        <i class="fa fa-minus-circle fa-fw"></i> {__("Unfollow")} {get_firstname($post['user_fullname'])}
                                                    </div>
                                                    <div class="action-desc">{__("Stop seeing posts but stay friends")}</div>
                                                </a>
                                            </li>
                                        {/if}
                                        <li>
                                            <a href="#" class="js_hide-post">
                                                <div class="action">
                                                    <i class="fa fa-eye-slash fa-fw"></i> {__("Hide this post")}
                                                </div>
                                                <div class="action-desc">{__("See fewer posts like this")}</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="js_report-post">
                                                <div class="action no-desc">
                                                    <i class="fa fa-flag fa-fw"></i> {__("Report post")}
                                                </div>
                                            </a>
                                        </li>
                                    {/if}
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{$system['system_url']}/posts/{$post['post_id']}" target="_blank">
                                            <div class="action no-desc">
                                                <i class="fa fa-link fa-fw"></i> {__("Open post in new tab")}
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- post menu -->
                        {/if}

                        <!-- post author name -->
                        <span class="js_user-popover" data-type="{$post['user_type']}" data-uid="{$post['user_id']}">
                            <a href="{$post['post_author_url']}">{$post['post_author_name']}</a>
                        </span>
                        {if $post['post_author_verified']}
                        <i data-toggle="tooltip" data-placement="top" title='{__("Verified profile")}' class="fa fa-check verified-badge"></i>
                        {/if}
                        <!-- post author name -->

                        <!-- post type meta -->
                        <span class="post-title">
                            {if $post['post_type'] == "shared"}
                                {__("shared")} 
                                <span class="js_user-popover" data-type="{$post['origin']['user_type']}" data-uid="{$post['origin']['user_id']}">
                                    <a href="{$post['origin']['post_author_url']}">
                                        {$post['origin']['post_author_name']}
                                    </a>{__("'s")}
                                </span> 
                                <a href="{$system['system_url']}/posts/{$post['origin']['post_id']}">
                                    {if $post['origin']['post_type'] == 'photos'}
                                        {if $post['origin']['photos_num'] > 1}{__("photos")}{else}{__("photo")}{/if}
                                    {elseif $post['origin']['post_type'] == 'media'}
                                        {if $post['origin']['media']['media_type'] != "soundcloud"}
                                            {__("video")}
                                        {else}
                                            {__("song")}
                                        {/if}
                                    {elseif $post['origin']['post_type'] == 'album'}
                                        {__("album")}
                                    {elseif $post['origin']['post_type'] == 'video'}
                                        {__("video")}
                                    {elseif $post['origin']['post_type'] == 'audio'}
                                        {__("audio")}
                                    {elseif $post['origin']['post_type'] == 'file'}
                                        {__("file")}
                                    {elseif $post['origin']['post_type'] == 'link'}
                                        {__("link")}
                                    {else}
                                        {__("post")}
                                    {/if}
                                </a>

                            {elseif $post['post_type'] == "link"}
                                {__("shared a link")}

                            {elseif $post['post_type'] == "album"}
                                {__("added")} {$post['photos_num']} {__("photos to the album")}: <a href="{$system['system_url']}/{$post['album']['path']}/album/{$post['album']['album_id']}">{$post['album']['title']}</a>

                            {elseif $post['post_type'] == "photos"}
                                {if $post['photos_num'] == 1}
                                    {__("added a photo")}
                                {else}
                                    {__("added")} {$post['photos_num']} {__("photos")}
                                {/if}

                            {elseif $post['post_type'] == "video"}
                                {__("added a video")}

                            {elseif $post['post_type'] == "audio"}
                                {__("added an audio")}

                            {elseif $post['post_type'] == "file"}
                                {__("added a file")}

                            {elseif $post['post_type'] == "profile_picture"}
                                {if $post['user_gender'] == "male"}
                                {__("updated his profile picture")}
                                {else}
                                {__("updated her profile picture")}
                                {/if}

                            {elseif $post['post_type'] == "profile_cover"}
                                {if $post['user_gender'] == "male"}
                                {__("updated his cover photo")}
                                {else}
                                {__("updated her cover photo")}
                                {/if}

                            {elseif $post['post_type'] == "page_picture"}
                                {__("updated page picture")}

                            {elseif $post['post_type'] == "page_cover"}
                                {__("updated cover photo")}

                            {elseif $post['post_type'] == "group_picture"}
                                {__("updated group picture")}

                            {elseif $post['post_type'] == "group_cover"}
                                {__("updated group cover")}
                                
                            {/if}

                            {if $_get != 'posts_group' && $post['in_group']}
                                <i class="fa fa-caret-right ml5 mr5"></i><a href="{$system['system_url']}/groups/{$post['group_name']}">{$post['group_title']}</a>

                            {elseif $post['in_wall']}
                                <i class="fa fa-caret-right ml5 mr5"></i>
                                <span class="js_user-popover" data-type="user" data-uid="{$post['wall_id']}">
                                    <a href="{$system['system_url']}/{$post['wall_username']}">{$post['wall_fullname']}</a>
                                </span>
                            {/if}
                        </span>
                        <!-- post type meta -->
                    </div>
                    <!-- post author name & menu -->

                    <!-- post time & location & privacy -->
                    <div class="post-time">
                        <a href="{$system['system_url']}/posts/{$post['post_id']}" class="js_moment" data-time="{$post['time']}">{$post['time']}</a>

                        {if $post['location']}
                        ·
                        <i class="fa fa-map-marker"></i> <span>{$post['location']}</span>
                        {/if}

                        - 
                        {if $post['manage_post'] && $post['user_type'] == 'user' && !$post['in_group']}
                            <!-- privacy -->
                            {if $post['privacy'] == "me"}
                                <div class="btn-group" data-toggle="tooltip" data-placement="top" data-value="me" title='{__("Shared with: Only Me")}'>
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        <i class="btn-group-icon fa fa-lock"></i> <span class="caret"></span>
                                    </button>
                            {elseif $post['privacy'] == "friends"}
                                <div class="btn-group" data-toggle="tooltip" data-placement="top" data-value="friends" title='{__("Shared with: Friends")}'>
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        <i class="btn-group-icon fa fa-users"></i> <span class="caret"></span>
                                    </button>
                            {elseif $post['privacy'] == "public"}
                                <div class="btn-group" data-toggle="tooltip" data-placement="top" data-value="public" title='{__("Shared with: Public")}'>
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        <i class="btn-group-icon fa fa-globe"></i> <span class="caret"></span>
                                    </button>
                            {/if}
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="#" class="js_edit-privacy" data-title='{__("Shared with: Public")}' data-value="public">
                                            <i class="fa fa-globe"></i> {__("Public")}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="js_edit-privacy" data-title='{__("Shared with: Friends")}' data-value="friends">
                                            <i class="fa fa-users"></i> {__("Friends")}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="js_edit-privacy" data-title='{__("Shared with: Only Me")}' data-value="me">
                                            <i class="fa fa-lock"></i> {__("Only Me")}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- privacy -->
                        {else}
                            {if $post['privacy'] == "me"}
                                <i class="fa fa-lock" data-toggle="tooltip" data-placement="top" title='{__("Shared with")} {__("Only Me")}'></i>
                            {elseif $post['privacy'] == "friends"}
                                <i class="fa fa-users" data-toggle="tooltip" data-placement="top" title='{__("Shared with")} {__("Friends")}'></i>
                            {elseif $post['privacy'] == "public"}
                                <i class="fa fa-globe" data-toggle="tooltip" data-placement="top" title='{__("Shared with")} {__("Public")}'></i>
                            {/if}
                        {/if}
                    </div>
                    <!-- post time & location & privacy -->
                </div>
                <!-- post meta -->
            </div>
            <!-- post header -->

            <!-- post text -->
            {include file='__feeds_post.text.tpl'}
            <!-- post text -->

            {if $post['post_type'] == "album" || $post['post_type'] == "photos" || $post['post_type'] == "profile_picture" || $post['post_type'] == "profile_cover" || $post['post_type'] == "page_picture" || $post['post_type'] == "page_cover" || $post['post_type'] == "group_picture" || $post['post_type'] == "group_cover"}
                <div class="mt10 clearfix">
                    <div class="pg_wrapper">
                        {if $post['photos_num'] == 1}
                            <div class="pg_1x">
                                <a href="{$system['system_url']}/photos/{$post['photos'][0]['photo_id']}" class="js_lightbox" data-id="{$post['photos'][0]['photo_id']}" data-image="{$system['system_uploads']}/{$post['photos'][0]['source']}" data-context="album">
                                    <img src="{$system['system_uploads']}/{$post['photos'][0]['source']}">
                                </a>
                            </div>
                        {elseif $post['photos_num'] == 2}
                            {foreach $post['photos'] as $photo}
                                <div class="pg_2x">
                                    <a href="{$system['system_url']}/photos/{$photo['photo_id']}" class="js_lightbox" data-id="{$photo['photo_id']}" data-image="{$system['system_uploads']}/{$photo['source']}" data-context="post" style="background-image:url('{$system['system_uploads']}/{$photo['source']}');"></a>
                                </div>
                            {/foreach}
                        {elseif $post['photos_num'] == 3}
                            <div class="pg_3x">
                                <div class="pg_2o3">
                                    <div class="pg_2o3_in">
                                        <a href="{$system['system_url']}/photos/{$post['photos'][0]['photo_id']}" class="js_lightbox" data-id="{$post['photos'][0]['photo_id']}" data-image="{$system['system_uploads']}/{$post['photos'][0]['source']}" data-context="post" style="background-image:url('{$system['system_uploads']}/{$post['photos'][0]['source']}');"></a>
                                    </div>
                                </div>
                                <div class="pg_1o3">
                                    <div class="pg_1o3_in">
                                        <a href="{$system['system_url']}/photos/{$post['photos'][1]['photo_id']}" class="js_lightbox" data-id="{$post['photos'][1]['photo_id']}" data-image="{$system['system_uploads']}/{$post['photos'][1]['source']}" data-context="post" style="background-image:url('{$system['system_uploads']}/{$post['photos'][1]['source']}');"></a>
                                    </div>
                                    <div class="pg_1o3_in">
                                        <a href="{$system['system_url']}/photos/{$post['photos'][2]['photo_id']}" class="js_lightbox" data-id="{$post['photos'][2]['photo_id']}" data-image="{$system['system_uploads']}/{$post['photos'][2]['source']}" data-context="post" style="background-image:url('{$system['system_uploads']}/{$post['photos'][2]['source']}');"></a>
                                    </div>
                                </div>
                            </div>
                        {else}
                            <div class="pg_4x">
                                <div class="pg_2o3">
                                    <div class="pg_2o3_in">
                                        <a href="{$system['system_url']}/photos/{$post['photos'][0]['photo_id']}" class="js_lightbox" data-id="{$post['photos'][0]['photo_id']}" data-image="{$system['system_uploads']}/{$post['photos'][0]['source']}" data-context="post" style="background-image:url('{$system['system_uploads']}/{$post['photos'][0]['source']}');"></a>
                                    </div>
                                </div>
                                <div class="pg_1o3">
                                    <div class="pg_1o3_in">
                                        <a href="{$system['system_url']}/photos/{$post['photos'][1]['photo_id']}" class="js_lightbox" data-id="{$post['photos'][1]['photo_id']}" data-image="{$system['system_uploads']}/{$post['photos'][1]['source']}" data-context="post" style="background-image:url('{$system['system_uploads']}/{$post['photos'][1]['source']}');"></a>
                                    </div>
                                    <div class="pg_1o3_in">
                                        <a href="{$system['system_url']}/photos/{$post['photos'][2]['photo_id']}" class="js_lightbox" data-id="{$post['photos'][2]['photo_id']}" data-image="{$system['system_uploads']}/{$post['photos'][2]['source']}" data-context="post" style="background-image:url('{$system['system_uploads']}/{$post['photos'][2]['source']}');"></a>
                                    </div>
                                    <div class="pg_1o3_in">
                                        <a href="{$system['system_url']}/photos/{$post['photos'][3]['photo_id']}" class="js_lightbox" data-id="{$post['photos'][3]['photo_id']}" data-image="{$system['system_uploads']}/{$post['photos'][3]['source']}" data-context="post" style="background-image:url('{$system['system_uploads']}/{$post['photos'][3]['source']}');">
                                            {if $post['photos_num'] > 4}
                                            <span class="more">+{$post['photos_num']-4}</span>
                                            {/if}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        {/if}
                    </div>
                </div>
            {elseif $post['post_type'] == "media" && $post['media']}
                <div class="mt10">
                    {if $post['media']['source_type'] == "photo"}
                        <div class="post-media">
                            <div class="post-media-image">
                                <div style="background-image:url('{$post['media']['source_url']}');"></div>
                            </div>
                            <div class="post-media-meta">
                                <div class="source"><a target="_blank" href="{$post['media']['source_url']}">{$post['media']['source_provider']}</a></div>
                            </div>
                        </div>
                    {else}
                        {if $post['media']['source_provider'] == "YouTube" || $post['media']['source_provider'] == "Vimeo" || $post['media']['source_provider'] == "SoundCloud" || $post['media']['source_provider'] == "Vine"}
                            <div class="post-media">
                                <div class="embed-responsive embed-responsive-16by9">
                                    {html_entity_decode($post['media']['source_html'], ENT_QUOTES)}
                                </div>
                            </div>
                            <div class="post-media-meta">
                                <a class="title mb5" href="{$post['media']['source_url']}" target="_blank">{$post['media']['source_title']}</a>
                                <div class="text mb5">{$post['media']['source_text']}</div>
                                <div class="source">{$post['media']['source_provider']}</div>
                            </div>
                        {else}
                            <div class="embed-ifram-wrapper">
                                {html_entity_decode($post['media']['source_html'], ENT_QUOTES)}
                            </div>
                        {/if}
                    {/if}
                </div>
            {elseif $post['post_type'] == "link" && $post['link']}
                <div class="mt10">
                    <div class="post-media">
                        {if $post['link']['source_thumbnail']}
                            <div class="post-media-image">
                                <div style="background-image:url('{$post['link']['source_thumbnail']}');"></div>
                            </div>
                        {/if}
                        <div class="post-media-meta">
                            <a class="title mb5" href="{$post['link']['source_url']}" target="_blank">{$post['link']['source_title']}</a>
                            <div class="text mb5">{$post['link']['source_text']}</div>
                            <div class="source">{$post['link']['source_host']|upper}</div>
                        </div>
                    </div>
                </div>
            {elseif $post['post_type'] == "video" && $post['video']}
                <div class="video-js-responsive-container vjs-hd">
                    <video class="video-js js_video-js vjs-big-play-centered" controls preload="auto" poster="">
                        <source src="{$system['system_uploads']}/{$post['video']['source']}" type="video/mp4">
                        <source src="{$system['system_uploads']}/{$post['video']['source']}" type="video/webm">
                        <p class="vjs-no-js">
                            {__("Your browser does not support HTML5 video")}
                        </p>
                    </video>
                </div>
            {elseif $post['post_type'] == "audio" && $post['audio']}
                <audio class="js_mediaelementplayer" controls>
                    <source src="{$system['system_uploads']}/{$post['audio']['source']}">
                    {__("Your browser does not support HTML5 audio")}
                </audio>
            {elseif $post['post_type'] == "file" && $post['file']}
                <div class="post-downloader">
                    <div class="icon">
                        <i class="fa fa-file-text-o fa-2x"></i>
                    </div>
                    <div class="info">
                        <strong>{__("File Type")}</strong>: {get_extension({$post['file']['source']})}
                        <div class="mt10">
                            <a class="btn btn-primary btn-sm" href="{$system['system_uploads']}/{$post['file']['source']}">{__("Download")}</a>
                        </div>
                        
                    </div>
                </div>
            {elseif $post['post_type'] == "shared" && $post['origin']}
                {if $_snippet}
                <span class="text-link js_show-attachments">{__("Show Attachments")}</span>
                {/if}
                <div class="mt10 {if $_snippet}x-hidden{/if}">
                    <div class="post-media">
                        <div class="post-media-meta">
                            {include file='__feeds_post_shared.tpl' origin=$post['origin']}
                        </div>
                    </div>
                </div>
            {elseif $post['post_type'] == "map"}
                <div class="post-map">
                    <img src="https://maps.googleapis.com/maps/api/staticmap?center={$post['location']}&amp;zoom=13&amp;size=600x250&amp;maptype=roadmap&amp;markers=color:red%7C{$post['location']}&amp;key={$system['geolocation_key']}" width="100%">
                </div>
            {/if}

            <!-- post actions & stats -->
            <div class="post-actions">
                <!-- post actions -->
                {if $post['i_like']}
                    <span class="text-link js_unlike-post">{__("Unlike")}</span> - 
                {else}
                    <span class="text-link js_like-post">{__("Like")}</span> - 
                {/if}
                <span class="text-link js_comment">{__("Comment")}</span>
                {if $post['privacy'] == "public"}
                     - 
                    <span class="text-link js_share">{__("Share")}</span>
                {/if}
                <!-- post actions -->

                <!-- post stats -->
                <span class="post-stats-alt {if $post['likes']==0 && $post['comments']==0 && $post['shares']==0}x-hidden{/if}">
                    <i class="fa fa-thumbs-o-up"></i> <span class="js_post-likes-num">{$post['likes']}</span> 
                    <i class="fa fa-comments"></i> <span class="js_post-comments-num">{$post['comments']}</span> 
                    <i class="fa fa-share"></i> <span class="js_post-shares-num">{$post['shares']}</span>
                </span>
                <!-- post stats -->
            </div>
            <!-- post actions & stats -->
        </div>
        <!-- post body -->

        <!-- post footer -->
        <div class="post-footer {if $post['likes'] == 0 && $post['comments'] == 0 && $post['shares'] == 0}x-hidden{/if}">

            <!-- post stats (likes & shares) -->
            <div class="post-stats clearfix {if $post['likes'] == 0 && $post['shares'] == 0}x-hidden{/if}">
                <!-- shares -->
                <div class="pull-right flip js_post-shares {if $post['shares'] == 0}x-hidden{/if}">
                    <i class="fa fa-share"></i> 
                    <span class="text-link" data-toggle="modal" data-url="posts/who_shares.php?post_id={$post['post_id']}">
                        {$post['shares']}{__("shares")}
                    </span>
                </div>
                <!-- shares -->

                <!-- likes -->
                <span class="js_post-likes {if {$post['likes']} == 0}x-hidden{/if}">
                    <i class="fa fa-thumbs-o-up"></i> <span class="text-link" data-toggle="modal" data-url="posts/who_likes.php?post_id={$post['post_id']}"><span class="js_post-likes-num">{$post['likes']}</span> {__("people")}</span> {__("like this")}
                </span>
                <!-- likes -->
            </div>
            <!-- post stats (likes & shares) -->

            <!-- comments -->
            {include file='__feeds_post.comments.tpl'}
            <!-- comments -->
        </div>
        <!-- post footer -->

    </div>
    <!-- post -->
{if !$standalone}</li>{/if}