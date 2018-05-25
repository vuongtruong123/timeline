{strip}
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]><script src="{$system['system_url']}/includes/assets/js/plugins/html5shiv/html5shiv.js"></script><![endif]-->

<!-- Initialize -->
<script type="text/javascript">
    /* initialize vars */
    var site_path = "{$system['system_url']}";
    var ajax_path = site_path+'/includes/ajax/';
    var uploads_path = "{$system['system_uploads']}";
    var secret = '{$secret}';
    var min_data_heartbeat = "{$system['data_heartbeat']*1000}";
    var min_chat_heartbeat = "{$system['chat_heartbeat']*1000}";
    var chat_enabled = {if $system['chat_enabled']}true{else}false{/if};
</script>
<script type="text/javascript">
    /* i18n for JS */
    var __ = [];
    __["Add Friend"] = '{__("Add Friend")}';
    __["Friends"] = '{__("Friends")}';
    __["Friend Request Sent"] = '{__("Friend Request Sent")}';
    __["Following"] = '{__("Following")}';
    __["Follow"] = '{__("Follow")}';
    __["Remove"] = '{__("Remove")}';
    __["Error"] = '{__("Error")}';
    __["Success"] = '{__("Success")}';
    __["Loading"] = '{__("Loading")}';
    __["Like"] = '{__("Like")}';
    __["Unlike"] = '{__("Unlike")}';
    __["Joined"] = '{__("Joined")}';
    __["Join Group"] = '{__("Join Group")}';
    __["Delete"] = '{__("Delete")}';
    __["Delete Cover"] = '{__("Delete Cover")}';
    __["Delete Picture"] = '{__("Delete Picture")}';
    __["Delete Post"] = '{__("Delete Post")}';
    __["Delete Comment"] = '{__("Delete Comment")}';
    __["Delete Conversation"] = '{__("Delete Conversation")}';
    __["Share Post"] = '{__("Share Post")}';
    __["Report User"] = '{__("Report User")}';
    __["Report Page"] = '{__("Report Page")}';
    __["Report Group"] = '{__("Report Group")}';
    __["Block User"] = '{__("Block User")}';
    __["Unblock User"] = '{__("Unblock User")}';
    __["Save Post"] = '{__("Save Post")}';
    __["Unsave Post"] = '{__("Unsave Post")}';
    __["Pin Post"] = '{__("Pin Post")}';
    __["Unpin Post"] = '{__("Unpin Post")}';
    __["Are you sure you want to delete this?"] = '{__("Are you sure you want to delete this?")}';
    __["Are you sure you want to remove your cover photo?"] = '{__("Are you sure you want to remove your cover photo?")}';
    __["Are you sure you want to remove your profile picture?"] = '{__("Are you sure you want to remove your profile picture?")}';
    __["Are you sure you want to delete this post?"] = '{__("Are you sure you want to delete this post?")}';
    __["Are you sure you want to share this post?"] = '{__("Are you sure you want to share this post?")}';
    __["Are you sure you want to delete this comment?"] = '{__("Are you sure you want to delete this comment?")}';
    __["Are you sure you want to delete this conversation?"] = '{__("Are you sure you want to delete this conversation?")}';
    __["Are you sure you want to report this user?"] = '{__("Are you sure you want to report this user?")}';
    __["Are you sure you want to report this page?"] = '{__("Are you sure you want to report this page?")}';
    __["Are you sure you want to report this group?"] = '{__("Are you sure you want to report this group?")}';
    __["Are you sure you want to block this user?"] = '{__("Are you sure you want to block this user?")}';
    __["Are you sure you want to unblock this user?"] = '{__("Are you sure you want to unblock this user?")}';
    __["Are you sure you want to delete your account?"] = '{__("Are you sure you want to delete your account?")}';
    __["There is something that went wrong!"] = '{__("There is something that went wrong!")}';
    __["There is no more data to show"] = '{__("There is no more data to show")}';
    __["This has been shared to your Timeline"] = '{__("This has been shared to your Timeline")}';
</script>
<!-- Initialize -->

<!-- Dependencies Libs [jQuery|Bootstrap|Mustache] -->
<script type="text/javascript" src="{$system['system_url']}/includes/assets/js/jquery/jquery-1.12.2.min.js"></script>
<script type="text/javascript" src="{$system['system_url']}/includes/assets/js/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="{$system['system_url']}/includes/assets/js/mustache/mustache.min.js"></script>
<!-- Dependencies Libs [jQuery|Bootstrap|Mustache] -->

<!-- Dependencies Plugins [JS] [fastclick|slimscroll|autogrow|moment|form|inview|videojs|mediaelementplayer] -->
<script type="text/javascript" src="{$system['system_url']}/includes/assets/js/plugins/fastclick/fastclick.min.js"></script>
<script type="text/javascript" src="{$system['system_url']}/includes/assets/js/plugins/slimscroll/slimscroll.min.js"></script>
<script type="text/javascript" src="{$system['system_url']}/includes/assets/js/plugins/autogrow/autogrow.min.js"></script>
<script type="text/javascript" src="{$system['system_url']}/includes/assets/js/plugins/moment/moment-with-locales.min.js"></script>
<script type="text/javascript" src="{$system['system_url']}/includes/assets/js/plugins/inview/inview.min.js"></script>
<script type="text/javascript" src="{$system['system_url']}/includes/assets/js/plugins/form/form.min.js"></script>
<script type="text/javascript" src="{$system['system_url']}/includes/assets/js/plugins/videojs/video.min.js"></script>
<script type="text/javascript" src="{$system['system_url']}/includes/assets/js/plugins/mediaelementplayer/mediaelement-and-player.min.js"></script>
<!-- Dependencies Plugins [JS] [fastclick|slimscroll|autogrow|moment|form|inview|videojs|mediaelementplayer] -->

<!-- Dependencies Plugins [CSS] [videojs|mediaelementplayer] -->
<link rel="stylesheet" type='text/css' href="{$system['system_url']}/includes/assets/js/plugins/videojs/video-js.min.css">
<link rel="stylesheet" type='text/css' href="{$system['system_url']}/includes/assets/js/plugins/mediaelementplayer/mediaelementplayer.min.css">
<!-- Dependencies Plugins [CSS] [videojs|mediaelementplayer] -->

<!-- Dependencies CSS [Twemoji-Awesome|Flag-Icon] -->
<link rel="stylesheet" href="{$system['system_url']}/includes/assets/css/twemoji-awesome/twemoji-awesome.min.css" onload="if(media!='all')media='all'">
<link rel="stylesheet" href="{$system['system_url']}/includes/assets/css/flag-icon/css/flag-icon.min.css" onload="if(media!='all')media='all'">
<!-- Dependencies CSS [Twemoji-Awesome|Flag-Icon] -->

<!-- Sngine [JS] -->
<script type="text/javascript" src="{$system['system_url']}/includes/assets/js/sngine/core.min.js"></script>
{if $user->_logged_in}
<script type="text/javascript" src="{$system['system_url']}/includes/assets/js/sngine/user.js"></script>
<script type="text/javascript" src="{$system['system_url']}/includes/assets/js/sngine/post.js"></script>
<script type="text/javascript" src="{$system['system_url']}/includes/assets/js/sngine/chat.js"></script>
{/if}
<!-- Sngine [JS] -->


{if $page == "admin"}
    <!-- Dependencies Plugins [JS] -->
    <script type="text/javascript" src="{$system['system_url']}/includes/assets/js/plugins/metisMenu/metisMenu.min.js"></script>
    <script type="text/javascript" src="{$system['system_url']}/includes/assets/js/plugins/dataTables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{$system['system_url']}/includes/assets/js/plugins/dataTables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="{$system['system_url']}/includes/assets/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <script type="text/javascript" src="{$system['system_url']}/includes/assets/js/plugins/datetimepicker/datetimepicker.min.js"></script>
    <!-- Dependencies Plugins [JS] -->

    <!-- Dependencies Plugins [CSS] -->
    <link rel="stylesheet" type='text/css' href="{$system['system_url']}/includes/assets/js/plugins/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" type='text/css' href="{$system['system_url']}/includes/assets/js/plugins/dataTables/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type='text/css' href="{$system['system_url']}/includes/assets/js/plugins/colorpicker/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" type='text/css' href="{$system['system_url']}/includes/assets/js/plugins/datetimepicker/datetimepicker.min.css">
    <!-- Dependencies Plugins [CSS] -->
    
    <!-- Sngine [JS] -->
    <script type="text/javascript" src="{$system['system_url']}/includes/assets/js/sngine/admin.js"></script>
    <!-- Sngine [JS] -->
{/if}
{/strip}