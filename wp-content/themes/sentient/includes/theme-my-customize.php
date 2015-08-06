<?php
/*
 * Author: Le Duong Khang
 * MY CUSTOMIZE THEME
 * 
 */

/* ============================================================================ */

// See full blog post here
// http://pluto.kiwi.nz/2014/07/how-to-add-a-color-control-with-alphaopacity-to-the-wordpress-theme-customizer/

function pluto_enqueue_customizer_admin_scripts() {

    wp_register_script('customizer-admin-js', get_template_directory_uri() . '/js/admin/customizer-admin.js', array('jquery'), NULL, true);
    wp_enqueue_script('customizer-admin-js');
}

add_action('admin_enqueue_scripts', 'pluto_enqueue_customizer_admin_scripts');

function pluto_enqueue_customizer_controls_styles() {

    wp_register_style('pluto-customizer-controls', get_template_directory_uri() . '/js/admin/customizer-controls.css', NULL, NULL, 'all');
    wp_enqueue_style('pluto-customizer-controls');
}

add_action('customize_controls_print_styles', 'pluto_enqueue_customizer_controls_styles');

function pluto_add_customizer_custom_controls($wp_customize) {

    class Pluto_Customize_Alpha_Color_Control extends WP_Customize_Control {

        public $type = 'alphacolor';
        //public $palette = '#3FADD7,#555555,#666666, #F5f5f5,#333333,#404040,#2B4267';
        public $palette = true;
        public $default = '#3FADD7';

        protected function render() {
            $id = 'customize-control-' . str_replace('[', '-', str_replace(']', '', $this->id));
            $class = 'customize-control customize-control-' . $this->type;
            ?>
            <li id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class); ?>">
            <?php $this->render_content(); ?>
            </li>
                <?php
            }

            public function render_content() {
                ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <input type="text" data-palette="<?php echo $this->palette; ?>" data-default-color="<?php echo $this->default; ?>" value="<?php echo intval($this->value()); ?>" class="pluto-color-control" <?php $this->link(); ?>  />
            </label>
            <?php
        }

    }

}

add_action('customize_register', 'pluto_add_customizer_custom_controls');
/* ============================================================================ */

function theme_customize_register($wp_customize) {

    /* SECTION */
    $wp_customize->add_section('top', array(
        'title' => __('TOP'),
        'priority' => 20,
    ));

    /* SETTING */
    /* TOP */
    $wp_customize->add_setting('head_background', array(
        'default' => '',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'head_background_c', array(
        'label' => __('Header background'),
        'section' => 'top',
        'settings' => 'head_background',
        'priority' => 1,
    )));

    $wp_customize->add_setting('menu_button_setting');
    $wp_customize->add_control('menu_button_setting_c', array(
        'label' => __('Menu button setting'),
        'section' => 'top',
        'settings' => 'menu_button_setting',
        'priority' => 1,
        'type' => 'checkbox'
    ));

    $wp_customize->add_setting('top_button_color', array(
        'default' => '#d7d9d5',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'top_button_color_c', array(
        'label' => __('Button color'),
        'section' => 'top',
        'settings' => 'top_button_color',
        'priority' => 1,
    )));

    $wp_customize->add_setting('top_corner_border_color', array(
        'default' => '#e3e5e1',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new Pluto_Customize_Alpha_Color_Control($wp_customize, 'top_corner_border_color_c', array(
        'label' => __('Corner border color'),
        'section' => 'top',
        'settings' => 'top_corner_border_color',
        'palette' => true,
        'priority' => 1,
    )));

    $wp_customize->add_setting('top_text_color', array(
        'default' => '#626c56',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'top_text_color_c', array(
        'label' => __('Text color'),
        'section' => 'top',
        'settings' => 'top_text_color',
        'priority' => 1,
    )));
}

add_action('customize_register', 'theme_customize_register');

/* CSS generate */

function generate_css() {
    ?>
    <style>
        @media only screen and (min-width: 768px){
        .header-wrap{
            background: url('<?php echo get_head_background() ?>') !important;
        }
    <?php
    if (get_menu_button_setting()):
        ?>
            #navigation .nav li.current_page_item a::before, #navigation .nav li.current-menu-item a::before{
                border-color: transparent <?php echo get_top_corner_border_color() . ' ' . get_top_corner_border_color() ?> transparent !important;
            }
            #navigation .nav li a:hover::before{
                border-color: transparent <?php echo get_top_corner_border_color() . ' ' . get_top_corner_border_color() ?> transparent !important;
            }
            #navigation .nav li a:hover::after, #navigation .nav li a:hover::before{
                border-color: <?php echo get_top_corner_border_color() ?> !important;
            }
            #navigation .nav li.current_page_item a::after, #navigation .nav li.current-menu-item a::after{
                border-color: transparent transparent <?php echo get_top_corner_border_color() . ' ' . get_top_corner_border_color() ?> !important;
            }
            #navigation .nav li a:hover::after{
                border-color: transparent transparent <?php echo get_top_corner_border_color() . ' ' . get_top_corner_border_color() ?> !important;
            }
            #navigation .nav li a:hover::after, #navigation .nav li a:hover::before{
                border-color: <?php echo get_top_corner_border_color() ?> !important;
            }
            #navigation .nav li.current_page_item a, #navigation .nav li.current-menu-item a{
                background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , <?php echo get_top_button_color() ?> 0%, <?php echo get_top_corner_border_color() ?> 100%) repeat scroll 0 0 !important;
            }
            #navigation .nav li a:hover{
                background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , <?php echo get_top_button_color() ?> 0%, <?php echo get_top_corner_border_color() ?> 100%) repeat scroll 0 0 !important;
            }
            #navigation .nav li a{
                color: <?php echo get_top_text_color() ?> !important;
            }
        }
        <?php
    endif;
    ?>
    </style>
        <?php
    }

    add_action('wp_head', 'generate_css');

    /* ========================================================================== */
    /* TOP */

    function get_head_background() {
        return esc_url_raw(get_theme_mod('head_background'));
    }

    add_action('customize_register', 'get_head_background');

    function get_menu_button_setting() {
        return get_theme_mod('menu_button_setting');
    }

    add_action('customize_register', 'get_menu_button_setting');

    function get_top_button_color() {
        return get_theme_mod('top_button_color');
    }

    add_action('customize_register', 'get_top_button_color');

    function get_top_corner_border_color() {
        return get_theme_mod('top_corner_border_color');
    }

    add_action('customize_register', 'get_top_corner_border_color');

    function get_top_text_color() {
        return get_theme_mod('top_text_color');
    }

    add_action('customize_register', 'get_top_text_color');

    /* ============================================================================ */