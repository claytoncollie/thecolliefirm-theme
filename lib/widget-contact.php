<?php

/**
 * Contact Widget
 *
 * @package The Collie Firm
 * @author Clayton Collie of Sheley Marketing
 * @since 1.0.0
 * @link http://www.sheleymarketing.com
 * @license GPL2-0+
 */

add_action( 'widgets_init', 'collie_register_widget_contact');
function collie_register_widget_contact() {
    register_widget('Collie_Contact_Widget');
}

class Collie_Contact_Widget extends WP_Widget {

    /**
     * Holds widget settings defaults, populated in constructor.
     *
     * @since 1.0.0
     * @var array
     */
    protected $defaults;

    /**
     * Constructor
     *
     * @since 1.0.0
     */
    function __construct() {

        // widget defaults
        $this->defaults = array(
            'title'          => '',
            'name'           => '',
            'company'        => '',
            'address_one'    => '',
            'address_two'    => '',
            'city'           => '',
            'state'          => '',
            'zip'            => '',
            'phone'          => '',
            'fax'            => '',
            'email'          => '',
        );

        // Widget Slug
        $widget_slug = 'contact-widget';

        // widget basics
        $widget_ops = array(
            'classname'   => $widget_slug,
            'description' => esc_html__('Displays the contact information with underlying schema markup.', 'collie')
        );

        // widget controls
        $control_ops = array(
            'id_base' => $widget_slug,
            'width'   => '400',
        );

        // load widget
        parent::__construct( $widget_slug, esc_html__('Collie Firm - Contact Information', 'collie'), $widget_ops, $control_ops );

    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @since 1.0.0
     * @param array $instance An array of the current settings for this widget
     */
    function form( $instance ) {

        // Merge with defaults
        $instance = wp_parse_args( (array) $instance, $this->defaults );
        ?>
        <!-- Title -->
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
        </p>
        <!-- name -->
        <p>
            <label for="<?php echo $this->get_field_id( 'name' ); ?>">name:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo esc_attr( $instance['name'] ); ?>" class="widefat" />
        </p>
        <!-- company -->
        <p>
            <label for="<?php echo $this->get_field_id( 'company' ); ?>">company:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'company' ); ?>" name="<?php echo $this->get_field_name( 'company' ); ?>" value="<?php echo esc_attr( $instance['company'] ); ?>" class="widefat" />
        </p>
        <!-- address_one -->
        <p>
            <label for="<?php echo $this->get_field_id( 'address_one' ); ?>">address_one:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'address_one' ); ?>" name="<?php echo $this->get_field_name( 'address_one' ); ?>" value="<?php echo esc_attr( $instance['address_one'] ); ?>" class="widefat" />
        </p>
        <!-- address_two -->
        <p>
            <label for="<?php echo $this->get_field_id( 'address_two' ); ?>">address_two:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'address_two' ); ?>" name="<?php echo $this->get_field_name( 'address_two' ); ?>" value="<?php echo esc_attr( $instance['address_two'] ); ?>" class="widefat" />
        </p>
        <!-- city -->
        <p>
            <label for="<?php echo $this->get_field_id( 'city' ); ?>">city:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'city' ); ?>" name="<?php echo $this->get_field_name( 'city' ); ?>" value="<?php echo esc_attr( $instance['city'] ); ?>" class="widefat" />
        </p>
        <!-- state -->
        <p>
            <label for="<?php echo $this->get_field_id( 'state' ); ?>">state:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'state' ); ?>" name="<?php echo $this->get_field_name( 'state' ); ?>" value="<?php echo esc_attr( $instance['state'] ); ?>" class="widefat" />
        </p>
        <!-- zip -->
        <p>
            <label for="<?php echo $this->get_field_id( 'zip' ); ?>">zip:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'zip' ); ?>" name="<?php echo $this->get_field_name( 'zip' ); ?>" value="<?php echo esc_attr( $instance['zip'] ); ?>" class="widefat" />
        </p>
        <!-- phone -->
        <p>
            <label for="<?php echo $this->get_field_id( 'phone' ); ?>">phone:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" value="<?php echo esc_attr( $instance['phone'] ); ?>" class="widefat" />
        </p>
        <!-- fax -->
        <p>
            <label for="<?php echo $this->get_field_id( 'fax' ); ?>">fax:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'fax' ); ?>" name="<?php echo $this->get_field_name( 'fax' ); ?>" value="<?php echo esc_attr( $instance['fax'] ); ?>" class="widefat" />
        </p>
        <!-- email -->
        <p>
            <label for="<?php echo $this->get_field_id( 'email' ); ?>">email:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo esc_attr( $instance['email'] ); ?>" class="widefat" />
        </p>

        <?php
    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @since 1.0.0
     * @param array $new_instance An array of new settings as submitted by the admin
     * @param array $old_instance An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     */
    function update( $new_instance, $old_instance ) {

        $new_instance['title']          = strip_tags( $new_instance['title'] );
        $new_instance['name']           = strip_tags( $new_instance['name'] );
        $new_instance['company']        = strip_tags( $new_instance['company'] );
        $new_instance['address_one']    = strip_tags( $new_instance['address_one'] );
        $new_instance['address_two']    = strip_tags( $new_instance['address_two'] );
        $new_instance['city']           = strip_tags( $new_instance['city'] );
        $new_instance['state']          = strip_tags( $new_instance['state'] );
        $new_instance['zip']            = strip_tags( $new_instance['zip'] );
        $new_instance['phone']          = strip_tags( $new_instance['phone'] );
        $new_instance['fax']            = strip_tags( $new_instance['fax'] );
        $new_instance['email']          = strip_tags( $new_instance['email'] );

        return $new_instance;
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @since 1.0.0
     * @param array $args An array of standard parameters for widgets in this theme
     * @param array $instance An array of settings for this widget instance
     */
    function widget( $args, $instance ) {

        

        extract( $args );

        // Merge with defaults
        $instance = wp_parse_args( (array) $instance, $this->defaults );

        echo $before_widget;

        $title          = $instance['title'];
        $name           = $instance['name'];
        $company        = $instance['company'];
        $address_one    = $instance['address_one'];
        $address_two    = $instance['address_two'];
        $city           = $instance['city'];
        $state          = $instance['state'];
        $zip            = $instance['zip'];
        $phone          = $instance['phone'];
        $fax            = $instance['fax'];
        $email          = $instance['email'];

        if ( $title ) {
            echo $before_title . $title . $after_title;
        }

        echo '<div itemscope="" itemtype="http://schema.org/Attorney">';

            if ( $company ) {
                printf('<div itemprop="legalName"><i class="fa fa-building" aria-hidden="true"></i>%s</div>',
                    esc_html($company)
                );
            }

            if ( $name ) {
                printf('<div itemprop="founder"><i class="fa fa-user" aria-hidden="true"></i>%s</div>',
                    esc_html($name)
                );
            }

            if($address_one || $address_two || $city || $state || $zip) {

                echo '<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">';

                    if ( $address_one && $address_two ) {
                        printf('<div itemprop="streetAddress"><i class="fa fa-map-marker" aria-hidden="true"></i>%s, %s</div>',
                            esc_html($address_one),
                            esc_html($address_two)
                        );
                    }elseif( $address_one ) {
                        printf('<div itemprop="streetAddress"><i class="fa fa-map-marker" aria-hidden="true"></i>%s</div>',
                            esc_html($address_one)
                        );
                    }

                    if ( $city && $state && $zip ) {
                        printf('<div><i class="fa fa-globe" aria-hidden="true"></i><span itemprop="addressLocality">%s</span>,<span itemprop="addressRegion">%s</span><span itemprop="postalCode">%s</span></div>',
                            esc_html($city),
                            esc_html($state),
                            esc_html($zip)
                        );
                    }

                echo '</div>';

            }

            if ( $phone ) {
                printf('<div itemprop="telephone"><i class="fa fa-phone" aria-hidden="true"></i>%s</div>', 
                    esc_html($phone) 
                );
            }

            if ( $fax ) {
                printf('<div itemprop="faxNumber"><i class="fa fa-fax" aria-hidden="true"></i>%s</div>', 
                    esc_html($fax) 
                );
            }

            if ( $email ) {
               printf('<div ><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:%s"><span itemprop="email">%s</span></a></div>',
                    antispambot($email),
                    antispambot($email)
                );
            }

        echo '</div>';

        echo $after_widget;

    }
}