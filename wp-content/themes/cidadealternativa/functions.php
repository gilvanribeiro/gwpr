<?php
require_once('wp_bootstrap_navwalker.php');

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'Cidade Alteridade'),
        'sidebar' => __('Sidebar Navigation', 'Cidade Alternativa'),
    ));

add_theme_support('post-thumbnails');
add_image_size('teste',444,444,true);
register_sidebars();
/*
function teste($wp_customize)
{
    $wp_customize->add_section('primeira_cor', array(
        'title' => __('Cor', 'Cidade e Alteridade'),
        'description' => 'Modify the theme colors'
    ));

    $wp_customize->add_setting('ap_core_theme_options[font-color]', array(
        'default' => '#fff',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'type' => 'option'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ap_core_theme_options[font-color]', array(
        'label' => __('Edit Background Color', 'Cidade e Alteridade'),
        'section' => 'primeira_cor',
        'setting' => 'ap_core_theme_options[font-color]',
        'sanitze_callback' => 'sanitze_hex_color'
    )));
}

function rodapet($wp_customize)
{
    $wp_customize->add_section('rodape', array(
        'title' => __('Rodape', 'Cidade e Alteridade'),
        'description' => 'Modify the theme rodape'
    ));

    $wp_customize->add_setting('rodape_detalhe', array(
        'default' => 'A parada padrao',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',

    ));

    $wp_customize->add_control('rodape_detalhe', array(
        'label' => __('Eite o rodape', 'Cidade e Alteridade'),
        'section' => 'rodape',
        'settings' => 'rodape_detalhe',
        'type' => 'textarea',
        'sanitze_callback' => 'esc_textarea'
    ));
}
add_action('customize_register','rodapet');
add_action('customize_register','teste');
*/
?>