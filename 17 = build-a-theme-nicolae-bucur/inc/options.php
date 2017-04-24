<?php

/*----------------------------------------------------*/
/*     CUSTOMIZER OPTIONS                             */
/*----------------------------------------------------*/


add_action('customize_register', 'meetup_wp_theme_customizer');

function meetup_wp_theme_customizer( $wp_customize ) {


$wp_customize->add_panel( 'options', array(
  'title' => esc_html__( 'Options', 'meetup_wp' ),
//'description' => $description, // Include html tags such as <p>.
  'priority' => 1, // Mixed with top-level-section hierarchy.
) );


// Header 

$wp_customize->add_section( 'header-setup', array(
        'title'       => esc_html__('Header', 'meetup_wp'), 
        'description' => '',
        'priority'    => 1,
        'panel'       => 'options',
 ) );


// Header background
$wp_customize->add_setting( 'header_bgcolor' , array(
        'default'     => '#ffffff',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bgcolor', array(
         'label'        => esc_html__( 'Header background', 'meetup_wp' ),
         'section'      =>  'header-setup',
         'settings'     =>  'header_bgcolor',
         'priority'     => 1,
) ) );


// Favicon

$wp_customize->add_setting( 'html5_favicon', array( 
        'transport'         => 'refresh', 
        'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'html5_favicon', array(
        'label'        => esc_html__( 'Favicon', 'meetup_wp' ),
        'section'  => 'header-setup',
        'settings' => 'html5_favicon',
        'type'     => 'upload',
) ) );




// Post blog setup
$wp_customize->add_section( 'post-setup', array(
        'title'       => esc_html__('Post blog', 'meetup_wp'), 
        'description' => '',
        'priority'    => 2,
        'panel'       => 'options',
 ) );

$wp_customize->add_setting( 'post_placement', array(
             'default' => '1',
             'sanitize_callback' => 'post_sanitize_site_placement',
           )
);
 
$wp_customize->add_control(
    'post_placement', array(
        'type'      => 'radio',
        'label'     => esc_html__('Post article', 'meetup_wp'),
        'section'   => 'post-setup',
        'settings'  => 'post_placement',
        'choices'   => array(
              'option1'  => 'Excerpt',
              'option2'  => 'Full',
        ),
    )
);


// Footer setup
$wp_customize->add_section( 'footer-setup', array(
      'title'       => esc_html__('Footer', 'meetup_wp'), 
      'description' => '',
      'priority'    => 3,
      'panel'       => 'options',
   ) );

// Footer widgets   
$wp_customize->add_setting( 'hide_widget_footer', array(
      'default'   => "",
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_checkbox',
) );


$wp_customize->add_control( 'hide_widget_footer', array(
      'label'    => esc_html__('Hide Widgets Footer', 'meetup_wp'),
      'type'     => 'checkbox',
      'section'  => 'footer-setup',
      'settings' => 'hide_widget_footer',
      'priority' => 1,
) );
   
   
// Copyright footer
$wp_customize->add_setting(
        'copyright_footer', array(
        'default' => 'Default copyright text',
        'sanitize_callback' => 'example_sanitize_text',
    ));

$wp_customize->add_control( 'copyright_footer', array(
        'label'     => 'Footer copyright text',
        'section'   => 'footer-setup',
        'settings'  => 'copyright_footer',
        'type'      => 'text',
        'priority'  => 2,
    )
);
  


// functions

function example_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function site_sanitize_site_placement( $input ) {
    $valid = array(
        '1'  => 'wide',
        '2'  => 'boxed',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}


function post_sanitize_site_placement( $input ) {
    $valid = array(
        'option1'  => 'Excerpt',
        'option2'  => 'Full',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}


function sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}



}