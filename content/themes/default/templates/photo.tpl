{include file='_head.tpl'}
{include file='_header.tpl'}

{assign var="post" value=$photo['post']}

<!-- page content -->
<div class="container mt20">
	<div class="row">

		<!-- left panel -->
		<div class="col-sm-8">

			<!-- post -->
    		<div class="post" data-id="{if $photo['is_single']}{$post['post_id']}{else}{$photo['photo_id']}{/if}">

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
                                <!-- post author name -->
    							<span class="js_user-popover" data-type="{$post['user_type']}" data-uid="{$post['user_id']}">
    								<a href="{$post['post_author_url']}">{$post['post_author_name']}</a>
    							</span>
                                {if $post['post_author_verified']}
                                <i data-toggle="tooltip" data-placement="top" title='{__("Verified profile")}' class="fa fa-check verified-badge"></i>
                                {/if}
    							<!-- post author name -->
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
    							{if $post['privacy'] == "me"}
                                    <i class="fa fa-lock" data-toggle="tooltip" data-placement="top" title='{__("Shared with")} {__("Only Me")}'></i>
                                {elseif $post['privacy'] == "friends"}
                                    <i class="fa fa-users" data-toggle="tooltip" data-placement="top" title='{__("Shared with")} {__("Friends")}'></i>
                                {elseif $post['privacy'] == "public"}
                                    <i class="fa fa-globe" data-toggle="tooltip" data-placement="top" title='{__("Shared with")} {__("Public")}'></i>
                                {/if}
    						</div>
    						<!-- post time & location & privacy -->
    					</div>
    					<!-- post meta -->
    				</div>
    				<!-- post header -->

                    <!-- photo -->
                    <div class="mt10 clearfix">
                        <div class="pg_wrapper">
                            <div class="pg_1x">
                                <a href="{$system['system_url']}/photos/{$photo['photo_id']}" class="js_lightbox" data-id="{$photo['photo_id']}" data-image="{$photo['source']}" data-context="{if $photo['is_single']}album{else}post{/if}">
                                    <img src="{$system['system_uploads']}/{$photo['source']}">
                                </a>
                            </div>
                        </div>
                    </div>
    				<!-- photo -->

                    <!-- post actions -->
                    <div class="post-actions">
                        {if $photo['i_like']}
                            <span class="text-link {if $photo['is_single']}js_unlike-post{else}js_unlike-photo{/if}">{__("Unlike")}</span> - 
                        {else}
                            <span class="text-link {if $photo['is_single']}js_like-post{else}js_like-photo{/if}">{__("Like")}</span> - 
                        {/if}
                        <span class="text-link js_comment">{__("Comment")}</span>
                    </div>
                    <!-- post actions -->

    			</div>

				<!-- post footer -->
				<div class="post-footer">
                    {if $photo['is_single']}
                        <!-- post stats -->
                        <div class="post-stats {if {$post['likes']} == 0}x-hidden{/if}">
                            <!-- likes -->
                            <span class="js_post-likes {if {$post['likes']} == 0}x-hidden{/if}">
                                <i class="fa fa-thumbs-o-up"></i> <span class="text-link" data-toggle="modal" data-url="posts/who_likes.php?post_id={$post['post_id']}"><span class="js_post-likes-num">{$post['likes']}</span> {__("people")}</span> {__("like this")}
                            </span>
                            <!-- likes -->
                        </div>
                        <!-- post stats -->

                        <!-- comments -->
                        {include file='__feeds_post.comments.tpl'}
                        <!-- comments -->
                    {else}
                        <!-- post stats -->
                        <div class="post-stats {if {$photo['likes']} == 0}x-hidden{/if}">
                            <!-- likes -->
                            <span class="js_photo-likes {if $photo['likes']} == 0}x-hidden{/if}">
                                <i class="fa fa-thumbs-o-up"></i> <span class="text-link" data-toggle="modal" data-url="posts/who_likes.php?photo_id={$photo['photo_id']}"><span class="js_photo-likes-num">{$photo['likes']}</span> {__("people")}</span> {__("like this")}
                            </span>
                            <!-- likes -->
                        </div>
                        <!-- post stats -->

                        <!-- comments -->
                        {include file='__feeds_photo.comments.tpl'}
                        <!-- comments -->

                    {/if}
                </div>
				<!-- post footer -->

			</div>
		</div>
		<!-- left panel -->

		<!-- right panel -->
		<div class="col-sm-4">
        {include file='_ads.tpl'}
        {include file='_widget.tpl'}
		</div>
		<!-- right panel -->

	</div>
</div>
<!-- page content -->

{include file='_footer.tpl'}