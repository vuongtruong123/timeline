<?php
/**
 * Sngine installer
 * 
 * @package Sngine v2+
 * @author Zamblek
 */

// enviroment settings
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

// set base path
define('BASEPATH',dirname($_SERVER['PHP_SELF']));

// get system version
require('includes/version.php');

// get functions
require('includes/functions.php');

/* the config file exist -> start the system */
if(file_exists('includes/config.php')) {
    _redirect();
}

// check requirements
_check_requirements();


// get system data
$system['system_url'] = _get_system_url();

// install
if(isset($_POST['submit'])) {

    // [0] check valid purchase code
    /* get licence key */
    try {
      $licence_key = _get_licence_key($_POST['purchase_code']);
      if(is_empty($_POST['purchase_code']) || $licence_key === false) {
        _error("Error", "Please enter a valid purchase code");
      }
    }catch (Exception $e) {
      _error("Error", $e->getMessage());
    }
    
    
    // [1] connect to the db
    $db = new mysqli($_POST['db_host'], $_POST['db_username'], $_POST['db_password'], $_POST['db_name']);
    if(mysqli_connect_error()) {
        _error(DB_ERROR);
    }

    // [2] check admin data
    /* check email */
    if(is_empty($_POST['admin_email']) && !valid_email($_POST['admin_email'])) {
        _error("Error", "Please enter a valid admin email");
    }
    /* check username */
    if(is_empty($_POST['admin_username']) && !valid_username($_POST['admin_username'])) {
        _error("Error", "Please enter a valid admin username");
    }
    /* check password */
    if(is_empty($_POST['admin_password']) && strlen($_POST['admin_password']) < 6) {
        _error("Error", "Please enter a valid admin password");
    }


    // [3] create the database
    $structure = "
-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `ads_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `code` text NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ads_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE IF NOT EXISTS `announcements` (
  `announcement_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `code` text NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `announcements_users`
--

CREATE TABLE IF NOT EXISTS `announcements_users` (
  `announcement_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `announcement_id_user_id` (`announcement_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE IF NOT EXISTS `conversations` (
  `conversation_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `last_message_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`conversation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `conversations_messages`
--

CREATE TABLE IF NOT EXISTS `conversations_messages` (
  `message_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `conversation_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `message` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `conversations_users`
--

CREATE TABLE IF NOT EXISTS `conversations_users` (
  `conversation_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `seen` enum('0','1') NOT NULL DEFAULT '0',
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  UNIQUE KEY `conversation_id_user_id` (`conversation_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Table structure for table `followings`
--

CREATE TABLE IF NOT EXISTS `followings` (
  `user_id` int(10) unsigned NOT NULL,
  `following_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `user_id_following_id` (`user_id`,`following_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_one_id` int(10) unsigned NOT NULL,
  `user_two_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_one_id_user_two_id` (`user_one_id`,`user_two_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `game_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `source` text CHARACTER SET latin1 NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`game_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_admin` int(10) unsigned NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `group_title` varchar(255) NOT NULL,
  `group_picture` varchar(255) NOT NULL,
  `group_picture_id` int(10) unsigned NOT NULL,
  `group_cover` varchar(255) NOT NULL,
  `group_cover_id` int(10) unsigned NOT NULL,
  `group_album_pictures` int(10) NOT NULL,
  `group_album_covers` int(10) NOT NULL,
  `group_album_timeline` int(10) NOT NULL,
  `group_pinned_post` int(10) NOT NULL,
  `group_description` text NOT NULL,
  `group_members` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`group_id`),
  UNIQUE KEY `username` (`group_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups_members`
--

CREATE TABLE IF NOT EXISTS `groups_members` (
  `group_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `group_id_user_id` (`group_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `notification_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `to_user_id` int(10) unsigned NOT NULL,
  `from_user_id` int(10) unsigned NOT NULL,
  `action` varchar(50) NOT NULL,
  `node_type` varchar(50) NOT NULL,
  `node_url` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `seen` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`notification_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_admin` int(10) unsigned NOT NULL,
  `page_category` int(10) unsigned NOT NULL,
  `page_name` varchar(50) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_description` text NOT NULL,
  `page_picture` varchar(255) NOT NULL,
  `page_picture_id` int(10) NOT NULL,
  `page_cover` varchar(255) NOT NULL,
  `page_cover_id` int(10) NOT NULL,
  `page_album_pictures` int(10) unsigned NOT NULL,
  `page_album_covers` int(10) unsigned NOT NULL,
  `page_album_timeline` int(10) unsigned NOT NULL,
  `page_pinned_post` int(10) unsigned NOT NULL,
  `page_verified` enum('0','1') NOT NULL DEFAULT '0',
  `page_likes` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`page_id`),
  UNIQUE KEY `username` (`page_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages_categories`
--

CREATE TABLE IF NOT EXISTS `pages_categories` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pages_categories`
--

INSERT INTO `pages_categories` (`category_id`, `category_name`) VALUES
(1, 'Service'),
(2, 'Musician/Band'),
(3, 'Brand or Product'),
(4, 'Company, Organization or Institution'),
(5, 'Artist, Public figure'),
(6, 'Entertainment'),
(7, 'Cause or Community');

-- --------------------------------------------------------

--
-- Table structure for table `pages_likes`
--

CREATE TABLE IF NOT EXISTS `pages_likes` (
  `page_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `page_id_user_id` (`page_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` enum('user','page') NOT NULL,
  `in_group` enum('0','1') NOT NULL DEFAULT '0',
  `group_id` int(10) unsigned DEFAULT NULL,
  `in_wall` enum('0','1') NOT NULL DEFAULT '0',
  `wall_id` int(10) unsigned DEFAULT NULL,
  `post_type` varchar(50) NOT NULL,
  `origin_id` int(10) unsigned DEFAULT NULL,
  `time` datetime NOT NULL,
  `location` varchar(50) NOT NULL,
  `privacy` varchar(50) NOT NULL,
  `text` longtext NOT NULL,
  `likes` int(10) unsigned NOT NULL DEFAULT '0',
  `comments` int(10) unsigned NOT NULL DEFAULT '0',
  `shares` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts_audios`
--

CREATE TABLE IF NOT EXISTS `posts_audios` (
  `audio_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `source` varchar(255) NOT NULL,
  PRIMARY KEY (`audio_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts_comments`
--

CREATE TABLE IF NOT EXISTS `posts_comments` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `node_id` int(10) unsigned NOT NULL,
  `node_type` enum('post','photo') NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` enum('user','page') NOT NULL,
  `text` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `time` datetime NOT NULL,
  `likes` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts_comments_likes`
--

CREATE TABLE IF NOT EXISTS `posts_comments_likes` (
  `user_id` int(10) unsigned NOT NULL,
  `comment_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `comment_id_user_id` (`comment_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `posts_files`
--

CREATE TABLE IF NOT EXISTS `posts_files` (
  `file_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `source` varchar(255) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts_hidden`
--

CREATE TABLE IF NOT EXISTS `posts_hidden` (
  `user_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `post_id_user_id` (`post_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `posts_likes`
--

CREATE TABLE IF NOT EXISTS `posts_likes` (
  `user_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `post_id_user_id` (`post_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts_links`
--

CREATE TABLE IF NOT EXISTS `posts_links` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `source_url` tinytext NOT NULL,
  `source_host` varchar(255) NOT NULL,
  `source_title` varchar(255) NOT NULL,
  `source_text` text NOT NULL,
  `source_thumbnail` varchar(255) NOT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts_media`
--

CREATE TABLE IF NOT EXISTS `posts_media` (
  `media_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) NOT NULL,
  `source_url` text NOT NULL,
  `source_provider` varchar(255) NOT NULL,
  `source_type` varchar(255) NOT NULL,
  `source_title` varchar(255) DEFAULT NULL,
  `source_text` text,
  `source_html` text,
  PRIMARY KEY (`media_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts_photos`
--

CREATE TABLE IF NOT EXISTS `posts_photos` (
  `photo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `album_id` int(10) unsigned NOT NULL,
  `source` varchar(255) NOT NULL,
  `likes` int(10) unsigned NOT NULL DEFAULT '0',
  `comments` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`photo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts_photos_albums`
--

CREATE TABLE IF NOT EXISTS `posts_photos_albums` (
  `album_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` enum('user','page') NOT NULL,
  `in_group` enum('0','1') NOT NULL DEFAULT '0',
  `group_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `privacy` enum('me','friends','public') NOT NULL DEFAULT 'public',
  PRIMARY KEY (`album_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts_photos_likes`
--

CREATE TABLE IF NOT EXISTS `posts_photos_likes` (
  `user_id` int(10) unsigned NOT NULL,
  `photo_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `user_id_photo_id` (`user_id`,`photo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Table structure for table `posts_saved`
--

CREATE TABLE IF NOT EXISTS `posts_saved` (
  `post_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `time` datetime NOT NULL,
  UNIQUE KEY `post_id_user_id` (`post_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts_videos`
--

CREATE TABLE IF NOT EXISTS `posts_videos` (
  `video_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `source` varchar(255) NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `report_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `node_id` int(10) NOT NULL,
  `node_type` varchar(50) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `static_pages`
--

CREATE TABLE IF NOT EXISTS `static_pages` (
  `page_id` int(10) NOT NULL AUTO_INCREMENT,
  `page_url` varchar(50) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_text` text NOT NULL,
  PRIMARY KEY (`page_id`),
  UNIQUE KEY `page_url` (`page_url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `static_pages`
--

INSERT INTO `static_pages` (`page_id`, `page_url`, `page_title`, `page_text`) VALUES
(1, 'about', 'About', '&lt;p&gt;\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n            &lt;/p&gt;\r\n            &lt;h3 class=&quot;text-info&quot;&gt;\r\n                Big Title\r\n            &lt;/h3&gt;\r\n            &lt;p&gt;\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n            &lt;/p&gt;\r\n            &lt;h3 class=&quot;text-info&quot;&gt;\r\n                Big Title\r\n            &lt;/h3&gt;\r\n            &lt;p&gt;\r\n               Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n            &lt;/p&gt;'),
(2, 'terms', 'Terms', '&lt;p&gt;\r\n    &lt;strong&gt;\r\n        We run this website and permits its use according to the following terms and conditions:\r\n    &lt;/strong&gt;\r\n&lt;/p&gt;\r\n\r\n&lt;h3 class=&quot;text-info&quot;&gt;\r\n    Basic Terms:\r\n&lt;/h3&gt;\r\n&lt;ol&gt;\r\n    &lt;li&gt;Using this website implies your acceptance of these conditions. If you do not fully accept them, your entry to this site will be considered unauthorized and you will have to stop using it immediately&lt;/li&gt;\r\n    &lt;li&gt;You must be 13 years or older to use this site.&lt;/li&gt;\r\n    &lt;li&gt;You are responsible for any activity that occurs under your screen name.&lt;/li&gt;\r\n    &lt;li&gt;You are responsible for keeping your account secure.&lt;/li&gt;\r\n    &lt;li&gt;You must not abuse, harass, threaten or intimidate other Sngine users.&lt;/li&gt;\r\n    &lt;li&gt;You are solely responsible for your conduct and any data, text, information, screen names, graphics, photos, profiles, audio and video clips, links (&quot;Content&quot;) that you submit, post, and display on the Sngine service.&lt;/li&gt;\r\n    &lt;li&gt;You must not modify, adapt or hack Sngine or modify another website so as to falsely imply that it is associated with Sngine&lt;/li&gt;\r\n    &lt;li&gt;You must not create or submit unwanted email to any Sngine members (&quot;Spam&quot;).&lt;/li&gt;\r\n    &lt;li&gt;You must not transmit any worms or viruses or any code of a destructive nature.&lt;/li&gt;\r\n    &lt;li&gt;You must not, in the use of Sngine, violate any laws in your jurisdiction (including but not limited to copyright laws).&lt;/li&gt;\r\n&lt;/ol&gt;\r\n&lt;p&gt;\r\n    Violation of any of these agreements will result in the termination of your Sngine account. While Sngine prohibits such conduct and content on its site, you understand and agree that Sngine cannot be responsible for the Content posted on its web site and you nonetheless may be exposed to such materials and that you use the Sngine service at your own risk.\r\n&lt;/p&gt;\r\n\r\n\r\n&lt;h3 class=&quot;text-info&quot;&gt;\r\n    General Conditions:\r\n&lt;/h3&gt;\r\n&lt;ol&gt;\r\n    &lt;li&gt;We reserve the right to modify or terminate the Sngine service for any reason, without notice at any time.&lt;/li&gt;\r\n    &lt;li&gt;We reserve the right to alter these Terms of Use at any time. If the alterations constitute a material change to the Terms of Use, we will notify you via internet mail according to the preference expressed on your account. What constitutes a &quot;material change&quot; will be determined at our sole discretion, in good faith and using common sense and reasonable judgement.&lt;/li&gt;\r\n    &lt;li&gt;We reserve the right to refuse service to anyone for any reason at any time.&lt;/li&gt;\r\n    &lt;li&gt;We may, but have no obligation to, remove Content and accounts containing Content that we determine in our sole discretion are unlawful, offensive, threatening, libelous, defamatory, obscene or otherwise objectionable or violates any party&#039;s intellectual property or these Terms of Use.&lt;/li&gt;\r\n    &lt;li&gt;Sngine service makes it possible to post images and text hosted on Sngine to outside websites. This use is accepted (and even encouraged!). However, pages on other websites which display data hosted on Sngine must provide a link back to Sngine.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;h3 class=&quot;text-info&quot;&gt;\r\n    Copyright (What&#039;s Yours is Yours):\r\n&lt;/h3&gt;\r\n&lt;ol&gt;\r\n    &lt;li&gt;We claim no intellectual property rights over the material you provide to the Sngine service. Your profile and materials uploaded remain yours. You can remove your profile at any time by deleting your account. This will also remove any text and images you have stored in the system.&lt;/li&gt;\r\n    &lt;li&gt;We encourage users to contribute their creations to the public domain or consider progressive licensing terms.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n&lt;small&gt;\r\n    &lt;i&gt;Last updated on: Jan 29, 2016&lt;/i&gt;\r\n&lt;/small&gt;'),
(3, 'privacy', 'Privacy', '&lt;p&gt;\r\n    We recognize that your privacy is very important and take it seriously. This Privacy Policy describes Sngine&#039;s policies and procedures on the collection, use and disclosure of your information when you use the Sngine Service. We will not use or share your information with anyone except as described in this Privacy Policy.\r\n&lt;/p&gt;\r\n\r\n&lt;h3 class=&quot;text-info&quot;&gt;\r\n    Information Collection and Use\r\n&lt;/h3&gt;\r\n&lt;p&gt;\r\n    We uses information we collect to analyze how the Service is used, diagnose service or technical problems, maintain security, personalize content, remember information to help you efficiently access your account, monitor aggregate metrics such as total number of visitors, traffic, and demographic patterns, and track User Content and users as necessary to comply with the Digital Millennium Copyright Act and other applicable laws.\r\n&lt;/p&gt;\r\n&lt;h4 class=&quot;text-danger&quot;&gt;\r\n    User-Provided Information:\r\n&lt;/h5&gt;\r\n&lt;p&gt;\r\n    You provide us information about yourself, such as your name and e-mail address, if you register for a member account with the Service. Your name and other information you choose to add to your profile will be available for public viewing on the Service. We may use your email address to send you Service-related notices. You can control receipt of certain Service-related messages on your Settings page. We may also use your contact information to send you marketing messages. If you do not want to receive such messages, you may opt out by following the instructions in the message. If you correspond with us by email, we may retain the content of your email messages, your email address and our responses.\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n    You also provide us information in User Content you post to the Service. Your posts and other contributions on the Service, and metadata about them (such as when you posted them), are publicly viewable on the Service, along with your name (unless the Service permits you to post anonymously). This information may be searched by search engines and be republished elsewhere on the Web in accordance with our Terms of Service.\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n    If you choose to use our invitation service to invite a friend to the Service, we will ask you for that person&#039;s email address and automatically send an email invitation. We stores this information to send this email, to register your friend if your invitation is accepted, and to track the success of our invitation service.\r\n&lt;/p&gt;\r\n&lt;h4 class=&quot;text-danger&quot;&gt;\r\n    Cookies:\r\n&lt;/h5&gt;\r\n&lt;p&gt;\r\n    When you visit the Service, we may send one or more &quot;cookies&quot; - small data files - to your computer to uniquely identify your browser and let Sngine help you log in faster and enhance your navigation through the site. A cookie may convey anonymous information about how you browse the Service to us, but does not collect personal information about you. A persistent cookie remains on your computer after you close your browser so that it can be used by your browser on subsequent visits to the Service. Persistent cookies can be removed by following your web browser&#039;s directions. A session cookie is temporary and disappears after you close your browser. You can reset your web browser to refuse all cookies or to indicate when a cookie is being sent. However, some features of the Service may not function properly if the ability to accept cookies is disabled.\r\n&lt;/p&gt;\r\n&lt;h4 class=&quot;text-danger&quot;&gt;\r\n    Log Files:\r\n&lt;/h5&gt;\r\n&lt;p&gt;\r\n    Log file information is automatically reported by your browser each time you access a web page. When you use the Service, our servers automatically record certain information that your web browser sends whenever you visit any website. These server logs may include information such as your web request, Internet Protocol (&quot;IP&quot;) address, browser type, referring / exit pages and URLs, number of clicks, domain names, landing pages, pages viewed, and other such information.\r\n&lt;/p&gt;\r\n&lt;h4 class=&quot;text-danger&quot;&gt;\r\n    Third Party Services:\r\n&lt;/h5&gt;\r\n&lt;p&gt;\r\n    We may use Google Analytics or Mixpanel to help understand use of the Service. Google Analytics and Mixpanel collect the information sent by your browser as part of a web page request, including cookies and your IP address. Google Analytics and Mixpanel also receive this information and their use of it is governed by their Privacy Policies.\r\n&lt;/p&gt;\r\n\r\n&lt;h3 class=&quot;text-info&quot;&gt;\r\n    How We Share Your Information\r\n&lt;/h3&gt;\r\n&lt;h4 class=&quot;text-danger&quot;&gt;\r\n    Personally Identifiable Information:\r\n&lt;/h5&gt;\r\n&lt;p&gt;\r\n    We may share your personally identifiable information with third parties for the purpose of providing the Service to you. If we do this, such third parties&#039; use of your information will be bound by this Privacy Policy. We may store personal information in locations outside the direct control of Sngine (for instance, on servers or databases co-located with hosting providers).\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n    We may share or disclose your information with your consent, such as if you choose to sign on to the Service through a third-party service. We cannot control third parties&#039; use of your information.\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n    Sngine may disclose your personal information if required to do so by law or subpoena or if we believe that it is reasonably necessary to comply with a law, regulation or legal request; to protect the safety of any person; to address fraud, security or technical issues; or to protect Sngine&#039;s rights or property.\r\n&lt;/p&gt;\r\n&lt;h4 class=&quot;text-danger&quot;&gt;\r\n    Non-Personally Identifiable Information:\r\n&lt;/h5&gt;\r\n&lt;p&gt;\r\n    We may share non-personally identifiable information (such as anonymous usage data, referring/exit pages and URLs, platform types, number of clicks, etc.) with interested third parties to help them understand the usage patterns for certain Sngine services.\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n    Sngine may allow third-party ad servers or ad networks to serve advertisements on the Service. These third-party ad servers or ad networks use technology to send, directly to your browser, the advertisements and links that appear on Sngine. They automatically receive your IP address when this happens. They may also use other technologies (such as cookies, JavaScript, or web beacons) to measure the effectiveness of their advertisements and to personalize the advertising content. Sngine does not provide any personally identifiable information to these third-party ad servers or ad networks without your consent. However, please note that if an advertiser asks Sngine to show an advertisement to a certain audience and you respond to that advertisement, the advertiser or ad server may conclude that you fit the description of the audience they are trying to reach. The Sngine Privacy Policy does not apply to, and we cannot control the activities of, third-party advertisers. Please consult the respective privacy policies of such advertisers for more information.\r\n&lt;/p&gt;\r\n\r\n&lt;h3 class=&quot;text-info&quot;&gt;\r\n    How We Protect Your Information\r\n&lt;/h3&gt;\r\n&lt;p&gt;\r\n    We uses commercially reasonable physical, managerial, and technical safeguards to preserve the integrity and security of your personal information. We cannot, however, ensure or warrant the security of any information you transmit to Sngine or guarantee that your information on the Service may not be accessed, disclosed, altered, or destroyed by breach of any of our physical, technical, or managerial safeguards.\r\n&lt;/p&gt;\r\n\r\n&lt;h3 class=&quot;text-info&quot;&gt;\r\n    Your Choices About Your Information\r\n&lt;/h3&gt;\r\n&lt;p&gt;\r\n    You may, of course, decline to submit personally identifiable information through the Service, in which case Sngine may not be able to provide certain services to you. You may update or correct your account information and email preferences at any time by logging in to your account.\r\n&lt;/p&gt;\r\n\r\n\r\n&lt;h3 class=&quot;text-info&quot;&gt;\r\n    Links to Other Web Sites\r\n&lt;/h3&gt;\r\n&lt;p&gt;\r\n    We are not responsible for the practices employed by websites linked to or from the Service, nor the information or content contained therein. Please remember that when you use a link to go from the Service to another website, our Privacy Policy is no longer in effect. Your browsing and interaction on any other website, including those that have a link on our website, is subject to that website&#039;s own rules and policies.\r\n&lt;/p&gt;\r\n\r\n&lt;h3 class=&quot;text-info&quot;&gt;\r\n    Changes to Our Privacy Policy\r\n&lt;/h3&gt;\r\n&lt;p&gt;\r\n    If we change our privacy policies and procedures, we will post those changes on this page to keep you aware of what information we collect, how we use it and under what circumstances we may disclose it. Changes to this Privacy Policy are effective when they are posted on this page.\r\n&lt;/p&gt;\r\n&lt;small&gt;\r\n    &lt;i&gt;Last updated on: Jan 29, 2016&lt;/i&gt;\r\n&lt;/small&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `system_languages`
--

CREATE TABLE IF NOT EXISTS `system_languages` (
  `language_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `flag_icon` varchar(50) NOT NULL,
  `dir` enum('LTR','RTL') NOT NULL,
  `default` enum('0','1') NOT NULL,
  `enabled` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`language_id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `system_languages`
--

INSERT INTO `system_languages` (`language_id`, `code`, `title`, `flag_icon`, `dir`, `default`, `enabled`) VALUES
(1, 'en_us', 'English', 'us', 'LTR', '1', '1'),
(2, 'ar_sa', 'Arabic', 'sa', 'RTL', '0', '1'),
(3, 'fr_fr', 'Fran&ccedil;ais', 'fr', 'LTR', '0', '1'),
(4, 'es_es', 'Espa&ntilde;ol', 'es', 'LTR', '0', '1'),
(5, 'pt_pt', 'Portugu&ecirc;s', 'pt', 'LTR', '0', '1'),
(6, 'de_de', 'Deutsch', 'de', 'LTR', '0', '1'),
(7, 'tr_tr', 'T&uuml;rk&ccedil;e', 'tr', 'LTR', '0', '1'),
(8, 'nl_nl', 'Dutch', 'nl', 'LTR', '0', '1'),
(9, 'it_it', 'Italiano', 'it', 'LTR', '0', '1'),
(10, 'ru_ru', 'Russian', 'ru', 'LTR', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `system_options`
--

CREATE TABLE IF NOT EXISTS `system_options` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `system_licence` varchar(255) NOT NULL,
  `system_kernel` varchar(255) NOT NULL,
  `system_live` enum('1','0') NOT NULL DEFAULT '1',
  `system_message` text NOT NULL,
  `system_public` enum('1','0') NOT NULL DEFAULT '1',
  `system_title` varchar(255) NOT NULL DEFAULT 'Sngine',
  `system_description` text NOT NULL,
  `system_keywords` text NOT NULL,
  `system_url` varchar(255) NOT NULL,
  `system_uploads_directory` varchar(255) NOT NULL,
  `wall_posts_enabled` enum('1','0') NOT NULL DEFAULT '1',
  `pages_enabled` enum('1','0') NOT NULL DEFAULT '1',
  `groups_enabled` enum('1','0') NOT NULL DEFAULT '1',
  `profile_notification_enabled` enum('1','0') NOT NULL DEFAULT '1',
  `games_enabled` enum('1','0') NOT NULL DEFAULT '1',
  `geolocation_enabled` enum('1','0') NOT NULL DEFAULT '1',
  `geolocation_key` varchar(255) NOT NULL,
  `registration_enabled` enum('1','0') NOT NULL DEFAULT '1',
  `getting_started` enum('1','0') NOT NULL DEFAULT '1',
  `delete_accounts_enabled` enum('1','0') NOT NULL DEFAULT '1',
  `max_accounts` int(10) unsigned NOT NULL DEFAULT '0',
  `social_login_enabled` enum('1','0') NOT NULL DEFAULT '0',
  `facebook_login_enabled` enum('1','0') NOT NULL DEFAULT '0',
  `facebook_appid` varchar(255) DEFAULT NULL,
  `facebook_secret` varchar(255) DEFAULT NULL,
  `twitter_login_enabled` enum('1','0') NOT NULL DEFAULT '0',
  `twitter_appid` varchar(255) DEFAULT NULL,
  `twitter_secret` varchar(255) DEFAULT NULL,
  `google_login_enabled` enum('1','0') NOT NULL DEFAULT '0',
  `google_appid` varchar(255) DEFAULT NULL,
  `google_secret` varchar(255) DEFAULT NULL,
  `linkedin_login_enabled` enum('1','0') NOT NULL DEFAULT '0',
  `linkedin_appid` varchar(255) DEFAULT NULL,
  `linkedin_secret` varchar(255) DEFAULT NULL,
  `vkontakte_secret` varchar(255) DEFAULT NULL,
  `vkontakte_login_enabled` enum('1','0') NOT NULL DEFAULT '0',
  `vkontakte_appid` varchar(255) DEFAULT NULL,
  `email_send_activation` enum('1','0') NOT NULL DEFAULT '1',
  `email_smtp_enabled` enum('1','0') NOT NULL DEFAULT '0',
  `email_smtp_authentication` enum('1','0') NOT NULL DEFAULT '1',
  `email_smtp_server` varchar(255) NOT NULL,
  `email_smtp_port` varchar(255) NOT NULL,
  `email_smtp_username` varchar(255) NOT NULL,
  `email_smtp_password` varchar(255) NOT NULL,
  `chat_enabled` enum('1','0') NOT NULL DEFAULT '1',
  `chat_status_enabled` enum('1','0') NOT NULL DEFAULT '1',
  `uploads_prefix` varchar(255) NOT NULL DEFAULT 'sngine',
  `max_avatar_size` int(10) unsigned NOT NULL DEFAULT '5120',
  `max_cover_size` int(10) unsigned NOT NULL DEFAULT '5120',
  `photos_enabled` enum('1','0') NOT NULL DEFAULT '1',
  `max_photo_size` int(10) unsigned NOT NULL DEFAULT '5120',
  `videos_enabled` enum('1','0') NOT NULL DEFAULT '1',
  `max_video_size` int(10) unsigned NOT NULL DEFAULT '5120',
  `video_extensions` text NOT NULL,
  `audio_enabled` enum('1','0') NOT NULL DEFAULT '1',
  `max_audio_size` int(10) unsigned NOT NULL DEFAULT '5120',
  `audio_extensions` text NOT NULL,
  `file_enabled` enum('1','0') NOT NULL DEFAULT '1',
  `max_file_size` int(10) unsigned NOT NULL DEFAULT '5120',
  `file_extensions` text NOT NULL,
  `censored_words_enabled` enum('1','0') NOT NULL DEFAULT '1',
  `censored_words` text NOT NULL,
  `reCAPTCHA_enabled` enum('1','0') NOT NULL DEFAULT '0',
  `reCAPTCHA_site_key` varchar(255) NOT NULL,
  `reCAPTCHA_secret_key` varchar(255) NOT NULL,
  `data_heartbeat` int(10) unsigned NOT NULL DEFAULT '5',
  `chat_heartbeat` int(10) unsigned NOT NULL DEFAULT '5',
  `offline_time` int(10) unsigned NOT NULL DEFAULT '10',
  `min_results` int(10) unsigned NOT NULL DEFAULT '5',
  `max_results` int(10) unsigned NOT NULL DEFAULT '10',
  `min_results_even` int(10) unsigned NOT NULL DEFAULT '6',
  `max_results_even` int(10) unsigned NOT NULL DEFAULT '12',
  `analytics_code` text,
  `system_logo` varchar(255) NOT NULL,
  `system_favicon` varchar(255) NOT NULL,
  `system_favicon_default` enum('1','0') NOT NULL DEFAULT '1',
  `system_ogimage` varchar(255) NOT NULL,
  `system_ogimage_default` enum('1','0') NOT NULL DEFAULT '1',
  `css_customized` enum('1','0') NOT NULL DEFAULT '0',
  `css_background` varchar(50) NOT NULL,
  `css_link_color` varchar(50) NOT NULL,
  `css_header` varchar(50) NOT NULL,
  `css_header_search` varchar(50) NOT NULL,
  `css_header_search_color` varchar(50) NOT NULL,
  `css_btn_primary` varchar(50) NOT NULL,
  `css_menu_background` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `system_options`
--

INSERT INTO `system_options` (`ID`, `system_licence`, `system_kernel`, `system_live`, `system_message`, `system_public`, `system_title`, `system_description`, `system_keywords`, `system_url`, `system_uploads_directory`, `wall_posts_enabled`, `pages_enabled`, `groups_enabled`, `profile_notification_enabled`, `games_enabled`, `geolocation_enabled`, `geolocation_key`, `registration_enabled`, `getting_started`, `delete_accounts_enabled`, `max_accounts`, `social_login_enabled`, `facebook_login_enabled`, `facebook_appid`, `facebook_secret`, `twitter_login_enabled`, `twitter_appid`, `twitter_secret`, `google_login_enabled`, `google_appid`, `google_secret`, `linkedin_login_enabled`, `linkedin_appid`, `linkedin_secret`, `vkontakte_secret`, `vkontakte_login_enabled`, `vkontakte_appid`, `email_send_activation`, `email_smtp_enabled`, `email_smtp_authentication`, `email_smtp_server`, `email_smtp_port`, `email_smtp_username`, `email_smtp_password`, `chat_enabled`, `chat_status_enabled`, `uploads_prefix`, `max_avatar_size`, `max_cover_size`, `photos_enabled`, `max_photo_size`, `videos_enabled`, `max_video_size`, `video_extensions`, `audio_enabled`, `max_audio_size`, `audio_extensions`, `file_enabled`, `max_file_size`, `file_extensions`, `censored_words_enabled`, `censored_words`, `reCAPTCHA_enabled`, `reCAPTCHA_site_key`, `reCAPTCHA_secret_key`, `data_heartbeat`, `chat_heartbeat`, `offline_time`, `min_results`, `max_results`, `min_results_even`, `max_results_even`, `analytics_code`, `system_logo`, `system_favicon`, `system_favicon_default`, `system_ogimage`, `system_ogimage_default`, `css_customized`, `css_background`, `css_link_color`, `css_header`, `css_header_search`, `css_header_search_color`, `css_btn_primary`, `css_menu_background`) VALUES
(1, '', '', '1', '', '1', 'Sngine', '', 'social, sngine', '', 'content/uploads', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', 0, '0', '0', '', '', '0', '', '', '0', '', '', '0', '', '', '', '0', '', '', '', '', '', '', '', '', '1', '1', 'sngine', 5120, 5120, '1', 5120, '1', 5120, 'mp4, mov', '1', 512000, 'mp3, wav', '1', 5120, 'txt, zip', '1', 'pussy,fuck,shit,asshole,dick,tits,boobs', '', '', '', 5, 5, 10, 5, 10, 6, 12, '', '', '', '1', '', '1', '0', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `system_themes`
--

CREATE TABLE IF NOT EXISTS `system_themes` (
  `theme_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `default` enum('0','1') NOT NULL,
  PRIMARY KEY (`theme_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=2 ;

--
-- Dumping data for table `system_themes`
--

INSERT INTO `system_themes` (`theme_id`, `name`, `default`) VALUES
(1, 'default', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_group` tinyint(1) unsigned NOT NULL DEFAULT '3',
  `user_name` varchar(64) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_token` varchar(64) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_gender` enum('male','female') NOT NULL,
  `user_picture` varchar(255) NOT NULL,
  `user_picture_id` int(10) unsigned NOT NULL,
  `user_cover` varchar(255) NOT NULL,
  `user_cover_id` int(10) unsigned NOT NULL,
  `user_album_pictures` int(10) unsigned NOT NULL,
  `user_album_covers` int(10) unsigned NOT NULL,
  `user_album_timeline` int(10) unsigned NOT NULL,
  `user_pinned_post` int(10) unsigned NOT NULL,
  `user_work_title` varchar(50) NOT NULL,
  `user_work_place` varchar(50) NOT NULL,
  `user_current_city` varchar(50) NOT NULL,
  `user_hometown` varchar(50) NOT NULL,
  `user_edu_major` varchar(50) DEFAULT NULL,
  `user_edu_school` varchar(50) NOT NULL,
  `user_edu_class` varchar(50) NOT NULL,
  `user_birthdate` date DEFAULT NULL,
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_last_login` datetime NOT NULL,
  `user_privacy_wall` enum('me','friends','public') NOT NULL DEFAULT 'friends',
  `user_privacy_birthdate` enum('me','friends','public') NOT NULL DEFAULT 'public',
  `user_privacy_work` enum('me','friends','public') NOT NULL DEFAULT 'public',
  `user_privacy_location` enum('me','friends','public') NOT NULL DEFAULT 'public',
  `user_privacy_education` enum('me','friends','public') NOT NULL DEFAULT 'public',
  `user_privacy_friends` enum('me','friends','public') NOT NULL DEFAULT 'public',
  `user_privacy_photos` enum('me','friends','public') NOT NULL DEFAULT 'public',
  `user_privacy_pages` enum('me','friends','public') NOT NULL DEFAULT 'public',
  `user_privacy_groups` enum('me','friends','public') NOT NULL DEFAULT 'public',
  `user_activation_key` varchar(64) NOT NULL,
  `user_activated` enum('0','1') NOT NULL DEFAULT '0',
  `user_verified` enum('0','1') NOT NULL DEFAULT '0',
  `user_started` enum('0','1') NOT NULL DEFAULT '0',
  `user_reseted` enum('0','1') NOT NULL DEFAULT '0',
  `user_reset_key` varchar(64) NOT NULL,
  `user_blocked` enum('0','1') NOT NULL DEFAULT '0',
  `user_ip` varchar(64) NOT NULL,
  `user_chat_enabled` enum('0','1') NOT NULL DEFAULT '1',
  `user_live_requests_counter` int(10) NOT NULL DEFAULT '0',
  `user_live_requests_lastid` int(10) NOT NULL DEFAULT '0',
  `user_live_messages_counter` int(10) NOT NULL DEFAULT '0',
  `user_live_messages_lastid` int(10) NOT NULL DEFAULT '0',
  `user_live_notifications_counter` int(10) NOT NULL DEFAULT '0',
  `user_live_notifications_lastid` int(10) NOT NULL DEFAULT '0',
  `facebook_connected` enum('0','1') NOT NULL DEFAULT '0',
  `facebook_id` varchar(255) DEFAULT NULL,
  `twitter_connected` enum('0','1') NOT NULL DEFAULT '0',
  `twitter_id` varchar(255) DEFAULT NULL,
  `google_connected` enum('0','1') NOT NULL DEFAULT '0',
  `google_id` varchar(255) DEFAULT NULL,
  `linkedin_connected` enum('0','1') NOT NULL DEFAULT '0',
  `linkedin_id` varchar(255) DEFAULT NULL,
  `vkontakte_connected` enum('0','1') NOT NULL DEFAULT '0',
  `vkontakte_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `user_token` (`user_token`),
  UNIQUE KEY `facebook_id` (`facebook_id`),
  UNIQUE KEY `twitter_id` (`twitter_id`),
  UNIQUE KEY `google_id` (`google_id`),
  UNIQUE KEY `linkedin_id` (`linkedin_id`),
  UNIQUE KEY `vkontakte_id` (`vkontakte_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_blocks`
--

CREATE TABLE IF NOT EXISTS `users_blocks` (
  `user_id` int(10) unsigned NOT NULL,
  `blocked_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `user_id_blocked_id` (`user_id`,`blocked_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE IF NOT EXISTS `users_online` (
  `user_id` int(10) unsigned NOT NULL,
  `last_seen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `UserID` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE IF NOT EXISTS `widgets` (
  `widget_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `code` text NOT NULL,
  PRIMARY KEY (`widget_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;";
    

    $db->multi_query($structure) or _error("Error", $db->error);
    // flush multi_queries
    do{} while(mysqli_more_results($db) && mysqli_next_result($db));


    // [4] update system settings
    $db->query(sprintf("UPDATE system_options SET system_licence = %s, system_url = %s, system_kernel = %s", secure($licence_key), secure($system['system_url']), secure($sngine_kernel) )) or _error("Error #101", $db->error);

    // [5] Add the admin
    /* generate user token */
    $token = md5(time()*rand(1, 9999));
    /* insert */
    $db->query(sprintf("INSERT INTO users (user_group, user_email, user_name, user_token, user_fullname, user_password, user_gender, user_activated, user_verified, user_started, user_registered, user_ip) VALUES ('1', %s, %s, %s, %s, %s, 'male', '1', '1', '1', %s, %s)", secure($_POST['admin_email']), secure($_POST['admin_username']), secure($token), secure($_POST['admin_username']), secure(md5($_POST['admin_password'])), secure(gmdate('Y-m-d H:i:s')), secure($_SERVER[REMOTE_ADDR]) )) or _error("Error #102", $db->error);


    // [6] create config file
    $config_string = '<?php  
    define("DB_NAME", "'. $_POST["db_name"]. '");
    define("DB_USER", "'. $_POST["db_username"]. '");
    define("DB_PASSWORD", "'. $_POST["db_password"]. '");
    define("DB_HOST", "'. $_POST["db_host"]. '");
    define("DEBUGGING", false);
    define("DEFAULT_LOCALE", "en_us");
    define("SNGINE_KEY", "'. $licence_key. '");
    
    ?>';
    
    $config_file = 'includes/config.php';
    $handle = fopen($config_file, 'w') or _error("System Error", "Cannot create the config file");
    
    fwrite($handle, $config_string);
    fclose($handle);
    
    _redirect();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        
        <title>Sngine v2+ &rsaquo; Installer</title>
        
        <link rel="stylesheet" type="text/css" href="includes/assets/js/installer/installer.css" />
        <script src="includes/assets/js/installer/modernizr.custom.js"></script>
    </head>

    <body>
        
        <div class="container">

            <div class="fs-form-wrap" id="fs-form-wrap">
                
                <div class="fs-title">
                    <h1>Sngine v2+ Installer (<?php echo $sngine_version ?>)</h1>
                </div>
                
                <form id="myform" class="fs-form fs-form-full" autocomplete="off" action="install.php" method="post">
                    <ol class="fs-fields">

                        <li>
                            <p class="fs-field-label fs-anim-upper">
                                Welcome to <strong>Sngine</strong> installation process! Just fill in the information below and create your own social website or online community.
                            </p>
                        </li>

                        <li>
                            <label class="fs-field-label fs-anim-upper" for="purchase_code" data-info="The purchase code of Sngine">Purchase Code</label>
                            <input class="fs-anim-lower" id="purchase_code" name="purchase_code" type="text" placeholder="xxx-xx-xxxx" required/>
                        </li>
                        
                        <li>
                            <label class="fs-field-label fs-anim-upper" for="db_name" data-info="The name of the database you want to run Sngine in">What's Database Name?</label>
                            <input class="fs-anim-lower" id="db_name" name="db_name" type="text" placeholder="sngine" required/>
                        </li>

                        <li>
                            <label class="fs-field-label fs-anim-upper" for="db_username" data-info="Your MySQL username">What's Database Username?</label>
                            <input class="fs-anim-lower" id="db_username" name="db_username" type="text" placeholder="username" required/>
                        </li>

                        <li>
                            <label class="fs-field-label fs-anim-upper" for="db_password" data-info="Your MySQL password">What's Database Password?</label>
                            <input class="fs-anim-lower" id="db_password" name="db_password" type="text" placeholder="password"/>
                        </li>

                        <li>
                            <label class="fs-field-label fs-anim-upper" for="db_host" data-info="You should be able to get this info from your web host, if localhost does not work">What's Database Host?</label>
                            <input class="fs-anim-lower" id="db_host" name="db_host" type="text" placeholder="localhost" required/>
                        </li>
                        
                        <li>
                            <label class="fs-field-label fs-anim-upper" for="admin_email" data-info="Double-check your email address before continuing.">Your E-mail</label>
                            <input class="fs-anim-lower" id="admin_email" name="admin_email" type="email" placeholder="me@mail.com" required/>
                        </li>

                        <li>
                            <label class="fs-field-label fs-anim-upper" for="admin_username" data-info="Usernames can have only alphanumeric characters, spaces, underscores, hyphens, periods, and the @ symbol.">Username</label>
                            <input class="fs-anim-lower" id="admin_username" name="admin_username" type="text" placeholder="username" required/>
                        </li>

                        <li>
                            <label class="fs-field-label fs-anim-upper" for="admin_password" data-info=' The password should be at least seven characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ & ).'>Password</label>
                            <input class="fs-anim-lower" id="admin_password" name="admin_password" type="text" placeholder="password" required/>
                        </li>

                    </ol>
                    <button class="fs-submit" name="submit" type="submit">Install</button>
                </form>

            </div>

        </div>
        
        <script src="includes/assets/js/installer/classie.js"></script>
        <script src="includes/assets/js/installer/fullscreenForm.js"></script>
        <script>
            (function() {
                var formWrap = document.getElementById( 'fs-form-wrap' );
                new FForm( formWrap, {
                    onReview : function() {
                        classie.add( document.body, 'overview' );
                    }
                } );
            })();
        </script>

    </body>
</html>