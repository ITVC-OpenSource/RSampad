<?php
/*
Plugin Name: کمیته فناوری
Description: قابلیت های مورد نیاز وبسایت از این طریق اضافه می شود.
Author: کمیته فناوری::محمد بهجت پور::09369986316
Version: 1.0
Author URI: https://rsampad.ir/
*/

// register HB widget
add_action('widgets_init', function(){
    register_widget('HB');
});

class HB extends WP_Widget {
    public function __construct() {
        $widget_ops = array(
            'classname' => 'کمیته فناوری - تبریک تولد',
            'description' => 'این پلاگین دیتا را از دیتابیس فچ کرده و نمایش می دهد.',
        );
        parent::__construct( 'itvc-HB', 'کمیته فناوری - تبریک تولد', $widget_ops );
    }

    public function widget( $args, $instance ) {
		echo "<div class='widget HB HB-root' id='HB-root'>";
		echo '<div class="widget-top">
			<h4>تبریک تولد</h4>
			<div class="stripe-line"></div>
		</div>
		<div class="widget-container">';
        echo file_get_contents("http://rsampad.ir/HB/index.php?y=" . $instance['y']);
        echo "</div></div>";
    }

    public function form( $instance ) {
        if (isset($instance['y'])) {
            $y = $instance['y'];
        }
        else {
            $y = __('y', 'wpb_widget_domain');
        }
        // Widget admin form
?>
    <p>
        <label for="<?php echo $this->get_field_id("y"); ?>"><?php _e("سال:"); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id("y"); ?>" name="<?php echo $this->get_field_name("y"); ?>" type="text" value="<?php echo esc_attr($y); ?>" />
    </p>
<?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['y'] = (!empty($new_instance['y'])) ? strip_tags($new_instance['y']):'';
        return $instance;
    }
}

// register views widget
add_action('widgets_init', function(){
    register_widget('views');
});

class views extends WP_Widget {
    public function __construct() {
        $widget_ops = array(
            'classname' => 'کمیته فناوری - بازدید ها',
            'description' => 'این پلاگین دیتا را از دیتابیس فچ کرده و نمایش می دهد.',
        );
        parent::__construct( 'itvc-views', 'کمیته فناوری - بازدید ها', $widget_ops );
    }

    public function widget( $args, $instance ) {
		echo "<div class='widget views views-root' id='views-root'>";
		echo '<div class="widget-top">
			<h4>بازدید ها</h4>
			<div class="stripe-line"></div>
		</div>
		<div class="widget-container">';
        echo file_get_contents("http://rsampad.ir/views/index.php?a=g");
        echo "</div></div>";
    }

    public function form( $instance ) {}

    public function update( $new_instance, $old_instance ) {}
}
?>
