<li>
    <div class="comment" data-id="{$comment['comment_id']}">
        <div class="comment-avatar">
            <a class="comment-avatar-picture" href="{$comment['author_url']}" style="background-image:url({$comment['author_picture']});">
            </a>
        </div>
        <div class="comment-data">
            {if $user->_logged_in}
                {if !$comment['edit_comment'] && !$comment['delete_comment'] }
                    <div class="comment-btn">
                        <button type="button" class="close js_report-comment" data-toggle="tooltip" data-placement="top" title='{__("Report")}'>
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                {elseif !$comment['edit_comment'] && $comment['delete_comment']}
                    <div class="comment-btn">
                        <button type="button" class="close js_delete-comment" data-toggle="tooltip" data-placement="top" title='{__("Delete")}'>
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                {else}
                    <div class="comment-btn dropdown pull-right flip">
                        <i class="fa fa-times dropdown-toggle" data-toggle="dropdown" data-tooltip="tooltip" data-placement="top" title='{__("Edit or Delete")}'></i>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#" class="js_edit-comment">{__("Edit Comment")}</a>
                            </li>
                            <li>
                                <a href="#" class="js_delete-comment">{__("Delete Comment")}</a>
                            </li>
                        </ul>
                    </div>
                {/if}
            {/if}
            <div class="mb5">
                <span class="text-semibold js_user-popover" data-type="{$comment['user_type']}" data-uid="{$comment['user_id']}">
                    <a href="{$comment['author_url']}" >{$comment['author_name']}</a>
                </span>
                {if $comment['author_verified']}
                <i data-toggle="tooltip" data-placement="top" title='{__("Verified")}' class="fa fa-check verified-badge"></i>
                {/if}
                {include file='__feeds_post.comment.text.tpl'}
            </div>
            <div>
                <span class="text-muted js_moment" data-time="{$comment['time']}">{$comment['time']}</span>
                · 
                {if $comment['i_like']}
                <span class="text-link js_unlike-comment">{__("Unlike")}</span>
                {else}
                <span class="text-link js_like-comment">{__("Like")}</span>
                {/if}
                <span class="js_comment-likes {if {$comment['likes']} == 0}x-hidden{/if}">
                    · 
                    <span class="text-link" data-toggle="modal" data-url="posts/who_likes.php?comment_id={$comment['comment_id']}"><i class="fa fa-thumbs-o-up"></i> <span class="js_comment-likes-num">{$comment['likes']}</span></span>
                </span>
            </div>
        </div>
    </div>
</li>