<?php
/*
Plugin Name: Widget Adserver
Plugin URI: http://bumbablog.com/adserver/
Description: Rentabiliza tu sitio web en unos minutos con Widget Adserver.
Version: 0.51
Author: BUMBABlog
Author URI: http://bumbablog.com/adserver/
*/

add_action('widgets_init', 'fb_load_bumba_widgets');

function fb_load_bumba_widgets() {
    register_widget( 'Fbrelatedbumba_Widget' );
}

class Fbrelatedbumba_Widget extends WP_Widget {

    function Fbrelatedbumba_Widget() {
        /* Widget settings. */
        $widget_ops     = array( 'classname' => 'fbrelatedbumba', 'description' => __('Rentabiliza tu página en unos minutos con Widget Adserver.', 'Related Adserver') );

        /* Widget control settings. */
        $control_ops    = array( 'width' => 300, 'height' => 350, 'id_base' => 'related-bumba-widget' );

        /* Create the widget. */
        $this->WP_Widget( 'related-bumba-widget', __('Widget BUMBABlog Adserver', 'Related Adserver'), $widget_ops, $control_ops );
    }


    function widget( $args, $instance ) {
        extract( $args );

        
            global $post;

            $title              = apply_filters('widget_title', $instance['title'] );
          	$bumba_adserver_dimen       = $instance['bumba_adserver_dimen'];
           
            echo $before_widget;
           
			
			?>
 
<!-- Begin BUMBABlog Adserver Code -->
<script language="javascript"><!--//
var server_client_id = <?php echo $instance['title']; ?>;
var server_ad_channel = 1;
var server_publisher_channels = "";
var server_media_types = "text,hybrid";
var server_integrate_media_types = 0;
var server_ad_width = 300;  
var server_ad_height = 250;
var server_ad_style = "<?php echo $instance['bumba_adserver_dimen']; ?>_as";
var server_code_version = "4";
var server_ad_color_border = "FFFFFF";
var server_ad_color_background = "FFFFFF";
var server_ad_color_headline = "444444";
var server_ad_color_body = "444444";
var server_ad_color_url = "FF6600";
var server_ad_random = 1;
//--></script>
<script type="text/javascript" src="http://bumbablog.com/ad/ads/display_ads.php">
</script>
<!-- End BUMBABlog Adserver Code -->        

         
            
            <?php
			
			
			 echo $after_widget;
    
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['bumba_adserver_dimen'] = $new_instance['bumba_adserver_dimen'];
       
        return $instance;
    }

    function form( $instance ) {

        /* Set up some default widget settings. */
        $defaults   = array( 'title' => __('', 'hybrid'), 'bumba_adserver_dimen' => __('300x250', 'fb_bumba_adserver_dimen'));
        $instance   = wp_parse_args( (array) $instance, $defaults );

        echo <<<ST1
        
		<p><b>Rentabiliza tu web en unos minutos</b></p>
		
		<p>
            <label for='{$this->get_field_id('title')}'>ID de Publisher (Customer Number):</label>
            <input type='text' value='{$instance['title']}' name='{$this->get_field_name('title')}' id='{$this->get_field_id('title')}' class='widefat'>
			<br>Consigue aca tu <b><a href="http://bumbablog.com/ad/signup.php?user_type=pub&login_base_url=http://bumbablog.com/bumbablog-adsever" target="_blank">ID de Publisher</a></b></br>
        </p>
        <p>
            <label for='{$this->get_field_id('bumba_adserver_dimen')}'>Dimensiones de la creatividad:</label>
            <input type='text' id='{$this->get_field_id('bumba_adserver_dimen')}' name='{$this->get_field_name('bumba_adserver_dimen')}' value='{$instance['bumba_adserver_dimen']}' class='widefat'>
        </p>
			<br><b>Elige una de las siguientes dimensiones:</b></br>
			<br>120x600; 160x600; 336x280; 300x250; 728x90</br>
			<br><b>Nota:</b> Si le pones otras dimensiones la creatividad no aparecerá</br>
		
		
		
		
		
		
ST1;

    }


}
?>