<?php

// In child themes the functions.php is applied before the parent
// theme's functions.php. So we need to wait for the parent theme to add
// it's filter before we can remove it.
add_action( 'after_setup_theme', 'my_child_theme_setup' );

function my_child_theme_setup() {
	// Removes the filter that adds the "singular" class to the body element
	// which centers the content and does not allow for a sidebar
	remove_filter( 'body_class', 'twentyeleven_body_classes' );
}

/**
 * my first shortcode ever
 * used to have song titles in my Rock Church blog entries
 * link to the internal lyrics database
*/
function songTitle($atts, $content = null) {
	extract(shortcode_atts(array(
		'title'=>'',
		'lyrics'=>'',
	),$atts));
	if($lyrics == '') { return '<a target="/scripts/newWindow.js" href="/scripts/lyrics.php?song='.esc_attr($title).'&lyrics='.esc_attr($lyrics).'">'.esc_attr($title).'</a>';}
	else { return '<a target="/scripts/newWindow.js" href="/scripts/lyrics.php?song='.esc_attr($title).'&lyrics='.esc_attr($lyrics).'">'.esc_attr($title).' ('.esc_attr($lyrics).')</a>';}
}
add_shortcode("song", "songTitle");

/**
 * Not my code, modified from http://codesnipp.it/css/pure-css-spoiler-tag
 * Many thanks to author Steffen Franzkoch, whose code was one of the
 * first that popped up in a Google search for CSS spoiler tags.
 * Published 11/29/2011
 **/
function spoilerstart($atts, $content = null) {
	return '<h1>Spoiler Alert! (place and hold your mouse over the bar to see)</h1>
<div class="spoiler">
	<div class="view-protection top"></div>
	<p>';
}
add_shortcode("spoilerstart", "spoilerstart");


function spoilerend($atts, $content = null) {
	return '</p>
	<div class="view-protection bottom"></div>
</div>';
}
add_shortcode("spoilerend", "spoilerend");

?>