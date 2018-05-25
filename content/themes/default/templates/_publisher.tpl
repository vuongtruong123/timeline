<div class="x-form publisher" data-handle="{$_handle}" {if $_id}data-id="{$_id}"{/if}>

    <!-- publisher loader -->
    <div class="publisher-loader">
        <div class="loader loader_small"></div>
    </div>
    <!-- publisher loader -->

    <!-- publisher tabs -->
    <ul class="publisher-tabs clearfix">
        <li>
            <span class="active js_publisher_tab" data-tab="post">
                <i class="fa fa-pencil fa-fw"></i> {__("Write Post")}
            </span>
        </li>
        {if $system['photos_enabled']}
            <li class="hidden-xs">
                <span class="js_publisher_tab" data-tab="album">
                    <i class="fa fa-picture-o fa-fw"></i> {__("Create Album")}
                </span>
            </li>
        {/if}
        <li class="dropdown">
            <span class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bars fa-fw"></i> {__("More")}
            </span>
            <ul class="dropdown-menu">
                {if $system['photos_enabled']}
                    <li class="visible-xs-block">
                        <span class="publisher-tools-attach js_publisher_tab" data-tab="album">
                            <i class="fa fa-picture-o fa-fw"></i> {__("Create Album")}
                        </span>
                    </li>
                {/if}
                {if $system['videos_enabled']}
                    <li>
                        <span class="publisher-tools-attach js_publisher_tab" data-tab="video">
                            <i class="fa fa-video-camera fa-fw js_x-uploader" data-handle="publisher" data-type="video"></i> {__("Add Video")}
                        </span>
                    </li>
                {/if}
                {if $system['audio_enabled']}
                    <li>
                        <span class="publisher-tools-attach js_publisher_tab" data-tab="audio">
                            <i class="fa fa-music fa-fw js_x-uploader" data-handle="publisher" data-type="audio"></i> {__("Add Audio")}
                        </span>
                    </li>
                {/if}
                {if $system['file_enabled']}
                    <li>
                        <span class="publisher-tools-attach js_publisher_tab" data-tab="audio">
                            <i class="fa fa-file-text-o fa-fw js_x-uploader" data-handle="publisher" data-type="file"></i> {__("Add File")}
                        </span>
                    </li>
                {/if}
            </ul>
        </li>
    </ul>
    <!-- publisher tabs -->

    <!-- post message -->
    <div class="relative">
        <textarea class="js_autogrow js_mention js_publisher-scraber" placeholder='{__("What is on your mind? #Hashtag.. @Mention.. Link..")}'></textarea>
    </div>
    <!-- post message -->

    <!-- publisher scraber -->
    <div class="publisher-scraber"></div>
    <!-- publisher scraber -->

    <!-- post attachments -->
    <div class="publisher-attachments attachments clearfix x-hidden">
        <ul></ul>
    </div>
    <!-- post attachments -->

    <!-- post location -->
    <div class="publisher-meta" data-meta="location">
        <i class="fa fa-map-marker fa-fw"></i>
        <input type="text" id="google_geolocation" placeholder='{__("Where are you?")}'>
    </div>
    <!-- post location -->

    <!-- post album -->
    <div class="publisher-meta" data-meta="album">
        <i class="fa fa-picture-o fa-fw"></i>
        <input type="text" placeholder='{__("Album title")}'>
    </div>
    <!-- post album -->

    <!-- post video -->
    <div class="publisher-meta" data-meta="video">
        <i class="fa fa-video-camera fa-fw"></i>
        {__("Video uploaded successfully")}
    </div>
    <!-- post video -->

    <!-- post audio -->
    <div class="publisher-meta" data-meta="audio">
        <i class="fa fa-music fa-fw"></i>
        {__("Audio uploaded successfully")}
    </div>
    <!-- post audio -->

    <!-- post file -->
    <div class="publisher-meta" data-meta="file">
        <i class="fa fa-file-text-o fa-fw"></i>
        {__("File uploaded successfully")}
    </div>
    <!-- post file -->

    <!-- publisher-footer -->
    <div class="publisher-footer clearfix">
        <!-- publisher-tools -->
        <ul class="publisher-tools">
            {if $system['photos_enabled']}
                <li>
                    <span class="publisher-tools-attach js_publisher_photos">
                        <i class="fa fa-camera fa-fw js_x-uploader" data-handle="publisher" data-multiple="true"></i>
                    </span>
                </li>
            {/if}
            {if $system['geolocation_enabled']}
                <li>
                    <span class="js_publisher_location">
                        <i class="fa fa-map-marker fa-fw"></i>
                    </span>
                </li>
            {/if}
            <li class="relative">
                <span class="js_emoji-menu-toggle">
                    <i class="fa fa-smile-o fa-fw"></i>
                </span>
                {include file='_emoji-menu.tpl'}
            </li>
        </ul>
        <!-- publisher-tools -->

        <!-- publisher-buttons -->
        <div class="pull-right flip mt5">
            {if $_privacy}
                <!-- privacy -->
                <div class="btn-group" data-toggle="tooltip" data-placement="top" data-value="friends" title='{__("Shared with: Friends")}'>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="btn-group-icon fa fa-users"></i> <span class="btn-group-text hidden-xs">{__("Friends")}</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="#" data-title='{__("Shared with: Public")}' data-value="public">
                                <i class="fa fa-globe"></i> {__("Public")}
                            </a>
                        </li>
                        <li>
                            <a href="#" data-title='{__("Shared with: Friends")}' data-value="friends">
                                <i class="fa fa-users"></i> {__("Friends")}
                            </a>
                        </li>
                        {if $_handle == 'me'}
                            <li>
                                <a href="#" data-title='{__("Shared with: Only Me")}' data-value="me">
                                    <i class="fa fa-lock"></i> {__("Only Me")}
                                </a>
                            </li>
                        {/if}
                    </ul>
                </div>
                <!-- privacy -->
            {/if}
            <button type="button" class="btn btn-primary js_publisher">{__("Post")}</button>
        </div>
        <!-- publisher-buttons -->
    </div>
    <!-- publisher-footer -->
</div>


<!-- Google Geolocation -->
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key={$system['geolocation_key']}"></script>
<script type="text/javascript">
    // run Google Geolocation
    var pac_input = document.getElementById('google_geolocation');
    (function pacSelectFirst(input) {
        // store the original event binding function
        var _addEventListener = (input.addEventListener) ? input.addEventListener : input.attachEvent;
        function addEventListenerWrapper(type, listener) {
            // Simulate a 'down arrow' keypress on hitting 'return' when no pac suggestion is selected,
            // and then trigger the original listener.
            if(type == "keydown") {
                var orig_listener = listener;
                listener = function (event) {
                    var suggestion_selected = $(".pac-item-selected").length > 0;
                    if(event.which == 13 && !suggestion_selected) {
                        var simulated_downarrow = $.Event("keydown", {
                            keyCode: 40,
                            which: 40
                            });
                        orig_listener.apply(input, [simulated_downarrow]);
                    }
                    orig_listener.apply(input, [event]);
                };
            }
            // add the modified listener
            _addEventListener.apply(input, [type, listener]);
        }
        if(input.addEventListener)
          input.addEventListener = addEventListenerWrapper;
        else if(input.attachEvent)
          input.attachEvent = addEventListenerWrapper;
    })(document.getElementById('google_geolocation'));
    var autocomplete = new google.maps.places.Autocomplete(pac_input);
</script>
<!-- Google Geolocation -->