<?php
/**
 * Basic theme functions.
 *
 * This file contains hook functions attached to core hooks.
 *
 * @package Creativ Singer
 */

if( ! function_exists( 'creativ_singer_primary_navigation_fallback' ) ) :

	/**
	 * Fallback for primary navigation.
	 *
	 * @since 1.0.0
	 */
	function creativ_singer_primary_navigation_fallback() {
		
		echo '<ul>';
			echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' .esc_html__( 'Home', 'creativ-singer' ). '</a></li>';
			wp_list_pages( array(
			'title_li' => '',
			'depth'    => 1,
			'number'   => 5,
			) );
		echo '</ul>';

	}

endif;


if ( ! class_exists( 'WP_Customize_Control' ) )
  return NULL;

/**
 * Class creativ_singer_Dropdown_Taxonomies_Control
 */
class creativ_singer_Dropdown_Taxonomies_Control extends WP_Customize_Control {

    /**
     * Render the control's content.
     *
     * @since 3.4.0
     */
    public function render_content() {
        $dropdown = wp_dropdown_categories(
            array(
                'name'              => 'creativ-singer-dropdown-categories-' . $this->id,
                'echo'              => 0,
                'show_option_none'  => __( '&mdash; Select &mdash;', 'creativ-singer' ),
                'option_none_value' => '0',
                'selected'          => $this->value(),
                'hide_empty'        => 0,                   

            )
        ); 
        
        $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

        printf(
            '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s <span class="description customize-control-description"></span>%s </label>',
            esc_html($this->label),
            esc_html($this->description),
            $dropdown

        );
    }

}

 /**
 * Customize Control for Repeater Text.
 *
 * @since 1.0.0
 *
 * @see WP_Customize_Control
 */
class creativ_singer_Repeater_Text_Control extends WP_Customize_Control {

    /**
     * Control type.
     *
     * @access public
     * @var string
     */
    public $type = 'repeater-text';

    /**
     * Render content.
     *
     * @since 1.0.0
     */
    public function render_content() {
        ?>
        <?php if ( ! empty( $this->label ) ) : ?>
            <h3><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span></h3>
        <?php endif; ?>
        <?php if ( ! empty( $this->description ) ) : ?>
            <span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
        <?php endif; ?>
        <label class="repeater-text-input">
            <input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="repeater-text-value" <?php $this->link(); ?> />
            <div class="repeater-text-fields">
                <div class="set">
                    <input type="text" value="" class="repeater-text-single-field" />
                    <span class="btn-remove-field"><span class="dashicons dashicons-no-alt"></span></span>
                </div>
            </div>
            <a href="#" class="button button-primary btn-add-field"><?php esc_html_e( 'Add New', 'creativ-singer' ) ?></a>
        </label><!-- .repeater-text-input -->
        <?php
    }
}

/**
 * Customizer Controls
 *
 * @package Creativ Singer
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) :
    return null;
endif;

/**
 * Upsell customizer section.
 *
 * @since  1.0.0
 * @access public
 */
class creativ_singer_Customize_Section_Upsell extends WP_Customize_Section {

    /**
     * The type of customize section being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'upsell';

    /**
     * Custom button text to output.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_text = '';

    /**
     * Custom pro button URL.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_url = '';

    /**
     * Add custom parameters to pass to the JS via JSON.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function json() {
        $json = parent::json();

        $json['pro_text'] = $this->pro_text;
        $json['pro_url']  = esc_url( $this->pro_url );

        return $json;
    }

    /**
     * Outputs the Underscore.js template.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    protected function render_template() { ?>

        <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

            <h3 class="accordion-section-title">
                {{ data.title }}

                <# if ( data.pro_text && data.pro_url ) { #>
                    <a href="{{ data.pro_url }}" class="button button-primary alignright" target="_blank">{{ data.pro_text }}</a>
                <# } #>
            </h3>
        </li>
    <?php }
}


class Creativ_Singer_Multiple_Dropdown_Chooser extends WP_Customize_Control{
    public $type = 'dropdown_chooser';

    public function render_content(){
        if ( empty( $this->choices ) )
                return;
        ?>
            <label>
                <span class="customize-control-title">
                    <?php echo esc_html( $this->label ); ?>
                </span>

                <?php if($this->description){ ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post($this->description); ?>
                </span>
                <?php } ?>

                <select class="creativ-singer-chosen-select" <?php $this->link(); ?> multiple>
                    <?php
                    foreach ( $this->choices as $value => $label )
                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html( $label ) . '</option>';
                    ?>
                </select>
            </label>
        <?php
    }
}