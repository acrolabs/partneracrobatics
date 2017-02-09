<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'zerif_bootstrap_style','zerif_fontawesome' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );


// END ENQUEUE PARENT ACTION

// Add logout redirect

function logout_redirect_home(){
	wp_safe_redirect(home_url());
	exit;
}
add_action('wp_logout', 'logout_redirect_home');

/**
 * New dash widget
 */
function register_my_dashboard_widget() {
 	global $wp_meta_boxes;

	wp_add_dashboard_widget(
		'my_dashboard_widget',
		'PartnerAcrobatics.com Help',
		'my_dashboard_widget_display'
	);

 	$dashboard = $wp_meta_boxes['dashboard']['normal']['core'];

	$my_widget = array( 'my_dashboard_widget' => $dashboard['my_dashboard_widget'] );
 	unset( $dashboard['my_dashboard_widget'] );

 	$sorted_dashboard = array_merge( $my_widget, $dashboard );
 	$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}
add_action( 'wp_dashboard_setup', 'register_my_dashboard_widget' );

function my_dashboard_widget_display() {
	?>

	<p>
	We're using Wordpress... you can <a href="http://google.com">Google</a> most issues before you contact a developer.
	</p>

	<p>
	Please refer to this handy guide for website build information and basic use: <a href="http://www.islandguru.info/partneracro/wp-content/uploads/2017/01/PA.comWebsiteManualv1.1.pdf">PA Website Manual 1.1</a>
	</p>
<p>
And check out these videos for more in-depth tutorials.
</p>
<p>

<div class="yt-uix-overlay" style="text-align: center;"></div>
<div style="text-align: center;" data-ng-non-bindable=""> <span class=" ux-thumb-wrap"><span class="video-thumb yt-thumb yt-thumb-120 yt-thumb-fluid"><span class="yt-thumb-default"><span class="yt-thumb-clip"><a class="yt-uix-sessionlink yt-fluid-thumb-link" href="https://www.youtube.com/watch?v=z9b4HbEgBqQ" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ"><img src="https://i.ytimg.com/vi/z9b4HbEgBqQ/default.jpg?sqp=CJy_8cQF&amp;rs=AOn4CLBH4bcwf8WZVK9fYb0JIA_-2RWT_w" alt="" width="120" data-ytimg="1" /></a></span></span></span></span></div>
<div style="text-align: center;" data-ng-non-bindable=""><a class="vm-video-title-content yt-uix-sessionlink" href="https://www.youtube.com/watch?v=z9b4HbEgBqQ" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ">Yoast SEO Front End</a></div>
<div style="text-align: center;" data-ng-non-bindable=""></div>
<div style="text-align: center;" data-ng-non-bindable="">
<div class="vm-thumbnail-container vm-thumb"><span class=" ux-thumb-wrap"><a class="yt-uix-sessionlink yt-fluid-thumb-link" href="https://www.youtube.com/watch?v=eJIEsazKq_0" target="_blank" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ"><span class="video-thumb yt-thumb yt-thumb-120 yt-thumb-fluid"><span class="yt-thumb-default"><span class="yt-thumb-clip"><img src="https://i.ytimg.com/vi/eJIEsazKq_0/default.jpg?sqp=CJy_8cQF&amp;rs=AOn4CLA-UdU2MUGJcQAYE-cmf2Pc_DhOXw" alt="" width="120" data-ytimg="1" /> </span></span></span></a></span></div>
<div class="vm-video-info-container">
<div class="vm-video-title">
<div id="title_eJIEsazKq_0" class="vm-video-title-container "><a class="vm-video-title-content yt-uix-sessionlink" href="https://www.youtube.com/watch?v=eJIEsazKq_0" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ">Schedule</a></div>
</div>
</div>
</div>
<div class="vm-video-title-container " style="text-align: center;"></div>
<div style="text-align: center;" data-ng-non-bindable="">
<div class="vm-video-info-container">
<div class="vm-video-title">
<div class="vm-video-title-container ">
<div class="vm-thumbnail-container vm-thumb"><span class=" ux-thumb-wrap"><a class="yt-uix-sessionlink yt-fluid-thumb-link" href="https://www.youtube.com/watch?v=qaHQNH9mZtI" target="_blank" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ"><span class="video-thumb yt-thumb yt-thumb-120 yt-thumb-fluid"><span class="yt-thumb-default"><span class="yt-thumb-clip"><img src="https://i.ytimg.com/vi/qaHQNH9mZtI/default.jpg?sqp=CJy_8cQF&amp;rs=AOn4CLBgFe6fYBmIK73WAvmI4FrhbWw7rA" alt="" width="120" data-ytimg="1" /></span></span></span></a></span></div>
<div class="vm-video-info-container">
<div class="vm-video-title">
<div id="title_qaHQNH9mZtI" class="vm-video-title-container "><a class="vm-video-title-content yt-uix-sessionlink" href="https://www.youtube.com/watch?v=qaHQNH9mZtI" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ">Popup</a></div>
<div class="vm-video-title-container "></div>
</div>
</div>
</div>
</div>
</div>
<div class="vm-video-info-container">
<div class="vm-video-title">
<div class="vm-video-title-container ">
<div class="vm-video-info-container">
<div class="vm-video-title">
<div class="vm-video-title-container ">
<div class="vm-thumbnail-container vm-thumb"><span class=" ux-thumb-wrap"><a class="yt-uix-sessionlink yt-fluid-thumb-link" href="https://www.youtube.com/watch?v=EClrZz-dzrU" target="_blank" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ"><span class="video-thumb yt-thumb yt-thumb-120 yt-thumb-fluid"><span class="yt-thumb-default"><span class="yt-thumb-clip"><img src="https://i.ytimg.com/vi/EClrZz-dzrU/default.jpg?sqp=CJy_8cQF&amp;rs=AOn4CLAlHz9gZVHprfm0DaCkbTT3HusCrw" alt="" width="120" data-ytimg="1" /> </span></span></span></a></span></div>
<div class="vm-thumbnail-container vm-thumb"><a class="vm-video-title-content yt-uix-sessionlink" href="https://www.youtube.com/watch?v=EClrZz-dzrU" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ">Manual Entries</a></div>
<div class="vm-thumbnail-container vm-thumb"></div>
</div>
<div class="vm-video-title-container ">
<div class="vm-thumbnail-container vm-thumb">
<div class="vm-thumbnail-container vm-thumb"><span class=" ux-thumb-wrap"><a class="yt-uix-sessionlink yt-fluid-thumb-link" href="https://www.youtube.com/watch?v=TV69UEMJ27k" target="_blank" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ"><span class="video-thumb yt-thumb yt-thumb-120 yt-thumb-fluid"><span class="yt-thumb-default"><span class="yt-thumb-clip"><img src="https://i.ytimg.com/vi/TV69UEMJ27k/default.jpg?sqp=CJy_8cQF&amp;rs=AOn4CLDzvJfZFnTW8wlSHJjGl_O9_H7XsA" alt="" width="120" data-ytimg="1" /> </span></span></span></a></span></div>
<div class="vm-thumbnail-container vm-thumb"><a class="vm-video-title-content yt-uix-sessionlink" href="https://www.youtube.com/watch?v=TV69UEMJ27k" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ">Logging In / Out</a></div>
<div class="vm-thumbnail-container vm-thumb"></div>
</div>
</div>
<div class="vm-thumbnail-container vm-thumb"><a class="yt-uix-sessionlink yt-fluid-thumb-link" href="https://www.youtube.com/watch?v=145kVo2B5Qc" target="_blank" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ"><span class="video-thumb yt-thumb yt-thumb-120 yt-thumb-fluid"><span class="yt-thumb-default"><span class="yt-thumb-clip"><img src="https://i.ytimg.com/vi/145kVo2B5Qc/default.jpg?sqp=CJy_8cQF&amp;rs=AOn4CLCJCU1r70ovoGqfRt6NBnD-BSe9Wg" alt="" width="120" data-ytimg="1" /></span></span></span></a></div>
<div class="vm-thumbnail-container vm-thumb"><a class="vm-video-title-content yt-uix-sessionlink" href="https://www.youtube.com/watch?v=145kVo2B5Qc" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ">Google Forms</a></div>
<div class="vm-thumbnail-container vm-thumb"></div>
<div class="vm-thumbnail-container vm-thumb">
<div class="vm-thumbnail-container vm-thumb"><span class=" ux-thumb-wrap"><a class="yt-uix-sessionlink yt-fluid-thumb-link" href="https://www.youtube.com/watch?v=EyNkeYe0iY4" target="_blank" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ"><span class="video-thumb yt-thumb yt-thumb-120 yt-thumb-fluid"><span class="yt-thumb-default"><span class="yt-thumb-clip"><img src="https://i.ytimg.com/vi/EyNkeYe0iY4/default.jpg?sqp=CJy_8cQF&amp;rs=AOn4CLC2c8rmhb5x96r3vTnsqLOP1qsp4w" alt="" width="120" data-ytimg="1" /> </span></span></span></a></span></div>
<div class="vm-video-info-container">
<div class="vm-video-title">
<div id="title_EyNkeYe0iY4" class="vm-video-title-container "><a class="vm-video-title-content yt-uix-sessionlink" href="https://www.youtube.com/watch?v=EyNkeYe0iY4" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ">Events</a></div>
<div class="vm-video-title-container "></div>
<div class="vm-video-title-container ">
<div class="vm-thumbnail-container vm-thumb"><span class=" ux-thumb-wrap"><a class="yt-uix-sessionlink yt-fluid-thumb-link" href="https://www.youtube.com/watch?v=zTfNX8v4WPE" target="_blank" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ"><span class="video-thumb yt-thumb yt-thumb-120 yt-thumb-fluid"><span class="yt-thumb-default"><span class="yt-thumb-clip"><img src="https://i.ytimg.com/vi/zTfNX8v4WPE/default.jpg?sqp=CJy_8cQF&amp;rs=AOn4CLAEBtn4UokHOZc0IBN4-eYCOhQNHA" alt="" width="120" data-ytimg="1" /> </span></span></span></a></span></div>
<div class="vm-thumbnail-container vm-thumb"><a class="vm-video-title-content yt-uix-sessionlink" href="https://www.youtube.com/watch?v=zTfNX8v4WPE" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ">Edit Front Page</a></div>
<div class="vm-thumbnail-container vm-thumb"></div>
<div class="vm-thumbnail-container vm-thumb">
<div class="vm-thumbnail-container vm-thumb"><span class=" ux-thumb-wrap"><a class="yt-uix-sessionlink yt-fluid-thumb-link" href="https://www.youtube.com/watch?v=jtUzaXk1iB8" target="_blank" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ"><span class="video-thumb yt-thumb yt-thumb-120 yt-thumb-fluid"><span class="yt-thumb-default"><span class="yt-thumb-clip"><img src="https://i.ytimg.com/vi/jtUzaXk1iB8/default.jpg?sqp=CJy_8cQF&amp;rs=AOn4CLAMqwM6XdXbWlu3xdSoZxgqPacLnA" alt="" width="120" data-ytimg="1" /> </span></span></span></a></span></div>
<div class="vm-thumbnail-container vm-thumb"><a class="vm-video-title-content yt-uix-sessionlink" href="https://www.youtube.com/watch?v=jtUzaXk1iB8" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ">Edit About Page</a></div>
<div class="vm-thumbnail-container vm-thumb"></div>
<div class="vm-thumbnail-container vm-thumb">
<div class="vm-thumbnail-container vm-thumb"><span class=" ux-thumb-wrap"><a class="yt-uix-sessionlink yt-fluid-thumb-link" href="https://www.youtube.com/watch?v=KnFx6xGJoOc" target="_blank" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ"><span class="video-thumb yt-thumb yt-thumb-120 yt-thumb-fluid"><span class="yt-thumb-default"><span class="yt-thumb-clip"><img src="https://i.ytimg.com/vi/KnFx6xGJoOc/default.jpg?sqp=CJy_8cQF&amp;rs=AOn4CLASqKus6DaNmEhCcKhtF-sZG26IKQ" alt="" width="120" data-ytimg="1" /></span></span></span></a></span></div>
<div class="vm-thumbnail-container vm-thumb"><a class="vm-video-title-content yt-uix-sessionlink" href="https://www.youtube.com/watch?v=KnFx6xGJoOc" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ">Dashboard</a></div>
<div class="vm-thumbnail-container vm-thumb"></div>
<div class="vm-thumbnail-container vm-thumb">
<div class="vm-thumbnail-container vm-thumb" style="text-align: center;"><span class=" ux-thumb-wrap"><a class="yt-uix-sessionlink yt-fluid-thumb-link" href="https://www.youtube.com/watch?v=R3OseucJQLk" target="_blank" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ"><span class="video-thumb yt-thumb yt-thumb-120 yt-thumb-fluid"><span class="yt-thumb-default"><span class="yt-thumb-clip"><img src="https://i.ytimg.com/vi/R3OseucJQLk/default.jpg?sqp=CJy_8cQF&amp;rs=AOn4CLAhwQe4w5C74-zJQdhEcR2qIdLPxQ" alt="" width="120" data-ytimg="1" /> </span></span></span></a></span></div>
<div class="vm-thumbnail-container vm-thumb" style="text-align: center;"><a class="vm-video-title-content yt-uix-sessionlink" href="https://www.youtube.com/watch?v=R3OseucJQLk" data-sessionlink="ei=UmCcWL_kPM-SqwXVmJzICQ">Adding and Editing Teachers</a></div>
<div class="vm-video-info-container"></div>
</div>
<div id="vm-video-list-container" class="clearfix vm-list-view ng-scope" data-ng-controller="videoListCtrl as ctrl"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</p>
	<?php
}

