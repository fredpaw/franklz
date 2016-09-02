<?php

/*
	add footer content
*/
class Footer_Layout extends WP_Widget {
	
	public function __construct() {
		$widget_ops = array(
				'classname' => 'footer_layout',
				'description' => 'Footer Content',
		);
		parent::__construct('footer_layout', 'Footer Layout', $widget_ops);
	}
	
	public function widget($args, $instance) {
		include_once("templates/footer.php");
	}
}

class Category_Name extends WP_Widget {
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'category_name',
			'description' => 'Category title for homepage',
		);
		parent::__construct( 'category_name', 'Category Name', $widget_ops );
	}

	public function widget( $args, $instance ) {
		$links = $instance['cat-id'] == 0 ? get_permalink(162): get_category_link($instance['cat-id']);
		echo "<h3 class='cat_title' style='background:".$instance['background-color'].";'><a href='".$links."'>".$instance['title']."</a></h3>";
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		$catid = ! empty( $instance['cat-id'] ) ? $instance['cat-id'] : __( 'New category id', 'text_domain' );
		$bgcolor = ! empty( $instance['background-color'] ) ? $instance['background-color'] : __( 'New background color', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'cat-id' ) ); ?>"><?php _e( esc_attr( 'Category ID:' ) ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cat-id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cat-id' ) ); ?>" type="text" value="<?php echo esc_attr( $catid ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'background-color' ) ); ?>"><?php _e( esc_attr( 'Background Color:' ) ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'background-color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'background-color' ) ); ?>" type="text" value="<?php echo esc_attr( $bgcolor ); ?>">
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
}

class Current_Category_Post extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname' => 'current_category_post',
			'description' => 'Current Category Recent Post',
		);
		parent::__construct( 'current_category_post', 'Current Category Post', $widget_ops );
	}
	
	public function widget($args, $instance) {
		include_once("templates/cur_cate_post.php");
	}
}

add_action('widgets_init', function() {
	register_widget('Footer_Layout');
	register_widget('Category_Name');
	register_widget('Current_Category_Post');
});

/*
	Add Script and Style Sheet
*/
function themeslug_enqueue_script() {
	wp_enqueue_script( 'sub_theme_script', get_bloginfo('stylesheet_directory').'/js/script.js', ['jquery'], '1.0.0', false );
}

add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );