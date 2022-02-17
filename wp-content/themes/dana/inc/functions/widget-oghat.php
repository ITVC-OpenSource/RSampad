<?php

class time_widget extends WP_Widget {
	
	function __construct() {
		parent::__construct(
			'time_widget', 
			esc_html( 'اوقات شرعی'), 
			array( 'description' => esc_html( 'ابزارک اوقات شرعی'), 'classname'	=>	'negarmag_wg')
		);
	}

	
	public function widget( $args, $instance ) {
        $states = ! empty( $instance['states'] ) ? $instance['states'] :1;
global $themeoptions;
		?>
<div class="azan  col-lg-3 col-md-12">
				<?php
					$Azan 	= Get_Oghat($states);
				
					IF (!Empty($Azan)) {
				?>
					
					<div class="azan-hader"><span class="title-azan-widget">اوقات شرعی</span><span class="title-city">اوقات به افق : <?php Echo $Azan->CityName ; ?></span></div>
				<div class="azan-footer">
					<div class="Imsaak " id="oghat_sobh">
                        <div class="icon-imsaak azan-bf" ></div>
						<span class="azan-loc" >اذان صبح</span>
						<span class="azan-num"><?php Echo $Azan->Imsaak ; ?></span>
					</div>
					<div class="Sunrise">
                        <div class="icon-sunrise azan-bf" ></div>
						<span class="azan-loc" >طلوع خورشید</span>
						<span class="azan-num"><?php Echo $Azan->Sunrise ; ?></span>
					</div>
					<div class="Noon">
                        <div class="icon-noon azan-bf" ></div>
						<span class="azan-loc" >اذان ظهر</span>
						<span class="azan-num"><?php Echo $Azan->Noon ; ?></span>
					</div>
					<div class="SSunset ">
                        <div class="icon-sunset azan-bf" ></div>
						<span class="azan-loc">غروب خورشید</span>
						<span class="azan-num"><?php Echo $Azan->Sunset ; ?></span>
					</div>
					<div class="Maghreb">
                        <div class="icon-maghreb azan-bf" ></div>
						<span class="azan-loc">اذان مغرب</span>
						<span class="azan-num"><?php Echo $Azan->Maghreb ; ?></span>
					</div>
				</div>
				
					
				
				<?php } ?>
			</div>
		<?php 
		
	}

	public function form( $instance ) {
        $states = ! empty( $instance['states'] ) ? $instance['states'] :1;
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'states' ) ); ?>">استان</label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'states' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'states' ) ); ?>">

                <?php
                    $states_tmp = array(
                        '1' => 'تهران',
                        '2' => 'اصفهان',
                        '3' => 'ارومیه',
                        '4' => 'اراک',
                        '5' => 'اهواز',
                        '6' => 'تبریز',
                        '7' => 'بندرعباس',
                        '8' => 'شیراز',
                        '9' => 'کرج',
                        '10' => 'قزوین',
                        '11' => 'قم',
                        '12' => 'زاهدان',
                        '13' => 'مشهد',
                        '14' => 'یزد',
                        '15' => 'بجنورد',
                        '16' => 'رشت',
                        '17' => 'ساری',
                        '18' => 'گرگان',
                        '19' => 'کرمان',
                        '20' => 'بوشهر',
                        '21' => 'کرمانشاه',
                        '22' => 'سنندج',
                        '23' => 'مهاباد',
                        '24' => 'همدان',
                        '25' => 'زنجان',
                        '26' => 'اردبیل',
                        '27' => 'سمنان',
                        '28' => 'اصفهان',
                        '29' => 'ایلام',
                        '30' => 'خرم آباد',
                        '31' => 'شهرکرد',
                        '32' => 'یاسوج',
                    );
                    foreach ($states_tmp as $key => $val){
                        $selected = $states == $key?' selected':'';
                        echo '<option value="'.$key.'"'.$selected.'>'.$val.'</option>';
                    }
                ?>
            </select>
        </p>
        <?php
	}


	public function update( $new_instance, $old_instance ) {
        $instance = array();

        $instance['states'] = ( !empty( $new_instance['states'] ) ) ? strip_tags( $new_instance['states'] ) : 1;

        return $instance;
	}

} 

function register_time_widget() {
    register_widget( 'time_widget' );
}
add_action( 'widgets_init', 'register_time_widget' );
