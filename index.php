<?php

use Instagram\Api;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

require __DIR__ . '/../../../../master/vendor/autoload.php';


if(isset($_POST['username'])){
	$username = $_POST['username'];

	$cachePool = new FilesystemAdapter('Instagram', 0, __DIR__ . '/../cache');

	try {
		$api = new Api($cachePool);
		$api->login('milawoofdogs', '8hKU3aIWk0NE6QbbwwWlMqjCXYYhrYTs'); // mandatory

		$profile = $api->getProfile($username); // we need instagram username
		sleep(1);

		$feedStories = $api->getStories($profile->getId());

		$stories = $feedStories->getStories();

		if (count($stories)) {
			$last_story_array = array_reverse($stories);
		    if(count($last_story_array) > 0){
			    $last_story = $last_story_array[0];

			    $takenAtDate = abs(time() - $last_story->getTakenAtDate()->getTimestamp());
			    $last_story_at = $takenAtDate/3600;
		    }
		}
	} catch (InstagramException $e) {
		$server_message = $e->getMessage();
	} catch (CacheException $e) {
		$server_message = $e->getMessage();
	} catch (GuzzleHttp\Exception\ClientException $e) {
		$server_message = "Account not found";
	}
}

?>

<!doctype html>
<html lang="en">
   <head>
      <title>StoryHoot | TechUntold</title>
      <meta charset="UTF-8">
      
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="pingback" href="https://www.techuntold.com/xmlrpc.php">
      <link rel="canonical" href="https://www.techuntold.com/storyhoot/">
      
      <link rel="icon" type="image/png" href="https://www.techuntold.com/wp-content/uploads/2018/09/techuntold-favicon_16.png">
      <!-- This site is optimized with the Yoast SEO Premium plugin v12.2 - https://yoast.com/wordpress/plugins/seo/ -->
      <meta name="description" content="StoryHoot is a Instagram Story Downloader using which you can easily watch and save someone's Instagram stories online anonymously for free. It works in browser of any device.">
      <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
      <meta property="og:locale" content="en_US">
      <meta property="og:type" content="website">
      <meta property="og:title" content="StoryHoot | TechUntold">
      <meta property="og:description" content="StoryHoot is a Instagram Story Downloader using which you can easily watch and save someone's Instagram stories online anonymously for free. It works in browser of any device.">
      <meta property="og:url" content="https://www.techuntold.com/storyhoot/">
      <meta property="og:site_name" content="TechUntold">
      <!-- / Yoast SEO Premium plugin. -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="dns-prefetch" href="//static.apester.com">
      <link rel="dns-prefetch" href="//fonts.googleapis.com">
      <link rel="dns-prefetch" href="//s.w.org">
      <link rel="alternate" type="application/rss+xml" title="TechUntold » Feed" href="https://www.techuntold.com/feed/">
      <link rel="alternate" type="application/rss+xml" title="TechUntold » Comments Feed" href="https://www.techuntold.com/comments/feed/">
      <!-- This site uses the Google Analytics by MonsterInsights plugin v7.9.0 - Using Analytics tracking - https://www.monsterinsights.com/ -->
      <script src="https://www.techuntold.com/wp-includes/js/wp-emoji-release.min.js?ver=5744ee63ad0c9ec27c73d8e30397e7cf" type="text/javascript" defer=""></script>

      <!-- TU StoryHoot Display Ad Adsense one-line (the ad is below) -->
  	  <script data-ad-client="ca-pub-8860864035967182" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      
      <style type="text/css">
         img.wp-smiley,
         img.emoji {
         display: inline !important;
         border: none !important;
         box-shadow: none !important;
         height: 1em !important;
         width: 1em !important;
         margin: 0 .07em !important;
         vertical-align: -0.1em !important;
         background: none !important;
         padding: 0 !important;
         }
      </style>
      

      <link rel="stylesheet" id="structured-content-frontend-css" href="https://www.techuntold.com/wp-content/plugins/structured-content/dist/blocks.style.css?ver=1.0.0" type="text/css" media="all">
      <link rel="stylesheet" id="wp-block-library-css" href="https://www.techuntold.com/wp-includes/css/dist/block-library/style.min.css?ver=5744ee63ad0c9ec27c73d8e30397e7cf" type="text/css" media="all">
      <link rel="stylesheet" id="dashicons-css" href="https://www.techuntold.com/wp-includes/css/dashicons.min.css?ver=5744ee63ad0c9ec27c73d8e30397e7cf" type="text/css" media="all">
      <link rel="stylesheet" id="contact-form-7-css" href="https://www.techuntold.com/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.1.4" type="text/css" media="all">
      <link rel="stylesheet" id="fontawesome-css" href="https://www.techuntold.com/wp-content/plugins/olevmedia-shortcodes/assets/css/font-awesome.min.css?ver=5744ee63ad0c9ec27c73d8e30397e7cf" type="text/css" media="all">
      <link rel="stylesheet" id="omsc-shortcodes-css" href="https://www.techuntold.com/wp-content/plugins/olevmedia-shortcodes/assets/css/shortcodes.css?ver=5744ee63ad0c9ec27c73d8e30397e7cf" type="text/css" media="all">
      <link rel="stylesheet" id="omsc-shortcodes-tablet-css" href="https://www.techuntold.com/wp-content/plugins/olevmedia-shortcodes/assets/css/shortcodes-tablet.css?ver=5744ee63ad0c9ec27c73d8e30397e7cf" type="text/css" media="screen and (min-width: 768px) and (max-width: 959px)">
      <link rel="stylesheet" id="omsc-shortcodes-mobile-css" href="https://www.techuntold.com/wp-content/plugins/olevmedia-shortcodes/assets/css/shortcodes-mobile.css?ver=5744ee63ad0c9ec27c73d8e30397e7cf" type="text/css" media="screen and (max-width: 767px)">
      <link rel="stylesheet" id="stcr-font-awesome-css" href="https://www.techuntold.com/wp-content/plugins/subscribe-to-comments-reloaded/includes/css/font-awesome.min.css?ver=5744ee63ad0c9ec27c73d8e30397e7cf" type="text/css" media="all">
      <link rel="stylesheet" id="td-plugin-multi-purpose-css" href="https://www.techuntold.com/wp-content/plugins/td-composer/td-multi-purpose/style.css?ver=5a862b9d7c39671de80dd6dee389818b" type="text/css" media="all">
      <link rel="stylesheet" id="google-fonts-style-css" href="https://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400%2C400italic%2C600%2C600italic%2C700%7CRoboto%3A300%2C400%2C400italic%2C500%2C500italic%2C700%2C900&amp;ver=9.8" type="text/css" media="all">
      <link rel="stylesheet" id="tablepress-default-css" href="https://www.techuntold.com/wp-content/plugins/tablepress/css/default.min.css?ver=1.9.2" type="text/css" media="all">
      <!--<link rel="stylesheet" id="td-theme-css" href="https://www.techuntold.com/wp-content/themes/Newspaper/style.css?ver=9.8" type="text/css" media="all">-->
      <link rel="stylesheet" id="td-theme-css" href="/storyhoot/style.css?ver=9.8" type="text/css" media="all">
      <style id="td-theme-inline-css" type="text/css">
         @media (max-width: 767px) {
         .td-header-desktop-wrap {
         display: none;
         }
         }
         @media (min-width: 767px) {
         .td-header-mobile-wrap {
         display: none;
         }
         }
      </style>
      <link rel="stylesheet" id="aawp-styles-css" href="https://www.techuntold.com/wp-content/plugins/aawp/public/assets/css/styles.min.css?ver=3.8.13" type="text/css" media="all">
      <link rel="stylesheet" id="td-legacy-framework-front-style-css" href="https://www.techuntold.com/wp-content/plugins/td-composer/legacy/Newspaper/assets/css/td_legacy_main.css?ver=5a862b9d7c39671de80dd6dee389818b" type="text/css" media="all">
      <link rel="stylesheet" id="tdb_front_style-css" href="https://www.techuntold.com/wp-content/plugins/td-cloud-library/assets/css/tdb_less_front.css?ver=489325fca4f12cbec6ded350cf173551" type="text/css" media="all">
      <!--<script>if (document.location.protocol != "https:") {document.location = document.URL.replace(/^http:/i, "https:");}</script><script type="text/javascript">
         /* <![CDATA[ */
         var monsterinsights_frontend = {"js_events_tracking":"true","download_extensions":"","inbound_paths":"[]","home_url":"https:\/\/www.techuntold.com","hash_tracking":"false"};
         /* ]]> */
      </script>-->
      <script type="text/javascript" src="https://www.techuntold.com/wp-content/plugins/google-analytics-for-wordpress/assets/js/frontend.min.js?ver=7.9.0"></script>
      <script type="text/javascript" src="https://www.techuntold.com/wp-includes/js/jquery/jquery.js?ver=1.12.4-wp"></script>
      <script type="text/javascript" src="https://www.techuntold.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1"></script>
      <script type="text/javascript">
         /* <![CDATA[ */
         var ai_front = {"wp_ai":"5.2.3+2.5.5","insertion_before":"BEFORE","insertion_after":"AFTER","insertion_prepend":"PREPEND CONTENT","insertion_append":"APPEND CONTENT","insertion_replace_content":"REPLACE CONTENT","insertion_replace_element":"REPLACE ELEMENT","cancel":"Cancel","use":"Use","add":"Add","parent":"Parent","cancel_element_selection":"Cancel element selection","select_parent_element":"Select parent element","css_selector":"CSS selector","use_current_selector":"Use current selector","element":"ELEMENT","path":"PATH","selector":"SELECTOR","visible":"VISIBLE","hidden":"HIDDEN"};
         /* ]]> */
      </script>
      <script type="text/javascript" src="https://www.techuntold.com/wp-content/plugins/ad-inserter-pro/includes/js/ai-jquery.js?ver=5.2.3+2.5.5"></script>
      <script type="text/javascript">
         /* <![CDATA[ */
         var configuration = {"rendererBaseUrl":"https:\/\/renderer.apester.com"};
         /* ]]> */
      </script>
      <script type="text/javascript" async="async" src="https://static.apester.com/js/sdk/latest/apester-javascript-sdk.min.js?ver=5744ee63ad0c9ec27c73d8e30397e7cf"></script>
      <link rel="https://api.w.org/" href="https://www.techuntold.com/wp-json/">
      <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://www.techuntold.com/xmlrpc.php?rsd">
      <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://www.techuntold.com/wp-includes/wlwmanifest.xml">
      <link rel="shortlink" href="https://www.techuntold.com/">
      <link rel="alternate" type="application/json+oembed" href="https://www.techuntold.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.techuntold.com%2F">
      <link rel="alternate" type="text/xml+oembed" href="https://www.techuntold.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.techuntold.com%2F&amp;format=xml">
      <style type="text/css">.aawp .aawp-tb__row--highlight{background-color:#000000;}.aawp .aawp-tb__row--highlight{color:#ffffff;}.aawp .aawp-tb__row--highlight a{color:#ffffff;}</style>
      <style type="text/css">.aawp .aawp-tb-product-0 .aawp-tb__data .aawp-tb__data--type-button{
         color: #aa1801;
         }
         .aawp-tb-product-data-custom_text{
         color:#000000;
         }
         aawp-tb-product-data-price{
         color:#000000;
         }
      </style>
      <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
      
      <!-- JS generated by theme -->
      <script>
         var tdBlocksArray = []; //here we store all the items for the current page
         
         //td_block class - each ajax block uses a object of this class for requests
         function tdBlock() {
          this.id = '';
          this.block_type = 1; //block type id (1-234 etc)
          this.atts = '';
          this.td_column_number = '';
          this.td_current_page = 1; //
          this.post_count = 0; //from wp
          this.found_posts = 0; //from wp
          this.max_num_pages = 0; //from wp
          this.td_filter_value = ''; //current live filter value
          this.is_ajax_running = false;
          this.td_user_action = ''; // load more or infinite loader (used by the animation)
          this.header_color = '';
          this.ajax_pagination_infinite_stop = ''; //show load more at page x
         }
         
         
            // td_js_generator - mini detector
            (function(){
                var htmlTag = document.getElementsByTagName("html")[0];
         
             if ( navigator.userAgent.indexOf("MSIE 10.0") > -1 ) {
                    htmlTag.className += ' ie10';
                }
         
                if ( !!navigator.userAgent.match(/Trident.*rv\:11\./) ) {
                    htmlTag.className += ' ie11';
                }
         
             if ( navigator.userAgent.indexOf("Edge") > -1 ) {
                    htmlTag.className += ' ieEdge';
                }
         
                if ( /(iPad|iPhone|iPod)/g.test(navigator.userAgent) ) {
                    htmlTag.className += ' td-md-is-ios';
                }
         
                var user_agent = navigator.userAgent.toLowerCase();
                if ( user_agent.indexOf("android") > -1 ) {
                    htmlTag.className += ' td-md-is-android';
                }
         
                if ( -1 !== navigator.userAgent.indexOf('Mac OS X')  ) {
                    htmlTag.className += ' td-md-is-os-x';
                }
         
                if ( /chrom(e|ium)/.test(navigator.userAgent.toLowerCase()) ) {
                   htmlTag.className += ' td-md-is-chrome';
                }
         
                if ( -1 !== navigator.userAgent.indexOf('Firefox') ) {
                    htmlTag.className += ' td-md-is-firefox';
                }
         
                if ( -1 !== navigator.userAgent.indexOf('Safari') && -1 === navigator.userAgent.indexOf('Chrome') ) {
                    htmlTag.className += ' td-md-is-safari';
                }
         
                if( -1 !== navigator.userAgent.indexOf('IEMobile') ){
                    htmlTag.className += ' td-md-is-iemobile';
                }
         
            })();
         
         
         
         
            var tdLocalCache = {};
         
            ( function () {
                "use strict";
         
                tdLocalCache = {
                    data: {},
                    remove: function (resource_id) {
                        delete tdLocalCache.data[resource_id];
                    },
                    exist: function (resource_id) {
                        return tdLocalCache.data.hasOwnProperty(resource_id) && tdLocalCache.data[resource_id] !== null;
                    },
                    get: function (resource_id) {
                        return tdLocalCache.data[resource_id];
                    },
                    set: function (resource_id, cachedData) {
                        tdLocalCache.remove(resource_id);
                        tdLocalCache.data[resource_id] = cachedData;
                    }
                };
            })();
         
         
         
         var td_viewport_interval_list=[{"limitBottom":767,"sidebarWidth":228},{"limitBottom":1018,"sidebarWidth":300},{"limitBottom":1140,"sidebarWidth":324}];
         var tdc_is_installed="yes";
         var td_ajax_url="https:\/\/www.techuntold.com\/wp-admin\/admin-ajax.php?td_theme_name=Newspaper&v=9.8";
         var td_get_template_directory_uri="https:\/\/www.techuntold.com\/wp-content\/plugins\/td-composer\/legacy\/common";
         var tds_snap_menu="snap";
         var tds_logo_on_sticky="show_header_logo";
         var tds_header_style="5";
         var td_please_wait="Please wait...";
         var td_email_user_pass_incorrect="User or password incorrect!";
         var td_email_user_incorrect="Email or username incorrect!";
         var td_email_incorrect="Email incorrect!";
         var tds_more_articles_on_post_enable="";
         var tds_more_articles_on_post_time_to_wait="";
         var tds_more_articles_on_post_pages_distance_from_top=0;
         var tds_theme_color_site_wide="#aa1801";
         var tds_smart_sidebar="";
         var tdThemeName="Newspaper";
         var td_magnific_popup_translation_tPrev="Previous (Left arrow key)";
         var td_magnific_popup_translation_tNext="Next (Right arrow key)";
         var td_magnific_popup_translation_tCounter="%curr% of %total%";
         var td_magnific_popup_translation_ajax_tError="The content from %url% could not be loaded.";
         var td_magnific_popup_translation_image_tError="The image #%curr% could not be loaded.";
         var tdBlockNonce="8ef8d413aa";
         var tdDateNamesI18n={"month_names":["January","February","March","April","May","June","July","August","September","October","November","December"],"month_names_short":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"day_names":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"day_names_short":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"]};
         var td_ad_background_click_link="";
         var td_ad_background_click_target="";
      </script>
      <!-- Header style compiled by theme -->
      <style>
        .col-centered{
    margin: 0 auto;
    float: none;
}
         .td-header-wrap .black-menu .sf-menu > .current-menu-item > a,
         .td-header-wrap .black-menu .sf-menu > .current-menu-ancestor > a,
         .td-header-wrap .black-menu .sf-menu > .current-category-ancestor > a,
         .td-header-wrap .black-menu .sf-menu > li > a:hover,
         .td-header-wrap .black-menu .sf-menu > .sfHover > a,
         .td-header-style-12 .td-header-menu-wrap-full,
         .sf-menu > .current-menu-item > a:after,
         .sf-menu > .current-menu-ancestor > a:after,
         .sf-menu > .current-category-ancestor > a:after,
         .sf-menu > li:hover > a:after,
         .sf-menu > .sfHover > a:after,
         .td-header-style-12 .td-affix,
         .header-search-wrap .td-drop-down-search:after,
         .header-search-wrap .td-drop-down-search .btn:hover,
         input[type=submit]:hover,
         .td-read-more a,
         .td-post-category:hover,
         .td-grid-style-1.td-hover-1 .td-big-grid-post:hover .td-post-category,
         .td-grid-style-5.td-hover-1 .td-big-grid-post:hover .td-post-category,
         .td_top_authors .td-active .td-author-post-count,
         .td_top_authors .td-active .td-author-comments-count,
         .td_top_authors .td_mod_wrap:hover .td-author-post-count,
         .td_top_authors .td_mod_wrap:hover .td-author-comments-count,
         .td-404-sub-sub-title a:hover,
         .td-search-form-widget .wpb_button:hover,
         .td-rating-bar-wrap div,
         .td_category_template_3 .td-current-sub-category,
         .dropcap,
         .td_wrapper_video_playlist .td_video_controls_playlist_wrapper,
         .wpb_default,
         .wpb_default:hover,
         .td-left-smart-list:hover,
         .td-right-smart-list:hover,
         .woocommerce-checkout .woocommerce input.button:hover,
         .woocommerce-page .woocommerce a.button:hover,
         .woocommerce-account div.woocommerce .button:hover,
         #bbpress-forums button:hover,
         .bbp_widget_login .button:hover,
         .td-footer-wrapper .td-post-category,
         .td-footer-wrapper .widget_product_search input[type="submit"]:hover,
         .woocommerce .product a.button:hover,
         .woocommerce .product #respond input#submit:hover,
         .woocommerce .checkout input#place_order:hover,
         .woocommerce .woocommerce.widget .button:hover,
         .single-product .product .summary .cart .button:hover,
         .woocommerce-cart .woocommerce table.cart .button:hover,
         .woocommerce-cart .woocommerce .shipping-calculator-form .button:hover,
         .td-next-prev-wrap a:hover,
         .td-load-more-wrap a:hover,
         .td-post-small-box a:hover,
         .page-nav .current,
         .page-nav:first-child > div,
         .td_category_template_8 .td-category-header .td-category a.td-current-sub-category,
         .td_category_template_4 .td-category-siblings .td-category a:hover,
         #bbpress-forums .bbp-pagination .current,
         #bbpress-forums #bbp-single-user-details #bbp-user-navigation li.current a,
         .td-theme-slider:hover .slide-meta-cat a,
         a.vc_btn-black:hover,
         .td-trending-now-wrapper:hover .td-trending-now-title,
         .td-scroll-up,
         .td-smart-list-button:hover,
         .td-weather-information:before,
         .td-weather-week:before,
         .td_block_exchange .td-exchange-header:before,
         .td_block_big_grid_9.td-grid-style-1 .td-post-category,
         .td_block_big_grid_9.td-grid-style-5 .td-post-category,
         .td-grid-style-6.td-hover-1 .td-module-thumb:after,
         .td-pulldown-syle-2 .td-subcat-dropdown ul:after,
         .td_block_template_9 .td-block-title:after,
         .td_block_template_15 .td-block-title:before,
         div.wpforms-container .wpforms-form div.wpforms-submit-container button[type=submit] {
         background-color: #aa1801;
         }
         .td_block_template_4 .td-related-title .td-cur-simple-item:before {
         border-color: #aa1801 transparent transparent transparent !important;
         }
         .woocommerce .woocommerce-message .button:hover,
         .woocommerce .woocommerce-error .button:hover,
         .woocommerce .woocommerce-info .button:hover {
         background-color: #aa1801 !important;
         }
         .td_block_template_4 .td-related-title .td-cur-simple-item,
         .td_block_template_3 .td-related-title .td-cur-simple-item,
         .td_block_template_9 .td-related-title:after {
         background-color: #aa1801;
         }
         .woocommerce .product .onsale,
         .woocommerce.widget .ui-slider .ui-slider-handle {
         background: none #aa1801;
         }
         .woocommerce.widget.widget_layered_nav_filters ul li a {
         background: none repeat scroll 0 0 #aa1801 !important;
         }
         a,
         cite a:hover,
         .td_mega_menu_sub_cats .cur-sub-cat,
         .td-mega-span h3 a:hover,
         .td_mod_mega_menu:hover .entry-title a,
         .header-search-wrap .result-msg a:hover,
         .td-header-top-menu .td-drop-down-search .td_module_wrap:hover .entry-title a,
         .td-header-top-menu .td-icon-search:hover,
         .td-header-wrap .result-msg a:hover,
         .top-header-menu li a:hover,
         .top-header-menu .current-menu-item > a,
         .top-header-menu .current-menu-ancestor > a,
         .top-header-menu .current-category-ancestor > a,
         .td-social-icon-wrap > a:hover,
         .td-header-sp-top-widget .td-social-icon-wrap a:hover,
         .td-page-content blockquote p,
         .td-post-content blockquote p,
         .mce-content-body blockquote p,
         .comment-content blockquote p,
         .wpb_text_column blockquote p,
         .td_block_text_with_title blockquote p,
         .td_module_wrap:hover .entry-title a,
         .td-subcat-filter .td-subcat-list a:hover,
         .td-subcat-filter .td-subcat-dropdown a:hover,
         .td_quote_on_blocks,
         .dropcap2,
         .dropcap3,
         .td_top_authors .td-active .td-authors-name a,
         .td_top_authors .td_mod_wrap:hover .td-authors-name a,
         .td-post-next-prev-content a:hover,
         .author-box-wrap .td-author-social a:hover,
         .td-author-name a:hover,
         .td-author-url a:hover,
         .td_mod_related_posts:hover h3 > a,
         .td-post-template-11 .td-related-title .td-related-left:hover,
         .td-post-template-11 .td-related-title .td-related-right:hover,
         .td-post-template-11 .td-related-title .td-cur-simple-item,
         .td-post-template-11 .td_block_related_posts .td-next-prev-wrap a:hover,
         .comment-reply-link:hover,
         .logged-in-as a:hover,
         #cancel-comment-reply-link:hover,
         .td-search-query,
         .td-category-header .td-pulldown-category-filter-link:hover,
         .td-category-siblings .td-subcat-dropdown a:hover,
         .td-category-siblings .td-subcat-dropdown a.td-current-sub-category,
         .widget a:hover,
         .td_wp_recentcomments a:hover,
         .archive .widget_archive .current,
         .archive .widget_archive .current a,
         .widget_calendar tfoot a:hover,
         .woocommerce a.added_to_cart:hover,
         .woocommerce-account .woocommerce-MyAccount-navigation a:hover,
         #bbpress-forums li.bbp-header .bbp-reply-content span a:hover,
         #bbpress-forums .bbp-forum-freshness a:hover,
         #bbpress-forums .bbp-topic-freshness a:hover,
         #bbpress-forums .bbp-forums-list li a:hover,
         #bbpress-forums .bbp-forum-title:hover,
         #bbpress-forums .bbp-topic-permalink:hover,
         #bbpress-forums .bbp-topic-started-by a:hover,
         #bbpress-forums .bbp-topic-started-in a:hover,
         #bbpress-forums .bbp-body .super-sticky li.bbp-topic-title .bbp-topic-permalink,
         #bbpress-forums .bbp-body .sticky li.bbp-topic-title .bbp-topic-permalink,
         .widget_display_replies .bbp-author-name,
         .widget_display_topics .bbp-author-name,
         .footer-text-wrap .footer-email-wrap a,
         .td-subfooter-menu li a:hover,
         .footer-social-wrap a:hover,
         a.vc_btn-black:hover,
         .td-smart-list-dropdown-wrap .td-smart-list-button:hover,
         .td_module_17 .td-read-more a:hover,
         .td_module_18 .td-read-more a:hover,
         .td_module_19 .td-post-author-name a:hover,
         .td-instagram-user a,
         .td-pulldown-syle-2 .td-subcat-dropdown:hover .td-subcat-more span,
         .td-pulldown-syle-2 .td-subcat-dropdown:hover .td-subcat-more i,
         .td-pulldown-syle-3 .td-subcat-dropdown:hover .td-subcat-more span,
         .td-pulldown-syle-3 .td-subcat-dropdown:hover .td-subcat-more i,
         .td-block-title-wrap .td-wrapper-pulldown-filter .td-pulldown-filter-display-option:hover,
         .td-block-title-wrap .td-wrapper-pulldown-filter .td-pulldown-filter-display-option:hover i,
         .td-block-title-wrap .td-wrapper-pulldown-filter .td-pulldown-filter-link:hover,
         .td-block-title-wrap .td-wrapper-pulldown-filter .td-pulldown-filter-item .td-cur-simple-item,
         .td_block_template_2 .td-related-title .td-cur-simple-item,
         .td_block_template_5 .td-related-title .td-cur-simple-item,
         .td_block_template_6 .td-related-title .td-cur-simple-item,
         .td_block_template_7 .td-related-title .td-cur-simple-item,
         .td_block_template_8 .td-related-title .td-cur-simple-item,
         .td_block_template_9 .td-related-title .td-cur-simple-item,
         .td_block_template_10 .td-related-title .td-cur-simple-item,
         .td_block_template_11 .td-related-title .td-cur-simple-item,
         .td_block_template_12 .td-related-title .td-cur-simple-item,
         .td_block_template_13 .td-related-title .td-cur-simple-item,
         .td_block_template_14 .td-related-title .td-cur-simple-item,
         .td_block_template_15 .td-related-title .td-cur-simple-item,
         .td_block_template_16 .td-related-title .td-cur-simple-item,
         .td_block_template_17 .td-related-title .td-cur-simple-item,
         .td-theme-wrap .sf-menu ul .td-menu-item > a:hover,
         .td-theme-wrap .sf-menu ul .sfHover > a,
         .td-theme-wrap .sf-menu ul .current-menu-ancestor > a,
         .td-theme-wrap .sf-menu ul .current-category-ancestor > a,
         .td-theme-wrap .sf-menu ul .current-menu-item > a,
         .td_outlined_btn,
         .td_block_categories_tags .td-ct-item:hover {
         color: #aa1801;
         }
         a.vc_btn-black.vc_btn_square_outlined:hover,
         a.vc_btn-black.vc_btn_outlined:hover,
         .td-mega-menu-page .wpb_content_element ul li a:hover,
         .td-theme-wrap .td-aj-search-results .td_module_wrap:hover .entry-title a,
         .td-theme-wrap .header-search-wrap .result-msg a:hover {
         color: #aa1801 !important;
         }
         .td-next-prev-wrap a:hover,
         .td-load-more-wrap a:hover,
         .td-post-small-box a:hover,
         .page-nav .current,
         .page-nav:first-child > div,
         .td_category_template_8 .td-category-header .td-category a.td-current-sub-category,
         .td_category_template_4 .td-category-siblings .td-category a:hover,
         #bbpress-forums .bbp-pagination .current,
         .post .td_quote_box,
         .page .td_quote_box,
         a.vc_btn-black:hover,
         .td_block_template_5 .td-block-title > *,
         .td_outlined_btn {
         border-color: #aa1801;
         }
         .td_wrapper_video_playlist .td_video_currently_playing:after {
         border-color: #aa1801 !important;
         }
         .header-search-wrap .td-drop-down-search:before {
         border-color: transparent transparent #aa1801 transparent;
         }
         .block-title > span,
         .block-title > a,
         .block-title > label,
         .widgettitle,
         .widgettitle:after,
         .td-trending-now-title,
         .td-trending-now-wrapper:hover .td-trending-now-title,
         .wpb_tabs li.ui-tabs-active a,
         .wpb_tabs li:hover a,
         .vc_tta-container .vc_tta-color-grey.vc_tta-tabs-position-top.vc_tta-style-classic .vc_tta-tabs-container .vc_tta-tab.vc_active > a,
         .vc_tta-container .vc_tta-color-grey.vc_tta-tabs-position-top.vc_tta-style-classic .vc_tta-tabs-container .vc_tta-tab:hover > a,
         .td_block_template_1 .td-related-title .td-cur-simple-item,
         .woocommerce .product .products h2:not(.woocommerce-loop-product__title),
         .td-subcat-filter .td-subcat-dropdown:hover .td-subcat-more, 
         .td_3D_btn,
         .td_shadow_btn,
         .td_default_btn,
         .td_round_btn, 
         .td_outlined_btn:hover {
         background-color: #aa1801;
         }
         .woocommerce div.product .woocommerce-tabs ul.tabs li.active {
         background-color: #aa1801 !important;
         }
         .block-title,
         .td_block_template_1 .td-related-title,
         .wpb_tabs .wpb_tabs_nav,
         .vc_tta-container .vc_tta-color-grey.vc_tta-tabs-position-top.vc_tta-style-classic .vc_tta-tabs-container,
         .woocommerce div.product .woocommerce-tabs ul.tabs:before {
         border-color: #aa1801;
         }
         .td_block_wrap .td-subcat-item a.td-cur-simple-item {
         color: #aa1801;
         }
         .td-grid-style-4 .entry-title
         {
         background-color: rgba(170, 24, 1, 0.7);
         }
         .td-header-wrap .td-header-top-menu-full,
         .td-header-wrap .top-header-menu .sub-menu {
         background-color: #aa1801;
         }
         .td-header-style-8 .td-header-top-menu-full {
         background-color: transparent;
         }
         .td-header-style-8 .td-header-top-menu-full .td-header-top-menu {
         background-color: #aa1801;
         padding-left: 15px;
         padding-right: 15px;
         }
         .td-header-wrap .td-header-top-menu-full .td-header-top-menu,
         .td-header-wrap .td-header-top-menu-full {
         border-bottom: none;
         }
         .td-header-top-menu,
         .td-header-top-menu a,
         .td-header-wrap .td-header-top-menu-full .td-header-top-menu,
         .td-header-wrap .td-header-top-menu-full a,
         .td-header-style-8 .td-header-top-menu,
         .td-header-style-8 .td-header-top-menu a,
         .td-header-top-menu .td-drop-down-search .entry-title a {
         color: #ffffff;
         }
         .td-header-wrap .td-header-menu-wrap-full,
         .td-header-menu-wrap.td-affix,
         .td-header-style-3 .td-header-main-menu,
         .td-header-style-3 .td-affix .td-header-main-menu,
         .td-header-style-4 .td-header-main-menu,
         .td-header-style-4 .td-affix .td-header-main-menu,
         .td-header-style-8 .td-header-menu-wrap.td-affix,
         .td-header-style-8 .td-header-top-menu-full {
         background-color: #aa1801;
         }
         .td-boxed-layout .td-header-style-3 .td-header-menu-wrap,
         .td-boxed-layout .td-header-style-4 .td-header-menu-wrap,
         .td-header-style-3 .td_stretch_content .td-header-menu-wrap,
         .td-header-style-4 .td_stretch_content .td-header-menu-wrap {
         background-color: #aa1801 !important;
         }
         @media (min-width: 1019px) {
         .td-header-style-1 .td-header-sp-recs,
         .td-header-style-1 .td-header-sp-logo {
         margin-bottom: 28px;
         }
         }
         @media (min-width: 768px) and (max-width: 1018px) {
         .td-header-style-1 .td-header-sp-recs,
         .td-header-style-1 .td-header-sp-logo {
         margin-bottom: 14px;
         }
         }
         .td-header-style-7 .td-header-top-menu {
         border-bottom: none;
         }
         .td-header-wrap .td-header-menu-wrap .sf-menu > li > a,
         .td-header-wrap .td-header-menu-social .td-social-icon-wrap a,
         .td-header-style-4 .td-header-menu-social .td-social-icon-wrap i,
         .td-header-style-5 .td-header-menu-social .td-social-icon-wrap i,
         .td-header-style-6 .td-header-menu-social .td-social-icon-wrap i,
         .td-header-style-12 .td-header-menu-social .td-social-icon-wrap i,
         .td-header-wrap .header-search-wrap #td-header-search-button .td-icon-search {
         color: #ffffff;
         }
         .td-header-wrap .td-header-menu-social + .td-search-wrapper #td-header-search-button:before {
         background-color: #ffffff;
         }
         @media (max-width: 767px) {
         body .td-header-wrap .td-header-main-menu {
         background-color: #aa1801 !important;
         }
         }
         .td-post-content,
         .td-post-content p {
         color: #303030;
         }
         .td-post-content h1,
         .td-post-content h2,
         .td-post-content h3,
         .td-post-content h4,
         .td-post-content h5,
         .td-post-content h6 {
         color: #000000;
         }
         ul.sf-menu > .td-menu-item > a,
         .td-theme-wrap .td-header-menu-social {
         font-weight:600;
         text-transform:capitalize;
         }
         .post .td-post-header .entry-title {
         font-family:Georgia, Times, "Times New Roman", serif;
         }
         .td-post-template-default .td-post-header .entry-title {
         font-size:34px;
         line-height:38px;
         }
         .td-post-content p,
         .td-post-content {
         font-family:Georgia, Times, "Times New Roman", serif;
         font-size:18px;
         line-height:34px;
         }
         .td-post-content li {
         font-family:Georgia, Times, "Times New Roman", serif;
         font-size:18px;
         line-height:38px;
         }
         .td-post-content h2 {
         font-size:27px;
         line-height:38px;
         }
         .td-post-content h3 {
         font-size:24px;
         line-height:30px;
         }
         .td-post-content h4 {
         font-size:20px;
         line-height:27px;
         }
      </style>
      <!-- Button style compiled by theme -->
      <style>
         .tdm-menu-active-style3 .tdm-header.td-header-wrap .sf-menu > .current-category-ancestor > a,
         .tdm-menu-active-style3 .tdm-header.td-header-wrap .sf-menu > .current-menu-ancestor > a,
         .tdm-menu-active-style3 .tdm-header.td-header-wrap .sf-menu > .current-menu-item > a,
         .tdm-menu-active-style3 .tdm-header.td-header-wrap .sf-menu > .sfHover > a,
         .tdm-menu-active-style3 .tdm-header.td-header-wrap .sf-menu > li > a:hover,
         .tdm_block_column_content:hover .tdm-col-content-title-url .tdm-title,
         .tds-button2 .tdm-btn-text,
         .tds-button2 i,
         .tds-button5:hover .tdm-btn-text,
         .tds-button5:hover i,
         .tds-button6 .tdm-btn-text,
         .tds-button6 i,
         .tdm_block_list .tdm-list-item i,
         .tdm_block_pricing .tdm-pricing-feature i,
         .tdm-social-item i {
         color: #aa1801;
         }
         .tdm-menu-active-style5 .td-header-menu-wrap .sf-menu > .current-menu-item > a,
         .tdm-menu-active-style5 .td-header-menu-wrap .sf-menu > .current-menu-ancestor > a,
         .tdm-menu-active-style5 .td-header-menu-wrap .sf-menu > .current-category-ancestor > a,
         .tdm-menu-active-style5 .td-header-menu-wrap .sf-menu > li > a:hover,
         .tdm-menu-active-style5 .td-header-menu-wrap .sf-menu > .sfHover > a,
         .tds-button1,
         .tds-button6:after,
         .tds-title2 .tdm-title-line:after,
         .tds-title3 .tdm-title-line:after,
         .tdm_block_pricing.tdm-pricing-featured:before,
         .tdm_block_pricing.tds_pricing2_block.tdm-pricing-featured .tdm-pricing-header,
         .tds-progress-bar1 .tdm-progress-bar:after,
         .tds-progress-bar2 .tdm-progress-bar:after,
         .tds-social3 .tdm-social-item {
         background-color: #aa1801;
         }
         .tdm-menu-active-style4 .tdm-header .sf-menu > .current-menu-item > a,
         .tdm-menu-active-style4 .tdm-header .sf-menu > .current-menu-ancestor > a,
         .tdm-menu-active-style4 .tdm-header .sf-menu > .current-category-ancestor > a,
         .tdm-menu-active-style4 .tdm-header .sf-menu > li > a:hover,
         .tdm-menu-active-style4 .tdm-header .sf-menu > .sfHover > a,
         .tds-button2:before,
         .tds-button6:before,
         .tds-progress-bar3 .tdm-progress-bar:after {
         border-color: #aa1801;
         }
         .tdm-btn-style1 {
         background-color: #aa1801;
         }
         .tdm-btn-style2:before {
         border-color: #aa1801;
         }
         .tdm-btn-style2 {
         color: #aa1801;
         }
         .tdm-btn-style3 {
         -webkit-box-shadow: 0 2px 16px #aa1801;
         -moz-box-shadow: 0 2px 16px #aa1801;
         box-shadow: 0 2px 16px #aa1801;
         }
         .tdm-btn-style3:hover {
         -webkit-box-shadow: 0 4px 26px #aa1801;
         -moz-box-shadow: 0 4px 26px #aa1801;
         box-shadow: 0 4px 26px #aa1801;
         }
         .tdm-header-style-1.td-header-wrap .td-header-top-menu-full,
         .tdm-header-style-1.td-header-wrap .top-header-menu .sub-menu,
         .tdm-header-style-2.td-header-wrap .td-header-top-menu-full,
         .tdm-header-style-2.td-header-wrap .top-header-menu .sub-menu,
         .tdm-header-style-3.td-header-wrap .td-header-top-menu-full,
         .tdm-header-style-3.td-header-wrap .top-header-menu .sub-menu{
         background-color: #aa1801;
         }
      </style>
      <script src="//cdn.geni.us/snippet.min.js" defer=""></script>
      <script type="text/javascript">
         jQuery(document).ready(function( $ ) {
         var ale_on_click_checkbox_is_checked="1";
         if(typeof Georiot !== "undefined")
         {
         if(ale_on_click_checkbox_is_checked) {
         Georiot.amazon.addOnClickRedirect(40793, true);
         }
         else {
         Georiot.amazon.convertToGeoRiotLinks(40793, true);
         };
         };
         });
      </script>
      <style type="text/css">
         #wp-admin-bar-ai-toolbar-settings .ab-icon:before {
         content: '\f111';
         top: 2px;
         color: rgba(240,245,250,.6)!important;
         }
         #wp-admin-bar-ai-toolbar-settings-default .ab-icon:before {
         top: 0px;
         }
         #wp-admin-bar-ai-toolbar-settings .ab-icon.on:before {
         color: #00f200!important;
         }
         #wp-admin-bar-ai-toolbar-settings .ab-icon.red:before {
         color: #f22!important;
         }
         #wp-admin-bar-ai-toolbar-settings-default li, #wp-admin-bar-ai-toolbar-settings-default a,
         #wp-admin-bar-ai-toolbar-settings-default li:hover, #wp-admin-bar-ai-toolbar-settings-default a:hover {
         border: 1px solid transparent;
         }
         ul li#wp-admin-bar-ai-toolbar-status {
         margin: 0 0 5px 0;
         }
         #wp-admin-bar-ai-toolbar-blocks .ab-icon:before {
         content: '\f135';
         }
         #wp-admin-bar-ai-toolbar-positions .ab-icon:before {
         content: '\f207';
         }
         #wp-admin-bar-ai-toolbar-positions-default .ab-icon:before {
         content: '\f522';
         }
         #wp-admin-bar-ai-toolbar-tags .ab-icon:before {
         content: '\f475';
         }
         #wp-admin-bar-ai-toolbar-no-insertion .ab-icon:before {
         content: '\f214';
         }
         #wp-admin-bar-ai-toolbar-adb-status .ab-icon:before {
         content: '\f223';
         }
         #wp-admin-bar-ai-toolbar-adb .ab-icon:before {
         content: '\f160';
         }
         #wp-admin-bar-ai-toolbar-processing .ab-icon:before {
         content: '\f464';
         }
         #wp-admin-bar-ai-toolbar-positions span.up-icon {
         padding-top: 2px;
         }
         #wp-admin-bar-ai-toolbar-positions .up-icon:before {
         font: 400 20px/1 dashicons;
         }
         .ai-insertion-status {
         line-height: 26px!important;
         height: 26px!important;
         white-space: nowrap;
         min-width: 140px;
         }
         #wp-admin-bar-ai-toolbar-settings .ab-sub-wrapper {
         width: max-content;
         width: -moz-max-content;
         }
      </style>
      <style id="tdw-css-placeholder"></style>
      <style type="text/css">.apester-hidden {
         pointer-events: none;
         animation: apester-hide 1s ease-out forwards; }
         @keyframes apester-hide {
         from {
         visibility: visible;
         opacity: 1; }
         to {
         visibility: hidden;
         opacity: 0; } }
         .apester-loading-container-mobile {
         background: #ffffff; }
         .apester-loading-container {
         position: absolute !important;
         top: 0 !important;
         left: 0 !important;
         right: 0 !important;
         bottom: 0 !important;
         z-index: 1 !important;
         display: block;
         width: 100%;
         height: 100%;
         background: #f5f5f5; }
         .apester-element {
         display: block;
         position: relative;
         max-width: 600px;
         width: 100%;
         margin: 5px auto;
         overflow: hidden; }
         .apester-element.apester-strip {
         max-width: none; }
         .apester-element.apester-strip[round-shape] .strip-loader {
         display: none; }
         .apester-element.apester-strip.apester-in-app {
         margin: 0; }
         .apester-video-component {
         width: 100%;
         margin: 0 auto; }
         .apester-layer-fill {
         width: 100% !important;
         height: 100% !important;
         margin: 0 auto;
         position: absolute;
         top: 0;
         left: 0;
         bottom: 0;
         right: 0; }
         .apester-active {
         opacity: 1; }
         .apester-ready {
         display: none !important;
         opacity: 0;
         pointer-events: none; }
         .apester-done {
         opacity: 0;
         pointer-events: none; }
         .apester-layer {
         height: 100%;
         display: block;
         overflow: hidden !important;
         position: absolute;
         top: 0;
         left: 0;
         bottom: 0;
         right: 0;
         transition: opacity 1s ease-out; }
         .apester-layer.fullscreen {
         background: rgba(34, 36, 38, 0.97) !important;
         position: fixed !important;
         width: 100vw;
         height: 100%;
         z-index: 2147483645 !important;
         zoom: 1;
         -webkit-overflow-scrolling: touch !important;
         overflow-y: auto !important; }
         .apester-video-component {
         background: black; }
         .apester-video-component .video-js {
         top: 50%;
         transform: translateY(-50%); }
         .apester-fill-content {
         display: block;
         width: 1px;
         min-width: 100%;
         height: 100%;
         margin: auto; }
         .interaction-loader {
         position: absolute;
         height: 100px !important;
         width: 100px !important;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         margin-top: -22px; }
         .strip-loader {
         position: absolute;
         height: 251px;
         top: 30px;
         margin-top: -22px;
         width: 100%;
         background: #f5f5f5; }
         .strip-loader-mobile {
         height: 204px;
         background: transparent; }
         .streamrail {
         height: 100%;
         background: black; }
         .blobs {
         filter: url("#goo");
         position: absolute;
         top: 0;
         left: 0;
         bottom: 0;
         right: 0; }
         .blob {
         position: absolute;
         top: 0;
         left: 0;
         bottom: 0;
         right: 0;
         margin: auto;
         width: 50px;
         height: 50px;
         border-radius: 50%;
         background-color: #ee2e3d; }
         .blob:nth-child(1) {
         animation: blob-left-anim cubic-bezier(0.77, 0, 0.175, 1) 2s infinite; }
         .blob:nth-child(2) {
         animation: blob-right-anim cubic-bezier(0.77, 0, 0.175, 1) 2s infinite; }
         @keyframes blob-left-anim {
         0% {
         transform: scale(1) translate(0, 0); }
         33% {
         transform: scale(0.55, 0.5) translate(80px, 0); }
         66% {
         transform: scale(0.8) translate(0, 0); }
         100% {
         transform: scale(1) translate(0, 0); } }
         @keyframes blob-right-anim {
         0% {
         transform: scale(1) translate(0, 0); }
         33% {
         transform: scale(0.55, 0.5) translate(-80px, 0); }
         66% {
         transform: scale(0.8) translate(0, 0); }
         100% {
         transform: scale(1) translate(0, 0); } }
         @keyframes apester {
         0% {
         transform: scale(1);
         opacity: 1; }
         20% {
         transform: scale(1);
         opacity: 0; }
         40% {
         transform: scale(0.5);
         opacity: 0; }
         66% {
         transform: scale(0.8);
         opacity: 1; }
         100% {
         transform: scale(1);
         opacity: 1; } }
         .apester {
         position: absolute;
         height: 28px;
         width: 28px;
         left: calc(50% - 14px);
         top: calc(50% - 14px); }
         .apester svg {
         height: 100%;
         width: 100%; }
         .apester-companion-container {
         display: block;
         position: relative;
         max-width: 600px;
         width: 100%;
         margin: 0 auto;
         overflow: hidden; }
         .sliding-container {
         position: absolute;
         display: block;
         margin: 0 auto;
         overflow: hidden;
         right: -300px;
         z-index: 1000; }
         .sliding-container.sliding-out {
         -webkit-animation: slide-out 0.5s backwards;
         -webkit-animation-delay: 0s;
         animation: slide-out 0.5s backwards;
         animation-delay: 0s; }
         .sliding-container.sliding-in {
         -webkit-animation: slide-in 0.5s forwards;
         -webkit-animation-delay: 1s;
         animation: slide-in 0.5s forwards;
         animation-delay: 1s; }
         @keyframes slide-in {
         100% {
         right: 0; } }
         @keyframes slide-out {
         0% {
         right: 0; }
         100% {
         right: -300; } }
         .sliding-container .apester-companion {
         margin: 0 !important; }
         .sliding-container .close-btn {
         width: 25px;
         height: 25px;
         color: white;
         position: absolute;
         top: 2px;
         right: 2px;
         text-align: center;
         border-radius: 50%;
         background: rgba(0, 0, 0, 0.5); }
         .sliding-container .close-btn:before {
         content: 'x';
         font-size: 15px;
         vertical-align: middle;
         font-family: Arial, Helvetica, sans-serif; }
         .apester-companion {
         text-align: center;
         margin: 10px auto; }
         @media (max-width: 480px) {
         .apester-companion {
         margin: 20px auto; } }
         .strip-animation {
         position: absolute;
         top: 0;
         left: 0;
         bottom: 0;
         right: 0;
         position: fixed;
         background: #d8d8d8;
         width: 100vw;
         height: 100%;
         animation: grow 0.75s ease-in-out; }
         .strip-animation.shrink {
         animation: shrink 0.75s ease-in-out forwards; }
         @keyframes grow {
         from {
         transform: scale(0.25); }
         to {
         transform: scale(1);
         transform-origin: 50% 50%; } }
         @keyframes shrink {
         from {
         transform: scale(1);
         transform-origin: 50% 50%; }
         to {
         transform: scale(0); } }
         #apester-floating-video .__cedato_corner {
         width: auto;
         height: auto;
         top: auto;
         left: auto;
         bottom: 0;
         right: 0;
         margin: 20px; }
         #apester-floating-video-mobile .__cedato_corner {
         width: auto;
         height: auto;
         top: auto;
         left: auto;
         bottom: 0;
         right: 0;
         margin: 0; }
         .apester-companion-video {
         margin: 0 auto -5px auto; }
         .apester-companion-video .__cedato_ad_unit_placeholder {
         margin: 0 auto; }
      </style>
      <link rel="preconnect" href="https://display.apester.com" crossorigin="">
      <link rel="preconnect" href="https://renderer.apester.com" crossorigin="">
     <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-51839321-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-51839321-1');
</script>

   </head>
   <style type="text/css">
      .username{
      color: #262626;
      font-size: 16px;
      font-weight: 500;
      margin: 0;
      }
      .fullname{
      color: #999999;
      font-size: 14px;
      font-weight: normal;
      margin: 0;
      }
      .profile{
      border-radius: 90px;
      height: 90px;
      margin-right: 20px;
      width: 90px;
      }
      p.lastup{
      color: rgb(153, 153, 153);
      font-size: 14px;
      }
      strong.totalstories {
      color: rgb(38, 38, 38);
      font-weight: 500;
      }
      .user{
      -webkit-box-align: center;
      align-items: center;
      flex-direction: row;
      padding: 30px 0px;
      }
      a {
      -webkit-text-decoration: none;
      text-decoration: none;
      }
      a {
      background-color: transparent;
      }
      .td_module_wrap{
        text-align: center;
      }
      
   </style>
   <body data-rsssl="1" class="home page-template-default page page-id-25376 aawp-custom global-block-template-1 tdb-template td-full-layout body-td-affix td-js-loaded" itemscope="itemscope" itemtype="https://schema.org/WebPage">
      <div class="td-scroll-up td-scroll-up-visible"><i class="td-icon-menu-up"></i></div>
      <div class="td-menu-background"></div>
      <div id="td-mobile-nav" style="min-height: 471px;">
         <div class="td-mobile-container">
            <!-- mobile menu top section -->
            <div class="td-menu-socials-wrap">
               <!-- socials -->
               <div class="td-menu-socials">
                  <span class="td-social-icon-wrap">
                  <a target="_blank" rel="nofollow" href="https://www.facebook.com/techuntold" title="Facebook">
                  <i class="td-icon-font td-icon-facebook"></i>
                  </a>
                  </span>
                  <span class="td-social-icon-wrap">
                  <a target="_blank" rel="nofollow" href="https://www.instagram.com/techuntold" title="Instagram">
                  <i class="td-icon-font td-icon-instagram"></i>
                  </a>
                  </span>
                  <span class="td-social-icon-wrap">
                  <a target="_blank" rel="nofollow" href="https://www.twitter.com/techuntold" title="Twitter">
                  <i class="td-icon-font td-icon-twitter"></i>
                  </a>
                  </span>
                  <span class="td-social-icon-wrap">
                  <a target="_blank" rel="nofollow" href="https://www.youtube.com/techuntold" title="Youtube">
                  <i class="td-icon-font td-icon-youtube"></i>
                  </a>
                  </span>            
               </div>
               <!-- close button -->
               <div class="td-mobile-close">
                  <a href="#"><i class="td-icon-close-mobile"></i></a>
               </div>
            </div>
            <!-- login section -->
            <!-- menu section -->
            <div class="td-mobile-content">
               <div class="menu-menu-1-container">
                  <ul id="menu-menu-1" class="td-mobile-main-menu">
                    <li id="menu-item-20931" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-20931 td_mobile_submenu td_mobile_elem_with_submenu_7">
                        <a href="#" class="td-link-element-after">Related  Articles<i class="td-icon-menu-right td-element-after"></i></a>
                        <ul class="sub-menu">
                           <li id="menu-item-37962" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-37962"><a href="https://www.techuntold.com/view-full-size-instagram-photos/">View Full Size Instagram Photos </a></li>
                           <li id="menu-item-7380" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7380"><a href="https://www.techuntold.com/how-download-igtv-videos/">How To Download IGTV Videos</a></li>
                           <li id="menu-item-7379" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7379"><a href="https://www.techuntold.com/instagram-tips-tricks/">Instagram Tips And Tricks</a></li>
                           
                        </ul>
                     </li>
                     <li id="menu-item-25887" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-first menu-item-25887"><a href="https://www.techuntold.com/contact-us">Contact</a></li>
                     
                     
                  </ul>
               </div>
            </div>
         </div>
        
      </div>
      <div class="td-search-background"></div>
      <div class="td-search-wrap-mob">
         <div class="td-drop-down-search" aria-labelledby="td-header-search-button">
            <form method="get" class="td-search-form" action="https://www.techuntold.com/">
               <!-- close button -->
               <div class="td-search-close">
                  <a href="#"><i class="td-icon-close-mobile"></i></a>
               </div>
               <div role="search" class="td-search-input">
                  <span>Search</span>
                  <input id="td-header-search-mob" type="text" value="" name="s" autocomplete="off">
               </div>
            </form>
            <div id="td-aj-search-mob"></div>
         </div>
      </div>
      <div id="td-outer-wrap" class="td-theme-wrap">
         <div class="tdc-header-wrap ">
            <div class="td-header-wrap td-header-style-5 ">
               
               <div class="td-header-menu-wrap-full td-container-wrap " style="height: 60px;">
                  <div class="td-header-menu-wrap td-affix">
                     <div class="td-container td-header-row td-header-main-menu black-menu">
                        <div id="td-header-menu" role="navigation">
                           <div id="td-top-mobile-toggle"><a href="#"><i class="td-icon-font td-icon-mobile"></i></a></div>
                           <div class="td-main-menu-logo td-logo-in-menu td-logo-sticky">
                             
                             <div class="td-main-menu-logo td-logo-in-menu td-logo-sticky">
                            		<a class="td-mobile-logo td-sticky-header" href="https://www.techuntold.com/">
                    			<img src="https://www.techuntold.com/wp-content/uploads/2018/09/techuntold-logo-for-mobile-1.png" alt="TechUntold Logo">
                    		</a>
                    				
                    		    </div>
                           </div>

                        </div>
                        <div class="header-search-wrap">
                           <div class="menu-menu-1-container">
                              <ul id="menu-menu-2" class="sf-menu sf-js-enabled">
                                
                                 
                                
                                 <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-first td-menu-item td-normal-menu menu-item-25887"><a href="https://www.techuntold.com/contact-us">Contact</a></li>
                              </ul>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
        
        
        </div>
         <div class="td-main-content-wrap td-main-page-wrap td-container-wrap">
            <div class="tdc-content-wrap">
              <div id="td_uid_1_5d97223a6e48f" class="tdc-zone"><div class="tdc_zone td_uid_1_5d97223a6e4df_rand  wpb_row td-pb-row">
                  <style scoped="">

                  /* custom css */
                  .td_uid_1_5d97223a6e4df_rand {
                                      min-height: 0;
                                  }
                  </style>
              <div id="td_uid_2_5d97223a6e939" class="tdc-row stretch_row_content td-stretch-content"><div class="vc_row td_uid_2_5d97223a6e97f_rand  wpb_row td-pb-row">
                  <style scoped="">

                  /* custom css */
                  .td_uid_2_5d97223a6e97f_rand {
                                      min-height: 0;
                                  }
                  </style>
              <div class="vc_column td_uid_3_5d97223a6ebcb_rand  wpb_column vc_column_container tdc-column td-pb-span12">
                  <style scoped="">

                  /* custom css */
                  .td_uid_3_5d97223a6ebcb_rand {
                                      vertical-align: baseline;
                                  }
                  </style>
                  <div class="wpb_wrapper">
                    <div class="td_block_wrap td_block_big_grid_1 td_uid_4_5d97223a6ee16_rand td-grid-style-1 td-hover-1 td-big-grids td-pb-border-top td_block_template_1" data-td-block-uid="td_uid_4_5d97223a6ee16">
                      <div id="td_uid_4_5d97223a6ee16" class="td_block_inner">
                        <div class="td-big-grid-wrapper">
                          
                          <div class="container" style="text-align: center;">
      
                            <div class="">
                            <h1>StoryHoot</h1>
							
              							<!-- TU StoryHoot Adsense Display Ad beginning -->
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
              								<ins class="adsbygoogle"
              									 style="display:block"
              									 data-ad-client="ca-pub-8860864035967182"
              									 data-ad-slot="9187278358"
              									 data-ad-format="auto"
              									 data-full-width-responsive="true"></ins>
              								<script>
              									 (adsbygoogle = window.adsbygoogle || []).push({});
              							</script>
              							<!-- TU StoryHoot Adsense Display Ad end -->

                            <h2 class="mt-2">Instagram Story Downloader</h2>

                            <form  method="post">
                                <div class="row mt-4" >
                                    <div class="col-lg-6 col-centered">
                                        <div class="input-group">
                                           <input type="text" placeholder="username" name="username" class="form-control" id="username" required value="<?= @$_POST['username']; ?>">
                                            
                                        </div>
                                        
                                        <!-- /input-group -->
                                    </div>

                                      <!-- /.col-lg-6 -->
                                </div>
                                 <button type="submit" class="btn mb-2 mt-4" style="background-color: #aa1801; color: #fff;">Submit</button>
                            </form>
                            
                           <div class="col-lg-6 col-centered mt-4" 
                           	  <?php 
                           	  	if(isset($_POST['username']) && isset($profile)) { ?> 
                           	  		style="border: 1px solid rgb(236, 227, 227);" 
                           	  	<?php } ?>
                           	  >
                              <?php 
                           	  	if(isset($_POST['username']) && isset($profile)) { ?> 
                           	  
	                              <a class="user" href="/storyhoot/stories.php?username=<?= @$_POST['username']; ?>">
	                                <div class="mt-4">
	                                  <img src="<?= @$profile->getProfilePicture() ?>
	                                  	" alt="" class="profile img-responsive">
	                                </div>
	                                <?php if(isset($_POST['username'])){ ?>
	                                <div class="mt-2">
	                                  <div class="">
	                                    <h1 class=" username">
	                                    	<?= @$_POST['username']; ?>	
	                                    </h1>
	                                	<h1 class=" fullname">
		                                    <?= @$profile->getFullName();?>
		                                </h1>
	                                  </div>
	                                  <p class="">
	                                    <?php if(!isset($server_message)) { 
	                                      	if(@$profile->isPrivate()==1) { ?>
	                                      	<strong class="">This Account is Private</strong>
	                                      <?php 
	                                  		} else { 
	                                  		?>
	                                        <p class="lastup"><strong class="totalstories" style=""><button type="button" style=" background-color: #aa1801;color: #fff;" class="btn ">See 
	       									<?php
	       										@$stories_count = count(@$stories);
	       										if(@$stories_count == 1) { 
	       											echo @$stories_count . " story"; 
	       										} else {
	       											echo @$stories_count . " stories"; } 
	       									?> </button>
	                                        </strong>
	                                        <?php
	                                        	if (@$stories_count > 0) {
	                                        		echo "<br><br>Last story added <time>about " . round(@$last_story_at) . " hour(s) ago</time>";
	                                        	}
	                                        ?>
	                                        </p>
	                                      <?php } ?>
	                                    <?php } ?>      
	                                  </p>
	                                </div>
	                              <?php } ?>
	                              </a>
	                            
	                            <?php } else { ?>
	                              
	                              <h1 class=" fullname">
	                                    <?= @$server_message;?>
	                              </h1>

	                            <?php } ?>
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            
            <div id="td_uid_4_5d97223a73af2" class="tdc-row"><div class="vc_row td_uid_5_5d97223a73b35_rand  wpb_row td-pb-row">
              <style scoped="">

              /* custom css */
              .td_uid_5_5d97223a73b35_rand {
                                  min-height: 0;
                              }
              </style>
              <div class="vc_column td_uid_6_5d97223a73daa_rand  wpb_column vc_column_container tdc-column td-pb-span12">
              <style scoped="">

              /* custom css */
              .td_uid_6_5d97223a73daa_rand {
                                  vertical-align: baseline;
                              }
              </style>
            <div class="wpb_wrapper">
              <div class="td_block_wrap td_block_3 td_uid_7_5d97223a7401f_rand td-pb-border-top td_block_template_1 td-column-3 td_block_padding" data-td-block-uid="td_uid_7_5d97223a7401f">
                <!--<div class="td-block-title-wrap">
                  <h4 class="block-title td-block-title">
                    <span class="td-pulldown-size">Latest</span>
                  </h4>
                </div>-->
                <div id="td_uid_7_5d97223a7401f" class="td_block_inner">

            <div class="td-block-row">

              <div class="td-block-span4">
                <div class="td_module_1 td_module_wrap td-animation-stack">
                    <div class="td-module-image">
                        <div class="td-module-thumb">
                            <img width="110" height="70" class="img-responsive" src="https://www.techuntold.com/storyhoot/images/one.svg" alt="" title="How to Download Instagram Story">
                        </div>                            
                      </div>
                      <h3 class="entry-title td-module-title">
                       How to Download Instagram Story
                        
                      </h3>
                      <div class="td-module-meta-info">
                        <span class="td-post-date">Simply type the username of the person whose IG Story you want to save and press Enter or click Submit. StoryHoot will fetch the active stories of that account and show it to you. Below each photo/video you'll find a Download button using which you can easily save the Insta Story on your device.</span>                
                                 
                      </div>
                </div>
              </div> 

              <div class="td-block-span4">
                <div class="td_module_1 td_module_wrap td-animation-stack">
                    <div class="td-module-image">
                        <div class="td-module-thumb">
                            <img width="110" height="70" class="img-responsive" src="https://www.techuntold.com/storyhoot/images/two.svg" alt="" title="Privacy">
                        </div>                            
                      </div>
                      <h3 class="entry-title td-module-title">
                       100% Privacy
                        
                      </h3>
                      <div class="td-module-meta-info">
                        <span class="td-post-date">When you use our tool then the other person doesn't come to know whether you have viewed or downloaded their story. So, yes you can watch Instagram stories anonymously with StoryHoot.</span>                
                                 
                      </div>
                </div>
              </div> 

              <div class="td-block-span4">
                <div class="td_module_1 td_module_wrap td-animation-stack">
                    <div class="td-module-image">
                        <div class="td-module-thumb">
                            <img width="110" height="70" class="img-responsive" src="https://www.techuntold.com/storyhoot/images/three.svg" alt="" title="All Platforms Supported">
                        </div>                            
                      </div>
                      <h3 class="entry-title td-module-title">
                        All Devices supported
                        
                      </h3>
                      <div class="td-module-meta-info">
                        <span class="td-post-date">StoryHoot is a web app which means that you can use it on any of your devices be it Android, iOS, Windows PC or Mac to save Instagram story online.</span>                
                                 
                      </div>
                </div>
              </div> 
              
            </div>


            <div class="td-block-row">

              <div class="td-block-span4">
                <div class="td_module_1 td_module_wrap td-animation-stack">
                    <div class="td-module-image">
                        <div class="td-module-thumb">
                            <img width="110" height="70" class="img-responsive" src="https://www.techuntold.com/storyhoot/images/four.svg" alt="" title="Original Version">
                        </div>                            
                      </div>
                      <h3 class="entry-title td-module-title">
                      Original Version
                      </h3>
                      <div class="td-module-meta-info">
                        <span class="td-post-date">All the photos/videos in the story are shown or downloaded in the orginal quality.</span>                
                                 
                      </div>
                </div>
              </div> 

              <div class="td-block-span4">
                <div class="td_module_1 td_module_wrap td-animation-stack">
                    <div class="td-module-image">
                        <div class="td-module-thumb">
                            <img width="110" height="70" class="img-responsive" src="https://www.techuntold.com/storyhoot/images/five.svg" alt="" title="User Friendly">
                        </div>                            
                      </div>
                      <h3 class="entry-title td-module-title">
                      User Friendly
                        
                      </h3>
                      <div class="td-module-meta-info">
                        <span class="td-post-date">Simply provide the username and let StoryHoot do the rest of job.</span>                
                                 
                      </div>
                </div>
              </div> 

              <div class="td-block-span4">
                <div class="td_module_1 td_module_wrap td-animation-stack">
                    <div class="td-module-image">
                        <div class="td-module-thumb">
                            <img width="110" height="70" class="img-responsive" src="https://www.techuntold.com/storyhoot/images/six.svg" alt="" title="Security">
                        </div>                            
                      </div>
                      <h3 class="entry-title td-module-title">
                      Security
                        
                      </h3>
                      <div class="td-module-meta-info">
                        <span class="td-post-date">We don't store any data on our server. The stories are directly fetched from Instagram servers and shown to you. </span>                
                                 
                      </div>
                </div>
              </div> 
              
            </div>

            <!--./row-fluid-->

  <!--./row-fluid--></div></div> <!-- ./block --></div></div></div></div>
          <div id="td_uid_8_5d97223a8377f" class="tdc-row">
            <div class="vc_row td_uid_11_5d97223a837c7_rand  wpb_row td-pb-row">

              <div class="vc_column td_uid_12_5d97223a83a3c_rand  wpb_column vc_column_container tdc-column td-pb-span12">
                <div class="wpb_wrapper">
                  <div class="td_block_wrap tdb_loop td_uid_13_5d97223a868a1_rand tdb-numbered-pagination td_with_ajax_pagination td-pb-border-top td_block_template_1 tdb-category-loop-posts" data-td-block-uid="td_uid_13_5d97223a868a1">
                    <div class="td-block-title-wrap">
                      <h4 class="block-title"></h4>
                    </div>
                    <div class="td-block-row">

              <div class="td-block-span6">
                <div class="td_module_1 td_module_wrap td-animation-stack">
                    <div class=""><img class="img-responsive" src="https://www.techuntold.com/storyhoot/images/download-insta-story.jpeg" alt="Download Instagram Story"></div>
                </div>
              </div> 

              <div class="td-block-span6">
                <div class="td_module_1  td-animation-stack">
                    <div class="">
                      <h3 class="">How to Download Stories From Instagram:</h3>
                      <ol class=""><li class="">Type the desired username in our IG Story Downloader</li>
                        <li class="">StoryHoot will fetch all the active stories of that account in a few seconds</li>
                        <li class="">Click on Download button below the desired photo/video you wish to download in the story</li>
                      
                      </ol>
                    </div>
                </div>
              </div> 

              
              
            </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

</div></div>                </div>
            
         </div>
         <!-- /.td-main-content-wrap -->
         <!-- Instagram -->
         <!-- Footer -->
         <div class="td-footer-wrapper td-footer-container td-container-wrap td-footer-template-14 ">
            <div class="td-container td-footer-bottom-full">
               <div class="td-pb-row">
                  <div class="td-pb-span3">
                     <aside class="footer-logo-wrap"><a href="https://www.techuntold.com/"><img src="https://www.techuntold.com/wp-content/uploads/2018/09/techuntold-footer-logo.png" alt="TechUntold Footer Logo" title=""></a></aside>
                  </div>
                  <div class="td-pb-span5">
                     <aside class="footer-text-wrap">
                        <div class="block-title"><span>ABOUT US</span></div>
                        TechUntold is a media company that provides digital tips &amp; tricks and comprehensive product reviews.
                     </aside>
                  </div>
                  <div class="td-pb-span4">
                     <aside class="footer-social-wrap td-social-style-2">
                        <div class="block-title"><span>FOLLOW US</span></div>
                        <span class="td-social-icon-wrap">
                        <a target="_blank" rel="nofollow" href="https://www.facebook.com/techuntold" title="Facebook">
                        <i class="td-icon-font td-icon-facebook"></i>
                        </a>
                        </span>
                        <span class="td-social-icon-wrap">
                        <a target="_blank" rel="nofollow" href="https://www.instagram.com/techuntold" title="Instagram">
                        <i class="td-icon-font td-icon-instagram"></i>
                        </a>
                        </span>
                        <span class="td-social-icon-wrap">
                        <a target="_blank" rel="nofollow" href="https://www.twitter.com/techuntold" title="Twitter">
                        <i class="td-icon-font td-icon-twitter"></i>
                        </a>
                        </span>
                        <span class="td-social-icon-wrap">
                        <a target="_blank" rel="nofollow" href="https://www.youtube.com/techuntold" title="Youtube">
                        <i class="td-icon-font td-icon-youtube"></i>
                        </a>
                        </span>
                     </aside>
                  </div>
               </div>
            </div>
         </div>
         <!-- Sub Footer -->
         <div class="td-sub-footer-container td-container-wrap ">
            <div class="td-container">
               <div class="td-pb-row">
                  <div class="td-pb-span td-sub-footer-menu">
                  </div>
                  <div class="td-pb-span td-sub-footer-copy">
                     © TechUntold Media Enterprise                
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!--close td-outer-wrap-->
      <script type="text/javascript">jQuery(function(){omShortcodes.init(["buttons","tooltips","toggle","tabs","responsivebox","counter"]);});</script>        
      <div style="display:none" id="sc-fs-faq-entry"></div>
      <!--
         Theme: Newspaper by tagDiv.com 2019
         Version: 9.8 (rara)
         Deploy mode: deploy
         
         uid: 5d966c2ad9f17
         -->
      <!-- Custom css from theme panel -->
      <style type="text/css" media="screen">
         /* custom css theme panel */
         .td-post-content h3 a {
         color: #aa1801 !important;
         }
      </style>
      <script type="text/javascript">
         /* <![CDATA[ */
         var wpcf7 = {"apiSettings":{"root":"https:\/\/www.techuntold.com\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"}};
         /* ]]> */
      </script>
      <script type="text/javascript" src="https://www.techuntold.com/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=5.1.4"></script>
      <script type="text/javascript" src="https://www.techuntold.com/wp-content/plugins/olevmedia-shortcodes/assets/js/shortcodes.js?ver=1.1.9"></script>
      <script type="text/javascript" src="https://www.techuntold.com/wp-includes/js/underscore.min.js?ver=1.8.3"></script>
      <script type="text/javascript" src="https://www.techuntold.com/wp-content/plugins/td-cloud-library/assets/js/js_posts_autoload.min.js?ver=489325fca4f12cbec6ded350cf173551"></script>
      <script type="text/javascript" src="https://www.techuntold.com/wp-content/plugins/td-composer/legacy/Newspaper/js/tagdiv_theme.min.js?ver=9.8"></script>
      <script type="text/javascript" src="https://www.techuntold.com/wp-includes/js/comment-reply.min.js?ver=5744ee63ad0c9ec27c73d8e30397e7cf"></script>
      <script type="text/javascript" src="https://www.techuntold.com/wp-content/plugins/aawp/public/assets/js/scripts.min.js?ver=3.8.13"></script>
      <script type="text/javascript" src="https://www.techuntold.com/wp-content/plugins/td-cloud-library/assets/js/js_files_for_front.min.js?ver=489325fca4f12cbec6ded350cf173551"></script>
      <script type="text/javascript" src="https://www.techuntold.com/wp-includes/js/wp-embed.min.js?ver=5744ee63ad0c9ec27c73d8e30397e7cf"></script>
      <!-- JS generated by theme -->
      <script></script>
      
   </body>
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript">
    jQuery( document ).ready(function() {
     // setTimeout(function(){
      jQuery(".sub-menu").css('display','block');
     // alert();
    //}, 2000);
  });
   </script>
   
   </body>
</html>