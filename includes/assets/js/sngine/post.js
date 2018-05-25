/**
 * post js
 * 
 * @package Sngine v2+
 * @author Zamblek
 */

// initialize API URLs
api['posts/filter']  = ajax_path+"posts/filter.php";
api['posts/post']  = ajax_path+"posts/post.php";
api['posts/scraber']  = ajax_path+"posts/scraber.php";
api['posts/lightbox']  = ajax_path+"posts/lightbox.php";
api['posts/comment']  = ajax_path+"posts/comment.php";
api['posts/reaction']  = ajax_path+"posts/reaction.php";
api['posts/edit']  = ajax_path+"posts/edit.php";

api['albums/action']  = ajax_path+"albums/action.php";


$(function() {

    // run publisher
    /* publisher tabs */
    $('body').on('click', '.js_publisher_tab', function() {
        var publisher = $('.publisher');
        var tab = $(this).attr('data-tab');
        if(tab == "post") {
            if($(this).hasClass('active')) {
                return;
            }
            /* check if there is current (scrabing|video|audio|file) process */
            if(publisher.data('video') || publisher.data('audio') || publisher.data('file')) {
                return;
            }
            /* remove active class from all tabs */
            $('.js_publisher_tab').removeClass('active');
            /* add active class for current tab */
            $(this).addClass('active');
            /* show photos uploader */
            $('.js_publisher_photos').show();
            /* hide & remove album meta */
            $('.publisher-meta[data-meta="album"]').hide();
            $('.publisher-meta[data-meta="album"]').find('input').val('');

        } else if (tab == "album") {
            /* check if this tab already active */
            if($(this).hasClass('active')) {
                return;
            }
            /* check if there is current (scrabing|video|audio|file) process */
            if(publisher.data('scrabing') || publisher.data('video') || publisher.data('audio') || publisher.data('file')) {
                return;
            }
            /* remove active class from all tabs */
            $('.js_publisher_tab').removeClass('active');
            /* add active class for current tab */
            $(this).addClass('active');
            /* show photos uploader */
            $('.js_publisher_photos').show();
            /* show the album meta */
            $('.publisher-meta[data-meta="album"]').slideToggle('fast');
            $('.publisher-meta[data-meta="album"]').find('input').focus();

        } else if (tab == "video" || tab == "audio" || tab == "file") {
            /* remove active class from all tabs */
            $('.js_publisher_tab').removeClass('active');
            /* hide photos uploader */
            $('.js_publisher_photos').hide();
            /* hide & remove album meta */
            $('.publisher-meta[data-meta="album"]').hide();
            $('.publisher-meta[data-meta="album"]').find('input').val('');
        }
    });
    /* publisher location */
    $('body').on('click', '.js_publisher_location', function() {
        $(this).toggleClass('active');
        $('.publisher-meta[data-meta="location"]').slideToggle('fast');
        $('.publisher-meta[data-meta="location"]').find('input').focus();
    });
    $('body').on('keyup', '.publisher-meta[data-meta="location"] input', function() {
        if($(this).val() == '') {
            $('.js_publisher_location-toggle').removeClass('activated');
        } else {
            $('.js_publisher_location-toggle').addClass('activated');
        }
    });
    /* publisher scraber */
    $('body').on('keyup', '.js_publisher-scraber', function() {
        var publisher = $('.publisher');
        var loader = $('.publisher-loader');
        /* check if there is current (uploading|scrabing|video|audio|file) process */
        if(publisher.data('photos') || publisher.data('scrabing') || publisher.data('video') || publisher.data('audio') || publisher.data('file')) {
            return;
        }
        var raw_query = $(this).val().match(/(https?:\/\/[^\s]+)/gi);
        if(raw_query === null || raw_query.length == 0) {
            return;
        }
        var query = raw_query[0];
        /* show the loader */
        loader.show();
        /* scrabe the link */
        $.post(api['posts/scraber'], {'query': query}, function(response) {
            if(response.callback) {
                /* hide the loader */
                loader.hide();
                eval(response.callback);
            } else if(response.link) {
                /* hide the loader */
                loader.hide();
                /* add the link to publisher data */
                publisher.data('scrabing', response.link);
                /* hide photos uploader */
                $('.js_publisher_photos').hide();
                /* get the template */
                if(response.link['source_type'] == "link") {
                    /* link */
                    var template = render_template('#scraber-link', {'thumbnail': response.link['source_thumbnail'], 'host': response.link['source_host'], 'url': response.link['source_url'], 'title': response.link['source_title'], 'text': response.link['source_text'] });
                } else if (response.link['source_type'] == "photo") {
                    var template = render_template('#scraber-photo', {'url': response.link['source_url'], 'provider': response.link['source_provider']});
                } else {
                    /* media */
                    var template = render_template('#scraber-media', {'url': response.link['source_url'], 'title': response.link['source_title'], 'text': response.link['source_text'], 'html': response.link['source_html'], 'provider': response.link['source_provider'] });
                }
                /* show the publisher scraber */
                $('.publisher-scraber').html(template).fadeIn();
            }
        }, 'json');
    });
    /* publisher scraber remover */
    $('body').on('click', '.js_publisher-scraber-remover', function() {
        /* remove the link from publisher data */
        $('.publisher').removeData('scrabing');
        /* hide the publisher scraber */
        $('.publisher-scraber').html('').fadeOut();
        /* show the publisher uploader */
        $('.publisher-tools-attach').show();
    });
    /* publisher attachment remover */
    $('body').on('click', '.js_publisher-attachment-remover', function() {
        var item = $(this).parents('li.item');
        var src = item.attr('data-src');
        /* remove the attachment from publisher data */
        var files = $('.publisher').data('photos');
        delete files[src];
        if(Object.keys(files).length > 0) {
            $('.publisher').data('photos', files);
        } else {
            $('.publisher').removeData('photos');
            $('.publisher-attachments').hide();
        }
        /* remove the attachment item */
        item.remove();
    });
    /* publish the post */
    $('body').on('click', '.js_publisher', function() {
        var _this = $(this);
        /* get posts stream */
        var posts_stream =  $('.js_posts_stream');
        /* get publisher */
        var publisher = _this.parents('.publisher');
        /* get handle */
        var handle = publisher.attr('data-handle');
        /* get (user|page|group) id */
        var id = publisher.attr('data-id');
        /* get text */
        var textarea = publisher.find('textarea');
        /* get location */
        var location_meta = publisher.find('.publisher-meta[data-meta="location"]')
        var location = location_meta.find('input');
        /* get photos */
        var attachments = publisher.find('.publisher-attachments');
        var photos = publisher.data('photos');
        /* get album */
        var album_meta = publisher.find('.publisher-meta[data-meta="album"]')
        var album = album_meta.find('input');
        /* get video */
        var attachments_video = publisher.find('.publisher-meta[data-meta="video"]');
        var video = publisher.data('video');
        /* get audio */
        var attachments_audio = publisher.find('.publisher-meta[data-meta="audio"]');
        var audio = publisher.data('audio');
        /* get file */
        var attachments_file = publisher.find('.publisher-meta[data-meta="file"]');
        var file = publisher.data('file');
        /* get link */
        var link = publisher.data('scrabing');
        /* get privacy */
        var privacy = publisher.find('.btn-group').attr('data-value');
        /* return if no data to post */
        if(textarea.val() == "" && location.val() == "" && photos === undefined && video === undefined && audio === undefined && file === undefined && link === undefined) {
            return;
        }
        _this.button('loading');
        posts_stream.data('loading', true);
        $.post(api['posts/post'], {'handle': handle, 'id': id, 'message': textarea.val(), 'photos': JSON.stringify(photos), 'album':album.val(), 'video': JSON.stringify(video), 'audio': JSON.stringify(audio), 'file': JSON.stringify(file), 'link': JSON.stringify(link), 'location':location.val(), 'privacy': privacy}, function(response) {
            if(response.callback) {
                _this.button('reset');
                eval(response.callback);
            } else {
                /* remove active class from all tabs */
                $('.js_publisher_tab').removeClass('active');
                /* add active class to 'write post' tab */
                $('.js_publisher_tab[data-tab="post"]').addClass('active');
                _this.button('reset');
                textarea.val('');
                location.val('');
                location_meta.hide();
                $('.js_publisher_location').removeClass('activated active');
                attachments.hide();
                attachments.find('li.item').remove();
                publisher.removeData('photos');
                album.val('');
                album_meta.hide();
                attachments_video.hide();
                publisher.removeData('video');
                attachments_audio.hide();
                publisher.removeData('audio');
                attachments_file.hide();
                publisher.removeData('file');
                $('.publisher-scraber').html('').fadeOut();
                publisher.removeData('scrabing');
                $('.js_publisher_photos').show();
                $('.js_posts_stream').find('ul:first').prepend(response.post);
                posts_stream.removeData('loading');
                photo_grid();
            }
        }, "json")
        .fail(function() {
            _this.button('reset');
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });
    /* publish new photos to album */
    $('body').on('click', '.js_publisher-album', function() {
        var _this = $(this);
        /* get publisher */
        var publisher = _this.parents('.publisher');
        /* get album id */
        var id = publisher.attr('data-id');
        /* get text */
        var textarea = publisher.find('textarea');
        /* get location */
        var location_meta = publisher.find('.publisher-meta[data-meta="location"]')
        var location = location_meta.find('input');
        /* get photos */
        var attachments = publisher.find('.publisher-attachments');
        var photos = publisher.data('photos');
        /* get privacy */
        var privacy = publisher.find('.btn-group').attr('data-value');
        /* return if no data to post */
        if(photos === undefined) {
            return;
        }
        _this.button('loading');
        $.post(api['albums/action'], {'do': 'add_photos', 'id': id, 'message': textarea.val(), 'photos': JSON.stringify(photos), 'location':location.val(), 'privacy': privacy}, function(response) {
            if(response.callback) {
                _this.button('reset');
                eval(response.callback);
            }
        }, "json")
        .fail(function() {
            _this.button('reset');
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });


    // run posts filter
    $('body').on('click', '.js_posts-filter a', function() {
        var posts_stream =  $('.js_posts_stream');
        var posts_loader = $('.js_posts_loader');
        var data = {};
        data['get'] = posts_stream.attr('data-get');
        data['filter'] = $(this).attr('data-value');
        if(posts_stream.attr('data-id') !== undefined) {
            data['id'] = posts_stream.attr('data-id');
        }
        posts_stream.data('loading', true);
        posts_stream.attr('data-filter', data['filter']);
        posts_stream.html('');
        posts_loader.show();
        /* get filtered posts */
        $.post(api['posts/filter'], data, function(response) {
            if(response.callback) {
                eval(response.callback);
            } else {
                if(response.posts) {
                    posts_loader.hide();
                    posts_stream.removeData('loading');
                    posts_stream.html(response.posts);
                    setTimeout(photo_grid(), 200);
                }
            }
        }, 'json');
    });


    // run lightbox
    /* open the lightbox */
    $('body').on('click', '.js_lightbox', function(e) {
        e.preventDefault();
        /* initialize vars */
        var id = $(this).attr('data-id');
        var image = $(this).attr('data-image');
        var context = $(this).attr('data-context');
        /* load lightbox */
        var lightbox = $(render_template("#lightbox", {'image': image}));
        var next = lightbox.find('.lightbox-next');
        var prev = lightbox.find('.lightbox-prev');
        $('body').addClass('lightbox-open').append(lightbox.fadeIn('fast'));
        /* get photo */
        $.post(api['posts/lightbox'], {'id': id, 'context': context}, function(response) {
            /* check the response */
            if(response.callback) {
                $('body').removeClass('lightbox-open');
                $('.lightbox').remove();
                eval(response.callback);
            } else {
                /* update next */
                if(response.next != null) {
                    next.show();
                    next.attr('data-id', response.next.photo_id);
                    next.attr('data-source', response.next.source);
                    next.attr('data-context', context);
                } else {
                    next.hide();
                    next.attr('data-id', '');
                    next.attr('data-source', '');
                    next.attr('data-context', '');
                }
                /* update prev */
                if(response.prev != null) {
                    prev.show();
                    prev.attr('data-id', response.prev.photo_id);
                    prev.attr('data-source', response.prev.source);
                    prev.attr('data-context', context);
                } else {
                    prev.hide();
                    prev.attr('data-id', '');
                    prev.attr('data-source', '');
                    prev.attr('data-context', '');
                }
                lightbox.find('.lightbox-post').replaceWith(response.lightbox);
            }
        }, 'json');
    });
    $('body').on('click', '.js_lightbox-slider', function(e) {
        /* initialize vars */
        var id = $(this).attr('data-id');
        var image = $(this).attr('data-source');
        var context = $(this).attr('data-context');
        /* load lightbox */
        var lightbox = $(this).parents('.lightbox');
        var next = lightbox.find('.lightbox-next');
        var prev = lightbox.find('.lightbox-prev');
        /* loading */
        next.hide();
        prev.hide();
        lightbox.find('.lightbox-post').html('<div class="loader mtb10"></div>');
        lightbox.find('.lightbox-preview img').attr('src', uploads_path + '/' + image);
        /* get photo */
        $.post(api['posts/lightbox'], {'id': id, 'context': context}, function(response) {
            /* check the response */
            if(response.callback) {
                $('body').removeClass('lightbox-open');
                lightbox.remove();
                eval(response.callback);
            } else {
                /* update next */
                if(response.next != null) {
                    next.show();
                    next.attr('data-id', response.next.photo_id);
                    next.attr('data-source', response.next.source);
                    next.attr('data-context', context);
                } else {
                    next.hide();
                    next.attr('data-id', '');
                    next.attr('data-source', '');
                    next.attr('data-context', '');
                }
                /* update prev */
                if(response.prev != null) {
                    prev.show();
                    prev.attr('data-id', response.prev.photo_id);
                    prev.attr('data-source', response.prev.source);
                    prev.attr('data-context', context);
                } else {
                    prev.hide();
                    prev.attr('data-id', '');
                    prev.attr('data-source', '');
                    prev.attr('data-context', '');
                }
                lightbox.find('.lightbox-post').replaceWith(response.lightbox);
            }
        }, 'json');
    });
    /* open the lightbox with no data */
    $('body').on('click', '.js_lightbox-nodata', function(e) {
        e.preventDefault();
        /* initialize vars */
        var image = $(this).attr('data-image');
        /* load lightbox */
        var lightbox = $(render_template("#lightbox-nodata", {'image': image}));
        $('body').addClass('lightbox-open').append(lightbox.fadeIn('fast'));
    });
    /* close the lightbox (when click outside the lightbox content) */
    $('body').on('click', '.lightbox', function(e) {
        if($(e.target).is(".lightbox")) {
            $('body').removeClass('lightbox-open');
            $('.lightbox').remove();
        }
    });
    /* close the lightbox (when click the close button) */
    $('body').on('click', '.js_lightbox-close', function() {
        $('body').removeClass('lightbox-open');
        $('.lightbox').remove();
    });
    /* close the lightbox (when press Esc button) */
    $('body').on('keydown', function(e) {
        if(e.keyCode === 27 && $('.lightbox').length > 0) {
            destroy_slimScrol('.js_scroller-lightbox');
            $('body').removeClass('lightbox-open');
            $('.lightbox').remove();
        }
    });


    // run emoji
    /* toggle(close|open) emoji-menu */
    $('body').on('click', '.js_emoji-menu-toggle', function() {
        $(this).next('.emoji-menu').toggle();
    });
    /* close emoji-menu when clicked outside */
    $('body').on('click', function(e) {
        if($(e.target).hasClass('js_emoji-menu-toggle') || $(e.target).parents('.js_emoji-menu-toggle').length > 0 || $(e.target).hasClass('emoji-menu') || $(e.target).parents('.emoji-menu').length > 0) {
           return;
       }
       $('.emoji-menu').hide();
    });
    /* add an emoji */
    $('body').on('click', '.js_emoji', function() {
        var emoji = $(this).attr('data-emoji');
        var textarea = $(this).parents('.x-form').find('textarea');
        /* check if textarea value is empty || end with a space then no prefix space */
        var prefix = ( textarea.val() == "" || /\s+$/.test(textarea.val()) ) ? "": " ";
        textarea.val(textarea.val()+prefix+emoji+" ").focus();
    });

	
	// handle comment
	/* show comment form */
	$('body').on('click', '.js_comment', function () {
		var footer = $(this).parents('.post, .lightbox-post').find('.post-footer');
		footer.show();
		footer.find('textarea').focus();
	});
	/* comment attachment remover */
    $('body').on('click', '.js_comment-attachment-remover', function() {
    	var comment = $(this).parents('.comment');
    	var attachments = comment.find('.comment-attachments');
    	var item = $(this).parents('li.item');
    	/* remove the attachment from comment data */
        comment.removeData('photos');
    	/* remove the attachment item */
        item.remove();
        /* hide attachments */
        attachments.hide();
        /* show comment form tools */
        comment.find('.x-form-tools-attach').show();
    });
	/* post comment */
	$('body').on('keydown', '.js_post-comment', function (event) {
		if(event.keyCode == 13 && event.shiftKey == 0) {
			event.preventDefault();
			var _this = $(this);
            var comment = _this.parents('.comment');
			var comments = _this.parents('.post-comments');
			var handle = comment.attr('data-handle');
			var id = comment.attr('data-id');
            var message = _this.val();
            var attachments = comment.find('.comment-attachments');
            /* get photo from comment data */
	        var photo = comment.data('photos');
            /* check if message is empty */
            if(is_empty(message) && !photo) {
                return;
            }
            $.post(api['posts/comment'], {'handle': handle, 'id': id, 'message': message, 'photo': JSON.stringify(photo)}, function(response) {
                /* check if there is a callback */
                if(response.callback) {
                    eval(response.callback);
                } else {
                	_this.val('');
                	attachments.hide();
                	attachments.find('li.item').remove();
                	comment.removeData('photos');
                	comment.find('.x-form-tools-attach').show();
                	comments.find('ul:first').append(response.comment);
                }
            }, 'json')
            .fail(function() {
                modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
            });
		}
	});
    /* delete comment */
    $('body').on('click', '.js_delete-comment', function (e) {
        e.preventDefault();
        var comment = $(this).parents('.comment');
        var id = comment.attr('data-id');
        confirm(__['Delete Comment'], __['Are you sure you want to delete this comment?'], function() {
            $.post(api['posts/reaction'], {'do': 'delete_comment', 'id': id}, function(response) {
                /* check the response */
                if(response.callback) {
                    eval(response.callback);
                } else {
                    comment.remove();
                    $('#modal').modal('hide');
                }
            }, 'json')
            .fail(function() {
                modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
            });
        });
    });
    /* edit comment */
    $('body').on('click', '.js_edit-comment', function (e) {
        e.preventDefault();
        var comment = $(this).parents('.comment');
        comment.find('.comment-data').hide().after(render_template("#edit-comment", {'text': comment.find('.comment-text-plain').text()}));
    });
    /* unedit comment */
    $('body').on('click', '.js_unedit-comment', function () {
        var comment = $(this).parents('.comment');
        comment.find('.comment-edit').remove();
        comment.find('.comment-data').show();        
    });
    /* update comment */
    $('body').on('keydown', '.js_update-comment', function (event) {
        if(event.keyCode == 13 && event.shiftKey == 0) {
            event.preventDefault();
            var _this = $(this);
            var comment = _this.parents('.comment');
            var id = comment.attr('data-id');
            var message = _this.val();
            var photo = comment.data('photos');
            /* check if message is empty */
            if(is_empty(message) && !photo) {
                return;
            }
            $.post(api['posts/edit'], {'handle': 'comment', 'id': id, 'message': message, 'photo': JSON.stringify(photo)}, function(response) {
                /* check if there is a callback */
                if(response.callback) {
                    eval(response.callback);
                } else {
                    comment.find('.comment-edit').remove();
                    comment.find('.comment-replace').html(response.comment);
                    comment.find('.comment-data').show();
                }
            }, 'json')
            .fail(function() {
                modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
            });
        }
    });
    /* report comment */
    $('body').on('click', '.js_report-comment', function () {
        var comment = $(this).parents('.comment');
        var id = comment.attr('data-id');
        $.post(api['data/report'], {'do': 'report_comment', 'id': id}, function(response) {
            /* check the response */
            if(response.callback) {
                eval(response.callback);
            } else {
                comment.hide();
                comment.after(render_template("#reported-comment", {'id': id}));
            }
        }, 'json')
        .fail(function() {
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });
    /* unreport comment */
    $('body').on('click', '.js_unreport-comment', function () {
        var comment = $(this).parents('.comment');
        var id = comment.attr('data-id');
        $.post(api['data/report'], {'do': 'unreport_comment', 'id': id}, function(response) {
            /* check the response */
            if(response.callback) {
                eval(response.callback);
            } else {
                comment.prev().show();
                comment.remove();
            }
        }, 'json')
        .fail(function() {
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });
    /* like comment */
    $('body').on('click', '.js_like-comment', function () {
        var _this = $(this);
        var comment = _this.parents('.comment');
        var id = comment.attr('data-id');
        $.post(api['posts/reaction'], {'do': 'like_comment', 'id': id}, function(response) {
            /* check the response */
            if(response.callback) {
                eval(response.callback);
            } else {
                _this.removeClass('js_like-comment').addClass('js_unlike-comment').text(__['Unlike']);
                var likes_num = comment.find('.js_comment-likes-num');
                likes_num.text(parseInt(likes_num.text()) + 1);
                comment.find('.js_comment-likes').show();
            }
        }, 'json')
        .fail(function() {
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });
    /* unlike comment */
    $('body').on('click', '.js_unlike-comment', function () {
        var _this = $(this);
        var comment = _this.parents('.comment');
        var id = comment.attr('data-id');
        $.post(api['posts/reaction'], {'do': 'unlike_comment', 'id': id}, function(response) {
            /* check the response */
            if(response.callback) {
                eval(response.callback);
            } else {
                _this.removeClass('js_unlike-comment').addClass('js_like-comment').text(__['Like']);
                var likes_num = comment.find('.js_comment-likes-num');
                likes_num.text(parseInt(likes_num.text()) - 1);
                if(parseInt(likes_num.text()) < 1) {
                    comment.find('.js_comment-likes').hide();
                }
            }
        }, 'json')
        .fail(function() {
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });


    // handle post
    /* toggle post-footer */
    $('body').on('click', '.post-stats-alt', function () {
        $(this).parents('.post').find('.post-footer').toggle();
    });
    /* edit post */
    $('body').on('click', '.js_edit-post', function (e) {
        e.preventDefault();
        var post = $(this).parents('.post');
        post.find('.post-replace').hide().after(render_template("#edit-post", {'text': post.find('.post-text-plain').text()}));
    });
    /* unedit post */
    $('body').on('click', '.js_unedit-post', function () {
        var post = $(this).parents('.post');
        post.find('.post-edit').remove();
        post.find('.post-replace').show();        
    });
    /* update post */
    $('body').on('keydown', '.js_update-post', function (event) {
        if(event.keyCode == 13 && event.shiftKey == 0) {
            event.preventDefault();
            var _this = $(this);
            var post = _this.parents('.post');
            var id = post.attr('data-id');
            var message = _this.val();
            /* check if message is empty */
            if(is_empty(message)) {
                return;
            }
            $.post(api['posts/edit'], {'handle': 'post', 'id': id, 'message': message}, function(response) {
                /* check if there is a callback */
                if(response.callback) {
                    eval(response.callback);
                } else {
                    post.find('.post-edit').remove();
                    post.find('.post-replace').html(response.post).show();
                }
            }, 'json')
            .fail(function() {
                modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
            });
        }
    });
    /* edit privacy */
    $('body').on('click', '.js_edit-privacy', function (e) {
        e.preventDefault();
        var _this = $(this);
        var post = _this.parents('.post');
        var id = post.attr('data-id');
        var privacy = _this.attr('data-value');
        $.post(api['posts/edit'], {'handle': 'privacy', 'id': id, 'privacy': privacy}, function(response) {
            /* check if there is a callback */
            if(response.callback) {
                eval(response.callback);
            }
        }, 'json')
        .fail(function() {
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });
    /* delete post */
    $('body').on('click', '.js_delete-post', function (e) {
        e.preventDefault();
        var post = $(this).parents('.post');
        var id = post.attr('data-id');
        confirm(__['Delete Post'], __['Are you sure you want to delete this post?'], function() {
            $.post(api['posts/reaction'], {'do': 'delete_post', 'id': id}, function(response) {
                /* check the response */
                if(response.callback) {
                    eval(response.callback);
                } else {
                    post.remove();
                    $('#modal').modal('hide');
                }
            }, 'json')
            .fail(function() {
                modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
            });
        });
    });
    /* save post */
    $('body').on('click', '.js_save-post', function (e) {
        e.preventDefault();
        var _this = $(this);
        var post = _this.parents('.post');
        var id = post.attr('data-id');
        $.post(api['posts/reaction'], {'do': 'save_post', 'id': id}, function(response) {
            /* check the response */
            if(response.callback) {
                eval(response.callback);
            } else {
                _this.removeClass('js_save-post').addClass('js_unsave-post').find('span').text(__['Unsave Post']);
            }
        }, 'json')
        .fail(function() {
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });
    /* unsave post */
    $('body').on('click', '.js_unsave-post', function (e) {
        e.preventDefault();
        var _this = $(this);
        var post = _this.parents('.post');
        var id = post.attr('data-id');
        $.post(api['posts/reaction'], {'do': 'unsave_post', 'id': id}, function(response) {
            /* check the response */
            if(response.callback) {
                eval(response.callback);
            } else {
                _this.removeClass('js_unsave-post').addClass('js_save-post').find('span').text(__['Save Post']);
            }
        }, 'json')
        .fail(function() {
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });
    /* pin post */
    $('body').on('click', '.js_pin-post', function (e) {
        e.preventDefault();
        var _this = $(this);
        var post = _this.parents('.post');
        var id = post.attr('data-id');
        $.post(api['posts/reaction'], {'do': 'pin_post', 'id': id}, function(response) {
            /* check the response */
            if(response.callback) {
                eval(response.callback);
            } else {
                _this.removeClass('js_pin-post').addClass('js_unpin-post').find('span').text(__['Unpin Post']);
            }
        }, 'json')
        .fail(function() {
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });
    /* unpin post */
    $('body').on('click', '.js_unpin-post', function (e) {
        e.preventDefault();
        var _this = $(this);
        var post = _this.parents('.post');
        var id = post.attr('data-id');
        $.post(api['posts/reaction'], {'do': 'unpin_post', 'id': id}, function(response) {
            /* check the response */
            if(response.callback) {
                eval(response.callback);
            } else {
                _this.removeClass('js_unpin-post').addClass('js_pin-post').find('span').text(__['Pin Post']);
            }
        }, 'json')
        .fail(function() {
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });
    /* hide post */
    $('body').on('click', '.js_hide-post', function (e) {
        e.preventDefault();
        var post = $(this).parents('.post');
        var id = post.attr('data-id');
        $.post(api['posts/reaction'], {'do': 'hide_post', 'id': id}, function(response) {
            /* check the response */
            if(response.callback) {
                eval(response.callback);
            } else {
                post.hide();
                post.after(render_template("#hidden-post", {'id': id}));
            }
        }, 'json')
        .fail(function() {
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });
    /* unhide post */
    $('body').on('click', '.js_unhide-post', function (e) {
        e.preventDefault();
        var post = $(this).parents('.post');
        var id = post.attr('data-id');
        $.post(api['posts/reaction'], {'do': 'unhide_post', 'id': id}, function(response) {
            /* check the response */
            if(response.callback) {
                eval(response.callback);
            } else {
                post.prev().show();
                post.remove();
            }
        }, 'json')
        .fail(function() {
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });
    /* hide author */
    $('body').on('click', '.js_hide-author', function (e) {
        e.preventDefault();
        var post = $(this).parents('.post');
        var author_id = $(this).attr('data-author-id');
        var author_name = $(this).attr('data-author-name');
        var id = post.attr('data-id');
        $.post(api['users/connect'], {'do': 'unfollow', 'id': author_id} , function(response) {
            if(response.callback) {
                eval(response.callback);
            } else {
                post.hide();
                post.after(render_template("#hidden-author", {'id': id, 'name': author_name, 'uid': author_id}));
            }
        }, "json")
        .fail(function() {
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });
    /* unhide author */
    $('body').on('click', '.js_unhide-author', function (e) {
        e.preventDefault();
        var post = $(this).parents('.post');
        var author_id = $(this).attr('data-author-id');
        var author_name = $(this).attr('data-author-name');
        var id = post.attr('data-id');
        $.post(api['users/connect'], {'do': 'follow', 'id': author_id} , function(response) {
            if(response.callback) {
                eval(response.callback);
            } else {
                post.prev().show();
                post.remove();
            }
        }, "json")
        .fail(function() {
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });
    /* report post */
    $('body').on('click', '.js_report-post', function (e) {
        e.preventDefault();
        var post = $(this).parents('.post');
        var id = post.attr('data-id');
        $.post(api['data/report'], {'do': 'report_post', 'id': id}, function(response) {
            /* check the response */
            if(response.callback) {
                eval(response.callback);
            } else {
                post.hide();
                post.after(render_template("#reported-post", {'id': id}));
            }
        }, 'json')
        .fail(function() {
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });
    /* unreport post */
    $('body').on('click', '.js_unreport-post', function (e) {
        e.preventDefault();
        var post = $(this).parents('.post');
        var id = post.attr('data-id');
        $.post(api['data/report'], {'do': 'unreport_post', 'id': id}, function(response) {
            /* check the response */
            if(response.callback) {
                eval(response.callback);
            } else {
                post.prev().show();
                post.remove();
            }
        }, 'json')
        .fail(function() {
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });
    /* share post */
    $('body').on('click', '.js_share', function () {
        var post = $(this).parents('.post');
        var id = post.attr('data-id');
        confirm(__['Share Post'], __['Are you sure you want to share this post?'], function() {
            $.post(api['posts/reaction'], {'do': 'share', 'id': id}, function(response) {
                /* check the response */
                if(response.callback) {
                    eval(response.callback);
                } else {

                    modal('#modal-success', {title: __['Success'], message: __['This has been shared to your Timeline']});
                }
            }, 'json')
            .fail(function() {
                modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
            });
        });
    });
	/* like post */
	$('body').on('click', '.js_like-post', function () {
        var _this = $(this);
        var post = _this.parents('.post, .lightbox-post');
        var id = post.attr('data-id');
        $.post(api['posts/reaction'], {'do': 'like_post', 'id': id}, function(response) {
            /* check the response */
            if(response.callback) {
                eval(response.callback);
            } else {
                _this.removeClass('js_like-post').addClass('js_unlike-post').text(__['Unlike']);
                post.find('.js_post-likes-num').each(function() {
                    $(this).text(parseInt($(this).text()) + 1);
                })
                post.find('.post-footer, .post-stats, .js_post-likes').show();
            }
        }, 'json')
        .fail(function() {
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
	});
    /* unlike post */
    $('body').on('click', '.js_unlike-post', function () {
        var _this = $(this);
        var post = _this.parents('.post, .lightbox-post');
        var id = post.attr('data-id');
        $.post(api['posts/reaction'], {'do': 'unlike_post', 'id': id}, function(response) {
            /* check the response */
            if(response.callback) {
                eval(response.callback);
            } else {
                _this.removeClass('js_unlike-post').addClass('js_like-post').text(__['Like']);
                post.find('.js_post-likes-num').each(function() {
                    $(this).text(parseInt($(this).text()) - 1);
                });
                if(parseInt(post.find('.js_post-likes-num:first').text()) == 0) {
                    post.find('.js_post-likes').hide();
                    if(post.find('.js_post-shares:hidden')) {
                        post.find('.post-stats').hide();
                    }
                }
            }
        }, 'json')
        .fail(function() {
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });
    /* like photo */
    $('body').on('click', '.js_like-photo', function () {
        var _this = $(this);
        var photo = _this.parents('.post, .lightbox-post');
        var id = photo.attr('data-id');
        $.post(api['posts/reaction'], {'do': 'like_photo', 'id': id}, function(response) {
            /* check the response */
            if(response.callback) {
                eval(response.callback);
            } else {
                _this.removeClass('js_like-photo').addClass('js_unlike-photo').text(__['Unlike']);
                photo.find('.js_post-likes-num').each(function() {
                    $(this).text(parseInt($(this).text()) + 1);
                })
                photo.find('.post-footer, .post-stats, .js_post-likes').show();
            }
        }, 'json')
        .fail(function() {
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });
    /* unlike photo */
    $('body').on('click', '.js_unlike-photo', function () {
        var _this = $(this);
        var photo = _this.parents('.post, .lightbox-post');
        var id = photo.attr('data-id');
        $.post(api['posts/reaction'], {'do': 'unlike_photo', 'id': id}, function(response) {
            /* check the response */
            if(response.callback) {
                eval(response.callback);
            } else {
                _this.removeClass('js_unlike-photo').addClass('js_like-photo').text(__['Like']);
                photo.find('.js_post-likes-num').each(function() {
                    $(this).text(parseInt($(this).text()) - 1);
                });
                if(parseInt(photo.find('.js_post-likes-num').text()) == 0) {
                    photo.find('.js_post-likes').hide();
                    photo.find('.post-stats').hide();
                }
            }
        }, 'json')
        .fail(function() {
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
    });
    /* show shared post attachments */
    $('body').on('click', '.js_show-attachments', function () {
        $(this).next().toggle();
    });


    // handle album
    /* delete album */
    $('body').on('click', '.js_delete-album', function() {
        var _this = $(this);
        var id = $(this).attr('data-id');
        confirm(__['Delete'], __['Are you sure you want to delete this?'], function() {
            $.post(api['albums/action'], {'do': 'delete_album', 'id': id} , function(response) {
                /* check the response */
                if(response.callback) {
                    eval(response.callback);
                }
            }, 'json')
            .fail(function() {
                modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
            });
        });
    });
    /* delete photo */
    $('body').on('click', '.js_delete-photo', function(e) {
        e.stopPropagation();
        e.preventDefault();
        var _this = $(this);
        var id = $(this).attr('data-id');
        confirm(__['Delete'], __['Are you sure you want to delete this?'], function() {
            $.post(api['albums/action'], {'do': 'delete_photo', 'id': id} , function(response) {
                /* check the response */
                if(response.callback) {
                    eval(response.callback);
                } else {
                    /* remove photo */
                    _this.parents('.pg_photo').parent().fadeOut(300, function() { $(this).remove(); });
                    /* hide the confimation */
                    $('#modal').modal('hide');
                }
            }, 'json')
            .fail(function() {
                modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
            });
        });
    });


    // handle announcment
    /* hide */
    $('body').on('click', '.js_announcment-remover', function() {
        var _this = $(this);
        var announcment = _this.parents('.alert');
        var id = announcment.attr('data-id');
        confirm(__['Delete'], __['Are you sure you want to delete this?'], function() {
            /* remove the announcment */
            announcment.fadeOut();
            $.post(api['posts/reaction'], {'do': 'hide_announcement', 'id': id} , function(response) {
                /* check the response */
                if(response.callback) {
                    eval(response.callback);
                }
            }, 'json')
            .fail(function() {
                modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
            });
            /* hide the confimation */
            $('#modal').modal('hide');
        });
    });
    
});