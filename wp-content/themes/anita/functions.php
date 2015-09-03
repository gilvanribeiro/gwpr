<?php
require get_template_directory ().'/libs/Instagram-PHP-API/instagram.class.php';

function login() {
	echo '<style type="text/css">';
	echo '    body.login div#login h1 a {';
	echo '        background: url(' . get_stylesheet_directory_uri () . '/images/logo.png) center top no-repeat;';
	echo '        width: 100%;';
	echo '        height: 100px;';
	echo '        background-size: 200px auto;';
	echo '    }';
	echo '</style>';
}
add_action ( 'login_enqueue_scripts', 'login' );

function add_url_cdata_to_front() {
	?>
<script type="text/javascript"> //<![CDATA[
	url = '<?php echo get_bloginfo ( 'url' ); ?>';
	//]]> </script>
	<?php
}
add_action ( 'wp_head', 'add_url_cdata_to_front', 1 );

function anita_setup() {
	register_nav_menus ( array (
		'principal' => 'Principal'
		) );

	register_sidebar( array (
		'name' => 'Propaganda-Sidebar', 
		'description' => 'Propaganda na Sidebar do Blog', 
		'before_widget' => '', 
		'after_widget' => '', 
		'before_title' => '', 
		'after_title' => ''
		) );

  	register_sidebar( array (
  		'name' => 'Propaganda-Header', 
  		'description' => 'Propaganda no Topo do Blog', 
  		'before_widget' => '', 
  		'after_widget' => '', 
  		'before_title' => '', 
  		'after_title' => ''
  	) );

  	register_sidebar( array (
  		'name' => 'Propaganda-Post', 
  		'description' => 'Propaganda após o primeiro post', 
  		'before_widget' => '', 
  		'after_widget' => '', 
  		'before_title' => '', 
  		'after_title' => ''
  	) );

  	add_theme_support('post-thumbnails'); 
}
add_action ( 'after_setup_theme', 'anita_setup' );

function remove_thumbnail($attachment_url = '') {
	if ('' == $attachment_url) {
		return;
	}
	return preg_replace ( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
}

function criar_redes_sociais($show_email = true) {
	$facebook = "https://www.facebook.com/anitabemcriada";
	$instagram = "http://instagram.com/anitabemcriada/";
	$twitter = "https://twitter.com/anitabemcriada";
	
	$html = '';
	
	if($show_email) {
		$html .= "<a class='icon email' href='". get_site_url(). "/contato/'></a>";
	}
	$html .= "<a class='icon twitter' href='$twitter' target='_blank'></a>";
	$html .= "<a class='icon facebook' href='$facebook' target='_blank'></a>";
	$html .= "<a class='icon instagram' href='$instagram' target='_blank'></a>";
	
	echo $html;
}
function comentario_site($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	$avatar = get_bloginfo('template_directory').'/images/gravatar.jpg';
?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<div class="comentario-autor">
			<div class="comentario-avatar">
	      		<?php 
	      		echo get_avatar($comment,65,$avatar);
	      		if($args['max_depth']!=$depth) { 
	        		comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
	      		} 
	      		?>
	    	</div>
	    	<div class="comentario-nome">
	      		<?php comment_author_link(); ?>
	    	</div>
	    	<div class="comentario-data">
	    		<?php comment_date('d/m/Y'); ?>
	    	</div>
	    	<div class="comentario-texto">
	      		<?php 
	      			comment_text(); 
	      			if ($comment->comment_approved == '0') { 
	      		?>
	      			<br /><em>Seu comentário precisa ser aprovado.</em>
	      		<?php 
	      			} 
	      		?>
	    	</div>
	    	<div class="clearfix"></div>
	  </div>
	</li>
<?php
}

add_filter('manage_edit-post_columns', 'likes_post_columns');
function likes_post_columns($defaults) {
    $defaults['like'] = 'Curtidas';
    return $defaults;
}

add_action('manage_posts_custom_column', 'likes_post_columns_data', 10, 2 );
function likes_post_columns_data($column_name, $post_id) {

    if ($column_name == 'like') {
    	$likes = 0;
    	if( function_exists('zilla_likes') ) {
    		$likes = get_post_meta($post_id, '_zilla_likes', true);
			if( !$likes ){
				$likes = 0;
			}
    	}
    	echo $likes;
    }
}

add_filter( 'manage_edit-post_sortable_columns', 'likes_post_columns_sortable' );
function likes_post_columns_sortable( $columns ) {
	$columns['like'] = 'like';
	return $columns;
}


function get_post_thumbnail($post_id,$tamanho,$post_content='') {
$tamTW = 100; $tamTH = 100;
$tamMW = 250; $tamMH = 345;
$tamLW = 640; $tamLH = 1024;
$ret = '';
if (function_exists('has_post_thumbnail')) {
    if (has_post_thumbnail()) {
        $ret = get_the_post_thumbnail($post_id,$tamanho);
        }
    }
if ($ret == '') {
    $ret = get_bloginfo('template_url').'/images/default-'.$tamanho.'.jpg';
    $args = array('post_parent' => $post_id, 'numberposts' => 1, 'order'=> 'ASC', 'post_mime_type' => 'image', 'post_type' => 'attachment');
    $files = get_children($args, ARRAY_A);
    if (count($files) > 0) {
        $rekeyed_array = array_values($files);
        $ret = $rekeyed_array[0]['guid'];
        }
    else {
        $imgDir = '';
        $content = $post_content;
        if ($content == '')
            $content = get_the_content();
        $imgI = stripos($content, '<img');
        if ($imgI > 0) {
            $imgM = substr($content, $imgI);
            $imgF = stripos($imgM, '>');
            $imgX = substr($imgM, 0, $imgF);
            $imgI = stripos($imgX, 'src=');
            $imgM = substr($imgX, $imgI + 5);
            $imgF = stripos($imgM, '"');
            $imgX = substr($imgM, 0, $imgF);
            $imgDir = $imgX;
            }
        if ($imgDir != '') {
            $ret = $imgDir;
            $matrizImg = parse_url($ret);
            $matrizSite = parse_url(get_bloginfo('url'));
           /* if ($matrizSite['host'] == $matrizImg['host']) { */
                if ($tamanho == 'thumbnail')
                    $ret = get_bloginfo('template_url').'/timthumb.php?src='.$imgDir.'&w='.$tamTW.'&h='.$tamTH.'&zc=1';
                if ($tamanho == 'medium')
                    $ret = get_bloginfo('template_url').'/timthumb.php?src='.$imgDir.'&w='.$tamMW.'&h='.$tamMH.'&zc=1';
                if ($tamanho == 'large')
                    $ret = get_bloginfo('template_url').'/timthumb.php?src='.$imgDir.'&w='.$tamLW.'&h='.$tamLH.'&zc=1';
               /* } */
            }
        }
    if ($tamanho == 'thumbnail')
        $ret = '<img src="'.$ret.'" />';
    if ($tamanho == 'medium')
        $ret = '<img src="'.$ret.'" />';
    if ($tamanho == 'large')
        $ret = '<img src="'.$ret.'" />';
    }
return $ret;
}

function get_first_img($content) {
	$pos1 = strpos ( $content, "<img" );
	$str = substr($content, $pos1);
	$pos2 = strpos ( $str, ">" );
	$str = substr($str, 0, $pos2);
	$pos1 = strpos ( $str, "src=\"" );
	$str = substr($str, $pos1 + strlen("src=\""));
	$pos2 = strpos ( $str, "\"" );
	$str = substr($str, 0, $pos2);

	return $str;
}
?>