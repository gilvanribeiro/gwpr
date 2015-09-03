<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php bloginfo('name'); ?><?php if ( is_single() ) { ?> &raquo; Arquivos <?php } ?><?php wp_title(); ?></title>
<link rel="shortcut icon"
	href="<?php echo bloginfo('template_directory')?>/images/favicon.png" />
<link rel="stylesheet"
	href="<?php echo bloginfo('template_directory')?>/css/bootstrap.min.css"
	type="text/css" />
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>"
	type="text/css" />
<link rel="stylesheet"
	href="<?php echo bloginfo('template_directory')?>/css/wordpress.css"
	type="text/css" />
<link rel="stylesheet"
	href="<?php echo bloginfo('template_directory')?>/css/767.css"
	type="text/css" />
<link rel="stylesheet"
	href="<?php echo bloginfo('template_directory')?>/css/992.css"
	type="text/css" />
<link rel="stylesheet"
	href="<?php echo bloginfo('template_directory')?>/css/1200.css"
	type="text/css" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.min.js"></script>
<![endif]-->
<script
	src="<?php echo bloginfo('template_directory')?>/js/jquery-1.11.1.min.js"></script>
<script
	src="<?php echo bloginfo('template_directory')?>/js/bootstrap.min.js"></script>
<script
	src="<?php echo bloginfo('template_directory')?>/js/newsletter.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="container">
	<div class="header-prop">
		<?php dynamic_sidebar('Propaganda-Header'); ?>
	</div>
	<div class="logo hidden-xs">
		<a title="<?php bloginfo('name'); ?>" rel="index"
			href="<?php bloginfo('url'); ?>">
			<img src="<?php echo bloginfo('template_directory')?>/images/logo.png" alt="Anita Bem Criada">
		</a>
	</div>
	<div class="fresca hidden-xs">
		<img src="<?php echo bloginfo('template_directory')?>/images/fresca-nao-bem-criada.png" alt="Fresca? Não! Bem Criada">
	</div>
	<div class="box-anita hidden-xs">
		<img src="<?php echo bloginfo('template_directory')?>/images/por-ana-leticia.png" alt="Por Ana Letífica">
	</div>
	<nav class="navbar" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target="#navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand notext nav-logo visible-xs"
				title="<?php bloginfo('name'); ?>" rel="index"
				href="<?php bloginfo('url'); ?>">Anita Bem Criada</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapse">
			<ul class="nav navbar-nav">
				<?php wp_nav_menu(array( 
					'container' => false, 
					'items_wrap' => '%3$s',
					'menu' => 'principal' 
					)); ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="hidden-xs menu-more dropdown">
					<div class="dropdown-toggle plus" data-toggle="dropdown">
						<p>+</p>
					</div>
					<ul class="dropdown-menu" role="menu">
					<?php
						$menu = wp_get_nav_menu_items('principal');
						$cats = get_categories();
						foreach ($cats as $cat) {
							$b = false;
							foreach ($menu as $m) {
								if($m->ID == $cat->cat_ID) {
									$b = true;
									break;
								}
							}
							if($b) {
								continue;
							}
					?>
						<li>
							<a href="<?php echo get_category_link($cat->cat_ID) ?>"><?php echo $cat->name; ?></a>
						</li>
					<?php
						}
					?>
					</ul>
				</li>	
			</ul>
		</div>
		</nav>
</header>