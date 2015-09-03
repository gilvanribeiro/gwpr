<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php title(); ?></title>
<link rel="stylesheet"
	href="<?php echo bloginfo('template_directory')?>/css/bootstrap.min.css"
	type="text/css" />
<link rel="stylesheet"
	href="<?php echo bloginfo('template_directory')?>/css/bootstrap-theme.min.css"
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
	src="<?php echo bloginfo('template_directory')?>/js/jquery.inputmask.bundle.min.js"></script>
<script
	src="<?php echo bloginfo('template_directory')?>/js/bootstrap.min.js"></script>
<?php if ( !is_user_logged_in() ) : ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51821918-1', 'salutelight.com.br');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');
</script>
<?php endif; ?>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

<?php wp_head(); ?>
</head>
<body>
<header class="container">
	<nav class="navbar" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target="#navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand notext logo"
				title="<?php bloginfo('name'); ?>" rel="index"
				href="<?php bloginfo('url'); ?>">Salute Alimentos Saudáveis</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapse">
			<ul class="nav navbar-nav">
				<?php wp_nav_menu(array( 'container' => false, 'items_wrap' => '%3$s' )); ?>
			</ul>
		</div>
	</nav>
</header>