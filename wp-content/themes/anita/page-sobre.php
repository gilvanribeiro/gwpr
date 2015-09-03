<?php get_header(); ?>
<div class="container content">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 page-conteudo">
			<div class="page-foto">
				<img src="<?php echo bloginfo('template_directory')?>/images/titulo-sobre.png" class="img-responsive left hidden-xs hidden-sm" alt="A Anita">
				<?php
					$foto = get_field ("foto_pagina");
					$foto = remove_thumbnail($foto['url']);
				?>
				<img src="<?php echo $foto; ?>" class="img-responsive right">
				<div class="clearfix"></div>
			</div>
			<div class="page-sobre">
				<?php if (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>