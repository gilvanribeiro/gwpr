<?php
function login() {
	echo '<style type="text/css">';
	echo '    body.login div#login h1 a {';
	echo '        background: url(' . get_stylesheet_directory_uri () . '/images/salute-alimentacao-saudavel-logo.png) center top no-repeat;';
	echo '        width: 100%;';
	echo '        height: 100px;';
	echo '    }';
	echo '</style>';
}
add_action ( 'login_enqueue_scripts', 'login' );

function salute_setup() {
	register_nav_menus ( array (
		'main' => 'Principal'
		) );
}
add_action ( 'after_setup_theme', 'salute_setup' );

function add_url_cdata_to_front() {
	?>
<script type="text/javascript"> //<![CDATA[
	url = '<?php echo get_bloginfo ( 'url' ); ?>';
	//]]> </script>
	<?php
}
add_action ( 'wp_head', 'add_url_cdata_to_front', 1 );

function title() {
	wp_title ( '|', true );
}

function remove_thumbnail($attachment_url = '') {
	if ('' == $attachment_url) {
		return;
	}
	return preg_replace ( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
}

function get_attachment_id_from_url($attachment_url = '') {
	global $wpdb;
	$attachment_id = false;
	
	if ('' == $attachment_url) {
		return;
	}
	
	$upload_dir_paths = wp_upload_dir ();
	
	if (false !== strpos ( $attachment_url, $upload_dir_paths ['baseurl'] )) {
		$attachment_url = preg_replace ( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
		$attachment_url = str_replace ( $upload_dir_paths ['baseurl'] . '/', '', $attachment_url );
		$attachment_id = $wpdb->get_var ( $wpdb->prepare ( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
	}
	
	return $attachment_id;
}

function get_image_description($id) {
	global $wpdb;
	
	$attachment_desc = $wpdb->get_var ( $wpdb->prepare ( "SELECT wposts.post_content FROM $wpdb->posts wposts WHERE wposts.ID = %d ", $id ) );
	
	return $attachment_desc;
}

function get_image_title($id) {
	global $wpdb;

	$attachment_title = $wpdb->get_var ( $wpdb->prepare ( "SELECT wposts.post_title FROM $wpdb->posts wposts WHERE wposts.ID = %d ", $id ) );

	return $attachment_title;
}

function get_sucos() {
	$sucos_post = $selecoes = get_posts ( array (
		'category_name' => 'Suco Funcional',
		'numberposts' => '-1'
		) );

	$sucos = array();

	foreach ($sucos_post as $suco_post) {
		$f = get_field ( "imagem", $suco_post->ID );
		$suco = array(
			'nome' => $suco_post->post_title,
			'texto' => apply_filters ( 'the_content', $suco_post->post_content),
			'foto' => $f['url'],
			'informacoes' => apply_filters ( 'the_content', get_field ( "informacoes", $suco_post->ID )),
			'id' => $suco_post->ID
			);

		array_push($sucos, $suco);
	}

	return $sucos;
}

function create_sucos_carousel() {
	echo "<div id='carousel-sucos' class='carousel slide carousel-suco' data-ride='carousel'>";
	echo "<div class='carousel-inner'>";
	$sucos = get_sucos();
	for($i = 0; $i < count ( $sucos ); $i ++) {
		echo "<div class='item" . ($i == 0 ? ' active' : '') ."'>";
		echo "<div class='carousel-suco-description'>";
		echo "<span class='titulo'>". $sucos[$i]['nome'] ."</span>";
		echo $sucos[$i]['texto'];
		echo "</div>";
		echo "<div class='carousel-suco-img'>";
		echo "<img class='img-responsive' src='" . $sucos[$i]['foto'] . "'>";
		echo "</div>";
		echo "</div>";
	}
	echo "</div>";
	echo "<a class='left carousel-control' href='#carousel-sucos' data-slide='prev'>";
	echo "<span class='glyphicon glyphicon-chevron-left'></span>";
	echo "</a>";
	echo "<a class='right carousel-control' href='#carousel-sucos' data-slide='next'>";
	echo "<span class='glyphicon glyphicon-chevron-right'></span>";
	echo "</a>";
	echo "</div>";
}

function get_unidades() {
	$unidades_post = $selecoes = get_posts ( array (
		'category_name' => 'Unidade',
		'numberposts' => '-1',
		'order' => 'ASC'
		) );

	$unidades = array();

	foreach ($unidades_post as $unidade_post) {
		$f = get_field ( "imagem", $unidade_post->ID );
		$unidade = array(
			'nome' => get_field ( "nome", $unidade_post->ID ),
			'endereco' => get_field ( "endereco", $unidade_post->ID ),
			'telefone' => get_field ( "telefone", $unidade_post->ID ),
			'foto' => $f['url']
			);

		array_push($unidades, $unidade);
	}

	return $unidades;

}

function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length' );
?>