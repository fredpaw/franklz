<?php
if (is_single()) {
	$post_cat = get_the_category();
	$args = array(
		'posts_per_page'   => 20,
		'offset'           => 0,
		'category'         => $post_cat[0]->cat_ID,
		'category_name'    => '',
		'orderby'          => 'date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'author'	   => '',
		'author_name'	   => '',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);
	$posts_array = get_posts( $args );
	echo "<div id='sidebar-cat'>";
	echo "<h4 class='side_cat_title'><a href='".get_category_link($post_cat[0]->cat_ID)."'>".$post_cat[0]->name."</a></h4>";
	echo "<ul class='side_cat_list'>";
	foreach ($posts_array as $content) {
		echo "<li><a href='".$content->guid."'>".$content->post_title."</a></li>";
	}
	echo "</ul>";
	echo "<a href='".get_category_link($post_cat[0]->cat_ID)."'>更多文章</a>";
	echo "</div>";
} 