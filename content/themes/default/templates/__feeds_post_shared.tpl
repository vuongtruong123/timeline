<!-- post header -->
<div class="post-header">
    <!-- post picture -->
    <div class="post-avatar">
        <a class="post-avatar-picture" href="{$origin['post_author_url']}" style="background-image:url({$origin['post_author_picture']});">
        </a>
    </div>
    <!-- post picture -->

    <!-- post meta -->
    <div class="post-meta">
        <!-- post author name -->
        <div>
            <!-- post author name -->
            <span class="js_user-popover" data-type="{$origin['user_type']}" data-uid="{$origin['user_id']}">
                <a href="{$origin['post_author_url']}">{$origin['post_author_name']}</a>
            </span>
            {if $origin['post_author_verified']}
            <i data-toggle="tooltip" data-placement="top" title='{__("Verified profile")}' class="fa fa-check verified-badge"></i>
            {/if}
            <!-- post author name -->

            <!-- post type meta -->
            <span class="post-title">
                {if $origin['post_type'] == "link"}
                    {__("shared a link")}

                {elseif $origin['post_type'] == "album"}
                    {__("added")} {$origin['photos_num']} {__("photos to the album")}: <a href="{$system['system_url']}/{$origin['album']['path']}/album/{$origin['album']['album_id']}">{$origin['album']['title']}</a>

                {elseif $origin['post_type'] == "photos"}
                    {if $origin['photos_num'] == 1}
                        {__("added a photo")}
                    {else}
                        {__("added")} {$origin['photos_num']} {__("photos")}
                    {/if}

                {elseif $origin['post_type'] == "video"}
                    {__("added a video")}

                {elseif $origin['post_type'] == "audio"}
                    {__("added an audio")}

                {elseif $origin['post_type'] == "file"}
                    {__("added a file")}

                {elseif $origin['post_type'] == "profile_picture"}
                    {if $origin['user_gender'] == "male"}
                    {__("updated his profile picture")}
                    {else}
                    {__("updated her profile picture")}
                    {/if}

                {elseif $origin['post_type'] == "profile_cover"}
                    {if $origin['user_gender'] == "male"}
                    {__("updated his cover photo")}
                    {else}
                    {__("updated her cover photo")}
                    {/if}

                {elseif $origin['post_type'] == "page_picture"}
                    {__("updated page picture")}

                {elseif $origin['post_type'] == "page_cover"}
                    {__("updated cover photo")}

                {elseif $origin['post_type'] == "group_picture"}
                    {__("updated group picture")}

                {elseif $origin['post_type'] == "group_cover"}
                    {__("updated group cover")}
                    
                {/if}

                {if $_get != 'posts_group' && $origin['in_group']}
                    <i class="fa fa-caret-right ml5 mr5"></i><a href="{$system['system_url']}/groups/{$origin['group_name']}">{$origin['group_title']}</a>

                {elseif $origin['in_wall']}
                    <i class="fa fa-caret-right ml5 mr5"></i>
                    <span class="js_user-popover" data-type="user" data-uid="{$origin['wall_id']}">
                        <a href="{$system['system_url']}/{$origin['wall_username']}">{$origin['wall_fullname']}</a>
                    </span>
                {/if}

                
            </span>
            <!-- post type meta -->
        </div>
        <!-- post author name -->

        <!-- post time & location & privacy -->
        <div class="post-time">
            <a href="{$system['system_url']}/posts/{$origin['post_id']}" class="js_moment" data-time="{$origin['time']}">{$origin['time']}</a>

            {if $origin['location']}
            ·
            <i class="fa fa-map-marker"></i> <span>{$origin['location']}</span>
            {/if}

            - 
            {if $origin['privacy'] == "friends"}
            <i class="fa fa-users" data-toggle="tooltip" data-placement="top" title='{__("Shared with")} {__("Friends")}'></i>
            {else}
            <i class="fa fa-globe" data-toggle="tooltip" data-placement="top" title='{__("Shared with")} {__("Public")}'></i>
            {/if}
        </div>
        <!-- post time & location & privacy -->
    </div>
    <!-- post meta -->
</div>
<!-- post header -->

<!-- post text -->
<div class="post-text text-muted">{$origin['text']}</div>
<!-- post text -->

{if $origin['post_type'] == "album" || $origin['post_type'] == "photos" || $origin['post_type'] == "profile_picture" || $origin['post_type'] == "profile_cover" || $origin['post_type'] == "page_picture" || $origin['post_type'] == "page_cover" || $origin['post_type'] == "group_picture" || $origin['post_type'] == "group_cover"}
    <div class="mt10 clearfix">
        <div class="pg_wrapper">
            {if $origin['photos_num'] == 1}
            <div class="pg_1x">
                <a href="{$system['system_url']}/photos/{$origin['photos'][0]['photo_id']}" class="js_lightbox" data-id="{$origin['photos'][0]['photo_id']}" data-image="{$system['system_uploads']}/{$origin['photos'][0]['source']}" data-context="album">
                    <img src="{$system['system_uploads']}/{$origin['photos'][0]['source']}">
                </a>
            </div>
            {elseif $origin['photos_num'] == 2}
            {foreach $origin['photos'] as $photo}
            <div class="pg_2x">
                <a href="{$system['system_url']}/photos/{$photo['photo_id']}" class="js_lightbox" data-id="{$photo['photo_id']}" data-image="{$system['system_uploads']}/{$photo['source']}" data-context="post" style="background-image:url('{$system['system_uploads']}/{$photo['source']}');"></a>
            </div>
            {/foreach}
            {elseif $origin['photos_num'] == 3}
            <div class="pg_3x">
                <div class="pg_2o3">
                    <div class="pg_2o3_in">
                        <a href="{$system['system_url']}/photos/{$origin['photos'][0]['photo_id']}" class="js_lightbox" data-id="{$origin['photos'][0]['photo_id']}" data-image="{$system['system_uploads']}/{$origin['photos'][0]['source']}" data-context="post" style="background-image:url('{$system['system_uploads']}/{$origin['photos'][0]['source']}');"></a>
                    </div>
                </div>
                <div class="pg_1o3">
                    <div class="pg_1o3_in">
                        <a href="{$system['system_url']}/photos/{$origin['photos'][1]['photo_id']}" class="js_lightbox" data-id="{$origin['photos'][1]['photo_id']}" data-image="{$system['system_uploads']}/{$origin['photos'][1]['source']}" data-context="post" style="background-image:url('{$system['system_uploads']}/{$origin['photos'][1]['source']}');"></a>
                    </div>
                    <div class="pg_1o3_in">
                        <a href="{$system['system_url']}/photos/{$origin['photos'][2]['photo_id']}" class="js_lightbox" data-id="{$origin['photos'][2]['photo_id']}" data-image="{$system['system_uploads']}/{$origin['photos'][2]['source']}" data-context="post" style="background-image:url('{$system['system_uploads']}/{$origin['photos'][2]['source']}');"></a>
                    </div>
                </div>
            </div>
            {else}
            <div class="pg_4x">
                <div class="pg_2o3">
                    <div class="pg_2o3_in">
                        <a href="{$system['system_url']}/photos/{$origin['photos'][0]['photo_id']}" class="js_lightbox" data-id="{$origin['photos'][0]['photo_id']}" data-image="{$system['system_uploads']}/{$origin['photos'][0]['source']}" data-context="post" style="background-image:url('{$system['system_uploads']}/{$origin['photos'][0]['source']}');"></a>
                    </div>
                </div>
                <div class="pg_1o3">
                    <div class="pg_1o3_in">
                        <a href="{$system['system_url']}/photos/{$origin['photos'][1]['photo_id']}" class="js_lightbox" data-id="{$origin['photos'][1]['photo_id']}" data-image="{$system['system_uploads']}/{$origin['photos'][1]['source']}" data-context="post" style="background-image:url('{$system['system_uploads']}/{$origin['photos'][1]['source']}');"></a>
                    </div>
                    <div class="pg_1o3_in">
                        <a href="{$system['system_url']}/photos/{$origin['photos'][2]['photo_id']}" class="js_lightbox" data-id="{$origin['photos'][2]['photo_id']}" data-image="{$system['system_uploads']}/{$origin['photos'][2]['source']}" data-context="post" style="background-image:url('{$system['system_uploads']}/{$origin['photos'][2]['source']}');"></a>
                    </div>
                    <div class="pg_1o3_in">
                        <a href="{$system['system_url']}/photos/{$origin['photos'][3]['photo_id']}" class="js_lightbox" data-id="{$origin['photos'][3]['photo_id']}" data-image="{$system['system_uploads']}/{$origin['photos'][3]['source']}" data-context="post" style="background-image:url('{$system['system_uploads']}/{$origin['photos'][3]['source']}');">
                            {if $origin['photos_num'] > 4}
                            <span class="more">+{$origin['photos_num']-4}</span>
                            {/if}
                        </a>
                    </div>
                </div>
            </div>
            {/if}
        </div>
    </div>
{elseif $origin['post_type'] == "media" && $origin['media']}
    <div class="mt10">
        {if $origin['media']['source_type'] == "photo"}
        <div class="post-media">
            <div class="post-media-image">
                <div style="background-image:url('{$origin['media']['source_url']}');"></div>
            </div>
            <div class="post-media-meta">
                <div class="source"><a target="_blank" href="{$origin['media']['source_url']}">{$origin['media']['source_provider']}</a></div>
            </div>
        </div>
        {else}
        {if $origin['media']['source_provider'] == "YouTube" || $origin['media']['source_provider'] == "Vimeo" || $origin['media']['source_provider'] == "SoundCloud" || $origin['media']['source_provider'] == "Vine"}
        <div class="post-media">
            <div class="embed-responsive embed-responsive-16by9">
                {html_entity_decode($origin['media']['source_html'], ENT_QUOTES)}
            </div>
        </div>
        <div class="post-media-meta">
            <a class="title mb5" href="{$origin['media']['source_url']}" target="_blank">{$origin['media']['source_title']}</a>
            <div class="text mb5">{$origin['media']['source_text']}</div>
            <div class="source">{$origin['media']['source_provider']}</div>
        </div>
        {else}
        <div class="embed-ifram-wrapper">
            {html_entity_decode($origin['media']['source_html'], ENT_QUOTES)}
        </div>
        {/if}
        {/if}
    </div>
{elseif $origin['post_type'] == "link" && $origin['link']}
    <div class="mt10">
        <div class="post-media">
            {if $origin['link']['source_thumbnail']}
            <div class="post-media-image">
                <div style="background-image:url('{$origin['link']['source_thumbnail']}');"></div>
            </div>
            {/if}
            <div class="post-media-meta">
                <a class="title mb5" href="{$origin['link']['source_url']}" target="_blank">{$origin['link']['source_title']}</a>
                <div class="text mb5">{$origin['link']['source_text']}</div>
                <div class="source">{$origin['link']['source_host']|upper}</div>
            </div>
        </div>
    </div>
{elseif $origin['post_type'] == "video" && $origin['video']}
    <div class="video-js-responsive-container vjs-hd">
        <video class="video-js js_video-js vjs-big-play-centered" controls preload="auto" poster="">
            <source src="{$system['system_uploads']}/{$origin['video']['source']}" type="video/mp4">
            <source src="{$system['system_uploads']}/{$origin['video']['source']}" type="video/webm">
            <p class="vjs-no-js">
                {__("Your browser does not support HTML5 video")}
            </p>
        </video>
    </div>
{elseif $origin['post_type'] == "audio" && $origin['audio']}
    <audio class="js_mediaelementplayer" controls>
        <source src="{$system['system_uploads']}/{$origin['audio']['source']}">
        {__("Your browser does not support HTML5 audio")}
    </audio>
{elseif $origin['post_type'] == "file" && $origin['file']}
    <div class="post-downloader">
        <div class="icon">
            <i class="fa fa-file-text-o fa-2x"></i>
        </div>
        <div class="info">
            <strong>{__("File Type")}</strong>: {get_extension({$origin['file']['source']})}
            <div class="mt10">
                <a class="btn btn-primary btn-sm" href="{$system['system_uploads']}/{$origin['file']['source']}">{__("Download")}</a>
            </div>

        </div>
    </div>
{elseif $origin['post_type'] == "map"}
    <div class="post-map">
        <img src="https://maps.googleapis.com/maps/api/staticmap?center={$origin['location']}&amp;zoom=13&amp;size=600x250&amp;maptype=roadmap&amp;markers=color:red%7C{$origin['location']}&amp;key={$system['geolocation_key']}" width="100%">
    </div>
{/if}