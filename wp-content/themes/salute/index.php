<?php get_header(); ?>
<script
	src="<?php echo bloginfo('template_directory')?>/js/newsletter.js"></script>
<script
	src="<?php echo bloginfo('template_directory')?>/js/imc.js"></script>
<script
	src="<?php echo bloginfo('template_directory')?>/js/carousel.js"></script>
<div class="fundo">
	<div class="container">
		<?php if (have_posts()) : the_post(); ?>
		<?php 
			$galerias = get_post_galleries_images ( $post );
			$galeria = $galerias[0];
		?>
		<div id="carousel-home" class='carousel slide' data-ride="carousel">
			<div class="carousel-inner">
			<?php for($i = 0; $i < count ( $galeria ); $i ++) { ?>
			<?php 
				$title = get_image_title(get_attachment_id_from_url($galeria[$i]));;
				$desc = get_image_description(get_attachment_id_from_url($galeria[$i]));;
				if($i == 0) {
					$title_init = $title;
					$desc_init = $desc;
				}
			?>
				<div class="item<?php echo ($i == 0 ? ' active' : '') ?>">
					<img class="img-responsive" src="<?php echo remove_thumbnail ( $galeria [$i] ); ?>" data-title="<?php echo $title; ?>" data-desc="<?php echo $desc; ?>">
				</div>
			<?php } ?>
			</div>
			<div class="carousel-description">
				<h1><?php echo $title_init; ?></h1>
				<h2><?php echo $desc_init; ?></h2>
				<div class="carousel-descriptio-control">
					<?php for($i = 0; $i < count ( $galeria ); $i ++) { ?>
						<a data-target="#carousel-home" data-slide-to="<?php echo $i; ?>"><?php echo $i + 1; ?></a>
					<?php } ?>					
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>

<div class="content home container">
	<div class="row row-1">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sucos">
			<h1>Sucos Funcionais</h1>
			<?php create_sucos_carousel(); ?>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 programa">
			<h1>Programa Detox</h1>
			<span>A quantidade de substâncias nocivas que ingerimos no dia a dia é alarmante. São medicamentos, corantes, conservantes e gorduras, entre outros. O organismo, claro, pede uma desintoxicação. Por isso mesmo, o Salute apresenta o seu Programa Detox Funcional.</span>
			<a href="<?php echo get_bloginfo ( 'url' ); ?>/programa-detox/">Continue lendo.</a>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<h1>Blog</h1>
			<div class="blog-box">
				<?php 
					query_posts ( 'cat=' . get_cat_ID('Blog') .'&posts_per_page=1' );
					if(have_posts()) {
						the_post();
						$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
						$link = get_the_permalink();
						$texto = get_the_excerpt();
  						$first_img = $matches[1][0];
  				?>
  				<div class="row">
	  				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 blog-box-img">
	  				<?php
	  					if(!empty($first_img)) {
	  				?>
	  					<a href="<?php echo $link; ?>">
	  						<img class="img-responsive" src="<?php echo $first_img; ?>">
	  					</a>
	  				<?php
	  					}
	  				?>
	  				</div>
	  				<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 blog-box-texto">
	  					<a href="<?php echo $link; ?>">
	  						<?php echo $texto; ?>
	  					</a>
	  				</div>
	  			</div>
  				<?php
					} 
				?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 imc">
			<h1>Caucule seu IMC</h1>
			<span>(Índice de Massa Corporal) <a href="http://saude.terra.com.br/imc/">Saiba mais</a></span>
			<div class="calcular">
				<div class="linha">
					<span class="linha-titulo">Minha Altura</span>
					<input type="text" class="altura">
					<span>m</span>
				</div>
				<div class="linha">
					<span class="linha-titulo">Meu Peso</span>
					<input type="text" class="peso">
					<span>Kg</span>
				</div>
			</div>
			<div class="calculado">
				<span></span>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 rede-social">
			<h1>Redes sociais</h1>
			<h2>Acompanhe o Salute pelo Twitter e Facebook</h2>
			<div class="rs-btns">
				<img src="<?php echo bloginfo('template_directory')?>/images/salute-alimentacao-saudavel-logo.png" class="avatar">
				<!--<div>
					<a href="https://twitter.com/salute" class="twitter-follow-button" data-show-count="false" data-lang="pt" data-show-screen-name="false">Seguir @salute</a>
				</div>-->
				<div>
					<div class="fb-like" data-href="https://www.facebook.com/Salute-Light/" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 newsletter">
			<h1>Receba nossa newsletter</h1>
			<span>Cadastre-se e receba novidades.</span>
			<div>
				<input type="text" class="newsletter-email" maxlength="150">
				<a href="#" class="newsletter-submit">OK</a>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>