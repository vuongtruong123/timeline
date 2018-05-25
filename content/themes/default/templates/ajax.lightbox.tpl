{assign var="post" value=$photo['post']}

<div class="lightbox-post" {if $photo['is_single']} data-id="{$post['post_id']}" {else} data-id="{$photo['photo_id']}" {/if}>
	<div class="js_scroller js_scroller-lightbox" data-slimScroll-height="100%">
		<div class="post-body">
			<div class="mb10 post-header">
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
                            <i class="fa fa-lock" data-toggle="tooltip" data-placement="top" title='{__("Shared with")}: {__("Only Me")}'></i>
                        {elseif $post['privacy'] == "friends"}
                            <i class="fa fa-users" data-toggle="tooltip" data-placement="top" title='{__("Shared with")}: {__("Friends")}'></i>
                        {elseif $post['privacy'] == "public"}
                            <i class="fa fa-globe" data-toggle="tooltip" data-placement="top" title='{__("Shared with")}: {__("Public")}'></i>
                        {/if}
					</div>
					<!-- post time & location & privacy -->
				</div>
				<!-- post meta -->
			</div>
			<!-- post header -->
			
			<!-- post actions -->
            <div class="post-actions">
                {if $photo['is_single']}
                    {if $photo['i_like']}
                        <span class="text-link js_unlike-post">{__("Unlike")}</span> - 
                    {else}
                        <span class="text-link js_like-post">{__("Like")}</span> - 
                    {/if}
                {else}
                    {if $photo['i_like']}
                        <span class="text-link js_unlike-photo">{__("Unlike")}</span> - 
                    {else}
                        <span class="text-link js_like-photo">{__("Like")}</span> - 
                    {/if}
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
                    <span class="js_post-likes {if $photo['likes']} == 0}x-hidden{/if}">
                        <i class="fa fa-thumbs-o-up"></i> <span class="text-link" data-toggle="modal" data-url="posts/who_likes.php?photo_id={$photo['photo_id']}"><span class="js_post-likes-num">{$photo['likes']}</span> {__("people")}</span> {__("like this")}
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