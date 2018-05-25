<span class="comment-replace">
    <span class="comment-text">{$comment['text']}</span>
    <span class="comment-text-plain hidden">{$comment['text_plain']}</span>
    {if $comment['image'] != ""}
        <span class="text-link js_lightbox-nodata" data-image="{$system['system_uploads']}/{$comment['image']}">
            <img alt="" class="img-responsive" src="{$system['system_uploads']}/{$comment['image']}">
        </span>
    {/if}
</span>
