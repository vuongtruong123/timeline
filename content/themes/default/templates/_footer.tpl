
<!-- footer -->
<div class="container">
	<div class="row footer">
		<div class="col-lg-6 col-md-6 col-sm-6">
			&copy; {'Y'|date} {$system['system_title']} · <span class="text-link" data-toggle="modal" data-url="#translator">{$system['language']['title']}</span>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 links">
			{if count($static_pages) > 0}
				{foreach $static_pages as $static_page}
					<a href="{$system['system_url']}/static/{$static_page['page_url']}">
						{$static_page['page_title']}
					</a>{if !$static_page@last || $system['system_public']} · {/if}
				{/foreach}
			{/if}
			{if $system['system_public']}
				<a href="{$system['system_url']}/directory">
					{__("Directory")}
				</a>
				 · 
				<a href="{$system['system_url']}/search">
					{__("Search")}
				</a>
			{/if}
		</div>
	</div>
</div>
<!-- footer -->

</div>
<!-- main wrapper -->

<!-- JS Files -->
{include file='_js_files.tpl'}
<!-- JS Files -->

<!-- JS Templates -->
{include file='_js_templates.tpl'}
<!-- JS Templates -->

<!-- Analytics Code -->
{if $system['analytics_code']}{html_entity_decode($system['analytics_code'], ENT_QUOTES)}{/if}
<!-- Analytics Code -->

{if $user->_logged_in}
	<!-- Chat Audio -->
	<audio id="chat_audio">
		<source src="{$system['system_url']}/includes/assets/sounds/notify.ogg" type="audio/ogg">
		<source src="{$system['system_url']}/includes/assets/sounds/notify.mp3" type="audio/mpeg">
		<source src="{$system['system_url']}/includes/assets/sounds/notify.wav" type="audio/wav">
	</audio>
	<!-- Chat Audio -->
{/if}

</body>
</html>