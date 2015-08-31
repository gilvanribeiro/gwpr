<?php
require_once('wp_bootstrap_navwalker.php');
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'Cidade Alternativa' ),
    'sidebar'=>  __('Sidebar Navigation','Cidade Alternativa'),
) );
add_theme_support('post-thumbnails');
add_image_size('teste',444,444,true);
register_sidebars();

add_filter('admin_footer_text', 'bl_admin_footer');
function bl_admin_footer() {
    echo 'Novo texto para o rodapé. Aceita tags HTML!';
}
?>