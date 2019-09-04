<?php

/* Adds a slider/video banner to the front page. Uses Bootstrap css/js for the slider. Bootstrap is loaded on the
front page only. See functions php. */

add_action( 'customize_register', 'wohc_customize_register' );
function wohc_customize_register( $wp_customize ) {
  
  // Front Page Slider/Video Section
  $wp_customize->add_section('fp_top_slider', array(
    'title' => __('Front Page Slider/Video'),
    'priority' => 20,
    'active_callback' => 'is_front_page'
  ));
  
  // Video Setting
  $wp_customize->add_setting('fp-video', array(
    'default' => '',
    'type' => 'theme_mod',
    'transport' => 'postMessage'
  ));
  // Video Control
  $wp_customize->add_control(
    new WP_Customize_Control (
      $wp_customize,
      'fp-video',
      array(
        'label' => __('Hero Video'),
        'description' => __('Adds video banner to the Hero section. Delete this entry to enable slider images.'),
        'section' => 'fp_top_slider',
        'settings' => 'fp-video',
        'type' => 'text',
        'priority' => 10,
        'sanitize_callback' => 'wp_filter_nohtml_kses',
      )
    )
  );
  
  
  // Slider #1 Setting
  $wp_customize->add_setting('fp-topslider-one', array(
      'default' => '',
      'type' => 'theme_mod',
      'transport' => 'postMessage'
    )
  );
  // Slider #1 Control
  $wp_customize->add_control(
    new WP_Customize_Image_Control (
      $wp_customize,
      'fp-topslider-one',
      array(
        'label' 						=> __('Slider &#35;1 Image'),
        'description'       => __('Add an image. Appears in slider/hero banner.'),
        'section' 					=> 'fp_top_slider',
        'settings' 					=> 'fp-topslider-one',
        'priority' 					=> 10,
        'sanitize_callback' => 'esc_url_raw',
      )
    )
  );
  
  // Slider #2 Setting
  $wp_customize->add_setting('fp-topslider-two', array(
      'default' => '',
      'type' => 'theme_mod',
      'transport' => 'postMessage'
    )
  );
  // Slider #2 Control
  $wp_customize->add_control(
    new WP_Customize_Image_Control (
      $wp_customize,
      'fp-topslider-two',
      array(
        'label' 						=> __('Slider &#35;2 Image'),
        'description'       => __('Add an image. Appears in slider/hero banner.'),
        'section' 					=> 'fp_top_slider',
        'settings' 					=> 'fp-topslider-two',
        'priority' 					=> 10,
        'sanitize_callback' => 'esc_url_raw',
      )
    )
  );
  
  // Slider #3 Setting
  $wp_customize->add_setting('fp-topslider-three', array(
      'default' => '',
      'type' => 'theme_mod',
      'transport' => 'postMessage'
    )
  );
  // Slider #3 Control
  $wp_customize->add_control(
    new WP_Customize_Image_Control (
      $wp_customize,
      'fp-topslider-three',
      array(
        'label' 						=> __('Slider &#35;3 Image'),
        'description'       => __('Add an image. Appears in slider/hero banner.'),
        'section' 					=> 'fp_top_slider',
        'settings' 					=> 'fp-topslider-three',
        'priority' 					=> 10,
        'sanitize_callback' => 'esc_url_raw',
      )
    )
  );
}


add_action( 'genesis_before_content_sidebar_wrap', 'front_page_slider', 5 );
function front_page_slider() {
  if(is_front_page()) {
    
    $fp_video         = get_theme_mod('fp-video');
    $fp_slider_one    = get_theme_mod('fp-topslider-one');
    $fp_slider_two    = get_theme_mod('fp-topslider-two');
    $fp_slider_three  = get_theme_mod('fp-topslider-three');
    
    if(get_theme_mod('fp-video') !== '' ) {
      
      echo  '<div><video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">' .
            '<source src="' . $fp_video . '" type="video/mp4">' .
            '</video></div>';
      
      } else {
  
      echo '<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">'.
            '<div class="carousel-inner">'.
              '<div class="carousel-item active">'.
                '<img src="'. $fp_slider_one .'" class="d-block w-100" alt="West Oakland Health Care">'.
              '</div>'.
              '<div class="carousel-item">'.
                '<img src="'. $fp_slider_two .'" class="d-block w-100" alt="West Oakland Health Care">'.
              '</div>'.
              '<div class="carousel-item">'.
                '<img src="'. $fp_slider_three .'" class="d-block w-100" alt="West Oakland Health Care">'.
              '</div>'.
            '</div>'.
            '<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">'.
              '<span class="carousel-control-prev-icon" aria-hidden="true"></span>'.
              '<span class="sr-only">Previous</span>'.
            '</a>'.
            '<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">'.
              '<span class="carousel-control-next-icon" aria-hidden="true"></span>'.
              '<span class="sr-only">Next</span>'.
            '</a>'.
           '</div>';
      }
    }
  }
